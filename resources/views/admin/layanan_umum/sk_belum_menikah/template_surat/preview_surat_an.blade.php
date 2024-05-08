<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Belum Menikah</title>
    <style>
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

        .kop-container {
            margin-top: 0;
            padding-top: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* padding: 20px; */
            padding-right: 0;
            padding-left: 0;
            border-bottom: 2px solid #000;
        }

        .kop-image img {
            max-width: 160px;
            height: auto;
            margin-top: 0;
            padding-top: 0;
        }

        .keterangan-instansi {
            text-align: center;
            /* Align tengah */
            padding-left: 0;
            padding-right: 120px;
            /* Padding kiri */
            margin-left: 0;
            /* Margin kiri */
        }

        /* .keterangan-instansi br {
            display: none;
        } */

        .keterangan-instansi p {
            margin: 0;
            /* Atur margin paragraf menjadi 0 */
        }
    </style>
</head>

<body>
    <div class="container-surat" style="font-family: 'Times New Roman', Times, serif;">
        <div class="kop-container">
            <div class="kop-image">
                <img src="{{ asset('kop_surat/logo_kuningan.png') }}" alt="Pemerintah Desa Cimara">
            </div>
            <div class="keterangan-instansi">
                <strong style="font-size:20px;">PEMERINTAHAN KABUPATEN KUNINGAN <br> KECAMATAN CIBEUREUM <br>SEKRETARIAT
                    DESA CIMARA</strong> <br>
                <p style="font-size: 14px; margin-bootom: 0; padding-bootom:0;">Alamat : Jalan Raya Cimara - Cibeureum
                    No.01 Kode Pos 45588 <br><a href="http://">Email : desacimara@gmail.com</a>
            </div>
        </div>

        <div style="font-size: 18px; text-align:center; padding-bottom:15px; padding-top:5px;">
            <strong><u>SURAT KETERANGAN BELUM MENIKAH</u></strong> <br>
            <strong id="no_surat_an">Nomor :478/...../Pem.</strong>
        </div>

        <div class="body-surat" style="text-align: justify;">
            <table style="100%">
                <tr>
                    <td>Yang bertanda tangan dibawah ini adalah Sekretaris Desa Cimara Kecamatan Cibeureum Kabupaten Kuningan :</td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%; margin-bottom:10px; margin-top:5px;">
                            <tr>
                                <td style="width: 200px;">Nama</td>
                                <td style="padding-right: 5px">:</td>
                                <td><strong>DIDING HIDAYAT, S.Pd</strong></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td style="padding-right: 5px">:</td>
                                <td>Sekretaris Desa Cimara</td>
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
                                <td><strong id="nik_an">3208290305900005</strong></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td style="padding-right: 5px">:</td>
                                <td><strong id="nama_an">IMAM WAHYUDI</strong></td>
                            </tr>
                            <tr>
                                <td>Tempat Tanggal Lahir</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="ttl_an">Kuningan, 03-05-1990</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="gender_an">Laki-Laki</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="agama_an">Indonesia</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="alamat_an">Dusun Cimara RT 003 RW 002 Desa Cimara Kec. Cibeureum Kab. Kuningan</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px;">
                        Adalah benar salah seorang warga/penduduk Desa Cimara Kecamatan Cibeureum Kabupaten Kuningan Provinsi Jawa Barat dan pada saat ini, orang tersebut <strong>Belum/Tidak Pernah Menikah</strong>
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

        <div class="signatures">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 70%;"></td>
                    <td style="width: 30%;">
                        <table style="text-align: center">
                            <tr>
                                <td id="tgl_surat_an">Cimara, 27 Februari 2024</td>
                            </tr>
                            <tr>
                                <td>Sekretaris Desa Cimara</td>
                            </tr>
                            <tr>
                                <td style="padding-top: 70px"><strong>DIDING HIDAYAT, S.Pd</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
