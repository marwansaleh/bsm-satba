<link href="<?php echo get_asset_url('js/plugins/tree/themes/default-dark/style.min.css') ?>" rel="stylesheet" type="text/css">

<div id="tree-manual">
    <?php echo draw_manual_tree($manuals); ?>
</div>


<script type="text/javascript">
    $(document).ready(function (){
        $('#tree-manual').jstree({
            "core": {
                "themes" : {
                        "name" : "default-dark",
                },
                'check_callback' : true
            }
        }).bind("select_node.jstree", function (e, data) {
            $('#jstree').jstree('save_state');
        }) 

        .on("activate_node.jstree", function(e,data){
            //alert(data.node.a_attr.href);
            window.location.href = data.node.a_attr.href;
        });
    });
</script>
<script src="<?php echo get_asset_url('js/plugins/tree/jstree.js') ?>"></script>