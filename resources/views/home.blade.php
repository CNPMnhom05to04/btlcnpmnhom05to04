@extends('layout.app')

@section('content')
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people"
                 style=" background: #7F7FD5; background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5)">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Danh bạ</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar" placeholder="Search">
                            <span class="input-group-addon"> <button type="button"> <i class="fa fa-search"
                                                                                       aria-hidden="true"></i> </button> </span>
                        </div>
                    </div>
                </div>
                <div class="inbox_chat">
                    @foreach($users as $user)
                        @if(auth()->user()->role_id == 1)
                            @if($user->role_id == 1 || $user->role_id == 2)
                                <div class="chat_list active_chat users user" id="{{ $user->user_id }}"
                                     style=" background: #7F7FD5; background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5)">
                                    @if($user->unread)
                                        <span class="pending">{{ $user->unread }}</span>
                                    @endif
                                    <div class="chat_people">
                                        <div class="chat_img"><img
                                                src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                        </div>
                                        <div class="chat_ib">
                                            <p class="name custom-text-color">{{ $user->user_name }}
                                                @if($user->role_id == 1)
                                                    <span>( Admin )</span>
                                                @elseif($user->role_id == 2)
                                                    <span>( Quản lý )</span>
                                                @else
                                                    <span>( Khách hàng)</span>
                                                @endif
                                            </p>
                                            @if(Cache::has('user-is-online-' . $user->user_id))
                                                <p class="text-success">Online</p>
                                            @else
                                                <p class="text-secondary">Offline</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @elseif(auth()->user()->role_id == 2)
                            <div class="chat_list active_chat users user" id="{{ $user->user_id }}"
                                 style=" background: #7F7FD5; background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5)">
                                @if($user->unread)
                                    <span class="pending">{{ $user->unread }}</span>
                                @endif
                                <div class="chat_people">
                                    <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                               alt="sunil"></div>
                                    <div class="chat_ib">
                                        <p class="name custom-text-color">{{ $user->user_name }}
                                            @if($user->role_id == 1)
                                                <span>( Admin )</span>
                                            @elseif($user->role_id == 2)
                                                <span>( Quản lý )</span>
                                            @else
                                                <span>( Khách hàng)</span>
                                            @endif
                                        </p>
                                        @if(Cache::has('user-is-online-' . $user->user_id))
                                            <p class="text-success">Online</p>
                                        @else
                                            <p class="text-secondary">Offline</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            @if($user->role_id == 2)
                                <div class="chat_list active_chat users user" id="{{ $user->user_id }}"
                                     style=" background: #7F7FD5; background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5)">
                                    @if($user->unread)
                                        <span class="pending">{{ $user->unread }}</span>
                                    @endif
                                    <div class="chat_people">
                                        <div class="chat_img"><img
                                                src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                        </div>
                                        <div class="chat_ib">
                                            <p class="name custom-text-color">{{ $user->user_name }}
                                                @if($user->role_id == 1)
                                                    <span>( Admin )</span>
                                                @elseif($user->role_id == 2)
                                                    <span>( Quản lý )</span>
                                                @else
                                                    <span>( Khách hàng)</span>
                                                @endif
                                            </p>
                                            @if(Cache::has('user-is-online-' . $user->user_id))
                                                <p class="text-success">Online</p>
                                            @else
                                                <p class="text-secondary">Offline</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="message-wrapper" id="messages">

            </div>
        </div>
    </div>
@endsection
