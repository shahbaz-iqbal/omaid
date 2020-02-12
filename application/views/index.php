<?php $this->load->view('header'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $manager; ?></h3>
                        <p>Managers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo base_url('Manager/admins'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $shop; ?></h3>
                        <p>Total Shops</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="<?php echo base_url('shop/shops'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $voucher; ?></h3>
                        <p>Total Vouchers</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <a href="<?php echo base_url('Voucher/vouchers'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $user; ?></h3>
                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php echo base_url('User/users'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="position: relative; left: 0px; top: 0px;">
                    <div class="card-header ui-sortable-handle" style="cursor: move; background-color: #24963e;">
                        <h3 class="card-title">
                             <i class="fas fa-shopping-cart"></i>
                            Recent Shops
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>             
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($recentShop)) { ?>
                                    <?php foreach ($recentShop as $shop) { ?>
                                        <tr>
                                            <td><?php echo $shop->image; ?></td>
                                            <td><?php echo $shop->name; ?></td>
                                            <td><?php echo $shop->location; ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>             
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Location</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-footer clearfix" style="background-color: #24963e">
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="position: relative; left: 0px; top: 0px;">
                            <div class="card-header ui-sortable-handle" style="cursor: move; background-color: #d2d6de;">
                                <h3 class="card-title">
                                     <i class="ion ion-person-add"></i>
                                    Users List
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>             
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($recentUser)) { ?>
                                            <?php foreach ($recentUser as $user) { ?>
                                                <tr>
                                                    <td><?php echo $user->username; ?></td>
                                                    <td><?php echo $user->phone; ?></td>
                                                    <td><?php echo $user->location; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>             
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Location</th>
                                        <tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="card-footer clearfix" style="background-color: #d2d6de;">
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="position: relative; left: 0px; top: 0px;">
                            <div class="card-header ui-sortable-handle" style="cursor: move; background-color: #ffc107;">
                                <h3 class="card-title">
                                     <i class="fas fa-credit-card"></i>
                                    Voucher List
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">

                                    <thead>
                                        <tr>             
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Discription</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($recentVoucher)) { ?>
                                            <?php foreach ($recentVoucher as $voucher) { ?>
                                                <tr>
                                                    <td><?php echo $voucher->image; ?></td>
                                                    <td><?php echo $voucher->name; ?></td>
                                                    <td><?php echo $voucher->category; ?></td>
                                                    <td><?php echo $voucher->discription; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>             
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Discription</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="card-footer clearfix" style="background-color: #ffc107">
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> 
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</section>
<?php $this->load->view('footer'); ?>