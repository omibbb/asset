@extends('layouts/contentNavbarLayout')

@section('title', 'Manage Asset QR Code')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-6">
            <div class="container">
                <h2>Manage Barcode</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Asset Type</th>
                            <th>Brand/Name</th>
                            <th>Serial Number</th>
                            <th>QR Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assets as $asset)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ class_basename($asset) }}</td>
                            <td>{{ $asset->brand ?? $asset->name ?? '-' }}</td>
                            <td>{{ $asset->serial_number ?? $asset->license_key ?? '-' }}</td>
                            <td>
                                @if($asset->qr_code)
                                <img src="{{ asset($asset->qr_code) }}" alt="QR Code" style="width: 100px; height: 100px;">
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection