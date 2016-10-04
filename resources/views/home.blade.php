@extends('layouts.app')

@section('content')
<div id="username" style="display: none;">{{ Auth::user()->username }}</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 40px;"> <!--Will remove all inline stylin glater-->
            	@foreach ($photos as $photo)
                    @include('photo', ['photo' => $photo, 'single' => false])
            	@endforeach
                
                {{ $photos->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    
</script>
