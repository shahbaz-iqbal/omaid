<?php $this->load->view('header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User List</h1>
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) { ?>
                            <?php foreach ($data as $result) { ?>
                                <tr>
                                    <td><?php echo $result->username; ?></td>
                                    <td><?php echo $result->phone; ?></td>
                                    <td><?php echo $result->email; ?></td>
                                    <td><?php echo $result->age; ?></td>
                                    <td><?php echo $result->gender; ?></td>
                                    <td><?php echo $result->location; ?></td>
                                </tr>
                            <?php }
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr>             
                           <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Location</th>
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

