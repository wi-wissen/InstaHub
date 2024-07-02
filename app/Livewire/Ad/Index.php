<?php

namespace App\Livewire\Ad;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ad;
use App\Facades\RequestHub;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $readonly;

    public function mount()
    {
        $this->readonly = RequestHub::isReadOnly();
    }

    public function render()
    {
        RequestHub::setHubDB(); // TODO: Why do we need to do this?

        $ads = Ad::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.ad.index', [
            'ads' => $ads
        ]);
    }

    public function deleteAd($id)
    {
        if ($this->readonly) {
            $this->addError('delete', __('Cannot delete in read-only mode.'));
            return;
        }

        $ad = Ad::findOrFail($id);

        $ad->delete();
        session()->flash('success', __('Ad has been deleted successfully!'));
    }
}