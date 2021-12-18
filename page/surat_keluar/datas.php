<?php session_start()?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Surat Keluar Bidang Sekretariat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Surat Keluar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="?page=keluars&aksi=tambahs" class="btn btn-info btn-sm">
                <li class="fa fa-plus"></li> Tambah</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>No. Surat Keluar</th>
                            <th>Tanggal Surat</th>
                            <th>Tujuan</th>
                            <th>Perihal</th>
                            <th>Lampiran</th>
                            <th>File</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
        					$no = 1;
                            $sql = $koneksi->query("select * from surat_keluar where bidang='sekretariat' order by id_keluar desc");
        					while ($data=$sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <td width="1%"><?=$no++; ?>.</td>
                            <td><?=$data['no_surat_keluar']; ?></td>
                            <td width="14%"><?=tglIndonesia(date('d/m/Y', strtotime($data['tgl_surat_keluar'])))?></td>
                            <td width="2%"><?=$data['tujuan']; ?></td>
                            <td width="15%"><?=$data['perihal']; ?></td>
                            <td width="15%"><?=$data['lampiran']; ?></td>
                            <td><a href="?page=keluars&aksi=pdf&file=<?=$data['id_keluar']; ?>" target="_blank"><?=$data['file']; ?></a></td>
                            <td>
                                <a href="?page=keluars&aksi=ubahs&id=<?=$data['id_keluar'];?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                <a href="?page=keluars&aksi=hapuss&id=<?=$data['id_keluar'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin menghapus data ini')"><i class="fa fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>