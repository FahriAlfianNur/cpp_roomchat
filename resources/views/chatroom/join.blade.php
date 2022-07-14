@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Chatroom</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('chatroom.menu')}}">Chatroom</a></li>
                        <li class="breadcrumb-item active">List Chatroom</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Chatroom Topics</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chatrooms as $chatroom)
                                    <tr>
                                        <td>{{$chatroom->name}} <span class="badge badge-warning ">{{$chatroom->members->count()}} User</span></td>
                                        @if($chatroom->members->count() != 0)
                                        @foreach($chatroom->members as $member)
                                            @if($member->user_id == $user->id)
                                                    @php
                                                        $i = 1
                                                    @endphp
                                                <td><a href="{{ route('chatroom.detail', $chatroom->id) }}" class="btn btn-primary" style="float: right">Open Chat</a></td>
                                            @else
                                                    @php
                                                        $i = 0
                                                    @endphp
                                            @endif
                                        @endforeach
                                            @if($i == 0)
                                                <td><a href="{{ route('chatroom.join', $chatroom->id) }}" class="btn btn-primary" style="float: right">Join Chatroom</a></td>
                                            @endif
                                        @else
                                            <td><a href="{{ route('chatroom.join', $chatroom->id) }}" class="btn btn-primary" style="float: right">Join Chatroom</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



