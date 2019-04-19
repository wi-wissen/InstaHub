<div class="card">
  <div class="card-body" style="padding:1.00rem 0;">
    <h5 style="padding-left:1.00rem;" class="card-title"><img class="rounded-circle img-thumbnail" src="/{{ $photo->user->avatar }}" alt="{{ $photo->user->avatar }}" height="50" width="50"> <a href="/user/{{ $photo->user->username }}" style="color: #333">{{ $photo->user->username  }}</a></h5>
    @if($single)
        <img src="{{ '../' . $photo->url }}" class="img-fluid" style="display: block;margin: 0 auto;"/>
    @else
        <a href="../photo/{{ $photo->id }}"><img src="../{{ '' . $photo->url }}" class="img-fluid" style="display: block;margin: 0 auto; width:100%"/></a>
    @endif

    <div style="margin:1rem;">
    @if (Schema::hasTable('comments'))
    <span {{ Session::get('readonly') ? "disabled" : "" }}><img src="/clarity/chat-bubble-line.svg" width="24" height="24" class="align-middle" alt=""></span>
    @endif

    @if (Schema::hasTable('likes'))
        <form class="like_form" data-id="{{ $photo->id }}" method="post" style='display:inline;'>
            <input type="hidden" value="{{ $photo->id }}" name="photo_id" >
            {{ csrf_field() }}
            <span {{ Session::get('readonly') ? "disabled" : "" }}><img src="/clarity/heart-line.svg" width="24" height="24" class="align-middle" alt=""></span>&nbsp;<span id="likes{{ $photo->id }}">{{ count($photo->likes) }}</span> likes
        </form>
        @if (Auth::user()->id == $photo->user->id || Auth::user()->allowed('dba'))
            <a {{ Session::get('readonly') ? "disabled" : "" }} href="{{'../photo/' . $photo->id . '/destroy'}}" class="btn btn-outline-danger btn-sm float-right" role="button">Delete</a>
        @endif
    </div>
    @else
    <div class="meta text-right" style='padding-bottom:20px;'>    
        @if (Auth::user()->id == $photo->user->id || Auth::user()->allowed('dba'))
            <a {{ Session::get('readonly') ? "disabled" : "" }} href="{{'../photo/' . $photo->id . '/destroy'}}" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
        @endif
    </div>
    @endif

    @if (Schema::hasTable('ads') && $single)
    @if ($ad != null)
	<a href="{{$ad->url}}"><img style="width:100%;margin-top: -5px;margin-bottom: 20px;" src="{{$ad->img}}" alt="{{$ad->name}}" /></a>
	@endif
    @endif

    <div class="comments" class="{{ rand() }}" style="margin:0 1rem;">
                <p style="margin-bottom: 0.3rem;">
                        <b><a href="/user/{{ $photo->user->username }}">{{ $photo->user->username }}</a></b>: <b>{!! $photo->html !!}</b>
                </p>
                @if (Schema::hasTable('comments'))
                @foreach ($photo->comments as $comment)
                    <p style="margin-bottom: 0.3rem;">
                        <b><a href="/user/{{ $comment->user->username }}">{{ $comment->user->username }}</a></b>: {!! $comment->html !!}
                        @if ((Auth::user()->id == $photo->user->id || Auth::user()->id == $comment->user->id || Auth::user()->allowed('dba')) && !Session::get('readonly'))
                            <a href="{{'../comment/' . $comment->id . '/destroy'}}" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                        @endif
                    </p>
                @endforeach
                @endif
        </div>
    @if (Schema::hasTable('comments'))
    <form style="padding:0 1.00rem;"  method="post" class="comment_form" data-id="{{ $photo->id }}">

    <div class="input-group mb-3">
        <input {{ Session::get('readonly') ? "disabled" : "" }} type="text" class="form-control" id="comment" placeholder="Add a Comment" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button {{ Session::get('readonly') ? "disabled" : "" }} class="btn btn-outline-secondary" type="button">Comment</button>
        </div>
    </div>
        
    </form>
    @endif
</div>
</div>