<?php
//session_start();
$id = $_GET['id'];
$sql = $koneksi->query("select * from surat_keluar where id_keluar='$id'");
$data=$sql->fetch_assoc();
$foto = $data['file'];
unlink("file_surat_keluar/$foto");
$sql_hapus = $koneksi->query("DELETE FROM surat_keluar where id_keluar='$id'");
	if ($sql_hapus){
			?>
            	<script type="text/javascript">
				alert("Data Berhasil dihapus");
				window.location.href="?page=keluars";
				</script>
            <?php
		}
?>