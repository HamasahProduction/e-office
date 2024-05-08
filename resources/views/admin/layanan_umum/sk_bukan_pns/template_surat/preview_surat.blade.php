<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Bukan PNS</title>
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
        <div class="logo">
            <img src="{{ asset('kop_surat/garuda.png') }}" alt="Pemerintah Desa Cimara">
        </div>
        <div class="header-surat" style="font-size: 22px;">
            <strong>KEPALA DESA CIMARA <br> KECAMATAN CIBEUREUM KABUPATEN KUNINGAN</strong>
            <p style="font-size: 14px; margin-bootom: 0; padding-bootom:0;">Alamat : Jalan Raya Cimara - Cibeureum
                No.01 Kode Pos 45588 <br><a href="http://">Email : desacimara@gmail.com</a>
        </div>
        <div style="font-size: 18px; text-align:center; padding-bottom:15px; padding-top:5px;">
            <strong><u>SURAT KETERANGAN BUKAN PNS</u></strong> <br>
            <p id="no_surat">Nomor :478/...../Pem.</p>
        </div>

        <div class="body-surat" style="text-align: justify">
            <table style="100%">
                <tr>
                    <td>Yang bertanda tangan dibawah ini adalah Kepala Desa Cimara Kecamatan Cibeureum Kabupaten Kuningan :</td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%; margin-bottom:10px; margin-top:5px;">
                            <tr>
                                <td style="width: 200px;">Nama</td>
                                <td style="padding-right: 5px">:</td>
                                <td><strong>Ruskanda</strong></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td style="padding-right: 5px">:</td>
                                <td>Kepala Desa Cimara</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td style="padding-right: 5px">:</td>
                                <td>Dusun Cimara RT 003 RW 002 Desa Cimara Kec. Cibeureum Kab. Kuningan</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Dengan ini menerangkan Bahwa :</td>
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
                                <td>Tempat Tanggal Lahir</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="ttl">-</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="gender">-</td>
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
                    <td style="padding-top:15px;">
                        Adalah benar seorang warga Desa Cimara Kecamatan Cibeureum Kabupaten Kuningan dan yang bersangkutan sepengetahuan dan penelitian kami bukan Pegawai Negeri Sipil (PNS).
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px;">
                        <p>Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="signatures">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 70%;"></td>
                    <td style="width: 30%;">
                        <table style="text-align: center">
                            <tr>
                                <td id="tgl_surat">Cimara, 27 Februari 2024</td>
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
        {{-- <div class="footer-surat">
            <p>Jalan Raya Cimara - Cibeureum Kode Pos 45588 <br><a href="http://">Email:desacimara@gmail.com</a>
                <br>KECAMATAN CIBEUREUM KABUPATEN KUNINGAN 45565</p>
        </div> --}}
    </div>
</body>

</html>
