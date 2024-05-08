<?php

use App\Enums\UserRole;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

use App\Http\Controllers\AuthController;

// Pengaturan
use App\Http\Controllers\Admin\RWController as RWCtrl;
use App\Http\Controllers\Admin\RTController as RTCtrl;
use App\Http\Controllers\Admin\DusunController as DusunCtrl;
use App\Http\Controllers\Admin\PendidikanController as PendidikanCtrl;
use App\Http\Controllers\Admin\PekerjaanController as PekerjaanCtrl;
use App\Http\Controllers\Admin\SDHKController as SDHKCtrl;
use App\Http\Controllers\Admin\StatusPerkawinanController as StatusPerkawinanCtrl;
use App\Http\Controllers\Admin\AlamatController as AlamatCtrl;

use App\Http\Controllers\Admin\ProfileController as AdminProfileCtrl;
use App\Http\Controllers\Admin\PengaturanSuratController as PengaturanSuratCtrl;
use App\Http\Controllers\Admin\PejabatPemeritahController as PejabatPemeritahCtrl;
use App\Http\Controllers\Admin\UserController as AdminUserCtrl;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardCtrl;

use App\Http\Controllers\Admin\PendudukController as AdminPendudukCtrl;
use App\Http\Controllers\Admin\PendudukDatangController as AdminPendudukDatangCtrl;
use App\Http\Controllers\Admin\BukuIndukController as AdminBukuIndukCtrl;

use App\Http\Controllers\Admin\KepalaKeluargaController as AdminKKCtrl;
use App\Http\Controllers\Admin\SuratMasukController as AdminSuratMasukCtrl;
use App\Http\Controllers\Admin\SuratKeluarController as AdminSuratKeluarCtrl;
use App\Http\Controllers\Admin\DokumentasiController as AdminDokumentasiCtrl;
// Surat Keterangan
use App\Http\Controllers\Admin\SuratKeteranganUsahaController as AdminSKUCtrl;
use App\Http\Controllers\Admin\SuratKeteranganTidakMampuController as AdminSKTMCtrl;
use App\Http\Controllers\Admin\SuratKeteranganKeluargaMiskinController as AdminSKKMCtrl;
use App\Http\Controllers\Admin\SuratKeteranganPenghasilanController as AdminSKPCtrl;
use App\Http\Controllers\Admin\SuratKeteranganBepergianController as AdminSKBCtrl;
use App\Http\Controllers\Admin\SuratKeteranganDomisiliController as AdminSKDCtrl;
use App\Http\Controllers\Admin\SuratKeteranganBukanPnsController as AdminSKBPCtrl;
use App\Http\Controllers\Admin\SuratKeteranganBelumMenikahController as AdminSKBMCtrl;
use App\Http\Controllers\Admin\SuratKeteranganTidakMemilikiRumahController as AdminSKTMRCtrl;
use App\Http\Controllers\Admin\SuratKeteranganPendaftaranHajiController as AdminSKPHCtrl;
use App\Http\Controllers\Admin\SuratKeteranganKelahiranController as AdminSKKCtrl;
use App\Http\Controllers\Admin\SuratKeteranganBedaNamaController as AdminSKBNCtrl;
use App\Http\Controllers\Admin\SuratKuasaController as AdminSuratKuasaCtrl;
use App\Http\Controllers\Admin\SuratKeteranganPindahDatangController as AdminSKPindahDatangCtrl;
use App\Http\Controllers\Admin\SuratKeteranganKematianLamaController as AdminSKematianLamaCtrl;
use App\Http\Controllers\Admin\SuratKeteranganKematianBaruController as AdminSKematianBaruCtrl;
use App\Http\Controllers\Admin\SuratKeteranganAhliWarisController as AdminAhliWarisCtrl;

use App\Http\Controllers\Admin\SuratController as AdminSuratCtrl;
use App\Http\Controllers\Admin\PermohonanSuratController as AdminPermohonanSuratCtrl;
use App\Http\Controllers\Admin\PersyaratanDokumentController as AdminPersyaratanDokCtrl;
use App\Http\Controllers\Admin\AdministrasiUmumController as AdministrasiUmumCtrl;
use App\Http\Controllers\Admin\KelembagaanController as AdminLembagaCtrl;
use App\Http\Controllers\Admin\PengurusLembagaController as AdminPengurusLembagaCtrl;
use App\Http\Controllers\Admin\SuratPengantarNikahController as SuratPengantarNikahCtrl;
use App\Http\Controllers\Admin\LayananUmumController as LayananUmumCtrl;


