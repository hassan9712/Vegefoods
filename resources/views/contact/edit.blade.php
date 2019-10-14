@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.contact.update', $contact->id) }}" method="POST">
            @method('PATCH')
            @csrf

            <h4 class="form-header">
            <i class="fa fa-file-text-o"></i>
              Edit Information
            </h4>
            <div class="form-group row">
              <label for="address" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address" value="{{ $contact->address }}">
                @error('name') <p style="color: red;">{{ $message }}</p> @enderror
              </div>
            </div>
            <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phone" name="phone" value="{{ $contact->phone }}">
                      @error('name') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" name="email" value="{{ $contact->email }}">
                          @error('name') <p style="color: red;">{{ $message }}</p> @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                            <label for="website" class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="website" name="website" value="{{ $contact->website }}">
                              @error('name') <p style="color: red;">{{ $message }}</p> @enderror
                            </div>
                          </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Edit Information</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div><!--End Row-->
@endsection