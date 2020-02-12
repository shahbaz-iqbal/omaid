<?php $this->load->view('header');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>History List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">History</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="row" style="padding: 25px;">
            <div class="col-12">

                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>             
                            <th>Id</th>
                            <th>Voucher Name</th>
                            <th>Audience Name</th>
                            <th>User View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) { ?>
                            <?php foreach ($data as $result) { ?>
                                <tr>
                                    <td><?php echo $result->id; ?></td>
                                    <td><?php echo $result->VoucherName; ?></td>
                                    <td><?php echo $result->AudienceName; ?></td>
                                    <!--<td><span class="badge badge-primary">Not Used</span></td>-->
                                    <td>
                                        <a href="<?php echo base_url('voucher/report_vouchers_users'); ?>"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php }
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>             
                           <th>Id/th>
                           <th>Voucher Name</th>
                            <th>Audience Name</th>
                            <th>User View</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<?php $this->load->view('footer'); ?>

