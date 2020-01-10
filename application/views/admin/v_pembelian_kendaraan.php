

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pembelian Kendaraan
        <small>Tabel pembelian kendaraan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Kendaraan</a></li>
        <li class="active">Pembelian kendaraaan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-7">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Pembelian</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">


              <!-- id tabel untuk export file -->
              <table id="table-datatables" class="table table-bordered table-striped">
                <!-- id tabel untuk export file -->

                
                <thead>

                <tr>
                  <th>No</th>
                  <th>Nama motor</th>
                  <th>Harga</th>
                  <th>jumlah pembelian</th>
                  <th>Tanggal pembelian</th>
                  <!-- <th></th> -->
                </tr>
                </thead>
                
                <tbody>
                  <?php $i=1; foreach($pembelian as $pmb) {?>
                <tr>
                  <td><?php echo $i?></td>
                  <td><?php echo $pmb->nama_kendaraan?></td>
                  <td>Rp.<?php echo $pmb->harga?></td>
                  <td><?php echo $pmb->jml_pembelian?></td>
                  <td><?php echo $pmb->tanggal_beli?></td>
                </tr>
                <?php $i++; } ?>
                </tbody>
                
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama motor</th>
                  <th>Harga</th>
                  <th>Tanggal pembelian</th>
                  <th>jumlah pembelian</th>
                  <!-- <th></th> -->
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  

