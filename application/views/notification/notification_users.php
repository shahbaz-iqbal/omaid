<?php $this->load->view('header');

?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Notification Users List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Notification</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-12">
                    <?php if ($this->session->flashdata('success')) { ?>
                        <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                    <?php } else if ($this->session->flashdata('error')) { ?>
                        <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>                
                                <th>Email</th>
                                <th>Action</1th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data)) { ?>
                                <?php foreach ($data as $result) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result->id; ?></td>
                                        <td><?php echo $result->username; ?></td>
                                        <td><?php echo $result->email; ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('user/user_profile/'); ?><?php echo $result->id; ?>">
                                                <i class="fas fa-eye">
                                                </i>
                                                View
                                            </a>
                                            <a href="#" class="btn btn-info btn-sm"<i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('user/delete/'); ?><?php echo $result->id; ?>">
                                                <i class="fas fa-trash-alt">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>                
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                


            </div>
        </div>
    </div>
</section>
<?php $this->load->view('footer'); ?>
