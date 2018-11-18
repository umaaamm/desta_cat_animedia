
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seleksi Animedia | Pendaftaran</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>asset/plugins/timepicker/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->

   <!-- <div class="col-md-12"> -->
<?php 

echo $this->session->flashdata('notif_l');
?>
<!-- </div> -->
    <div class="login-box-body">
        <p class="login-box-msg">Register a new membership</p>
      
        <form action="<?php echo base_url()?>SimpanPeserta" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="nama" onkeypress="return huruf(event)" placeholder="Nama" required oninvalid="this.setCustomValidity('Nama Tidak Boleh Kosong dan Harus Huruf')" oninput="setCustomValidity('')">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
              <!-- <div class="form-group has-feedback">
                <input type="text" class="form-control" name="jurusan" onkeypress="return huruf(event)" placeholder="Jurusan" required oninvalid="this.setCustomValidity('Jurusan Tidak Boleh Kosong dan Harus Huruf')" oninput="setCustomValidity('')">
                <span class="glyphicon glyphicon-circle-arrow-right form-control-feedback"></span>
            </div> -->

                                      <div class="form-group">
                                          
                                            <select class="form-control"  name="jurusan">
                                                    <option value="-"> - Pilih Jurusan - </option>
                                                    <option value="Sastra Inggris">Sastra Inggris</option>
                                                    <option value="S1 Informatika">S1 Informatika</option>
                                                    <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
                                                    <option value="Akuntansi">Akuntansi</option>
                                                    <option value="Manajemen">Manajemen</option>
                                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                                    <option value="D3 Sistem Informasi">D3 Sistem Informasi</option>
                                                    <option value="S1 Teknologi Informasi">S1 Teknologi Informasi</option>
                                                    <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                                                    <option value="S1 Teknik Elektro">S1 Teknik Elektro</option>
                                                    <option value="S1 Teknik Kompute">S1 Teknik Kompute</option>
                                                    <option value="D3 Sistem Informasi Akuntans">D3 Sistem Informasi Akuntans</option>
                                                    <option value="D3 Teknik Komputer">D3 Teknik Komputer</option>
                                                    <option value="S1 Pendidikan Olahraga">S1 Pendidikan Olahraga</option>
                                                    <option value="S1 Pendidikan Bahasa Inggris">S1 Pendidikan Bahasa Inggris</option>
                                                    <option value="D3 Teknik Komputer">D3 Teknik Komputer</option>
                                            </select>
                                        </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" id="npm" onkeypress="return Angkasaja(event)" name="npm" placeholder="Npm" required oninvalid="this.setCustomValidity('NPM Tidak Boleh Kosong dan Harus Angka')" oninput="setCustomValidity('')">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <span id="pesan"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Username" required oninvalid="this.setCustomValidity('Username Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Password Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
              <div class="form-group has-feedback">
                <input type="Email" class="form-control" id="email" name="email" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span id="pesan_e"></span>
            </div>
            
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                          <!-- <a href="<?php echo base_url()?>LoginPeserta">Sudah Memiliki Akun, Klik disini.</a> -->
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Register</button>

                </div>
                <!-- /.col -->
            </div>
        </form>
        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>asset/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>asset/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>asset/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>asset/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>asset/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>asset/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>asset/dist/js/demo.js"></script>

<script src="<?php echo base_url();?>asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>asset/bower_components/Chart.js/Chart.js"></script>
<script src="<?php echo base_url();?>asset/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>asset/bower_components/ckeditor/ckeditor.js"></script>
<script src="https://www.w3schools.com/js/myScript1.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<script type="text/javascript">
function Angkasaja(evt) {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
function huruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}

$(document).ready(function(){
  $('#npm').blur(function(){
    $('#pesan').html('<img style="margin-left:10px; width:10px" src="<?php echo base_url()?>img/magic-dots.gif">');
    var npm = $(this).val();

    $.ajax({
      type  : 'POST',
      url   : '<?php echo base_url()?>ControllerPeserta/cari',
      data  : 'npm='+npm,
      success : function(data){
        $('#pesan').html(data);
      }
    })

  });
});


$(document).ready(function(){
  $('#email').blur(function(){
    $('#pesan_e').html('<img style="margin-left:10px; width:10px" src="<?php echo base_url()?>img/magic-dots.gif">');
    var email = $(this).val();

    $.ajax({
      type  : 'POST',
      url   : '<?php echo base_url()?>ControllerPeserta/cari_email',
      data  : 'email='+email,
      success : function(data){
        $('#pesan_e').html(data);
      }
    })

  });
});
</script>

</body>
</html>
