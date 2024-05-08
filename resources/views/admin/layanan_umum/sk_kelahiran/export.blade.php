<table class="table table-striped custom-table no-footer mb-0 ">
    <thead>
        <tr>
            <th>No</th>
            <th>NAMA ORANG TUA</th>
            <th>NAMA ANAK</th>
            <th>JENIS KELAMIN</th>
            <th>TEMPAT TANGGAL LAHIR</th>
            <th>ALAMAT</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($surats as $suratKelahiran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>Ayah: {{ strtoupper($suratKelahiran->ayah->nama_lengkap) }} - Ibu: {{ strtoupper($suratKelahiran->ibu->nama_lengkap) }}</td>
                <td>{{ strtoupper($suratKelahiran->nama) }}</td>
                <td>{{ $suratKelahiran->jenis_kelamin=='L'?'Laki-Laki':'Perempuan' }}</td>
                <td>{{ strtoupper($suratKelahiran->tempat_lahir) }}, {{ Carbon\Carbon::parse($suratKelahiran->tgl_lahir)->isoFormat('D MMMM Y') }}</td>
                <td>{{ $suratKelahiran->alamat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>