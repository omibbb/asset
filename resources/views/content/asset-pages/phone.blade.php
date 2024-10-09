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
        <form action="{{ route('phones.store') }}" method="POST">
          @csrf
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="brand">Brand</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                <input type="text" id="brand" name="brand" class="form-control" placeholder="Brand Name" aria-label="Brand Name" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="model">Model</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-laptop"></i></span>
                <input type="text" id="model" name="model" class="form-control" placeholder="Model Name" aria-label="Model Name" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="ram">RAM (GB)</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-memory-card"></i></span>
                <input type="number" id="ram" name="ram" class="form-control" placeholder="RAM Size" aria-label="RAM Size" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="storage">Storage (GB)</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-hdd"></i></span>
                <input type="number" name="storage" id="storage" class="form-control" placeholder="Storage Size" aria-label="Storage Size" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="imei">IMEI</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-id-card"></i></span>
                <input type="text" id="imei" name="imei" class="form-control" placeholder="IMEI Number" aria-label="IMEI Number" required maxlength="20" />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="battery_capacity">Battery Capacity (mAh)</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-battery"></i></span>
                <input type="number" id="battery_capacity" name="battery_capacity" class="form-control" placeholder="Battery Capacity" aria-label="Battery Capacity" required />
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