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
                            <div id="container-basic">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Bulan Laporan</label>
                                            <select name="bulan_laporan" class="form-control">
                                                <?php foreach($daftar_bulan as $bulan => $nama): ?>
                                                <option value="<?php echo $bulan; ?>" <?php echo $bulan==$item->bulan_laporan?'selected':''; ?>><?php echo $nama; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tahun Laporan</label>
                                            <select name="tahun_laporan" class="form-control">
                                                <?php foreach($daftar_tahun as $tahun): ?>
                                                <option value="<?php echo $tahun; ?>" <?php echo $bulan==$item->tahun_laporan?'selected':''; ?>><?php echo $tahun; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sumber Bisnis</label>
                                    <select id="select-sumber-bisnis" name="sumber_bisnis" class="form-control selectpicker select-sumber-bisnis" data-live-search="true" data-size="8">
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
                                        <select id="select-tertanggung" name="tertanggung" class="form-control selectpicker select-tertanggung" data-live-search="true" data-size="8">
                                            <?php foreach ($tertanggung as $tt): ?>
                                            <option value="<?php echo $tt->id; ?>" <?php echo $tt->id==$item->tertanggung?'selected':''; ?>><?php echo $tt->nama_lengkap; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="input-group-btn">
                                            <button type="button" id="btn-tertanggung-tambah" class="btn btn-success" title="Tambah tertanggung"><span class="fa fa-plus"></span></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Okupasi</label>
                                    <select id="select-okupasi" name="okupasi" class="form-control selectpicker select-okupasi" data-live-search="true" data-size="8">
                                            <?php foreach ($okupasi as $okp): ?>
                                            <option value="<?php echo $okp->id; ?>" <?php echo $okp->id==$item->okupasi?'selected':''; ?>><?php echo $okp->kode .' - ' . $okp->deskripsi; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Asuransi</label>
                                    <select id="seelct-jenis-asuransi" name="jenis_asuransi" class="form-control selectpicker select-jenis-asuransi" data-live-search="true" data-size="8">
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
                                            <label>Currency</label>
                                            <select class="form-control matauang-komisi-kembali" name="matauang_komisi_kembali">
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
                                            <input type="text" class="form-control text-right komisi-kembali number" name="komisi_kembali" value="<?php echo $item->komisi_kembali; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Sales / AO</label>
                                            <select class="form-control selectpicker select-sales" name="sales" data-live-search="true" data-size="8">
                                                <?php foreach ($sales_group as $sg): ?>
                                                <optgroup label="<?php echo $sg->nama; ?>">
                                                    <?php foreach ($sg->sales as $sa): ?>
                                                    <option value="<?php echo $sa->id; ?>" <?php echo $item->sales==$sa->id ? 'selected':''; ?>>
                                                        <?php echo $sa->nama;?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Angsur ?</label>
                                            <select name="cicil" class="form-control">
                                                <option value="0">Tidak</option>
                                                <option value="1">Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- objek pertanggungan -->
                        <div class="tab-pane fade" id="tab-pertanggungan">
                            <legend>Objek Pertanggungan</legend>
                            <div id="container-objek-pertanggungan" class="container-input-appendable">
                                <div class="row hidden-xs">
                                    <div class="col-lg-5"><div class="form-group"><label>Objek pertanggungan</label></div></div>
                                    <div class="col-lg-1"><div class="form-group"><label>Currency</label></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Nilai objek</label></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Nilai (IDR)</span></label></div></div>
                                </div>
                                <div class="row row-objek">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control objek-nama" name="objek_nama[]" value="" maxlength="50">
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
                                            <input type="text" class="form-control text-right objek-nilai number" name="objek_nilai[]" placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span>IDR</span>
                                                </div>
                                                <input type="text" disabled="true" class="form-control text-right objek-nilai-idr number disabled" name="objek_nilai_idr[]" placeholder="0.00">
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
                                <div class="row hidden-xs">
                                    <div class="col-lg-4"><div class="form-group"><label>Nama objek</label></div></div>
                                    <div class="col-lg-1"><div class="form-group"><label>Tipe</label></div></div>
                                    <div class="col-lg-1"><div class="form-group"><label>Rate</label></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Premi</label></div></div>
                                    <div class="col-lg-3"><div class="form-group"><label>Premi IDR</label></div></div>
                                </div>
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
                                <div class="row hidden-xs">
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
                                            <input type="text" readonly="true" id="total-biayalain-idr" name="total_biayalain_idr" class="form-control text-right number">
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
                                    <div class="col-lg-12">
                                        <div class="alert alert-info">
                                            <strong>Total premi (gross + biaya lain) = IDR.<span class="asuradur-total-premi number">0.00</span></strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row hidden-xs">
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
                                            <select name="asuradur[]" class="form-control selectpicker select-asuradur" data-live-search="true">
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
                                    <input type="hidden" name="broker_total_komisi_kembali" class="broker-total-komisi-kembali" />
                                    <input type="hidden" name="broker_total_komisi_net" class="broker-total-komisi-net" />
                                    <input type="hidden" name="broker_bsm_komisi_net" class="broker-bsm-komisi-net" />
                                    <div class="col-lg-4">
                                        <div class="alert alert-info">
                                            <strong>Komisi Broker (gross) = IDR.<span class="broker-total-komisi number">0.00</span></strong>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="alert alert-warning">
                                            <strong>Komisi kembali = IDR.<span class="broker-total-komisi-kembali number">0.00</span></strong>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="alert alert-success">
                                            <strong>Komisi Broker (net) = IDR.<span class="broker-total-komisi-net number">0.00</span></strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row hidden-xs">
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
                                            <select id="select-broker-array" name="broker[]" class="form-control selectpicker select-broker" data-live-search="true">
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

