<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">
                <li class="menu-title">
                    <span>LAYANAN UMUM (SURAT)</span>
                </li>
                <?php
                $role = auth()->user()->role;
                
                $menus = [];
                
                switch ($role) {
                    case \app\Enums\UserRole::Admin:
                        $menus = [
                            (object) [
                                'name' => 'Kembali Ke Dashboard',
                                'icon' => 'las la-reply', 
                                'link' => route('app.admin.dashboard'),
                                'childs' => [],
                            ],
                
                            (object) [
                                'name' => 'Ket. Usaha',
                                'icon' => 'las la-boxes',
                                'link' => route('app.admin.surat.sku.index'),
                                'childs' => [],
                            ],
                            // (object) [
                            //     'name' => 'Ket. Tempat Usaha',
                            //     'icon' => 'las la-hot-tub',
                            //     'link' => route('app.admin.layanan_umum.sk_usaha.sk-tempat-usaha'),
                            //     'childs' => [],
                            // ],
                            (object) [
                                'name' => 'Ket. Tidak Mampu',
                                'icon' => 'las la-hand-holding-usd',
                                'link' => route('app.admin.surat.sktm.index'),
                                'childs' => [],
                            ],
                            // (object) [
                            //     'name' => 'Ket. Tidak Mampu',
                            //     'icon' => 'las la-hand-holding-usd',
                            //     'link' => '#',
                            //     'childs' => [
                            //         (object) [
                            //             'name' => 'SKTM Sekolah',
                            //             'link' => route('app.admin.surat.sktm.index'),
                            //         ],
                            //         (object) [
                            //             'name' => 'SKTM Umum',
                            //             'link' => '#',
                            //         ],
                            //     ],
                            // ],
                            (object) [
                                'name' => 'Ket. Keluarga Miskin',
                                'icon' => 'las la-hiking',
                                'link' =>  route('app.admin.surat.skkm.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Ket. Penghasilan',
                                'icon' => 'las la-donate',
                                'link' =>  route('app.admin.surat.skp.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Ket. Bepergian',
                                'icon' => 'las la-car-side',
                                'link' =>  route('app.admin.surat.skb.index'),
                                'childs' => [],
                            ],
                           
                            (object) [
                                'name' => 'Ket. Beda Nama',
                                'icon' => 'las la-window-restore',
                                'link' =>  route('app.admin.surat.skbn.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Ket. Pendaftaran Haji',
                                'icon' => 'las la-chalkboard-teacher',
                                'link' => route('app.admin.surat.skph.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Ket. Kelahiran',
                                'icon' => 'las la-baby',
                                'link' =>  route('app.admin.surat.skk.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Ket. Domisili',
                                'icon' => 'las la-map-marked-alt',
                                'link' => route('app.admin.surat.skd.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Ket. Bukan PNS',
                                'icon' => 'las la-user-graduate',
                                'link' => route('app.admin.surat.skbp.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Ket. Belum Menikah',
                                'icon' => 'las la-user-tie',
                                'link' => route('app.admin.surat.skbm.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Ket. Tidak Punya rumah',
                                'icon' => 'las la-dumpster',
                                'link' => route('app.admin.surat.sktmr.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Ket. Pindah Datang',
                                'icon' => 'las la-clone',
                                'link' => route('app.admin.surat-keterangan-pindah-datang.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Ket. Kematian',
                                'icon' => 'las la-heartbeat',
                                'link' => '#',
                                'childs' => [
                                    (object) [
                                        'name' => 'Kematian Lama',
                                        'link' => route('app.admin.surat-keterangan-kematian-lama.index'),
                                    ],
                                    (object) [
                                        'name' => 'Kematian Baru',
                                        'link' => route('app.admin.surat-keterangan-kematian-baru.index'),
                                    ],
                                ],
                            ],
                            (object) [
                                'name' => 'Ket. Ahli Waris',
                                'icon' => 'las la-handshake',
                                'link' => route('app.admin.surat-keterangan-ahli-waris.index'),
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Ket. Tanah',
                                'icon' => 'las la-border-all',
                                'link' => '#',
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Surat Kuasa',
                                'icon' => 'las la-briefcase',
                                'link' => route('app.admin.surat-kuasa.index'),
                                'childs' => [],
                            ],
                        ];
                        break;
                    case \app\Enums\UserRole::Representative:
                        $menus = [
                            (object) [
                                'name' => 'Beranda',
                                'icon' => 'la la-dashboard',
                                'icon' => 'la la-dashboard',
                                'link' => '#',
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Agen',
                                'icon' => 'la la-users',
                                'icon' => 'la la-dashboard',
                                'link' => '#',
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Jamaah',
                                'icon' => 'la la-file-text-o',
                                'icon' => 'la la-dashboard',
                                'link' => '#',
                                'childs' => [],
                            ],
                            (object) [
                                'name' => 'Laporan',
                                'icon' => 'la la-book',
                                'link' => '#',
                                'childs' => [
                                    (object) [
                                        'name' => 'Komisi Saya',
                                        'link' => '#',
                                    ],
                                    (object) [
                                        'name' => 'Komisi Agen',
                                        'link' => '#',
                                    ],
                                    (object) [
                                        'name' => 'Pembayaran Komisi',
                                        'link' => '#',
                                    ],
                                ],
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
                    <li class="{{ !count($menu->childs) && Request::is($menu->link . '*') ? 'active' : '' }}">
                        <a href="{{ count($menu->childs) ? '#' : $menu->link }}">
                            <i class="{{ $menu->icon }}"></i>
                            <span> {{ $menu->name }}</span>
                            @if (count($menu->childs))
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
