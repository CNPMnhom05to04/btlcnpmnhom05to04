@extends('layout.app')

@section('content')
    <div class="container">
        <div class="user-wrapper">
            <ul class="users">
                @foreach($users as $user)
                    <li class="user" id="{{ $user->user_id }}">
                        @if($user->unread)
                            <span class="pending">{{ $user->unread }}</span>
                        @endif

                        <div class="media">
                            <div class="media-left">
                                <img src="{{ asset('vendor/laravel-filemanager/img/152px color.png') }}" alt="" class="media-object">
                            </div>

                            <div class="media-body">
                                <p class="name">{{ $user->user_name }}</p>
                                <p class="email">{{ $user->user_email }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="message-wrapper" id="messages">

        </div>
    </div>
@endsection
