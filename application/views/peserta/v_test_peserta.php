<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
// print_r(array_chunk($tampil_bidangs,1));die;
  // print_r($tampil_cek_num);die;

?>
</div>
						<div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Pilih Bidang Test</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url()?>SimpanTestPeserta" method="post">
                                   
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="hidden" name="id_register" value="<?php echo $_SESSION['id_register']?>">
                                            <input type="text" class="form-control" value="<?php echo $_SESSION['nama']?>"  name="nama_peserta" placeholder="Nama" required readonly>
                                        </div>
                                    
                                          <div class="form-group">
                                            <label>Nama Bidang *Untuk Sesi 1 Pilih Bidang UMUM</label>
                                            <select class="form-control" name="id_bidang">
                                                <option value="-">-- Nama Bidang --</option>
                                            
                                                <?php

                                                if ($tampil_cek_num <= 0) {
                                                   $num_c=count($bidang_chunk);

                                                    for ($i=0; $i < $num_c ; $i++) {  ?>
                                                        
                                                            
                                                            <option value="<?php echo $bidang_chunk[$i]['id_bidang'];?>"><?php echo $bidang_chunk[$i]['nama_bidang'];?></option>
                                            
                                                <?php } } elseif ($tampil_cek_num > 0 ) {
                                                    $num=count($bidang_cut);
                                                    for ($i=0; $i < $num ; $i++) {  ?>
                                                            echo $a[$i]['nama_bidang'];
                                                            // array_push($data, array('id_bidang ' => $a[$i]['id_bidang'],'nama_bidang' => $a[$i]['nama_bidang']));
                                                            <option value="<?php echo $bidang_cut[$i]['id_bidang'];?>"><?php echo $bidang_cut[$i]['nama_bidang'];?></option>
                                                <?php }  }?> 
                                                 

                                            </select>
                                        </div> 
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                            

 
                        <!-- right column -->
                       
                       <!--  </div>/.col (right)  -->
                    

<script type="text/javascript">
function hapus($id){
	var	conf=window.confirm('Data Akan Dihapus ?');
	if (conf) {
		document.location='<?php echo base_url(); ?>ControllerAdmin/hapus/'+$id;
	}
}

function edit(id,nama,username,password){
	
    $('#id').val(id);
	$('#nm').val(nama);
   
	$('#us').val(username);
	$('#pw').val(password);
   
}



</script>

