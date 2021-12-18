<?php
//session_start();
$id = $_GET['id'];
$sql = $koneksi->query("select * from surat_masuk where id_masuk='$id'");
$data=$sql->fetch_assoc();
$foto = $data['file'];
unlink("file_surat_masuk/$foto");
$sql_hapus = $koneksi->query("DELETE FROM surat_masuk where id_masuk='$id'");
	if ($sql_hapus){
			?>
            	<script type="text/javascript">
				alert("Data Berhasil dihapus");
				window.location.href="?page=masuk";
				</script>
            <?php
		}
?>