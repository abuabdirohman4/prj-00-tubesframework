            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?= base_url() ?>assets/images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">Faisal Nur Falah<i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Administrator</p>
                            </div>
                        </div>
                    </li>
                    <li class="bold"><a href="<?= base_url() ?>dashboard" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Dashboard</a>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i>Bahan Baku</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url() ?>bahan">Lihat Bahan Baku</a>
                                        </li>
                                        <li><a href="<?= base_url() ?>bahan/create">Tambah Bahan Baku</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-palette"></i>COA</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url() ?>coa">Lihat COA</a>
                                        </li>
                                        <li><a href="<?= base_url() ?>coa/create">Tambah COA</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-border-all"></i> Kategori</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url() ?>kategori">Lihat Kategori</a>
                                        </li>
                                        <li><a href="<?= base_url() ?>kategori/create">Tambah Kategori</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-social-pages"></i>Minuman</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url() ?>minuman">Lihat Minuman</a>
                                        </li>
                                        <li><a href="<?= base_url() ?>minuman/create">Tambah Minuman</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-insert-comment"></i>Pegawai</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url() ?>pegawai">Lihat Pegawai</a>
                                        </li>
                                        <li><a href="<?= base_url() ?>pegawai/create">Tambah Pegawai</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i>Retur</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url() ?>retur">Lihat Retur</a>
                                        </li>
                                        <li><a href="<?= base_url() ?>retur/create">Tambah Retur</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-swap-vert-circle"></i>Vendor</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?= base_url() ?>index.php/vendor">Lihat Vendor</a>
                                        </li>
                                        <li><a href="<?= base_url() ?>index.php/vendor/create">Tambah Vendor</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                    </li>
                    <li class="li-hover">
                        <div class="divider"></div>
                    </li>
                    <li class="li-hover">
                        <p class="ultra-small margin more-text">MORE</p>
                    </li>
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-format-color-fill"></i>Pembelian</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="<?= base_url() ?>pembelian">Lihat Pembelian</a>
                                </li>
                                <li><a href="<?= base_url() ?>pembelian/create">Tambah Pembelian</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-image-grid-on"></i>Penjualan</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="<?= base_url() ?>penjualan">Lihat Penjualan</a>
                                </li>
                                <li><a href="<?= base_url() ?>penjualan/create">Tambah Penjualan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i>Laporan</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="<?= base_url() ?>laporan/jurnal_umum">Jurnal Umum</a>
                                </li>
                                <li><a href="<?= base_url() ?>laporan/buku_besar">Buku Besar</a>
                                </li>
                                <li><a href="<?= base_url() ?>laba_rugi">Laba Rugi</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <li class="li-hover">
                    <div class="divider"></div>
                </li>
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->