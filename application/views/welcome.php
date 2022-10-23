<link rel="stylesheet" href="<?php echo base_url('assets/morris/morris.css') ?>">
    <div class="content-wrapper">
    <section class="content">
    <?php echo alert('alert-info', 'Selamat Datang', 'Selamat Datang')?>
    <?php 
     $satker=$this->session->userdata('idsatker');
     if($satker!=12){
    ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Grafik Monitoring</h3>
                    </div>
        
        <div class="box-body">
        <?=$this->session->flashdata('message')?>
        <div id="bar-example"></div>

        </div>
                    </div>
            </div>
            </div>
            <?php }?>
    </section>
</div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/morris/raphael-min.js') ?>"></script>
    <script src="<?php echo base_url('assets/morris/morris.min.js') ?>"></script>
        <script type="text/javascript">
             $(function () {
                var bar = new Morris.Bar({
            element: 'bar-example',
            resize: true,
            data: [
                {y: 'Jan', a: <?=$s0jan?>, b: <?=$s1jan?>,c:<?=$s2jan?>},//1
                {y: 'Feb', a: <?=$s0feb?>, b: <?=$s1feb?>,c:<?=$s2feb?>},//2
                {y: 'Mar', a: <?=$s0mar?>, b: <?=$s1mar?>,c:<?=$s2mar?>},//3
                {y: 'Apr', a: <?=$s0apr?>, b: <?=$s1apr?>,c:<?=$s2apr?>},//4
                {y: 'Mei', a: <?=$s0mei?>, b: <?=$s1mei?>,c:<?=$s2mei?>},//5
                {y: 'Jun', a: <?=$s0jun?>, b: <?=$s1jun?>,c:<?=$s2jun?>},//6
                {y: 'Jul', a: <?=$s0jul?>, b: <?=$s1jul?>,c:<?=$s2jul?>},//7
                {y: 'Aug', a: <?=$s0aug?>, b: <?=$s1aug?>,c:<?=$s2aug?>},//8
                {y: 'Sep', a: <?=$s0sep?>, b: <?=$s1sep?>,c:<?=$s2sep?>},//9
                {y: 'Okt', a: <?=$s0okt?>, b: <?=$s1okt?>,c:<?=$s2okt?>},//10
                {y: 'Nov', a: <?=$s0nov?>, b: <?=$s1nov?>,c:<?=$s2nov?>},//11
                {y: 'Des', a: <?=$s0des?>, b: <?=$s1des?>,c:<?=$s2des?>},//12
            ],
            barColors: ['#f56954', '#f39c12','#00a65a'],
            xkey: 'y',
            ykeys: ['a', 'b','c'],
            ymax: 20,
            ymin:0,
            labels: ['Belum Terlaksana', 'Dalam Proses','Sudah Terlaksana'],
            hideHover: 'auto'
            });
    });
        </script>
