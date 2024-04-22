@extends('admin.admin_master')
@section('admin')

<style>
    /* Resetting default styles for printing */
    @media print {
        body * {
            visibility: hidden;
        }
        .print-container, .print-container * {
            visibility: visible;
        }
        .print-container {
            position: absolute;
            left: 0;
            top: 0;
        }
    }

    /* Minimalist Table CSS */
    .table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    .table th,
    .table td {
        border: 1px solid #000; /* Changed border color */
        padding: 8px; /* Reduced padding */
        text-align: center;
    }

    .table thead th {
        background-color: #fff; /* Changed background color */
        font-weight: bold;
    }

    .btn {
        display: none; /* Hide buttons on print */
    }

    .header, .header1, .title {
        text-align: center;
        font-family: serif;
    }

    .header1 {
        font-size: 17px; /* Adjusted font size */
        margin-bottom: 5px; /* Reduced margin */
    }

    .title {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .table-container {
        display: none; /* Hide unnecessary table on print */
    }
</style>

<div class="page-content print-container"> <!-- Added print-container class -->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">SUPPLY REQUEST FORM</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-6">
                <div class="card" style="width: 200%;">
                    <div class="card-body" style="width: 100%; padding:30px;">

                        <div class="row">
                            <form action="{{ route('form.show') }}" method="POST">

                                <span class="logo-lg1">
                                    <img src="{{ asset('logo/KNE.png') }}" alt="logo-dark" height="50">
                                </span>

                                <span class="logo-lg2">
                                    <img src="{{ asset('logo/DepEd.png') }}" alt="logo-dark" height="50" position=>
                                </span>

                                <div class="header">
                                    <div class="title">Department of Education</div>
                                </div>

                                <div class="header1">
                                    <div class="header1">Central Office</div>
                                </div>
                                <div class="header">
                                    <div class="title">SUPPLY REQUEST FORM</div>
                                </div>

                                <table id="labelTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                        </tr>
                                        <tr class="label-row">
                                            <td><input name='item_name' class="form-control" type="text" value="{{ old('item_name') }}"></td>
                                            <td><input name='quantity' class="form-control" type="text" value="{{ old('quantity') }}"></td>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <tr>
                                    <th colspan="2">
                                        <textarea style="width: 100%; height: 13%; border: 1px solid #000;" placeholder="Purpose"></textarea>
                                    </th>
                                </tr>
                                <div class="table-container">
                                    <table class="custom-table">
                                        <thead>
                                            <tr style="text-align: left;">
                                                <td>Requested By:</td>
                                            </tr>
                                            <tr>
                                                <td><br>Signature Over Printed Name <br><br>
                                                    Position/Office <br><br>
                                                    Date</td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div style="text-align: right;">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                </div>

                            </form>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
