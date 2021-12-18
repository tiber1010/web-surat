<?php	
	session_start();
	$page = $_GET['page'];
	$aksi = $_GET['aksi'];
		
	if( !isset($_SESSION["login"])){
		header("location: login.php?alert=belum_login");
		 exit;
	}else{
		if($page == ""){
				include "include/dasbord.php";
		}else

		if($page == "masuk"){
			if($aksi == ""){
				include "page/surat_masuk/data.php";
			}
			if($aksi == "pdf"){
				include "page/surat_masuk/pdf.php";
			}
			if($aksi == "ubah"){
				include "page/surat_masuk/ubah.php";
			}
			if($aksi == "hapus"){
				include "page/surat_masuk/hapus.php";
			}
		}else

		if($_SESSION['admin'] AND $page == "keluar"){
			if($aksi == ""){
				include "page/surat_keluar/data.php";
			}
			if($aksi == "tambah"){
				include "page/surat_keluar/add.php";
			}
			if($aksi == "pdf"){
				include "page/surat_keluar/pdf.php";
			}
			if($aksi == "ubah"){
				include "page/surat_keluar/ubah.php";
			}
			if($aksi == "hapus"){
				include "page/surat_keluar/hapus.php";
			}
		}else

		if($_SESSION['admin'] AND $page == "keluars"){
			if($aksi == ""){
				include "page/surat_keluar/datas.php";
			}
			if($aksi == "tambahs"){
				include "page/surat_keluar/adds.php";
			}
			if($aksi == "pdf"){
				include "page/surat_keluar/pdf.php";
			}
			if($aksi == "ubahs"){
				include "page/surat_keluar/ubahs.php";
			}
			if($aksi == "hapuss"){
				include "page/surat_keluar/hapuss.php";
			}
		}else
		
		if($_SESSION['admin'] AND $page == "laporan"){
			if($aksi == ""){
				include "page/laporan/data.php";
			}
			if($aksi == "ubah"){
				include "page/user/ubah.php";
			}
			if($aksi == "hapus"){
				include "page/user/hapus.php";
			}
		}else

		if($_SESSION['admin'] AND $page == "user"){
			if($aksi == ""){
				include "page/admin/data.php";
			}
			if($aksi == "tambah"){
				include "page/admin/tambah.php";
			}
			if($aksi == "ubah"){
				include "page/admin/ubah.php";
			}
			if($aksi == "hapus"){
				include "page/admin/hapus.php";
			}
			if($aksi == "backup"){
				include "page/admin/backup.php";
			}
		}
	}
?>
