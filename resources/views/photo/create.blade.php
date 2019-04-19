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
                                <input type="file" class="custom-file-input" id="photo">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>

                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
						</div>
						
						{{ csrf_field() }}
						
						<div class="form-group">
							<label for="desc" >Description</label>
							<textarea name="description" id="description" class="form-control" placeholder="Description..."></textarea>
						</div>
						<div class="form-group">
							<button action="submit" class="btn btn-primary">Upload</button>
						</div>
					</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
	
@endsection