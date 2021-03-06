@extends('admin.layouts.index', ['product' => 'active'])

@section('title','Product')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
@if (session('thongbao'))
<div class="alert alert-success">
    {{session('thongbao')}}
</div>
@endif
<section class="content" style="padding: 30px;">
    <form action="{{route('product.new.post')}}" method="post">
        @csrf
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Product</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="prod_name">
                        <label for="inputName">Product Name</label>
                        <input type="text" name="name" id="inputName" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="parent-price">
                        <div class="price" id="price">
                            <div class="prod_price">
                                <label for="inputType">Type</label>
                                <input type="text" name="type" id="inputType" class="form-control">
                            </div>
                            <div class="prod_price">
                                <label for="inputPrice">Price</label>
                                <input type="number" name="price_id" id="inputPrice" class="form-control">
                            </div>
                        </div>                      
                    </div>
                    <span class="add-product-icon price-icon"><i class="fas fa-plus"></i>Add</span>
                    <span class="remove-product-icon price-icon"><i class="fas fa-minus"></i>Remove</span>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Product Description</label>
                    <textarea id="inputDescription" name="description" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Product Support</label>
                    <textarea id="inputDescription" name="support" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control select2" name="category_id" style="width: 100%;">
                        @foreach ($categories as $category )
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputStatus">Vendor</label>
                    <select class="form-control select2" name="vendor_id" style="width: 100%;">
                        @foreach ($vendors as $vendor )
                        <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new Product" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
@endsection

@section('script')
    <script src="{{ asset('assets/js/admin/product.js')}}"></script>
@endsection