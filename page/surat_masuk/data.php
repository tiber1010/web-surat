<?php session_start()?>
<?php
    if( isset($_POST['simpan'])){
        
        $id = test_input($_POST['id']);
        $no_surat = test_input($_POST['no_surat']);
        $tgl_surat = test_input($_POST['tgl']);
        $perihal = test_input($_POST['perihal']);
        $tgl_masuk = date('Y-m-d');

        $ekstensi_diperbolehkan    = array('pdf','docx');
        $nama    = $_FILES['file']['name'];
        $x       = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ukuran        = $_FILES['file']['size'];
        $file_tmp    = $_FILES['file']['tmp_name']; 

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){ 
                move_uploaded_file($file_tmp,'file_surat_masuk/'.$nama);

                $sql_p = $koneksi->query("insert into surat_masuk (id_masuk, no_surat_masuk, tanggal_surat, perihal, tanggal_masuk, file)
                                        values('$id', '$no_surat', '$tgl_surat', '$perihal', '$tgl_masuk', '$nama')");
                    if ($sql_p){
                    ?>
                        <script type="text/javascript">
                        alert("Simpan Data Berhasil");
                        window.location.href="?page=masuk";
                        </script>
                    <?php
                    }
            }else{
                ?>
                    <script type="text/javascript">
                    alert("UKURAN FILE TERLALU BESAR!");
                    window.location.href="?page=masuk";
                    </script>
                <?php
            }
        }else{
            ?>
                <script type="text/javascript">
                alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!");
                window.location.href="?page=masuk";
                </script>
            <?php
        }

    }
?>
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Surat Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Surat Masuk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                    Tambah Data
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Surat Masuk</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="no" class="control-label">No Surat</label>
                                        <input type="text" class="form-control" name="no_surat" placeholder="nomor surat sesuai yang ada di surat" autofocus required autocomplete="off">
                                        <input type="hidden" class="form-control" name="id">             
                                </div>
                                <div class="form-group">
                                    <label for="tgl" class="control-label">Tanggal Surat</label>
                                        <input type="date" class="form-control" name="tgl" value="<?=date('Y-m-d')?>" autofocus required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="perihal" class="control-label">Perihal</label>
                                        <input type="text" class="form-control" name="perihal" autofocus required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>File <small><i>Scan Surat</i></small></label>
                                        <input type="file" name="file" id='file'>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
        					$no = 1;
                            $sql = $koneksi->query("select * from surat_masuk order by id_masuk desc");
        					while ($data=$sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <td width="1%"><?=$no++; ?>.</td>
                            <td><?=$data['no_surat_masuk']; ?></td>
                            <td width="14%"><?=tglIndonesia(date('d/m/Y', strtotime($data['tanggal_surat']))) ?></td>
                            <td width="2%"><?=$data['perihal']; ?></td>
                            <td width="15%"><?=tglIndonesia(date('d-m-Y', strtotime($data['tanggal_masuk']))) ?></td>
                            <td><a href="?page=masuk&aksi=pdf&file=<?=$data['id_masuk']; ?>" target="_blank"><?=$data['file']; ?></a></td>
                            <td>
                                <button type="button" title="Edit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_<?php echo $data['id_masuk'] ?>">
                                    <i class="fa fa-cog"></i>
                                </button> 
                                <button type="button" title="Hapus" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_<?php echo $data['id_masuk'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- modal ubah -->
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="edit_<?php echo $data['id_masuk'] ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content bg-warning">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Data</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                </div>
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="no" class="control-label">No Surat</label>
                                                <input type="text" class="form-control" name="no_surat" value="<?=$data['no_surat_masuk'];?>">
                                                <input type="hidden" class="form-control" name="id_masuk" value="<?=$data['id_masuk'];?>">             
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl" class="control-label">Tanggal Surat</label>
                                                <input type="date" class="form-control" name="tgl" value="<?=$data['tanggal_surat']?>" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="perihal" class="control-label">Perihal</label>
                                                <input type="text" class="form-control" name="perihal" value="<?=$data['perihal'];?>" autofocus>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Tutup</button>
                                    <button type="submit" name="save" class="btn btn-outline-dark">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_<?php echo $data['id_masuk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <p>Yakin ingin menghapus data ini ?</p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <a href="?page=masuk&aksi=hapus&id=<?php echo $data['id_masuk'] ?>" class="btn btn-primary">Hapus</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>