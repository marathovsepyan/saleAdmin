@extends('login.layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Product</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Product</a></li>
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
                <form class="form-horizontal form-material" id="loginform" method="POST" action="{{route('product-update')}}"  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$edit_product->id}}">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="name" type="text" required="" placeholder="Name" value="{{ $edit_product->name }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="description" required="" placeholder="Description" value="{{ $edit_product->description }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <textarea class="form-control form-control-min-height" name="description_long" type="text" required="" placeholder="Long Description">{{ $edit_product->description_long }}</textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="price" type="text" required="" placeholder="Price"  value="{{ number_format($edit_product->price, 2, '.', '') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <select class="form-control form-control-brand" id="sel1" name="brand_id">
                                <option value="">Brand</option>
                                @foreach($user->brands as $brand)
                                    <option value="{{$brand->id}}" {{ ($brand->id == $edit_product->brand_id)?'selected':"" }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <img src="{{asset('plugins/images/loading.gif')}}" class="loading-gif-colors" alt="">
                            <select class="form-control form-control-color" id="sel1" name="color_id" required="">
                                <option value="">Color</option>
                                @foreach($colors as $color)
                                <option class="append-color" value="{{$color->id}}"  {{ ($edit_product->color_nr == $color->number && $edit_product->color == $color->name)?'selected':"" }}>{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="btn btn-primary primary-light-blue">
                                Change Image&hellip; <input type="file" style="display: none;" name="file" id="file" onchange="readURL(this);">
                            </label>
                            @if($edit_product->image)
                                <img style="display: inline-block;" id="blah" src="{{ asset('uploads/products/'.$edit_product->image) }}" alt="your image" />
                            @else
                                <img style="" id="blah" src="" alt="your image" />
                            @endif
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-4">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light redirect-back-button" type="submit">Edit Product</button>
                        </div>
                        <div class="col-xs-4">
                            <a href="{{route('product-list')}}" class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light redirect-back-button">Cancel</a>
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

