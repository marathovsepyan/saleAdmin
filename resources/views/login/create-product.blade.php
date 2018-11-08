@extends('login.layouts.app')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Add Product</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Product</a></li>
                <li class="active">Add</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
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

            <form class="form-horizontal form-material" id="loginform" method="POST" action="{{route('product-store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="name" type="text" required="" placeholder="Name" value="{{ old('name') }}">
                        <input class="form-control" name="user_id" type="hidden" value="{{$user->id}}">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="description" type="text" required="" placeholder="Short Description" value="{{ old('description') }}">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <textarea class="form-control form-control-min-height" name="description_long" type="text" required="" placeholder="Long Description">{{ old('description_long') }}</textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="price" type="" required="" placeholder="Price" value="{{ (old('price')>0 && is_numeric(old('price')))?number_format(old('price'), 2, '.', ''):'' }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <select class="form-control" name="season" required="">
                            <option value="">Seasons</option>
                            @foreach($seasons as $season)
                                <option value="{{$season->id}}"  {{ ($season->id == old('$season'))?'selected':"" }}>{{ $season->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <select class="form-control form-control-brand" id="sel1" name="brand_id" required="">
                            <option value="">Brand</option>
                            @foreach($user->brands as $brand)
                                <option value="{{$brand->id}}"  {{ ($brand->id == old('brand_id'))?'selected':"" }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <img src="{{asset('plugins/images/loading.gif')}}" class="loading-gif-colors" alt="">
                        <select class="form-control form-control-color" id="sel1" name="color_id" required="">
                            <option value="">Color</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12" id="add_size"></div>
                <br><br>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="btn btn-primary primary-light-blue">
                            Upload Image&hellip; <input type="file" style="display: none;" name="file" id="file" onchange="readURL(this);">
                        </label>
                        <img style="" id="blah" src="" alt="your image" />
                    </div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-4">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Add Product</button>
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
