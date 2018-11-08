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
            <form class="form-horizontal form-material" id="loginform" method="POST" action="{{route('size-update')}}"  enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$edit_size->id}}">

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="size_1" type="text" required="" placeholder="Size 1" value="{{ $edit_size->size_1 }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="size_2" type="text" required="" placeholder="Size 2" value="{{ $edit_size->size_2 }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="size_3" type="text" required="" placeholder="Size 3" value="{{ $edit_size->size_3 }}">
                    </div>
                </div>


                <div class="form-group text-center m-t-20">
                    <div class="col-xs-4">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Edit Brand</button>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{route('size-list')}}" class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light redirect-back-button">Cancel</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

