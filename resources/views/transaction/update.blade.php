@extends('template.master')
@section('title','Edit Product')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Cart</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- /.col -->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product</h3>
                    </div>
                    <form method="POST" action="{{url('/product/'.$product->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="categoryid">Product Category</label>
                                <select class="form-control" id="categoryid" name="categoryid">
                                    <!-- using FOREIGN ID -->
                                    @foreach ($category as $item)
                                    @if($item->id == $product->category_id)
                                    <option value="{{$item->id}}" selected>{{$item->category_name}}</option>
                                    @else
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="productname">Product Name</label>
                                <input type="text" class="form-control  @error('productname') is-invalid @enderror" name="productname" id="productname" placeholder="Enter Product Name" value="{{$product->product_name}}">
                                @error('productname')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" placeholder="Enter Product Name" value="{{$product->product_name}}">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="productstock">Product Stock</label>
                                <input type="number" class="form-control @error('productstock') is-invalid @enderror" name="productstock" id="productstock" placeholder="Enter Product Stock" value="{{$product->product_stock}}">
                                @error('productstock')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="productprice">Product Price</label>
                                <input type="number" class="form-control @error('productprice') is-invalid @enderror" name="productprice" id="productprice" placeholder="Enter Product price" value="{{$product->product_price}}">
                                @error('productprice')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="productdescription">Product Description</label>
                                <input type="text" class="form-control @error('productdescription') is-invalid @enderror" name="productdescription" id="productdescription" placeholder="Enter Category Name" value="{{$product->product_description}}">
                                @error('productdescription')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- /.col -->
        </div>
    </section>
</div>
@endsection