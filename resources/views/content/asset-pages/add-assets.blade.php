@extends('layouts/contentNavbarLayout-pros')

@section('title', 'Dashboard Assets')

@section('page-script')
@vite(['resources/assets/js/pages-account-settings-account.js'])
@endsection

@section('content')
<!-- Content -->
<div class="row g-6 mb-6">
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span class="text-heading">PC/Laptop</span>
                        <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">{{ $deviceTotal }}</h4>
                        </div>
                        <small class="mb-0">Total Users</small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-danger">
                            <i class="bx bx-laptop bx-lg"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span class="text-heading">Software</span>
                        <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">{{ $softwareTotal }}</h4>
                        </div>
                        <small class="mb-0">Recent analytics</small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-success">
                            <i class="bx bx-customize bx-lg"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span class="text-heading">Phone</span>
                        <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">{{ $phonesTotal }}</h4>
                            <!-- <p class="text-success mb-0">(0%)</p> -->
                        </div>
                        <small class="mb-0">Recent analytics</small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-secondary">
                            <i class="bx bx-phone bx-lg"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span class="text-heading">Network Device</span>
                        <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">{{ $networkDeviceTotal }}</h4>
                        </div>
                        <small class="mb-0">Recent analytics</small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-info">
                            <i class="bx bx-sitemap bx-lg"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span class="text-heading">Monitor</span>
                        <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">{{ $monitorTotal }}</h4>
                        </div>
                        <small class="mb-0">Recent analytics</small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-primary">
                            <i class="bx bx-desktop bx-lg"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span class="text-heading">License</span>
                        <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">{{ $licenseTotal }}</h4>
                        </div>
                        <small class="mb-0">Recent analytics</small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-warning">
                            <i class="bx bxs-key bx-lg"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span class="text-heading">Printers</span>
                        <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">{{ $printersTotal }}</h4>
                        </div>
                        <small class="mb-0">Recent analytics</small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-dark">
                            <i class="bx bx-printer bx-lg"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span class="text-heading">Others</span>
                        <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">{{ $othersTotal }}</h4>
                        </div>
                        <small class="mb-0">Recent analytics</small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-dark">
                            <i class='bx bx-customize bx-lg'></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Assets List Table -->
