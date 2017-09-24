@extends('layouts.app')

@section('content')
<div id="username" style="display: none;">{{ Auth::user()->username }}</div>
<div class="container">
    @include('flash::message')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            	@foreach ($photos as $photo)
                    @include('photo.photo', ['photo' => $photo, 'single' => false])
            	@endforeach
                
                @if(!empty($photos))
                    {{ $photos->links() }}
                @else
                    @if (Schema::hasTable('follows') && Schema::hasTable('follows')) 
                    <div class="alert alert-info alert-important" role="alert">
                        Nothing to show. <strong>Follow some great <a href="/user">Members</a>!</strong>
                    </div>
                    @else 
                    <div class="alert alert-success alert-important" role="alert">
                        You are logged in.</strong>
                    </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    
</script>
