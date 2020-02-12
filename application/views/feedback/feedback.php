<?php $this->load->view('header'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>FeedBack Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Feed Back</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-left: 5px; margin-right: 5px;">
                <h4 style="padding: 10px;">FeedBack</h4>
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Feed Back</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Suggestion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-support-tab" data-toggle="pill" href="#custom-tabs-three-support" role="tab" aria-controls="custom-tabs-three-support" aria-selected="false">Support</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-feedback-tab" data-toggle="pill" href="#custom-tabs-three-feedback" role="tab" aria-controls="custom-tabs-three-support" aria-selected="false">Feedback on note</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>             
                                        <th>User Name</th>
                                        <th>Shop Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($user)) { ?>
                                        <?php foreach ($user as $u) { ?>
                                            <tr>
                                                <td><?php echo $u->username; ?></td>
                                                <td><?php echo $u->username; ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="#">
                                                        <i class="fas fa-eye">
                                                        </i>
                                                        View FeedBack detail
                                                    </a>
                                                    <a href="#" class="btn btn-info btn-sm" id="manger" data-toggle="modal" data-target="#exampleModalfeedback"  <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Reply
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="modal fade" id="exampleModalfeedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="<?php echo base_url('feedback/add_feedback'); ?>">
                                                <div class="form-group">
                                                    <label>Discription</label>
                                                    <textarea class="form-control" height="50" name="disc"></textarea>
                                                </div>
                                                <input type="submit" class="btn btn-primary" value="Send">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>             
                                        <th>User Profile</th>
                                        <th>View Detail</th>
                                        <th>Email For Reply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?php echo base_url('assets/images/11.png'); ?>" alt="" style="width:100px; height:auto;"></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-eye">
                                                </i>
                                                View Detail
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" id="manger" data-toggle="modal" data-target="#exampleModalreport"  <i class="fas fa-pencil-alt">
                                                </i>
                                                Reply
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal fade" id="exampleModalreport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="<?php echo base_url('feedback/add_feedback'); ?>">
                                                <div class="form-group">
                                                    <label>Discription</label>
                                                    <textarea class="form-control" height="50" name="disc"></textarea>
                                                </div>
                                                <input type="submit" class="btn btn-primary" value="Send">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>             
                                        <th>User Profile</th>
                                        <th>View Detail</th>
                                        <th>Email For Reply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?php echo base_url('assets/images/11.png'); ?>" alt="" style="width:100px; height:auto;"></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-eye">
                                                </i>
                                                View Detail
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" id="manger" data-toggle="modal" data-target="#exampleModalsugestion"  <i class="fas fa-pencil-alt">
                                                </i>
                                                Reply
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal fade" id="exampleModalsugestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="<?php echo base_url('feedback/add_feedback'); ?>">
                                                <div class="form-group">
                                                    <label>Discription</label>
                                                    <textarea class="form-control" height="50" name="disc"></textarea>
                                                </div>
                                                <input type="submit" class="btn btn-primary" value="Send">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="custom-tabs-three-support" role="tabpanel" aria-labelledby="custom-tabs-three-support-tab">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>             
                                        <th>Shop Name</th>
                                        <th>Discription</th>
                                        <th>Action</th>
                                        <th>Email For Reply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            shahabz
                                        </td>
                                        <td>
                                            Edit My Profile Plzzzz
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-eye">
                                                </i>
                                                View Shop Detail
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" id="manger"data-toggle="modal" data-target="#exampleModal6"  <i class="fas fa-pencil-alt">
                                                </i>
                                                Reply
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </table>
                            <!-- Button trigger modal -->


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Support</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body">
                                                <form method="POST" action="<?php echo base_url('feedback/add_feedback'); ?>">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" value="Some_email@gmail.com">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Discription</label>
                                                        <textarea class="form-control" height="50" name="disc"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="custom-tabs-three-feedback" role="tabpanel" aria-labelledby="custom-tabs-three-feedback-tab">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>             
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>Shop Name</th>
                                            <th>Bill Number</th>
                                            <th>Discription</th>
                                            <th>View detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($on_note)) { ?>
                                            <?php foreach ($on_note as $feed) { ?>
                                                <tr>
                                                    <td><?php echo $feed->id; ?></td>
                                                    <td><?php echo $feed->User_name; ?></td>
                                                    <td><?php echo $feed->Shop_name; ?></td>
                                                    <td><?php echo $feed->bill_number; ?></td>
                                                    <td><?php echo $feed->discription; ?></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="fas fa-eye">
                                                            </i>
                                                            View Detail
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="feedbackonnote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?php echo base_url('feedback/add_feedback'); ?>">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" value="Some_email@gmail.com">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Discription</label>
                                                        <textarea class="form-control" height="50" name="disc"></textarea>
                                                    </div>
                                                    <input type="submit" class="btn btn-primary" value="Send">
                                                </form>
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
</section>
<?php $this->load->view('footer'); ?>

