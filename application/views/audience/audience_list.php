<?php
$this->load->view('header');
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Audience Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Audience</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-12">
                <?php if ($this->session->flashdata('success')) { ?>
                    <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                <?php } else if ($this->session->flashdata('error')) { ?>
                    <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="card" style="margin-left: 5px; margin-right: 5px;">
            <h4 style="padding: 10px;">Audience</h4>
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Create New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Use A Save Audience Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Work Place</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <h3 class="profile-username text-center">Audience Filter</h3>
                                            <form method="POST" action="<?php echo base_url('audience/filter_audience'); ?>" id="filter">
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <label style="margin-left: 13px;">Location:</label>
                                                        <input type="text" name="location" class="form-control"  placeholder="Location">
                                                    </li>
                                                    <li class="list-group-item">
                                                        <label style="margin-left: 13px;">Age:</label>
                                                        <input type="text" class="form-control" name="min"  placeholder="Min" style="margin-bottom: 5px;">
                                                        <input type="text" class="form-control" name="max" placeholder="Max">
                                                    </li>
                                                    <li class="list-group-item">
                                                        <label style="margin-left: 13px;">Gender:</label>
                                                        <select name="gender" class="form-control">
                                                            <option value="male">Men</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <label style="margin-left: 13px;">Work Place:</label>
                                                        <select name="workplace" class="form-control">
                                                            <option>Select Work Place</option>
                                                            <option value="All">All</option>
                                                            <option value="Workplace">Workplace</option>
                                                        </select>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <label style="margin-left: 13px;">Who Got Star:</label><br>
                                                        <input type="radio" value="male" checked="checked"> With<br>
                                                        <input type="radio" value="female"> Without<br>
    <!--                                                    With:<input type="radio" name="" checked="checked"/>
                                                        WithOut:<input type="radio" name="" />-->
                                                    </li>
                                                </ul>
                                                <input type="submit" class="btn btn-primary btn-block" id="filter_button" value="Filter">
                                            </form>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card card-primary card-outline tablehide">
                                        <div class="card-body box-profile">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>             
                                                        <th>Id</th>
                                                        <th>Workplace</th>
                                                        <th>Address</th>
                                                        <th>Age</th>
                                                        <th>Gender</th>
                                                        <th>Profile</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ((!empty($filter))) { ?>
                                                        <?php foreach ($filter as $result) { ?>
                                                            <tr>
                                                                <td><?php echo $result->id; ?></td>
                                                                <td><?php echo $result->workplace; ?></td>
                                                                <td><?php echo $result->location; ?></td>
                                                                <td><?php echo $result->age; ?></td>
                                                                <td><?php echo $result->gender; ?></td>
                                                                <td><img src="<?php echo base_url('assets/images/11.png'); ?>" alt="" style="width:100px; height:auto;"></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            Total Audience : <span><?php
                                                                if (!empty($total_result)) {
                                                                    echo $total_result;
                                                                }
                                                                ?></span> 
                                                            <form method="POST" action="<?php echo base_url('Audience/audeince_name'); ?>">
                                                                <input type="text" name="audience_name" class="form-control" style="float: right;" placeholder="Audience Name" required="">
                                                                <?php if ((!empty($filter))) { ?>
                                                                    <?php foreach ($filter as $result) { ?>

                                                                        <input type="hidden" name="data[]" value="<?php echo $result->id; ?>">   
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                                <input type="submit" class="btn btn-primary" style="float: right; margin-top: 5px;" value="Save Audience">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>             
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($audience)) { ?>
                                    <?php foreach ($audience as $res) { ?>
                                        <tr>
                                            <td><?php echo $res->name ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="<?php echo base_url('audience/audience_list/'); ?><?php echo $res->id; ?>">
                                                    <i class="fas fa-eye">
                                                    </i>
                                                    View
                                                </a>
                                                <a class="btn btn-info btn-sm" href="#" onclick="edit_audience_name('<?php echo $res->id; ?>')" data-toggle="modal" data-target="#exampleModalCenter">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="#">
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
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                        <div class="card">
                            <div>
                                <button type="button" class="btn-primary" data-toggle="modal" data-target="#exampleModal" style="float:right; margin-top: 20px; margin-right: 22px;">
                                    Add Work Place
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>             
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Contact No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($data)) { ?>
                                            <?php foreach ($data as $result) { ?>
                                                <tr>
                                                    <td><?php echo $result->name; ?></td>
                                                    <td><?php echo $result->address; ?></td>
                                                    <td><?php echo $result->phone; ?></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-eye">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="#" onclick="editworkplace('<?php echo $result->id; ?>')" data-toggle="modal" data-target="#exampleModal">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="<?php echo base_url('audience/delete_workplace/'); ?><?php echo $result->id; ?>">
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
                                </table>
                            </div>
                            <!--  WorkPlace Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Work Place</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?php echo base_url('audience/add_workplace'); ?>" id="workplace_form">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" id="name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Adress</label>
                                                    <input type="text" name="address" id="address" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Contact No</label>
                                                    <input type="text" name="phone" id="phone" class="form-control">
                                                </div>
                                                <input type="hidden" name="editId" id="editId">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="submitworkplace()" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--  Audience  Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url('audience/update_audience_name'); ?>" id="audi_form">
                    
                
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="audiencename" id="audiencename" class="form-control">
                    <input type="hidden" name="editAudienceId" id="audienceId" class="form-control">
                </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="submitAudi()" class="btn btn-primary">Save changes</button>
            </div>
            
        </div>
    </div>
</div>

<?php $this->load->view('footer'); ?>
<script>
    function editworkplace(id) {
        console.log(id);
        $.ajax({
            url: "<?php echo base_url('audience/edit_workplace/') ?>" + id,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);

                $("#editId").val(data['id']);
                $("#name").val(data['name']);
                $("#phone").val(data['phone']);
                $("#address").val(data['address']);
            }
        })
    }
</script>
<script>
    function edit_audience_name(id) {
        console.log(id);
        $.ajax({
             url: "<?php echo base_url('audience/edit_audience/') ?>" + id,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);
                $("#audiencename").val(data['name']);
                $("#audienceId").val(data['id']);
            }
        })
    }
</script>
<script>
    function submitAudi() {
     $('#audi_form').submit();
    }
</script>
<script>
    function submitworkplace() {
     $('#workplace_form').submit();
    }
</script>