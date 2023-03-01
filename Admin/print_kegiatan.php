<?php 
    include "../koneksi.php";
?>

<html>
    <head>
        <title>Report Periode</title>
        <!-- bootstrap cdn  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>

    <body>
        <div class="container mt-4">
            <!-- form filter data berdasarkan range tanggal  -->
            <form action="print_kegiatan.php" method="get">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label">Periode</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="dari_tgl" required>
                    </div>
                    <div class="col-auto">
                        -
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="ke_tgl" required>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit">Cari</button> &nbsp;
                        <!-- <button class="btn btn-primary" value="Refresh" onClick="document.location.reload(true)">Refresh</button> -->

                    </div>
                </div>
            </form>

            <button class="btn btn-primary" onclick="window.print()">Print</button>
            <br><br>

            <br>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-white" align="center" style="background: royalblue;">
                            <!-- <tr> -->
                                <th>No</th>
                                <th>ID Ruangan</th>
                                <th>Nama Ruangan</th>
                                <th>Kegiatan</th>
                                <th>Penanggung Jawab</th>
                                <th>Tanggal kegiatan</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Kapasitas</th>
                                <th>Jenis</th>
                            </tr>
                        </thead>
                        <?php 
                        function formatTanggal($date){
                        // ubah string menjadi format tanggal
                        return date('d-m-Y', strtotime($date));
                        }

                        $no="";
                        

                            
                            //jika tanggal dari dan tanggal ke ada maka
                            if(isset($_GET['dari_tgl']) && isset($_GET['ke_tgl'])){
                                $dari_tgl = $_GET['dari_tgl'];
                                $ke_tgl = $_GET['ke_tgl'];
                            
                                // tampilkan data yang sesuai dengan range tanggal yang dicari 
                                $dataQuery = mysqli_query($conn, 
                                    "SELECT * FROM tb_kegiatan 
                                    WHERE tgl BETWEEN '".$_GET['dari_tgl']."' and '".$_GET['ke_tgl']."'");
                            }else{
                                //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
                                $dataQuery = mysqli_query($conn, "SELECT * FROM tb_kegiatan");		
                            }

                            //max ruangan
                            if(empty($dari_tgl) && empty($ke_tgl)){
                                $dataMax = mysqli_query($conn, "SELECT nama_ruangan, COUNT(nama_ruangan) as jumlah 
                                FROM tb_kegiatan 
                                GROUP BY nama_ruangan 
                                ORDER BY jumlah DESC");
                            } else {
                                $dataMax = mysqli_query($conn, "SELECT nama_ruangan, COUNT(nama_ruangan) as jumlah 
                                FROM tb_kegiatan
                                WHERE tgl
                                BETWEEN '$dari_tgl' and '$ke_tgl' 
                                GROUP BY nama_ruangan 
                                ORDER BY jumlah DESC"); 
                            }
                            $result = mysqli_fetch_array($dataMax);

                            
                            // while digunakan sebagai perulangan data 
                            while($data = mysqli_fetch_array($dataQuery)){
                            $no++;
                        ?>

                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['id_ruangan']; ?></td>
                            <td><?php echo $data['nama_ruangan']; ?></td>
                            <td><?php echo $data['kegiatan']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo formatTanggal($data['tgl']); ?></td>
                            <td><?php echo $data['wtk_mulai']; ?></td>
                            <td><?php echo $data['wtk_selesai']; ?></td>
                            <td><?php echo $data['kapasitas']; ?> Orang</td>
                            <td><?php echo $data['jenis']; ?></td>

                            
                        </tr>
                        <?php }
                        ?>

                    </table> <br>
                    Gedung/ruangan yang sering dipakai adalah <?php echo $result['nama_ruangan']; ?>, dengan jumlah <?php echo $result['jumlah']; ?> Pengajuan.
                </div>
            </div>
        </div>
    </body>
    
    </html>