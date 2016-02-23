<div class="row">
    <div class="col-lg-12">
        <div class="widget">
            <div class="widget-header">
                <h3><?php echo $page_subtitle ? $page_subtitle:'Edit Data'; ?></h3>
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#tab-basic" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-alt"></i> Basic Data</a></li>
                    <li class=""><a href="#tab-pertanggungan" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Pertanggungan</a></li>
                    <li class=""><a href="#tab-premi" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Premi</a></li>
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
                                    <select id="sumber_bisnis" name="sumber_bisnis" data-parent-selected="<?php echo $item->sumber_bisnis; ?>" class="form-control selectpicker show-tick"" data-live-search="true" data-size="5">
                                        <?php foreach ($sumber_bisnis as $sb): ?>
                                        <option value="<?php echo $sb->id; ?>" <?php echo $sb->id==$item->sumber_bisnis?'selected':''; ?>><?php echo $sb->kode .' - '. $sb->nama; ?></option>
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
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Periode</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" readonly="true" id="datepicker" class="form-control datepicker text-primary" name="periode_mulai" value="<?php echo $item->periode_mulai; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>S/d</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" readonly="true" id="datepicker" class="form-control datepicker text-primary" name="periode_akhir" value="<?php echo $item->periode_akhir; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Persetujuan</label>
                                        <div class="checkbox">
                                            <label class="control-inline fancy-radio">
                                                <input type="radio"  name="persetujuan" value="pusat" <?php echo $item->persetujuan=='pusat'?'checked':''; ?>>
                                                <span><i></i>Kantor Pusat</span>
                                            </label>
                                            <label class="control-inline fancy-radio">
                                                <input type="radio"  name="persetujuan" value="cabang" <?php echo $item->persetujuan=='cabang'?'checked':''; ?>>
                                                <span><i></i>Cabang</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Mata uang</label>
                                        <select class="form-control" name="mata_uang">
                                            <?php foreach ($mata_uang as $mu): ?>
                                            <option value="<?php echo $mu->id; ?>" title="<?php echo $mu->nama; ?>" <?php echo $item->mata_uang==$mu->id ? 'selected':''; ?>>
                                                <?php echo $mu->id;?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Biaya lain-lain</label>
                                        <input type="number" class="form-control" name="biaya_lain" value="<?php echo $item->biaya_lain; ?>" />
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Komisi kembali</label>
                                        <input type="number" class="form-control" name="komisi_kembali" value="<?php echo $item->komisi_kembali; ?>" />
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
                                            <input type="text" disabled="true" class="form-control disabled input-objek-pertanggungan" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="number" class="form-control text-right premi-rate" name="premi_rate[]" placeholder="Premi rate" />
                                                <div class="input-group-btn">
                                                    <select class="multiselect" name="premi_rate_type[]">
                                                        <option value="prosen">Prosen</option>
                                                        <option value="promil">Promil</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <input type="number" class="form-control text-right premi-nilai" name="premi_nilai[]" placeholder="Nilai premi">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="number" class="form-control text-right premi-nilai-idr" name="premi_nilai_idr[]" placeholder="Nilai premi IDR">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-success btn-premi" title="Tambah premi"><span class="fa fa-plus"></span></button>
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
                        <div class="tab-pane fade" id="tab-asuradur">
                            <legend>Asuradur / Penanggung</legend>
                        </div>
                        <div class="tab-pane fade" id="tab-broker">
                            <legend>Broker</legend>
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
    var module = 'menu';
    var PolisManager = {
        
    };
    $(document).ready(function(){
        //load init parent menu
        //load_menu_parent($('#module').val(), $('#module').attr('data-parent-selected'));
        
        $('form.form-validation').validate({
            rules: {
                nomor_polis: {
                    minlength: 2,
                    required: true
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            }
        });
        
        $('#container-objek-pertanggungan').on('change', 'select', function (){
            $(this).parents('.row-objek').find('input.objek-nilai').trigger('keyup');
        });
        $('#container-objek-pertanggungan').on('change', 'input.objek-nilai', function(){$(this).trigger('keyup')});
        $('#container-objek-pertanggungan').on('keyup', 'input.objek-nilai', function(){
            var matauang = $(this).parents('.row-objek').find('select').val();
            var target = $(this).parents('.row-objek').find('input.objek-nilai-idr');
            
            KonversiMataUang.konversi(matauang, $(this), $(target));
            totalNilai('#container-objek-pertanggungan', 'input.objek-nilai-idr', '#total-pertanggungan-idr');
        });
        $('#container-objek-pertanggungan').on('click','button.btn-objek-tambah', function(){
            var $row = $(this).parents('.row-objek');
            var $new = $row.clone(true);
            
            //change attribute of new
            $new.find('input.objek-nama').val('');
            $new.find('input.objek-nilai').val(0);
            $new.find('input.objek-nilai-idr').val('0.00');
            
            //change attribute of button current row
            $(this).removeClass('btn-success').addClass('btn-danger').addClass('btn-objek-hapus')
                    .removeClass('btn-objek-tambah').attr('title','Hapus objek pertanggungan')
                    .find('span').removeClass('fa-plus').addClass('fa-minus');
            
            //put new row to the last
            $new.insertAfter($row);
        });
        $('#container-objek-pertanggungan').on('click','button.btn-objek-hapus', function(){
            var $row = $(this).parents('.row-objek');
            $row.remove();
            
            totalNilai('#container-objek-pertanggungan', 'input.objek-nilai-idr', '#total-pertanggungan-idr');
        });
        $('#container-objek-pertanggungan').on('click','.btn-objek-hitung', function(){
            totalNilai('#container-objek-pertanggungan', 'input.objek-nilai-idr', '#total-pertanggungan-idr');
        });
    });
    
    function totalNilai(parent, selector, target){
        var total = 0.00;
        $(parent +' '+ selector).each(function (){
            total += parseFloat($(this).val());
        });
        
        $(target).val(total.toFixed(2));
    }
    
</script>