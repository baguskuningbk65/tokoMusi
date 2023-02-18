@extends('template.master')
@section('title','Category')

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
            <li class="breadcrumb-item active">Dashboard v1</li>
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
                  <td>Nomor</td>
                  <td>Category name</td>
                  <td>Item</td>
                </tr>
              </thead>
              <tbody>
                @foreach($category as $item)
                <tr>
                  <td>{{ $loop->iteration}}</td>
                  <td>{{ $item->category_name}}</td>
                  <td><img src="{{asset('img/' .$item->icon)}}" alt="" width="50"></td>
                  <td>
                    <a href="{{url('/category/'.$item->id.'/edit')}}" class="btn btn-info">Edit</a>
                    <form action="{{url('/category/'.$item->id)}}" method="POST">
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