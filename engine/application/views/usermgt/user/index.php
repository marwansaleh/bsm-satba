<div class="row">
    <div class="col-lg-12">
        <table id="myDataTable" class="table table-hover table-striped" role="grid">
            <thead>
                <tr role="row">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Group</th>
                    <th>Last Login</th>
                    <th>Last IP</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var module = 'user';
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
                url: "<?php echo get_action_url('service/dt/auth_user'); ?>",
                dataSrc: "items"
            },
            columns:[
                {data: "id", searchable: false, className: 'dt-body-center', render: function (data, type, full, meta){
                     return '<input type="checkbox" name="id[]" value="'+ data + '">';
                }},
                {data: "name"},
                {data: "username"},
                {data: "group_name"},
                {data: "last_login"},
                {data: "last_ip"}
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
</script>