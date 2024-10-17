<div class="d-inline">
    @if(is_null($newPassword))
        <button 
            wire:click="getNewPassword" 
            class="btn btn-outline-dark btn-sm" 
            {{ $isReadOnly ? 'disabled' : '' }}
        >
            {{ __('Reset Password') }}
        </button>
    @else
        <code>{{ $newPassword }}</code>
    @endif
</div>