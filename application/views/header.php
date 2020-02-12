<?php
if (!empty($this->session->userdata('logged_in') == 1)) {
    
} else {
    redirect();
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Omaid | Project</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/jqvmap/jqvmap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/adminlte.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<!--        <link href="<?php echo base_url(); ?>asset/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/libs/jquery-nice-select/nice-select.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
        -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">-->
        <style>















#q-graph {
  display: block; /* fixes layout wonkiness in FF1.5 */
  position: relative; 
  width: 600px; 
  height: 300px;
  margin: 1.1em 0 0; 
  padding: 0;
  background: transparent;
  font-size: 11px;
}

#q-graph caption {
  caption-side: top; 
  width: 600px;
  text-transform: uppercase;
  letter-spacing: .5px;
  top: -40px;
  position: relative; 
  z-index: 10;
  font-weight: bold;
}

#q-graph tr, #q-graph th, #q-graph td { 
  position: absolute;
  bottom: 0; 
  width: 150px; 
  z-index: 2;
  margin: 0; 
  padding: 0;
  text-align: center;
}

#q-graph td {
  transition: all .3s ease;
  
  &:hover {
    background-color: desaturate(#85144b, 100);
    opacity: .9;
    color: white;
  }
}
  
#q-graph thead tr {
  left: 100%; 
  top: 50%; 
  bottom: auto;
  margin: -2.5em 0 0 5em;}
#q-graph thead th {
  width: 7.5em; 
  height: auto; 
  padding: 0.5em 1em;
}
#q-graph thead th.sent {
  top: 0; 
  left: 0; 
  line-height: 2;
}
#q-graph thead th.paid {
  top: 2.75em; 
  line-height: 2;
  left: 0; 
}

#q-graph tbody tr {
  height: 100%;
  padding-top: 2px;
  border-right: 1px dotted #C4C4C4; 
  color: #AAA;
}
#q-graph #q1 {
  left: 0;
}
#q-graph #q2 {left: 150px;}
#q-graph #q3 {left: 300px;}
#q-graph #q4 {left: 450px; border-right: none;}
#q-graph tbody th {bottom: -1.75em; vertical-align: top;
font-weight: normal; color: #333;}
#q-graph .bar {
  width: 60px; 
  border: 1px solid; 
  border-bottom: none; 
  color: #000;
}
#q-graph .bar p {
  margin: 5px 0 0; 
  padding: 0;
  opacity: .4;
}
#q-graph .sent {
  left: 13px; 
  background-color: #39cccc;
  border-color: transparent;
}
#q-graph .paid {
  left: 77px; 
  background-color: #7fdbff;
  border-color: transparent;
}


#ticks {
  position: relative; 
  top: -300px; 
  left: 2px;
  width: 596px; 
  height: 300px; 
  z-index: 1;
  margin-bottom: -300px;
  font-size: 10px;
  font-family: "fira-sans-2", Verdana, sans-serif;
}

#ticks .tick {
  position: relative; 
  border-bottom: 1px dotted #C4C4C4; 
  width: 600px;
}

