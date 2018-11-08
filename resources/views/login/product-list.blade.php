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

            <table id="customer-list" class="display product-table-list-main" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Brand</th>
                    <th>Created at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Brand</th>
                    <th>Created at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>
                <tbody>
                @if(count($products))
                    @foreach($products as $product)
                        <tr>
                            <td>{{ ($product->name)}}</td>
                            <td>{{ ($product->description)}}</td>
                            <td>{{ number_format($product->price, 2, '.', '') }}</td>
                            <td>
                                {{ ($product->brand->name)?$product->brand->name:'' }}
                            </td>
                            <td>{{$product->created_at}}</td>
                            <td><a href="{{route('product-edit',$product->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            <td><a class="delete-product-sweet" data-id="{{$product->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection