<div class="container">
    <form wire:submit.prevent="save" class="needs-validation" novalidate>
        <div class="row g-3">
            <div class="col-md-3">
                <label for="generation" class="form-label">{{ __('Default Generation') }}</label>
                <select id="generation" wire:model="generation" class="form-select" required>
                    @foreach($availableGenerations as $key => $gen)
                        <option value="{{ $key }}">{{ __($gen['name']) }}</option>
                    @endforeach
                </select>
                @error('generation') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-3">
                <label for="hubDefaultCreating" class="form-label">{{ __('Default Hub Creating') }}</label>
                <select id="hubDefaultCreating" wire:model="hubDefaultCreating" class="form-select" required>
                    <option value="users">{{ __('Minimal') }}</option>
                    <option value="all_empty">{{ __('All, but Empty') }}</option>
                    <option value="all_full">{{ __('All and Full') }}</option>
                </select>
                @error('hubDefaultCreating') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-3">
                <label for="hubDefaultQueryLevel" class="form-label">{{ __('Allowed Query Level') }}</label>
                <select id="hubDefaultQueryLevel" wire:model="hubDefaultQueryLevel" class="form-select" required>
                    <option value="sql">{{ __('SQL') }}</option>
                    <option value="gui">{{ __('GUI') }}</option>
                    <option value="ai" @if(!Auth::user()->hasTokens()) disabled @endif>{{ __('AI') }}</option>
                </select>
                @error('hubDefaultQueryLevel') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save Settings') }}
                </button>
            </div>
        </div>
    </form>

    @if($generation < config('hub.default_generation'))
        <div class="alert alert-warning mt-2" role="alert">
            {{ __('There is a newer recommended Hub generation.') }}
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success mt-4" role="alert">
            {{ session('message') }}
        </div>
    @endif
</div>