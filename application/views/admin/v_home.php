<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php foreach($total_pembelian as $a) ?>
              <h3><?php echo $a->total?></h3>

              <p>Pembelian Kendaraan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('admin/pembelian')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php foreach($total_barang as $a) ?>
              <h3><?php echo $a->total?></h3>
              <p>Stok Kendaraan</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="<?php echo base_url('admin/stok')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php foreach($total_penjualan as $a) ?>
              <h3><?php echo $a->total?></h3>
              <p>Penjualan Kendaraan</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-cart"></i>
            </div>
            <a href="<?php echo base_url('admin/penjualan')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Transaksi Pembelian/Hari</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="table-datatables" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>No</th>
                  <th>Tanggal Pembelian</th>
                  <th>Total Pembelian</th>
                </tr>
                </thead>                
                <tbody>
                  <?php
                  if(isset($transaksi_pembelian)){
                      $no=null;
                      foreach($transaksi_pembelian as $row){
                      $no++;                     
                                echo'<tr>
                                <td>'.$no.'</td>
                                <td>'.$row['tanggal_pembelian'].'</td>
                                <td>'.$row['total_pembelian'].'</td>
                                </tr>';           
                                }
                            }           
                            ?>
                 </tbody>           
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Tanggal Pembelian</th>
                  <th>Total Pembelian</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
       <div class="col-xs-6">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Transaksi Penjualan/Hari</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>No</th>
                  <th>Tanggal Penjualan</th>
                  <th>Total Penjualan</th>
                </tr>
                </thead>                
                <tbody>
                  <?php
                  if(isset($transaksi_penjualan)){
                      $no=null;
                      foreach($transaksi_penjualan as $row){
                      $no++;                     
                                echo'<tr>
                                <td>'.$no.'</td>
                                <td>'.$row['tanggal_penjualan'].'</td>
                                <td>'.$row['total_penjualan'].'</td>
                                </tr>';           
                                }
                            }           
                            ?>
                 </tbody>           
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Tanggal Penjualan</th>
                  <th>Total Penjualan</th>
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
  </div>


