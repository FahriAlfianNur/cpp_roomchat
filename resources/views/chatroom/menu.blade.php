@extends('master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Chatroom</h1>
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
                <div class="col-lg-4 col-6">
                    <a href="{{route('chatroom.add')}}">
                        <div class="small-box bg-info" style="height:115px;">
                            <div class="inner">
                                <h3>Create Chatroom</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-plus"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <a href="{{route('chatroom-join.list')}}">
                        <div class="small-box bg-success" style="height:115px;">
                            <div class="inner">
                                <h3>Join Chatroom</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-comment"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <a href="{{route('chatroom-active.list')}}">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>Chatroom Active</h3>
                                <p><i class="fa fa-users"></i> ({{$roomCount}})</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-bars"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

        </div><!-- /.container-fluid -->
    </section>
@endsection
