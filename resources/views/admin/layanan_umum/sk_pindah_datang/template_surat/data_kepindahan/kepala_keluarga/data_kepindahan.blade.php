<div class="row">
    <div class="col-lg-12">
        <strong style="font-size:12px;">DATA KEPINDAHAN</strong>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table style="width: 100%;">
            <tr>
                <td style="font-size: 11px;">
                    <small>1. Alasan Pindah</small>
                </td>
                <td style="text-align: right; width: 590px">
                    <table>
                        <tr>
                            <td
                                style="vertical-align: middle; border: 1px solid black; padding-left:3px;padding-right:3px;  font-size: 11px;">
                                {{ $pendudukPindah->alasan_pindah_id }}</td>
                            <td style="padding-left: 25px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">1.</td>
                                        <td class="text-start" style="font-size: 11px;">Pekerjaan</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">2.</td>
                                        <td class="text-start" style="font-size: 11px;">Pendidikan</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-left: 25px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">3.</td>
                                        <td class="text-start" style="font-size: 11px;">Keamanan</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">4.</td>
                                        <td class="text-start" style="font-size: 11px;">Kesehatan</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-left: 25px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">5.</td>
                                        <td class="text-start" style="font-size: 11px;">Perumahan</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">6.</td>
                                        <td class="text-start" style="font-size: 11px;">Keluarga</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-left: 25px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">7.</td>
                                        <td class="text-start" style="font-size: 11px;">Lainya (sebutkan)
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
                <td style="font-size: 11px;">
                    2. Alamat Tujuan Pindah
                </td>
                <td style="width: 590px">
                    <table style="width: 590px">
                        <tr>
                            <td
                                style="width: 500px; border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                {{ $pendudukPindah->dusun_tujuan }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="padding: 5px; font-size: 11px;">
                                            RT
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    @foreach ($rtTujuanArray as $rtTujuan)
                                                        <td
                                                            style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                            {{ $rtTujuan }}</td>
                                                    @endforeach
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="padding: 5px; font-size: 11px;">
                                            RW
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    @foreach ($rwTujuanArray as $rwTujuan)
                                                        <td
                                                            style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                            {{ $rwTujuan }}</td>
                                                    @endforeach
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
                <td style="padding-left: 15px; font-size: 11px;">
                    a. Desa/Kelurahan
                </td>
                <td style="width: 590px">
                    <table style="width: 590px">
                        <tr>
                            <td
                                style="width: 250px; border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                {{ $pendudukPindah->villageTujuan->name }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="padding-right: 15px; padding-left:15px; font-size: 11px;">
                                            c. Kab/Kota
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td
                                                        style="width: 250px; border: 1px solid black; padding-left:8px; padding-right:8px; font-size: 11px;">
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
                <td style="padding-left: 15px; font-size: 11px;">
                    b. Kecamatan
                </td>
                <td style="width: 590px">
                    <table style="width: 590px">
                        <tr>
                            <td
                                style="width: 250px; border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                {{ $pendudukPindah->districtTujuan->name }}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td style="padding-left: 15px; padding-right:21px;; font-size: 11px;">
                                            d. Provinsi
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td
                                                        style="width: 250px; border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
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
                                                                style="padding-right: 5px; width:100%; font-size: 11px;">
                                                                Kode Pos</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                                {{ $kodePosTujuanArray[0] }}</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                                {{ $kodePosTujuanArray[1] }}</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                                {{ $kodePosTujuanArray[2] }}</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                                {{ $kodePosTujuanArray[3] }}</td>
                                                            <td
                                                                style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                                {{ $kodePosTujuanArray[4] }}</td>
                                                        </tr>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="width: 340px">
                                        <table>
                                            <tr>
                                                <td
                                                    style=" padding-left: 15px; padding-right: 25px; font-size: 11px;">
                                                    Telepon
                                                </td>
                                                <td style="width: 100%; padding-left: 9px; ">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                        @foreach ($noHpArray as $hp)
                                                                            <td
                                                                                style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                                                {{ $hp }}</td>
                                                                        @endforeach
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
                <td style="font-size: 11px;">
                    <small>3. Klasifikasi Pindah</small>
                </td>
                <td style="text-align: right; width: 590px">
                    <table>
                        <tr>
                            <td
                                style="vertical-align: middle; border: 1px solid black; padding-left:3px; padding-right:3px; font-size: 12px;">
                                {{ $pendudukPindah->klasifikasi_pindah_id }}</td>
                            <td style="padding-left: 20px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">1. </td>
                                        <td class="text-start" style="font-size: 11px;"> Dalam satu
                                            Desa/Kelurahan</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">2. </td>
                                        <td class="text-start" style="font-size: 11px;"> Antar
                                            Desa/Kelurahan</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-left: 20px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">3. </td>
                                        <td class="text-start" style="font-size: 11px;"> Antar Kecamatan
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">4. </td>
                                        <td class="text-start" style="font-size: 11px;"> Antar Kab/Kota
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-left: 20px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">5. </td>
                                        <td class="text-start" style="font-size: 11px;"> Antar Provinsi
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
                <td style="font-size: 11px;">
                    <small>4. Jenis Kepindahan</small>
                </td>
                <td style="text-align: right; width: 590px">
                    <table>
                        <tr>
                            <td
                                style="vertical-align: middle; border: 1px solid black; padding-left:3px; padding-right:3px; font-size: 12px;">
                                {{ $pendudukPindah->jenis_kepindahan_id }}</td>
                            <td style="padding-left: 20px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">1. </td>
                                        <td class="text-start" style="font-size: 11px;"> Kep. Keluarga</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">2. </td>
                                        <td class="text-start" style="font-size: 11px;"> Kep. Keluarga dan
                                            Seluruh Angg. Keluarga</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-left: 20px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">3. </td>
                                        <td class="text-start" style="font-size: 11px;"> Kep. Keluarga dan
                                            Sbg. Angg. Keluarga</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">4. </td>
                                        <td class="text-start" style="font-size: 11px;"> Angg. Keluarga
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
                <td style="font-size: 11px;">
                    <small>5. Status Nomor KK Bagi Yang Tidak Pindah</small>
                </td>
                <td style="text-align: right; width: 590px">
                    <table>
                        <tr>
                            <td
                                style="vertical-align: middle; border: 1px solid black; padding-left:3px; padding-right:3px; font-size: 12px;">
                                {{ $pendudukPindah->status_kk_tdk_pindah_id }}</td>
                            <td style="padding-left: 20px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">1. </td>
                                        <td class="text-start" style="font-size: 11px;"> Numpang KK</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">2. </td>
                                        <td class="text-start" style="font-size: 11px;"> Membuat KK Baru
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-left: 20px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">3. </td>
                                        <td class="text-start" style="font-size: 11px;"> Tidak Ada Angg.
                                            Keluarga Yang Ditinggal</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 11px;">4. </td>
                                        <td class="text-start" style="font-size: 11px;"> Nomor KK Tetap
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
                <td style="font-size: 11px;">
                    <small>6. Status Nomor KK Bagi Yang Pindah</small>
                </td>
                <td style="text-align: right; width: 590px">
                    <table>
                        <tr>
                            <td
                                style="vertical-align: middle; border: 1px solid black; padding-left:3px; padding-right:3px; font-size: 12px;">
                                {{ $pendudukPindah->status_kk_pindah_id }}</td>
                            <td style="padding-left: 20px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">1. </td>
                                        <td class="text-start" style="font-size: 11px;"> Numpang KK</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-left: 20px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">2. </td>
                                        <td class="text-start" style="font-size: 11px;"> Membuat KK Baru
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-left: 20px;">
                                <table>
                                    <tr>
                                        <td style="font-size: 11px;">3. </td>
                                        <td class="text-start" style="font-size: 11px;"> Nama Kep. Keluarga
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
                <td style="font-size: 11px;">
                    <small>7. Rencana Tgl Pindah</small>
                </td>
                <td style="text-align: right; width: 590px">
                    <table>
                        <tr>
                            <td style="padding-right: 10px">
                                <table>

                                    <tr>
                                        <td
                                            style="border: 1px solid black; padding-left:20px; padding-right:20px; font-size: 11px;">
                                            {{ $tanggalPindahArray[0] }}</td>
                                        <td
                                            style="border: 1px solid black; padding-left:20px; padding-right:20px; font-size: 11px;">
                                            {{ $tanggalPindahArray[1] }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-right: 10px">
                                <table>
                                    <tr>
                                        <td
                                            style="border: 1px solid black; padding-left:20px; padding-right:20px; font-size: 11px;">
                                            {{ $tanggalPindahArray[2] }}</td>
                                        <td
                                            style="border: 1px solid black; padding-left:20px; padding-right:20px; font-size: 11px;">
                                            {{ $tanggalPindahArray[3] }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="padding-right: 10px">
                                <table>
                                    <tr>

                                        <td
                                            style="border: 1px solid black; padding-left:20px; padding-right:20px; font-size: 11px;">
                                            {{ $tanggalPindahArray[4] }}</td>
                                        <td
                                            style="border: 1px solid black; padding-left:20px; padding-right:20px; font-size: 11px;">
                                            {{ $tanggalPindahArray[5] }}</td>
                                        <td
                                            style="border: 1px solid black; padding-left:20px; padding-right:20px; font-size: 11px;">
                                            {{ $tanggalPindahArray[6] }}</td>
                                        <td
                                            style="border: 1px solid black; padding-left:20px; padding-right:20px; font-size: 11px;">
                                            {{ $tanggalPindahArray[7] }}</td>
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