<?php $this->load->view('header'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Shop List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
    </div>
</section>
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
                    <button style="float:left; margin-left: 22px; margin-top: 20px; " type="button" class="btn-success" data-toggle="modal" data-target="#Category_model">
                        Add Category
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
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category" id="category">
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
                                    <div class="form-group">
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
                                    </div>
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
                                <form method="post" action="<?php echo base_url('timeline/add_category'); ?>" id="category_form">
                                    <div class="form-group">
                                        <label>Category:</label>
                                        <input type="text" name="category" id="category" class="form-control">
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

            </div>
        </div>
    </div>
</section>
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