// Landing Page
use App\Http\Controllers\LandingPage\FrontPageController;
use App\Http\Controllers\LandingPage\LayananUmumController as FrontLayananUmumCtrl;
use App\Http\Controllers\LandingPage\ArtikelController;
use App\Http\Controllers\LandingPage\LayananUmum\SuratKeteranganUsahaController as FrontSKUCtrl;
use App\Http\Controllers\LandingPage\LayananUmum\SuratKeteranganTidakMampuController as FrontSKTMCtrl;
use App\Http\Controllers\LandingPage\LayananUmum\SuratKeteranganDomisiliController as FrontSKDCtrl;
use App\Http\Controllers\LandingPage\LayananUmum\SuratKeteranganKeluargaMiskinController as FrontSKKMCtrl;
use App\Http\Controllers\LandingPage\LayananUmum\SuratKeteranganPenghasilanController as FrontSKPCtrl;
use App\Http\Controllers\LandingPage\LayananUmum\SuratKeteranganBukanPnsController as FrontSKBPCtrl;
use App\Http\Controllers\LandingPage\LayananUmum\SuratKeteranganBelumMenikahController as FrontSKBMCtrl;
use App\Http\Controllers\LandingPage\LayananUmum\SuratKeteranganBelumMemilikiRumahController as FrontSKBMRCtrl;
use App\Http\Controllers\LandingPage\LayananUmum\SuratKeteranganPendaftaranHajiController as FrontSKPHCtrl;
use App\Http\Controllers\LandingPage\LayananUmum\SuratKeteranganPindahDatangController as FrontSKPDCtrl;

// Penulis
use App\Http\Controllers\Penulis\DashboardController as PenulisDashboardCtrl;
use App\Http\Controllers\Penulis\PenulisController as PenulisCtrl;
use App\Http\Controllers\Penulis\KategoriController as PenulisKategoriCtrl;
use App\Http\Controllers\Penulis\TagController as PenulisTagCtrl;
use App\Http\Controllers\Penulis\ArtikelController as PenulisArtikelCtrl;



// Warga
use App\Http\Controllers\LandingPage\Warga\DashboardWargaController as WargaDashboardCtrl;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontPageController::class, 'index'])->name('root');


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('login/user', [AuthController::class, 'loginClient'])->name('login-client');



$lpRoute = Route::name('lp.');

$lpDomain = env('APP_LPDOMAIN');
if (!empty($lpDomain)) {
    $lpRoute->domain($lpDomain);
}