#ticks .tick p {
  position: absolute; 
  left: -5em; 
  top: -0.8em; 
  margin: 0 0 0 0.5em;
}



            
            /*  dasboard garph   */
            
            
            button {
                border-radius: 5px;
            }

            .Green {
                font-size: 22px;
                color: #11904a;
                position: absolute;
                margin-left: 1px;
                animation-name:arrow;
            }
            .Red {
                font-size: 22px;
                color: red;
                position: absolute;
                margin-left: 1px;
                animation-name:arrow;
            }
            .dot {
                height: 25px;
                width: 25px;
                background-color: yellow;
                border-radius: 50%;
                display: inline-block;
            }
            .checked {
                color: orange;
            }




            .heading {
                font-size: 25px;
                margin-right: 25px;
            }

            .fa {
                font-size: 25px;
            }

            .checked {
                color: orange;
            }

            /* Three column layout */
            .side {
                float: left;
                width: 15%;
                margin-top:10px;
            }

            .middle {
                margin-top:10px;
                float: left;
                width: 70%;
            }

            /* Place text to the right */
            .right {
                text-align: right;
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* The bar container */
            .bar-container {
                width: 100%;
                background-color: #f1f1f1;
                text-align: center;
                color: white;
            }

            /* Individual bars */
            .bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
            .bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
            .bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
            .bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
            .bar-1 {width: 15%; height: 18px; background-color: #f44336;}

            /* Responsive layout - make the columns stack on top of each other instead of next to each other */
            @media (max-width: 400px) {
                .side, .middle {
                    width: 100%;
                }
                .right {
                    display: none;
                }
            }
            .d{
                width: 90%;
                margin-right: 10px;
                float: left;
            }

        </style>
        <style>

            ._12 {
                font-size: 1.2em;
            }
            ._14 {
                font-size: 1.4em;
            }

            .footer-social-icons {
                width: 350px;
                display:block;
                margin: 0 auto;
            }
            .social-icon {
                color: #fff;
            }
            ul.social-icons {
                margin-top: 10px;
            }
            .social-icons li {
                vertical-align: top;
                display: inline;
                height: 100px;
            }
            .social-icons a {
                color: #fff;
                text-decoration: none;
            }
            .fa-facebook {
                padding:4px 4px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                background-color: #322f30;
            }
            .fa-facebook:hover {
                background-color: #3d5b99;
            }
            .fa-twitter {
                padding:4px 4px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                background-color: #322f30;
            }
            .fa-twitter:hover {
                background-color: #00aced;
            }
            .fa-rss {
                padding:4px 4px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                background-color: #322f30;
            }
            .fa-rss:hover {
                background-color: #eb8231;
            }
            .fa-youtube {
                padding:4px 4px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                background-color: #322f30;
            }
            .fa-youtube:hover {
                background-color: #e64a41;
            }
            .fa-linkedin {
                padding:4px 4px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                background-color: #322f30;
            }
            .fa-linkedin:hover {
                background-color: #0073a4;
            }
            .fa-github {
                padding:4px 4px;
                -o-transition:.5s;
                -ms-transition:.5s;
                -moz-transition:.5s;
                -webkit-transition:.5s;
                transition: .5s;
                background-color: #322f30;
            }
            .fa-github:hover {
                background-color: #5a32a3;
            }
            .test {
                position: relative;
                float: left;
            }
            a.remImage img {
                box-shadow: none;
                position: absolute;
                right: 7px;
                top: -5px;
                margin-top: 4px;
                opacity: 0;
                display: block;
                transition: all .5s ease-in-out;
            }
            .test:hover a.remImage img {
                opacity: 1;
                z-index: 99;
                position: absolute;
                top: 5px;
            }
            .test:after {
                content: '';
                width: 100px;
                height: 100px;
                position: absolute;
                display: block;
                background: rgba(0, 0, 0, 0.6);
                top: 0px;
                z-index: 0;
                opacity: 0;
                transition: all .5s ease-in-out;
            }
            .test:hover:after{
                opacity: 1;
            }
        </style>
        <style>
            /*
 *mount wise picker
 */





            .month-picker {
                margin: 8px auto;
                width: 100%;
                text-align: center;
            }

            .month-picker-fieldset {
                display: inline-block;
                padding: 0 7px;
                background: #f4f6f9;
                border-radius: 5px;
                -webkit-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.7), inset 0 2px 2px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
                box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.7), inset 0 2px 2px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
            }

            .month-picker-fieldset > input {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }

            .month-picker-label, .month-picker-nav {

                display: inline-block;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                line-height: 25px;
                vertical-align: top;
                cursor: pointer;
            }

            input:focus + .month-picker-label, .month-picker-nav:focus {
                outline: 2px solid #5e9ed7;
                outline: 5px auto -webkit-focus-ring-color;
            }

            .month-picker-label {
                margin: 0 auto;
                position: relative;
                padding:  7px;
                font-size: 12px;
                font-weight: 200;
                color: #8d8ba6;
                text-transform: uppercase;
                text-shadow: 0 1px 1px black;
            }

            .month-picker-label, .month-picker-label:before {
                -webkit-transition: 0.15s ease-out;
                -moz-transition: 0.15s ease-out;
                -o-transition: 0.15s ease-out;
                transition: 0.15s ease-out;
            }

            .month-picker-label:before {
                content: '';
                position: absolute;
                top: -2px;
                bottom: -2px;
                left: -2px;
                right: -2px;
                border: 2px solid;

                border-color: #e4e0fb #b6b1d1 #b6b1d1;
                border-radius: 6px;
                opacity: 0;
                -webkit-box-shadow: 0 0 1px rgba(0, 0, 0, 0.2);
                box-shadow: 0 0 1px rgba(0, 0, 0, 0.2);
            }

            input:checked + .month-picker-label {
                color: white;
                background: #302e42;
                background-image: -webkit-linear-gradient(top, #302e42, #29253b);
                background-image: -moz-linear-gradient(top, #302e42, #29253b);
                background-image: -o-linear-gradient(top, #302e42, #29253b);
                background-image: linear-gradient(to bottom, #302e42, #29253b);
            }

            input:checked + .month-picker-label:before {
                opacity: 1;
            }

            .month-picker-nav {
                width: 100%;
                font-size: 16px;
                font-weight: bold;
                color: rgba(0, 0, 0, 0.7);
                text-align: center;
                text-decoration: none;
                text-shadow: 0 1px rgba(255, 255, 255, 0.1);
            }




            /* Seacrch csss bill detail page */



            input#search-bar{
                margin: 0 auto;
                width: 40%;
                height: 45px;
                padding: 0 20px;
                font-size: 1rem;
                border: 1px solid #D0CFCE;
                outline: none;
                &:focus{
                    border: 1px solid #008ABF;
                    transition: 0.35s ease;
                    color: #008ABF;
                    &::-webkit-input-placeholder{
                        transition: opacity 0.45s ease; 
                        opacity: 0;
                    }
                    &::-moz-placeholder {
                        transition: opacity 0.45s ease; 
                        opacity: 0;
                    }
                    &:-ms-placeholder {
                        transition: opacity 0.45s ease; 
                        opacity: 0;
                    }    
                }
            }

            .search-icon{
                position: relative;
                float: right;
                width: 75px;
                height: 75px;
                top: -62px;
                right: -45px;
            }




        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?php $data = $this->session->userdata('user_detail'); ?>
                        <div class="row" style="margin-right: 5px; margin-bottom: -13px; border-radius: 50px; ">
                            <div class="col-md-12">
                                <img src="<?php echo base_url('assets/images/'); ?><?php echo $data->image; ?>"  alt="Avatar" style="height: 31px; border-radius: 50%; width: 32px;">
                                <span style="margin-left:8px;"><?php echo $data->username; ?></span>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="row" style="margin-right: 5px; margin-bottom: -13px;">
                            <div class="col-md-12">
                                <p>
                                    <a href="<?php echo base_url('Welcome/logout'); ?>" class="btn btn-info btn-sm">
                                        <span class="glyphicon glyphicon-log-out"></span> Log out
                                    </a>
                                </p> 
                            </div>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="<?php echo base_url('welcome/dashboard'); ?>" class="brand-link">
                    <img src="<?php echo base_url('assets/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">Omid|Project</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->

                            <li class="nav-item">
                                <a href="<?php echo base_url('welcome/dashboard'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                        <!--<span class="right badge badge-danger">New</span>-->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-portrait"></i>
                                    <p>
                                        User List
                                        <i class="nav-icon fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Manager/admins'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Manager List
                                                <!--<span class="right badge badge-danger">New</span>-->
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('user/users'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Users List</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>
                                        All Shops
                                        <i class="nav-icon fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('shop/shops'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Shop List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('shop/mall'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Mall List</p>
                                        </a>
                                    </li>
<!--                                    <li class="nav-item">
                                        <a href="<?php echo base_url('shop/gallerry'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Shop Gallery List</p>
                                        </a>
                                    </li>-->

                                </ul>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">

                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <p>
                                        Vouchers List
                                        <i class="nav-icon fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Voucher/vouchers'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Vouchers 
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Voucher/send_vouchers'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> Send Voucher</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Voucher/report_vouchers'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Reports</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('timeline/timeline_list'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-stream"></i>
                                    <p>
                                        Timeline List
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Audience'); ?>" class="nav-link">
                                    <i class="fas fa-users"></i>
                                    <p>
                                        Audience
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Notification'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-envelope"></i>
                                    <p>
                                        Notification
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('feedback/feedback_list'); ?>" class="nav-link">
                                    <i class="fas fa-comments"></i>
                                    <p>
                                        FeedBack/Support
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('welcome/bill'); ?>" class="nav-link">
                                    <i class="fas fa-file-invoice"></i>
                                    <p>
                                        Bill Detail
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">

                                    <i class="fas fa-cog"></i>
                                    <p>
                                        Settings
                                        <i class="nav-icon fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Setting/reward'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Reward 
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('setting/company'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Suggested Company</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="content-wrapper">