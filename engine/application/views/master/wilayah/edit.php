<div class="row">
    <div class="col-lg-12">
        <div class="widget">
            <div class="widget-header">
                <h3><?php echo $page_subtitle ? $page_subtitle:'Edit Data'; ?></h3>
            </div>
            <div class="widget-content clearfix">
                <form id="MyForm" method="POST" class="form-validation" action="<?php echo $submit_url; ?>">
                    <input type="hidden" name="id" value="<?php echo $item->id ? $item->id:0; ?>" autofocus="true" />
                    
                    <div class="form-group">
                        <label>Nama Wilayah</label>
                        <input type="text" name="wilayah" class="form-control" value="<?php echo $item->wilayah; ?>" maxlength="50" />
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
    var module = 'sumberbisnis';
    $(document).ready(function(){
        $.validator.addMethod('greaterThan', function (value, el, param) {
            return value > param;
        });
        $.validator.addMethod("checkboxRequired", function (value, element) {
            return (value != typeof undefined && value != false);
        });
        $('form.form-validation').validate({
            rules: {
                wilayah: {
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
    });
</script>