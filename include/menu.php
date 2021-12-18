<?php session_start()?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">APK SURAT</span>
    </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block"><?=$nama?> - (<?=$level?>)</a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=masuk" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>Surat Masuk</p>
                        </a>
                    </li>
                    <?php if($_SESSION['admin'] AND $_SESSION['username']){ ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>Surat Keluar
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="?page=keluar" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bidang Data</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=keluars" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bidang Sekretariat</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="?page=laporan" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Laporan</p>
                        </a>     
                    </li> 
                    <li class="nav-item">
                        <a href="?page=user" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Admin</p>
                        </a>     
                    </li> 
                    <?php }?>
                    <li class="nav-item">
                        <a href="keluar.php" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p>Logout</p>
                        </a>     
                    </li> 
                </ul>
            </nav>
        </div>
</aside>