<table class="table table-striped custom-table no-footer mb-0">
    <thead>
        <tr style="text-align: center; vertical-align: middle;">
            <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
            <th rowspan="2" style="text-align: center; vertical-align: middle;">NAMA</th>
            <th rowspan="2" style="text-align: center; vertical-align: middle;">ALAMAT</th>
            <th colspan="2" style="text-align: center; vertical-align: middle;">PINDAH KE-</th>
            <th colspan="2" style="text-align: center; vertical-align: middle;">DATANG DARI-</th>
        </tr>
        <tr>
            <th>ALAMAT</th>
            <th>TANGGAL</th>
            <th>ALAMAT</th>
            <th>TANGGAL</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($surats as $pindahDatang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pindahDatang->nama_pemohon }}</td>
                <td>
                    {{ strtoupper($pindahDatang->dusun_asal) }}, RT: {{ strtoupper($pindahDatang->rt_asal) }} / RW: {{ strtoupper($pindahDatang->rw_asal) }} 
                    DESA {{ $pindahDatang->villageAsal->name }} KEC. {{ $pindahDatang->districtAsal->name }} {{ $pindahDatang->regencyAsal->name }} PROVINSI {{ $pindahDatang->provinceAsal->name }}
                </td>
                <td>
                    {{ strtoupper($pindahDatang->dusun_tujuan) }}, RT: {{ strtoupper($pindahDatang->rt_tujuan) }} / RW: {{ strtoupper($pindahDatang->rw_tujuan) }} 
                    DESA {{ $pindahDatang->villageTujuan->name }} KEC. {{ $pindahDatang->districtTujuan->name }} {{ $pindahDatang->regencyTujuan->name }} PROVINSI {{ $pindahDatang->provinceTujuan->name }}
                </td>
                <td>{{ Carbon\Carbon::parse($pindahDatang->rencana_tgl_pindah)->isoFormat('D MMMM Y') }}</td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
