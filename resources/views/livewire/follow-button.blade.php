<div>
    @if(!$isFollowing)
        <button wire:click="follow" wire:loading.attr="disabled" wire:target="follow" @if(RequestHub::isReadOnly()) disabled @endif type="button" class="btn btn-success">
            <span wire:loading wire:target="follow" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            {{ __('Follow') }}
        </button>
    @else
        <button wire:click="unfollow" wire:loading.attr="disabled" wire:target="unfollow" @if(RequestHub::isReadOnly()) disabled @endif type="button" class="btn btn-outline-danger">
            <span wire:loading wire:target="unfollow" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            {{ __('Unfollow') }}
        </button>
    @endif
</div>