<?php
    session_start();

    if (isset($_SESSION["username"]) && $_SESSION["hak_akses"] == 'asmen') {
        echo "masuk";
    } else {
        session_unset();
        session_destroy();
        header("Location:../../login.php");
    }
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Sisfo Diklat</title>

    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <?php include "partial/style.php" ?>

</head>

<body>

    <div id="wrapper">

        <?php include "partial/navbar.php" ?>
        <?php include "partial/sidebar.php" ?>
        
        <div id="page-wrapper">

            <div class="row">
                <br>
                <div class="col-md-12">

                    <?php   

                        include "../../config/koneksi.php";

                        if (isset($_SESSION["flash"]) && isset($_SESSION["message"])) {
                            
                            $flash = $_SESSION["flash"];
                            $message = $_SESSION["message"];

                            if ($flash == 'sukses') {
                                
                                echo '
                                    <div class="alert alert-success">
                                        <strong>SUKSES!</strong> '. $message .'
                                    </div>
                                ';

                                $_SESSION["flash"] = NULL;
                                $_SESSION["message"] = NULL;

                            } elseif ($flash == 'gagal') {
                                
                                echo '
                                    <div class="alert alert-danger">
                                        <strong>GAGAL!</strong> '. $message .'
                                    </div>
                                ';

                                $_SESSION["flash"] = NULL;
                                $_SESSION["message"] = NULL;

                            }
                            
                        }

                    ?>

                </div>

            </div>
            
            <?php
                
                if (isset($_GET["page"])) {
                    
                    $page = $_GET["page"];
                    
                    if ($page == 'home') {
                        include "home.php";
                    } elseif ($page == 'edit-profil') {
                        include "biodata/edit_biodata.php";
                    } elseif ($page == 'ubah-password') {
                        include "password/ubah_password.php";
                    } elseif ($page == 'pilih-angkatan') {
                        include "angkatan_diklat/pilih-angkatan.php";
                    } elseif ($page == 'lihat-nilai') {
                        include "nilai/lihat-nilai.php";
                    } elseif ($page == 'lihat-jadwal') {
                        include "jadwal_diklat/lihat-jadwal.php";
                    } elseif ($page == 'lihat-peserta') {
                        include "peserta/lihat-peserta.php";
                    }

                }

            ?>      
        </div>
   
        <?php include "partial/script.php" ?>

</body>

</html>
