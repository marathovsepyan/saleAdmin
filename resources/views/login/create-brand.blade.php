@extends('login.layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Add Brand</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Brand</a></li>
                <li class="active">Add</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <form class="form-horizontal form-material" id="loginform" method="POST" action="{{route('brand-store')}}" enctype="multipart/form-data">
        <div class="col-md-5 col-md-offset-1">
            <div class="white-box">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                {{csrf_field()}}

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="name" type="text" required="" placeholder="Name" value="{{ old('name') }}">
                        <input class="form-control" name="user_id" type="hidden" value="{{$user->id}}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="address" type="text" required="" placeholder="Address" value="{{ old('address') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="house" type="text" required="" placeholder="House" value="{{ old('house') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="city" type="text" required="" placeholder="City" value="{{ old('city') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="country" type="text" required="" placeholder="Country" value="{{ old('country') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" type="email" required="" placeholder="Email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="postal_code" type="text" placeholder="Postal Code" value="{{ old('postal_code') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="contact_name" type="text" placeholder="Contact name" value="{{ old('contact_name') }}">
                    </div>
                </div>
        </div>
    </div>
        <div class="col-md-5">
            <div class="white-box">
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="tel" type="text" placeholder="Telephone" value="{{ old('tel') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="website" type="text" placeholder="Website" value="{{ old('website') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="tel_sales" type="text" placeholder="Tel. Sales" value="{{ old('tel_sales') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="tel_support" type="text" placeholder="Tel. Support" value="{{ old('tel_support') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="email_sales" type="email" placeholder="Email Sales" value="{{ old('email_sales') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="email_support" type="email" placeholder="Email Support" value="{{ old('email_support') }}">
                    </div>
                </div>
                <label for="size">Size</label>
                <select class="selectpicker" data-live-search="true" name="size_id[]" multiple id="size">
                    @foreach($sizes as $size)
                        <option data-tokens="ketchup mustard" value="{{$size['id']}}" {{ ($size->id == old('size_id'))?'selected' :'' }}> {{ $size['size_1']}}</option>
                    @endforeach
                </select>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-4">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Add Brand</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
