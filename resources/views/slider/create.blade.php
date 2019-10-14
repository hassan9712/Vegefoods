@extends('layouts.admin')

@section('content')
<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
            <form action="{{ route('dashboard.sliders.store') }} " method="POST">
                @csrf
    
                <h4 class="form-header">
                <i class="fa fa-file-text-o"></i>
                  Add Slider
                </h4>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                    @error('name') <p style="color: red;">{{ $message }}</p> @enderror
                  </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="description" name="description" autocomplete="off"></textarea>
                      @error('description') <p style="color: red;">{{ $message }}</p> @enderror
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
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Add Slider</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--End Row-->
@endsection