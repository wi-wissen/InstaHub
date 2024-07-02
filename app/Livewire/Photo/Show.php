<?php

namespace App\Livewire\Photo;

use Livewire\Component;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use App\Facades\RequestHub;

class Show extends Component
{
    public Photo $photo;
    public $ad;
    public $readonly;
    public $admin;
    public $comment = '';
    public $showInput = false;

    protected $listeners = ['commentAdded' => '$refresh'];

    public function mount(Photo $photo, $ad = null)
    {
        $this->photo = $photo;
        $this->ad = $ad;
        $this->readonly = RequestHub::isReadOnly();
        $this->admin = Auth::user()->allowed('dba');
        $this->loadPhotoRelations();
    }

    public function render()
    {
        return view('livewire.photo.show');
    }

    protected function loadPhotoRelations()
    {
        $relations = ['user'];
        
        if (RequestHub::hasTable('likes')) {
            $relations[] = 'likes';
        }
        
        if (RequestHub::hasTable('comments')) {
            $relations[] = 'comments.user';
        }
        
        $this->photo->load($relations);
    }

    public function toggleLike()
    {
        if ($this->readonly || !RequestHub::hasTable('likes')) return;

        $like = $this->photo->likes()->where('user_id', Auth::id())->first();

        if (!$like) {
            $this->photo->likes()->create([
                'user_id' => Auth::id(),
            ]);
        } else {
            $like->delete();
        }

        $this->photo->refresh();
        $this->loadPhotoRelations();
    }

    public function postComment()
    {
        if ($this->readonly || !RequestHub::hasTable('comments')) return;

        $this->validate([
            'comment' => 'required|min:1'
        ]);

        $this->photo->comments()->create([
            'user_id' => Auth::id(),
            'body' => $this->comment,
        ]);

        $this->comment = '';
        $this->showInput = false;
        $this->photo->refresh();
        $this->loadPhotoRelations();
    }

    public function deleteComment($commentId)
    {
        if ($this->readonly || !$this->admin || !RequestHub::hasTable('comments')) return;

        $this->photo->comments()->find($commentId)->delete();
        $this->photo->refresh();
        $this->loadPhotoRelations();
    }
}