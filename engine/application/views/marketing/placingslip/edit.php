<div class="row">
    <div class="col-lg-12">
        <div class="widget">
            <div class="widget-header">
                <h3>Edit Placing Slip</h3>
            </div>
            <div class="widget-content clearfix">
                <form id="MyForm" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Date of Document</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control datepicker" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Type of Insurance</label>
                                <select name="typeOfInsurance" class="form-control selectpicker" data-live-search="true" data-size="5">
                                    <option value="1">Fire</option>
                                    <option value="2">Fire Special Risk</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Slip Number</label>
                        <input type="text" class="form-control" name="slipnumber" />
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Sales Name</label>
                                <select class="form-control selectpicker" data-live-search="true" data-size="5">
                                    <option value="1">NA. KHOLIG</option>
                                    <option value="2">RAHMAT KOHARUDIN</option>
                                    <option value="2">ROBBY CAHYADI</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Sources of Business</label>
                                <select class="form-control selectpicker" data-live-search="true" data-size="5">
                                    <option value="1">ABEPURA</option>
                                    <option value="2">AGUNG DWI LUKITO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Perhitungan Komisi</label>
                                <select class="form-control">
                                    <option value="1">Dari Premi Objek</option>
                                    <option value="2">Dari Premi Asuradur</option>
                                </select>
                            </div>
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