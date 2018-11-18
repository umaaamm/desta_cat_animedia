

    <!-- /.col -->
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <i class="fa fa-hdd-o fa-fw"></i>
                <h3 class="box-title">Nilai Akhir</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-sm-12">
                    <h3>Hasil Akhir</h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <td>Bidang Soal</td>
                            <td>Nilai</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($hasil as $row){
                        ?>
                        <tr>
                            <td><?=$row->nama_bidang;?></td>
                            <td><?=(int)$row->nilai;?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <!-- /.box-body -->
</div>
<!-- /.box -->