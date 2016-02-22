<div class="row">
    <div class="col-lg-12">
        <table id="myDataTable" class="table table-hover table-striped" role="grid">
            <thead>
                <tr role="row">
                    <th>#</th>
                    <th>DateTime</th>
                    <th>User</th>
                    <th>Group</th>
                    <th>Module</th>
                    <th>Event Type</th>
                    <th>Event Description</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var module = 'log';
    var dataTable = null;
    $(document).ready(function(){
        dataTable = $('#myDataTable').DataTable({
            searching: true,
            dom: 'B<"clear">lfrtip',
            buttons:{
                name: 'primary',
                buttons: [
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
                url: "<?php echo get_action_url('service/dt/sys_log'); ?>",
                dataSrc: "items"
            },
            columns:[
                {data: "id", searchable: false, className: 'dt-body-center', render: function (data, type, full, meta){
                     return '<input type="checkbox" name="id[]" value="'+ data + '">';
                }},
                {data: "date_time"},    
                {data: "user_name"},
                {data: "group_name"},
                {data: "module"},
                {data: "event_type"},
                {data: "event_name"}
            ]
        });
    });
    
    function reload(reset){
        if (!reset){ reset = false; }
        if (dataTable){
            dataTable.ajax.reload(null,reset);
        }
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