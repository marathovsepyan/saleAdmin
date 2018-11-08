@extends('login.layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Account Settings</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Settings</a></li>
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

                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{route('account-settings-edit')}}" enctype="multipart/form-data">

                    {{csrf_field()}}

                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="name" value="{{$user->name}}" type="text" required="" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="email" type="text" value="{{$user->email}}" required="" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="btn btn-primary primary-light-blue">
                                Change Image&hellip; <input type="file" style="display: none;" name="file" id="file" onchange="readURL(this);">
                            </label>

                            @if($user->image)
                                <img style="display: inline-block;" id="blah" src="{{ asset('uploads/suppliers/'.$user->image) }}" alt="your image" />
                            @else
                                <img style="" id="blah" src="" alt="your image" />
                            @endif

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
                    </div>
                </form>

        </div>
    </div>

    <script>
        function readURL(input) {
            $('#blah').css('display','inline-block');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

