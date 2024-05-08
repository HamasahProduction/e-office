<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Ahli Waris</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container-surat {
            max-width: 800px;
            margin: 0 auto;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
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
            {{-- <p style="font-size: 14px; margin-bootom: 0; padding-bootom:0;">Alamat : Jalan Raya Cimara - Cibeureum
                No.01 Kode Pos 45588 <br><a href="http://">Email : desacimara@gmail.com</a> --}}
        </div>
        <div style="font-size: 18px; text-align:center; padding-bottom:15px; padding-top:5px;">
            <strong><u>SURAT KETERANGAN AHLI WARIS</u></strong> <br>
            <p id="no_surat">-</p>
        </div>

        <div class="body-surat" style="text-align: justify">
            <table style="100%">
                <tr>
                    <td>Yang bertanda tangan dibawah ini :</td>
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
                    <td>Menerangkan dengan sesungguhnya bahwa :</td>
                </tr>
                <tr style="padding-bottom:2px;">
                    <td id="anggotaTable">
                    </td>
                </tr>

                <tr style="padding-top:2px;">
                    <td>
                        <p>&emsp;&emsp;Orang tersebut diatas betul ahli waris dari saudara <strong
                                id="pewaris">-</strong> yang merupakan penduduk Desa Cimara yang beralamat di <i
                                id="alamat_pewaris">-</i> Desa Cimara Kecamatan Cibeureum Kabupaten Kuningan.
                            <br>&emsp;&emsp;Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dipergunakan
                            sebagaimana mestinya.
                        </p>
                    </td>
                </tr>

            </table>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-4"></div>
                <div class="col-lg-8" id="signatureMember" style="float: right;"></div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-lg-12">
                <table style="width: 100%; text-align:center;">
                    <tr>
                        <td style="width: 50%;align-content: center;">
                            <table style="width: 100%; text-align: center; font-size:11px;">
                                <tr>
                                    <td>KETUA RT</td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 50px"><strong id="ketua_rt">-</strong></td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 50%">
                            <table style=" width: 100%; text-align: center; font-size:11px;">
                                <tr>
                                    <td>KETUA RW</td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 50px"><strong id="ketua_rw">-</strong></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-12" style="padding-top: 4px;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 50%">
                            <table style="width: 100%; text-align: center; font-size:11px;">
                                <tr>
                                    <td>CAMAT CIBEUREUM</td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 50px"><u><strong>NANA KUSMANA, S.Sos MM</strong></u>
                                        <br>Pembina TK. 1
                                        <br>NIP:19660405 198903 1 009
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 50%">
                            <table style="width: 100%; text-align: center; font-size:11px;">
                                <tr>
                                    <td>Mengetahui: <br>Kepala Desa Cimara
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
</body>

</html>
