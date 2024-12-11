<div class="d-inline">
    <button
        wire:click="toggleActive"
        class="btn btn-outline-dark btn-sm"
        {{ $isReadOnly ? 'disabled' : '' }}
    >
        {{ ($user->is_active) ? __('Deactivate') : __('Activate') }}
    </button>
</div>