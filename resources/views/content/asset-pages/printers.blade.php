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
        <form action="{{ route('printers.store') }}" method="POST">
          @csrf
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="brand">Brand</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-printer"></i></span>
                <input type="text" id="brand" name="brand" class="form-control" placeholder="Printer Brand" aria-label="Printer Brand" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="type">Type</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-category"></i></span>
                <input type="text" id="type" name="type" class="form-control" placeholder="Printer Type" aria-label="Printer Type" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="ink_type">Ink Type</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-droplet"></i></span>
                <input type="text" id="ink_type" name="ink_type" class="form-control" placeholder="Ink Type" aria-label="Ink Type" required />
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