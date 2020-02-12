<?php $this->load->view('header');
$shop_id_segment = $this->uri->segment(3);

?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Shop Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-md-12">
        <div class="card" style="margin-left: 5px; margin-right: 5px;">
            <h4 style="padding: 10px;">KFC, Inc.</h4>
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
                        <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Account Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-gallery-tab" data-toggle="pill" href="#custom-tabs-three-gallery" role="tab" aria-controls="custom-tabs-three-gallery" aria-selected="false">Gallery</a>
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
                                        <img src="<?php echo base_url('assets/images/'); ?><?php echo $user[0]->image; ?>" alt="" style="width:100px; height:100px; margin-bottom: 15px; border-radius: 80px;">
                                    </div>
                                    <div class="col-md-7" style=" margin-top: 20px;">
                                        <div class="footer-social-icons">
                                            <ul class="social-icons">
                                                <?php if (!empty($user[0]->facebook)) { ?>
                                                    <li><a target="_blank" rel="noopener noreferrer" href="<?php echo $user[0]->facebook; ?>" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                                                <?php } ?>
                                                <?php if (!empty($user[0]->twitter)) { ?>
                                                    <li><a target="_blank" rel="noopener noreferrer" href="<?php echo $user[0]->twitter; ?>" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
                                                <?php } ?>
                                                <?php if (!empty($user[0]->google)) { ?>
                                                    <li><a target="_blank" rel="noopener noreferrer" href="<?php echo $user[0]->google; ?>" class="social-icon"> <i class="fa fa-google"></i></a></li>
                                                <?php } ?>
                                                <?php if (!empty($user[0]->linkedin)) { ?>
                                                    <li><a target="_blank" rel="noopener noreferrer" href="<?php echo $user[0]->linkedin; ?>" class="social-icon"> <i class="fa fa-linkedin"></i></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="col-md-8">  
                                            <div class="form-group">
                                                <label style="color:white;">Category:</label>
                                                <input type="text" class="form-control" value="<?php echo $user[0]->CatName; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 style="color:white; margin-left: 60px;"> <?php echo $user[0]->name; ?></h3>
                                <div class="row invoice-info" style="margin-top: 20px;">
                                    <div class="col-sm-6 invoice-col" style="color:white; margin-left: 1px;">
                                        <address>
                                            <strong>Address:</strong>
                                            <ul>
                                                <?php $split = explode(',', $user[0]->location); ?>
                                                <?php foreach ($split as $location) { ?>
                                                    <li><a  target="_blank" href="http://maps.google.com/?q=<?php echo $location ?>"><?php echo $location ?></a></li>
                                                <?php } ?>
                                            </ul>
                                            Phone: <?php echo $user[0]->phone; ?><br>
                                            Email: <?php echo $user[0]->email; ?>
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
                                        <p><?php echo $user[0]->discription; ?></p>

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
                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/shop_detail'); ?>">
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





                        <!--                        <div class="row" style="margin-bottom: 20px;">
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                            <label style="margin-right: 22px; margin-top: 7px;">Filter By Date:</label>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control float-right" id="reservation">
                                                        </div>
                                                    </div>
                                                </div>-->
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: 20px;">
                                <input type="text" id="search-bar" placeholder="What can I help you with today?">
                            </div>
                        </div>
                        <form method="POST" action="#" id="shop_filter">
                            <input type="hidden" id="user_id_bill" value="<?php echo $user[0]->id; ?>">
                            <div class="row">
                                <div class="col-md-2">
                                    <select class="form-control" name="year" id="year" style="margin-top: 8px; margin-top: 8px;color: #2a263c; background-color: #f4f6f9;">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                        <option value="2033">2033</option>
                                        <option value="2034">2034</option>
                                        <option value="2035">2035</option>
                                        <option value="2036">2036</option>
                                    </select>
                                </div>
                                <div class="col-md-7">
                                    <!--<div class="month-picker">-->
                                    <fieldset class="month-picker-fieldset" style="width: 100%; margin-top: 7px;">
                                        <input type="radio" name="month" value="1" id="jan">
                                        <label for="jan" class="month-picker-label">Jan</label>
                                        <input type="radio" name="month" value="2" id="feb" checked>
                                        <label for="feb" class="month-picker-label">Feb</label>
                                        <input type="radio" name="month" value="3" id="mar">
                                        <label for="mar" class="month-picker-label">Mar</label>
                                        <input type="radio" name="month" value="4" id="apr">
                                        <label for="apr" class="month-picker-label">Apr</label>
                                        <input type="radio" name="month" value="5" id="may">
                                        <label for="may" class="month-picker-label">May</label>
                                        <input type="radio" name="month" value="6" id="jun">
                                        <label for="jun" class="month-picker-label">Jun</label>
                                        <input type="radio" name="month" value="7" id="jul">
                                        <label for="jul" class="month-picker-label">Jul</label>
                                        <input type="radio" name="month" value="8" id="aug">
                                        <label for="aug" class="month-picker-label">Aug</label>
                                        <input type="radio" name="month" value="9" id="sep">
                                        <label for="sep" class="month-picker-label">Sep</label>
                                        <input type="radio" name="month" value="10" id="oct">
                                        <label for="oct" class="month-picker-label">Oct</label>
                                        <input type="radio" name="month" value="11" id="nov">
                                        <label for="nov" class="month-picker-label">Nov</label>
                                        <input type="radio" name="month" value="12" id="dec">
                                        <label for="dec" class="month-picker-label">Dec</label>
                                    </fieldset>
                                    <!--</div>-->
                                </div>
                                <div class="col-md-3">
                                    <button type="button" onclick="filter_shop_bill()" style="margin-top: 11px;">Search</button>
                                    <!--<input type="submit" class="btn btn-" value="search" style="margin-top: 11px;">-->
                                </div>
                            </div>
                        </form>



                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>User Name</th>                
                                    <th>Voucher Name</th>
                                    <th>Bill Number</th>
                                    <th>Puchase Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
<!--                            <tbody>
                            <?php if (!empty($bill)) { ?>
                                <?php foreach ($bill as $bil) { ?>
                                                                                        <tr>
                                                                                            <td><?php echo $bil->UserName; ?></td>
                                                                                            <td><?php echo $bil->VouherName; ?></td>
                                                                                            <td><?php echo $bil->bill_number; ?></td>
                                                                                            <td><?php echo $bil->purchase_date; ?></td>
                                                                                            <td>
                                                                                                <a class="btn btn-primary btn-sm" href="<?php echo base_url('shop/shop_bill_detail/'); ?><?php echo $bil->id; ?>">
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
                            </tbody>-->
                            <tfoot>
                                <tr>
                                    <th>User Name</th>                
                                    <th>Voucher Name</th>
                                    <th>Bill Number</th>
                                    <th>Puchase Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-gallery" role="tabpanel" aria-labelledby="custom-tabs-three-gallery-tab">



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
                                        <button style="float:left; margin-left: 22px; margin-top: 20px; " type="button" class="btn-success" data-toggle="modal" data-target="#Category_model">
                                            Add Category
                                        </button>
                                        <button style="float:left; margin-left: 42px; margin-top: 20px; " type="button" class="btn-success" data-toggle="modal" data-target="#Slide_model">
                                            Add Slide
                                        </button>
                                        <button type="button" class="btn-success" data-toggle="modal" data-target="#exampleModal" style="float:right; margin-right: 22px; margin-top: 20px; ">
                                            Add Shop Gallery
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>             
                                                    <th>id</th>
                                                    <th>Category</th>
                                                    <th>Title</th>
                                                    <th>Shop Name</th>
                                                    <th>Before Price</th>
                                                    <th>After Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($gallery)) { ?>
                                                    <?php foreach ($gallery as $result) { ?>
                                                        <tr>
                                                            <td><?php echo $result->id; ?></td>
                                                            <td><?php echo $result->cat_name; ?></td>
                                                            <td><?php echo $result->title; ?></td>
                                                            <td><?php echo $result->ShopName; ?></td>
                                                            <td><?php echo $result->before_price; ?></td>
                                                            <td><?php echo $result->after_price; ?></td>
                                                            <td>
                                                                <a class="btn btn-primary btn-sm" href="#">
                                                                    <i class="fas fa-eye">
                                                                    </i>
                                                                    View
                                                                </a>
                                                                <a class="btn btn-info btn-sm" href="<?php echo base_url('shop/edit_gallery/'); ?><?php echo $result->id; ?>">
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
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>             
                                                    <th>id</th>
                                                    <th>Category</th>
                                                    <th>Title</th>
                                                    <th>Shop Name</th>
                                                    <th>Before Price</th>
                                                    <th>After Price</th>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Shop Gallery</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?php echo base_url('shop/gallery_add'); ?>" id="gallery_form" enctype="multipart/form-data">
                                                        <!--<input type="hidden" name="user_id" value="<?php echo $user[0]->id; ?>">--> 
                                                        <div class="form-group">
                                                            <label>Category</label>
                                                            <select class="form-control" name="category" id="category">
                                                                <?php if (!empty($shop_category)) { ?>
                                                                    <option>Select Mall</option>
                                                                    <?php foreach ($shop_category as $catname) {
                                                                        ?>
                                                                        <option value="<?php echo $catname->id; ?>"><?php echo $catname->cat_name; ?></option>
                                                                    <?php }
                                                                    ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Slide</label>
                                                            <select class="form-control" name="category" id="category">
                                                                <?php if (!empty($shop_slide)) { ?>
                                                                    <option>Select Mall</option>
                                                                    <?php foreach ($shop_slide as $slide) {
                                                                        ?>
                                                                        <option value="<?php echo $slide->id; ?>"><?php echo $slide->name; ?></option>
                                                                    <?php }
                                                                    ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" name="title" id="title" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Before Price</label>
                                                            <input type="text" name="before" id="before" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>After Price</label>
                                                            <input type="text" name="after" id="after" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Vedio</label>
                                                            <input type="file" name="vedio" id="vedio" class="form-control">
                                                        </div>
                                                        <!--                                                        <div class="form-group">
                                                                                                                    <label>Shop Name</label>
                                                                                                                    <select class="form-control" name="shopName" id="mall_id_name">
                                                        <?php if (!empty($shop)) { ?>
                                                                                                                                                        <option>Select Mall</option>
                                                            <?php foreach ($shop as $mallname) {
                                                                ?>
                                                                                                                                                                                        <option value="<?php echo $mallname->ShopId; ?>"><?php echo $mallname->ShopName; ?></option>
                                                            <?php } ?>
                                                                                    
                                                        <?php } ?>
                                                        
                                                                                                                    </select>
                                                                                                                </div>-->
                                                        <input type="hidden"  name="shopName" id="mall_id_name" value="<?php echo $user[0]->id; ?>">
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input type="file" class="form-control" name="img[]" id="img" multiple>
                                                        </div>
                                                        <input type="hidden" name="editId" id="editId">
                                                        <input type="hidden" name="editimage" id="editimg">
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" onclick="form_submit_gallery()" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Categoty Modal -->
                                    <div class="modal fade" id="Category_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?php echo base_url('shop/add_shop_category'); ?>" id="category_form">
                                                        <input type="hidden" name="cat_shop_id" value="<?php echo $shop_id_segment; ?>">
                                                        <div class="form-group">
                                                            <label>Category:</label>
                                                            <select class="form-control" name="categoryname" id="categoryname">
                                                                <?php if (!empty($category)) { ?>
                                                                    <option>Select Mall</option>
                                                                    <?php foreach ($category as $catname) {
                                                                        ?>
                                                                        <option value="<?php echo $catname->id; ?>"><?php echo $catname->name; ?></option>
                                                                    <?php }
                                                                    ?>
                                                                <?php } ?>
                                                            </select>
                                                           
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" onclick="formsubmit()" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--slide Model-->

                                    <div class="modal fade" id="Slide_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Slide</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="<?php echo base_url('timeline/add_slide'); ?>" id="slide_form">
                                                        <div class="form-group">
                                                            <label>Slide:</label>
                                                            <input type="text" name="slide" id="slide" class="form-control">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" onclick="slide_form()" class="btn btn-primary">Save changes</button>
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
            <!-- /.card -->
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script>
    function form_submit_gallery() {
        $('#gallery_form').submit();
    }
</script>
<script>
    function formsubmit() {
        $('#category_form').submit();
    }
</script>
<script>
    function slide_form() {
        $('#slide_form').submit();
    }
</script>
<script>
    function filter_shop_bill() {

        var year = $('#year').val();
        var user_id_bill = $('#user_id_bill').val();
        var month = $('input[name="month"]:checked').val();

        console.log(user_id_bill);
        $.ajax({
            url: "<?php echo base_url(); ?>shop/shop_detail",
            method: 'POST',
            // dataType: "json", 
            data: {year: year, month: month, user_id_bill: user_id_bill},
            success: function (data) {
                console.log(data);
            }
        });
    }

</script>
