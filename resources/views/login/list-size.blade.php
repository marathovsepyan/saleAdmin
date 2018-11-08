@extends('login.layouts.app')
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Size List</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Size</a></li>
                <li class="active">Size List</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 white-box">

            <table id="customer-list" class="display size-table-list-main" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Size 1</th>
                    <th>Size 2</th>
                    <th>Size 3</th>
                    <th>Created at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Size 1</th>
                    <th>Size 2</th>
                    <th>Size 3</th>
                    <th>Created at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </tfoot>
                <tbody>
                @if(count($sizes))
                    @foreach($sizes as $size)
                        <tr>
                            <td>{{ ($size->size_1)}}</td>
                            <td>{{ ($size->size_2)}}</td>
                            <td>{{ ($size->size_3)}}</td>
                            <td>{{$size->created_at}}</td>
                            <td><a href="{{route('size-edit',$size->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            <td><a class="delete-size-sweet" data-id="{{$size->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection