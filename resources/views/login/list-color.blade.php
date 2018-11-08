@extends('login.layouts.app')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Product List</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Product</a></li>
                <li class="active">Product List</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 white-box">

            <table id="customer-list" class="display color-table-list-main" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Brand</th>
                    <th>Created at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Brand</th>
                    <th>Created at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>
                <tbody>
                @if(count($colors))
                    @foreach($colors as $color)
                        <tr>
                            <td>{{ ($color->name)}}</td>
                            <td>{{ ($color->number)}}</td>
                            <td>{{ ($color->brand->name)?$color->brand->name:''}}</td>
                            <td>{{$color->created_at}}</td>
                            <td><a href="{{route('color-edit',$color->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            <td><a class="delete-color-sweet" data-id="{{$color->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection