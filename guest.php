<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="mt3">
            <h3 class="text-center"></h3>
        </div>

        <div class="mt3">
            <div class="card">
                <div class="card-header bg-primary text-white">Data Parkir</div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <!--<button type="button" class="btn btn-outline-success mb-3" data-bs-toggle="modal"
                        data-bs-target="#ModalTambah">
                        Tambah Data
                    </button>-->

                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>id_Parkir</th>
                            <th>no_Plat</th>
                            <th>Waktu Masuk</th>
                            <th>Jenis Mobil</th>
                            <th>Status</th>
                            <th>Area</th>
                            <th>Lokasi</th>
                            <!--<th>Aksi</th>-->
                        </tr>
                        <?php
                        //tampil data
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM mobil ORDER BY id_mob DESC");
                        while ($data = mysqli_fetch_array($tampil)):

                            ?>


                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td>
                                    <?= $data['no_plat'] ?>
                                </td>
                                <td>
                                    <?= $data['waktu_masuk'] ?>
                                </td>
                                <td>
                                    <?= $data['jenis_mob'] ?>
                                </td>
                                <td>
                                    <?= $data['status'] ?>
                                </td>
                                <td>
                                    <?= $data['area'] ?>
                                </td>
                                <td>
                                    <?= $data['lokasi'] ?>
                                </td>
                                <!--<td>
                                    <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#ModalUpdate<?= $no ?>">Update</a>
                                    <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete<?= $no ?>">Hapus</a>
                                </td>-->
                            </tr>

                            <!-- Awal Modal Update-->
                            <div class="modal fade" id="ModalUpdate<?= $no ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                Form Update data
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="aksi_crud.php" method="post">
                                            <input type="hidden" name="id_mob" value="<?= $data['id_mob'] ?>">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">no_plat</label>
                                                    <input type="text" class="form-control" name="tno_plat"
                                                        value="<?= $data['no_plat'] ?>" placeholder="No Plat" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Waktu Masuk</label>
                                                    <input type="text" class="form-control" name="twaktu_masuk"
                                                        value="<?= $data['waktu_masuk'] ?>" placeholder="dd/mm/yyyy" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis Mobil</label>
                                                    <select class="form-select" name="tjenis_mob">
                                                        <option value="<?= $data['jenis_mob'] ?>"><?= $data['jenis_mob'] ?>
                                                        </option>
                                                        <option value="Sedan">Sedan</option>
                                                        <option value="SUV">SUV</option>
                                                        <option value="MPV">MPV</option>
                                                        <option value="Crossover">Crossover</option>
                                                        <option value="Hatchback">Hatchback</option>
                                                        <option value="Convertible">Convertible</option>
                                                        <option value="Off Road">Off Road</option>
                                                        <option value="Pickup">Pickup</option>
                                                        <option value="Elektrik">Elektrik</option>
                                                        <option value="Hybrid">Hybrid</option>
                                                        <option value="LCGC">LCGC</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-select" name="tstatus">
                                                        <option value="<?= $data['status'] ?>"><?= $data['status'] ?>
                                                        </option>
                                                        <option value="Parkir">Parkir</option>
                                                        <option value="Keluar">Keluar</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Area</label>
                                                    <select class="form-select" name="tarea">
                                                        <option value="<?= $data['area'] ?>"><?= $data['area'] ?>
                                                        </option>
                                                        <option value="Lantai 1">Lantai 1</option>
                                                        <option value="Lantai 2">Lantai 2</option>
                                                        <option value="Lantai 3">Lantai 3</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Lokasi</label>
                                                    <select class="form-select" name="tlokasi">
                                                        <option value="<?= $data['lokasi'] ?>"><?= $data['lokasi'] ?>
                                                        </option>
                                                        <option value="Slot 1">Slot 1</option>
                                                        <option value="Slot 2">Slot 2</option>
                                                        <option value="Slot 3">Slot 3</option>
                                                        <option value="Slot 4">Slot 4</option>
                                                        <option value="Slot 5">Slot 5</option>
                                                        <option value="Slot 6">Slot 6</option>
                                                        <option value="Slot 7">Slot 7</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-primary" name="bupdate">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Akhir Modal Update-->

                            <!-- Awal Modal Delete-->
                            <div class="modal fade" id="ModalDelete<?= $no ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                Konfirmasi
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="aksi_crud.php" method="post">
                                            <input type="hidden" name="id_mob" value="<?= $data['id_mob'] ?>">
                                            <div class="modal-body">
                                                <h5 class="text-center">Hapus data ini?
                                                    <br>
                                                    <span class="text-danger">
                                                        <?= $data['no_plat'] ?> -
                                                        <?= $data['jenis_mob'] ?>
                                                    </span>
                                                </h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-outline-primary" name="bdelete">
                                                    Hapus
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Akhir Modal Delete-->
                        <?php endwhile; ?>
                    </table>

                    <!-- Awal Modal Tambah-->
                    <div class="modal fade" id="ModalTambah" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                        Form tambah data
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="aksi_crud.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">No Plat</label>
                                            <input type="text" class="form-control" name="tno_plat"
                                                placeholder="No Plat" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Waktu Masuk</label>
                                            <input type="text" class="form-control" name="twaktu_masuk"
                                                placeholder="yyyy/mm/dd" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Mobil</label>
                                            <select class="form-select" name="tjenis_mob">
                                                <option></option>
                                                <option value="Sedan">Sedan</option>
                                                <option value="SUV">SUV</option>
                                                <option value="MPV">MPV</option>
                                                <option value="Crossover">Crossover</option>
                                                <option value="Hatchback">Hatchback</option>
                                                <option value="Convertible">Convertible</option>
                                                <option value="Off Road">Off Road</option>
                                                <option value="Pickup">Pickup</option>
                                                <option value="Elektrik">Elektrik</option>
                                                <option value="Hybrid">Hybrid</option>
                                                <option value="LCGC">LCGC</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" name="tstatus">
                                                <option></option>
                                                <option value="Parkir">Parkir</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                                    <label class="form-label">Area</label>
                                                    <select class="form-select" name="tarea">
                                                        <option></option>
                                                        <option value="Lantai 1">Lantai 1</option>
                                                        <option value="Lantai 2">Lantai 2</option>
                                                        <option value="Lantai 3">Lantai 3</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Lokasi</label>
                                                    <select class="form-select" name="tlokasi">
                                                        <option></option>
                                                        <option value="Slot 1">Slot 1</option>
                                                        <option value="Slot 2">Slot 2</option>
                                                        <option value="Slot 3">Slot 3</option>
                                                        <option value="Slot 4">Slot 4</option>
                                                        <option value="Slot 5">Slot 5</option>
                                                        <option value="Slot 6">Slot 6</option>
                                                        <option value="Slot 7">Slot 7</option>
                                                    </select>
                                                </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                            Keluar
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="bsimpan">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Akhir Modal Tambah-->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>