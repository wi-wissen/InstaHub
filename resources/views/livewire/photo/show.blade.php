<div class="card">
    <div class="card-body pt-0">
        <img src="/{{ $photo->url }}" class="w-100 img-fluid photo rounded-top" />

        <div class="controls">
            @if(!$readonly && RequestHub::hasTable('comments'))
                <svg wire:click="$toggle('showInput')" class="svgbutton" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M18 2.5c-8.82 0-16 6.28-16 14s7.18 14 16 14a18 18 0 0 0 4.88-.68l5.53 3.52a1 1 0 0 0 1.54-.84v-6.73a13 13 0 0 0 4-9.27C34 8.78 26.82 2.5 18 2.5m10.29 22.11a1 1 0 0 0-.32.73v5.34l-4.38-2.79a1 1 0 0 0-.83-.11a16 16 0 0 1-4.76.72c-7.72 0-14-5.38-14-12s6.28-12 14-12s14 5.38 14 12a11.08 11.08 0 0 1-3.71 8.11" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M25 15.5H11a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2" class="clr-i-outline clr-i-outline-path-2"/><path fill="currentColor" d="M21.75 20.5h-7.5a1 1 0 0 0 0 2h7.5a1 1 0 0 0 0-2" class="clr-i-outline clr-i-outline-path-3"/><path fill="currentColor" d="M11.28 12.5h13.44a1 1 0 0 0 0-2H11.28a1 1 0 0 0 0 2" class="clr-i-outline clr-i-outline-path-4"/><path fill="none" d="M0 0h36v36H0z"/></svg>
            @endif

            @if(!$readonly && RequestHub::hasTable('likes'))
                @if($photo->likes->contains('user_id', Auth::id()))
                    <svg wire:click="toggleLike" class="svgbutton align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="rgb(220, 53, 69)" d="M33 7.64c-1.34-2.75-5.2-5-9.69-3.69A9.87 9.87 0 0 0 18 7.72a9.87 9.87 0 0 0-5.31-3.77C8.19 2.66 4.34 4.89 3 7.64c-1.88 3.85-1.1 8.18 2.32 12.87C8 24.18 11.83 27.9 17.39 32.22a1 1 0 0 0 1.23 0c5.55-4.31 9.39-8 12.07-11.71c3.41-4.69 4.19-9.02 2.31-12.87" class="clr-i-solid clr-i-solid-path-1"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                @else
                    <svg wire:click="toggleLike" class="svgbutton align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M18 32.43a1 1 0 0 1-.61-.21C11.83 27.9 8 24.18 5.32 20.51C1.9 15.82 1.12 11.49 3 7.64c1.34-2.75 5.19-5 9.69-3.69A9.87 9.87 0 0 1 18 7.72a9.87 9.87 0 0 1 5.31-3.77c4.49-1.29 8.35.94 9.69 3.69c1.88 3.85 1.1 8.18-2.32 12.87c-2.68 3.67-6.51 7.39-12.07 11.71a1 1 0 0 1-.61.21M10.13 5.58A5.9 5.9 0 0 0 4.8 8.51c-1.55 3.18-.85 6.72 2.14 10.81A57 57 0 0 0 18 30.16a57 57 0 0 0 11.06-10.83c3-4.1 3.69-7.64 2.14-10.81c-1-2-4-3.59-7.34-2.65a8 8 0 0 0-4.94 4.2a1 1 0 0 1-1.85 0a7.93 7.93 0 0 0-4.94-4.2a7.3 7.3 0 0 0-2-.29" class="clr-i-outline clr-i-outline-path-1"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                @endif
            @endif
            @if(RequestHub::hasTable('likes'))
                <span>
                    {{ __(':count likes', ['count' => $photo->likes->count()]) }}
                </span>
            @endif

            @if($admin)
                <a href="/p/{{ $photo->id }}/destroy" class="btn btn-outline-danger btn-sm float-right" @if($readonly) disabled @endif>{{ __('Delete') }}</a>
            @endif
        </div>

        @if($ad)
            <a href="{{ $ad['url'] }}">
                <img class="ad" src="{{ $ad['img'] }}" alt="{{ $ad['name'] }}"/>
            </a>
        @endif

        <div class="comments">
            <div class="media mb-3">
                <a class="user" href ="{{'/' . $photo->user->username}}">
                    <img class="rounded-circle img-thumbnail p-0 me-2" src="/{{ $photo->user->avatar }}" alt="{{ $photo->user->avatar }}" height="50" width="50">  
                </a>
                <div class="media-body">
                    <a class="user" href="/{{$photo->user->username}}">
                        <h4 class="my-0 fs-6">{{ $photo->user->username }}</h4>
                    </a>
                    <span><b>{!! $photo->html !!}</b></span>
                </div>
            </div>

            @if(RequestHub::hasTable('comments'))
                @foreach($photo->comments as $comment)
                    <div class="media mb-3">
                        @if ($comment->user)
                            <a class="user" href ="{{'/' . $comment->user->username}}">
                                <img class="rounded-circle img-thumbnail p-0 me-2" src="/{{ $comment->user->avatar }}" alt="{{ $comment->user->avatar }}" height="50" width="50">  
                            </a>
                        @else
                            <img class="rounded-circle img-thumbnail p-0 me-2" src="/avatar.png" alt="default avatar" height="50" width="50"> 
                        @endif
                        
                        <div class="media-body">
                            @if ($comment->user)
                                <a class="user" href="/{{$comment->user->username}}">
                                    <h4 class="my-0 fs-6">{{ $comment->user->username }}</h4>
                                </a>
                            @else
                                <h4 class="my-0 fs-6 text-muted fst-italic">{{ __('Deleted User') }}</h4> 
                            @endif
                            <span>{!! $comment->html !!}</span>
                            @if(!$readonly && $admin)
                                <a wire:click.prevent="deleteComment({{ $comment->id }})" href="#" class="float-right">
                                    <span>x</span>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        @if($showInput)
            <div class="input-group">
                <input type="text" class="form-control" wire:model.defer="comment" id="comment" placeholder="{{ __('Add a Comment') }}" aria-label="Comment">
                <button class="btn btn-primary" type="button" wire:click="postComment">{{ __('Add') }}</button>
            </div>
        @endif
    </div>

    <style>
    .card-body { padding:1rem 0; }
    h5 { padding-left:1rem }
    .card-title img { height:50px; width:50px; }
    .card-title a { color: #333 }
    .photo { display: block; margin: 0 auto; }
    .svgbutton { height:24px; width:24px; }
    .svgbutton:hover { cursor: pointer; }
    .ad { width:100%; margin-top: -5px; margin-bottom: 20px; }
    .comments p { margin-bottom: 0.3rem; }
    .controls { margin: 1rem; }
    .comments { margin: 0 1rem; }
    .input-group { padding: 1rem; }
    </style>
</div>