<div class="top-content">
    <p>
        Maaf. Anda mencoba mengakses sebuah halaman yang tidak diijinkan untuk anda dapat memasukinya.
    </p>
    <p>Silahkan gunakan menu navigasi di sisi sebelah kiri atau <em>shortcut</em> di bawah ini</p>
    <ul class="list-inline quick-access">
        <?php $bg_color = array('bg-color-green','bg-color-blue','bg-color-orange');$i=0; ?>
        <?php foreach ($menus as $menu): ?>
        <li>
            <a href="<?php echo $menu->link ? get_action_url($menu->link):'#'; ?>" title="<?php echo $menu->title; ?>">
                <div class="quick-access-item <?php echo $bg_color[$i++]; $i= $i>2?0:$i; ?>">
                    <?php echo $menu->icon ? '<i class="fa '.$menu->icon.'-o"></i>':''; ?>
                    <h5><?php echo $menu->caption; ?></h5><em><?php echo strlen($menu->title)>30?substr($menu->title, 0, 28).'..':$menu->title; ?></em>
                </div>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>