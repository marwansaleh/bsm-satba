<h4><?php echo $group->name; ?></h4>
<table id="table-privilege" class="table table-condensed">
    <thead>
        <tr>
            <th>Role</th>
            <th>Deskripsi</th>
            <th>Akses</th>
        </tr>
    </thead>
    <tbody>
        <?php $group_role_curr = ''; $row_bg = 0; foreach ($roles as $group_role => $role_list): ?>
        <?php 
        if ($group_role_curr != $group_role){
            $group_role_curr = $group_role; $row_bg = ($row_bg >= count($bg)-1 ? 0:$row_bg+1); 
        }
        ?>
        <tr class="<?php echo $bg[$row_bg]; ?>">
            <td colspan="3"><small>MODULE: <?php echo ucfirst($group_role); ?></small></td>
        </tr>
        <?php foreach ($role_list as $role): ?>
        <tr class="<?php echo $bg[$row_bg]; ?>">
            <td><?php echo $role->caption; ?></td>
            <td><?php echo $role->title; ?></td>
            <td>
                <input type="checkbox" id="check_<?php echo $role->id;  ?>" data-parent="<?php echo $role->parent; ?>" data-group="<?php echo $group->id; ?>" value="<?php echo $role->id ?>" <?php echo $privileges[$role->id]?'checked="checked"':''; ?>>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $('table#table-privilege').on('click',':checkbox', function(){
            var granted = $(this).prop('checked') ? 1 : 0;
            var role_id = [];
            role_id.push($(this).val());
            
            var group_id = $(this).attr('data-group');
            
            if (granted && $(this).attr('data-parent')!='0'){
                if ($('#check_'+$(this).attr('data-parent')).prop('checked')!=true){
                    $('#check_'+$(this).attr('data-parent')).prop('checked',true);
                    role_id.push($('#check_'+$(this).attr('data-parent')).val());
                }
            }
            
            var _this = $(this);
            var url = '<?php echo get_action_url('usermgt/group/set_privilege'); ?>';
            $.getJSON(url,{group_id:group_id,role_id:role_id.join(),granted:granted}, function(result){
                if (result.is_admin){
                    alert('Grup Superadmin selalu memiliki akses ke semua fitur');
                }
                _this.prop('checked', result.granted);
            });
        });
    });
</script>