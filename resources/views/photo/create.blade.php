@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload new Photo') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/upload') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="photo" class="form-label">{{ __('Photo') }}</label>
                            <input type="file" 
                                   class="form-control @error('photo') is-invalid @enderror" 
                                   id="photo" 
                                   name="photo"
                                   accept="image/png, image/jpeg, image/jpg, image/gif">
                            <div id="photoHelp" class="form-text">
                                {{ __('File Size Limit') . ': ' . $filesize / 1024 . 'MB'}}
                            </div>
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea name="description" 
                                id="description" 
                                class="form-control @error('description') is-invalid @enderror" 
                            ></textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection