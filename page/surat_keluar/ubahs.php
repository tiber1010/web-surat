<?php
$id = $_GET['id'];
$sql = $koneksi->query("select * from surat_keluar where id_keluar='$id'");
$data = $sql->fetch_assoc();

if( isset($_POST['simpan'])){
    
    $id = $_POST['kode'];
    $no_surat = $_POST['no_surat'];
    $tgl = $_POST['tgl'];
    $tujuan = $_POST['tujuan'];
    $lampiran = $_POST['lampiran'];
    $perihal = $_POST['perihal'];

    $sql_p = $koneksi->query("UPDATE surat_keluar SET no_surat_keluar='$no_surat', 
                                                    tgl_surat_keluar='$tgl', 
                                                    tujuan='$tujuan',
                                                    perihal='$perihal',  
                                                    lampiran='$lampiran' where id_keluar='$id'");
		if ($sql_p){
			?>
            	<script type="text/javascript">
				alert("Simpan Data Berhasil");
				window.location.href="?page=keluars";
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
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                <a href="?page=keluar" class="btn btn-warning btm-sx">Kembali</a>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no.srt.k">NO. Surat Keluar</label>
                                <input type="text" class="form-control" name="no_surat" value="<?=$data['no_surat_keluar']?>" readonly required="required">
                                <input type="hidden" class="form-control" name="kode" value="<?=$data['id_keluar']?>" required="required">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="tgl">tanggal Surat</label>
                                    <input type="date" class="form-control" name="tgl" value="<?=$data['tgl_surat_keluar']?>" required="required" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="tujuan">Tujuan</label>
                                    <textarea class="form-control" rows="3" name="tujuan"  required><?=$data['tujuan']?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lampiran">Lampiran</label>
                                <input type="text" class="form-control" name="lampiran" value="<?=$data['lampiran']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="perihal">Perihal</label>
                                <input type="text" class="form-control" name="perihal" value="<?=$data['perihal']?>" required>
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