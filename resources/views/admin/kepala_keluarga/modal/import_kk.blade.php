<div class="modal fade" id="import-kelompok-keluarga" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Import Kelompok Keluarga</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <form action="{{ route('app.admin.kepala_keluarga.import') }}" method="POST" enctype="multipart/form-data" id="importForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-12 col-form-label">Silahkan Import File<span class="text-danger">*</span></label>
                        <div class="col-lg-12">
                            <input type="file" name="file" required class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}">
                            <div class="invalid-feedback">
                                @error('file')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeBtn" type="button" class="btn btn-light btn-import-close" data-bs-dismiss="modal">Close</button>
                    <button id="uploadBtn" type="submit" class="btn btn-primary btn-import">Upload</button>
                    <button id="loadingBtn" class="btn btn-primary btn-import-spiner" style="display: none;" type="button" disabled="">
                        <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>