<?php
include "koneksi.php";
//Create
if (isset($_POST['bsimpan'])) {
    # code...
    $simpan = mysqli_query($koneksi, "INSERT INTO mobil (id_mob, no_plat, waktu_masuk, jenis_mob, status, area, lokasi)
                                                    VALUES ('$_POST[tid_mob]',
                                                    '$_POST[tno_plat]',
                                                    '$_POST[twaktu_masuk]',
                                                    '$_POST[tjenis_mob]',
                                                    '$_POST[tstatus]',
                                                    '$_POST[tarea]',
                                                    '$_POST[tlokasi]')");
    if ($simpan) {
        # code..
        echo "<script>
                alert('tambah data sukses!');
                document.location='index.php';
            </script>";
    } else {
        # code...
        echo "<script>
                alert('tambah data gagal!');
                document.location='index.php';
            </script>";
    }
}

//Update
if (isset($_POST['bupdate'])) {
    # code...
    $update = mysqli_query($koneksi, "UPDATE mobil SET 
                                      no_plat = '$_POST[tno_plat]',
                                      waktu_masuk = '$_POST[twaktu_masuk]',
                                      jenis_mob = '$_POST[tjenis_mob]',
                                      status = '$_POST[tstatus]',
                                      area = '$_POST[tarea]',
                                      lokasi = '$_POST[tlokasi]'
                                      WHERE id_mob = '$_POST[id_mob]'
                                      ");


    if ($update) {
        # code..
        echo "<script>
                alert('update data sukses!');
                document.location='index.php';
            </script>";
    } else {
        # code...
        echo "<script>
                alert('update data gagal!');
                document.location='index.php';
            </script>";
    }
}

//Delete
if (isset($_POST['bdelete'])) {
    # code...
    $delete = mysqli_query($koneksi, "DELETE FROM mobil WHERE id_mob = $_POST[id_mob]");


    if ($delete) {
        # code..
        echo "<script>
                alert('hapus data sukses!');
                document.location='index.php';
            </script>";
    } else {
        # code...
        echo "<script>
                alert('hapus data gagal!');
                document.location='index.php';
            </script>";
    }
}