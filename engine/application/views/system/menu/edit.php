<div class="row">
    <div class="col-lg-12">
        <div class="widget">
            <div class="widget-header">
                <h3><?php echo $page_subtitle ? $page_subtitle:'Edit Data'; ?></h3>
            </div>
            <div class="widget-content clearfix">
                <form id="MyForm" method="POST" class="form-validation" action="<?php echo $submit_url; ?>">
                    <input type="hidden" name="id" value="<?php echo $item->id ? $item->id:0; ?>" />
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Select Module</label>
                                <select id="module" name="module" data-parent-selected="<?php echo $item->parent; ?>" class="form-control selectpicker show-tick"" data-live-search="true" data-size="5">
                                    <?php foreach ($modules as $module): ?>
                                    <option value="<?php echo $module->id; ?>" <?php echo $module->id==$item->module?'selected':''; ?>><?php echo $module->title; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Select Parent Menu</label>
                                <select id="parent" name="parent" class="form-control selectpicker show-tick"" data-live-search="true" data-size="5">
                                    <!--filled up by ajax -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu Caption</label>
                                <input type="text" name="caption" class="form-control" value="<?php echo $item->caption; ?>" maxlength="30" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $item->title; ?>" maxlength="254" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label>Menu Icon</label>
                                <input type="text" name="icon" class="form-control" value="<?php echo $item->icon; ?>" />
                                <div class="well well-sm">
                                    <?php foreach ($icons as $icon): ?>
                                    <button type="button" data-icon="<?php echo $icon; ?>" class="btn-select-icon btn <?php echo $icon==$item->icon ? 'btn-primary':'btn-default'; ?>">
                                        <i class="fa <?php echo $icon; ?>"></i></button>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Sort Index</label>
                                <input type="number" step="1" min="0" name="sort" class="form-control" value="<?php echo $item->sort; ?>" />
                            </div>
                            <div class="form-group">
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="hidden" value="1" <?php echo $item->hidden==1?'checked="checked"':'' ?>>
                                    <span>Hide menu</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control" value="<?php echo $item->link; ?>" />
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
    $(document).ready(function(){
        //load init parent menu
        load_menu_parent($('#module').val(), $('#module').attr('data-parent-selected'));
        
        $('form.form-validation').validate({
            rules: {
                caption: {
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
        $('#module').on('change', function(){
            load_menu_parent($(this).val(),$(this).attr('data-parent-selected'));
            
        });
        $('button.btn-select-icon').on('click', function(){
            var icon_name = $(this).attr('data-icon');
            $('input[name="icon"]').val(icon_name);
        });
    });
    
    function load_menu_parent(module_id,parent_selected){
        $.getJSON('<?php echo get_action_url('system/menu/select_parent_menu'); ?>/'+module_id, function(data){
            $('#parent').empty();

            var s = '<optgroup label="'+data.module_name+'">';
            for (var i in data.items){
                s+= '<option value="'+data.items[i].id+'"'+(data.items[i].parent==parent_selected?' selected':'')+'>'+data.items[i].caption+'</option>';
            }
            s+= '</optgroup>'

            $('#parent').append(s);

            $('#parent').selectpicker('refresh');
        });
    }
</script>