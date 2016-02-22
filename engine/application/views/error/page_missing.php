<div class="top-content">
    <p>
        Silahkan gunakan link menu di sisi sebelah kiri sebagai navigasi menuju halaman yang anda inginkan
        atau silahkan gunakan <em>jump-menu</em> di bawah ini sebagai referensi
    </p>
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