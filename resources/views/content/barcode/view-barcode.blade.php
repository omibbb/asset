@section('title', 'Asset QR Code Details')

@extends('layouts/contentNavbarLayout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-6">
            <div class="card-body">
                <h5>Asset Details</h5>
                <p><strong>Asset Name:</strong> {{ $asset->name }}</p>
                <p><strong>Asset ID:</strong> {{ $asset->id }}</p>
                <p><strong>Asset Code:</strong> {{ $asset->code }}</p> <!-- Menampilkan Asset Code -->
                <p><strong>Asset Description:</strong> {{ $asset->description ?? 'No description available' }}</p> <!-- Menampilkan Deskripsi Asset -->

                @if($asset->qr_code_path)
                <p><strong>QR Code:</strong></p>
                <img src="{{ asset($asset->qr_code_path) }}" alt="QR Code" class="img-fluid" style="max-width: 200px; height: auto;"> <!-- Styling untuk QR Code -->
                @else
                <p>No QR Code available.</p> <!-- Pesan jika QR Code tidak ada -->
                @endif
            </div>
        </div>
    </div>
</div>
@endsection