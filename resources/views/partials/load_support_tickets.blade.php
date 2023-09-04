<div class="chat-header">
    <div class="userInfo">
        <div class="userImg">
            <img src="{{$supportTicket->user->picture}}" alt="username"/>
        </div>
        <div class="description">
            <h6>{{ucwords($supportTicket->user->username)}}</h6>
            <div class="text">#{{$supportTicket->support_ticket_id}}</div>
        </div>
    </div>
    <div class="dropdown">
        <select class="massage-option form-select" name="status">
            <option value="">Mark as</option>
            <option {{old('status', $supportTicket->read ?? "") == 1 ? 'selected' : ''}} value="1">Read</option>
            <option {{old('status', $supportTicket->read ?? "") == 0 ? 'selected' : ''}} value="0">Unread</option>
        </select>
    </div>
</div>
<div class="mesgs">
    <div class="msg-history">
        <div class="divider">
            <span>{{date('d M Y',strtotime($supportTicket->created_at))}}</span>
        </div>
        <div class="incoming">
            <div class="userImg">
                <img src="{{$supportTicket?->user?->picture}}" alt="username"/>
            </div>
            <div class="description">
                <div class="text">{{$supportTicket->message}}
                </div>
            </div>
{{--            <div class="time"> {{date('h:i a', strtotime($supportTicket->created_at))}}</div>--}}
            <small class="time text-muted"> {{$supportTicket->created_at->diffForHumans()}}</small>
        </div>

        @if(count($replies) > 0)
            @foreach($replies as $reply)
                <div class="outgoing">
                    <div class="userImg">
                        <img src="{{$reply?->admins?->picture ?? 'https://appscorridor.com/queens-of-ten-admin/AdminProfileImages/16680593681159262659.png'}}" alt="username"/>
                    </div>
                    <div class="description">
                        <div class="text">
                            {{$reply->message}}
                            @if(isset($reply->attachment))
                                <br><br>
                                <img src="{{$reply->attachment}}" style="height:100px !important;width:200px!important;">
                            @endif
                        </div>
                    </div>
{{--                    <div class="time"> {{date('h:i a', strtotime($reply->created_at))}}</div>--}}
                    <small class="time text-muted"> {{$reply->created_at->diffForHumans()}}</small>
                </div>
            @endforeach
        @endif
        <div id="append-reply">

        </div>
    </div>
    <div class="type-msg">
        <div class="uploadImgRow" style="display: none">
            <div class="imgPreview">
                <img src="" id="support-image-path"/>
                <button class="btn delete-file"><i class="fal fa-close"></i></button>
            </div>
        </div>
        <div class="position-relative">
            <div class="btn-group">
                <button type="button" class="btn browse">&nbsp;&nbsp;&nbsp;
                    <i class="fal fa-paperclip"></i> &nbsp;
                    <i class="fal fa-image"></i>
                </button>
            </div>
            <form class="support-submit" data-action="{{route('support.reply.submit')}}" method="POST"
                  enctype="multipart/form-data">
                @csrf()
                <input type="hidden" id="support_ticket_id" value="{{$supportTicket->support_ticket_id}}"
                       name="support_ticket_id">
                <input type="hidden" value="{{$supportTicket->user->email ?? ''}}" name="email">
                <input type="hidden" value="{{$supportTicket->user->id ?? ''}}" name="user_id">
                <input type="file" name="file" class="form-control support-message-file" style="display: none"/>
                <input type="text" class="form-control" placeholder="Write your message here" name="message"/>
                <button class="btn btnSend" type="submit">
                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.3198 9.69737L1.68667 17.5065C1.27563 17.7261 0.807671 17.3269 0.921499 16.8547L2.66685 10.1896C2.72377 9.97009 2.89451 9.81045 3.10952 9.77719L11.4758 9.19184L3.10952 8.60648C2.89451 8.57322 2.72377 8.40693 2.66685 8.19407L0.921499 1.52236C0.801347 1.05008 1.26931 0.650975 1.68667 0.870484L16.3262 8.67965C16.7119 8.89251 16.7119 9.48452 16.3198 9.69737Z" fill="white"/>
                    </svg>

                </button>
            </form>
        </div>
    </div>
</div>
