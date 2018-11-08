@extends('login.layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Customer</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Customer</a></li>
                <li class="active">Edit</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="white-box">
            @if(Session('message_email'))
                <div class="alert alert-danger">
                    <ul>
                        <li> The email has already been taken.</li>
                    </ul>
                </div>

                @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal form-material" id="loginform" method="POST" action="{{route('customer-update')}}">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$edit_user->id}}">
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="name" value="{{$edit_user->name}}" type="text" required="" placeholder="Name">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" type="text" value="{{$edit_user->email}}" required="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="old_password" type="password" placeholder="New Password">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-4">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Edit Costumer</button>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{route('customer-list')}}" class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light redirect-back-button">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection