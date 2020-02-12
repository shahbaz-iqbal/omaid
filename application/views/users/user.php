<?php $this->load->view('header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All User List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
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
                <div>
                    <a href="<?php echo base_url('user/user_filter'); ?>" class="btn btn-success" style="float:left; margin-left: 22px; margin-top: 20px; ">Filter</a>

                </div>

                <!-- /.card-header -->
                <div class="card-body">
<!--<input type="button" class="btn-primary" value="Add Admin">-->
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
                                            <a href="#" class="btn btn-info btn-sm" onclick="editEvent(<?php echo $result->id; ?>)" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pencil-alt">
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
                <!-- /.card-body -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?php echo base_url('User/update'); ?>" id="manager">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" name="age" id="age" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Male</label>
                                        <input type="radio" name="Gender" value="Male" />
                                        <label>Female</label>
                                        <input type="radio" name="Gender" value="Female" />
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="location" id="location" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Workplace</label>
                                        <input type="text" name="workplace" id="workplace" class="form-control">
                                    </div>
                                    <input type="hidden" id="idmanger" name="iduser">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="formsubmit()" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>
</section>
<!-- /.content -->
<?php $this->load->view('footer'); ?>
<script>
    function editEvent(id) {
        console.log(id);
        $.ajax({
            url: "<?php echo base_url('User/edit/') ?>" + id,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);

                $("#idmanger").val(data['id']);
                $("#name").val(data['username']);
                $("#phone").val(data['phone']);
                $("#email").val(data['email']);
                $("#age").val(data['age']);
                $("#gender").val(data['gender']);
                $("#location").val(data['location']);
                $("#workplace").val(data['workplace']);
                $("#level").val(data['level']);
                $("#coin").val(data['coin']);
            }
        })
    }

</script> 
<script>
    function formsubmit() {
        $('#manager').submit();
    }
</script>pt>