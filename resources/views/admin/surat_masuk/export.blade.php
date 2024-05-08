<table class="table table-striped custom-table no-footer mb-0">
    <thead>
        <tr style="text-align: center; vertical-align: middle;">
            <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
            <th rowspan="2" style="text-align: center; vertical-align: middle;">TANGGAL DITERIMA</th>
            <th colspan="2" style="text-align: center; vertical-align: middle;">SURAT</th>
            <th rowspan="2" style="text-align: center; vertical-align: middle;">PENGIRIM</th>
            <th rowspan="2" style="text-align: center; vertical-align: middle;">ISI SINGKAT</th>
        </tr>
        <tr>
            <th>NOMOR</th>
            <th>TANGGAL</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($surats as $suratMasuk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $suratMasuk->tgl_surat_masuk }}</td>
                <td>{{ $suratMasuk->nomor_surat }}</td>
                <td>{{ $suratMasuk->tgl_surat }}</td>
                <td>{{ $suratMasuk->nama_instansi_pengirim }}</td>
                <td>{{ $suratMasuk->deskripsi_surat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
