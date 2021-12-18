<?php
session_start();
include "include/koneksi.php"; 
if(isset($_SESSION["login"])){
header("location: index.php");
    exit;
}
?>
<?php
    if(isset($_POST['login'])){
        
        $usern = htmlspecialchars($_POST['user']);
        $pass = $_POST['pass'];
        
        $sql = $koneksi->query("select * from user where username='$usern' AND password='$pass'");
        
        if($sql->num_rows === 1 ) {
            $row = $sql->fetch_assoc();
            $_SESSION['login'] = true;
            //cek level
            if($row["level"] == "admin") {
                $_SESSION['admin'] = $row['kd_user'];
                $_SESSION['username'] = $row['username'];
                header("location: index.php");
                exit;
            }elseif($row["level"] == "pengguna") {
                $_SESSION['pengguna'] = $row['kd_user'];
                $_SESSION['username'] = $row['username'];
                header("location: index.php");
                exit;
            }
        }
        $error = true;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>APLIKASI ARSIP SURAT</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html">LOGIN</a>
        </div>
            <p class="login-box-msg" style="color:#F00; font-style:italic;">
                <?php if(isset($error)):?>
                    <b>Username / Password salah!</b>
                <?php endif; ?>
            </p>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Halaman Login</p>

                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="user" autofocus class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pass" autofocus class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
