<?php $this->load->view('header'); 
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?php if ($this->session->flashdata('success')) { ?>
                <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
            <?php } else if ($this->session->flashdata('error')) { ?>
                <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">User Filter</h3>
                    <form action="<?php echo base_url('user/user_filter'); ?>" method="post">
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <label style="margin-left: 13px;">UserId:</label>
                                <input type="text" class="form-control" name="userId"  placeholder="UserId">
                            </li>
                            <li class="list-group-item">
                                <label style="margin-left: 13px;">User Name:</label>
                                <input type="text" class="form-control"  name="username" placeholder="Name">
                            </li>
                            <li class="list-group-item">
                                <label style="margin-left: 13px;">Phone:</label>
                                <input type="text" class="form-control"  name="phone" placeholder="Phone">
                            </li>
                            <li class="list-group-item">
                                <label style="margin-left: 13px;">Email:</label>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </li>
                            <li class="list-group-item">
                                <label style="margin-left: 13px;">Location:</label>
                                <input type="text" class="form-control"  name="location" placeholder="Location">
                            </li>
                            <li class="list-group-item">
                                <label style="margin-left: 13px;">Workplace:</label>
                                <input type="text" class="form-control"  name="workplace" placeholder="Workplace">
                            </li>
                            <li class="list-group-item">
                                <label style="margin-left: 13px;">Level:</label>
                                <input type="text" class="form-control"  name="level" placeholder="Level">
                            </li>
                        </ul>
                        <input type="submit" value="Filter" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
<!--                    <div>
                        <button type="button" class="btn btn-info btn-flat" style=" margin-left: 22px; margin-top: 5px; margin-bottom: 15px;">Excel!</button>
                        <button type="button" class="btn btn-info btn-flat" style=" margin-top: 5px; margin-bottom: 15px;">VCF!</button>
                    </div>-->
                    <table id="example" class="table table-bordered table-hover">
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
                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/user_profile'); ?>">
                                                <i class="fas fa-eye">
                                                </i>
                                                View
                                            </a>
                                            <a href="#" class="btn btn-info btn-sm" onclick="editEvent(<?php echo $result->id; ?>)" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('user/delete'); ?>">
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
                                <th>Action</1th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
                        <label>Location</label>
                        <input type="text" name="location" id="location" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Workplace</label>
                        <input type="text" name="workplace" id="workplace" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" name="level" id="level" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Coin</label>
                        <input type="text" name="coin" id="coin" class="form-control">
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
<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
           
            'colvis'
        ]
    } );
} );
</script>
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
</script>
