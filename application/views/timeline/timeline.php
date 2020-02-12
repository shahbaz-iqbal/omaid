<?php $this->load->view('header'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Timeline List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Timeline</a></li>
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
                    <button style="float:left; margin-left: 42px; margin-top: 20px; " type="button" class="btn-success" data-toggle="modal" data-target="#Slide_model">
                        Add Slide
                    </button>
                    <button type="button" class="btn-success" data-toggle="modal" data-target="#exampleModal" style="float:right; margin-right: 22px; margin-top: 20px; ">
                        Add Timeline
                    </button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>             
                                <th>id</th>
                                <th>Shop Name</th>
                                <th>Category</th>
                                <th>slide</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($timeline)) { ?>
                                <?php foreach ($timeline as $res) { ?>
                                    <tr>
                                        <td><?php echo $res->id; ?></td>
                                        <td><?php echo $res->shop_id; ?></td>
                                        <td><?php echo $res->category; ?></td>
                                        <td><?php echo $res->slide; ?></td>
                                        <td>
                                            <img src="<?php echo base_url('assets/images/'); ?><?php echo $res->TimelineImage; ?>" alt="" style="width:40px; height:auto;">
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-eye">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="<?php echo base_url('timeline/edit_timeline/'); ?><?php echo $res->id; ?>">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('timeline/delete/'); ?><?php echo $res->id; ?>">
                                                <i class="fas fa-trash-alt">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>             
                                <th>id</th>
                                <th>Shop Name</th>
                                <th>Category</th>
                                <th>slide</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!--  Timeline Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Timeline</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?php echo base_url('Timeline/add_timeline'); ?>" id="timeline" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="cateegory" id="cateegroy" class="form-control">
                                                    <option>Select A Category</option>
                                                    <?php if (!empty($category)) { ?>
                                                            <?php foreach ($category as $catRes) { ?>
                                                            <option <?php echo $catRes->id; ?>><?php echo $catRes->name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Slide</label>
                                                <select name="slide" id="slide" class="form-control">
                                                    <option>Latest</option>
                                                    <option>Sale</option>
                                                    <option>Classic</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Caption</label>
                                                <input type="text" name="caption" id="caption" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Shop Link</label>
                                                <select name="shop_id" id="shop_id" class="form-control">
                                                    <?php if (!empty($shops)) { ?>
                                                        <?php foreach ($shops as $shopres) { ?>
                                                            <option <?php echo $shopres->name; ?>><?php echo $shopres->name; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Discription</label>
                                        <textarea class="form-control" name="discrip" id="disc" style="height: 122px"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" name="price" id="price" class="form-control" placeholder="Real">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="discount" id="discount" class="form-control" placeholder="Discount" style="margin-top: 32px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Images</label>
                                        <input type="file" name="img[]" id="imges" multiple="multiple" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Vedio</label>
                                        <input type="file" name="vedio" id="vedio" class="form-control">
                                    </div>
                                    <input type="hidden" name="edit_timeline" id="edit_timeline" class="form-control">
                                    <input type="hidden" name="edit_img[]" id="edit_images" class="form-control">
                                    <input type="hidden" name="edit_vedio" id="edit_vedio" class="form-control">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="submit_timeline()" class="btn btn-primary">Save changes</button>
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

                <!-- Slide Modal -->
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
</section>
<?php $this->load->view('footer'); ?>
<script>
    function edittimeline(id) {
        console.log(id);
        $.ajax({
            url: "<?php echo base_url('Timeline/edit/') ?>" + id,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);
                $("#edit_timeline").val(data['id']);
                $("#caption").val(data['caption']);
                $("#cateegroy").val(data['category']);
                $("#discount").val(data['discount_price']);
                $("#edit_images").val(data['images']);
                $("#price").val(data['real_price']);
                $("#shop_id").val(data['shop_id']);
                $("#slide").val(data['slide']);
                $("#edit_vedio").val(data['vedio']);
                $("#disc").val(data['discription']);
            }
        })
    }
</script>
<script>
    function submit_timeline() {
        $('#timeline').submit();
    }
</script>
<script>
    function slide_form() {
        $('#slide_form').submit();
    }
</script>
<script>
    function formsubmit() {
        $('#category_form').submit();
    }
</script>