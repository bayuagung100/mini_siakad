<?php
session_start();
include "../../inc/helper.php";
include "../header.php";
$var = ucwords(str_replace('-', ' ', $_GET['id']));
?>
<div class="content-wrapper">
    <section class="content">
        <?php
        if ($var == "Daftar Dosen") {
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Tambah <?php echo $var; ?></h3>
                        </div>

                        <div class="box-body">
                            <?php
                            buka_form("id_user","tambah");
                            text_form("Kode Dosen", "kd_dosen",$var);
                            tutup_form("../../daftar-dosen/");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </section>
</div>


<?php
include "../footer.php" ?>