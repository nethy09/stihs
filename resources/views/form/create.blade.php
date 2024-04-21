{{-- Create Modal --}}
<div class="modal fade" id="form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">Supply Request Form</h5>
                <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('form.store') }}" method="POST">
                    @csrf

                    {{-- <input type="text" name="user_id" value="{{user}}"> --}}
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="label-row">
                                <td><input name='item_name[]' class="form-control" type="text" value="{{ old('item_name') }}"></td>
                                <td><input name='quantity[]' class="form-control" type="text" value="{{ old('quantity') }}"></td>
                                <td>
                                    <button type="button" class="btn btn-primary addLabelBtn">Add</button>
                                    <button type="button" class="btn btn-danger removeLabelBtn">Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <label for="">Purpose:</label><input type="text" name="purpose" value="{{old('purpose')}}">

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
            </div>
        </div>
    </div>
</div>

<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Add button functionality
    document.querySelector('.addLabelBtn').addEventListener('click', function() {
        var labelRow = document.querySelector('.label-row').cloneNode(true);
        var tableBody = document.querySelector('#labelTable tbody');
        tableBody.appendChild(labelRow);
    });

    // Remove button functionality
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('removeLabelBtn')) {
            var labelRow = event.target.closest('.label-row');
            if (labelRow) {
                labelRow.remove();
            }
        }
    });
});
</script>
