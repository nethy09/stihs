{{-- Show Modal --}}
<div class="modal fade" id="scan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">Scan Item</h5>
                <button type="button " class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{route('scan.barcode')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')
                    <input autofocus class="text-center" type="text" name="serial_number">
                </form>
            </div>
        </div>
    </div>
</div>
