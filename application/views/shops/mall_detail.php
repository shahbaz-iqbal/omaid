<?php $this->load->view('header'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mall Detail:</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Mall</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-md-12">
        <div class="card" style="margin-left: 5px; margin-right: 5px;">
            <h4 style="padding: 10px;">Mall Of  Lahore</h4>
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Detail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Feed Back</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Shops Detail</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-6" style=" background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo base_url('assets/images/background.jpeg'); ?>');">
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="<?php echo base_url('assets/images/mall.jpg'); ?>" alt="" style="width:100px; height:100px; margin-bottom: 15px; border-radius: 80px;">
                                    </div>
                                    <div class="col-md-7" style=" margin-top: 20px;">
                                        <div class="footer-social-icons">
                                            <ul class="social-icons">
                                                <li><a href="" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                                                <li><a href="" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
                                                <li><a href="" class="social-icon"> <i class="fa fa-rss"></i></a></li>
                                                <li><a href="" class="social-icon"> <i class="fa fa-youtube"></i></a></li>
                                                <li><a href="" class="social-icon"> <i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="" class="social-icon"> <i class="fa fa-github"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8">  

                                        </div>
                                    </div>
                                </div>
                                <!--<h4 style="float: right;">   1/2/2020</h4>-->
                                <h3 style="color:white; margin-left: 60px;"> Mall Of Lahore</h3>
                                <div class="row invoice-info" style="margin-top: 20px;">
                                    <div class="col-sm-6 invoice-col" style="color:white; margin-left: 1px;">
                                        <address>
                                            <strong>Address:</strong><br>
                                            795 Folsom Ave, Suite 600<br>
                                            San Francisco, CA 94107<br>
                                            Phone: (804) 123-5432<br>
                                            Email: info@almasaeedstudio.com
                                        </address>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-widget">
                                    <div class="card-header">
                                        <div class="user-block">
                                            <a href="#">Discriptions:</a>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- post text -->
                                        <p>Far far away, behind the word mountains, far from the
                                            countries Vokalia and Consonantia, there live the blind
                                            texts. Separated they live in Bookmarksgrove right at</p>
                                        <p>the coast of the Semantics, a large language ocean.
                                            A small river named Duden flows by their place and supplies
                                            it with the necessary regelialia. It is a paradisematic
                                            country, in which roasted parts of sentences fly into
                                            your mouth.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                        <div class="col-sm-12 invoice-col">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>User profile</th>          
                                        <th>Rating</th>
                                        <th>View Bill Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="<?php echo base_url('assets/images/11.png'); ?>" alt="" style="width:100px; height:auto;"></td>
                                        <td>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span><br>
                                            <div class="side">
                                                <div>3.6 star</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-4"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div>15</div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('shop/shop_detail'); ?>">
                                                <i class="fas fa-eye">
                                                </i>
                                                View
                                            </a>
                                        </td>
                                    </tr>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>User Profile</th>              
                                    <th>View Reports</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/images/11.png'); ?>" alt="" style="width:100px; height:auto;"></td>
                                    <td><a class="btn btn-primary btn-sm" href="#"> View Detail </a> </td> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                         <table id="example1" class="table table-bordered table-hover">

                        <thead>
                            <tr>             
                                <th>Name</th>
                                <th>Location</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data)) { ?>
                                <?php foreach ($data as $result) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result->name; ?></td>
                                        <td><?php echo $result->location; ?></td>
                                        <td><?php echo $result->category; ?></td>
                                        <td><?php echo $result->image; ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('shop/shop_detail'); ?>">
                                                <i class="fas fa-eye">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="#" onclick="editShop('<?php echo $result->id; ?>')" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('shop/delete/'); ?><?php echo $result->id; ?>">
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
                                <th>Name</th>
                                <th>Location</th>
                                <th>Category</th>
                                <th>Mall Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
