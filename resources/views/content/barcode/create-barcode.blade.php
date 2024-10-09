@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
@vite(['resources/assets/js/pages-account-settings-account.js'])
@endsection

@section('content')
<div class="container">
    <h1>Create Asset</h1>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('barcode.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="asset_name" class="form-label">Asset Name</label>
            <input type="text" name="asset_name" id="asset_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="asset_description" class="form-label">Description</label>
            <input type="text" name="asset_description" id="asset_description" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Asset</button>
    </form>

    @if(isset($asset))
    <h3>QR Code:</h3>
    @if($asset->qr_code_path)
    <img src="{{ asset($asset->qr_code_path) }}" alt="QR Code" class="img-fluid">
    @else
    <p>No QR Code available.</p>
    @endif
    @endif
</div>
@endsection