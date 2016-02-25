<div class="row">
    <div class="col-lg-12">
        <div class="widget">
            <div class="widget-header">
                <h3><?php echo $page_subtitle ? $page_subtitle:'Edit Polis'; ?></h3>
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#tab-basic" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-alt"></i> Basic</a></li>
                    <li class=""><a href="#tab-pertanggungan" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Pertanggungan</a></li>
                    <li class=""><a href="#tab-premi" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Premi</a></li>
                    <li class=""><a href="#tab-biayalain" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Biaya Lain</a></li>
                    <li class=""><a href="#tab-asuradur" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Asuradur</a></li>
                    <li class=""><a href="#tab-broker" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Broker</a></li>
                    <li class=""><a href="#tab-attachment" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Lampiran</a></li>
                </ul>
            </div>
            <div class="widget-content clearfix">
                <form id="MyForm" method="POST" class="form-validation" action="<?php echo $submit_url; ?>">
                    <input type="hidden" name="id" value="<?php echo $item->id ? $item->id:0; ?>" />
                    <div class="tab-content no-padding">
                        <div class="tab-pane fade active in" id="tab-basic">
                            <div class="form-group">
                                <label>Sumber Bisnis</label>
                                <select id="sumber_bisnis" name="sumber_bisnis" data-parent-selected="<?php echo $item->sumber_bisnis; ?>" class="form-control selectpicker show-tick"" data-live-search="true" data-size="5">
                                    <?php foreach ($sumber_bisnis as $sb): ?>
                                    <option value="<?php echo $sb->id; ?>" <?php echo $sb->id==$item->sumber_bisnis?'selected':''; ?>><?php echo $sb->kode .' - '. $sb->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nomor Polis</label>
                                        <input type="text" name="nomor_polis" class="form-control" value="<?php echo $item->nomor_polis; ?>" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nomor Polis Lama</label>
                                        <input type="text" name="nomor_polis_lama" class="form-control" value="<?php echo $item->nomor_polis_lama; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tertanggung</label>
                                <div class="input-group">
                                    <select id="tertanggung" name="tertanggung" data-parent-selected="<?php echo $item->tertanggung; ?>" class="form-control selectpicker show-tick"" data-live-search="true" data-size="5">
                                        <?php foreach ($tertanggung as $tg): ?>
                                        <option value="<?php echo $tg->id; ?>" <?php echo $tg->id==$item->tertanggung?'selected':''; ?>><?php echo $tg->nama_lengkap; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-success" title="Tambah tertanggung"><span class="fa fa-plus"></span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Okupasi</label>
                                <input type="text" name="okupasi" class="form-control" value="<?php echo $item->okupasi; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Jenis Asuransi</label>
                                <select id="sumber_bisnis" name="jenis_asuransi" class="form-control selectpicker show-tick"" data-live-search="true" data-size="5">
                                    <?php foreach ($jenis_asuransi as $ja): ?>
                                    <option value="<?php echo $ja->id; ?>" <?php echo $ja->id==$item->jenis_asuransi?'selected':''; ?>><?php echo $ja->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Periode</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" readonly="true" id="datepicker" class="form-control datepicker text-primary" name="periode_mulai" value="<?php echo $item->periode_mulai; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>S/d</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" readonly="true" id="datepicker" class="form-control datepicker text-primary" name="periode_akhir" value="<?php echo $item->periode_akhir; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Persetujuan</label>
                                        <select name="persetujuan" class="form-control">
                                            <?php foreach ($persetujuan as $key => $value): ?>
                                            <option value="<?php echo $key; ?>" <?php echo $item->persetujuan==$key ? 'selected':''; ?>><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label>Mata uang</label>
                                        <select class="form-control" name="matauang_komisi_kembali">
                                            <?php foreach ($mata_uang as $mu): ?>
                                            <option value="<?php echo $mu->id; ?>" title="<?php echo $mu->nama; ?>" <?php echo $item->matauang_komisi_kembali==$mu->id ? 'selected':''; ?>>
                                                <?php echo $mu->id;?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Komisi kembali</label>
                                        <input type="number" class="form-control text-right" name="komisi_kembali" value="<?php echo $item->komisi_kembali; ?>" />
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Sales / AO</label>
                                        <select class="form-control selectpicker show-tick" name="sales" data-live-search="true" data-size="5">
                                            <?php foreach ($sales as $sa): ?>
                                            <option value="<?php echo $sa->id; ?>" <?php echo $item->sales==$sa->id ? 'selected':''; ?>>
                                                <?php echo $sa->nama;?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- objek pertanggungan -->
                        <div class="tab-pane fade" id="tab-pertanggungan">
                            <legend>Objek Pertanggungan</legend>
                            <div id="container-objek-pertanggungan" class="container-input-appendable">
                                <div class="row row-objek">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control objek-nama" name="objek_nama[]" value="" placeholder="Nama objek pertanggungan" maxlength="50">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <select name="objek_matauang[]" class="form-control objek-matauang">
                                                <?php foreach ($mata_uang as $mu): ?>
                                                <option value="<?php echo $mu->id; ?>" title="<?php echo $mu->nama; ?>"><?php echo $mu->id;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="number" class="form-control text-right objek-nilai" name="objek_nilai[]" placeholder="Nilai pertanggungan">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span>IDR</span>
                                                </div>
                                                <input type="number" class="form-control text-right objek-nilai-idr" placeholder="Nilai pertanggungan (IDR)">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-objek-tambah" title="Tambah objek pertanggungan"><span class="fa fa-plus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row description">
                                    <div class="col-lg-9">
                                        <p class="form-control-static text-right">Total nilai pertanggungan (IDR)</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span>IDR</span>
                                            </div>
                                            <input type="number" readonly="true" id="total-pertanggungan-idr" name="total_pertanggungan_idr" class="form-control text-right">
                                            <div class="input-group-btn"><button type="button" class="btn btn-default btn-objek-hitung"><span class="fa fa-calculator"></span></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-premi">
                            <legend>Suku Premi</legend>
                            <div id="container-premi" class="container-input-appendable">
                                <div class="row row-premi">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" disabled="true" class="form-control disabled objek-nama" />
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <select class="form-control premi-tipe" name="premi_rate_type[]">
                                                <option value="prosen">Prosen</option>
                                                <option value="promil">Promil</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <input type="number" class="form-control text-right premi-rate" name="premi_rate[]" placeholder="Premi rate" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <input type="number" disabled="disabled" class="form-control text-right premi-nilai disabled" name="premi_nilai[]" placeholder="Nilai premi">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="number" disabled="disabled" class="form-control text-right premi-nilai-idr disabled" name="premi_nilai_idr[]" placeholder="Nilai premi IDR">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-premi-tambah" title="Tambah premi"><span class="fa fa-plus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row description">
                                    <div class="col-lg-9">
                                        <p class="form-control-static text-right">Total nilai premi dasar (IDR)</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span>IDR</span>
                                            </div>
                                            <input type="number" readonly="true" id="total-premi-idr" name="total_premi_idr" class="form-control text-right">
                                            <div class="input-group-btn"><button type="button" class="btn btn-default"><span class="fa fa-calculator"></span></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-biayalain">
                            <legend>Biaya Lain</legend>
                            <div id="container-biayalain" class="container-input-appendable">
                                <div class="row row-biayalain">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control biayalain-nama" name="biayalain_nama[]" value="" placeholder="Nama biaya lain" maxlength="50">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <select name="biayalain_matauang[]" class="form-control biayalain-matauang">
                                                <?php foreach ($mata_uang as $mu): ?>
                                                <option value="<?php echo $mu->id; ?>" title="<?php echo $mu->nama; ?>"><?php echo $mu->id;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="number" class="form-control text-right biayalain-nilai" name="biayalain_nilai[]" placeholder="Nilai biaya lain">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span>IDR</span>
                                                </div>
                                                <input type="number" disabled="disabled" class="form-control text-right biayalain-nilai-idr disabled" name="biayalain_idr[]" placeholder="Nilai biaya lain (IDR)">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-biayalain-tambah" title="Tambah biaya lain"><span class="fa fa-plus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row description">
                                    <div class="col-lg-9">
                                        <p class="form-control-static text-right">Total biaya lain (IDR)</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span>IDR</span>
                                            </div>
                                            <input type="number" readonly="true" id="total-biayalain-idr" name="total_pertanggungan_idr" class="form-control text-right">
                                            <div class="input-group-btn"><button type="button" class="btn btn-default btn-biayalain-hitung"><span class="fa fa-calculator"></span></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-asuradur">
                            <legend>Asuradur / Penanggung</legend>
                            <div id="container-asuradur" class="container-input-appendable">
                                <div class="row row-asuradur">
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select name="asuradur[]" class="form-control selectpicker show-tick select-asuradur" data-live-search="true" data-size="5">
                                                    <?php foreach ($asuradurs as $as): ?>
                                                    <option value="<?php echo $as->id; ?>"><?php echo $as->nama; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="input-group-addon">
                                                    <input type="radio" class="asuradur-leader" name="asuradur_leader" value="1" checked="true"> <span class="asuradur-leader-label">Leader</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="fa fa-percent"></span></div>
                                                <input type="number" class="form-control text-right asuradur-persen" name="asuradur_persen[]" value="100" placeholder="Persentase" disabled="true">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-asuradur-tambah" title="Tambah asuradur"><span class="fa fa-plus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-broker">
                            <legend>Brokers</legend>
                            <div id="container-broker" class="container-input-appendable">
                                <div class="row row-broker">
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <select name="broker[]" class="form-control selectpicker show-tick select-broker" data-live-search="true" data-size="5">
                                                <?php foreach ($brokers as $brk): ?>
                                                <option value="<?php echo $brk->id; ?>"><?php echo $brk->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="fa fa-percent"></span></div>
                                                <input type="number" class="form-control text-right broker-persen" name="broker_persen[]" value="100" placeholder="Persentase" disabled="true">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-broker-tambah" title="Tambah broker"><span class="fa fa-plus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-attachment">
                            <legend>Dokumentasi &amp; Lampiran</legend>
                            
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <button type="submit" class="btn btn-primary btn-large"><i class="fa fa-save"></i> Submit</button>
                        <button type="reset" class="btn btn-default btn-large"><i class="fa fa-recycle"></i> Reset</button>
                        <a id="btn-cancel" class="btn btn-success btn-large" href="<?php echo $back_url; ?>"><i class="fa fa-backward"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        
        $('form.form-validation').validate({
            ignore: [],
            rules: {
                sumber_bisnis: {
                    required: true
                },
                nomor_polis: {
                    minlength: 2,
                    required: true
                },
                'broker[]': {
                    required: true
                },
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            }
        });
        
        /* OBJEK PAERTANGGUNGAN */
        $('#container-objek-pertanggungan').on('change', 'select', function (){
            $(this).parents('.row-objek').find('input.objek-nilai').trigger('change');
        });
        $('#container-objek-pertanggungan').on('change', 'input.objek-nilai', function(){
            var matauang = $(this).parents('.row-objek').find('select').val();
            var target = $(this).parents('.row-objek').find('input.objek-nilai-idr');
            
            KonversiMataUang.konversi(matauang, $(this), $(target));
            totalNilai('#container-objek-pertanggungan', 'input.objek-nilai-idr', '#total-pertanggungan-idr');
        });
        $('#container-objek-pertanggungan').on('keyup', 'input.objek-nilai', function(){
            $(this).trigger('change');
        });
        $('#container-objek-pertanggungan').on('click','button.btn-objek-tambah', function(){
            var $row = $(this).parents('.row-objek');
            var $new = $row.clone(true);
            
            //change attribute of new
            $new.find('input.objek-nama').val('');
            $new.find('input.objek-nilai').val('');
            $new.find('input.objek-nilai-idr').val('');
            
            //change attribute of button current row
            $(this).removeClass('btn-success').addClass('btn-danger').addClass('btn-objek-hapus')
                    .removeClass('btn-objek-tambah').attr('title','Hapus objek pertanggungan')
                    .find('span').removeClass('fa-plus').addClass('fa-minus');
            
            //put new row to the last
            $new.insertAfter($row);
            
            //trigger add premi
            $('#container-premi .btn-premi-tambah').last().trigger('click');
        });
        $('#container-objek-pertanggungan').on('click','button.btn-objek-hapus', function(){
            var $row = $(this).parents('.row-objek');
            $row.remove();
            
            totalNilai('#container-objek-pertanggungan', 'input.objek-nilai-idr', '#total-pertanggungan-idr');
        });
        $('#container-objek-pertanggungan').on('click','.btn-objek-hitung', function(){
            totalNilai('#container-objek-pertanggungan', 'input.objek-nilai-idr', '#total-pertanggungan-idr');
        });
        //update nama objek pertanggungan
        $('#container-objek-pertanggungan').on('keyup', 'input.objek-nama', function(){
            //var nama = $(this).val();
            var row_index = $(this).parents('.row').index();
            
            //update the other objek-nama
            $('#container-premi input.objek-nama').eq(row_index).val($(this).val());
        });
        /* PREMI PERTANGGUNGAN */
        $('#container-premi').on('click','button.btn-premi-tambah', function(){
            //maximum rows number as many as rows in pertanggungan
            var current_num_row = $('#container-premi .row-premi').length;
            var max_row = $('#container-objek-pertanggungan .row-objek').length;
            if (current_num_row < max_row){
                var $row = $(this).parents('.row-premi');
                var $new = $row.clone(true);

                //change attribute of new
                $new.find('input.objek-nama').val($('#container-objek-pertanggungan input.objek-nama').eq(current_num_row).val());
                $new.find('input.premi-rate').val(0);
                $new.find('input.premi-nilai').val('0.00');
                $new.find('input.premi-nilai-idr').val('0.00');

                //change attribute of button current row
                $(this).removeClass('btn-success').addClass('btn-danger').addClass('btn-premi-hapus')
                        .removeClass('btn-premi-tambah').attr('title','Hapus premi')
                        .find('span').removeClass('fa-plus').addClass('fa-minus');

                //put new row to the last
                $new.insertAfter($row);
            }
        });
        $('#container-premi').on('keyup','input.premi-rate', function(){
            var row_index = $(this).parents('.row-premi').index();
            var $row = $(this).parents('.row-premi');
            var tipe_premi = $row.find('select.premi-tipe').val();
            var rate = parseFloat($(this).val());
            
            var $row_src = $('#container-objek-pertanggungan').find('.row-objek').eq(row_index);
            var nilai_objek = parseFloat($row_src.find('input.objek-nilai').val());
            var nilai_objek_idr = parseFloat($row_src.find('input.objek-nilai-idr').val());
            
            var nilai_premi = hitungPremi(tipe_premi,rate,nilai_objek);
            var nilai_premi_idr = hitungPremi(tipe_premi,rate, nilai_objek_idr);
            
            console.log('premi:'+nilai_premi);
            console.log('premi-idr:'+nilai_premi_idr);
            //set nilai premi
            $row.find('input.premi-nilai').val(nilai_premi.toFixed(2));
            //set nilai premi idr
            $row.find('input.premi-nilai-idr').val(nilai_premi_idr.toFixed(2));
            
            //hitung total nilai
            totalNilai('#container-premi','input.premi-nilai-idr','#total-premi-idr');
        });
        $('#container-premi').on('change','input.premi-rate',function(){
            $(this).trigger('keyup');
        });
        $('#container-premi').on('change','select.premi-tipe',function(){
            $(this).parents('.row-premi').find('input.premi-rate').trigger('keyup');
        });
        /* BIAYA LAIN */
        $('#container-biayalain').on('click','button.btn-biayalain-tambah', function(){
            var $row = $(this).parents('.row-biayalain');
            var $new = $row.clone(true);
            
            //change attribute of new
            $new.find('input.biayalain-nama').val('');
            $new.find('input.biayalain-nilai').val('');
            $new.find('input.biayalain-nilai-idr').val('');
            
            //change attribute of button current row
            $(this).removeClass('btn-success').addClass('btn-danger').addClass('btn-biayalain-hapus')
                    .removeClass('btn-biayalain-tambah').attr('title','Hapus biaya lain')
                    .find('span').removeClass('fa-plus').addClass('fa-minus');
            
            //put new row to the last
            $new.insertAfter($row);
        });
        $('#container-biayalain').on('click','button.btn-biayalain-hapus', function(){
            var $row = $(this).parents('.row-biayalain');
            $row.remove();
            
            totalNilai('#container-biayalain', 'input.biayalain-nilai-idr', '#total-biayalain-idr');
        });
        $('#container-biayalain').on('keyup', 'input.biayalain-nilai', function(){
            $(this).trigger('change');
        });
        $('#container-biayalain').on('change', 'select.biayalain-matauang', function (){
            $(this).parents('.row-biayalain').find('input.biayalain-nilai').trigger('change');
        });
        $('#container-biayalain').on('change', 'input.biayalain-nilai', function(){
            var matauang = $(this).parents('.row-biayalain').find('select').val();
            var target = $(this).parents('.row-biayalain').find('input.biayalain-nilai-idr');
            
            KonversiMataUang.konversi(matauang, $(this), $(target));
            totalNilai('#container-biayalain', 'input.biayalain-nilai-idr', '#total-biayalain-idr');
        });
        $('#container-biayalain').on('click','.btn-biayalain-hitung', function(){
            totalNilai('#container-biayalain', 'input.biayalain-nilai-idr', '#total-biayalain-idr');
        });
        /* ASURADUR */
        $('#container-asuradur').on('click','button.btn-asuradur-tambah', function(){
            var counter = $('#container-asuradur .row-asuradur').length + 1;
            var $row = $(this).parents('.row-asuradur');
            var $new = $row.clone(true);
            var $selectPickers = $new.find('.selectpicker');

            //change attribute of new
            $new.find('input.asuradur-persen').val(0).prop('disabled',false);
            $new.find('input.asuradur-leader').prop('checked', false);
            $new.find('span.asuradur-leader-label').html('Member');

            //change attribute of button current row
            $(this).removeClass('btn-success').addClass('btn-danger').addClass('btn-asuradur-hapus')
                    .removeClass('btn-asuradur-tambah').attr('title','Hapus asuradur')
                    .find('span').removeClass('fa-plus').addClass('fa-minus');
            
            //put new row to the last
            $new.insertAfter($row);
            
            //re-init selectpicker
            $selectPickers.data('selectpicker', null);
            $new.find('.bootstrap-select').remove();
            $selectPickers.selectpicker();
            
        });
        $('#container-asuradur').on('click','button.btn-asuradur-hapus', function(){
            var $row = $(this).parents('.row-asuradur');
            if ($row.find('input.asuradur-leader').prop('checked')){
                alert('Asuradur "Leader" tidak dapat dihapus');
                return;
            }
            //get persen before delete
            var persen = parseFloat($row.find('input.asuradur-persen').val());
            console.log('persen:'+persen);
            //update leader
            $('#container-asuradur input.asuradur-leader').each(function(){
                if ($(this).prop('checked')){
                    var leader_persen = parseFloat($(this).parents('.row-asuradur').find('input.asuradur-persen').val())+persen;
                    //update the leader persen
                    $(this).parents('.row-asuradur').find('input.asuradur-persen').val(leader_persen);
                    console.log(leader_persen);
                }
            });
            
            $row.remove();
        });
        $('#container-asuradur').on('click', '.asuradur-leader', function(){
            if ($(this).prop('checked')){
                //change label
                $('#container-asuradur').find('span.asuradur-leader-label').html('Member');
                $(this).next('span.asuradur-leader-label').html('Leader');
                //set enable for member persentase
                $('#container-asuradur').find('input.asuradur-persen').prop('disabled', false);
                //set disable for persentase leader
                $(this).parents('.row-asuradur').find('input.asuradur-persen').prop('disabled',true);
            }
        });
        $('#container-asuradur').on('keyup', 'input.asuradur-persen', function(){
            //get leader 
            var $leader;
            var member = 0;
            $('#container-asuradur .asuradur-leader').each(function(){
                if ($(this).prop('checked')){
                    $leader = $(this).parents('.row-asuradur').find('input.asuradur-persen');
                }else{
                    member += parseFloat($(this).parents('.row-asuradur').find('input.asuradur-persen').val());
                }
            });
            var persentaseLeader = 100 - member;
            $leader.val(persentaseLeader);
            if(persentaseLeader <= 0){
                alert('Persentase leader telah mencapai kurang atau sama dengan nol. Silahkan ganti persentase member');
                return false;
            }
        });
        $('#container-asuradur').on('change', 'input.asuradur-persen', function(){
            $(this).trigger('keyup');
        });
        
        /* BROKER */
        $('#container-broker').on('click','button.btn-broker-tambah', function(){
            var $row = $(this).parents('.row-broker');
            var $new = $row.clone(true);

            //change attribute of new
            $new.find('input.broker-persen').val(0).prop('disabled',false);
            $new.find('select.select-broker').val(0);

            //change attribute of button current row
            $(this).removeClass('btn-success').addClass('btn-danger').addClass('btn-broker-hapus')
                    .removeClass('btn-broker-tambah').attr('title','Hapus broker')
                    .find('span').removeClass('fa-plus').addClass('fa-minus');

            //put new row to the last
            $new.insertAfter($row);
        });
        $('#container-broker').on('click','button.btn-broker-hapus', function(){
            if ($('#container-broker .row-broker').length < 2){
                alert('Minimal satu broker harus tetap ada');
                return;
            }
            var $row = $(this).parents('.row-broker');
            //get old persen
            var persen = parseFloat($row.find('input.broker-persen').val());
            console.log('persen:'+persen);
            
            //update leader
            var top_persen = parseFloat($row.eq(0).find('input.broker-persen').val());
            console.log(top_persen);
            $row.eq(0).find('input.broker-persen').val(top_persen+persen);
            
            $row.remove();
        });
        $('#container-broker').on('keyup', 'input.broker-persen', function(){
            //get leader 
            var $leader;
            var member = 0;
            $('#container-broker .row-broker').each(function(index){
                if (index==0){
                    $leader = $(this);
                }else{
                    member += parseFloat($(this).find('input.broker-persen').val());
                }
            });
            var persentaseLeader = 100 - member;
            $leader.find('input.broker-persen').val(persentaseLeader);
            
            if(persentaseLeader <= 0){
                alert('Persentase leader telah mencapai kurang atau sama dengan nol. Silahkan ganti persentase member');
                return false;
            }
        });
    });
    
    function totalNilai(parent, selector, target){
        var total = 0.00;
        $(parent +' '+ selector).each(function (){
            total += parseFloat($(this).val());
        });
        
        if (target){
            $(target).val(total.toFixed(2));
        }else{
            return total;
        }
    }
    
    function persentase_asuradur_check(parent, selector){
        //get leader row
        //$(parent)
    }
    
    function hitungPremi(tipe,rate,pertanggungan){
        var tipe_multiplier;
        
        if (tipe==='promil'){
            tipe_multiplier = 0.001;
        }else{
            tipe_multiplier = 0.01;
        }
        
        var nilai_premi = rate * tipe_multiplier * pertanggungan;
        
        return nilai_premi;
    }
</script>