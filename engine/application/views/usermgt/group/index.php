<div class="row">
    <div class="col-lg-12">
        <table id="myDataTable" class="table table-hover table-striped" role="grid">
            <thead>
                <tr role="row">
                    <th>#</th>
                    <th>Nama Grup</th>
                    <th>Removable</th>
                    <th>Jumlah Users</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Kelola Hak Akses Grup User</h4>
            </div>
            <div class="modal-body">
                <!-- filled up by ajax -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var module = 'group';
    var dataTable = null;
    $(document).ready(function(){
        dataTable = $('#myDataTable').DataTable({
            searching: true,
            dom: 'B<"clear">lfrtip',
            buttons:{
                name: 'primary',
                buttons: [
                    { text: '<i class="fa fa-plus"></i> Tambah', action: tambah},
                    { text: '<i class="fa fa-edit"></i> Edit', action: edit},
                    { text: '<i class="fa fa-remove"></i> Hapus', action: hapus},
                    { text: '<i class="fa fa-key"></i> Access', action: privilege},
                    { text: '<i class="fa fa-recycle"></i> Reload', action: reload},
                    //{ extend: 'copyHtml5', text:'Copy', title: 'satba-'+module},
                    { extend: 'csvHtml5', text:'CSV', title: 'satba-'+module},
                    { extend: 'excelHtml5', text:'Excel', title: 'satba-'+module},
                    { extend: 'pdfHtml5', text:'PDF', title: 'satba-'+module},
                    { extend: 'print', text:'Print'},
                    { extend: 'colvis', text:'Visibility'},
                ]
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?php echo get_action_url('service/dt/auth_group'); ?>",
                dataSrc: "items"
            },
            columns:[
                {data: "id", searchable: false, className: 'dt-body-center', render: function (data, type, full, meta){
                     return '<input type="checkbox" name="id[]" value="'+ data + '">';
                }},
                {data: "name"},
                {data: "removable_label"},
                {data: "user_count"},
            ]
        });
    });
    function reload(reset){
        if (!reset){ reset = false; }
        if (dataTable){
            dataTable.ajax.reload(null,reset);
        }
    }
    
    function tambah(){
        window.location.href = module + '/edit';
    }
    function edit(){
        if ($(':checkbox:checked').length == 0){
            alert('Pilih record yang ingin diubah dengan mencentang');
            return;
        }
        var id =[];
        $(':checkbox:checked').each(function (){
            id.push($(this).val());
        });
        window.location = module +'/edit/'+id[0];
    }
    
    function hapus(){
        if ($(':checkbox:checked').length == 0){
            alert('Pilih record yang ingin diubah dengan mencentang');
            return;
        }
        var id =[];
        $(':checkbox:checked').each(function (){
            id.push($(this).val());
        });
        
        if (confirm('Hapus '+id.length+' record terpilih ?')){
            alert('Hapus '+id.length+' record');
        }
    }
    
    function privilege(){
        if ($(':checkbox:checked').length == 0){
            alert('Pilih grup yang ingin diubah hak akses dengan mencentang');
            return;
        }
        var id =[];
        $(':checkbox:checked').each(function (){
            id.push($(this).val());
        });
        
        $('#myModal').modal('show');
        $('#myModal .modal-body').load('<?php echo get_action_url('usermgt/group/privilege'); ?>/'+id[0]);
    }
</script>