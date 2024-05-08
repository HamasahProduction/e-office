<div class="modal fade" id="show_file_{{ $suratKeluar->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">File : </h5>
            </div>
            
            <div class="modal-body">
                <iframe id="fileurl" src="{{ asset('storage/'.$suratKeluar->file) }}" width="100%" height="500px">
                </iframe>
            </div>
            <div class="modal-footer">
                <button id="closeBtn" type="button" class="btn btn-light btn-import-close" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>