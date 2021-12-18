<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Surat Masuk dan Surat Keluar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-info">

                    <div class="box-body">
                        <form method="post" action="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Mulai Tanggal</label>
                                    <input autocomplete="off" type="date" name="tgl1" class="form-control" required="required">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Sampai Tanggal</label>
                                    <input autocomplete="off" type="date" name="tgl2" class="form-control"  required="required">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <input style="margin-top: 35px" type="submit" name="masuk" value="Surat Masuk" class="btn btn-sm btn-primary">
                                </div>
                            </div>&nbsp;&nbsp;
                            <div class="col-md-1">
                                <div class="form-group">
                                    <input style="margin-top: 35px" type="submit" name="keluar" value="Surat Keluar" class="btn btn-sm btn-primary">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Laporan masuk -->
                <?php

                    if(isset($_POST["masuk"])){

                        $dt1 = $_POST["tgl1"];
                        $dt2 = $_POST["tgl2"];

                        $no = 1;

                        $sql = $koneksi->query("select * from surat_masuk where tanggal_masuk BETWEEN '$dt1' AND '$dt2' order by tanggal_masuk");
                ?>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>No. Surat Masuk</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama File</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                while ($data=$sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td width="1%"><?=$no++; ?>.</td>
                                <td><?=$data['no_surat_masuk']; ?></td>
                                <td width="14%"><?=tglIndonesia(date('d/m/Y', strtotime($data['tanggal_surat']))) ?></td>
                                <td width="2%"><?=$data['perihal']; ?></td>
                                <td width="15%"><?=tglIndonesia(date('d-m-Y', strtotime($data['tanggal_masuk']))) ?></td>
                                <td><a href="#" target="_blank"><?=$data['file']; ?></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Laporan keluar -->
                <?php 
                    }else
                    
                    if(isset($_POST["keluar"])){

                        $dt1 = $_POST["tgl1"];
                        $dt2 = $_POST["tgl2"];

                        $no = 1;
                        $sql = $koneksi->query("select * from surat_keluar where tgl_surat_keluar BETWEEN '$dt1' AND '$dt2' order by tgl_surat_keluar desc");
                        
                ?>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>No. Surat Keluar</th>
                                <th>Tanggal Surat</th>
                                <th>Tujuan</th>
                                <th>Bidang</th>
                                <th>Perihal</th>
                                <th>Lampiran</th>
                                <th>File</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                while ($data=$sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td width="1%"><?=$no++; ?>.</td>
                                <td><?=$data['no_surat_keluar']; ?></td>
                                <td width="14%"><?=tglIndonesia(date('d/m/Y', strtotime($data['tgl_surat_keluar'])))?></td>
                                <td width="2%"><?=$data['tujuan']; ?></td>
                                <td width="2%"><?=$data['bidang']; ?></td>
                                <td width="15%"><?=$data['perihal']; ?></td>
                                <td width="15%"><?=$data['lampiran']; ?></td>
                                <td><?=$data['file']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
            </section>
        </div>
    </section>
</div>