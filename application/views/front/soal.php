<div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
</div>


    <!-- /.col -->
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <i class="fa fa-hdd-o fa-fw"></i>
                <h3 class="box-title">Pengerjaan Soal</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-sm-10">
                    <table class="table table-striped">
                        <tr>
                            <td>Nama Peserta</td>
                            <td>:</td>
                            <td><span id="mata-ujian"><?php echo $_SESSION['nama']?></td>
                        </tr>
                        <tr>
                            <td>Nama Bidang</td>
                            <td>:</td>
                            <td><span id="nama-kategori"></span><?php echo $tampil_id['0']['nama_bidang']?></td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="2"><span id="text-soal"></span></td>
                        </tr>
                        <tr>
                            <td width="60"><input class="jawaban" type="radio" name="jawaban" value="A"> A.</td>
                            <td id="soal_a"></td>
                        </tr>
                        <tr>
                            <td><input type="radio" class="jawaban" name="jawaban" value="B"> B.</td>
                            <td id="soal_b"></td>
                        </tr>
                        <tr>
                            <td><input type="radio" class="jawaban" name="jawaban" value="C"> C.</td>
                            <td id="soal_c"></td>
                        </tr>
                        <tr>
                            <td><input type="radio" class="jawaban" name="jawaban" value="D"> D.</td>
                            <td id="soal_d"></td>
                        </tr>
                       <!--  <tr>
                            <td><input type="radio" class="jawaban" name="jawaban" value="E"> E.</td>
                            <td id="soal_e"></td>
                        </tr> -->
                    </table>
                    <div class="row">
                        <div class="col-sm-2">
                            <ul class="pagination">
                                <li><a href="#" id="prev">Prev</a></li>
                                <li><a href="#" id="next">Next</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-8">
                            <ul class="pagination">
                                <?php
                                echo "<tr alin='center'>";
                                $x = 0;
                                // tambahan ardi
                                //echo "<pre>";
                                //print_r($jumlah_jawab_soal);
                                $jawab_soal = array();
                                $i = 1;

                                //print_r($jawab_soal);
                                for ($j = 1; $j < $jumlahSoal + 1; $j++) {
                                    /*
                                    //echo "<pre><br><br><br><br><h1>";
                                    if ($j == $jawab_soal[1][$j]) {
                                        if ($jawab_soal[2][$j] == "") {
                                            $state = "alert-danger";
                                        } else {
                                            $state = "alert-success";
                                        }
                                    }
                                    //echo $j."-".$jawab_soal[1][$j]."<br>";
                                    */

                                    $state = "";
                                    echo "<li> <a href='#' class='paging " . $state . "'>" . $j . "</a></li>";
                                    // finish tambahan ardi
                                    $x++;
                                }

                                ?>
                            </ul>
                        </div>
                        <div class="col-sm-1">
                            <ul class="pagination">
                                <li>
                                    <a href="#" id="btn-submit">Submit</a>
                                </li>
                                <li>
                                    <a href="<?= base_url(); ?>Soal/nilaiakhir?id_bidang=<?=@$tampil_id_b; ?>&id_register=<?=$_SESSION['id_register']?>">Submit All</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="alert alert-warning ctr">
                        Waktu mengerjakan tinggal : </br>
                        <div id="clock" style="display: inline; font-size: 30.5px; font-weight: bold"></div>
                    </div>
                </div>
            </div>
        </div>

    <!-- /.box-body -->
