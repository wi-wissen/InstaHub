<div class="well">
    @if($single)
        <img src="{{ '../photos/' . $photo->url }}" class="img-responsive"/><br>
    @else
        <img src="{{ 'photos/' . $photo->url }}" class="img-responsive"/><br>
    @endif

    <div class="user-data">
        <h4><b><a href="#" style="color: #333">{{ ucfirst($photo->user->username)  }}</a></b></h4>
    </div>
    <h3>{{ $photo->description }}</h3>
    <div class="meta">
        <form class="like_form" method="post">
            <input type="hidden" value="{{ $photo->id }}" name="photo_id" >
            {{ csrf_field() }}
            <button class="btn btn-primary btn-small like-btn"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;Like <span>{{ count($photo->likes) }}</span></button>
        </form>
        {{-- <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp; {{ count($photo->likes) }} Likes --}}
        <span class="glyphicon glyphicon-comment"></span>&nbsp; {{ count($photo->comments) }} Comments    
    </div>
    <br>
    <form method="post" class="comment_form">

        <div class="form-group">
            <textarea name="comment" class="form-control" id="comment" placeholder="Add a Comment"></textarea>
        </div>
        
        <input type="hidden" value="{{ $photo->id }}" name="photo_id" >

        <div class="form-group">
            {{ csrf_field()  }}
            <input type="submit" class="btn btn-primary" value="Comment">
        </div>
        
        <div class="comments" class="{{ rand() }}">
            <div class="list-group">
                @foreach ($photo->comments as $comment)
                    <div class="list-group-item">
                        <b><a href="user/{{ $comment->user->username }}">{{ $comment->user->username }}</a></b>: {{ $comment->body }}
                    </div>
                @endforeach
            </div>
        </div>

    </form>

    

</div>