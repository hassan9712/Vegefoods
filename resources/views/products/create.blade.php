@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
        <form action="{{ route('dashboard.products.store') }}" method="POST">
            @csrf

            <h4 class="form-header">
            <i class="fa fa-file-text-o"></i>
              Add Product
            </h4>
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                @error('name') <p style="color: red;">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="price" name="price" autocomplete="off">
                  @error('price') <p style="color: red;">{{ $message }}</p> @enderror
                </div>
              </div>
              <div class="form-group row">
                  <label for="category_id" class="col-sm-2 col-form-label">Categories</label>
                  <div class="col-sm-10">
                    <select class="form-control valid" id="category_id" name="category_id" required="" aria-invalid="false">
                      @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
            <div class="form-group row">
              <label for="image" class="col-sm-2 col-form-label">Select Image</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="image">
                @error('image') <p style="color: red;">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Add Product</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div><!--End Row-->
@endsection