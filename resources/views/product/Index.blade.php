@extends('template.master')
@section('title','Product')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Produk Masuk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{url('/product/create')}}" class="btn btn-primary" role="button">Add product</a>
            </div>
            <!-- /.col -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <td>Nomor</td>
                                    <td>category_id</td>
                                    <td>product_name</td>
                                    <td>Image</td>
                                    <td>product_stock</td>
                                    <td>product_price</td>
                                    <td>product_description</td>
                                    <td>product_review</td>
                                    <td>product_soldout</td>
                                    <td>condition</td>
                                    <td>weight</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $item)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $item->category_id}}</td>
                                    <td>{{ $item->product_name}}</td>
                                    <td><img src="{{asset('img/'.$item->image)}}" alt="" width="50"></td>
                                    <td>{{ $item->product_stock}}</td>
                                    <td>{{ $item->product_price}}</td>
                                    <td>{{(strlen($item->product_description)>20) ? substr($item->product_description, 0,20) . '...':$item->product_description}}</td>
                                    <td>{{ $item->product_review}}</td>
                                    <td>{{ $item->product_soldout}}</td>
                                    <td>{{$item->condition}}</td>
                                    <td>{{$item->weight}}</td>
                                    <td>
                                        <a href="{{url('/product/'.$item->id.'/edit')}}" class="btn btn-info">Edit</a>
                                        <form action="{{url('/product/'.$item->id)}}" method="POST">
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