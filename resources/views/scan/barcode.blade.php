@extends('admin.admin_master')
@section('admin')

<style>
    .header1 {
        margin-bottom: 10px;
        text-align: center;
        font-family: serif;
        font-size: 17px;
        font-display: solid black;
    }

    .logo-lg1 img {
        width: 150px;
        height: auto;
    }

    .logo-lg2 img {
        width: 100px;
        height: auto;
        margin-right: 10px;
    }

    .logo-lg1 {
        float: left;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .logo-lg2 {
        float: right;
        margin-left: 10px;
        margin-bottom: 10px;
    }

    .title {
        margin-bottom: 10px;
        font-family: serif;
        font-size: 20px;
        font-display: solid black;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    .table th,
    .table td {
        border: 1px solid #e0e0e0;
        padding: 10px;
        text-align: left;
    }

    .table thead th {
        background-color: #f5f5f5;
        font-weight: bold;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table-hover tbody tr:hover {
        background-color: #f0f0f0;
    }

    .btn {
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border: 1px solid #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    input[type="text"] {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border-radius: 4px;
        border: 1px solid #0056b3;
        box-sizing: border-box;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Scan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ Session::get('success') }}
        </div>
        @endif

        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ Session::get('error') }}
        </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card ">
                    <div class="card-body text-center">
                        <h4 class="card-title">SCAN THE BARCODE</h4>
                        <br>
                        <form id="scanForm" action="{{route('scan.barcode')}}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input autofocus class="text-center" type="text" name="serial_number">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="scanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="scanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">Scanned Item</h5>
                <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <span class="logo-lg1">
                    <img src="{{ asset('logo/KNE.png') }}" alt="logo-dark" height="50">
                </span>

                <span class="logo-lg2">
                    <img src="{{ asset('logo/DepEd.png') }}" alt="logo-dark" height="50" position=>
                </span>


                <div class="header1">
                    <div class="header1">Department of Education
                        <br>Central Office
                        <br>SUPPLY REQUEST FORM
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3 position-relative">
                            <label class="form-label" id="itemNoLabel"></label>
                        </div>
                        <div class="mb-3 position-relative">
                            <label class="form-label" id="serialNumberLabel"></label>
                        </div>
                        <div class="mb-3 position-relative">
                            <label class="form-label" id="statusLabel"></label>
                        </div>
                        <div class="mb-3 position-relative">
                            <label class="form-label" id="userLabel"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('#scanForm').submit(function (event) {
            event.preventDefault(); // Prevent default form submission
            var formData = $(this).serialize(); // Serialize form data

            // Make AJAX request
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function (response) {
                    if (response.success) {
                        // Populate modal with item instance details
                        $('#itemNoLabel').text('Item No.: ' + response.item_instance.item_id);
                        $('#serialNumberLabel').text('Serial Number: ' + response.item_instance.serial_number);
                        $('#statusLabel').text('Status: ' + response.item_instance.status);
                        $('#userLabel').text('User: ' + response.item_instance.user.first_name + ' ' + response.item_instance.user.last_name);
                        // Show the modal with the item instance details
                        $('#scanModal').modal('show');
                    } else {
                        // Handle item not found
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection
