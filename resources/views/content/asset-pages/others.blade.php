@extends('layouts/contentNavbarLayout')

@section('title', 'Others - Forms')

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
        <form action="{{ route('others.store') }}" method="POST">
          @csrf
          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="asset_class">Asset Class</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-archive"></i></span>
                <input type="text" id="asset_class" name="asset_class" class="form-control" placeholder="Asset Class" aria-label="Asset Class" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="asset_no">Asset No</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-tag"></i></span>
                <input type="text" id="asset_no" name="asset_no" class="form-control" placeholder="Asset No" aria-label="Asset No" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="asset_description">Asset Description</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-info-circle"></i></span>
                <input type="text" id="asset_description" name="asset_description" class="form-control" placeholder="Asset Description" aria-label="Asset Description" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="acquisition_date">Acquisition Date</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                <input type="date" id="acquisition_date" name="acquisition_date" class="form-control" aria-label="Acquisition Date" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="new_fixed_asset_no">New Fixed Asset No</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-key"></i></span>
                <input type="text" id="new_fixed_asset_no" name="new_fixed_asset_no" class="form-control" placeholder="New Fixed Asset No" aria-label="New Fixed Asset No" required />
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