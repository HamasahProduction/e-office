
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul class="sidebar-vertical">
				<li class="menu-title">
					<span>Menu</span>
				</li>
                <?php
                $role = auth()->user()->role;

                $menus = [];

                switch ($role) {
                    case \app\Enums\UserRole::Admin:
                        $menus = [
                            (object) [
                                'name' => 'Beranda',
                                'icon' => 'la la-dashboard',
                                'link' => route('app.admin.dashboard'),
                                'childs' => [],
                            ],
                           
                            (object) [
                                'name' => 'Pengaturan',
                                'icon' => 'la la-cog',
                                'link' => '#',
                                'childs' => [
                                   
                                    // (object) [
                                    //     'name' => 'Surat',
                                    //     'link' => route('app.admin.pengaturan.surat.surat'),
                                    // ], 
                                    // (object) [
                                    //     'name' => 'Pejabat Pemerintah',
                                    //     'link' => route('app.admin.pejabat_pemerintah.index'),
                                    // ], 
                                    (object) [
                                        'name' => 'Data Alamat',
                                        'link' => route('app.admin.pengaturan.alamat.index'),
                                    ], 
                                    (object) [
                                        'name' => 'Data Dusun',
                                        'link' => route('app.admin.pengaturan.dusun.dusun'),
                                    ], 
                                    (object) [
                                        'name' => 'Data RW',
                                        'link' => route('app.admin.pengaturan.rw.rw'),
                                    ], 
                                    (object) [
                                        'name' => 'Data RT',
                                        'link' => route('app.admin.pengaturan.rt.rt'),
                                    ], 
                                    (object) [
                                        'name' => 'Data SDHK',
                                        'link' => route('app.admin.pengaturan.hubungan-keluarga.index'),
                                    ], 
                                    (object) [
                                        'name' => 'Data Pekerjaan',
                                        'link' => route('app.admin.pengaturan.pekerjaan.index'),
                                    ], 
                                    (object) [
                                        'name' => 'Data Pendidikan',
                                        'link' => route('app.admin.pengaturan.pendidikan.index'),
                                    ], 
                                    (object) [
                                        'name' => 'Data Status Perkawinan',
                                        'link' => route('app.admin.pengaturan.status-perkawinan.index'),
                                    ], 
                                    
                                ],
                            ],
                            (object) [
                                'name' => 'Kependudukan',
                                'icon' => 'las la-address-card',
                                'link' => '#',
                                'childs' => [
                                    (object) [
                                        'name' => 'Data Penduduk',
                                        'link' => route('app.admin.penduduk.index'),
                                    ],
                                  
                                    (object) [
                                        'name' => 'Kepala Keluarga',
                                        'link' => route('app.admin.kepala_keluarga.index'),
                                    ],
                                    // (object) [
                                    //     'name' => 'Penduduk Meninggal',
                                    //     'link' => route('app.admin.penduduk.meninggal'),
                                    // ],
                                    // (object) [
                                    //     'name' => 'Penduduk Pindah Datang',
                                    //     'link' => route('app.admin.penduduk-pindah-datang.index'),
                                    // ],
                                    // (object) [
                                    //     'name' => 'Mutasi Penduduk',
                                    //     'link' => route('app.admin.penduduk.mutasi'),
                                    // ],
                                    // (object) [
                                    //     'name' => 'Rumah Tangga',
                                    //     'link' => route('app.admin.rumah_tangga.index'),
                                    // ],
                                    
                                ],
                            ],
                            (object) [
                                'name' => 'Pelayanan Nikah',
                                'icon' => 'las la-hand-holding-heart',
                                'link' => '#',
                                'childs' => [
                                    (object) [
                                        'name' => 'Pengantar Nikah',
                                        'link' => route('app.admin.layanan_nikah.pengantar_nikah.index'),
                                    ],
                                    (object) [
                                        'name' => 'Ket. Pernah Nikah',
                                        'link' => route('app.admin.layanan_nikah.pengantar_nikah.ket-pernah-nikah'),
                                    ],
                                    (object) [
                                        'name' => 'Ket. Belum Pernah Nikah',
                                        'link' => route('app.admin.layanan_nikah.pengantar_nikah.ket-belum-pernah-nikah'),
                                    ],
                                    (object) [
                                        'name' => 'Ket. Duda / Janda',
                                        'link' => route('app.admin.layanan_nikah.pengantar_nikah.ket-duda-janda'),
                                    ],
                                    
                                ],
                            ],
                            (object) [
                                'name' => 'Data Surat',
                                'icon' => 'las la-briefcase',
                                'link' => route('app.admin.surat.daftar-surat'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Dokumentasi',
                                'icon' => 'las la-window-restore',
                                'link' => route('app.admin.dokumentasi.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Kelembagaan',
                                'icon' => 'las la-sitemap', 
                                'link' => '#',
                                'childs' => [
                                    (object) [
                                        'name' => 'Data Lembaga',
                                        'link' => route('app.admin.kelembagaan.lembaga.index'),
                                    ],
                                    (object) [
                                        'name' => 'Pengurus Lembaga',
                                        'link' => route('app.admin.kelembagaan.pengurus.index'),
                                    ],
                                    (object) [
                                        'name' => 'Jabatan Pengurus',
                                        'link' => route('app.admin.kelembagaan.pengurus.jabatan'),
                                    ],
                                ],
                            ],
                            (object) [
                                'name' => 'Adm Umum',
                                'icon' => 'la la-book',
                                'link' => route('app.admin.administrasi_umum.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Adm Penduduk',
                                'icon' => 'las la-address-book',
                                'link' => '#',
                                'childs' => [
                                    (object) [
                                        'name' => 'Buku Induk',
                                        'link' => route('app.admin.buku-induk.index'),
                                    ],
                                    // (object) [
                                    //     'name' => 'Buku Mutasi',
                                    //     'link' => route('app.admin.kelembagaan.lembaga.index'),
                                    // ],
                                    (object) [
                                        'name' => 'Rekapitulasi Penduduk',
                                        'link' => route('app.admin.kelembagaan.lembaga.index'),
                                    ],
                                    (object) [
                                        'name' => 'Buku KTP & KK',
                                        'link' => route('app.admin.kelembagaan.lembaga.index'),
                                    ],
                                ],
                            ],
                            (object) [
                                'name' => 'Permohonan Surat',
                                'icon' => 'las la-tasks',
                                'link' => route('app.admin.permohonan_surat.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Surat Masuk',
                                'icon' => 'la la-download',
                                'link' => route('app.admin.surat-masuk.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Surat Keluar',
                                'icon' => 'la la-upload',
                                'link' => route('app.admin.surat-keluar.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Pengguna',
                                'icon' => 'la la-user-cog',
                                'link' => '#',
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Landing Page',
                                'icon' => 'la la-columns',
                                'link' => 'app/admins/landing-pages',
                                'childs' => [
                                    (object) [
                                        'name' => 'Banner',
                                        'link' => '#',
                                    ],
                                    (object) [
                                        'name' => 'Tentang Kami',
                                        'link' => '#',
                                    ],
                                    (object) [
                                        'name' => 'Keunggulan',
                                        'link' => '#',
                                    ],
                                    (object) [
                                        'name' => 'Foto',
                                        'link' => '#',
                                    ],
                                    (object) [
                                        'name' => 'Testimoni',
                                        'link' => '#',
                                    ],
                                    (object) [
                                        'name' => 'Kontak',
                                        'link' => '#',
                                    ],
                                    (object) [
                                        'name' => 'Artikel',
                                        'link' => '#',
                                    ],
                                ],
                            ],
                        ];
                        break;
                    case \app\Enums\UserRole::Penulis:
                        $menus = [
                            (object) [
                                'name' => 'Beranda',
                                'icon' => 'la la-dashboard',
                                'link' => '#',
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Tag',
                                'icon' => 'las la-map-pin',
                                'link' => route('app.penulis.tag.tag'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Kategori',
                                'icon' => 'las la-tasks',
                                'link' => route('app.penulis.kategori.kategori'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Artikel',
                                'icon' => 'las la-clipboard-list',
                                'link' => route('app.penulis.artikel.artikel'),
                                'childs' => [],
                            ],
                        ];
                        break;
                   
                    default:
                        # code...
                        break;
                }

                ?>
                @foreach ($menus as $menu)
                    @if (isset($menu->title))
                        <li class="menu-title">
                            <span>{{ $menu->title }}</span>
                        </li>
                        @continue
                    @endif
                    <li class="{{ !count($menu->childs) && Request::is($menu->link.'*') ? 'active' : '' }}">
                        <a href="{{ count($menu->childs) ? '#' : $menu->link }}">
                            <i class="{{ $menu->icon }}"></i>
                            <span> {{ $menu->name }}</span>
                            @if(count($menu->childs))
                            <span class="menu-arrow"></span>
                            @endif
                        </a>
                        @if (count($menu->childs))
                            <ul style="display: none">
                                @foreach ($menu->childs as $child)
                                <li>
                                    <a class="{{ Request::is($child->link) ? 'active text-white' : '' }}"
                                        href="{{ $child->link }}">
                                        {{ $child->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->
