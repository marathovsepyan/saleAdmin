@extends('login.layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Brand</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Brand</a></li>
                <li class="active">Edit</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <form class="form-horizontal form-material" id="loginform"  method="POST" action="{{route('brand-update')}}"  enctype="multipart/form-data">
        <div class="col-md-5 col-md-offset-1">
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
                {{csrf_field()}}

                <input type="hidden" name="id" value="{{$edit_brand->id}}">

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="name" type="text" required="" placeholder="Name" value="{{ $edit_brand->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="address" type="text" required="" placeholder="Address" value="{{ $edit_brand->address }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="house" type="text" required="" placeholder="House" value="{{ $edit_brand->house }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="city" type="text" required="" placeholder="City" value="{{ $edit_brand->city }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="country" type="text" required="" placeholder="Country" value="{{ $edit_brand->country }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" type="email" required="" placeholder="Email" value="{{ $edit_brand->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="postal_code" type="text" placeholder="Postal Code" value="{{ $edit_brand->postal_code }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="contact_name" type="text" placeholder="Contact name" value="{{ $edit_brand->contact_name }}">
                    </div>
                </div>
        </div>
    </div>
            <div class="col-md-5">
                <div class="white-box">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="tel" type="text" placeholder="Telephone" value="{{ $edit_brand->tel }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="website" type="text" placeholder="Website" value="{{ $edit_brand->website }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="tel_sales" type="text" placeholder="Tel. Sales" value="{{ $edit_brand->tel_sales }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="tel_support" type="text" placeholder="Tel. Support" value="{{ $edit_brand->tel_support }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="email_sales" type="email" placeholder="Email Sales" value="{{ $edit_brand->email_sales }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="email_support" type="email" placeholder="Email Support" value="{{ $edit_brand->email_support }}">
                        </div>
                    </div>
                    <label for="size">Size</label>
                    <select class="selectpicker" data-live-search="true" name="size_id[]" multiple required="">
                        @foreach($sizes as $size)
                            <option data-tokens="ketchup mustard" value="{{$size['id']}}" {{ (in_array($size['id'],$edit_brand->size_id))?'selected' :'' }}> {{ $size['size_1']}}</option>
                        @endforeach
                    </select>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-4">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Edit Brand</button>
                        </div>
                        <div class="col-xs-4">
                            <a href="{{route('brand-list')}}" class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light redirect-back-button">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

