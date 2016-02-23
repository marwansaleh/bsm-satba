<div class="widget">
    <div class="widget-header"><h3><?php echo $manual->title; ?></h3></div>
    <div class="widget-content">
        <?php echo $manual->content; ?>
    </div>
    <div class="widget-footer">
        <a href="<?php echo $prev_url; ?>" class="btn btn-primary"><span class="fa fa-backward"></span> Sebelumnya</a>
        <a href="<?php echo $next_url; ?>" class="btn btn-success"><span class="fa fa-forward"></span> Selanjutnya</a>
        <div class="pull-right">
            <a href="<?php echo $index_url; ?>" class="btn btn-warning"><span class="fa fa-home"></span> Halaman Index</a>
        </div>
    </div>
</div>