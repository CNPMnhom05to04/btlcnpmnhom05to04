<div class="mesgs">
    <div class="msg_history">
        @foreach($messages as $message)
            @if($message->from !== Auth::id())
                <div class="incoming_msg">
                    <div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                       alt="sunil"></div>
                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p>{{ $message->message }}</p>
                            <span class="time_date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</span></div>
                    </div>
                </div>
            @else
                <div class="outgoing_msg">
                    <div class="sent_msg">
                        <p>{{ $message->message }}</p>
                        <span class="time_date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</span></div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="type_msg input-text">
        <div class="input_msg_write">
            <input type="text" name="message" class="submit write_msg" placeholder="Type a message"/>
            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
</div>
