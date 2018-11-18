 <div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
?>
</div>
 <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Data Peserta Test</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="l1" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                            <th>No</th>
											<th>No Peserta</th>
                                            <th>Nama</th>
                                            <th>NPM</th>
											<th>Jurusan</th>
                                            <th>Username</th>
                                            <th>Password</th>
											<th>Email</th>
                                            <th>Keterangan</th>
                                            
											

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
                                           <td><?php echo $key["npm"];?></td>
											<td><?php echo $key["jurusan"];?></td>	
                                            <td><?php echo $key["username"];?></td>
                                            <td><?php echo $key["password"];?></td>
											<td><?php echo $key["email"];?></td>
                                            <!-- <td><?php echo $key["status_peserta"];?></td> -->
                                            <?php if ($key['status_peserta'] == '0') { ?>
                                            <td><button class="btn btn-success btn-sm" onclick="verif('<?php echo $key["id_register"]; ?>')">Verifikasi</button> <button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_register"]; ?>')">Tidak Verifikasi</button></td>
                                             <?php }elseif ($key['status_peserta'] == '1') { ?>
                                                    <td><small class="label bg-primary">Terverifikasi</small></td>
                                             <?php } ?>
                                            
											
											</tr>
										<?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           <script type="text/javascript">
function verif($id){
    // var conf=window.confirm('Data Akan Dihapus ?');
    // if (conf) {
        document.location='<?php echo base_url(); ?>ControllerSeleksi/verif_p/'+$id;
    // }
}
</script>