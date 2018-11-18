 <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Laporan Hasil Test</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="l1" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
											<th>No Peserta</th>
                                            <th>Nama</th>
                                            
											<th>Bidang</th>
											<th>Nilai</th>
                                            
                                            
											

                                            </tr>
                                        </thead>
                                        
											<?php
												$a=1;
												foreach ($tampil->result_array() as $key) {
                                                // $nilai=int($tampil['nilai']);
											?>
											<tr>
											<td><?php echo $a; ?></td>
                                            <td><?php echo $key["id_register"];?></td>
											<td><?php echo $key["nama"];?></td>
                                           
											<td><?php echo $key["nama_bidang"];?></td>	
											<td><?php echo (int)$key["nilai"];?></td>
                                            
											
											</tr>
										<?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                            <div class="col-md-6">
  <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="mygraph" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
