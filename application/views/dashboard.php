<?php $this->load->view('header');
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard v2</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v2</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?php if ($this->session->flashdata('success')) { ?>
            <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
        <?php } else if ($this->session->flashdata('error')) { ?>
            <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
        <?php } ?>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><p>Total Managers</p></span>
                        <span class="info-box-number">
                            <?php echo $manager; ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><p>Total Shops</p></span>
                        <span class="info-box-number"><?php echo $shop; ?></span>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"> <i class="fas fa-credit-card"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><p>Total Vouchers</p></span>
                        <span class="info-box-number"><?php echo $voucher; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><p>Total Users</p></span>
                        <span class="info-box-number"><?php echo $user; ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">FeedBack</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Discription</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($feedback)) { ?>
                                <?php foreach ($feedback as $feed) { ?>
                                    <tr>
                                        <td><?php echo $feed->name; ?></td>
                                        <td><?php echo $feed->discription; ?></td>
                                        <td>
                                            <a href="#">
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
                    </table>
                    <div class="card-footer clearfix" style="display: block;">
                        <a href="<?php echo base_url('feedback/feedback_list'); ?>" class="btn btn-sm btn-secondary float-right">View All Feedback</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Reports</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Shop</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($report))
                                ; {
                                ?>
                                <?php foreach ($report as $re) { ?>
                                    <tr>
                                        <td><?php echo $re->UserName; ?></td>
                                        <td><?php echo $re->ShopName; ?></td>
                                        <td><?php echo $re->discription; ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="card-footer clearfix" style="display: block;">
                        <a href="<?php echo base_url('feedback/feedback_list'); ?>" class="btn btn-sm btn-secondary float-right">View All Reports</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header" style="margin-bottom: 17px;">
                        <h3 class="card-title">Latest Members</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="users-list clearfix">
                            <?php if (!empty($recentUser)) { ?>
                                <?php foreach ($recentUser as $user) { ?>
                                    <li>
                                        <img src=" <?php echo base_url('assets/images/'); ?><?php echo $user->image; ?>" style="border-radius: 50px;    height: 40px;    width: 40px;">
                                        <a class="users-list-name" href="#"> <?php echo $user->username; ?></a>
                                        <span class="users-list-date"><?php echo $user->age; ?></span>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?php echo base_url('user/users'); ?>">View All Users</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">FeedBack On Note</h3>
                        <div class="card-tools">

                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Shop</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Shahbaz</td>
                                    <td><a href="#">District Shop</a></td>
                                    <td>
                                        <a href="#">
                                            <i class="fas fa-eye">
                                            </i>
                                            View
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jawad</td>
                                    <td><a href="#">bwp Shop</a></td>
                                    <td>
                                        <a href="#">
                                            <i class="fas fa-eye">
                                            </i>
                                            View
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ahmad</td>
                                    <td><a href="#">bwp Shop</a></td>
                                    <td>
                                        <a href="#">
                                            <i class="fas fa-eye">
                                            </i>
                                            View
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ahmad</td>
                                    <td><a href="#">lhr Shop</a></td>
                                    <td>
                                        <a href="#">
                                            <i class="fas fa-eye">
                                            </i>
                                            View
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?php echo base_url('feedback/feedback_list'); ?>">View All FeedBack</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Added Shops</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0" style="display: block;">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            <?php if (!empty($recentShop)) { ?>
                                <?php foreach ($recentShop as $shop) { ?>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?php echo base_url('assets/images/'); ?><?php echo $shop->image; ?>" alt="Product Image" style="border-radius: 50px;" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title"><?php echo $shop->name; ?>
                                                <span class="badge badge-warning float-right"><?php echo $shop->category; ?></span></a>
                                            <span class="product-description">
                                                <?php echo $shop->location; ?>
                                            </span>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="card-footer text-center" style="display: block;">
                        <a href="javascript:void(0)" class="uppercase">View All Users</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Top Charts Reports</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->


                    <table id="q-graph">
                        <tbody>
                            <tr class="qtr" id="q1">
                                <th scope="row">Location</th>
                                <td class="sent bar" style="min-height: 80px; height: <?php echo $top_location_count; ?>; max-height: 220px;"><p><?php echo $top_location_count; ?></p></td>
                            </tr>
                            <tr class="qtr" id="q2">
                                <th scope="row">Gender</th>
                                <td class="sent bar" style="min-height: 80px; height: <?php echo $top_gender_count; ?>; max-height: 280px;"><p><?php echo $top_gender_count; ?></p></td>
                            </tr>
                            <tr class="qtr" id="q3">
                                <th scope="row">Company</th>
                                <td class="sent bar" style="min-height: 50px; height: <?php echo $top_company_count; ?>; max-height: 280px"><p><?php echo $top_company_count; ?></p></td>
                            </tr>
                            <tr class="qtr" id="q4">
                                <th scope="row">Top</th>
                                <td style="height: auto; width: 195px">
                                    <div class="bg-success pt-2 pb-2 pl-4 pr-4" style="height: 313px;">
                                        <div class="description-block mb-4" style="margin-top: 45px;">
                                            <div class="sparkbar pad" data-color="#fff"><?php echo $top_location_count; ?></div>
                                            <h5 class="description-header"><?php echo $top_location; ?></h5>
                                            <span class="description-text">Top Location</span>
                                        </div>
                                        
                                        <div class="description-block mb-4">
                                            <div class="sparkbar pad" data-color="#fff"><?php echo $top_gender_count; ?></div>
                                            <h5 class="description-header"><?php echo $top_gender; ?></h5>
                                            <span class="description-text">Top Gender</span>
                                        </div>
                                         
                                        <div class="description-block">
                                            <div class="sparkbar pad" data-color="#fff"><?php echo $top_company_count; ?></div>
                                            <h5 class="description-header"><?php echo $top_company; ?></h5>
                                            <span class="description-text">Top Company</span>
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

<!--                    <div id="wrapper">
                        <div class="chart">
                            <h2>Skillset</h2>
                            <table id="data-table" border="1" cellpadding="10" cellspacing="0" summary="skillset">
                                <thead>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <th scope="col">Location</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Company</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>		
                                        <td>90</td>
                                        <td>50</td>
                                        <td>80</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>-->







                </div>
            </div>
            <div class="col-md-4">

                <div class="info-box mb-3 bg-warning">

                    <div class="info-box-content">
                        <i class="nav-icon fas fa-portrait"></i>
                        <span class="">App Users</span>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text"> Day</span>
                        <span class="info-box-number"><?php echo $user_day; ?></span>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text"> Month</span>
                        <span class="info-box-number"><?php echo $user_month; ?></span>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text"> Year</span>
                        <span class="info-box-number"><?php echo $user_year; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>


                <div class="info-box mb-3 bg-success">

                    <div class="info-box-content">
                        <i class="fa fa-child" aria-hidden="true"></i>
                        <span class="">Age Range</span>
                    </div>

                    <div class="info-box-content">
                        <span class="info-box-text">20-30</span>
                        <span class="info-box-number"><?php echo $age_range_20_30; ?></span>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">30-40</span>
                        <span class="info-box-number"><?php echo $age_range_30_40; ?></span>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">40-50</span>
                        <span class="info-box-number"><?php echo $age_range_40_50; ?></span>
                    </div>

                    <!-- /.info-box-content -->
                </div>
                <div class="info-box mb-3 bg-danger">
                    <div class="info-box-content">
                        <i class="fas fa-file-invoice"></i>
                        <span class="">Top Bill</span>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">Day</span>
                        <span class="info-box-number"><?php echo $day_bill; ?></span>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">Month</span>
                        <span class="info-box-number"><?php echo $month_bill; ?></span>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">year</span>
                        <span class="info-box-number"><?php echo $year_bill; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <div class="info-box mb-3 bg-info">
                    <div class="info-box-content">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                        <span class="">Top Vouchers</span>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">Day</span>
                        <span class="info-box-number"><?php echo $voucher_year; ?></span>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">Month</span>
                        <span class="info-box-number"><?php echo $voucher_month; ?></span>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">year</span>
                        <span class="info-box-number"><?php echo $voucher_day; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
    </div>


</section>
<?php $this->load->view('footer'); ?>