<div class="card">
    <div class="card-datatable table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="row">
                <div class="col-md-2">
                    <div class="ms-n2">
                        <div class="dataTables_length" id="DataTables_Table_0_length">
                            <label>
                                <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                    <option value="7">7</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-6 mb-md-0 mt-n6 mt-md-0">
                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                            <label>
                                <input type="search" class="form-control" placeholder="Search Assets" aria-controls="DataTables_Table_0">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <table id="DataTables_Table_0" class="table" style="text-align: center;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Asset Type</th>
                        <th>Brand/Name</th>
                        <th>Serial Number</th>
                        <th>Barcode</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 160px;" aria-label="Actions">Actions</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    @foreach($allAssets as $asset)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ class_basename($asset) }}</td>
                        <td>{{ $asset->brand ?? $asset->name ?? $asset->asset_description ?? '-' }}</td>
                        <td>{{ $asset->serial_number ?? $asset->license_key ?? $asset->new_fixed_asset_no ?? '-' }}</td>
                        <td>
                            @if(!$asset->qr_code_path)
                            <i id="qr-icon-{{ strtolower(class_basename($asset)) }}-{{ $asset->id }}" class='bx bx-x text-danger' onclick="showQrCode(null)" style="cursor: pointer;"></i>
                            @else
                            <i id="qr-icon-{{ strtolower(class_basename($asset)) }}-{{ $asset->id }}" class='bx bx-search-alt text-success' onclick="showQrCode('{{ asset($asset->qr_code_path) }}')" style="cursor: pointer;"></i>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-50">
                                <a href="#" class="btn btn-sm btn-icon edit-record" data-id="#">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('assets.delete', ['type' => strtolower(class_basename($asset)), 'id' => $asset->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-icon delete-record">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                                <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="javascript:;" class="dropdown-item" onclick="viewDetail({{ $asset->id }}, '{{ strtolower(class_basename($asset)) }}')">View Detail</a>
                                    <a href="javascript:;" class="dropdown-item" onclick="generateQr('{{ strtolower(class_basename($asset)) }}', '{{ $asset->id }}')">Generate Qr</a>
                                    <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#qrCodeModal">Scan QR Code</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- Pagination & Info -->
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                        Displaying 1 to {{ $totalAssets }} of {{ $totalAssets }} entries
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                                <a aria-controls="DataTables_Table_0" data-dt-idx="previous" class="page-link">
                                    <i class="bx bx-chevron-left bx-sm"></i>
                                </a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="DataTables_Table_0" class="page-link">1</a>
                            </li>
                            <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
                                <a aria-controls="DataTables_Table_0" data-dt-idx="next" class="page-link">
                                    <i class="bx bx-chevron-right bx-sm"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- / Content -->

<script>
    $(document).ready(function() {
        $('#DataTables_Table_0').DataTable({
            "pageLength": 7, // Jumlah baris yang ditampilkan per halaman
            "lengthMenu": [7, 10, 20, 50, 100], // Opsi jumlah item per halaman
            "paging": true,
            "searching": true,
            "info": true,
            "ordering": true, // Aktifkan fitur pengurutan jika dibutuhkan
            "language": {
                "paginate": {
                    "previous": "<i class='bx bx-chevron-left bx-sm'></i>",
                    "next": "<i class='bx bx-chevron-right bx-sm'></i>"
                }
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function viewDetail(id, type) {
        // Lakukan Ajax request untuk mendapatkan data detail item
        $.ajax({
            url: `/assets/${type}/${id}/detail`,
            method: 'GET',
            success: function(data) {
                console.log(data);
                let detailContent = '';

                // Cek tipe aset dan tampilkan detail yang sesuai
                if (type === 'softwares') {
                    detailContent = `
                        <strong>Name:</strong> ${data.name} <br>
                        <strong>Version:</strong> ${data.version} <br>
                        <strong>License Key:</strong> ${data.license_key} <br>
                        <strong>Buying Date:</strong> ${data.buying_date} <br>
                        <strong>Expiry Date:</strong> ${data.expiry_date} <br>
                    `;
                } else if (type === 'phone') {
                    detailContent = `
                        <strong>Brand:</strong> ${data.brand} <br>
                        <strong>Model:</strong> ${data.model} <br>
                        <strong>RAM:</strong> ${data.ram} <br>
                        <strong>Storage:</strong> ${data.storage} <br>
                        <strong>IMEI:</strong> ${data.imei} <br>
                        <strong>Battery Capacity:</strong> ${data.battery_capacity} <br>
                    `;
                } else if (type === 'others') {
                    detailContent = `
                        <strong>Asset Class:</strong> ${data.asset_class} <br>
                        <strong>Asset Number:</strong> ${data.asset_no} <br>
                        <strong>Asset Description:</strong> ${data.asset_description} <br>
                        <strong>Acquisition Date:</strong> ${data.acquisition_date} <br>
                        <strong>Fixed Asset Number:</strong> ${data.new_fixed_asset_no} <br>
                    `;
                } else {
                    // Jika ada tipe lain, tambahkan logika yang sesuai
                    detailContent = `<strong>Description:</strong> ${data.description ?? '-'}`;
                }

                // Tampilkan detail item menggunakan SweetAlert
                Swal.fire({
                    title: 'Asset Detail',
                    html: detailContent,
                    icon: 'info',
                });
            }
        });
    }
</script>

<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Tampilkan hasil pemindaian di elemen hasil
        document.getElementById('result').innerText = `Scanned QR Code: ${decodedText}`;

        // Tampilkan hasil pemindaian dalam alert
        alert(`QR Code Scanned: ${decodedText}`);

        // Jika perlu, hentikan pemindaian setelah berhasil
        html5QrCode.stop();
    }

    function onScanError(errorMessage) {
        // Tangani kesalahan pemindaian
        console.warn(`QR Code scan error: ${errorMessage}`);
    }

    const html5QrCode = new Html5Qrcode("reader");
    const config = {
        fps: 10,
        qrbox: 250
    };

    // Mendapatkan elemen modal
    var qrCodeModal = document.getElementById('qrCodeModal');

    // Menambahkan event listener ketika modal ditampilkan
    qrCodeModal.addEventListener('shown.bs.modal', function() {
        console.log("Modal is shown. Starting QR Code scanner...");
        setTimeout(() => {
            html5QrCode.start({
                    facingMode: "environment"
                },
                config,
                onScanSuccess,
                onScanError
            ).then(() => {
                console.log("QR Code scanner started successfully.");
            }).catch(err => {
                console.error(`Unable to start scanning: ${err}`);
            });
        }, 500);
    });

    // Menambahkan event listener ketika modal disembunyikan
    qrCodeModal.addEventListener('hidden.bs.modal', function() {
        // Hentikan pemindaian ketika modal disembunyikan
        html5QrCode.stop().then(ignore => {
            console.log("QR Code scanning stopped.");
        }).catch(err => {
            console.error(`Unable to stop scanning: ${err}`);
        });
        document.getElementById('result').innerText = ''; // Kosongkan hasil saat modal ditutup
    });
</script>

<script>
    function showQrCode(qrCodePath) {
        if (!qrCodePath) {
            // Tampilkan pesan peringatan jika QR code tidak ada
            Swal.fire({
                icon: 'warning',
                title: 'QR Code Tidak Tersedia',
                text: 'QR code untuk aset ini belum dihasilkan.',
                confirmButtonText: 'Tutup'
            });
        } else {
            // Menggunakan SweetAlert untuk menampilkan QR code
            Swal.fire({
                title: 'QR Code Asset',
                html: `<div style="display: flex; justify-content: center;">
                        <img src="${qrCodePath}" alt="QR Code" style="width: 200px; height: 200px;"/>
                    </div>`,
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Download',
                cancelButtonText: 'Close',
                preConfirm: () => {
                    downloadQrCode(qrCodePath);
                }
            });
        }
    }

    function downloadQrCode(qrCodePath) {
        // Membuat elemen anchor untuk mendownload QR code
        const link = document.createElement('a');
        link.href = qrCodePath;
        link.download = 'qr_code.png'; // Nama file saat diunduh
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>

<script>
    function generateQr(type, id) {
        // Panggil AJAX untuk generate QR code
        $.ajax({
            url: `/assets/${type}/${id}/generate-qr`, // URL ke route generateQr
            type: 'GET',
            success: function(response) {
                // Jika berhasil, update tampilan ikon status QR code
                let qrIcon = document.querySelector(`#qr-icon-${type}-${id}`);
                qrIcon.classList.remove('bx-x', 'text-danger');
                qrIcon.classList.add('bx-search-alt', 'text-success');

                // Update onclick handler untuk QR code yang baru saja di-generate
                qrIcon.setAttribute('onclick', `showQrCode('${response.qr_code_path}')`);

                // Optionally, show a success message
                Swal.fire({
                    icon: 'success',
                    title: 'Generate Berhasil',
                    text: 'QR code telah berhasil di-generate dan tersimpan.',
                    confirmButtonText: 'Tutup'
                });
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Mengenerate QR Code',
                    text: 'Terjadi kesalahan saat generate QR code.',
                    confirmButtonText: 'Tutup'
                });
            }
        });
    }
</script>
@endsection