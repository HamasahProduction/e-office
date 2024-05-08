<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SuratPindahDatangExport;
use App\Models\AnggotaPendudukPindah;
use App\Models\DetailAnggotaKeluarga;
use App\Models\PendudukPindahDatang;
use App\Models\StatusKKTidakPindah;
use App\Models\StatusKKYangPindah;
use App\Models\KlasifikasiPindah;
use App\Models\JenisKepindahan;
use App\Models\KepalaKeluarga;
use App\Models\AlasanPindah;
use App\Models\DaftarSurat;
use App\Models\Penduduk;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Carbon\Carbon;

class SuratKeteranganPindahDatangController extends Controller
{
    public function index(Request $request)
    {
        $query      = PendudukPindahDatang::orderBy('rencana_tgl_pindah','desc');
        $startdate  = date('Y-m') . '-01';
        $enddate    = date('Y-m-d');

        if( $request->filled('startdate'))
        {
            $startdate = $request->startdate;
        }
        if( $request->filled('enddate'))
        {
            $enddate = $request->enddate;
        }
        $pendudukPindahs = $query->whereBetween(\DB::RAW('date(rencana_tgl_pindah)'), [$startdate, $enddate])->get();
        return view('admin.layanan_umum.sk_pindah_datang.index', compact('pendudukPindahs', 'startdate','enddate','request'));
    }
    public function create()
    {
        $JenisPindah            = JenisKepindahan::all();
        $KlasifikasiPindah      = KlasifikasiPindah::all();
        $StatusKKTidakPindah    = StatusKKTidakPindah::all();
        $StatusKKYangPindah     = StatusKKYangPindah::all();
        $AlasanPindah           = AlasanPindah::all();
        $province               = Province::all();
        $kepalaKeluarga         = KepalaKeluarga::all();
        $pemohon                = Penduduk::active()->get();
        return view('admin.layanan_umum.sk_pindah_datang.create', compact('JenisPindah','KlasifikasiPindah','StatusKKTidakPindah','StatusKKYangPindah','AlasanPindah','province','kepalaKeluarga','pemohon'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $anggota = $request->has('anggota_keluarga');
        $error = [];
        if ($request->jenis_kepindahan_id==3 && $anggota == false || $request->jenis_kepindahan_id==4 && $anggota == false) {
            $error[] = "SIMPAN GAGAL!!. Anda Belum Memilih Anggota Keluarga Berdasarkan Jenis Kepindahan Yang Sudah Dipilih";
            return redirect()->route('app.admin.surat-keterangan-pindah-datang.create')->with('errorSimpan',$error);
        }
         
        $request->validate([
            // 'dusun_asal'                => 'required|max:255',
            // 'rt_asal'                   => 'required|numeric|digits_between:3,3',
            // 'rw_asal'                   => 'required|numeric|digits_between:3,3',
            // 'provinsi_asal'             => 'required',
            // 'kabupaten_asal'            => 'required',
            // 'kecamatan_asal'            => 'required',
            // 'desa_asal'                 => 'required',
            'no_hp'                     => 'required|digits_between:10,15',
            'kode_pos_asal'             => 'required|numeric|digits_between:5,5',
            'rencana_tgl_pindah'        => 'required|date',
            'nik_pemohon'               => 'required',
            'alasan_pindah_id'          => 'required',
            'klasifikasi_pindah_id'     => 'required',
            'jenis_kepindahan_id'       => 'required',
            'status_kk_tdk_pindah_id'   => 'required',
            'status_kk_pindah_id'       => 'required',
            'dusun_tujuan'              => 'required|max:255',
            'rt_tujuan'                 => 'required|numeric|digits_between:3,3',
            'rw_tujuan'                 => 'required|numeric|digits_between:3,3',
            'provinsi_tujuan'           => 'required',
            'kabupaten_tujuan'          => 'required',
            'kecamatan_tujuan'          => 'required',
            'desa_tujuan'               => 'required|max:255',
            'kode_pos_tujuan'           => 'required|numeric|digits_between:5,5',
           
        ],[
            // 'dusun_asal'                => 'Dusun asal wajib dipilih!',
            // 'rt_asal'                   => 'RT asal wajib dipilih!',
            // 'rt_asal.max'               => 'Maksimal 3 digits!',
            // 'rw_asal'                   => 'RW asal wajib dipilih!',
            // 'rw_asal.max'               => 'Maksimal 3 digits!',
            // 'desa_asal'                 => 'Desa asal wajib dipilih!',
            // 'kecamatan_asal'            => 'Kecamatan asal wajib dipilih!',
            // 'kabupaten_asal'            => 'Kabupaten asal wajib dipilih!',
            // 'provinsi_asal'             => 'Provinsi asal wajib dipilih!',
            'nik_pemohon.required'      => 'Nik pemohon wajib diisi!',
            'kode_pos_asal'             => 'Kodepos wajib diisi!',
            'no_hp.min'                 => 'Minimal no hp 11 digit',
            'no_hp.max'                 => 'Maksimal no hp 13 digit',
            'alasan_pindah_id'          => 'Alasan Pindah wajib dipilih!',
            'dusun_tujuan'              => 'Dusun asal wajib dipilih!',
            'rt_tujuan'                 => 'RT asal wajib dipilih!',
            'rt_tujuan.max'             => 'Maksimal 3 digits!',
            'rw_tujuan'                 => 'RW asal wajib dipilih!',
            'rw_tujuan.max'             => 'Maksimal 3 digits!',
            'desa_tujuan'               => 'Desa tujuan wajib dipilih!',
            'kecamatan_tujuan'          => 'Kecamatan tujuan wajib dipilih!',
            'kabupaten_tujuan'          => 'Kabupaten tujuan wajib dipilih!',
            'provinsi_tujuan'           => 'Provinsi tujuan wajib dipilih!',
            'kode_pos_tujuan'           => 'Kode pos wajib diisi!',
            'klasifikasi_pindah_id'     => 'Klasifikasi pindah wajib dipilih!',
            'jenis_kepindahan_id'       => 'Jenis kepindahan wajib dipilih!',
            'status_kk_tdk_pindah_id'   => 'Status KK tidak pindah wajib dipilih!',
            'status_kk_pindah_id'       => 'Status KK yang pindah wajib dipilih!',
            'rencana_tgl_pindah'        => 'Rencana tanggal pindah wajib dipilih!',
        ]);
        
        $kepalaKeluarga = KepalaKeluarga::find($request->kk_id); 
        abort_if(!$kepalaKeluarga, 400, 'Kepala Keluarga Tidak Terdaftar');
        
        $pemohon        = DetailAnggotaKeluarga::find($request->nik_pemohon); 
        abort_if(!$pemohon, 400, 'Data Pemohon Tidak Terdaftar Sebagai Anggota Keluarga');
       
        $lastRecord     = PendudukPindahDatang::orderBy('created_at', 'desc')->first();
        if ($lastRecord) {
            $lastNomorUrut = $lastRecord->no_urut_surat;
            $nextNomorUrut = str_pad((int)$lastNomorUrut + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNomorUrut = '001';
        }

        $surat      = DaftarSurat::find(9);
        $kepindahan = PendudukPindahDatang::create([
            'no_kk'                     => $kepalaKeluarga->no_kk,
            'nama_kepala_keluarga'      => $kepalaKeluarga->penduduk->nama_lengkap,
            'nik_pemohon'               => $pemohon->nik,
            'nama_pemohon'              => $pemohon->penduduk->nama_lengkap,
            'dusun_asal'                => strtoupper($pemohon->penduduk->Rt->dusun),
            'rt_asal'                   => $pemohon->penduduk->Rt->nomor,
            'rw_asal'                   => $pemohon->penduduk->Rt->rw,
            'desa_asal'                 => $pemohon->penduduk->village->id,
            'kecamatan_asal'            => $pemohon->penduduk->district->id,
            'kabupaten_asal'            => $pemohon->penduduk->regency->id,
            'provinsi_asal'             => $pemohon->penduduk->province->id,
            'kode_pos_asal'             => $request->kode_pos_asal,
            'no_hp'                     => $request->no_hp,
            'alasan_pindah_id'          => $request->alasan_pindah_id,
            'dusun_tujuan'              => strtoupper($request->dusun_tujuan),
            'rt_tujuan'                 => $request->rt_tujuan,
            'rw_tujuan'                 => $request->rw_tujuan,
            'desa_tujuan'               => $request->desa_tujuan,
            'kecamatan_tujuan'          => $request->kecamatan_tujuan,
            'kabupaten_tujuan'          => $request->kabupaten_tujuan,
            'provinsi_tujuan'           => $request->provinsi_tujuan,
            'kode_pos_tujuan'           => $request->kode_pos_tujuan,
            'klasifikasi_pindah_id'     => $request->klasifikasi_pindah_id,
            'jenis_kepindahan_id'       => $request->jenis_kepindahan_id,
            'status_kk_tdk_pindah_id'   => $request->status_kk_tdk_pindah_id,
            'status_kk_pindah_id'       => $request->status_kk_pindah_id,
            'rencana_tgl_pindah'        => $request->rencana_tgl_pindah,
            'status_surat'              => 'proses',
            'no_surat'                  => $surat->kode_surat.'/'.$nextNomorUrut.'/'.$surat->penerbit,
            'is_sync_status_penduduk'   =>false,
        ]);

        if ($request->jenis_kepindahan_id==1) {
            AnggotaPendudukPindah::create([
                'nik'           => $pemohon->nik,
                'nama'          => $pemohon->penduduk->nama_lengkap,
                'kode_sdhk'     => $pemohon->id_sdhk,
                'id_kepindahan' => $kepindahan->id,
            ]);
        }

        if ($request->jenis_kepindahan_id==2) {
            $anggota = DetailAnggotaKeluarga::where('id_kepala_keluarga', $pemohon->id_kepala_keluarga)->get();
            foreach ($anggota as $value) {
                AnggotaPendudukPindah::create([
                    'nik'           => $value->nik,
                    'nama'          => $value->penduduk->nama_lengkap,
                    'kode_sdhk'     => $value->id_sdhk,
                    'id_kepindahan' => $kepindahan->id,
                ]);
            }
        }

        if ($request->jenis_kepindahan_id==3 || $request->jenis_kepindahan_id==4) {
            $anggota = DetailAnggotaKeluarga::whereIn('id', $request->anggota_keluarga)->get();
            foreach ($anggota as $value) {
                AnggotaPendudukPindah::create([
                    'nik'           => $value->nik,
                    'nama'          => $value->penduduk->nama_lengkap,
                    'kode_sdhk'     => $value->id_sdhk,
                    'id_kepindahan' => $kepindahan->id,
                ]);
            }
        }
        
        return redirect()->route('app.admin.surat-keterangan-pindah-datang.index')->withSuccess('Penduduk Pindah Berhasil Disimpan!');
    }

    public function detail($nik)
    {
        $pendudukPindah     = PendudukPindahDatang::with('anggotaPindah')->where('nik_pemohon', $nik)->first();
        $nikArray           = str_split($pendudukPindah->nik_pemohon);
        $kkArray            = str_split($pendudukPindah->no_kk);
        $noHpArray          = str_split($pendudukPindah->no_hp);
        // $tanggalPindah      = Carbon::parse($pendudukPindah->rencana_tgl_pindah)->format('dmY') ;
        $tanggalPindahArray = str_split(Carbon::parse($pendudukPindah->rencana_tgl_pindah)->format('dmY'));
        
        $rtAsalArray        = str_split($pendudukPindah->rt_asal);
        $rwAsalArray        = str_split($pendudukPindah->rw_asal);
        $kodePosAsalArray   = str_split($pendudukPindah->kode_pos_asal);
        
        $rtTujuanArray      = str_split($pendudukPindah->rt_tujuan);
        $rwTujuanArray      = str_split($pendudukPindah->rw_tujuan);
        $kodePosTujuanArray = str_split($pendudukPindah->kode_pos_tujuan);

        $detailAnggota      = AnggotaPendudukPindah::where('id_kepindahan',$pendudukPindah->id)->get();

        return view('admin.layanan_umum.sk_pindah_datang.detail', compact(
            'pendudukPindah','noHpArray','nikArray','kkArray','rtAsalArray','rwAsalArray','kodePosAsalArray',
            'rtTujuanArray','rwTujuanArray','tanggalPindahArray','kodePosTujuanArray','detailAnggota'
        ));
    }

    public function anggotaKeluarga(Request $request)
    {
        $anggotaKeluarga = DetailAnggotaKeluarga::with(['penduduk','SDHK'])->where('id_kepala_keluarga', $request->kk_id)->get();
        return response()->json($anggotaKeluarga);
    }

    public function alamatPemohon(Request $request)
    {
        $anggota    = DetailAnggotaKeluarga::where('id', $request->id)->first();
        $penduduk   = Penduduk::with(['Rt','province','regency','district','village'])->where('nik', $anggota->nik)->first();
        return response()->json($penduduk);
    }

    public function getCetak(Request $request)
    {
        setlocale(LC_TIME, 'id_ID');
        $data       = PendudukPindahDatang::find($request->id);
        $anggota    = AnggotaPendudukPindah::where('id_kepindahan', $request->id)->get();
        $no_surat   = 'Nomor : '.$data->nomor_surat;
        $tgl_surat  = 'Cimara '.', '.Carbon::parse($data->tgl_surat)->isoFormat('D MMMM Y');
        
        return response()->json([
            'data'=>$data,
            'anggota'=>$anggota,
            'tgl_surat'=>$tgl_surat,
            'no_surat'=>$no_surat,
        200]);
    }
     // get RW
     public function getRt(Request $request)
     {
         $rt = RT::firstWhere('id', $request->id);
         $rw = $rt->rw->nomor;
         $dusun = $rt->dusun->nama_dusun;
         return response()->json([
             'rt' => $rt,
             'rw' => $rw,
             'dusun' => $dusun,
         ]);
     }
 
     public function getRegency(Request $request)
     {
         $data = Regency::where('province_id', $request->id)->get();
         return response()->json($data, 200);
     }
 
     public function getDistrict(Request $request)
     {
         $data = District::where('regency_id', $request->id)->get();
         return response()->json($data, 200);
     }
 
     public function getVillage(Request $request)
     {
         $data = Village::where('district_id', $request->id)->get();
         return response()->json($data, 200);
     }

    public function printData($nik)
    {
        $pendudukPindahs = PendudukPindahDatang::where('nik_pemohon', $nik)->first();
        return view('admin.layanan_umum.sk_pindah_datang.template_surat.print_surat_pindah_datang', compact('pendudukPindahs'));
    }

    public function restoreStatusPenduduk($id)
    {
        $data       = PendudukPindahDatang::with(['anggotaPindah'])->find($id);
        abort_if(!$data, 400, 'Data Kepindahan tidak ditemukan!');
        $data->is_sync_status_penduduk=false;
        $data->save();
        
        if ($data) {
            if ($data->jenis_kepindahan_id==1) {
                // Atau jika Anda hanya ingin mengambil satu anggota pindah
                $anggotaPindahSatu = $data->anggotaPindah()->first();
                if ($anggotaPindahSatu) {
                    $nik                        = $anggotaPindahSatu->nik;
                    $aktifkanStatus             = Penduduk::find($nik);
                    $aktifkanStatus->is_mutasi  = false;
                    $aktifkanStatus->update();
        
                    $anggotaRestore                         = KepalaKeluarga::where('no_kk', $data->no_kk)->first();
                    if ($data->klasifikasi_pindah_id!=1)
                    {
                        $anggotaRestore->jumlah_anggota         +=1;
                        $anggotaRestore->jumlah_anggota_pindah  -=1;
                    }
                    $anggotaRestore->save();

                    $updateStatusAnggotaKeluarga = DetailAnggotaKeluarga::where('nik',$nik)->first();
                    $updateStatusAnggotaKeluarga->is_mutasi   = false;
                    $updateStatusAnggotaKeluarga->save();
                }
                
            }

            if ($data->jenis_kepindahan_id==2 || $data->jenis_kepindahan_id==3 || $data->jenis_kepindahan_id==4) {
                 // Mengambil semua anggota pindah
                $anggotaPindah = $data->anggotaPindah;
                foreach ($anggotaPindah as $anggota) {
                    $nik                               = $anggota->nik;
                    $aktifkanStatusPenduduk            = Penduduk::find($nik);
                    $aktifkanStatusPenduduk->is_mutasi = false;
                    $aktifkanStatusPenduduk->update();
        
                    $anggotaRestore                         = KepalaKeluarga::where('no_kk', $data->no_kk)->first();
                    if ($data->klasifikasi_pindah_id!=1)
                    {
                        $anggotaRestore->jumlah_anggota         +=1;
                        $anggotaRestore->jumlah_anggota_pindah  -=1;
                    }
                    $anggotaRestore->save();

                    $updateStatusAnggotaKeluarga = DetailAnggotaKeluarga::where('nik',$nik)->first();
                    $updateStatusAnggotaKeluarga->is_mutasi   = false;
                    $updateStatusAnggotaKeluarga->save();
                }
            }
    
            
        } else {
            return response()->json([
                'success'   => true,
                'icon'      => 'info',
                'type'      => 'success',
                'message'   => 'Status Kependudukan Tidak Ditemukan!',
                'data'      => $data  
            ]);
        }

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Status Kependudukan Sudah di perbaharui!',
            'data'      => $data  
        ]);
    }

    public function updateStatusPenduduk($id)
    {
        $data       = PendudukPindahDatang::with(['anggotaPindah'])->find($id);
        abort_if(!$data, 400, 'Data Kepindahan tidak ditemukan!');

        $data->is_sync_status_penduduk=true;
        $data->save();

        if ($data) {
            if ($data->jenis_kepindahan_id==1) {
                // Atau jika Anda hanya ingin mengambil satu anggota pindah
                $anggotaPindahSatu = $data->anggotaPindah()->first();
                if ($anggotaPindahSatu) {
                    $nik                             = $anggotaPindahSatu->nik;
                    $updateStatusMutasi              = Penduduk::find($nik);
                    $updateStatusMutasi->is_mutasi   = $data->klasifikasi_pindah_id==1?false:true;
                    $updateStatusMutasi->update();  
        
                    $anggotaRestore = KepalaKeluarga::where('no_kk', $data->no_kk)->first();
                    if ($anggotaRestore->jumlah_anggota > 0) {
                        if ($data->klasifikasi_pindah_id!=1) {
                            $anggotaRestore->jumlah_anggota         -=1;
                            $anggotaRestore->jumlah_anggota_pindah  +=1;
                        }
                        $anggotaRestore->save();
                    }

                    $updateStatusAnggotaKeluarga = DetailAnggotaKeluarga::where('nik',$nik)->first();
                    $updateStatusAnggotaKeluarga->is_mutasi   = $data->klasifikasi_pindah_id==1?false:true;
                    $updateStatusAnggotaKeluarga->save();
                }
                
            }

            if ($data->jenis_kepindahan_id==2 || $data->jenis_kepindahan_id==3 || $data->jenis_kepindahan_id==4) {
                 // Mengambil semua anggota pindah
                $anggotaPindah = $data->anggotaPindah;
                foreach ($anggotaPindah as $anggota) {
                    $nik                       = $anggota->nik;
                    $updateMutasi              = Penduduk::find($nik);
                    $updateMutasi->is_mutasi   = $data->klasifikasi_pindah_id==1?false:true;
                    $updateMutasi->update();
        
                    $anggotaRestore = KepalaKeluarga::where('no_kk', $data->no_kk)->first();
                    if ($anggotaRestore->jumlah_anggota > 0) {
                        if ($data->klasifikasi_pindah_id!=1) {
                            $anggotaRestore->jumlah_anggota         -=1;
                            $anggotaRestore->jumlah_anggota_pindah  +=1;
                        }
                        $anggotaRestore->save();
                    }


                    $updateStatusAnggotaKeluarga = DetailAnggotaKeluarga::where('nik',$nik)->first();
                    $updateStatusAnggotaKeluarga->is_mutasi   = $data->klasifikasi_pindah_id==1?false:true;
                    $updateStatusAnggotaKeluarga->save();
                }
            }
    
            
        } else {
            return response()->json([
                'success'   => true,
                'icon'      => 'info',
                'type'      => 'success',
                'message'   => 'Status Kependudukan Tidak Ditemukan!',
                'data'      => $data  
            ]);
        }

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Status Kependudukan Sudah di perbaharui!',
            'data'      => $data  
        ]);
    }

    public function remove($id)
    {
        $data = PendudukPindahDatang::find($id);
        abort_if(!$data, 400, 'RT Tidak Terdaftar');

        $data->delete();

        return response()->json([
            'success'   => true,
            'icon'      => 'success',
            'type'      => 'success',
            'message'   => 'Data Kepindahan Penduduk Berhasil Dihapus!',
            'data'      => $data  
        ]);
    }

    public function export(Request $request)
    {
        $namaFile = 'Data-Pindah-Datang-'.now().'.xlsx';
        return Excel::download(new SuratPindahDatangExport, $namaFile);
    }
}
