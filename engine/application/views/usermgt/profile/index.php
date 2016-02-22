<div class="row">
    <div class="col-lg-12">
        <div class="widget">
            <div class="widget-header">
                <h3><?php echo $page_subtitle ? $page_subtitle:'My Profile'; ?></h3>
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#tab-profile" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> Update Profile</a></li>
                    <li class=""><a href="#tab-user-log" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> My Activity Log</a></li>
                </ul>
            </div>
            <div class="widget-content">
                <div class="tab-content no-padding">
                    <div class="tab-pane fade active in" id="tab-profile">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="MyForm" class="form-validation" action="<?php echo $submit_url; ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $item->id; ?>" />
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $item->name; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" value="<?php echo $item->username; ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control" name="password" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Re-type Password</label>
                                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <button type="submit" class="btn btn-primary btn-large"><i class="fa fa-save"></i> Save Changes</button>
                                        <button type="reset" class="btn btn-default btn-large"><i class="fa fa-recycle"></i> Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-user-log">
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="myDataTable" class="table table-striped" role="grid" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th>DateTime</th>
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
                    </div>
                </div>
            </div>
        </div>
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
                    { text: '<i class="fa fa-recycle"></i> Reload', action: reload},
                    { extend: 'csvHtml5', text:'CSV', title: 'satba-'+module},
                    { extend: 'excelHtml5', text:'Excel', title: 'satba-'+module},
                    { extend: 'pdfHtml5', text:'PDF', title: 'satba-'+module},
                    { extend: 'print', text:'Print'}
                ]
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?php echo get_action_url('service/dt/sys_log/user/'.$me->id); ?>",
                dataSrc: "items"
            },
            columns:[
                {data: "date_time"},    
                {data: "module"},
                {data: "event_type"},
                {data: "event_name"}
            ]
        });
        
        $('form.form-validation').validate({
            rules: {
                name: {
                    minlength: 2,
                    required: true
                },
                username: {
                    minlength: 2,
                    required: true
                },
                password: {
                },
                confirm_password: {
                    equalTo: '#password'
                }
            },
            messages: {
                name: 'Nama harus diisi minimal 2 karakter',
                username: 'Username harus diisi minimal 2 karakter',
                confirm_password:'Masukkan password yang sama kembali'
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            }
        });
    });
    
    function reload(reset){
        if (!reset){ reset = false; }
        if (dataTable){
            dataTable.ajax.reload(null,reset);
        }
    }
</script>