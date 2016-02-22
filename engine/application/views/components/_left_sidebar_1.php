<div class="col-md-2 left-sidebar">
    <!-- main-nav -->
    <nav class="main-nav">
        <ul class="main-menu">
            <li <?php echo $module_active=='dashboard'?'class="active"':''; ?>><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i><span class="text">DASHBOARD</span></a></li>
            <li>
                <a href="#" class="js-sub-menu-toggle">
                    <i class="fa fa-building fa-fw"></i><span class="text">MODUL MARKETING</span>
                    <i class="toggle-icon fa <?php echo $module_active=='marketing'?'fa-angle-down':'fa-angle-left'; ?>"></i>
                </a>
                <ul class="sub-menu <?php echo $module_active=='marketing'?'open':''; ?>">
                    <li><a href="<?php echo site_url('marketing/placingslip'); ?>"><span class="text">Placing Slip</span></a></li>
                    <li><a href="#"><span class="text">Pengesahan Placing Slip</span></a></li>
                    <li><a href="#"><span class="text">Polis General</span></a></li>
                    <li><a href="#"><span class="text">Pengesahan Polis General</span></a></li>
                    <li><a href="#"><span class="text">Placing Eben</span></a></li>
                    <li><a href="#"><span class="text">Quotation Eben</span></a></li>
                    <li><a href="#"><span class="text">Deklarasi Jiwa Kredit</span></a></li>
                    <li><a href="#"><span class="text">Endorsement</span></a></li>
                    <li><a href="#"><span class="text">Polis Eben Entry</span></a></li>
                    <li><a href="#"><span class="text">Pengesahan Polis Eben</span></a></li>
                    <li><a href="#"><span class="text">Cetak Debit Nota</span></a></li>
                    <li><a href="#"><span class="text">Penyerahan Polis ke Asuradur</span></a></li>
                    <li><a href="#"><span class="text">Polis Batch Eben</span></a></li>
                    
                </ul>
            </li>
            <li <?php echo $module_active=='klaim'?'class="active"':''; ?>>
                <a href="#" class="js-sub-menu-toggle">
                    <i class="fa fa-paperclip fa-fw"></i><span class="text">MODUL KLAIM</span>
                    <i class="toggle-icon fa <?php echo $module_active=='klaim'?'fa-angle-down':'fa-angle-left'; ?>"></i>
                </a>
                <ul class="sub-menu <?php echo $module_active=='klaim'?'open':''; ?>">
                    <li><a href="#"><span class="text">Pengajuan Klaim</span></a></li>
                    <li><a href="#"><span class="text">Pengajuan Klaim Tanpa Polis</span></a></li>
                    <li><a href="#"><span class="text">Klaim Dokumen Tidak Lengkap</span></a></li>
                    <li><a href="#"><span class="text">Pembayaran Klaim</span></a></li>
                    <li><a href="#"><span class="text">Pembayaran Klaim Tanpa Polis</span></a></li>
                    <li><a href="#"><span class="text">Pengajuan Klaim Jiwa (Eben)</span></a></li>
                    <li><a href="#"><span class="text">Pengajuan Klaim Jiwa Kredit (Eben)</span></a></li>
                </ul>
            </li>
            <li <?php echo $module_active=='keuangan'?'class="active"':''; ?>>
                <a href="#" class="js-sub-menu-toggle">
                    <i class="fa fa-dollar fa-fw"></i><span class="text">MODUL KEUANGAN</span>
                    <i class="toggle-icon fa <?php echo $module_active=='keuangan'?'fa-angle-down':'fa-angle-left'; ?>"></i>
                </a>
                <ul class="sub-menu <?php echo $module_active=='keuangan'?'open':''; ?>">
                    <li><a href="#"><span class="text">Jurnal Kas Masuk</span></a></li>
                    <li><a href="#"><span class="text">Jurnal Kas Keluar</span></a></li>
                    <li><a href="#"><span class="text">Jurnal Bank Masuk</span></a></li>
                    <li><a href="#"><span class="text">Jurnal Bank Masuk (Komisi)</span></a></li>
                    <li><a href="#"><span class="text">Jurnal Bank Keluar</span></a></li>
                    <li><a href="#"><span class="text">Jurnal Umum</span></a></li>
                    <li><a href="#"><span class="text">Jurnal Nota Masuk Cabang</span></a></li>
                    <li><a href="#"><span class="text">Jurnal Auto</span></a></li>
                    <li><a href="#"><span class="text">Penyelesaian Piutang</span></a></li>
                    <li><a href="#"><span class="text">Saldo Awal</span></a></li>
                </ul>
            </li>
            <li <?php echo $module_active=='master'?'class="active"':''; ?>>
                <a href="#" class="js-sub-menu-toggle">
                    <i class="fa fa-building fa-fw"></i><span class="text">MASTER DATA</span>
                    <i class="toggle-icon fa <?php echo $module_active=='master'?'fa-angle-down':'fa-angle-left'; ?>"></i>
                </a>
                <ul class="sub-menu <?php echo $module_active=='master'?'open':''; ?>">
                    <li><a href="#"><span class="text">Sumber Bisnis</span></a></li>
                </ul>
            </li>
            <li <?php echo $module_active=='chart'?'class="active"':''; ?>><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i><span class="text">Charts &amp; Statistics</span></a></li>
            <li <?php echo $module_active=='usermgt'?'class="active"':''; ?>>
                <a href="#" class="js-sub-menu-toggle">
                    <i class="fa fa-users fa-fw"></i><span class="text">USER MANAGEMENT</span>
                    <i class="toggle-icon fa <?php echo $module_active=='usermgt'?'fa-angle-down':'fa-angle-left'; ?>"></i>
                </a>
                <ul class="sub-menu <?php echo $module_active=='usermgt'?'open':''; ?>">
                    <li><a href="<?php echo get_action_url('usermgt/group'); ?>"><span class="text">Grup User</span></a></li>
                    <li><a href="<?php echo get_action_url('usermgt/user'); ?>"><span class="text">Daftar User</span></a></li>
                    <li><a href="<?php echo get_action_url('usermgt/role'); ?>"><span class="text">Kelola Role Akses</span></a></li>
                </ul>
            </li>
            <li <?php echo $module_active=='system'?'class="active"':''; ?>>
                <a href="#" class="js-sub-menu-toggle">
                    <i class="fa fa-cogs fa-fw"></i><span class="text">SYSTEM CONFIGURATION</span>
                    <i class="toggle-icon fa <?php echo $module_active=='system'?'fa-angle-down':'fa-angle-left'; ?>"></i>
                </a>
                <ul class="sub-menu <?php echo $module_active=='system'?'open':''; ?>">
                    <li><a href="#"><span class="text">Environment Variables</span></a></li>
                    <li><a href="#"><span class="text">Database Backup</span></a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /main-nav -->
    <div class="sidebar-minified js-toggle-minified">
        <i class="fa fa-angle-left"></i>
    </div>
    <!-- sidebar content -->
<!--    <div class="sidebar-content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5><i class="fa fa-lightbulb-o"></i> Tips</h5></div>
            <div class="panel-body">
                <p>Pencarian widget dapat dilakukan langsung melalui menu search di atas.</p>
            </div>
        </div>
        <h5 class="label label-default"><i class="fa fa-info-circle"></i> Informasi Umum</h5>
        <ul class="list-unstyled list-info-sidebar bottom-30px">
            <li class="data-row">
                <span class="data-name">Jumlah Polis</span>
                <span class="data-value">219 buah</span>
            </li>
            <li class="data-row">
                <span class="data-name">Jumlah Klaim</span>
                <span class="data-value">10 buah</span>
            </li>
            <li class="data-row">
                <div class="data-name">Total Closing</div>
                <div class="data-value">
                    274 M
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                            <span class="sr-only">10%</span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>-->
    <!-- end sidebar content -->
</div>