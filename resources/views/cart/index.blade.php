@extends('template.master')
@section('title','Cart')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{url('/category/create')}}" class="btn btn-primary" role="button">Add Category</a>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Product id</td>
                                    <td>Product Quantity</td>
                                    <td>Total Price</td>
                                    <td>Status Checkout</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $item)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $item->product->product_name}}</td>
                                    <td>{{ $item->product_qty}}</td>

                                    <td>{{ $item->total_price}}</td>
                                    <td>{{ $item->status_checkout}}</td>
                                    <td>{{ $item->category_name}}</td>
                                    <td>
                                        <a href="{{url('/cart/'.$item->id.'/edit')}}" class="btn btn-info">Edit</a>
                                        <form method="POST" action="{{url('/cart/'.$item->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </section>
</div>
@endsection