@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')
<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Basic with Icons -->
  <div class="col-xxl">
    <div class="card mb-6">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic with Icons</h5> <small class="text-muted float-end">Merged input group</small>
      </div>
      <div class="card-body">
        <form action="{{ route('license.store') }}" method="POST">
          @csrf
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="license_number">License Number</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-key"></i></span>
                <input type="text" id="license_number" name="license_number" class="form-control" placeholder="Enter License Number" aria-label="License Number" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="expiry_date">Expiry Date</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                <input type="date" id="expiry_date" name="expiry_date" class="form-control" aria-label="Expiry Date" required />
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-outline-primary">Submit</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection