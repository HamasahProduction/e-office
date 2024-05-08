<div id="printable" style="display: none">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-7"><strong>SURAT KETERANGAN PINDAH DATANG WNI</strong></div>
            <div class="col-lg-2 text-end">
                <strong
                    style="border: 2px solid black; padding-top:5px; padding-bottom:5px; padding-left:20px; padding-right:20px;">F-1.08</strong>
            </div>
            <div class="col-lg-12">
                <strong>DATA DAERAH ASAL</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table style="width: 100%;">
                    <tr>
                        <td style="font-size: 13px;">
                            <small>Nomor Kartu Keluarga</small>
                        </td>
                        <td style="width: 570px">
                            <table style="width: 590px">
                                <tr>
                                    @foreach ($kkArray as $kk)
                                        <td
                                            style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                            {{ $kk }}</td>
                                    @endforeach
                                </tr>
                                {{-- <tr>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        3</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        2</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        0</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        8</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        2</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        8</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        1</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        9</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        1</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        0</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        1</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        5</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        0</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        0</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        0</td>
                                    <td style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        1</td>
                                </tr> --}}
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top:5px">
                    <tr>
                        <td style="font-size: 13px;">
                            Nama Kepala Keluarga
                        </td>
                        <td style="width: 590px">
                            <table style="width: 590px">
                                <tr>
                                    <td
                                        style="border: 1px solid black; padding-left:8px;padding-right:8px;  font-size: 13px;">
                                        {{ $pendudukPindah->nama_kepala_keluarga }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top:5px">
                    <tr>
                        <td style="font-size: 13px;">
                            Alamat
                        </td>
                        <td style="width: 590px">
                            <table style="width: 590px">
                                <tr>
                                    <td
                                        style="width: 500px; border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        {{ $pendudukPindah->dusun_asal }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td style="padding: 5px; font-size: 13px;">
                                                    RT
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            @foreach ($rtAsalArray as $rtAsal)
                                                                <td
                                                                    style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                                                    {{ $rtAsal }}</td>
                                                            @endforeach
                                                            {{-- <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                                                3</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                                                2</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                                                0</td> --}}
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="padding: 5px; font-size: 13px;">
                                                    RW
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            @foreach ($rwAsalArray as $rwAsal)
                                                                <td
                                                                    style="border: 1px solid black; padding-left:8px;padding-right:8px;  font-size: 13px;">
                                                                    {{ $rwAsal }}</td>
                                                            @endforeach
                                                            {{-- <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px;  font-size: 13px;">
                                                                3</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px;  font-size: 13px;">
                                                                2</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px;  font-size: 13px;">
                                                                0</td> --}}
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top:5px">
                    <tr>
                        <td style="padding-left: 15px; font-size: 13px;">
                            a. Desa/Kelurahan
                        </td>
                        <td style="width: 590px">
                            <table style="width: 100%">
                                <tr>
                                    <td
                                        style="width: 250px; border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        {{ $pendudukPindah->villageAsal->name }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td style="padding-right: 15px; padding-left:5px; font-size: 13px;">
                                                    c. Kab/Kota
                                                </td>
                                                <td>
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td
                                                                style="width: 250px; border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                                                {{ $pendudukPindah->regencyAsal->name }}</td>
                                                        </tr>
                                                    </table>
                                                </td>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top:5px">
                    <tr>
                        <td style="padding-left: 15px; font-size: 13px;">
                            b. Kecamatan
                        </td>
                        <td style="width: 590px">
                            <table style="width: 590px">
                                <tr>
                                    <td
                                        style="width: 250px; border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        {{ $pendudukPindah->districtAsal->name }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td style="padding-left: 5px; padding-right:21px;; font-size: 13px;">
                                                    d. Provinsi
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td
                                                                style="width: 250px; border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                                                {{ $pendudukPindah->provinceTujuan->name }}</td>
                                                        </tr>
                                                    </table>
                                                </td>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <table style="width: 100%; margin-top:5px">
                                        <tr>
                                            <td style="width: 590px">
                                                <table style="width: 590px">
                                                    <tr>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td
                                                                        style="padding-right: 5px; width:100%;  font-size: 13px;">
                                                                        Kode Pos</td>
                                                                    @foreach ($kodePosAsalArray as $kodePosAsal)
                                                                        <td
                                                                            style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                            {{ $kodePosAsal }}</td>
                                                                    @endforeach
                                                                    {{-- <td
                                                                        style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                        3</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                        2</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                        0</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                        8</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                        2</td> --}}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="width: 340px">
                                                <table>
                                                    <tr>
                                                        <td
                                                            style=" padding-left: 9px; padding-right: 21px;  font-size: 13px;">
                                                            Telepon
                                                        </td>
                                                        <td style="width: 100%">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <table>
                                                                            <tr>
                                                                                @foreach ($noHpArray as $hp)
                                                                                    <td
                                                                                        style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                        {{ $hp }}</td>
                                                                                @endforeach
                                                                                {{-- <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    0</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    8</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    5</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    8</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    2</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    8</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    1</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    9</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    1</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    0</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    1</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    5</td> --}}
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>

                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <strong>DATA KEPINDAHAN</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table style="width: 100%;">
                    <tr>
                        <td style="font-size: 13px;">
                            <small>1. Alasan Pindah</small>
                        </td>
                        <td style="text-align: right; width: 590px">
                            <table>
                                <tr>
                                    <td
                                        style="vertical-align: middle; border: 1px solid black; padding-left:8px;padding-right:8px;  font-size: 13px;">
                                        {{ $pendudukPindah->alasan_pindah_id }}</td>
                                    <td style="padding-left: 25px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">1.</td>
                                                <td class="text-start" style="font-size: 13px;">Pekerjaan</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px;">2.</td>
                                                <td class="text-start" style="font-size: 13px;">Pendidikan</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding-left: 25px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">3.</td>
                                                <td class="text-start" style="font-size: 13px;">Keamanan</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px;">4.</td>
                                                <td class="text-start" style="font-size: 13px;">Kesehatan</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding-left: 25px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">5.</td>
                                                <td class="text-start" style="font-size: 13px;">Perumahan</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px;">6.</td>
                                                <td class="text-start" style="font-size: 13px;">Keluarga</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding-left: 25px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">7.</td>
                                                <td class="text-start" style="font-size: 13px;">Lainya (sebutkan)
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top:5px">
                    <tr>
                        <td style="font-size: 13px;">
                            2. Alamat Tujuan Pindah
                        </td>
                        <td style="width: 590px">
                            <table style="width: 590px">
                                <tr>
                                    <td
                                        style="width: 500px; border: 1px solid black; padding-left:8px;padding-right:8px;  font-size: 13px;">
                                        {{ $pendudukPindah->dusun_tujuan }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td style="padding: 5px; font-size: 13px;">
                                                    RT
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            @foreach ($rtTujuanArray as $rtTujuan)
                                                                <td
                                                                    style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                    {{ $rtTujuan }}</td>
                                                            @endforeach
                                                            {{-- <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                0</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                0</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                4</td> --}}
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="padding: 5px; font-size: 13px;">
                                                    RW
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            @foreach ($rwTujuanArray as $rwTujuan)
                                                                <td
                                                                    style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                    {{ $rwTujuan }}</td>
                                                            @endforeach
                                                            {{-- <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                0</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                1</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                2</td> --}}
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top:5px">
                    <tr>
                        <td style="padding-left: 15px; font-size: 13px;">
                            a. Desa/Kelurahan
                        </td>
                        <td style="width: 590px">
                            <table style="width: 590px">
                                <tr>
                                    <td
                                        style="width: 250px; border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        {{ $pendudukPindah->villageTujuan->name }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td style="padding-right: 15px; padding-left:5px; font-size: 13px;">
                                                    c. Kab/Kota
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td
                                                                style="width: 250px; border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                                                {{ $pendudukPindah->regencyTujuan->name }}</td>
                                                        </tr>
                                                    </table>
                                                </td>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top:5px">
                    <tr>
                        <td style="padding-left: 15px; font-size: 13px;">
                            b. Kecamatan
                        </td>
                        <td style="width: 590px">
                            <table style="width: 590px">
                                <tr>
                                    <td
                                        style="width: 250px; border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                        {{ $pendudukPindah->districtTujuan->name }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td style="padding-left: 5px; padding-right:21px;; font-size: 13px;">
                                                    d. Provinsi
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td
                                                                style="width: 250px; border: 1px solid black; padding-left:8px;padding-right:8px; font-size: 13px;">
                                                                {{ $pendudukPindah->provinceTujuan->name }}</td>
                                                        </tr>
                                                    </table>
                                                </td>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <table style="width: 100%; margin-top:5px">
                                        <tr>
                                            <td style="width: 590px">
                                                <table style="width: 590px">
                                                    <tr>
                                                        <td>
                                                            <table>
                                                                <tr>
                                                                    <td
                                                                        style="padding-right: 5px; width:100%; font-size: 13px;">
                                                                        Kode Pos</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                        4</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                        6</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                        3</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                        8</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:8px;padding-right:8px;">
                                                                        8</td>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="width: 340px">
                                                <table>
                                                    <tr>
                                                        <td
                                                            style=" padding-left: 9px; padding-right: 21px;font-size: 13px;">
                                                            Telepon
                                                        </td>
                                                        <td style="width: 100%">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <table>
                                                                            <tr>
                                                                                @foreach ($noHpArray as $hp)
                                                                                    <td
                                                                                        style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                        {{ $hp }}</td>
                                                                                @endforeach
                                                                                {{-- <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    0</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    8</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    5</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    8</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    2</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    8</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    1</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    9</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    1</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    0</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    1</td>
                                                                                <td
                                                                                    style="border: 1px solid black; padding-left:6px;padding-right:6px;">
                                                                                    5</td> --}}
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>

                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;  margin-top:5px">
                    <tr>
                        <td style="font-size: 13px;">
                            <small>3. Klasifikasi Pindah</small>
                        </td>
                        <td style="text-align: right; width: 590px">
                            <table>
                                <tr>
                                    <td
                                        style="vertical-align: middle; border: 1px solid black; padding-left:8px;padding-right:8px;">
                                        {{ $pendudukPindah->klasifikasi_pindah_id }}</td>
                                    <td style="padding-left: 20px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">1. </td>
                                                <td class="text-start" style="font-size: 13px;"> Dalam satu
                                                    Desa/Kelurahan</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px;">2. </td>
                                                <td class="text-start" style="font-size: 13px;"> Antar
                                                    Desa/Kelurahan</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">3. </td>
                                                <td class="text-start" style="font-size: 13px;"> Antar Kecamatan
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px;">4. </td>
                                                <td class="text-start" style="font-size: 13px;"> Antar Kab/Kota
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">5. </td>
                                                <td class="text-start" style="font-size: 13px;"> Antar Provinsi
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;  margin-top:5px">
                    <tr>
                        <td style="font-size: 13px;">
                            <small>4. Jenis Kepindahan</small>
                        </td>
                        <td style="text-align: right; width: 590px">
                            <table>
                                <tr>
                                    <td
                                        style="vertical-align: middle; border: 1px solid black; padding-left:8px;padding-right:8px;">
                                        {{ $pendudukPindah->jenis_kepindahan_id }}</td>
                                    <td style="padding-left: 20px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">1. </td>
                                                <td class="text-start" style="font-size: 13px;"> Kep. Keluarga</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px;">2. </td>
                                                <td class="text-start" style="font-size: 13px;"> Kep. Keluarga dan
                                                    Seluruh Angg. Keluarga</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">3. </td>
                                                <td class="text-start" style="font-size: 13px;"> Kep. Keluarga dan
                                                    Sbg. Angg. Keluarga</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px;">4. </td>
                                                <td class="text-start" style="font-size: 13px;"> Angg. Keluarga
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;  margin-top:5px">
                    <tr>
                        <td style="font-size: 13px;">
                            <small>5. Status Nomor KK Bagi Yang Tidak Pindah</small>
                        </td>
                        <td style="text-align: right; width: 590px">
                            <table>
                                <tr>
                                    <td
                                        style="vertical-align: middle; border: 1px solid black; padding-left:8px;padding-right:8px;">
                                        {{ $pendudukPindah->status_kk_tdk_pindah_id }}</td>
                                    <td style="padding-left: 20px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">1. </td>
                                                <td class="text-start" style="font-size: 13px;"> Numpang KK</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px;">2. </td>
                                                <td class="text-start" style="font-size: 13px;"> Membuat KK Baru
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">3. </td>
                                                <td class="text-start" style="font-size: 13px;"> Tidak Ada Angg.
                                                    Keluarga Yang Ditinggal</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px;">4. </td>
                                                <td class="text-start" style="font-size: 13px;"> Nomor KK Tetap
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;  margin-top:5px">
                    <tr>
                        <td style="font-size: 13px;">
                            <small>6. Status Nomor KK Bagi Yang Pindah</small>
                        </td>
                        <td style="text-align: right; width: 590px">
                            <table>
                                <tr>
                                    <td
                                        style="vertical-align: middle; border: 1px solid black; padding-left:8px;padding-right:8px;">
                                        {{ $pendudukPindah->status_kk_pindah_id }}</td>
                                    <td style="padding-left: 20px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">1. </td>
                                                <td class="text-start" style="font-size: 13px;"> Numpang KK</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 13px;">2. </td>
                                                <td class="text-start" style="font-size: 13px;"> Membuat KK Baru
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 13px;">3. </td>
                                                <td class="text-start" style="font-size: 13px;"> Nama Kep. Keluarga
                                                    dan Nomor KK Tetap</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%;  margin-top:5px">
                    <tr>
                        <td style="font-size: 13px;">
                            <small>7. Rencana Tgl Pindah</small>
                        </td>
                        <td style="text-align: right; width: 590px">
                            <table>
                                <tr>
                                    <td style="padding-right: 25px">
                                        <table>
                                            <tr>
                                                <td
                                                    style="border: 1px solid black; padding-left:20px;padding-right:20px;">
                                                    0</td>
                                                <td
                                                    style="border: 1px solid black; padding-left:20px;padding-right:20px;">
                                                    2</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding-right: 25px">
                                        <table>
                                            <tr>
                                                <td
                                                    style="border: 1px solid black; padding-left:20px;padding-right:20px;">
                                                    0</td>
                                                <td
                                                    style="border: 1px solid black; padding-left:20px;padding-right:20px;">
                                                    2</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="padding-right: 25px">
                                        <table>
                                            <tr>

                                                <td
                                                    style="border: 1px solid black; padding-left:20px;padding-right:20px;">
                                                    2</td>
                                                <td
                                                    style="border: 1px solid black; padding-left:20px;padding-right:20px;">
                                                    0</td>
                                                <td
                                                    style="border: 1px solid black; padding-left:20px;padding-right:20px;">
                                                    2</td>
                                                <td
                                                    style="border: 1px solid black; padding-left:20px;padding-right:20px;">
                                                    4</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                <table style="width:100%; text-align: center;">
                    <thead style="border: 1px solid black;">
                        <th style="border: 1px solid black;">NO</th>
                        <th style="border: 1px solid black;" colspan="16">NIK</th>
                        <th style="border: 1px solid black;">NAMA</th>
                        <th style="border: 1px solid black;" colspan="2">SDHK</th>
                    </thead>
                    <tbody style="border: 1px solid black">
                        <tr style="border: 1px solid black">
                            <td style="border: 1px solid black;">1</td>
                            @foreach ($nikArray as $nik)
                                <td style="border: 1px solid black;">{{ $nik }}</td>
                            @endforeach
                            <td style="border: 1px solid black">{{ $pendudukPindah->nama_pemohon }}</td>
                            <td style="border: 1px solid black"></td>
                            <td style="border: 1px solid black"></td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                <table style="width: 100%; text-align:center;">
                    <tr>
                        <td>
                            <table style="text-align: left">
                                <tr>
                                    <td>Diketahui Oleh: <br>Camat <br>No. .................., tgl 13 Maret,2024</td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 50px"><u>(........................................)</u>
                                        <br>NIP.
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td>Pemohon</td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 100px">
                                        <strong>{{ $pendudukPindah->nama_pemohon }}</strong>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table style="text-align: left">
                                <tr>
                                    <td>Diketahui Oleh: <br>Kepala Desa/Lurah <br>No. 475/...../PEM, tgl 13-03-2024
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 50px"><u><strong>RUSKANDA</strong></u></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
