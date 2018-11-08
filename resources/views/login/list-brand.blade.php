@extends('login.layouts.app')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Brand List</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Brand</a></li>
                <li class="active">Brand List</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 white-box">

            <table id="customer-list" class="display brand-table-list-main" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($user->brands as $brand)
                    <tr>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->email}}</td>
                        <td>{{$brand->created_at}}</td>
                        <td><a href="{{route('brand-edit',$brand->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                        <td><a class="delete-brand-sweet" data-id="{{$brand->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection