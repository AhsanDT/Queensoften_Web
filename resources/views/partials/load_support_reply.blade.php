<div class="outgoing">
    <div class="userImg">
        <img src="{{$reply->admins->picture}}" alt="username" />
    </div>
    <div class="description">
        <div class="text">
            @if(isset($reply->attachment))
                <img src="{{$reply->attachment}}" height="300px" width="250px">
                <br> <br>
            @endif
            {{$reply->message}}
        </div>
    </div>
    <small class="time text-muted"> {{$reply->created_at->diffForHumans()}}</small>
</div>
