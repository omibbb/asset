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
        <form action="{{ route('monitors.store') }}" method="POST">
          @csrf
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="brand">Brand</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-brands"></i></span>
                <input type="text" id="brand" name="brand" class="form-control" placeholder="Brand Name" aria-label="Brand Name" required />
              </div>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="size">Size (inches)</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-tv"></i></span>
                <input type="number" id="size" name="size" class="form-control" placeholder="Size in inches" aria-label="Size" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="resolution">Resolution</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-resolution"></i></span>
                <input type="text" id="resolution" name="resolution" class="form-control" placeholder="1920x1080" aria-label="Resolution" required />
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