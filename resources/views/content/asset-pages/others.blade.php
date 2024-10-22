@extends('layouts/contentNavbarLayout')

@section('title', 'Others - Forms')

@section('content')
<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Basic with Icons -->
  <div class="col-xxl">
    <div class="alert alert-primary d-flex" role="alert">
      <span class="alert-icon rounded-circle"><i class="bx bx-error"></i></span>
      <div class="d-flex flex-column ps-1">
        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Information!</h6>
        <span>The serial number field is <b>optional</b>.</span>
      </div>
    </div>
    <div class="card mb-6">
      <div class="card-header d-flex align-items-center justify-content-between">
        <!-- <h5 class="mb-0">Basic with Icons</h5> <small class="text-muted float-end">Merged input group</small> -->
      </div>
      <div class="card-body">
        <form action="{{ isset($asset) ? route('others.update', $asset->id) : route('others.store') }}" method="POST">
          @csrf
          @if(isset($asset))
          @method('PUT')
          @endif

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="asset_class">Asset Class</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-archive"></i></span>
                <input type="text" id="asset_class" name="asset_class" class="form-control" placeholder="Asset Class" aria-label="Asset Class" value="{{ old('asset_class', $asset->asset_class ?? '') }}" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="asset_no">Asset No</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-tag"></i></span>
                <input type="text" id="asset_no" name="asset_no" class="form-control" placeholder="Asset No" aria-label="Asset No" value="{{ old('asset_no', $asset->asset_no ?? '') }}" required />
              </div>
              @if ($errors->has('asset_no'))
              <span class="text-danger">{{ $errors->first('asset_no') }}</span>
              @endif
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="asset_description">Asset Description</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-info-circle"></i></span>
                <input type="text" id="asset_description" name="asset_description" class="form-control" placeholder="Asset Description" aria-label="Asset Description" value="{{ old('asset_description', $asset->asset_description ?? '') }}" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="acquisition_date">Acquisition Date</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                <input type="date" id="acquisition_date" name="acquisition_date" class="form-control" aria-label="Acquisition Date" value="{{ old('acquisition_date', $asset->acquisition_date ?? '') }}" required />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="new_fixed_asset_no">New Fixed Asset No</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-key"></i></span>
                <input type="text" id="new_fixed_asset_no" name="new_fixed_asset_no" class="form-control" placeholder="New Fixed Asset No" aria-label="New Fixed Asset No" value="{{ old('new_fixed_asset_no', $asset->new_fixed_asset_no ?? '') }}" required />
              </div>
              @if ($errors->has('new_fixed_asset_no'))
              <span class="text-danger">{{ $errors->first('new_fixed_asset_no') }}</span>
              @endif
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="serial_number">Serial Number</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-key"></i></span>
                <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="Serial Number" aria-label="Serial Number" value="{{ old('serial_number', $asset->serial_number ?? '') }}" />
              </div>
            </div>
          </div>

          <div class="row mb-6">
            <label class="col-sm-2 col-form-label" for="location">Location</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-map"></i></span>
                <input type="text" id="location" name="location" class="form-control" placeholder="Location" aria-label="Location" value="{{ old('location', $asset->location ?? '') }}" />
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-outline-primary">{{ isset($asset) ? 'Update' : 'Submit' }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection