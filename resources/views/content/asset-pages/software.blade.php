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
        <form action="{{ route('software.store') }}" method="POST">
          @csrf
          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="name">Name</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-package"></i></span>
                <input type="text" class="form-control" id="name" name="name" placeholder="Software Name" aria-label="Software Name" required />
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="version">Version</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-hash"></i></span>
                <input type="text" class="form-control" id="version" name="version" placeholder="Version" aria-label="Version" required />
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="license_key">License Key</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-key"></i></span>
                <input type="text" class="form-control" id="license_key" name="license_key" placeholder="License Key" aria-label="License Key" required />
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="buying_date">Buying Date</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                <input type="date" class="form-control" id="buying_date" name="buying_date" aria-label="Buying Date" required />
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <label class="col-sm-2 col-form-label" for="expire_date">Expire Date</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-calendar-check"></i></span>
                <input type="date" class="form-control" id="expiry_date" name="expiry_date" aria-label="Expire Date" required />
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-outline-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection