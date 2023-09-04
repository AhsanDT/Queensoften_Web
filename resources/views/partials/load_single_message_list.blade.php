<div class="userImg">
    <img src="{{optional($supportTicket->user->picture)}}" alt="username" />
</div>
<div class="description">
    <h6>{{ucwords($supportTicket->user->name)}}</h6>
    <div class="text-muted">
        <time>{{changeTimeFormat($supportTicket->getLastTicket($supportTicket->support_ticket_id)->created_at->diffForHumans())}}</time>
        <div class="text">
            {{$supportTicket->getLastTicket($supportTicket->support_ticket_id)->message}}
        </div>
    </div>
    @if($supportTicket->getRead($supportTicket->support_ticket_id) > 0)
        <span class="counter">{{$supportTicket->getRead($supportTicket->support_ticket_id)}}</span>
    @endif
</div>
