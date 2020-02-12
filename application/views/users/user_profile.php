<?php
$this->load->view('header');
if (!empty($user))
    foreach ($user as $level) {
        
    }
$leve = $level->level;
//$leve = 70;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card" style="margin-left: 5px; margin-right: 5px;">
            <h4 style="padding: 10px;">KFC, Inc.</h4>
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">User Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Invited List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Notebook</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-workplace-tab" data-toggle="pill" href="#custom-tabs-three-workplace" role="tab" aria-controls="custom-tabs-three-workplace" aria-selected="false">Workplace</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-voucher-tab" data-toggle="pill" href="#custom-tabs-three-voucher" role="tab" aria-controls="custom-tabs-three-voucher" aria-selected="false">Voucher</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                        <!-- title row -->
                        <?php
                        if (!empty($user))
                            foreach ($user as $level) {
                                
                            }
//                        $leve = $level->level;
//                        $bar = $leve / 100 * 100;
                        ?>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-md-5">


                                        <img src="<?php echo base_url('assets/images/download.png'); ?>" alt="" style="width:100px; height:100px; margin-bottom: 15px; border-radius: 80px;">

                                        <label style="font-size: 15px;">Coin:<?php echo $level->coin . '$'; ?></label>
                                    </div>
                                    <div class="col-md-7" style="margin-top: 20px;">
                                        <div class="footer-social-icons">
                                            <ul class="social-icons">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <label style="font-size: 25px;">Level:</label>
                                                        <div class="form-group">
                                                            <div class = "progress mb-3">
                                                                <?php
                                                                if ($leve <= 20) {
                                                                    $bar = $leve / 100 * 100;
                                                                    ?>
                                                                    <div class = "progress-bar bg-success" role = "progressbar" style = "width: <?php echo $bar . '%'; ?>" aria-valuenow = "15" aria-valuemin = "0" aria-valuemax = "100"><?php echo $bar . '%'; ?></div>
                                                                <?php
                                                                } elseif ($leve > 20) {
                                                                    $bar = $leve / 100 * 100;
                                                                    ?>
                                                                    <div class = "progress-bar bg-warning" role = "progressbar" style = "width: <?php echo $bar . '%'; ?>" aria-valuenow = "30" aria-valuemin = "0" aria-valuemax = "100"><?php echo $bar . '%'; ?></div>
                                                                <?php
                                                                } elseif ($leve >= 51) {
                                                                    $bar = $leve / 100 * 100;
                                                                    ?>
                                                                    <div class = "progress-bar bg-danger" role = "progressbar" style = "width: <?php echo $bar . '%'; ?>" aria-valuenow = "20" aria-valuemin = "0" aria-valuemax = "100"><?php echo $bar . '%'; ?></div>
<?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Name:</label>
                                                <span><?php echo $level->username; ?></span><br>
                                                <label>Email:</label>
                                                <span><?php echo $level->email; ?>.com</span><br>
                                                <label>Gender:</label>
                                                <span><?php echo $level->gender; ?></span><br>
                                                <label>Location:</label>
                                                <span><?php echo $level->location; ?> center</span><br>
                                                <div style="text-align: center">
                                                    <button type="button" class="btn btn-block bg-gradient-success btn-md">Send Notification</button>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label>UserId:</label>
                                                <span><?php echo $level->id; ?></span><br>
                                                <label>Phone No:</label>
                                                <span><?php echo $level->phone; ?></span><br>
                                                <label>Activity:</label>
                                                <span><?php echo $level->workplace; ?></span><br>
                                                <label>Date Of Birth:</label>
                                                <span><?php echo $level->age; ?></span><br>
                                                <span></span><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>             
                                    <th>Profile</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/images/11.png'); ?>" alt="" style="width:100px; height:auto;"></td>
                                    <td>Shahbaz</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-primary btn-sm" href="#">                                        
                                            Send Notification
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation">
                                </div>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Shop Name</th>                
                                    <th>Voucher Name</th>
                                    <th>Bill Number</th>
                                    <th>Puchase Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($bill)) { ?>
                                    <?php
                                    foreach ($bill as $bil)
                                        ;
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $bil->ShopName; ?></td>
                                            <td><?php echo $bil->VoucherName; ?></td>
                                            <td><?php echo $bil->bill_number; ?></td>
                                            <td><?php echo $bil->purchase_date; ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="<?php echo base_url('user/bill_detail/'); ?><?php echo $bil->id; ?>">
                                                    <i class="fas fa-eye">
                                                    </i>
                                                    View Bill
                                                </a>
                                                <a class="btn btn-primary btn-sm" href="<?php echo base_url('user/bill_detail/'); ?><?php echo $bil->id; ?>">
                                                    <i class="fas fa-eye">
                                                    </i>
                                                    View Payment
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
<?php } else { ?>
    <?php echo 'Data Not Available'; ?>
<?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Shop Name</th>                
                                    <th>Voucher Name</th>
                                    <th>Bill Number</th>
                                    <th>Puchase Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-workplace" role="tabpanel" aria-labelledby="custom-tabs-three-workplace-tab">
                        <div class="card">
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
                                                        <a class="btn btn-info btn-sm" href="#">
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
                        </div>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-voucher" role="tabpanel" aria-labelledby="custom-tabs-three-voucher-tab">
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
                                                        <th>id</th>
                                                        <th>Name</th>
                                                        <th>Discription</th>
                                                        <th>Expire Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
<?php if (!empty($voucher)) { ?>
    <?php foreach ($voucher as $result) {
        ?>
                                                            <tr>
                                                                <td><?php echo $result->id; ?></td>
                                                                <td><?php echo $result->name; ?></td>
                                                                <td><?php echo $result->discription; ?></td>
                                                                <td><?php echo $result->expire_date; ?></td>


                                                                <td>
                                                                    <a class="btn btn-primary btn-sm" href="#">
                                                                        <i class="fas fa-eye">
                                                                        </i>
                                                                        View
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
                                                        <th>id</th>
                                                        <th>Name</th>
                                                        <th>Discription</th>
                                                        <th>Expire Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>

