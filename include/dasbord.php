<?php
    $a = $koneksi->query("select * from surat_masuk");
    $masuk = $a->num_rows;
    $b = $koneksi->query("select * from surat_keluar");
    $keluar = $b->num_rows;
    $c = $koneksi->query("select * from user");
    $user = $c->num_rows;
?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-4 col-8">
                    <div class="small-box bg-info">
                        <div class="inner">
                        <p>TOTAL</p>
                            <h3><?=$masuk?><sup style="font-size: 20px"></sup></h3>

                        
                        </div>
                        <div class="icon">
                        <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Surat Masuk <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-8">
                    <div class="small-box bg-success">
                        <div class="inner">
                        <p>TOTAL</p>
                        <h3><?=$keluar?><sup style="font-size: 20px"></sup></h3>

                        </div>
                        <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Surat Keluar <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-8">
                    <div class="small-box bg-warning">
                        <div class="inner">
                        <p>TOTAL</p>
                        <h3><?=$user?><sup style="font-size: 20px"></sup></h3>

                        </div>
                        <div class="icon">
                        <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">User <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                
                
            </div>
        </div>
    </section>
</div>