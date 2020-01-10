

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Stock kendaraan
        <small>Tabel Stock kendaraan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data kendaraan</a></li>
        <li class="active">Stock kendaraan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-8">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <a class="glyphicon glyphicon-list-alt"></a> Data stock kendararan</h3>
            </div>
            <div class="col-xs-12" style="margin-bottom: 5px;">
             <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">
                Tambah
              </button>
              </div>
              <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><a class="fa fa-cart-plus"></a> Pembelian unit kendaraan</h4>
              </div>
              <div class="modal-body">
                 
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="<?php echo base_url('admin/pembelian/simpan')?>">
              <div class="box-body">
                <div class="form-group">
                <label><a class="fa fa-key"></a>Kode kendaraan</label>
                <select class="form-control select2" name="kd_kendaraan" style="width: 100%;">
                  <option>HD001</option>
                  <option>HD002</option>
                  <option>HD003</option>
                  <option>HD004</option>
                  <option>HD005</option>
                  <option>HD006</option>
                  <option>HD007</option>
                  <option>HD008</option>
                  <option>HD009</option>
                  <option>HD010</option>
                  <option>HD011</option>
                  <option>HD012</option>
                  <option>HD013</option>
                  <option>HD014</option>
                  <option>HD015</option>
                  <option>HD016</option>
                  <option>HD017</option>
                  <option>HD018</option>
                  <option>HD019</option>
                  <option>HD020</option>
                  <option>HD021</option>
                  <option>HD022</option>
                  <option>HD023</option>
                  <option>HD024</option>
                  <option>HD025</option>
                  <option>HD026</option>
                  <option>HD027</option>
                  <option>HD028</option>
                  <option>HD029</option>
                  <option>HD030</option>
                  <option>HD031</option>
                  <option>HD032</option>
                  <option>HD033</option>
                  <option>HD034</option>
                  <option>HD035</option>
                  <option>HD036</option>
                  <option>HD037</option>
                  <option>HD038</option>
                  <option>HD039</option>
                  <option>HD040</option>
                  <option>HD041</option>
                  <option>HD042</option>
                  <option>HD043</option>
                  <option>HD044</option>
                  <option>HD045</option>
                  <option>HD046</option>
                  <option>HD047</option>
                  <option>HD048</option>
                  <option>HD049</option>

                </select>
              </div>
                <div class="form-group">
                  <label for="unit"><a class="fa fa-gift"></a>Jml Pembelian</label>
                  <input type="text" class="form-control" name="jml" id="unit" placeholder="unit" required="jml">
                </div>
                <!-- Date -->
              <div class="form-group">
                <label><a class="fa fa-calendar"></a> Date Pembelian</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" name="tanggal" id="datepicker" required="tanggal">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              </div>
              <!-- /.box-body -->

              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary btn-block" name="simpan">Submit</button>
              </div>
            </form>
          </div>
        </div>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        <!-- /.modal -->
            <!-- /.box-header -->

            <div class="box-body">
              <table id="table-datatables" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th><a class="glyphicon glyphicon-lock"></a>No</th>
                  <th><a class="glyphicon glyphicon-lock"></a>Kode</th>
                  <th><a class="glyphicon glyphicon-lock"></a>Nama motor</th>
                  <th><a class="glyphicon glyphicon-lock"></a>Harga/unit</th>
                  <th><a class="glyphicon glyphicon-pencil"></a>Stok motor</th>
                  <th><a class="glyphicon glyphicon-lock"></a>Pembelian terakhir</th>
                  <th><a class="glyphicon glyphicon-lock"></a>Penjualan terakhir</th>
                </tr>
                </thead>
                
                <tbody>
                  <?php $i=1; foreach($barang as $brg) {?>
                    <tr>
                      <td><?php echo $i?></td>
                      <td><?php echo $brg->kd_kendaraan?></td>
                      <td><?php echo $brg->nama_kendaraan?></td>
                      <td>Rp.<?php echo $brg->harga?></td>
                      <td><?php echo $brg->stok?></td>
                      <td><?php echo $brg->tanggal_beli?></td>
                      <td><?php echo $brg->tanggal_jual?></td>
                  </tr>
                <?php $i++; } ?>
                </tbody>                
                <tfoot>
                <tr>
                  <th><a class="glyphicon glyphicon-lock"></a>No</th>
                  <th><a class="glyphicon glyphicon-lock"></a>Kode</th>
                  <th><a class="glyphicon glyphicon-lock"></a>Nama motor</th>
                  <th><a class="glyphicon glyphicon-lock"></a>Harga/unit</th>
                  <th><a class="glyphicon glyphicon-pencil"></a>Stok motor</th>
                  <th><a class="glyphicon glyphicon-lock"></a>Pembelian terakhir</th>
                  <th><a class="glyphicon glyphicon-lock"></a>Penjualan terakhir</th>
                </tr>
                </tfoot>
              </table>

            </div>
            <!-- /.box-body -->
            <!-- left column -->
        
          <!-- /.box -->

        </div>
        <!-- /.col -->

      </div>




          <div class="col-xs-4">
          <div class="box box-danger">
            <div class="box-header with-border">
              <a class="fa fa-shopping-cart"></a>
              <h3 class="box-title"> Form penjualan kendaraan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="<?php echo base_url('admin/penjualan/simpan')?>">
              <div class="box-body">
                <div class="form-group">
                <label>Kode Kendaraan</label>
                <select class="form-control select2" name="kd_kendaraan" style="width: 100%;">
                  <option>HD001</option>
                  <option>HD002</option>
                  <option>HD003</option>
                  <option>HD004</option>
                  <option>HD005</option>
                  <option>HD006</option>
                  <option>HD007</option>
                  <option>HD008</option>
                  <option>HD009</option>
                  <option>HD010</option>
                  <option>HD011</option>
                  <option>HD012</option>
                  <option>HD013</option>
                  <option>HD014</option>
                  <option>HD015</option>
                  <option>HD016</option>
                  <option>HD017</option>
                  <option>HD018</option>
                  <option>HD019</option>
                  <option>HD020</option>
                  <option>HD021</option>
                  <option>HD022</option>
                  <option>HD023</option>
                  <option>HD024</option>
                  <option>HD025</option>
                  <option>HD026</option>
                  <option>HD027</option>
                  <option>HD028</option>
                  <option>HD029</option>
                  <option>HD030</option>
                  <option>HD031</option>
                  <option>HD032</option>
                  <option>HD033</option>
                  <option>HD034</option>
                  <option>HD035</option>
                  <option>HD036</option>
                  <option>HD037</option>
                  <option>HD038</option>
                  <option>HD039</option>
                  <option>HD040</option>
                  <option>HD041</option>
                  <option>HD042</option>
                  <option>HD043</option>
                  <option>HD044</option>
                  <option>HD045</option>
                  <option>HD046</option>
                  <option>HD047</option>
                  <option>HD048</option>
                  <option>HD049</option>
                </select>
              </div>
                <div class="form-group">
                  <label for="unit">Jumlah Pembelian</label>
                  <input type="text" class="form-control" name="jml" id="unit" placeholder="Masukkan unit" required="jml">
                </div>
                <div class="form-group">
                  <label for="unit">Harga Rp.</label>
                  <input type="int" class="form-control" name="harga" id="unit" placeholder="Masukkan harga" required="masukkan harga">
                </div>
                <div class="form-group">
                  <label for="unit">Nama</label>
                  <input type="text" class="form-control" name="nama" id="unit" placeholder="Masukkan Nama" required="unit">
                </div>
                <div class="form-group">
                  <label for="unit">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="unit" placeholder="Masukkan Alamat" required="alamat">
                </div>
                <div class="form-group">
                  <label for="unit">No. ktp</label>
                  <input type="int" class="form-control" name="no_ktp" id="unit" placeholder="Masukkan No.Ktp" required="no_ktp">
                </div>
                <div class="form-group">
                  <label for="unit">Pekerjaan</label>
                  <select class="form-control select2" name="pekerjaan" style="width: 100%;" required="pekerjaan">
                    <option>Karyawan Swasta</option>
                    <option>Karyawan Negeri</option>
                    <option>Wiraswasta</option>
                    <option>Pelajar</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="unit">Status</label>
                  <select class="form-control select2" name="status" style="width: 100%;" required="pekerjaan">
                    <option>Lajang</option>
                    <option>Sudah menikah</option>
                    </select>
                </div>

                <!-- Date -->
              <div class="form-group">
                <label>Date Pembelian:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" name="tanggal_jual" id="datepicker" required="date">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-warning btn-block" name="simpan">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>

    </section>
    <!-- /.content -->
  </div>


