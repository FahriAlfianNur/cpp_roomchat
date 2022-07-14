@extends('master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Chatroom Add</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('chatroom.menu')}}">Chatroom</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        @if(session()->has('message'))
            <div class="alert alert-primary" role="alert">
                <p>{{ session()->get('message') }}</p>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <div class="card">
                        <div class="card-body ">
                            <p class="login-box-msg">Masukan Topik Untuk Chatroom</p>
                            <form action="{{ route('chatroom.save')}}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukan Topik" name="topik">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


@endsection
