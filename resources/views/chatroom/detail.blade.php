@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Chatroom : {{$chatroom->name}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chatroom</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card direct-chat direct-chat-primary" style="height:100%">
                        <div class="card-header">
                            <h3 class="card-title">Direct Chat</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                                <a href="{{ route('chatroom.leave', $chatroom->id) }}"><span class="badge badge-danger ">Leave Chat</span></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" style="height:450px;">
                                @foreach($messages as $message)
                                    @if($message->user_id == $user->id && $message->user_id != 0)
                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">{{$message->memberDetail->nickname}}</span>
                                                <span class="direct-chat-timestamp float-left">{{$message->memberDetail->created_at}}</span>
                                            </div>
                                            <img class="direct-chat-img" src="{{$message->memberDetail->avatar}}" alt="message user image" referrerpolicy="no-referrer">
                                            <div class="direct-chat-text">
                                                {{$message->message}}
                                            </div>
                                        </div>
                                    @elseif($message->user_id != 0)
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left">{{$message->memberDetail->nickname}}</span>
                                                <span class="direct-chat-timestamp float-right">{{$message->memberDetail->created_at}}</span>
                                            </div>
                                            <img class="direct-chat-img" src="{{$message->memberDetail->avatar}}" alt="message user image" referrerpolicy="no-referrer">
                                            <div class="direct-chat-text">
                                                {{$message->message}}
                                            </div>
                                        </div>
                                    @else
                                        <div class="direct-chat-info" style="text-align: center">
                                            {{$message->message}}
                                        </div>
                                    @endif
                                @endforeach


                            </div>
                            <!--/.direct-chat-messages-->

                            <!-- Contacts are loaded here -->

                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="{{ route('message.send',$chatroom->id)}}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                    <span class="input-group-append">
                                  <button type="submit" class="btn btn-primary">Send</button>
                                </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card direct-chat direct-chat-primary">
                        <div class="card-header">
                            <h3 class="card-title">Chatroom Member <span class="badge badge-warning ">{{$members->count()}} User</span></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="contacts-list" style="margin-bottom:0">
                                @foreach($members as $member)
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="{{$member->memberDetail->avatar}}" alt="User Avatar" referrerpolicy="no-referrer">
                                            <div class="contacts-list-info">
                                          <span class="contacts-list-name" style="color:#212529">
                                            {{$member->memberDetail->nickname}}
                                          </span>
                                                <span class="contacts-list-msg">{{$member->memberDetail->email}}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
