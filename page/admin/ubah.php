<?php  
$id = $_GET['id'];
$sql = $koneksi->query("select * from user where kd_user='$id'");
$data = $sql->fetch_assoc();

    if( isset($_POST['simpan'])){
    
        $id = $_POST['kode'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $jab = $_POST['user'];
        $alamat = $_POST['pass'];
        $hp = $_POST['pengguna'];
            
        $sql_p = $koneksi->query("UPDATE user SET nama_user='$nama', 
                                                  jk='$jk', 
                                                  level='$hp'
                                                  where kd_user='$id'");
            if ($sql_p){
                ?>
            <script type="text/javascript">
                    alert("Simpan Data Berhasil");
                    window.location.href="?page=user";
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
                    <h1>Tambah Data Pengguna</h1>
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
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                <a href="?page=user" class="btn btn-warning btm-sx">Kembali</a>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?=$data['nama_user'];?>" required="required">
                                <input type="hidden" class="form-control" name="kode" value="<?=$data['kd_user'];?>">
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" id="jk" value="L" <?php if($data['jk']=='L') echo 'checked'?> required>
                                        <label class="form-check-label">Laki-Laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" id="jk" value="P" <?php if($data['jk']=='P') echo 'checked'?> required>
                                        <label class="form-check-label">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Level</label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pengguna" id="pengguna" value="admin" <?php if($data['level']=='admin') echo 'checked'?> required>
                                        <label class="form-check-label">Admin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pengguna" id="pengguna" value="pengguna" <?php if($data['level']=='pengguna') echo 'checked'?> required>
                                        <label class="form-check-label">Pengguna</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>

                <div class="card-footer">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </select>
</div>