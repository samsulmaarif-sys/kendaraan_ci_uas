

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penjualan Kendaraan
        <small>Tabel Penjualan kendaraan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Kendaraan</a></li>
        <li class="active">Penjualan kendaraaan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Penjualan</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="table-datatables" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>No</th>
                  <th>Nama barang</th>
                  <th>Jumlah penjualan</th>
                  <th>Harga/unit</th>
                  <th>Tanggal Penjualan</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No. Ktp</th>
                  <th>Pekerjaan</th>
                  <th>Status</th>
                  <th>Diskon</th>
                </tr>
                </thead>
                
                <tbody>
                  <?php
                  if(isset($diskon_pembayaran)){
                      $no=null;
                      foreach($diskon_pembayaran as $row){
                      $no++;                     
                                echo'<tr>
                                <td>'.$no.'</td>
                                <td>'.$row['kd_kendaraan'].'</td>
                                <td>'.$row['jml_penjualan'].'</td>
                                <td>'.$row['harga_jual'].'</td>
                                <td>'.$row['tanggal_jual'].'</td>
                                <td>'.$row['nama_pembeli'].'</td>
                                <td>'.$row['alamat'].'</td>
                                <td>'.$row['no_ktp'].'</td>
                                <td>'.$row['pekerjaan'].'</td>
                                <td>'.$row['status'].'</td>
                                <td>'.$row['diskon'].'</td>
                                </tr>';           
                                }
                            }           
                            ?>
                </tbody>
                
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama barang</th>
                  <th>Jumlah penjualan</th>
                  <th>Harga/unit</th>
                  <th>Tanggal Penjualan</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No. Ktp</th>
                  <th>Pekerjaan</th>
                  <th>Status</th>
                  <th>Diskon</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  

