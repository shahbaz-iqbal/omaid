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
                    <a href="<?php echo base_url('shop/filter'); ?>" class="btn btn-success" style="float:left; margin-left: 22px; margin-top: 20px; ">Filter</a>
                    <button type="button" class="btn-success" data-toggle="modal" data-target="#exampleModal" style="float:right; margin-right: 22px; margin-top: 20px; ">
                        Add Shop
                    </button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>             
                                <th>id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Mall Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data)) { ?>
                                <?php foreach ($data as $result) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result->id; ?></td>
                                        <td><?php echo $result->name; ?></td>
                                        <td><?php echo $result->cat_name; ?></td>
                                        <td><?php echo $result->mall_name; ?></td>
                                        <td><img src="<?php echo base_url('assets/images/'); ?><?php echo $result->image; ?>" alt="" style="width:30px; height:auto;"></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('shop/shop_detail/'); ?><?php echo $result->id; ?>">
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
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>             
                                <th>id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Mall Name</th>
                                <th>Image</th>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add Shop</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?php echo base_url('shop/add'); ?>" id="shop" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category" id="category">
                                            <?php if (!empty($category)) { ?>
                                                <option>Select Mall</option>
                                                <?php foreach ($category as $catname) {
                                                    ?>
                                                <option value="<?php echo $catname->id; ?>"><?php echo $catname->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="location[]" id="location" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="button" id="clicklocation" class="btn btn-success" value="+" style=" margin-top: 30px;">
                                        </div>
                                    </div>
                                    <div class="" id="appendlocation"></div>
                                    <div class="form-group">
                                        <label>Mall name</label>
                                        <select class="form-control" name="mallName" id="mall_id_name">
                                            <?php if (!empty($mall)) { ?>
                                                <option>Select Mall</option>
                                                <?php foreach ($mall as $mallname) {
                                                    ?>
                                                    <option value="<?php echo $mallname->id; ?>"><?php echo $mallname->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="url" name="facebook" id="facebook" class="form-control" placeholder="Optional">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="url" name="twitter" id="twitter" class="form-control" placeholder="Optional">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Google</label>
                                                <input type="url" name="google" id="google" class="form-control" placeholder="Optional">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>LinkedIn</label>
                                                <input type="url" name="linkedin" id="linkedin" class="form-control" placeholder="Optional">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Discription</label>
                                        <input type="text" name="disc" id="disc" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Terms & Conditions</label>
                                        <input type="text" name="term" id="term" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="img" id="img">
                                    </div>
                                    <input type="hidden" name="editId" id="editId">
                                    <input type="hidden" name="editimage" id="editimg">
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
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>-->
<!--<script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#example-getting-started').multiselect();
                                    });</script>
<script>
    $('#module_access').select2({width: '70%'});
</script>-->
<script>
    function formsubmit() {
        $('#shop').submit();
    }
</script>
<script>
    function editShop(id) {
        console.log(id);
        $.ajax({
            url: "<?php echo base_url('Shop/edit/') ?>" + id,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);

                $("#editId").val(data['id']);
                $("#term").val(data['term_condition']);
                $("#facebook").val(data['facebook']);
                $("#google").val(data['google']);
                $("#linkedin").val(data['linkedin']);
                $("#twitter").val(data['twitter']);
                $("#email").val(data['email']);
                $("#phone").val(data['phone']);
                $("#social").val(data['social_link']);
                $("#disc").val(data['discription']);
                $("#category").val(data['category']);
                $("#location").val(data['location']);
                $("#mall_id_name").val(data['mall_id']);
                $("#name").val(data['name']);
                $("#editimg").val(data['image']);
            }
        })
    }
</script>
<script>
    $("#clicklocation").click(function (e) {
        e.preventDefault();
        $("#appendlocation").append(
                '<div class="row b">'
                + '<div class="col-md-11">'
                + '<div class="form-group">'
                + '<label>Location</label>'
                + '<input type="text" name="location[]" id="location" class="form-control">'
                + '</div>'
                + '</div>'
                + '<div class="col-md-1">'
                + '<input type="button" id="minus" onclick="sub()" class="btn btn-danger" value="-" style=" margin-top: 30px;">'
                + '</div>'
                + '</div>');
    });
    function sub() {
        $('.b').remove();
    }
</script>