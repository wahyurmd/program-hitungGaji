<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>John Travolta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="d-flex justify-content-center p-3">
        <div class="card text-white bg-primary mb-3" style="width: 90rem;">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a href="index.php" class="btn btn-danger" id="caseSatu">
                        Case 1 John Travolta
                    </a>
                    <a href="case_bebas.php" class="btn btn-warning" id="caseDua">
                        Case 2 Bebas
                    </a>
                </div>
            </nav>
            <div class="card-body" id="satu">
                <h3>Case John Travolta</h3>
                <div class="d-flex justify-content-center p-3">
                    <form method="POST">
                        <table>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td><input type="text" name="nama" class="form-control" value="Jhon Travolta" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Upah Perjam</td>
                                <td><input type="text" name="upah_perjam" class="form-control" value="15000" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Total Jam Kerja</td>
                                <td><input type="text" name="total_jam_kerja" class="form-control" value="52" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Pengeluaran</td>
                                <td><input type="text" name="pengeluaran" class="form-control" value="600000" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <hr>
                <?php 
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $upah_perjam = $_POST['upah_perjam'];
                    $total_jam_kerja = $_POST['total_jam_kerja'];
                    $pengeluaran = $_POST['pengeluaran'];
                    
                    //Perhitungan
                    $total_jam_normal = 40;
                    
                    if ($total_jam_kerja >= $total_jam_normal) {
                        $total_upah_pokok = $total_jam_normal * $upah_perjam;
                        $total_jam_lembur = $total_jam_kerja - $total_jam_normal;
                        $upah_lembur_perjam = $upah_perjam * 1.5;
                        $total_upah_lembur = $total_jam_lembur * $upah_lembur_perjam;
                        $total_upah_full = $total_upah_pokok + $total_upah_lembur;
                    } else {
                        $total_upah_pokok = $total_jam_kerja * $upah_perjam;
                        $total_jam_lembur = 0;
                        $total_upah_lembur = $total_jam_lembur;
                        $total_upah_full = $total_upah_pokok + $total_upah_lembur;
                    }
                    
                    if ($total_upah_full > $pengeluaran) {
                        $status = "Bisa Menabung";
                        $nabung = $total_upah_full - $pengeluaran;
                    } elseif ($total_upah_full == $pengeluaran) {
                        $status = "Tidak Bisa Menabung";
                        $nabung = $total_upah_full - $pengeluaran;
                    } elseif ($total_upah_full < $pengeluaran) {
                        $status = "Cari Tambahan";
                        $nabung = 0;
                    }
                    
                    echo "<h4 class='pt-3'> Nama Lengkap : $nama </h4>";
                    echo"
                        <table class='table table-striped text-white' border='1' cellpadding='4'>
                            <thead>
                                <tr>
                                    <td align='center'>Upah/Jam</td>
                                    <td align='center'>Total Jam Kerja</td>
                                    <td align='center'>Total Jam Lembur</td>
                                    <td align='center'>Total Upah Pokok</td>
                                    <td align='center'>Total Upah Lembur</td>
                                    <td align='center'>Total Upah Full</td>
                                    <td align='center'>Pengeluaran</td>
                                    <td align='center'>Status</td>
                                    <td align='center'>Besar Tabungan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class='text-white'>
                                    <td align='center'>Rp "; echo number_format($upah_perjam, 2, ',', '.'); echo"</td>
                                    <td align='center'>$total_jam_kerja</td>
                                    <td align='center'>$total_jam_lembur</td>
                                    <td align='center'>Rp "; echo number_format($total_upah_pokok, 2, ',', '.'); echo"</td>
                                    <td align='center'>Rp "; echo number_format($total_upah_lembur, 2, ',', '.'); echo"</td>
                                    <td align='center'>Rp "; echo number_format($total_upah_full, 2, ',', '.'); echo"</td>
                                    <td align='center'>Rp "; echo number_format($pengeluaran, 2, ',', '.'); echo"</td>
                                    <td align='center'>$status</td>
                                    <td align='center'>Rp "; echo number_format($nabung, 2, ',', '.'); echo"</td>
                                </tr>
                            </tbody>
                        </table>    
                    ";
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>