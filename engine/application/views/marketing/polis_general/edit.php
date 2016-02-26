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
                                        <input type="text" class="form-control text-right number" name="komisi_kembali" value="<?php echo $item->komisi_kembali; ?>" />
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
                                            <input type="text" class="form-control text-right objek-nilai number" name="objek_nilai[]" placeholder="Nilai pertanggungan">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span>IDR</span>
                                                </div>
                                                <input type="text" class="form-control text-right objek-nilai-idr number" placeholder="Nilai pertanggungan (IDR)">
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
                                            <input type="text" readonly="true" id="total-pertanggungan-idr" name="total_pertanggungan_idr" class="form-control text-right number">
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
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control text-right premi-rate number" name="premi_rate[]" placeholder="Rate" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span class="premi-matauang">IDR</span>
                                                </div>
                                                <input type="text" disabled="disabled" class="form-control text-right premi-nilai disabled number" name="premi_nilai[]" placeholder="Nilai premi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span>IDR</span>
                                                </div>
                                                <input type="text" disabled="disabled" class="form-control text-right premi-nilai-idr disabled number" name="premi_nilai_idr[]" placeholder="Nilai premi IDR">
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
                                            <input type="text" readonly="true" id="total-premi-idr" name="total_premi_idr" class="form-control text-right number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-biayalain">
                            <legend>Biaya Lain</legend>
                            <div id="container-biayalain" class="container-input-appendable">
                                <div class="row">
                                    <div class="col-lg-5"><div class="form-group"><label>Komponen biaya lain</label></div></div>
                                    <div class="col-lg-1"><div class="form-group"><label>Kurs</label></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Besar biaya</label></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Besar biaya (IDR)</label></div></div>
                                </div>
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
                                            <input type="text" class="form-control text-right biayalain-nilai number" name="biayalain_nilai[]" placeholder="Nilai biaya lain">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span>IDR</span>
                                                </div>
                                                <input type="text" disabled="disabled" class="form-control text-right biayalain-nilai-idr disabled number" name="biayalain_idr[]" placeholder="Nilai biaya lain (IDR)">
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
                                            <input type="text" readonly="true" id="total-biayalain-idr" name="total_pertanggungan_idr" class="form-control text-right number">
                                            <div class="input-group-btn"><button type="button" class="btn btn-default btn-biayalain-hitung"><span class="fa fa-calculator"></span></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-asuradur">
                            <legend>Asuradur / Penanggung</legend>
                            <div id="container-asuradur" class="container-input-appendable">
                                <div class="row">
                                    <input type="hidden" name="asuradur_total_premi" class="asuradur-total-premi" />
                                    <div class="col-lg-12"><div class="form-group"><p class="form-control-static">Total premi (gross + biaya lain) = IDR. <span class="asuradur-total-premi text-primary number"></span> </p></div></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Pilih asuradur</label></div></div>
                                    <div class="col-lg-2"><div class="form-group"><label>Share <span class="fa fa-percent"></span></label></div></div>
                                    <div class="col-lg-2"><div class="form-group"><label>Komisi <span class="fa fa-percent"></span></label></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Komisi IDR</label></div></div>
                                </div>
                                <div class="row row-asuradur">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="control-inline fancy-radio">
                                                <input type="radio" class="asuradur-leader"  name="asuradur_leader" value="1" checked="true">
                                                <span class="asuradur-leader-label"><i></i> Leader</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="asuradur[]" class="select2 select-asuradur">
                                                <?php foreach ($asuradurs as $as): ?>
                                                <option value="<?php echo $as->id; ?>"><?php echo $as->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control text-right asuradur-persen number" name="asuradur_persen[]" value="100" placeholder="Persentase" disabled="true">
                                                <div class="input-group-addon"><span class="fa fa-percent"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control text-right asuradur-komisi-persen number" name="asuradur_komisi_persen[]" value="100" placeholder="Persentase">
                                                <div class="input-group-addon"><span class="fa fa-percent"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">IDR</span></div>
                                                <input type="text" disabled="true" class="form-control text-right asuradur-komisi-idr disabled number" name="asuradur_komisi_idr[]" value="100" placeholder="Nilai">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-asuradur-tambah" title="Tambah asuradur"><span class="fa fa-plus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row description">
                                    <div class="col-lg-9">
                                        <p class="form-control-static text-right">Total komisi (IDR)</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <span>IDR</span>
                                            </div>
                                            <input type="text" disabled="true" id="total-asuradur-komisi-idr" name="total_asuradur_komisi_idr" class="form-control text-right number disabled">
                                            <div class="input-group-btn"><button type="button" class="btn btn-default btn-premi-komisi-hitung"><span class="fa fa-calculator"></span></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-broker">
                            <legend>Brokers</legend>
                            <div id="container-broker" class="container-input-appendable">
                                <div class="row">
                                    <input type="hidden" name="broker_total_komisi" class="broker-total-komisi" />
                                    <div class="col-lg-12"><div class="form-group"><p class="form-control-static">Total komisi broker = IDR. <span class="broker-total-komisi text-primary number"></span> </p></div></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-5"><div class="form-group"><label>Pilih broker</label></div></div>
                                    <div class="col-lg-2"><div class="form-group"><label>Persentase</label></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>IDR</label></div></div>
                                </div>
                                <div class="row row-broker">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="control-inline fancy-radio">
                                                <input type="radio" class="broker-leader"  name="broker_leader" value="1" checked="true">
                                                <span class="broker-leader-label"><i></i> Leader</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <select name="broker[]" class="select2 select-broker">
                                                <?php foreach ($brokers as $brk): ?>
                                                <option value="<?php echo $brk->id; ?>"><?php echo $brk->nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control text-right broker-persen number" name="broker_persen[]" value="100" placeholder="Persentase" disabled="true">
                                                <div class="input-group-addon"><span class="fa fa-percent"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">IDR</div>
                                                <input type="text" class="form-control text-right broker-idr number disabled" name="broker_idr[]" value="0" placeholder="IDR" disabled="true">
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
        //number formatter
        $('input.number').number(true,2);
        $('span.number').number(true,2);
        
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
            $('#container-premi span.premi-matauang').eq($(this).index()).html($(this).val());
        });
        $('#container-objek-pertanggungan').on('change', 'input.objek-nilai', function(){
            var matauang = $(this).parents('.row-objek').find('select').val();
            var target = $(this).parents('.row-objek').find('input.objek-nilai-idr');
            
            KonversiMataUang.konversi(matauang, $(this), $(target));
            
            totalNilai('#container-objek-pertanggungan', 'input.objek-nilai-idr', '#total-pertanggungan-idr');
            setTotalPremi();
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
            $new.insertBefore($row);
            
            //add premi also
            var $row_premi = $('#container-premi .row-premi').first();
            var $new_premi = $row_premi.clone(true);
            
            //change attribute of new premi
            $new_premi.find('input.premi-nama').val($row.find('input.objek-nama').val());
            $new_premi.find('input.premi-rate').val(0);
            $new_premi.find('input.premi-nilai').val(0);
            $new_premi.find('span.premi-nilai-matauang').html($row.find('select.objek-matauang').val());
            $new_premi.find('input.premi-nilai-idr').val(0);
            
            $new_premi.insertBefore($row_premi);
        });
        $('#container-objek-pertanggungan').on('click','button.btn-objek-hapus', function(){
            var $row = $(this).parents('.row-objek');
            var index = $row.index();
            $row.remove();
            
            totalNilai('#container-objek-pertanggungan', 'input.objek-nilai-idr', '#total-pertanggungan-idr');
            
            //update premi
            $('#container-premi .row-premi').eq(index).remove();
            totalNilai('#container-premi','input.premi-nilai-idr','#total-premi-idr');
        });
        $('#container-objek-pertanggungan').on('click','.btn-objek-hitung', function(){
            totalNilai('#container-objek-pertanggungan', 'input.objek-nilai-idr', '#total-pertanggungan-idr');
        });
        $('#container-objek-pertanggungan').on('keyup', 'input.objek-nama', function(){
            //var nama = $(this).val();
            var objek_row_index = $(this).index();
            $('#container-premi input.objek-nama').eq(objek_row_index).val($(this).val());
        });
        /* PREMI PERTANGGUNGAN */
        $('#container-premi').on('keyup','input.premi-rate', function(){
            $(this).trigger('change');
        });
        $('#container-premi').on('change','input.premi-rate',function(){
            var row_index = $(this).parents('.row-premi').index();
            var $row = $(this).parents('.row-premi');
            var tipe_premi = $row.find('select.premi-tipe').val();
            var rate = parseFloat($(this).val());
            
            var $row_src = $('#container-objek-pertanggungan').find('.row-objek').eq(row_index);
            var nilai_objek = parseFloat($row_src.find('input.objek-nilai').val());
            var nilai_objek_idr = parseFloat($row_src.find('input.objek-nilai-idr').val());
            
            var nilai_premi = hitungPremi(tipe_premi,rate,nilai_objek);
            var nilai_premi_idr = hitungPremi(tipe_premi,rate, nilai_objek_idr);
            
            //set nilai premi
            $row.find('input.premi-nilai').val(nilai_premi.toFixed(2));
            //set nilai premi idr
            $row.find('input.premi-nilai-idr').val(nilai_premi_idr.toFixed(2));
            
            //hitung total nilai IDR
            //get total gross-premi
//            var gross = totalNilai('#container-premi','input.premi-nilai-idr');
//            
//            $('#total-premi-idr').val(gross.toFixed(3));
            totalNilai('#container-premi','input.premi-nilai-idr','#total-premi-idr');
            
            setTotalPremi();
        });
        $('#container-premi').on('change','select.premi-tipe',function(){
            $(this).parents('.row-premi').find('input.premi-rate').trigger('change');
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
            $new.insertBefore($row);
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
            
            setTotalPremi();
        });
        $('#container-biayalain').on('click','.btn-biayalain-hitung', function(){
            totalNilai('#container-biayalain', 'input.biayalain-nilai-idr', '#total-biayalain-idr');
        });
        
        /* ASURADUR */
        $('#container-asuradur').on('click','button.btn-asuradur-tambah', function(){
            //destroy select2 componenet before clone
            $('#container-asuradur .select2').select2('destroy');
            
            var $row = $(this).parents('.row-asuradur');
            var $new = $row.clone(true);
            
            //change attribute of new
            $new.find('input.asuradur-persen').val(0).prop('disabled',false);
            $new.find('input.asuradur-leader').prop('checked', false);
            $new.find('span.asuradur-leader-label').html('<i></i> Member');
            $new.find('input.asuradur-komisi-persen').val(0);
            $new.find('input.asuradur-komisi-idr').val(0);

            //change attribute of button current row
            $(this).removeClass('btn-success').addClass('btn-danger').addClass('btn-asuradur-hapus')
                    .removeClass('btn-asuradur-tambah').attr('title','Hapus asuradur')
                    .find('span').removeClass('fa-plus').addClass('fa-minus');
            
            //put new row to the last
            $new.insertBefore($row);
            
            $('#container-asuradur .select2').select2();
        });
        $('#container-asuradur').on('click','button.btn-asuradur-hapus', function(){
            if ($('#container-asuradur .row-asuradur').length==1){
                alert('Minimal harus ada satu asuradur penanggung');
                return false;
            }
            
            var $row = $(this).parents('.row-asuradur');
            var change_leader = false;
            var persen = parseFloat($row.find('input.asuradur-persen').val());
            
            //check if is a leader
            if ($row.find('input.asuradur-leader').prop('checked')){
                //remove the row
                $row.remove();
                //set first row became leader
                $('#container-asuradur input.asuradur-leader').eq(0).prop('checked', true).next('span.asuradur-leader-label').html('<i></i> Leader');
                //$(this).next('span.asuradur-leader-label').html('<i></i> Leader');
                var $persen_input = $('#container-asuradur input.asuradur-persen').eq(0);
                var new_persen = parseFloat($persen_input.val())+persen;
                $persen_input.val(new_persen).prop('disabled', true);
            }else{
                //iterate leader
                $('#container-asuradur input.asuradur-leader').each(function (index){
                    if ($(this).prop('checked')){
                        var new_persen = parseFloat($('#container-asuradur input.asuradur-persen').eq(index).val())+persen;
                        $('#container-asuradur input.asuradur-persen').eq(index).val(new_persen);
                    }
                });
                //remove the row
                $row.remove();
            }
        });
        $('#container-asuradur').on('click', '.asuradur-leader', function(){
            if ($(this).prop('checked')){
                //change label
                $('#container-asuradur').find('span.asuradur-leader-label').html('<i></i> Member');
                $(this).next('span.asuradur-leader-label').html('<i></i> Leader');
                //set enable for member persentase
                $('#container-asuradur').find('input.asuradur-persen').prop('disabled', false);
                //set disable for persentase leader
                $(this).parents('.row-asuradur').find('input.asuradur-persen').prop('disabled',true);
            }
        });
        $('#container-asuradur').on('keyup', 'input.asuradur-persen', function(){
            $(this).trigger('change');
        });
        $('#container-asuradur').on('change', 'input.asuradur-persen', function(){
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
            
            $(this).parents('.row-asuradur').find('input.asuradur-komisi-persen').trigger('change');
        });
        $('#container-asuradur').on('change','input.asuradur-komisi-persen', function (){
            //count komisi for this row
            var totalPremi = $('#container-asuradur').find('input.asuradur-total-premi').val() ? parseFloat($('#container-asuradur').find('input.asuradur-total-premi').val()) : 0;
            var $row = $(this).parents('.row-asuradur');
            var persen_asuradur = $row.find('input.asuradur-persen').val() ? parseFloat($row.find('input.asuradur-persen').val()) : 0;
            var persen_komisi = $row.find('input.asuradur-komisi-persen').val() ? parseFloat($row.find('input.asuradur-komisi-persen').val()) : 0;
            var komisi = (persen_asuradur / 100) * totalPremi * (persen_komisi / 100) ;
            $row.find('input.asuradur-komisi-idr').val(komisi);
            
            //show total premi komisi idr
            totalNilai('#container-asuradur', 'input.asuradur-komisi-idr', '#total-asuradur-komisi-idr');
            
            //update in broker view
            setBrokerTotalKomisi();
        });
        $('#container-asuradur').on('keyup','input.asuradur-komisi-persen', function (){
            $(this).trigger('change');
        });
        
        /* BROKER */
        $('#container-broker').on('click','button.btn-broker-tambah', function(){
            //destroy select2 componenet before clone
            $('#container-broker .select2').select2('destroy');
            
            var $row = $(this).parents('.row-broker');
            var $new = $row.clone(true);
            
            //change attribute of new
            $new.find('input.broker-persen').val(0).prop('disabled',false);
            $new.find('input.broker-leader').prop('checked', false);
            $new.find('span.broker-leader-label').html('<i></i> Member');

            //change attribute of button current row
            $(this).removeClass('btn-success').addClass('btn-danger').addClass('btn-broker-hapus')
                    .removeClass('btn-broker-tambah').attr('title','Hapus broker')
                    .find('span').removeClass('fa-plus').addClass('fa-minus');
            
            //put new row to the last
            $new.insertBefore($row);
            
            $('#container-broker .select2').select2();
        });
        $('#container-broker').on('click','button.btn-broker-hapus', function(){
            if ($('#container-broker .row-broker').length==1){
                alert('Minimal harus ada satu broker');
                return false;
            }
            
            var $row = $(this).parents('.row-broker');
            var change_leader = false;
            var persen = parseFloat($row.find('input.broker-persen').val());
            
            //check if is a leader
            if ($row.find('input.broker-leader').prop('checked')){
                //remove the row
                $row.remove();
                //set first row became leader
                $('#container-broker input.broker-leader').eq(0).prop('checked', true).next('span.broker-leader-label').html('<i></i> Leader');
                //$(this).next('span.asuradur-leader-label').html('<i></i> Leader');
                var $persen_input = $('#container-broker input.broker-persen').eq(0);
                var new_persen = parseFloat($persen_input.val())+persen;
                $persen_input.val(new_persen).prop('disabled', true);
            }else{
                //iterate leader
                $('#container-broker input.broker-leader').each(function (index){
                    if ($(this).prop('checked')){
                        var new_persen = parseFloat($('#container-broker input.broker-persen').eq(index).val())+persen;
                        $('#container-broker input.broker-persen').eq(index).val(new_persen);
                    }
                });
                //remove the row
                $row.remove();
            }
        });
        $('#container-broker').on('click', '.broker-leader', function(){
            if ($(this).prop('checked')){
                //change label
                $('#container-broker').find('span.broker-leader-label').html('<i></i> Member');
                $(this).next('span.broker-leader-label').html('<i></i> Leader');
                //set enable for member persentase
                $('#container-broker').find('input.broker-persen').prop('disabled', false);
                //set disable for persentase leader
                $(this).parents('.row-broker').find('input.broker-persen').prop('disabled',true);
            }
        });
        $('#container-broker').on('keyup', 'input.broker-persen', function(){
            $(this).trigger('change');
        });
        $('#container-broker').on('change', 'input.broker-persen', function(){
            var totalKomisiBroker = $('#container-broker').find('input.broker-total-komisi').val() ? parseFloat($('#container-broker').find('input.broker-total-komisi').val()) : 0;
            //get leader 
            var $leader;
            var member = 0;
            $('#container-broker .broker-leader').each(function(){
                if ($(this).prop('checked')){
                    $leader = $(this).parents('.row-broker');
                }else{
                    member += parseFloat($(this).parents('.row-broker').find('input.broker-persen').val());
                }
            });
            var persentaseLeader = 100 - member;
            $leader.find('input.broker-persen').val(persentaseLeader);
            $leader.find('input.broker-idr').val(parseFloat((persentaseLeader/100) * totalKomisiBroker));
            if(persentaseLeader <= 0){
                alert('Persentase leader telah mencapai kurang atau sama dengan nol. Silahkan ganti persentase member');
                return false;
            }
            
            var persenShare = $(this).parents('.row-broker').find('input.broker-persen').val() ? parseFloat($(this).parents('.row-broker').find('input.broker-persen').val()) : 0;
            var shareKomisi = totalKomisiBroker * (persenShare / 100);
            $(this).parents('.row-broker').find('input.broker-idr').val(shareKomisi);
        });
    });
    
    function totalNilai(parent, selector, target){
        var total = 0.00;
        $(parent +' '+ selector).each(function (){
            total += parseFloat($(this).val());
        });
        
        if (target){
            $(target).val(total);
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
    
    function setTotalPremi(){
        var biayaLain = $('#total-biayalain-idr').val() ? parseFloat($('#total-biayalain-idr').val()) : 0;
        var gross = $('#total-premi-idr').val() ? parseFloat($('#total-premi-idr').val()) : 0;

        var totalPremi = gross + biayaLain;
        $('#container-asuradur').find('.asuradur-total-premi').each(function(){
            if ($(this).is('input')){
                $(this).val(totalPremi);
            }else{
                $(this).text(totalPremi);
            }
        });
    }
    
    function setBrokerTotalKomisi(){
        var totalKomisi = $('#total-asuradur-komisi-idr').val() ? parseFloat($('#total-asuradur-komisi-idr').val()) : 0;
        
        $('#container-broker').find('.broker-total-komisi').each(function(){
            if ($(this).is('input')){
                $(this).val(totalKomisi);
            }else{
                $(this).text(totalKomisi);
            }
        });
    }
</script>