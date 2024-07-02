<div>
    <div class="container">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card mb-4">
                    <div class="card-header">Statistik</div>
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            @if(count($tableStatus) > 0)
                                @foreach($tableStatus as $table)
                                    <div><strong>{{ $table['name'] }}:</strong> {{ $table['count'] }} {{ __('rows') }}</div>
                                @endforeach
                            @else
                                <div class='alert alert-warning'>Keine Tabellen gefunden.</div>
                            @endif
                        </div>
                        <div class="d-flex flex-column align-items-end">
                            @if ($adminPassword)
                                <div class="mb-2">
                                    <strong>Admin Password:</strong> <code>{{ $adminPassword }}</code>
                                </div>
                            @else
                            <button wire:click="resetAdminPassword" class="btn btn-primary">
                                <span wire:loading wire:target="resetAdminPassword" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span wire:loading wire:target="resetAdminPassword" class="visually-hidden">Loading...</span>
                                {{ __('Reset Admin Password') }}
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header">{{ __('Tables') }}</div>
                    <div class="card-body">
                        @foreach(['comments', 'follows', 'likes', 'tags', 'ads', 'analytics'] as $table)
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <button wire:click="fillTables('{{ $table }}', 'create')" class="btn btn-success btn-block">
                                    <span wire:loading wire:target="fillTables('{{ $table }}', 'create')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span wire:loading wire:target="fillTables('{{ $table }}', 'create')" class="visually-hidden">Loading...</span>
                                    (Re)Create {{ ucfirst($table) }}
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button wire:click="fillTables('{{ $table }}', 'fill')" class="btn btn-primary btn-block">
                                    <span wire:loading wire:target="fillTables('{{ $table }}', 'fill')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span wire:loading wire:target="fillTables('{{ $table }}', 'fill')" class="visually-hidden">Loading...</span>
                                    (Re)Fill {{ ucfirst($table) }}
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button wire:click="fillTables('{{ $table }}', 'drop')" class="btn btn-danger btn-block">
                                    <span wire:loading wire:target="fillTables('{{ $table }}', 'drop')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span wire:loading wire:target="fillTables('{{ $table }}', 'drop')" class="visually-hidden">Loading...</span>
                                    Drop {{ ucfirst($table) }}
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">{{ __('Table') }} Photos</div>
                    <div class="card-body">
                        <div class="alert alert-warning alert-important" role="alert">{{ __('This table is necessary for all tables above!') }}</div>
                        <div class="row">
                            <div class="col-md-4">
                                <button wire:click="fillTables('photos', 'create')" class="btn btn-success btn-block">
                                    <span wire:loading wire:target="fillTables('photos', 'create')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span wire:loading wire:target="fillTables('photos', 'create')" class="visually-hidden">Loading...</span>
                                    (Re)Create Photos
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button wire:click="fillTables('photos', 'fill')" class="btn btn-primary btn-block">
                                    <span wire:loading wire:target="fillTables('photos', 'fill')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span wire:loading wire:target="fillTables('photos', 'fill')" class="visually-hidden">Loading...</span>
                                    (Re)Fill Photos
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button wire:click="fillTables('photos', 'drop')" class="btn btn-danger btn-block">
                                    <span wire:loading wire:target="fillTables('photos', 'drop')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span wire:loading wire:target="fillTables('photos', 'drop')" class="visually-hidden">Loading...</span>
                                    Drop Photos
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('Table') }} Users</div>
                    <div class="card-body">
                        <div class="alert alert-warning alert-important" role="alert">{{ __('This table is necessary for all tables above!') }}</div>
                        <div class="row">
                            <div class="col-md-4">
                                <button wire:click="fillTables('users', 'create')" class="btn btn-success btn-block">
                                    <span wire:loading wire:target="fillTables('users', 'create')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span wire:loading wire:target="fillTables('users', 'create')" class="visually-hidden">Loading...</span>
                                    (Re)Create Users
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button wire:click="fillTables('users', 'fill')" class="btn btn-primary btn-block">
                                    <span wire:loading wire:target="fillTables('users', 'fill')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span wire:loading wire:target="fillTables('users', 'fill')" class="visually-hidden">Loading...</span>
                                    (Re)Fill Users
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button wire:click="fillTables('users', 'drop')" class="btn btn-danger btn-block">
                                    <span wire:loading wire:target="fillTables('users', 'drop')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span wire:loading wire:target="fillTables('users', 'drop')" class="visually-hidden">Loading...</span>
                                    Drop Users
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>