 function countdown() {
        // Set the date we're counting down to

// Update the count down every 1 second
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
                window.location = "<?=base_url('/front/soal/nilaiakhir');?>";
            }

        }, 1000);
    }

      window.location = "<?=base_url('Soal/nilaiakhir?id_register='+$_SESSION["id_register"]+'&id_soal='+$tampil_id_b+');?>";

SELECT SUM(nilai_total >=20) as diterima, SUM(nilai_total <= 19 ) as tidak_diterima FROM nilai_total
        SELECT tbl_nilai.*, tbl_pendaftar.jurusan1 from tbl_nilai LEFT JOIN tbl_pendaftar on tbl_nilai.id_pendaftar = tbl_pendaftar.id_pendaftar WHERE tbl_pendaftar.jurusan1 = 'TKJ'

    SELECT nilai_total.*, nilai_total > 20 as keterangan FROM `nilai_total`