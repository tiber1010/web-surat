<?php
    $sql = $koneksi->query("select max(id_keluar) as maxKode from surat_keluar");
    $data =$sql->fetch_assoc();
    $kodeProduk = $data['maxKode'];
    $noUrut = $kodeProduk+ 1;
    $no = sprintf("%03s", $noUrut);

    $char = "NO-";
    $data = "data";
    $bulan = date('m');
    $tahun = date('Y');
    $kodeProduk = $char.$no."/".$data."/".$bulan."/".$tahun;     
    
    if( isset($_POST['simpan'])){
    
        $id = $_POST['kode'];
        $no_surat = $_POST['no_surat'];
        $tgl = $_POST['tgl'];
        $tujuan = $_POST['tujuan'];
        $lampiran = $_POST['lampiran'];
        $perihal = $_POST['perihal'];

        $ekstensi_diperbolehkan    = array('pdf','docx');
        $nama    = $_FILES['file']['name'];
        $x       = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ukuran        = $_FILES['file']['size'];
        $file_tmp    = $_FILES['file']['tmp_name']; 

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){ 
                move_uploaded_file($file_tmp,'file_surat_keluar/'.$nama);
		
                $sql_p = $koneksi->query("insert into surat_keluar (id_keluar, no_surat_keluar, tgl_surat_keluar, tujuan, bidang, perihal, lampiran, ringkasan_surat, file)
                                        values('$id', '$no_surat', '$tgl', '$tujuan', 'data', '$perihal', '$lampiran', '-', '$nama')");
                if ($sql_p){
                    ?>
                        <script type="text/javascript">
                            alert("Simpan Data Berhasil");
                            window.location.href="?page=keluar";
                        </script>
                    <?php
                }
            }else{
                ?>
                    <script type="text/javascript">
                    alert("UKURAN FILE TERLALU BESAR!");
                    window.location.href="?page=keluar";
                    </script>
                <?php
            }
        }else{
            ?>
                <script type="text/javascript">
                alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!");
                window.location.href="?page=keluar";
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
                    <h1>Surat Keluar Bidang Data</h1>
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
                                <input type="text" class="form-control" name="no_surat" value="<?=$kodeProduk?>" readonly required="required">
                                <input type="hidden" class="form-control" name="kode" required="required">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="tgl">tanggal Surat</label>
                                    <input type="date" class="form-control" name="tgl" value="<?=date('Y-m-d')?>" required="required" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="tujuan">Tujuan</label>
                                    <textarea class="form-control" rows="3" name="tujuan" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lampiran">Lampiran</label>
                                <input type="text" class="form-control" name="lampiran" required>
                            </div>
                            <div class="form-group">
                                <label for="perihal">Perihal</label>
                                <input type="text" class="form-control" name="perihal" required>
                            </div>
                            <div class="form-group">
                                <label>File <small><i>file</i></small></label>
                                    <input type="file" name="file">
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