<div class="well">
    <div class="user-data">
        <h4><img class="img-circle" src="/{{ $photo->user->avatar }}" alt="{{ $photo->user->avatar }}" height="30" width="30"> <a href="/user/{{ $photo->user->username }}" style="color: #333">{{ $photo->user->username  }}</a></h4>
    </div>

    @if($single)
        <img src="{{ '../' . $photo->url }}" class="img-responsive" style="display: block;margin: 0 auto;"/><br>
    @else
        <a href="../photo/{{ $photo->id }}"><img src="../{{ '' . $photo->url }}" class="img-responsive" style="display: block;margin: 0 auto; width:100%"/></a><br>
    @endif

    @if (Schema::hasTable('likes'))
    <div class="meta" style='padding-bottom:20px;'>
        <form class="like_form" data-id="{{ $photo->id }}" method="post" style='display:inline;'>
            <input type="hidden" value="{{ $photo->id }}" name="photo_id" >
            {{ csrf_field() }}
            <button class="btn btn-primary btn-small like-btn"><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;<span id="likes{{ $photo->id }}">{{ count($photo->likes) }}</span> likes</button>
        </form>
        {{-- <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp; {{ count($photo->likes) }} Likes --}}  
        @if (Auth::user()->id == $photo->user->id || Auth::user()->allowed('dba'))
            <a href="{{'../photo/' . $photo->id . '/destroy'}}" class="btn btn-danger pull-right" role="button"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
        @endif
    </div>
    @else
    <div class="meta text-right" style='padding-bottom:20px;'>    
        {{-- <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp; {{ count($photo->likes) }} Likes --}}  
        @if (Auth::user()->id == $photo->user->id || Auth::user()->allowed('dba'))
            <a href="{{'../photo/' . $photo->id . '/destroy'}}" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
        @endif
    </div>
    @endif

    @if (Schema::hasTable('ads') && $single)
    @if ($ad != null)
	<a href="{{$ad->url}}"><img style="width:100%;margin-top: -5px;margin-bottom: 20px;" src="{{$ad->img}}" alt="{{$ad->name}}" /></a>
	@endif
    @endif

    <div class="comments" class="{{ rand() }}">
            <div class="list-group" id="list-group{{ $photo->id }}">
                <div class="list-group-item">
                        <b><a href="/user/{{ $photo->user->username }}">{{ $photo->user->username }}</a></b>: <b>{!! $photo->htmldescription() !!}</b>
                </div>
                @if (Schema::hasTable('comments'))
                @foreach ($photo->comments as $comment)
                    <div class="list-group-item">
                        <b><a href="/user/{{ $comment->user->username }}">{{ $comment->user->username }}</a></b>: {{ $comment->body }}
                        @if (Auth::user()->id == $photo->user->id || Auth::user()->id == $comment->user->id || Auth::user()->allowed('dba'))
                            <a href="{{'../comment/' . $comment->id . '/destroy'}}" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                        @endif
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    @if (Schema::hasTable('comments'))
    <form method="post" class="comment_form" data-id="{{ $photo->id }}">

        <div class="form-group">
            <textarea name="comment{{ $photo->id }}" class="form-control" id="comment" placeholder="Add a Comment"></textarea>
        </div>
        
        <input type="hidden" value="{{ $photo->id }}" name="photo_id" >

        <div class="form-group">
            {{ csrf_field()  }}
            <input type="submit" class="btn btn-primary" value="Comment">
        </div>
        
    </form>
    @endif
</div>