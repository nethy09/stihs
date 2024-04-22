@extends('admin.admin_master')
@section('admin')

<style>
    /* Minimalist Table CSS */
    .table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    .table th,
    .table td {
        border: 1px solid #e0e0e0;
        padding: 10px;
        text-align: center;
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
    .header {
                text-align: center;
                font-family: serif;
                font-display: solid black;
            }
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
                font-family: serif;
                font-size: 14px;
                border-collapse: collapse;
                width: 100%;
                height: 70px;
                border: 1px solid black;
                margin-bottom: 1px;

            }
            .table,th {
                border: 1px solid black;
                text-align: center;
            }

            .custom-table {
            width: 100%;
            margin: 0 auto;
            text-align: center;
            border: 1px solid #e0e0e0;
            }
            .custom-table td:first-child {
    border-right: 1px solid #e0e0e0; /* Add right border to the first column */
}

</style>

<div class="page-content ">
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

            <div class=" col-xl-6">
                <div class="card"  style="width: 200%;">
                    <div class="card-body "  style="width: 100%; padding:30px;">


                        <div class="row">
                            <form action="{{ route('form.index') }}" method="POST" >

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

                                <table id="labelTable" class="table" style="border: 1px solid black;">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Action</th> <!-- Modified this header -->
                                        </tr>
                                        <tr class="label-row">
                                            <td><input name='item_name' class="form-control" type="text" value="{{ old('item_name') }}"></td>
                                            <td><input name='quantity' class="form-control" type="text" value="{{ old('quantity') }}"></td>
                                            <td><button type="button" id="addLabelBtn" class="btn btn-primary">Add
                                                <button type="button" class="btn btn-danger removeLabelBtn">Remove</button>
                                                </button></td> <!-- Added and remove button -->
                                        </tr>




                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>
                                <tr>
                                    <th colspan="2" style="background-color: transparent;">
                                        <textarea style="width: 100%; height: 13%; border: none;" placeholder="Purpose"></textarea>
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

                        </div><br>

                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add button functionality
        document.getElementById('addLabelBtn').addEventListener('click', function() {
            var labelRow = document.querySelector('.label-row').cloneNode(true); // Clone the label row
            var tableBody = document.querySelector('#labelTable tbody'); // Get the table body
            tableBody.appendChild(labelRow); // Append the cloned row to the table body
        });

        // Remove button functionality
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('removeLabelBtn')) {
                var labelRow = event.target.closest('.label-row'); // Get the closest label row
                if (labelRow) {
                    labelRow.remove(); // Remove the label row
                }
            }
        });
    });
</script>


</div>
@endsection

