<?php
//session_start();
$id = $_GET['id'];
$sql_hapus = $koneksi->query("DELETE FROM user where kd_user='$id'");
	if ($sql_hapus){
			?>
            	<script type="text/javascript">
				alert("Data Berhasil dihapus");
				window.location.href="?page=user";
				</script>
            <?php
		}
?>