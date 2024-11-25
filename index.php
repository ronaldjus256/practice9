<?php
include "koneksi.php";
$qkelas = "SELECT * FROM kelas";
$data_kelas = $conn->query($qkelas);
$qmahasiswa = "SELECT * FROM mahasiswa";
$data_mahasiswa = $conn->query($qmahasiswa);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Form Mahasiswa</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Form Mahasiswa</h2>
        </div>

        <div class="row">
            <!-- Data Mahasiswa -->
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Data Mahasiswa</span>
                    <span class="badge badge-secondary badge-pill"><?php echo $data_mahasiswa->num_rows; ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php foreach ($data_mahasiswa as $index => $value): ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo htmlspecialchars($value['nama_lengkap']); ?></h6>
                                <small class="text-muted"><?php echo htmlspecialchars($value['alamat']); ?></small>
                            </div>
                            <span class="text-muted"><?php echo htmlspecialchars($value['kelas_id']); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Form Input -->
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Input Data</h4>
                <form action="simpan_mahasiswa.php" method="POST">
                    <div class="mb-3">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas">Kelas</label>
                        <select class="form-select d-block w-100" id="kelas" name="kelas_id" required>
                            <option value="">Pilih...</option>
                            <?php foreach ($data_kelas as $index => $value): ?>
                                <option value="<?php echo htmlspecialchars($value['kelas_id']); ?>">
                                    <?php echo htmlspecialchars($value['nama']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan Data</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; <?php echo date("Y"); ?> Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
