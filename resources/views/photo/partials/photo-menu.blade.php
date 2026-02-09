{{-- Dropdown-Menü: 3-Punkte-Menü pro Foto-Karte (rechts oben neben dem Profilnamen) --}}
<div class="dropdown" style="padding-right:1.00rem;">
    <button class="btn btn-link text-dark p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
            <circle cx="8" cy="2.5" r="1.5"/><circle cx="8" cy="8" r="1.5"/><circle cx="8" cy="13.5" r="1.5"/>
        </svg>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" @if(Auth::user()->allowed('dba') && isset($photo->score)) style="min-width: 320px;" @endif>
        {{-- Photo ansehen --}}
        <li>
            <a class="dropdown-item" href="/p/{{ $photo->id }}">
                {{ __('View Photo') }}
            </a>
        </li>
        {{-- Link kopieren --}}
        <li>
            <a class="dropdown-item" href="#" onclick="navigator.clipboard.writeText(window.location.origin + '/p/{{ $photo->id }}'); this.innerHTML='<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; fill=&quot;currentColor&quot; class=&quot;me-1&quot; viewBox=&quot;0 0 16 16&quot;><path d=&quot;M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z&quot;/></svg> {{ __('Copied!') }}'; setTimeout(() => this.innerHTML='{{ __('Copy Link') }}', 2000); return false;">
                {{ __('Copy Link') }}
            </a>
        </li>
        {{-- Folgen/Entfolgen --}}
        @if(RequestHub::hasTable('follows') && Auth::id() !== $photo->user_id)
        <li><hr class="dropdown-divider"></li>
        <li>
            @if($followingIds->contains($photo->user_id))
                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); fetch('/api/me/follow/{{ $photo->user->username }}', {method:'DELETE', headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}}).then(() => location.reload());">
                    {{ __('Unfollow') }}
                </a>
            @else
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); fetch('/api/me/follow/{{ $photo->user->username }}', {method:'POST', headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}}).then(() => location.reload());">
                    {{ __('Follow') }}
                </a>
            @endif
        </li>
        @endif
        {{-- Score-Details (nur wenn berechnet und User dba-Berechtigung hat) --}}
        @if(isset($photo->score))
        <li><hr class="dropdown-divider"></li>
        <li x-data="{ open: false }">
            <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" @click.prevent.stop="open = !open">
                Score: {{ round($photo->score, 4) }}
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"
                     :style="open ? 'transform: rotate(180deg); transition: transform 0.2s' : 'transition: transform 0.2s'">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </a>
            <div x-show="open" x-cloak x-transition class="px-4 py-1 font-monospace" style="font-size: 0.85rem; line-height: 1.8;">
                
                <div>{{ __('Base score') }}: <strong>{{ $photo->score_affinity ?? 1 }}</strong></div>

                @if(RequestHub::hasTable('likes'))
                <div>+ {{ __('Likes') }}: <strong>{{ $photo->score_edge_likes ?? 0 }}</strong></div>
                @endif

                @if(RequestHub::hasTable('comments'))
                <div>+ {{ __('Comments') }}: <strong>{{ $photo->score_edge_comments ?? 0 }}</strong></div>
                @endif

                @if (($photo->score_weights['decay'] ?? 1) != 0)
                    @php
                        $subtotal = ($photo->score_base ?? 1) + ($photo->score_edge_likes ?? 0) + ($photo->score_edge_comments ?? 0);
                    @endphp
                    <div class="border-top mt-1 pt-1">= {{ $subtotal }}</div>
                    <div>× {{ __('Time Decay') }}: <strong>{{ $photo->score_decay ?? 1 }}</strong></div>
                @endif

                <div class="border-top mt-1 pt-1 fw-bold">= {{ round($photo->score, 4) }}</div>
            </div>
        </li>
        @endif
    </ul>
</div>
