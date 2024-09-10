<div>
    <div class="container">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row mb-3 align-items-center">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" wire:model.live="search" class="form-control" id="search" placeholder="{{ __('Search Hub') }}" aria-label="{{ __('Search') }}" aria-describedby="button-search">
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <a href="{{ route('hubs.create') }}" class="btn btn-success">{{ __('Create Hub') }}</a>
                    </div>
                </div>
                @if($hubs->count())
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>{{ __('Hub') }}</td>
                                <td>{{ __('Admin') }}</td>
                                <td>{{ __('Created at') }}</td>
                                <td>{{ __('Action') }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hubs as $hub)
                                <tr>
                                    <td>
                                        <a href="{{ str_replace('{subdomain}', $hub->name, config('app.hub_domain')) }}">{{ $hub->name }}</a>
                                    </td>
                                    <td>
                                        {{ $hub->admin }}
                                    </td>
                                    <td>
                                        {{ $hub->created_at->format('d.m.Y') }}
                                    </td>
                                    <td class="d-flex align-items-center">
                                        @if(!$hub->activated && !$hub->readonly)
                                            <button wire:click="setActivate({{ $hub->id }}, true)" class="me-2 btn btn-outline-dark">
                                                <span wire:loading wire:target="setActivate({{ $hub->id }}, true)" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                <span wire:loading wire:target="setActivate({{ $hub->id }}, true)" class="visually-hidden">Loading...</span>
                                                {{ __('Activate') }}
                                            </button>
                                        @endif
                                        
                                        @if(!$hub->readonly)
                                            <a href="{{ route('hubs.show', $hub->id) }}" class="me-2 btn btn-primary">{{ __('Manage Database') }}</a>
                                        @endif
                                                                                
                                        @if($hub->activated && $hub->hasWorkingUser)
                                            <a href="{{ route('hubs.redirect', $hub->id) }}" target="_blank" class="me-2 btn btn-outline-dark">{{ __('Login') }}</a>
                                        @endif
                                        
                                        @if(!$hub->readonly)
                                            <button wire:click="fillTables({{ $hub->id }}, 'photos,tags,likes,follows,comments,analytics,ads')" class="me-2 btn btn-outline-dark">
                                                <span wire:loading wire:target="fillTables({{ $hub->id }}, 'photos,tags,likes,follows,comments,analytics,ads')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                <span wire:loading wire:target="fillTables({{ $hub->id }}, 'photos,tags,likes,follows,comments,analytics,ads')" class="visually-hidden">Loading...</span>
                                                {{ __('Fill all Tables') }}
                                            </button>
                                        @endif

                                        <div class="me-2 d-inline-flex align-items-center">
                                            <select wire:change="setQueryLevel({{ $hub->id }}, $event.target.value)" 
                                                    class="form-select" 
                                                    style="width: auto;">
                                                <option value="sql" {{ $hub->query_level == 'sql' ? 'selected' : '' }}>{{ __('SQL') }}</option>
                                                <option value="gui" {{ $hub->query_level == 'gui' ? 'selected' : '' }}>{{ __('GUI') }}</option>
                                                <option value="ai" {{ $hub->query_level == 'ai' ? 'selected' : '' }} 
                                                        @if(!Auth::user()->hasTokens()) disabled @endif>{{ __('AI') }}</option>
                                            </select>

                                            <div wire:loading wire:target="setQueryLevel" class="spinner-border spinner-border-sm" role="status">
                                                <span class="visually-hidden">{{ __('Loading...') }}</span>
                                            </div>
                                        </div>
                                        
                                        @if($hub->readonly)
                                            <button wire:click="setReadonly({{ $hub->id }}, false)" class="me-2 btn btn-outline-dark">
                                                <span wire:loading wire:target="setReadonly({{ $hub->id }}, false)" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                <span wire:loading wire:target="setReadonly({{ $hub->id }}, false)" class="visually-hidden">Loading...</span>
                                                {{ __('Run') }}
                                            </button>
                                        @else
                                            <button wire:click="setReadonly({{ $hub->id }}, true)" class="me-2 btn btn-danger">
                                                <span wire:loading wire:target="setReadonly({{ $hub->id }}, true)" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                <span wire:loading wire:target="setReadonly({{ $hub->id }}, true)" class="visually-hidden">Loading...</span>
                                                {{ __('Maintenance') }}
                                            </button>
                                        @endif
                                        
                                        @if($hub->activated)
                                            <button wire:click="setActivate({{ $hub->id }}, false)" class="me-2 btn btn-danger">
                                                <span wire:loading wire:target="setActivate({{ $hub->id }}, false)" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                <span wire:loading wire:target="setActivate({{ $hub->id }}, false)" class="visually-hidden">Loading...</span>
                                                {{ __('Deactivate') }}
                                            </button>
                                        @endif

                                        <button wire:click="destroy({{ $hub->id }})" wire:confirm="Are you sure you want to delete this Hub?" class="me-2 btn btn-danger">
                                            <span wire:loading wire:target="destroy({{ $hub->id }})" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            <span wire:loading wire:target="destroy({{ $hub->id }})" class="visually-hidden">Loading...</span>
                                            {{ __('Delete') }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @elseif($search)
                    <div class="alert alert-primary alert-important" role="alert">
                        {{ __('messages.noHubsFound') }}
                    </div>
                @else
                    <div class="alert alert-primary alert-important" role="alert">
                        {{ __('messages.noHubs') }}
                    </div>
                @endif
                {{ $hubs->links() }}
            </div>
        </div>
    </div>
</div>