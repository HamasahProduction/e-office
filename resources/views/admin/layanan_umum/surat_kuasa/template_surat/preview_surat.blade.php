<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Kuasa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container-surat {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header-surat {
            text-align: center;
            margin-top: 10px;
        }

        .logo {
            margin-top: 0;
            padding-top: 0;
            text-align: center;
        }

        .logo img {
            widows: 150px;
            height: 100px;
        }

        .desc_kades {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .desc_kades p {
            margin: 5px 0;
        }

        .body-desc {
            margin-top: 20px;
        }

        .footer-surat {
            color: #212121;
            padding: 20px;
            position: fixed;
            left: 0;
            bottom: 0;
            text-align: center;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-surat">

        <div style="font-size: 18px; text-align:center; padding-bottom:15px; padding-top:5px;">
            <strong><u>SURAT KUASA</u></strong> <br>
            {{-- <p id="no_surat">Nomor :478/...../Pem.</p> --}}
        </div>

        <div class="body-surat" style="text-align: justify">
            <table style="100%">
                <tr>
                    <td>Yang bertanda tangan dibawah ini ahli waris dari <strong id="nama_ahli_waris"></strong>:</td>
                </tr>

                <tr>
                    <td>
                        <table style="width: 100%; margin-bottom:10px; margin-top:5px;">
                            <tr>
                                <td style="width: 200px;">NIK</td>
                                <td style="padding-right: 5px">:</td>
                                <td><strong id="nik">-</strong></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td style="padding-right: 5px">:</td>
                                <td><strong id="nama">-</strong></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="umur">-</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="pekerjaan">-</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="alamat">-</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Memberi kuasa kepada:</td>
                </tr>

                <tr>
                    <td>
                        <table style="width: 100%; margin-bottom:10px; margin-top:5px;">
                            <tr>
                                <td style="width: 200px;">NIK</td>
                                <td style="padding-right: 5px">:</td>
                                <td><strong id="nik_penerima">-</strong></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td style="padding-right: 5px">:</td>
                                <td><strong id="nama_penerima">-</strong></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="umur_penerima">-</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="pekerjaan_penerima">-</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="alamat_penerima">-</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px;" id="keterangan">

                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px;">
                        <p>Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dipergunakan sebagaimana
                            mestinya.</p>
                    </td>
                </tr>
            </table>
        </div>

        {{-- <div class="signatures">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 70%;">
                        <table style="text-align: center">
                            <tr>
                                <td>Penerima Kuasa</td>
                            </tr>
                            <tr>
                                <td style="padding-top: 80px"><strong>penerima kuasa</strong></td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 30%;">
                        <table style="text-align: center">
                            <tr>
                                <td id="tgl_surat">-</td>
                            </tr>
                            <tr>
                                <td>Yang Memberi Kuasa</td>
                            </tr>
                            <tr>
                                <td style="padding-top: 70px"><strong>pemberi kuasa</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;">
                <tr>
                    <td style="text-align-center">
                        <table style="text-align: center">
                            <tr>
                                <td>Mengetahui,</td>
                            </tr>
                            <tr>
                                <td>Kepala Desa Cimara</td>
                            </tr>
                            <tr>
                                <td style="padding-top: 70px"><strong>RUSKANDA</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div> --}}
        <div class="signatures">
            <table style="width: 100%; margin-bottom: 40px;">
                <tr>
                    <td style="width: 70%;">
                        <table style="text-align: center">
                            <tr>
                                <td>Penerima Kuasa</td>
                            </tr>
                            <tr>
                                <td style="padding-top: 80px"><strong id="ttd_penerima_kuasa">penerima kuasa</strong></td>
                            </tr>
                        </table>
                    </td>
                    <td style="width: 30%;">
                        <table style="text-align: center">
                            <tr>
                                <td id="tgl_surat">-</td>
                            </tr>
                            <tr>
                                <td>Yang Memberi Kuasa</td>
                            </tr>
                            <tr>
                                <td style="padding-top: 70px"><strong id="ttd_pemberi_kuasa">pemberi kuasa</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table style="width: 100%; margin-top: 40px;">
                <tr>
                    <td style="text-align: center;">
                        <table style="margin: 0 auto; text-align: center;"> <!-- Penyesuaian CSS di sini -->
                            <tr>
                                <td>Mengetahui,</td>
                            </tr>
                            <tr>
                                <td>Kepala Desa Cimara</td>
                            </tr>
                            <tr>
                                <td style="padding-top: 70px"><strong>RUSKANDA</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        
    </div>
</body>

</html>