</div>
<!-- /.box -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<?php
$kodeSesi=$tampil_id_b;
?>
<script>

    // var kodeSoal = "1";
    var nomor = 1;
    var id_bidang = <?php echo $tampil_id_b; ?>;
    var kodeSesi=<?php echo $tampil_id_b; ?>;

    $(document).ready(function () {
        getSoal(nomor);

        countdown();

         tagSoal();
    });

    $("#prev").click(function () {
        nomor = parseInt(nomor) - 2;
        nextSoal();
    });

    $("#next").click(function () {
        nomor = parseInt(nomor);
        nextSoal();
    });

    $("#btn-submit").click(function(){
        $('input[name="jawaban"]:checked').each(function() {
            simpanJawaban($(this).val());
        });
    });

   

    $("input[name='jawaban']").change(function () {
        // Do something interesting here
        //alert($(this).val());
    });

    $(".paging").click(function () {
        nomor = parseInt($(this).text());
        getSoal(nomor);
    });

    function countdown() {
        // Set the date we're counting down to

// Update the count down every 1 second 360
        
// var distance = 3600000;
var distance = <?=(empty($_SESSION['waktu'])) ? $waktuPengerjaan *
            60 * 1000 : $_SESSION['waktu'];?>;
        var x = setInterval(function () {
            // Get todays date and time
            //var now = new Date().getTime();

            // Find the distance between now an the count down date


            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("clock").innerHTML = minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
            distance -= 1000;

            $.getJSON("Soal/setCountdown",
                {
                    waktu: distance
                },
                function (data) {

                }
            );

            if (distance <= 0) {
                 window.location.href="<?= base_url(); ?>soal/nilaiakhir?id_bidang=<?= @$tampil_id_b; ?>&id_register=<?=$_SESSION['id_register']?>";
              
            }

        }, 1000);
    }

    function simpanJawaban(jawaban) {
        // alert("wwjiwj");
        // $.getJSON("Soal/simpanjawaban?id_bidang=" + id_bidang,
        //     {
        //         nomor: parseInt(nomor) - 1,
        //         id_soal: id_soal,
        //         jawaban: jawaban
        //     },
        //     function (data) {
        //         alert("kowkwo");
        //         nextSoal();
        //     });

        $(document).ready(function(){
        $.ajax({
        url: 'Soal/simpanjawaban?id_bidang=' + id_bidang +'&id_register=<?=$_SESSION['id_register']?>',
        data : {nomor: parseInt(nomor) - 1,
                id_soal: id_soal,
                jawaban: jawaban},
        success: function(data) {
            // Rates are in `json.rates`
            // Base currency (USD) is `json.base`
            // UNIX Timestamp when rates were collected is in `json.timestamp`        

            nextSoal();
        }
    });
});
    }

    function tagSoal() {
        $.getJSON("Soal/getalljawaban?id_bidang=" + kodeSesi+"&id_register=<?=$_SESSION['id_register']?>",
            function (data) {
                if (data != null) {
                    $('.paging').each(function () {
                        //if statement here
                        // use $(this) to reference the current div in the loop
                        //you can try something like...
                        var nomorSoal = $(this).text();

                        if (nomorSoal == nomor - 1) {
                            $(this).attr('class', 'paging alert-warning');
                        } else {
                            $(this).attr('class', 'paging');
                        }

                        for (var i = 1; i <= data.length; i++) {
                              // alert(nomorSoal);
                            if (parseInt(nomorSoal) === parseInt(data[i - 1].nomor_soal)) {
                                if (data[i - 1].jawaban !== null) {
                                    $(this).attr('class', 'alert-success');
                                } else {
                                    //$(this).attr('class', 'paging alert-warning');
                                }
                            }
                        }
                        //$(this).attr('class', 'pagig');

                    });
                }
            });
    }

    function nextSoal() {
        getSoal(nomor);
    }


    function getSoal(no) {
        var url = "Soal/getSoal?no=" + no + "&id_bidang=<?=$kodeSesi;?>&id_register=<?=$_SESSION['id_register']?>";
        $.getJSON(url, function (data) {
            console.log(data);
            $("#text-soal").html(nomor + ". " + data.soal);
            $("#soal_a").html(data.a);
            $("#soal_b").html(data.b);
            $("#soal_c").html(data.c);
            $("#soal_d").html(data.d);
            // $("#soal_e").html(data.e);
            // $("#nama-kategori").html(data.nama_kategori);
            // $("#mata-ujian").html(data.nama_matauji);
            id_soal = data.id_soal;
            $(".jawaban").prop('checked', false);
            getJawaban();
            tagSoal();

            nomor = parseInt(nomor) + 1;
        });
    }

    function getJawaban() {
        $.getJSON("Soal/getjawaban?id_bidang=" + id_bidang +"&id_register=<?=$_SESSION['id_register']?>",
            {
                nomor: nomor,
                id_soal: id_soal
            },
            function (data) {
                if (data != null) {
                    //alert(data.jawaban);
                    $("input[name=jawaban][value=" + data.jawaban + "").prop('checked', true);
                }
            });
    }
</script>
