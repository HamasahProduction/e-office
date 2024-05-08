<div class="modal fade" id="upload_file_{{ $suratMasuk->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">File : {{ $suratMasuk->perihal }}</h5>
            </div>

            <form action="{{ route('app.admin.surat-masuk.lampiran', $suratMasuk->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_surat" value="{{$suratMasuk->id}}">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Perihal<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="perihal" maxlength="255" minlength="5" readonly
                                class="form-control @error('perihal') is-invalid @enderror"
                                value="{{ old('perihal', $suratMasuk->perihal) }}">
                            <div class="invalid-feedback">
                                @error('perihal')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">File Surat<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="file" name="file_surat" accept="application/pdf"
                                class="form-control @error('file_surat') is-invalid @enderror"
                                value="{{ old('file_surat') }}">
                            <div class="invalid-feedback">
                                @error('file_surat')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="uploadBtn" type="submit" class="btn btn-primary btn-import">Upload</button>
                    <button id="closeBtn" type="button" class="btn btn-light btn-import-close"
                        data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
