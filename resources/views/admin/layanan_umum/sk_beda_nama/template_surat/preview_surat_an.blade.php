<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Beda Nama</title>
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
            <strong><u>SURAT KETERANGAN BEDA NAMA</u></strong> <br>
            <strong id="no_surat_an">-</strong>
        </div>

        <div class="body-surat" style="text-align: justify">
            <table style="100%">
                <tr>
                    <td>Yang bertanda tangan dibawah ini adalah Kepala Desa Cimara Kecamatan Cibeureum Kabupaten
                        Kuningan menerangkan bahwa :</td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%; margin-bottom:10px; margin-top:5px;">
                            <tr>
                                <td style="width: 200px;">NIK</td>
                                <td style="padding-right: 5px">:</td>
                                <td><strong id="nik_an">-</strong></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td style="padding-right: 5px">:</td>
                                <td><strong id="nama_an">-</strong></td>
                            </tr>
                            <tr>
                                <td>Tempat Tanggal Lahir</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="ttl_an">-</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="gender_an">-</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="agama_an">-</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="pekerjaan_an">-</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td style="padding-right: 5px">:</td>
                                <td id="alamat_an">-</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px;">
                        Terdapat perbedaan nama pada <strong><i id="keterangan_beda_an"></i></strong> :
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td style="width: 200px;" id="dokumen_berbeda_an"></td>
                                <td style="padding-right: 5px;">:</td>
                                <td><strong id="perbedaan_nama_an"></strong></td>
                            </tr>
                        </table>
                        <table>
                            <tr id="list_perbedaan_an"></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px;">
                        Dalam <strong id="jumlah_berkas_an">-</strong> berkas tersebut benar adalah orang yang sama dan
                        bukan orang lain meskipun terdapat perbedaan nama.
                    </td>
                </tr>
                <tr>
                    <td style="padding-top:15px;">
                        <p>Demikian Surat Keterangan ini kami buat dengan sebenarnya agar dipergunakan sebagaimana
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
                                <td id="tgl_surat_an">-</td>
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