<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Tertanggung</h4>
            </div>
            <div class="modal-body">
                <div id="container-tertanggung">
                    <form method="post" id="formTertanggung" action="<?php echo site_url('service/dt/mtr_tertanggung'); ?>">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nama depan</label>
                                    <input type="text" id="nama_depan" name="nama_depan" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nama tengah</label>
                                    <input type="text" id="nama_tengah" name="nama_tengah" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nama belakang</label>
                                    <input type="text" id="nama_belakang" name="nama_belakang" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Propinsi</label>
                                    <select id="select_propinsi" name="propinsi" class="form-control selectpicker select-propinsi" data-live-search="true">
                                        <?php foreach ($propinsi as $pv): ?>
                                        <option value="<?php echo $pv->id; ?>"><?php echo $pv->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Kabupaten / Kota</label>
                                    <select id="select_kabupaten" name="kabupaten" class="form-control selectpicker select-kabupaten" data-live-search="true">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" id="kode_pos" name="kode_pos" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Telpon</label>
                                    <input type="text" id="telepon" name="telepon" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" id="mobile" name="mobile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input type="text" id="fax" name="fax" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="btn-simpan-tertanggung">Save</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var PolisManagement = {
        _BSM_Broker_Id: 0,
        get BSM_Broker_Id(){
            return this._BSM_Broker_Id;
        },
        set BSM_Broker_Id(x){
            this._BSM_Broker_Id = x;
        },
        _totalPremiNet: 0,
        get totalPremiNet(){
            return this._totalPremiNet;
        },
        set totalPremiNet(x){
            this._totalPremiNet = x ? parseFloat(x) : 0;
        },
        _totalKomisiIdr: 0,
        get totalKomisiIdr(){
            return this._totalKomisiIdr;
        },
        set totalKomisiIdr(x){
            this._totalKomisiIdr = x ? parseFloat(x) : 0;
        },
        _komisiKembaliIdr: 0,
        get komisiKembaliIdr(){
            return this._komisiKembaliIdr;
        },
        set komisiKembaliIdr(x){
            this._komisiKembaliIdr = x ? parseFloat(x) : 0;
        },
        _totalKomisiBrokerIdr: 0,
        get totalKomisiBrokerIdr(){
            return this._totalKomisiBrokerIdr;
        },
        set totalKomisiBrokerIdr(x){
            this._totalKomisiBrokerIdr = x ? parseFloat(x) : 0;
        },
        _BSM_komisi_net: 0,
        get BSM_komisi_net(){
            return this._BSM_komisi_net;
        },
        set BSM_komisi_net(x){
            this._BSM_komisi_net = x ? parseFloat(x) : 0;
        },
        init: function(){
            //number formatter
            $('input.number').number(true,2);
            $('span.number').number(true,2);
            
            //set form validation
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
                    tertanggung: {
                        require: true
                    },
                    'broker[]': {
                        required: true
                    },
                    'asuradur[]': {
                        
                    }
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                }
            });
            
            $('#formTertanggung').validate({
                ignore: [],
                rules: {
                    nama_depan: { required: true }
                },
                submitHandler: function(form){
                    $(form).ajaxSubmit({
                        dataType: 'json',
                        success: function(data){
                            if (data.success){
                                PolisManagement.tertanggungSaveSuccess();
                            }else{
                                alert(data.message);
                            }
                        }
                    });
                }
            });
            
            //select tertanggung to select2
            //this.tertanggungLoadData();
            
            //get totalPremiNet and totalKomisiNet
            this.totalPremiNet = $('#container-asuradur').find('input.asuradur-total-premi').val();
            this.totalKomisiIdr = $('#container-asuradur').find('input#total-asuradur-komisi-idr').val();
            this.komisiKembaliIdr = $('#container-asuradur').find('input.total-asuradur-komisi-idr').val();
            this.totalKomisiBrokerIdr = $('#container-broker').find('input.broker-total-komisi-net').val();
            this.BSM_Broker_Id = 1;
            this.BSM_komisi_net = $('#container-broker').find('input.broker-bsm-komisi-net').val();
            
            //this.tertanggungLoadData();
            //modal tertanggung
            this.tertanggungLoadKabupaten($('#container-tertanggung').find('select.select-propinsi').val());
        },
        tertanggungOpenWindow: function(){
            $('form#formTertanggung *').filter(':input').each(function(){
                if ($(this).is('input')){ $(this).val(''); }
            });
            $('#myModal').modal('show');
        },
        tertanggungLoadKabupaten: function(propinsi){
            var $select = $('#container-tertanggung').find('select.select-kabupaten');
            
            $.getJSON("<?php echo site_url('service/dt/mtr_kabupaten/byprovince'); ?>/"+propinsi,function(data){
                $select.empty();
                for (var i in data){
                    $select.append('<option value="'+data[i].id+'">'+data[i].nama+'</option>');
                }
                $select.selectpicker('refresh');
            });
        },
        tertanggungSaveSuccess: function(){
            this.tertanggungLoadData();
            
            //hide modal
            $('#myModal').modal('hide');
        },
        tertanggungLoadData: function(){
            var $select = $('#container-basic').find('select.select-tertanggung');
            var selected_value = $select.val();
            
            $.getJSON('<?php echo get_action_url('service/dt/mtr_tertanggung/all'); ?>',function(data){
                $select.empty();
                for(var i in data){
                    $select.append('<option value="'+data[i].id+'"'+(selected_value==data[i].id ? ' selected':'')+'>'+data[i].nama_lengkap+'</option>');
                    console.log(data[i].nama_lengkap);
                }
                
                $select.selectpicker('refresh');
            });
        },
        getTotalNilai: function(parent_container, selector){
            var total = 0;
            $(parent_container +' '+ selector).each(function (){
                total += parseFloat($(this).val());
            });

            return total;
        },
        updateKomisiKembali: function(){
            //get nilai komisi kembali di tab basic
            var curr_kembali = $('#container-basic').find('select.matauang-komisi-kembali').val();
            var nilai_kembali = $('#container-basic').find('input.komisi-kembali').val() ? parseFloat($('#container-basic').find('input.komisi-kembali').val()) : 0;
            var kembali_idr = KonversiMataUang.getConvert(curr_kembali, nilai_kembali);
            
            this._komisiKembaliIdr = kembali_idr;
            
            this.brokerUpdateTotalKomisiNet();
        },
        updateObjekPertanggunganSingle: function(index){
            //get row
            var $row = $('#container-objek-pertanggungan').find('.row-objek').eq(index);
            var matauang = $row.find('select.objek-matauang').val();
            var nilai = $row.find('input.objek-nilai').val() ? parseFloat($row.find('input.objek-nilai').val()) : 0;
            var nilai_idr = KonversiMataUang.getConvert(matauang, nilai);
            
            console.log('objek nilai:'+nilai,' idr:'+nilai_idr);
            //set nilai objek
            $row.find('input.objek-nilai-idr').val(nilai_idr);
            
            //update nilai premi for this objek
            this.premiSingleUpdate(index);
            
            //update total nilai objek pertanggungan
            this.updateObjekPertanggunganAll();
        },
        updateObjekPertanggunganAll: function(){
            this.objekCalculateTotal();
        },
        objekTambah: function(index){
            var $row = $('#container-objek-pertanggungan').find('.row-objek').eq(index);
            var $new = $row.clone(true);
            
            //change attribute of new
            $new.find('input.objek-nama').val('');
            $new.find('input.objek-nilai').val('');
            $new.find('input.objek-nilai-idr').val('');
            
            //change attribute of button current row
            var $button = $row.find('button');
            $button.removeClass('btn-success').addClass('btn-danger').addClass('btn-objek-hapus')
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
        },
        objekRemove: function(index){
            var $row_objek = $('#container-objek-pertanggungan').find('.row-objek').eq(index);
            $row_objek.remove();
            
            //remove also premi row
            this.premiRemove(index);
            
            //update total objek
            this.updateObjekPertanggunganAll();
        },
        objekCalculateTotal: function(){
            var total = this.getTotalNilai('#container-objek-pertanggungan', 'input.objek-nilai-idr');
            console.log('Total pertanggungan idr:'+total);
            $('#container-objek-pertanggungan').find('#total-pertanggungan-idr').val(total);
        },
        objekNamaUpdate:function (index){
            this.premiNamaObjek(index);
        },
        premiNamaObjek: function(index){
            var $row = $('#container-premi').find('.row-premi').eq(index);
            var $row_objek = $('#container-objek-pertanggungan').find('.row-objek').eq(index);
            //update nama objek di premi
            var nama_objek = $row_objek.find('input.objek-nama').val();
            $row.find('input.objek-nama').val(nama_objek);
        },
        premiSingleUpdate: function(index){
            var $row = $('#container-premi').find('.row-premi').eq(index);
            
            var $row_objek = $('#container-objek-pertanggungan').find('.row-objek').eq(index);
            var objek_nilai = $row_objek.find('input.objek-nilai').val() ? parseFloat($row_objek.find('input.objek-nilai').val()) : 0;
            //update mata uang from selected in objek pertanggungan
            var matauang = $row_objek.find('select.objek-matauang').val();
            $row.find('span.premi-matauang').text(matauang);
            
            //update nilai premi berdasarkan mata uang dan rate
            var tipe_rate = $row.find('select.premi-tipe').val();
            var premi_rate = $row.find('input.premi-rate').val() ? parseFloat($row.find('input.premi-rate').val()) : 0;
            var premi = this.premiCalculate(tipe_rate, premi_rate, objek_nilai);
            $row.find('input.premi-nilai').val(premi);
            
            var premi_idr = KonversiMataUang.getConvert(matauang, premi);
            $row.find('input.premi-nilai-idr').val(premi_idr);
            
            //update nilai premi keseluruhan
            this.premiUpdateAll();
        },
        premiUpdateAll: function(){
            this.premiCalculateTotal();
            
            this.premiSetTotalNet();
        },
        premiRemove: function(index){
            var $row_premi = $('#container-premi').find('.row-premi').eq(index);
            $row_premi.remove();
            
            this.premiUpdateAll();
        },
        premiCalculate: function(tipe,rate,pertanggungan){
            var tipe_multiplier;
        
            if (tipe==='promil'){
                tipe_multiplier = 0.001;
            }else{
                tipe_multiplier = 0.01;
            }

            var nilai_premi = rate * tipe_multiplier * pertanggungan;

            return nilai_premi;
        },
        premiCalculateTotal: function(){
            var total_premi_idr = this.getTotalNilai('#container-premi', 'input.premi-nilai-idr');
            console.log('Total premi idr:'+total_premi_idr);
            
            $('#container-premi').find('#total-premi-idr').val(total_premi_idr);
        },
        premiSetTotalNet:function(){
            var premi_gross = $('#container-premi').find('input#total-premi-idr').val() ? parseFloat($('#container-premi').find('input#total-premi-idr').val()) : 0;
            var biaya_lain = $('#container-biayalain').find('input#total-biayalain-idr').val() ? parseFloat($('#container-biayalain').find('input#total-biayalain-idr').val()) : 0;
            var total_premi_net = premi_gross + biaya_lain;
            
            this.totalPremiNet = total_premi_net;
            
            console.log('premi:'+premi_gross+', biayalain:'+biaya_lain+', total premi:'+total_premi_net);
            $('#container-asuradur').find('span.asuradur-total-premi').text(total_premi_net).number(true,2);
            $('#container-asuradur').find('input.asuradur-total-premi').val(total_premi_net);
            
            this.asuradurUpdateAll();
        },
        biayaLainUpdate: function(index){
            var $row = $('#container-biayalain').find('.row-biayalain').eq(index);
            var matauang = $row.find('select').val();
            var nilai = $row.find('input.biayalain-nilai').val() ? parseFloat($row.find('input.biayalain-nilai').val()) : 0;
            var nilai_idr = KonversiMataUang.getConvert(matauang, nilai);
            console.log('Biaya lain idr:'+nilai_idr);
            
            $row.find('input.biayalain-nilai-idr').val(nilai_idr);
            
            this.biayaLainUpdateAll();
        },
        biayaLainUpdateAll: function(){
            this.biayaLainCalculateTotal();
            
            this.premiSetTotalNet();
        },
        biayaLainTambah: function(index){
            var $row = $('#container-biayalain').find('.row-biayalain').eq(index);
            var $new = $row.clone(true);
            
            //change attribute of new
            $new.find('input.biayalain-nama').val('');
            $new.find('input.biayalain-nilai').val('');
            $new.find('input.biayalain-nilai-idr').val('');
            
            //change attribute of button current row
            var $button = $row.find('button');
            $button.removeClass('btn-success').addClass('btn-danger').addClass('btn-biayalain-hapus')
                    .removeClass('btn-biayalain-tambah').attr('title','Hapus biaya lain')
                    .find('span').removeClass('fa-plus').addClass('fa-minus');
            
            //put new row to the last
            $new.insertBefore($row);
        },
        biayaLainHapus: function(index){
            var $row = $('#container-biayalain').find('.row-biayalain').eq(index);
            $row.remove();
            
            this.biayaLainUpdateAll();
        },
        biayaLainCalculateTotal: function(){
            var total_biaya_lain = this.getTotalNilai('#container-biayalain', 'input.biayalain-nilai-idr');
            console.log('Biaya lain idr total:'+total_biaya_lain);
            $('#container-biayalain').find('#total-biayalain-idr').val(total_biaya_lain);
        },
        asuradurGetAvailableId: function(){
            var asuradurs = [];
            var options = $('#container-asuradur').find('select.select-asuradur option');
            var available_values = $.map(options ,function(option) {
                return option.value;
            });
            
            $('#container-asuradur select.select-asuradur').each(function(){
                asuradurs.push($(this).val());
            });
            
            for (var i=0; i<available_values.length; i++){
                if (asuradurs.indexOf(available_values[i])<0){
                    console.log(available_values[i]);
                    return available_values[i];
                    break;
                }
            }
            
            return false;
        },
        asuradurTambah: function(index){
            var $row = $('#container-asuradur').find('.row-asuradur').eq(index);
            var $new = $row.clone(true);
            
            //set other asuradur selected
            var asuradur_id = this.asuradurGetAvailableId();
            if (asuradur_id){
                $new.find('select.select-asuradur').val(asuradur_id);
            }
            
            //change attribute of new
            $new.find('input.asuradur-persen').val(0).prop('disabled',false);
            $new.find('input.asuradur-leader').prop('checked', false).val(asuradur_id);
            $new.find('span.asuradur-leader-label').html('<i></i> Member');
            $new.find('input.asuradur-komisi-persen').val(0);
            $new.find('input.asuradur-komisi-idr').val(0);

            //change attribute of button current row
            var $button = $row.find('button.btn-asuradur-tambah');
            $button.removeClass('btn-success').addClass('btn-danger').addClass('btn-asuradur-hapus')
                    .removeClass('btn-asuradur-tambah').attr('title','Hapus asuradur')
                    .find('span').removeClass('fa-plus').addClass('fa-minus');
            
            //re init selectpicker
            var $selectPickers = $new.find('.selectpicker');
            $selectPickers.data('selectpicker', null);
            $new.find('.bootstrap-select').remove();
            $selectPickers.selectpicker();
            
            //put new row to the last
            $new.insertBefore($row);
            
            
        },
        asuradurHapus: function(index){
            var $row = $('#container-asuradur').find('.row-asuradur').eq(index);
            var persen = parseFloat($row.find('input.asuradur-persen').val());
            
            //check if is a leader
            var is_leader = $row.find('input.asuradur-leader').prop('checked');
            if (is_leader){
                //remove the row
                $row.remove();
                //set first row became leader
                $('#container-asuradur input.asuradur-leader').eq(0).prop('checked', true).next('span.asuradur-leader-label').html('<i></i> Leader');
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
            
            //$row.remove();
            
            this.asuradurUpdateAll();
        },
        asuradurUpdateShare: function(index){
            var $row = $('#container-asuradur').find('.row-asuradur').eq(index);
            
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
                
                //normalize share
                member = 0;
                $row.find('input.asuradur-persen').val(member);
                this.asuradurUpdateShare(index);
                
                return false;
            }
            
            this.asuradurUpdateKomisi(index);
            this.asuradurUpdateKomisiLeader();
        },
        asuradurUpdateKomisi: function(index){
            var totalPremi = this.totalPremiNet;
            
            //count komisi for this row
            var $row = $('#container-asuradur').find('.row-asuradur').eq(index);
            var persen_asuradur_share = $row.find('input.asuradur-persen').val() ? parseFloat($row.find('input.asuradur-persen').val()) : 0;
            var persen_komisi_broker = $row.find('input.asuradur-komisi-persen').val() ? parseFloat($row.find('input.asuradur-komisi-persen').val()) : 0;
            var komisi_broker_idr = (persen_asuradur_share / 100) * totalPremi * (persen_komisi_broker / 100) ;
            $row.find('input.asuradur-komisi-idr').val(komisi_broker_idr);
            
            
            //update in broker view
            this.asuradurCalculateKomisiTotal();
        },
        asuradurUpdateKomisiLeader: function(){
            var index_leader = 0;
            $('#container-asuradur .asuradur-leader').each(function(index){
                if ($(this).prop('checked')){
                    index_leader = index;
                }
            });
            
            this.asuradurUpdateKomisi(index_leader);
        },
        asuradurUpdateAll: function(){
            //update asuradur komisi based on premi change also
            var _this = this;
            $('#container-asuradur').find('.row-asuradur').each(function(index){
                _this.asuradurUpdateKomisi(index);
            });
            //this.asuradurCalculateKomisiTotal();
        },
        asuradurSetLeader: function(index){
            var $row = $('#container-asuradur').find('.row-asuradur').eq(index);
            
            if ($row.find('input.asuradur-leader').prop('checked')){
                //change all label to member
                $('#container-asuradur').find('span.asuradur-leader-label').html('<i></i> Member');
                
                //change label this row to leader
                $row.find('span.asuradur-leader-label').html('<i></i> Leader');
                
                //set enable for member persentase
                $('#container-asuradur').find('input.asuradur-persen').prop('disabled', false);
                
                //set disable for persentase leader
                $row.find('input.asuradur-persen').prop('disabled',true);
                
            }
        },
        asuradurCalculateKomisiTotal: function(){
            var total = this.getTotalNilai('#container-asuradur', 'input.asuradur-komisi-idr');
            console.log('Total asuradur komisi IDR:'+total);
            $('#container-asuradur').find('#total-asuradur-komisi-idr').val(total);
            
            this.totalKomisiIdr = total;
            
            this.brokerUpdateTotalKomisiNet();
        },
        asuradurSelectAsuradurId: function (index){
            var $row = $('#container-asuradur').find('.row-asuradur').eq(index);
            var asuradur_id = $row.find('select.select-asuradur').val();
            
            //set value of radio to this auradur
            $row.find('input.asuradur-leader').val(asuradur_id);
        },
        asuradurSelectChange: function(index){
            var $row = $('#container-asuradur').find('.row-asuradur').eq(index);
            var asuradur_id = $row.find('select.select-asuradur').val();
            var selected_asuradur_ids = [];
            var found = 0;
            
            $('#container-asuradur').find('.row-asuradur').each(function(){
                var id = $(this).find('select.select-asuradur').val();
                selected_asuradur_ids.push(id);
                if (id==asuradur_id){
                    found++;
                }
            });
            
            if (found > 1){
                alert('Tidak boleh ada dua asuradur yang sama');
                
                //re-iterate to get un-occupied ausradur
                var available_values = $.map($row.find('select.select-asuradur option') ,function(option) {
                    return option.value;
                });
                for (var i=0; i<available_values.length; i++){
                    if (selected_asuradur_ids.indexOf(available_values[i])<0){
                        $row.find('select.select-asuradur').val(available_values[i]).selectpicker('refresh');
                        
                        this.asuradurSelectAsuradurId(index);
                        break;
                    }
                }
            
                return false;
            }else{
                this.asuradurSelectAsuradurId(index);
            }
        },
        brokerGetAvailableId: function(){
            var brokers = [];
            var options = $('#container-broker').find('select.select-broker option');
            var available_values = $.map(options ,function(option) {
                return option.value;
            });
            
            $('#container-broker select.select-broker').each(function(){
                brokers.push($(this).val());
            });
            
            for (var i=0; i<available_values.length; i++){
                if (brokers.indexOf(available_values[i])<0){
                    console.log(available_values[i]);
                    return available_values[i];
                    break;
                }
            }
            
            return false;
        },
        brokerTambah: function(index){
            var $row = $('#container-broker').find('.row-broker').eq(index);
            var $new = $row.clone(true);
            
            //set other asuradur selected
            var broker_id = this.asuradurGetAvailableId();
            if (broker_id){
                $new.find('select.select-broker').val(broker_id);
            }
            
            //change attribute of new
            $new.find('input.broker-persen').val(0).prop('disabled',false);
            $new.find('input.broker-leader').prop('checked', false).val(broker_id);
            $new.find('span.broker-leader-label').html('<i></i> Member');

            //change attribute of button current row
            var $button = $row.find('button.btn-broker-tambah');
            $button.removeClass('btn-success').addClass('btn-danger').addClass('btn-broker-hapus')
                    .removeClass('btn-broker-tambah').attr('title','Hapus broker')
                    .find('span').removeClass('fa-plus').addClass('fa-minus');
            
            //re init selectpicker
            var $selectPickers = $new.find('.selectpicker');
            $selectPickers.data('selectpicker', null);
            $new.find('.bootstrap-select').remove();
            $selectPickers.selectpicker();
            
            //put new row to the last
            $new.insertBefore($row);
            this.brokerUpdateAll();
        },
        brokerHapus: function(index){
            var $row = $('#container-broker').find('.row-broker').eq(index);
            var change_leader = false;
            var persen = parseFloat($row.find('input.broker-persen').val());
            
            //check if is a leader
            var is_leader = $row.find('input.broker-leader').prop('checked');
            if (is_leader){
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
            
            //is it BSM ?
            var broker_id = $row.find('select.select-broker').val();
            if (broker_id == this.BSM_Broker_Id){
                this.brokerBSM(0);
            }
        },
        brokerUpdateTotalKomisiNet: function(){
            //update komisi premi
            var komisi_premi = this.totalKomisiIdr;
            $('#container-broker').find('input.broker-total-komisi').val(komisi_premi);
            $('#container-broker').find('span.broker-total-komisi').text(komisi_premi).number(true,2);
            
            //update nilai komisi kembali di tab broker
            var komisi_kembali_idr = this.komisiKembaliIdr;
            $('#container-broker').find('input.broker-total-komisi-kembali').val(komisi_kembali_idr);
            $('#container-broker').find('span.broker-total-komisi-kembali').text(komisi_kembali_idr).number(true,2);
            
            //get nilai komisi idr
            var komisi_net = komisi_premi - komisi_kembali_idr;
            this.totalKomisiBrokerIdr = komisi_net;
            //change total komisi (net)
            $('#container-broker').find('input.broker-total-komisi-net').val(komisi_net);
            $('#container-broker').find('span.broker-total-komisi-net').text(komisi_net).number(true,2);
            
            console.log('komisi_premi:'+komisi_premi+', kembali:'+komisi_kembali_idr+', net:'+komisi_net);
            
            this.brokerUpdateAll();
        },
        brokerUpdate: function(index){
            var totalKomisiBroker = this.totalKomisiBrokerIdr;
            
            //count komisi broker for this row
            var $row = $('#container-broker').find('.row-broker').eq(index);
            var persen_broker_share = $row.find('input.broker-persen').val() ? parseFloat($row.find('input.broker-persen').val()) : 0;
            var komisi_broker_idr = totalKomisiBroker * (persen_broker_share / 100);
            $row.find('input.broker-idr').val(komisi_broker_idr);
            
            //is it BSM ?
            var broker_id = $row.find('select.select-broker').val();
            if (broker_id == this.BSM_Broker_Id){
                this.brokerBSM(komisi_broker_idr);
            }
            //this.brokerUpdatePersenKomisiLeader();
        },
        brokerUpdateAll: function(){
            //update komisi broker based on komisi change on asuradur
            var _this = this;
            $('#container-broker').find('.row-broker').each(function(index){
                _this.brokerUpdate(index);
            });
        },
        brokerUpdatePersenKomisi: function(index){
            var $row = $('#container-broker').find('.row-broker').eq(index);
            
            //get leader 
            var $leader;
            var member = 0;
            $('#container-broker .broker-leader').each(function(){
                if ($(this).prop('checked')){
                    $leader = $(this).parents('.row-broker').find('input.broker-persen');
                }else{
                    member += parseFloat($(this).parents('.row-broker').find('input.broker-persen').val());
                }
            });
            var persentaseLeader = 100 - member;
            $leader.val(persentaseLeader);
            if(persentaseLeader <= 0){
                alert('Persentase leader telah mencapai kurang atau sama dengan nol. Silahkan ganti persentase member');
                
                //normalize share
                member = 0;
                $row.find('input.broker-persen').val(member);
                this.brokerUpdate(index);
                
                return false;
            }
            
            this.brokerUpdateAll();
            //this.brokerUpdatePersenKomisiLeader();
        },
        brokerSetLeader: function(index){
            var $row = $('#container-broker').find('.row-broker').eq(index);
            var is_leader = $row.find('input.broker-leader').prop('checked');
            if (is_leader){
                //change all label to member
                $('#container-broker').find('span.broker-leader-label').html('<i></i> Member');
                //change this to leader
                $row.find('span.broker-leader-label').html('<i></i> Leader');
                //set enable for member persentase
                $('#container-broker').find('input.broker-persen').prop('disabled', false);
                //set disable for persentase leader
                $row.find('input.broker-persen').prop('disabled',true);
            }
        },
        brokerUpdatePersenKomisiLeader: function(){
            var index_leader = 0;
            $('#container-broker .asuradur-broker').each(function(index){
                if ($(this).prop('checked')){
                    index_leader = index;
                }
            });
            
            this.brokerUpdate(index_leader);
        },
        brokerBSM: function(komisi_idr){
            this.BSM_komisi_net = komisi_idr;
            $('#container-broker').find('input.broker-bsm-komisi-net').val(komisi_idr);
        },
        brokerSelectBrokerId: function (index){
            var $row = $('#container-broker').find('.row-broker').eq(index);
            var broker_id = $row.find('select.select-broker').val();
            
            //set value of radio to this auradur
            $row.find('input.broker-leader').val(broker_id);
            console.log(broker_id);
        },
        brokerSelectChange: function(index){
            var $row = $('#container-broker').find('.row-broker').eq(index);
            var asuradur_id = $row.find('select.select-broker').val();
            var selected_asuradur_ids = [];
            var found = 0;
            
            $('#container-broker').find('.row-broker').each(function(){
                var id = $(this).find('select.select-broker').val();
                selected_asuradur_ids.push(id);
                if (id==asuradur_id){
                    found++;
                }
            });
            
            if (found > 1){
                alert('Tidak boleh ada dua broker yang sama');
                
                //re-iterate to get un-occupied ausradur
                var available_values = $.map($row.find('select.select-broker option') ,function(option) {
                    return option.value;
                });
                for (var i=0; i<available_values.length; i++){
                    if (selected_asuradur_ids.indexOf(available_values[i])<0){
                        $row.find('select.select-broker').val(available_values[i]).selectpicker('refresh');
                        
                        this.brokerSelectBrokerId(index);
                        break;
                    }
                }
            
                return false;
            }else{
                this.brokerSelectBrokerId(index);
            }
        },
    };
    $(document).ready(function(){
        //make space wider by hidding left menu side bar
        $('.js-toggle-minified').trigger('click');
        PolisManagement.init();
        
        
        /* BASIC */
        $('#container-basic').on('click','#btn-tertanggung-tambah', function(){
            PolisManagement.tertanggungOpenWindow();
        });
        $('#container-basic').on('change','input.komisi-kembali', function(){
            PolisManagement.updateKomisiKembali();
        });
        $('#container-basic').on('keyup','input.komisi-kembali', function(){
            PolisManagement.updateKomisiKembali();
        });
        $('#container-basic').on('change','select.matauang-komisi-kembali', function(){
            PolisManagement.updateKomisiKembali();
        });
        /* Tertanggung */
        $('#container-tertanggung').on('change', 'select.select-propinsi', function(){
            PolisManagement.tertanggungLoadKabupaten($(this).val());
        });
        /* OBJEK PERTANGGUNGAN */
        $('#container-objek-pertanggungan').on('change', 'input.objek-nilai', function(){
            //get index
            var index = $('.row-objek').index($(this).parents('.row-objek'));
            PolisManagement.updateObjekPertanggunganSingle(index);
        });
        $('#container-objek-pertanggungan').on('change', 'select', function (){
            $(this).parents('.row-objek').find('input.objek-nilai').trigger('change');
        });
        $('#container-objek-pertanggungan').on('keyup', 'input.objek-nilai', function(){
            $(this).trigger('change');
        });
        $('#container-objek-pertanggungan').on('click','button.btn-objek-tambah', function(){
            var index = $('.row-objek').index($(this).parents('.row-objek'));
            PolisManagement.objekTambah(index);
        });
        $('#container-objek-pertanggungan').on('click','button.btn-objek-hapus', function(){
            var index = $('.row-objek').index($(this).parents('.row-objek'));
            PolisManagement.objekRemove(index);
        });
        $('#container-objek-pertanggungan').on('click','.btn-objek-hitung', function(){
            PolisManagement.objekCalculateTotal();
        });
        $('#container-objek-pertanggungan').on('keyup', 'input.objek-nama', function(){
            var index = $('.row-objek').index($(this).parents('.row-objek'));
            PolisManagement.objekNamaUpdate(index);
        });
        /* PREMI */
        $('#container-premi').on('change','input.premi-rate',function(){
            var index = $('.row-premi').index($(this).parents('.row-premi'));
            PolisManagement.premiSingleUpdate(index);
        });
        $('#container-premi').on('keyup','input.premi-rate', function(){
            $(this).trigger('change');
        });
        $('#container-premi').on('change','select.premi-tipe',function(){
            $(this).parents('.row-premi').find('input.premi-rate').trigger('change');
        });
        
        /* BIAYA LAIN */
        $('#container-biayalain').on('click','button.btn-biayalain-tambah', function(){
            var index = $('.row-biayalain').index($(this).parents('.row-biayalain'));
            PolisManagement.biayaLainTambah(index);
        });
        $('#container-biayalain').on('click','button.btn-biayalain-hapus', function(){
            var index = $('.row-biayalain').index($(this).parents('.row-biayalain'));
            PolisManagement.biayaLainHapus(index);
        });
        $('#container-biayalain').on('change', 'input.biayalain-nilai', function(){
            var index = $('.row-biayalain').index($(this).parents('.row-biayalain'));
            PolisManagement.biayaLainUpdate(index);
        });
        $('#container-biayalain').on('keyup', 'input.biayalain-nilai', function(){
            $(this).trigger('change');
        });
        $('#container-biayalain').on('change', 'select.biayalain-matauang', function (){
            $(this).parents('.row-biayalain').find('input.biayalain-nilai').trigger('change');
        });
        $('#container-biayalain').on('click','.btn-biayalain-hitung', function(){
            PolisManagement.biayaLainCalculate();
        });
        
        /* ASURADUR */
        $('#container-asuradur').on('click','button.btn-asuradur-tambah', function(){
            var index = $('.row-asuradur').index($(this).parents('.row-asuradur'));
            PolisManagement.asuradurTambah(index);
        });
        $('#container-asuradur').on('click','button.btn-asuradur-hapus', function(){
            var index = $('.row-asuradur').index($(this).parents('.row-asuradur'));
            PolisManagement.asuradurHapus(index);
            
        });
        $('#container-asuradur').on('click', '.asuradur-leader', function(){
            var index = $('.row-asuradur').index($(this).parents('.row-asuradur'));
            PolisManagement.asuradurSetLeader(index);
        });
        $('#container-asuradur').on('change', 'input.asuradur-persen', function(){
            var index = $('.row-asuradur').index($(this).parents('.row-asuradur'));
            PolisManagement.asuradurUpdateShare(index);
        });
        $('#container-asuradur').on('keyup', 'input.asuradur-persen', function(){
            $(this).trigger('change');
        });
        $('#container-asuradur').on('change','input.asuradur-komisi-persen', function (){
            var index = $('.row-asuradur').index($(this).parents('.row-asuradur'));
            PolisManagement.asuradurUpdateKomisi(index);
        });
        $('#container-asuradur').on('keyup','input.asuradur-komisi-persen', function (){
            $(this).trigger('change');
        });
        $('#container-asuradur').on('click','.btn-premi-komisi-hitung', function(){
            PolisManagement.asuradurCalculateKomisiTotal();
        });
        $('#container-asuradur').on('change','select.select-asuradur', function(){
            var index = $('.row-asuradur').index($(this).parents('.row-asuradur'));
            PolisManagement.asuradurSelectChange(index);
        });
        
        /* BROKER */
        $('#container-broker').on('click','button.btn-broker-tambah', function(){
            var index = $('.row-broker').index($(this).parents('.row-broker'));
            PolisManagement.brokerTambah(index);
        });
        $('#container-broker').on('click','button.btn-broker-hapus', function(){
            var index = $('.row-broker').index($(this).parents('.row-broker'));
            PolisManagement.brokerHapus(index);
        });
        $('#container-broker').on('click', '.broker-leader', function(){
            var index = $('.row-broker').index($(this).parents('.row-broker'));
            PolisManagement.brokerSetLeader(index);
        });
        $('#container-broker').on('keyup', 'input.broker-persen', function(){
            $(this).trigger('change');
        });
        $('#container-broker').on('change', 'input.broker-persen', function(){
            var index = $('.row-broker').index($(this).parents('.row-broker'));
            PolisManagement.brokerUpdatePersenKomisi(index);
        });
        $('#container-broker').on('change','select.select-broker', function(){
            var index = $('.row-broker').index($(this).parents('.row-broker'));
            PolisManagement.brokerSelectChange(index);
        });
    });
    
</script>