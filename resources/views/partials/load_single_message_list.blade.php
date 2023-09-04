<div class="userImg">
    @if ($supportTicket->user)
        <img src="{{$supportTicket->user->picture ?? ''}}" alt="username" />
    @else
        <img src="" alt="picture" />
    @endif
</div>
<div class="description">
    @if ($supportTicket->user)
        <h6>{{ucwords($supportTicket->user->name)}}</h6>
    @else
        <h6>Unknown User</h6>
    @endif
    <div class="text-muted">
        <time>{{changeTimeFormat($supportTicket->getLastTicket($supportTicket->support_ticket_id)->created_at->diffForHumans())}}</time>
        <div class="text">
            {{$supportTicket->getLastTicket($supportTicket->support_ticket_id)->message}}
        </div>
    </div>
    @if ($supportTicket->getRead($supportTicket->support_ticket_id) > 0)
        <span class="counter">{{$supportTicket->getRead($supportTicket->support_ticket_id)}}</span>
    @endif
</div>
