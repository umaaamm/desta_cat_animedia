<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
?>
</div>
						<div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Kelola Data Bidang</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url()?>SimpanBidang" method="post">
                                   
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Nama Bidang</label>
                                            <input type="text" class="form-control" onkeypress="return huruf(event)" name="nama_bidang" placeholder="Nama" required oninvalid="this.setCustomValidity('Nama Bidang Tidak Boleh Kosong dan Harus Huruf')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                            

 <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Bidang</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="<?php echo base_url()?>ControllerBidang/edit" method="post">
                                   
                                    <div class="box-body">
                                        <input type="hidden" class="form-control" name="id" id="id" >

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama_bidang" placeholder="Nama Bidang" id="nm">
                                        </div>
                                       
                                        

                                         
                                    
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                </div>
            </div>
        </div>                           
                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-8">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Data Bidang</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="Admin" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
											
                                            <th>Nama</th>
                                            
											
                                            
											<th>Action</th>

                                            </tr>
                                        </thead>
                                        
											<?php
												$a=1;
												foreach ($tampil->result_array() as $key) {
											?>
											<tr>
											<td><?php echo $a; ?></td>
											<td><?php echo $key["nama_bidang"];?></td>
                                          
                                            
											<td><button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_bidang"]; ?>')">Hapus</button>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mymodal" onclick="edit('<?php echo $key["id_bidang"]; ?>','<?php echo $key["nama_bidang"]; ?>')">Edit</button> 
											</tr>
										<?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           
                       <!--  </div>/.col (right)  -->
                    

<script type="text/javascript">
function hapus($id){
	var	conf=window.confirm('Data Akan Dihapus ?');
	if (conf) {
		document.location='<?php echo base_url(); ?>ControllerBidang/hapus/'+$id;
	}
}

function edit(id,nama){
	
    $('#id').val(id);
	$('#nm').val(nama);
   
   
}



</script>

