@section('title', 'Scan Asset QR Code')

@extends('layouts/contentNavbarLayout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-6">
            <div class="card-body">
                <h5>Scan QR Code to Identify Asset</h5>
                <div id="reader" style="width: 500px;"></div>
                <div id="result" style="margin-top: 20px; font-weight: bold;"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Handle the result after successfully scanning the QR code
        document.getElementById('result').innerHTML = `<p>Scanned Result: ${decodedText}</p>`;
        // You can redirect to asset details page or make AJAX call
        window.location.href = `/barcode/view/${decodedText}`; // Assuming the QR code contains asset ID
    }

    function onScanFailure(error) {
        // Handle scan failure, usually just log to console
        console.warn(`QR Code scan error: ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 250
        });

    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endsection