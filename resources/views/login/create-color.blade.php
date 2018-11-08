@extends('login.layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Add Color</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Color</a></li>
                <li class="active">Add</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="white-box">
            @if(Session('message_color'))
                <div class="alert alert-danger">
                    <ul>
                        <li> The color-brand has already been taken.</li>
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

            <form class="form-horizontal form-material" id="loginform" method="POST" action="{{route('color-store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="name" type="text" required="" placeholder="Color Name" value="{{ old('name') }}">
                        <input class="form-control" name="user_id" type="hidden" value="{{$user->id}}">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="number" type="number" required="" placeholder="Color Number" value="{{ old('number') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <select class="form-control" id="sel1" name="brand_id" required="">
                            <option value="">Brand</option>
                            @foreach($user->brands as $brand)
                                <option value="{{$brand->id}}"  {{ ($brand->id == old('brand_id'))?'selected':"" }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-4">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Add Color</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
