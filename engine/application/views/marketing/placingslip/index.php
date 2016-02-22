<div class="row">
    <div class="col-lg-12">
        <table id="myDataTable" class="table " role="grid">
            <thead>
                <tr role="row">
                    <th>Nomor</th>
                    <th>Tertanggung</th>
                    <th>Jenis Asuransi</th>
                    <th>Bulan Laporan</th>
                    <th>Branch</th>
                    <th>Sumber Bisnis</th>
                    <th>Marketing</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#myDataTable').DataTable({
            ordering: true,
            searching: false,
            ajax: {
                url: "<?php echo get_action_url('service/placingslip'); ?>",
                dataSrc: ""
            },
            columns:[
                {"data": "nomor"},
            ]
        });
    });
</script>