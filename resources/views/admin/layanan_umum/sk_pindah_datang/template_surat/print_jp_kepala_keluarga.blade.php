<div id="printable" style="display: none">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-7"><strong>SURAT KETERANGAN PINDAH DATANG WNI</strong></div>
            <div class="col-lg-2 text-end">
                <strong
                    style="border: 2px solid black; padding-top:5px; padding-bottom:5px; padding-left:20px; padding-right:20px;">F-1.08</strong>
            </div>
            <div class="col-lg-12">
                <strong style="font-size:12px;">DATA DAERAH ASAL</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table style="width: 100%;">
                    <tr>
                        <td style="font-size: 11px;">
                            <small>Nomor Kartu Keluarga</small>
                        </td>
                        <td style="width: 570px">
                            <table style="width: 590px">
                                <tr>
                                    @foreach ($kkArray as $kk)
                                        <td
                                            style="border: 1px solid black; padding-left:8px; padding-right:8px; font-size: 11px;">
                                            {{ $kk }}</td>
                                    @endforeach
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top:5px">
                    <tr>
                        <td style="font-size: 11px;">
                            Nama Kepala Keluarga
                        </td>
                        <td style="width: 590px">
                            <table style="width: 590px">
                                <tr>
                                    <td
                                        style="border: 1px solid black; padding-left:8px; padding-right:8px;  font-size: 11px;">
                                        {{ $pendudukPindah->nama_kepala_keluarga }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top:5px">
                    <tr>
                        <td style="font-size: 11px;">
                            Alamat
                        </td>
                        <td style="width: 590px">
                            <table style="width: 590px">
                                <tr>
                                    <td
                                        style="width: 500px; border: 1px solid black; padding-left:8px; padding-right:8px; padding-bottom:0; padding-tpop:0; font-size: 11px;">
                                        {{ $pendudukPindah->dusun_asal }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td style="padding-left:5px; padding-right:5px; font-size: 11px;">
                                                    RT
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            @foreach ($rtAsalArray as $rtAsal)
                                                                <td
                                                                    style="border: 1px solid black; padding-left:8px; padding-right:8px; font-size: 11px;">
                                                                    {{ $rtAsal }}</td>
                                                            @endforeach
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="padding-left:5px; padding-right:5px; font-size: 11px;">
                                                    RW
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            @foreach ($rwAsalArray as $rwAsal)
                                                                <td
                                                                    style="border: 1px solid black; padding-left:8px; padding-right:8px;  font-size: 11px;">
                                                                    {{ $rwAsal }}</td>
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
                            <table style="width: 100%">
                                <tr>
                                    <td
                                        style="width: 250px; border: 1px solid black; padding-left:8px; padding-right:8px; font-size: 11px;">
                                        {{ $pendudukPindah->villageAsal->name }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td style="padding-right: 15px; padding-left:15px; font-size: 11px;">
                                                    c. Kab/Kota
                                                </td>
                                                <td>
                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td
                                                                style="width: 250px; border: 1px solid black; padding-left:8px; padding-right:8px; font-size: 11px;">
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
                        <td style="padding-left: 15px; font-size: 11px;">
                            b. Kecamatan
                        </td>
                        <td style="width: 590px">
                            <table style="width: 590px">
                                <tr>
                                    <td
                                        style="width: 250px; border: 1px solid black; padding-left:8px; padding-right:8px; font-size: 11px;">
                                        {{ $pendudukPindah->districtAsal->name }}</td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td style="padding-left: 15px; padding-right:21px; font-size: 11px;">
                                                    d. Provinsi
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td
                                                                style="width: 250px; border: 1px solid black; padding-left:8px; padding-right:8px; font-size: 11px;">
                                                                {{ $pendudukPindah->provinceAsal->name }}</td>
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
                                                                        {{ $kodePosAsalArray[0] }}</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                                        {{ $kodePosAsalArray[1] }}</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                                        {{ $kodePosAsalArray[2] }}</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                                        {{ $kodePosAsalArray[3] }}</td>
                                                                    <td
                                                                        style="border: 1px solid black; padding-left:4px; padding-right:4px; font-size: 11px;">
                                                                        {{ $kodePosAsalArray[4] }}</td>
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

            </div>
        </div>
        @include('admin.layanan_umum.sk_pindah_datang.template_surat.data_kepindahan.kepala_keluarga.data_kepindahan')
        <div class="row mt-2">
            <div class="col-lg-12">
                <table style="width:100%; text-align: center;">
                    <thead style="border: 1px solid black;">
                        <th style="border: 1px solid black; font-size: 11px; width:5%;">NO</th>
                        <th style="border: 1px solid black; font-size: 11px; width:45%;" colspan="16">NIK</th>
                        <th style="border: 1px solid black; font-size: 11px; width:35%;">NAMA</th>
                        <th style="border: 1px solid black; font-size: 11px; width:15%;" colspan="2">SDHK</th>
                    </thead>
                    <tbody style="border: 1px solid black">
                        <tr style="border: 1px solid black; font-size: 11px;">
                            <td style="border: 1px solid black;">1</td>
                            @foreach ($nikArray as $nik)
                                <td style="border: 1px solid black; font-size: 11px;">{{ $nik }}</td>
                            @endforeach
                            <td style="border: 1px solid black; font-size: 11px;">{{ $pendudukPindah->nama_pemohon }}
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;"></td>
                            <td style="border: 1px solid black; font-size: 11px;"></td>
                        </tr>
                        <tr style="border: 1px solid black">
                            <td style="border: 1px solid black; font-size: 11px;"></td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding:1px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;">
                                <p style="padding-left:8px; padding-right:8px;"></p>
                            </td>
                            <td style="border: 1px solid black; font-size: 11px;"></td>
                            <td style="border: 1px solid black; font-size: 11px;"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                <table style="width: 100%; text-align:center;">
                    <tr>
                        <td style="width: 35%">
                            <table style="text-align: left; font-size:11px;">
                                <tr>
                                    <td>Diketahui Oleh: <br>Camat <br>No. .................., tgl............,20......
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 50px"><u>(........................................)</u>
                                        <br>NIP.
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 35%">
                            <table style="font-size:11px;">
                                <tr>
                                    <td>Pemohon</td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 80px">
                                        <strong>{{ $pendudukPindah->nama_pemohon }}</strong>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 35%">
                            <table style="text-align: left; font-size:11px;">
                                <tr>
                                    <td>Diketahui Oleh: <br>Kepala Desa/Lurah <br>No. {{ $pendudukPindah->no_surat }}, Tanggal {{ Carbon\Carbon::parse($pendudukPindah->created_at)->isoFormat('D MMMM Y') }}
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

        @include('admin.layanan_umum.sk_pindah_datang.template_surat.daerah_tujuan.jp_kepala_keluarga')
    </div>
</div>
