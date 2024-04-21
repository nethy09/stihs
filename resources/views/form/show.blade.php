{{-- Create Modal --}}
<div class="modal fade" id="formShow{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->forms as $form)
                            <tr class="label-row">
                                    <td>{{ $form->item_name }}</td>
                                    <td>{{ $form->quantity }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <span>Purpose: {{$form->purpose}}</span>

                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                                <tr style="text-align: left;">
                                    <td>Requested By: {{$user->first_name}} {{$user->last_name}} {{$user->middle_initial}}.</td>
                                </tr>
                                <tr>
                                    <td><br>Signature Over Printed Name <br><br>
                                        Position/Office: {{$user->usertype}} <br><br>
                                        Date: {{$user->created_at}}</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