$lpRoute->group(function() {
    Route::get('/', [FrontPageController::class, 'index'])->name('root');
    Route::get('/about', [FrontPageController::class, 'about'])->name('about');
    Route::get('/documentation', [FrontPageController::class, 'dokumentasi'])->name('dokumentasi');
    Route::get('/administration', [FrontPageController::class, 'administrasi'])->name('administrasi');
    Route::get('/umum/administration', [FrontPageController::class, 'administrasiUmum'])->name('administrasi.umum');

    Route::post('post/login-client', [AuthController::class, 'loginProsesClient'])->name('login-client.process');
    Route::get('logout/client', [AuthController::class, 'logoutClient'])->name('logout');

    Route::middleware([Authenticate::class])->group(function () {
        Route::get('/dashboard/redirect', function () {
            switch (auth()->user()->role) {
                case UserRole::Warga:
                    return redirect()->route('lp.warga.dashboard');
            }
        })->name('dashboard.redirect');


        Route::middleware('role:warga')->prefix('dashboard-warga')->name('warga.')->group(function () {
            // Route::get('/', [WargaDashboardCtrl::class, 'index'])->name('dashboard');
            Route::controller(WargaDashboardCtrl::class)->prefix('warga')->name('warga.')->group(function () {
                Route::get('/', 'index')->name('dashboard');
                Route::put('/{id}/update-permohonan',  'update')->name('update');
            });

        });

    });

    Route::controller(FrontLayananUmumCtrl::class)->prefix('layanan-umum')->name('layanan-umum.')->group(function () {
        Route::get('/daftar-layanan', 'layanan')->name('layanan');

        Route::controller(FrontSKUCtrl::class)->prefix('surat-keterangan-usaha')->name('surat-keterangan-usaha.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/pengajuan', 'pengajuan')->name('pengajuan');
        });
            
        Route::controller(FrontSKTMCtrl::class)->prefix('surat-keterangan-tidak-mampu')->name('surat-keterangan-tidak-mampu.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/pengajuan', 'pengajuan')->name('pengajuan');
        });

        Route::controller(FrontSKKMCtrl::class)->prefix('surat-keterangan-keluarga-miskin')->name('surat-keterangan-keluarga-miskin.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/pengajuan', 'pengajuan')->name('pengajuan');
        });

        Route::controller(FrontSKPCtrl::class)->prefix('surat-keterangan-penghasilan')->name('surat-keterangan-penghasilan.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/pengajuan', 'pengajuan')->name('pengajuan');
        });

        Route::controller(FrontSKDCtrl::class)->prefix('surat-keterangan-domisili')->name('surat-keterangan-domisili.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/pengajuan', 'pengajuan')->name('pengajuan');
        });

        Route::controller(FrontSKBPCtrl::class)->prefix('surat-keterangan-bukan-pns')->name('surat-keterangan-bukan-pns.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/pengajuan', 'pengajuan')->name('pengajuan');
        });

        Route::controller(FrontSKBMCtrl::class)->prefix('surat-keterangan-belum-menikah')->name('surat-keterangan-belum-menikah.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/pengajuan', 'pengajuan')->name('pengajuan');
        });

        Route::controller(FrontSKBMRCtrl::class)->prefix('surat-keterangan-tidak-memiliki-rumah')->name('surat-keterangan-belum-memiliki-rumah.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/pengajuan', 'pengajuan')->name('pengajuan');
        });

        Route::controller(FrontSKPHCtrl::class)->prefix('surat-keterangan-pendaftaran-haji')->name('surat-keterangan-pendaftaran-haji.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/pengajuan', 'pengajuan')->name('pengajuan');
        });

        Route::controller(FrontSKPDCtrl::class)->prefix('surat-keterangan-pindah-datang')->name('surat-keterangan-pindah-datang.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/pengajuan', 'pengajuan')->name('pengajuan');
        });

    });

    Route::controller(ArtikelController::class)->prefix('artikel')->name('landing-page.artikel.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{category}/{slug}', 'artikel')->name('artikel');
        Route::get('/{slug}', 'showByCategory')->name('kategori');
        
    });

    Route::fallback(function () {
        return view('errors.404_FE');
    });

});


$appRoute = Route::prefix('app');
$appDomain = env('APP_SUBDOMAIN');
if (!empty($appDomain)) {
    $appRoute = Route::domain($appDomain);
}

