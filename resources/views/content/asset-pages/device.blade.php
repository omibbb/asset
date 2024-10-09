@extends('layouts/contentNavbarLayout')

@section('title', 'PC/Laptop')

@section('content')
<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Basic with Icons -->
  <div class="col-xxl">
    <div class="card mb-6">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic with Icons</h5> <small class="text-muted float-end">Asset Management Inteko</small>
      </div>
      <div class="card-body">
        <form action="{{ route('devices.store') }}" method="POST">
          @csrf
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="brand">Brand</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="brand-icon" class="input-group-text"><i class="bx bx-buildings"></i></span>
                <input type="text" name="brand" class="form-control" id="brand" placeholder="Brand Name" aria-describedby="brand-icon" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="model">Model</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="model-icon" class="input-group-text"><i class="bx bx-barcode"></i></span>
                <input type="text" name="model" class="form-control" id="model" placeholder="Model Name" aria-describedby="model-icon" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="processor">Processor</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="processor-icon" class="input-group-text"><i class="bx bx-chip"></i></span>
                <input type="text" name="processor" class="form-control" id="processor" placeholder="Processor Type" aria-describedby="processor-icon" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="ram">RAM (GB)</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="ram-icon" class="input-group-text"><i class="bx bx-memory-card"></i></span>
                <input type="number" name="ram" class="form-control" id="ram" placeholder="RAM Size in GB" aria-describedby="ram-icon" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="storage">Storage (GB)</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="storage-icon" class="input-group-text"><i class="bx bx-hdd"></i></span>
                <input type="number" name="storage" class="form-control" id="storage" placeholder="Storage Size in GB" aria-describedby="storage-icon" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="serial_number">Serial Number</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="serial-icon" class="input-group-text"><i class="bx bx-barcode-reader"></i></span>
                <input type="text" name="serial_number" class="form-control" id="serial_number" placeholder="Serial Number" aria-describedby="serial-icon" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="notes">Notes</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="notes-icon" class="input-group-text"><i class="bx bx-comment"></i></span>
                <textarea name="notes" class="form-control" id="notes" placeholder="Additional notes about the PC/Laptop" aria-describedby="notes-icon"></textarea>
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