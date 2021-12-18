<?php
$id = $_GET['file'];
$sql = $koneksi->query("select * from surat_masuk where id_masuk='$id'");
$data=$sql->fetch_assoc();
?>
<section class="content">
<table class="table table-bordered table-striped">
    <tr>
        <td><embed src="file_surat_masuk/<?=$data['file']; ?>" type="application/pdf" width="100%" height="1000"></embed></td>
    </tr>
</table>
</section>