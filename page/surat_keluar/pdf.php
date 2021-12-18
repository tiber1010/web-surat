<?php
$id = $_GET['file'];
$sql = $koneksi->query("select * from surat_keluar where id_keluar='$id'");
$data=$sql->fetch_assoc();
?>
<section class="content">
<table class="table table-bordered table-striped">
    <tr>
        <td><embed src="file_surat_keluar/<?=$data['file']; ?>" type="application/pdf" width="100%" height="1000"></embed></td>
    </tr>
</table>
</section>