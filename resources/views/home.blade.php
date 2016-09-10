@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 40px;"> <!--Will remove all inline stylin glater-->
            	@foreach ($photos as $photo)
                    <div class="well">
                        <img src="{{ 'photos/' . $photo->url }}" class="img-responsive"/><br>
                        <div class="user-data">
                            <h4><b><a href="#" style="color: #333">{{ ucfirst($photo->user->username)  }}</a></b></h4>
                        </div>
                        <h3>{{ $photo->description }}</h3>
                        <div class="meta">
                            <form action="{{ route('like', $photo->id) }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit">Like</button>
                            </form>
                            <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp; {{ count($photo->likes) }} Likes
                            <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp; 5 Comments
                        </div>
                    </div>
            	@endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    
</script>