$appRoute->name('app.')->group(function () {
    Route::get('/admin', [AuthController::class, 'index']);
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post/login', [AuthController::class, 'login'])->name('login.process');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware([Authenticate::class])->group(function () {
        Route::get('/dashboard/redirect', function () {
            switch (auth()->user()->role) {
                case UserRole::Admin:
                    return redirect()->route('app.admin.dashboard');
                case UserRole::Penulis:
                    return redirect()->route('app.penulis.dashboard');
                // case UserRole::Agent:
                //     return redirect()->route('app.agent.dashboard');
            }
        })->name('dashboard.redirect');

        Route::get('/profile', function () {
            switch (auth()->user()->role) {
                case UserRole::Admin:
                    return redirect()->route('app.admin.profile.index');
                case UserRole::Penulis:
                    return redirect()->route('app.penulis.profile.index');
                case UserRole::Agent:
                    return redirect()->route('app.agent.profile.index');
            }
        })->name('profile');


        Route::middleware('role:admin')->prefix('admins')->name('admin.')->group(function () {
            Route::get('/', [AdminDashboardCtrl::class, 'index'])->name('dashboard');

            // pengaturan
            Route::controller(PengaturanSuratCtrl::class)->prefix('pengaturan-surat')->name('pengaturan.surat.')->group(function () {
                Route::get('/', 'index')->name('surat');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(DusunCtrl::class)->prefix('dusun')->name('pengaturan.dusun.')->group(function () {
                Route::get('/', 'index')->name('dusun');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(PendidikanCtrl::class)->prefix('pendidikan')->name('pengaturan.pendidikan.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(PekerjaanCtrl::class)->prefix('pekerjaan')->name('pengaturan.pekerjaan.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(SDHKCtrl::class)->prefix('hubungan-keluarga')->name('pengaturan.hubungan-keluarga.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(StatusPerkawinanCtrl::class)->prefix('status-perkawinan')->name('pengaturan.status-perkawinan.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(AlamatCtrl::class)->prefix('alamat')->name('pengaturan.alamat.')->group(function () {
                Route::get('/', 'index')->name('index');
            });

            Route::controller(RWCtrl::class)->prefix('rukun-warga')->name('pengaturan.rw.')->group(function () {
                Route::get('/', 'rw')->name('rw');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(RTCtrl::class)->prefix('rukun-tetangga')->name('pengaturan.rt.')->group(function () {
                Route::get('/', 'rt')->name('rt');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(AdminDokumentasiCtrl::class)->prefix('dokumentasi')->name('dokumentasi.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
                Route::put('/publish/{id}', 'publish')->name('publish');
                Route::put('/takedown/{id}', 'takedown')->name('takedown');
            });

            Route::controller(PejabatPemeritahCtrl::class)->prefix('pejabat-pemerintah')->name('pejabat_pemerintah.')->group(function () {
                Route::get('/',  'index')->name('index');
                Route::get('/create',  'create')->name('create');
                Route::post('/store',  'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/active/{id}', 'activate')->name('active');
                Route::put('/inactive/{id}', 'inactivate')->name('inactive');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(AdminUserCtrl::class)->prefix('users')->name('users.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
                Route::put('/active/{id}', 'activate')->name('active');
                Route::put('/inactive/{id}', 'inactivate')->name('inactive');
                Route::post('/{id}/restore', 'restore')->name('restore');
            });

            Route::controller(AdminProfileCtrl::class)->prefix('profile')->name('profile.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::put('/update', 'update')->name('update');
            });

            Route::controller(AdminPendudukDatangCtrl::class)->prefix('penduduk-pindah-datang')->name('penduduk-pindah-datang.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');

                Route::get('{nik}/detail', 'detail')->name('detail');
                Route::get('{nik}/print-data', 'printData')->name('print');
            });

            Route::controller(AdminBukuIndukCtrl::class)->prefix('buku-induk')->name('buku-induk.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/export', 'export')->name('export');
            });

            Route::controller(AdminPendudukCtrl::class)->prefix('penduduk')->name('penduduk.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{nik}/edit',  'edit')->name('edit');
                Route::put('/{nik}/update',  'update')->name('update');
                Route::get('/{nik}/detail',  'detail')->name('detail');
                
                Route::get('/penduduk-lahir', 'pendudukLahir')->name('lahir');
                Route::get('mutasi', 'mutasiPenduduk')->name('mutasi');
                Route::get('meninggal', 'pendudukMeninggal')->name('meninggal');
                
                
                
                Route::post('/import', 'import')->name('import');
                Route::get('/get-rw', 'getRw')->name('getRw');
                Route::get('/regency', 'getRegency')->name('regency');
                Route::get('/district', 'getDistrict')->name('district');
                Route::get('/village', 'getVillage')->name('village');
                
                Route::get('/export', 'export')->name('export');
            });

            Route::controller(AdminKKCtrl::class)->prefix('kepala-keluarga')->name('kepala_keluarga.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{nik}/edit',  'edit')->name('edit');
                Route::put('/{nik}/update',  'update')->name('update');
                Route::get('/{nik}/detail', 'detail')->name('detail');
                Route::get('/export', 'export')->name('export');
                Route::post('/import', 'import')->name('import');
                
                // anggota keluarga
                Route::post('/add-members', 'addMembers')->name('add_members');
                Route::delete('/{id}/hapus-anggota', 'removeMember')->name('remove.member');
            });

            Route::controller(SuratPengantarNikahCtrl::class)->prefix('layanan-nikah')->name('layanan_nikah.pengantar_nikah.')->group(function () {
                Route::get('/surat-pengantar-nikah', 'index')->name('index');
                Route::get('/ket-pernah-nikah', 'ketPernahNikah')->name('ket-pernah-nikah');
                Route::get('/ket-belum-pernah-nikah', 'ketBelumPernahNikah')->name('ket-belum-pernah-nikah');
                Route::get('/keterangan/duda-janda', 'ketDudaJanda')->name('ket-duda-janda');

            });

            Route::controller(LayananUmumCtrl::class)->prefix('layanan-umum')->name('layanan_umum.sk_usaha.')->group(function () {
                Route::get('/surat-keterangan-usaha', 'index')->name('index');
                Route::get('/surat-keterangan-tempat-usaha', 'skTempatUsaha')->name('sk-tempat-usaha');
                Route::get('sekolah/surat-keterangan-tidak-mampu', 'skTidakMampuSekolah')->name('sk-tidak-mampu-sekolah');
                Route::get('umum/surat-keterangan-tidak-mampu', 'skTidakMampuUmum')->name('sk-tidak-mampu-umum');

            });

            Route::controller(AdminSKUCtrl::class)->prefix('surat-keterangan-usaha')->name('surat.sku.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store/by-nik', 'storeByNIK')->name('store.bynik');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');

                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::put('/response/{id}',  'addResponse')->name('response');
            });

            Route::controller(AdminSKTMCtrl::class)->prefix('surat-keterangan-tidak-mampu')->name('surat.sktm.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::put('/response/{id}',  'addResponse')->name('response');
            });

            Route::controller(AdminSKKMCtrl::class)->prefix('surat-keterangan-keluarga-miskin')->name('surat.skkm.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::put('/response/{id}',  'addResponse')->name('response');
            });

            Route::controller(AdminSKPCtrl::class)->prefix('surat-keterangan-penghasilan')->name('surat.skp.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');

                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::get('/kepala-keluarga',  'getKK')->name('kepala-keluarga');
                Route::put('/response/{id}',  'addResponse')->name('response');
            });

            Route::controller(AdminSKBCtrl::class)->prefix('surat-keterangan-bepergian')->name('surat.skb.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::get('/regency', 'getRegency')->name('regency');
                Route::get('/district', 'getDistrict')->name('district');
                Route::get('/village', 'getVillage')->name('village');
                Route::put('/response/{id}',  'addResponse')->name('response');
            });

            Route::controller(AdminSKDCtrl::class)->prefix('surat-keterangan-domisili')->name('surat.skd.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::put('/response/{id}',  'addResponse')->name('response');
            });

            Route::controller(AdminSKKCtrl::class)->prefix('surat-keterangan-kelahiran')->name('surat.skk.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/create-surat/by-keluarga', 'createByKeluarga')->name('create-bykk');
                Route::post('/store-bykk', 'storeByKK')->name('storebykk');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::put('/response/{id}',  'addResponse')->name('response');
                Route::get('/export', 'export')->name('export');
            });

            Route::controller(AdminSKBNCtrl::class)->prefix('surat-keterangan-beda-nama')->name('surat.skbn.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::put('/response/{id}',  'addResponse')->name('response');
            });
            
            Route::controller(AdminSKBMCtrl::class)->prefix('surat-keterangan-belum-menikah')->name('surat.skbm.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::put('/response/{id}',  'addResponse')->name('response');

            });
            Route::controller(AdminSKBPCtrl::class)->prefix('surat-keterangan-bukan-pns')->name('surat.skbp.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::put('/response/{id}',  'addResponse')->name('response');

            });
            Route::controller(AdminSKTMRCtrl::class)->prefix('surat-keterangan-tidak-memiliki-rumah')->name('surat.sktmr.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::put('/response/{id}',  'addResponse')->name('response');

            });
            Route::controller(AdminSKPHCtrl::class)->prefix('surat-keterangan-pendaftaran-haji')->name('surat.skph.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::put('/response/{id}',  'addResponse')->name('response');

            });

            Route::controller(AdminSKPindahDatangCtrl::class)->prefix('surat-keterangan-pindah-datang')->name('surat-keterangan-pindah-datang.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');

                Route::get('anggota-keluarga', 'anggotaKeluarga')->name('anggota-keluarga');
                Route::get('jenis-anggota-keluarga', 'jenisAnggotaKeluarga')->name('jenis-anggota-keluarga');
                Route::get('{nik}/detail', 'detail')->name('detail');
                Route::get('alamat-pemohon', 'alamatPemohon')->name('alamat-pemohon');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::get('/export', 'export')->name('export');

                Route::get('/get-rt', 'getRt')->name('getRt');
                Route::get('/regency', 'getRegency')->name('regency');
                Route::get('/district', 'getDistrict')->name('district');
                Route::get('/village', 'getVillage')->name('village');
                Route::get('{nik}/print-data', 'printData')->name('print');

                Route::put('/{id}/restore-status',  'restoreStatusPenduduk')->name('restore-status');
                Route::put('/{id}/update-status',  'updateStatusPenduduk')->name('update-status-penduduk');
            });

            Route::controller(AdminSKematianLamaCtrl::class)->prefix('surat-keterangan-kematian-lama')->name('surat-keterangan-kematian-lama.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');

                Route::put('/{id}/update-penduduk',  'updateDataPenduduk')->name('update.kependudukan');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/get-data',  'getCetak')->name('cetak');
            });

            Route::controller(AdminSKematianBaruCtrl::class)->prefix('surat-keterangan-kematian-baru')->name('surat-keterangan-kematian-baru.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(AdminAhliWarisCtrl::class)->prefix('surat-keterangan-ahli-waris')->name('surat-keterangan-ahli-waris.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
                Route::get('/get-data',  'getCetak')->name('cetak');
            });

            Route::controller(AdminSuratKuasaCtrl::class)->prefix('surat-kuasa')->name('surat-kuasa.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/{id}/cetak',  'cetak')->name('update.cetak');
                Route::put('/{id}/batal-cetak',  'batalCetak')->name('update.batalcetak');
                Route::get('/get-data',  'getCetak')->name('cetak');
                Route::put('/response/{id}',  'addResponse')->name('response');
                Route::delete('/{id}', 'remove')->name('remove');

            });

            Route::controller(AdminSuratCtrl::class)->prefix('surat')->name('surat.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create-surat', 'create')->name('create');
                Route::get('/daftar/surat', 'daftarSurat')->name('daftar-surat');
            });
            
            Route::controller(AdminSuratKeluarCtrl::class)->prefix('surat-keluar')->name('surat-keluar.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::get('/export', 'export')->name('export');
                Route::post('/upload-file', 'lampiran')->name('lampiran');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(AdminSuratMasukCtrl::class)->prefix('surat-masuk')->name('surat-masuk.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::get('/export', 'export')->name('export');
                Route::get('/{id}/{file}', 'showFile')->name('file');
                Route::delete('/{id}', 'remove')->name('remove');
                Route::post('/upload-file/{id}', 'lampiran')->name('lampiran');
            });

            Route::controller(AdminPermohonanSuratCtrl::class)->prefix('permohonan-surat')->name('permohonan_surat.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::put('/update-status/{id}', 'updateStatus')->name('update.status');
            });

            Route::controller(AdminPersyaratanDokCtrl::class)->prefix('persyaratan-dokumen')->name('persyaratan_dokumen.')->group(function () {
                Route::get('/', 'index')->name('index');
            });

            Route::controller(AdministrasiUmumCtrl::class)->prefix('administrasi-umum')->name('administrasi_umum.')->group(function () {
                Route::get('/', 'index')->name('index');
            });

            Route::controller(AdminLembagaCtrl::class)->prefix('lembaga')->name('kelembagaan.lembaga.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::put('/active/{id}', 'activate')->name('active');
                Route::put('/inactive/{id}', 'inactivate')->name('inactive');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(AdminPengurusLembagaCtrl::class)->prefix('pengurus-lembaga')->name('kelembagaan.pengurus.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}/pemberhentian',  'pemberhentian')->name('pemberhentian');
                
                // jabatan pengurus
                Route::get('/jabatan', 'jabatan')->name('jabatan');
                Route::get('/create/jabatan', 'jabatanCreate')->name('jabatan.create');
                Route::post('/store/jabatan', 'jabatanStore')->name('jabatan.store');
                Route::get('/{id}/jabatan', 'jabatanEdit')->name('jabatan.edit');
                Route::put('/{id}/update-jabatan',  'jabatanUpdate')->name('jabatan.update');
                Route::delete('/{id}/remove', 'jabatanRemove')->name('jabatan.remove');
            });

        });

        Route::middleware('role:penulis')->prefix('penulis')->name('penulis.')->group(function () {
            Route::get('/', [PenulisDashboardCtrl::class, 'index'])->name('dashboard');

            Route::controller(PenulisKategoriCtrl::class)->prefix('kategori')->name('kategori.')->group(function () {
                Route::get('/', 'index')->name('kategori');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
            });
            
            Route::controller(PenulisTagCtrl::class)->prefix('tag')->name('tag.')->group(function () {
                Route::get('/', 'index')->name('tag');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
            });

            Route::controller(PenulisArtikelCtrl::class)->prefix('artikel')->name('artikel.')->group(function () {
                Route::get('/', 'index')->name('artikel');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/update',  'update')->name('update');
                Route::delete('/{id}', 'remove')->name('remove');
                Route::put('/publish/{id}', 'publish')->name('publish');
            });

            // Route::controller(RpsvProfileCtrl::class)->prefix('profile')->name('profile.')->group(function () {
            //     Route::get('/', 'index')->name('index');
            //     Route::put('/', 'update')->name('update');
            // });
        });
    });
});