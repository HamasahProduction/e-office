<table class="table table-striped custom-table no-footer mb-0">
    <thead>
        <tr style="text-align: center; vertical-align: middle;">
            <th >No</th>
            <th >TANGGAL</th>
            <th >NOMOR SURAT</th>
            <th >TUJUAN</th>
            <th >ISI SINGKAT</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($surats as $suratKeluar)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $suratKeluar->tgl_surat }}</td>
                <td>{{ $suratKeluar->nomor_surat }}</td>
                <td>{{ $suratKeluar->nama_instansi_dituju }}</td>
                <td>{{ $suratKeluar->deskripsi_surat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
