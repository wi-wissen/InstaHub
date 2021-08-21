@extends('layouts.app')

@section('content')
<div class="container" id="container">
	@include('flash::message')

	<div class="row justify-content-center">
		<div class="col-md-10">
			<photo-show
				:photo = "photo"
				:readonly = "readonly"
				@if (RequestHub::hasTable('ads'))
				:ad = "ad"
				@endif
				:admin = "admin"
			></photo-show>

			
      </div>
    </div>
</div>
@endsection
@section('script')
<script>
	var data = {
		photo:{!! $photo !!}.data,
		ad:{!! isset($ad) ? $ad . '.data': 'null' !!},
		readonly: {{ (RequestHub::isReadOnly()) ? 'true' : 'false' }},
		admin: {{(Auth::user()->allowed('dba')) ? 'true' : 'false'}}
	}
</script>
@endsection