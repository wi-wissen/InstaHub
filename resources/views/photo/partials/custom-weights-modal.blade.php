{{-- Modal: Benutzerdefinierte Gewichtungen für den Feed-Algorithmus --}}
<div class="modal fade" id="customWeightsModal" tabindex="-1" aria-labelledby="customWeightsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="GET" action="{{ Request::url() }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="customWeightsModalLabel">{{ __('Custom Sorting') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="sort" value="custom">

                    @php $step = 0; @endphp

                    {{-- Schritt: Affinität (nur mit follows-Tabelle sinnvoll) --}}
                    @if(RequestHub::hasTable('follows') && (RequestHub::hasTable('likes') || RequestHub::hasTable('comments')))
                    @php $step++; @endphp
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>{{ __('Step') }} {{ $step }}: {{ __('Affinity') }}</strong>
                            <small class="text-muted d-block">
                                {{ __('affinity_explanation_base') }}
                                @if(RequestHub::hasTable('likes') || RequestHub::hasTable('comments'))
                                    {{ __('affinity_explanation_interactions') }}
                                @else
                                    {{ __('affinity_explanation_score_only') }}
                                @endif
                                {{ __('affinity_explanation_unknown') }}
                            </small>
                        </div>
                        <div class="card-body">
                            @if(RequestHub::hasTable('likes'))
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="weight_like_affinity" class="form-label mb-0">
                                        {{ __('Like Affinity') }}
                                    </label>
                                    <span id="val_like_affinity" class="badge bg-primary">{{ session('sort_feed_weights.like_affinity', 1) }}</span>
                                </div>
                                <input type="range" class="form-range" id="weight_like_affinity" name="weights[like_affinity]"
                                       min="0" max="10" step="1"
                                       value="{{ session('sort_feed_weights.like_affinity', 1) }}"
                                       oninput="document.getElementById('val_like_affinity').textContent = this.value">
                                <small class="text-muted">{{ __('like_affinity_help') }}</small>
                            </div>
                            @endif

                            @if(RequestHub::hasTable('comments'))
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="weight_comment_affinity" class="form-label mb-0">
                                        {{ __('Comment Affinity') }}
                                    </label>
                                    <span id="val_comment_affinity" class="badge bg-primary">{{ session('sort_feed_weights.comment_affinity', 2) }}</span>
                                </div>
                                <input type="range" class="form-range" id="weight_comment_affinity" name="weights[comment_affinity]"
                                       min="0" max="10" step="1"
                                       value="{{ session('sort_feed_weights.comment_affinity', 2) }}"
                                       oninput="document.getElementById('val_comment_affinity').textContent = this.value">
                                <small class="text-muted">{{ __('comment_affinity_help') }}</small>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    {{-- Schritt: Likes & Kommentare auf dem Foto --}}
                    @if(RequestHub::hasTable('likes') || RequestHub::hasTable('comments'))
                    @php $step++; @endphp
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>{{ __('Step') }} {{ $step }}: {{ __('Likes & Comments on the post') }}</strong>
                            <small class="text-muted d-block">
                                {{ __('edge_explanation') }}
                                @if(RequestHub::hasTable('follows'))
                                    {{ __('edge_explanation_affinity') }}
                                @endif
                            </small>
                        </div>
                        <div class="card-body">
                            @if(RequestHub::hasTable('likes'))
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="weight_like_edge" class="form-label mb-0">
                                        {{ __('Like Edge Weight') }}
                                    </label>
                                    <span id="val_like_edge" class="badge bg-primary">{{ session('sort_feed_weights.like_edge', 1) }}</span>
                                </div>
                                <input type="range" class="form-range" id="weight_like_edge" name="weights[like_edge]"
                                       min="0" max="10" step="1"
                                       value="{{ session('sort_feed_weights.like_edge', 1) }}"
                                       oninput="document.getElementById('val_like_edge').textContent = this.value">
                                <small class="text-muted">{{ __('like_edge_help') }}</small>
                            </div>
                            @endif

                            @if(RequestHub::hasTable('comments'))
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="weight_comment_edge" class="form-label mb-0">
                                        {{ __('Comment Edge Weight') }}
                                    </label>
                                    <span id="val_comment_edge" class="badge bg-primary">{{ session('sort_feed_weights.comment_edge', 2) }}</span>
                                </div>
                                <input type="range" class="form-range" id="weight_comment_edge" name="weights[comment_edge]"
                                       min="0" max="10" step="1"
                                       value="{{ session('sort_feed_weights.comment_edge', 2) }}"
                                       oninput="document.getElementById('val_comment_edge').textContent = this.value">
                                <small class="text-muted">{{ __('comment_edge_help') }}</small>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    {{-- Schritt: Aktualität --}}
                    @php $step++; @endphp
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>{{ __('Step') }} {{ $step }}: {{ __('Time Decay') }}</strong>
                            <small class="text-muted d-block">{{ __('decay_explanation') }}</small>
                        </div>
                        <div class="card-body">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="weight_decay_check"
                                       {{ session('sort_feed_weights.decay', 1) == 1 ? 'checked' : '' }}
                                       onchange="document.getElementById('weight_decay').value = this.checked ? 1 : 0;">
                                <label class="form-check-label" for="weight_decay_check">
                                    {{ __('Older posts get lower scores') }}
                                </label>
                                <input type="hidden" id="weight_decay" name="weights[decay]" value="{{ session('sort_feed_weights.decay', 1) }}">
                            </div>
                            <small class="text-muted d-block mt-2">{{ __('decay_help') }}</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Apply') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>