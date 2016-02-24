<div class="widget">
    <div class="widget-header"><h3><?php echo $manual->title; ?></h3></div>
    <div class="widget-content">
        <?php echo $manual->content; ?>
    </div>
    <div class="widget-footer">
        <div class="row">
            <div class="col-lg-3">
                <?php if (isset($prev_url)): ?>
                <a href="<?php echo $prev_url; ?>" class="btn btn-primary pull-left"><span class="fa fa-backward"></span> Sebelumnya</a>
                <?php endif; ?>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <a href="<?php echo $index_url; ?>" class="btn btn-warning"><span class="fa fa-home"></span> Halaman Index</a>
                </div>
            </div>
            <div class="col-lg-3">
                <?php if (isset($next_url)): ?>
                <a href="<?php echo $next_url; ?>" class="btn btn-success pull-right">Selanjutnya <span class="fa fa-forward"></span></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>