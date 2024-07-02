<div class="position-relative">
    <input
        type="text"
        class="form-control"
        placeholder="{{ __('Search Users') }}"
        wire:model.live.debounce.250ms="query"
        wire:keydown.escape="resetDropdown"
        wire:keydown.tab="resetDropdown"
    >

    @if ($showDropdown && !empty($users))
        <div class="position-absolute top-100 start-0 mt-1 w-100 bg-white border rounded shadow-sm" style="z-index: 1000;">
            @foreach ($users as $user)
                <a 
                    href="/{{ $user->username }}"
                    class="dropdown-item d-flex align-items-center p-2 text-decoration-none"
                >
                    <img
                        class="rounded-circle me-3"
                        src="/{{ $user->avatar }}"
                        alt="{{ $user->username }}"
                        style="width: 40px; height: 40px;"
                    />
                    <span class="username">{{ $user->username }}</span>
                </a>
            @endforeach
        </div>
    @endif
</div>