<?php session_start()?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengguna</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="?page=user&aksi=tambah" class="btn btn-info btn-sm">
                <li class="fa fa-plus"></li> Tambah</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Pengguna</th>
                            <th>Jenis Kelamin</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
        					$no = 1;
                            $sql = $koneksi->query("select * from user order by kd_user desc");
        					while ($data=$sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <td width="1%"><?=$no++; ?>.</td>
                            <td><?=$data['nama_user']; ?></td>
                            <td>
                                <?php if ($data['jk'] == "L") {echo "Laki-Laki";} 
                                    else {echo "Perempuan";}
                                ?>
                            </td>
                            <td><?=$data['username']; ?></td>
                            <td><?=$data['level']; ?></td>
                            <td>
                                <a href="?page=user&aksi=ubah&id=<?=$data['kd_user'];?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                <a href="?page=user&aksi=hapus&id=<?=$data['kd_user'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin menghapus data ini')"><i class="fa fa-trash"></i>Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>