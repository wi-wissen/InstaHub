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
						<div class="form-group">
                            <label for="photo">Photo</label>

                            <div class="custom-file">
                                <input 
									type="file" 
									class="custom-file-input @error('photo') is-invalid @enderror" 
									id="photo"
									name="photo"
									accept="image/png, image/jpeg, image/jpg, image/gif"
								>
                                <label class="custom-file-label" for="photo">{{ __('Choose file') }}</label>
								<small id="fileHelpBlock" class="form-text text-muted">
                                    {{ __('File Size Limit') . ': ' . $filesize . 'MB'}}
                                </small>

								@error('photo')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

                            </div>
						</div>
						
						{{ csrf_field() }}
						
						<div class="form-group">
							<label for="desc" >{{ __('Description') }}</label>
							<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description..."></textarea>

							@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

						</div>
						<div class="form-group">
							<button action="submit" class="btn btn-primary">{{ __('Upload') }}</button>
						</div>
					</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
	
@endsection