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
        <form action="{{ route('networkdevice.store') }}" method="POST">
          @csrf
          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="device_type">Device Type</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-desktop"></i></span>
                <input type="text" id="device_type" name="device_type" class="form-control" placeholder="Type of Device" aria-label="Device Type" required />
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="model">Model</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-laptop"></i></span>
                <input type="text" id="model" name="model" class="form-control" placeholder="Model Name" aria-label="Model Name" required />
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="brand">Brand</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                <input type="text" id="brand" name="brand" class="form-control" placeholder="Brand Name" aria-label="Brand Name" required />
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="serial_number">Serial Number</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-id-card"></i></span>
                <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="Serial Number" aria-label="Serial Number" required />
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="ip_address">IP Address</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-network-chart"></i></span>
                <input type="text" id="ip_address" name="ip_address" class="form-control" placeholder="IP Address (Optional)" aria-label="IP Address" />
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