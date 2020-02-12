<?php
$this->load->view('header');
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Voucher List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Voucher</a></li>
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
                <div class="row">
                    <div class="col-md-3">
                        <form method="POST" action="<?php echo base_url('Voucher/vouchers'); ?>" id="category_form">
                            <label style="margin-left: 20px;">Category:</label>
                            <select name="category" class="form-control" style="margin-left: 20px;" id="category">
                                <option>Select Category</option>
                                <?php if (!empty($category)) { ?>
                                    <?php foreach ($category as $cat) {
                                        ?>
                                        <option value="<?php echo $cat->name; ?>"><?php echo $cat->name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <button type="button" class="btn-primary" data-toggle="modal" data-target="#exampleModal" style="float:right; margin-top: 20px; margin-right: 22px;">
                            Add Voucher
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>             
                                <th>Name</th>
                                <th>Discription</th>
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
                                        <td><?php echo $result->discription; ?></td>
                                        <td><img src="<?php echo base_url('assets/images/'); ?><?php echo $result->image; ?>" alt="" style="width:40px; height:auto;"></td>

                                        <td>
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-eye">
                                                </i>
                                                View
                                            </a>
                                            <a href="#" class="btn btn-info btn-sm" id="manger" onclick="editVoucher(<?php echo $result->id; ?>)" data-toggle="modal" data-target="#exampleModal">  <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo base_url('Voucher/delete/'); ?><?php echo $result->id; ?> ?>">
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
                                <th>Discription</th>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add Voucher</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?php echo base_url('voucher/add'); ?>" id="voucher" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="categoryAdd" class="form-control" id="catagory">
                                            <option>Select Category</option>
                                            <?php if (!empty($category)) { ?>
                                                <?php foreach ($category as $cate) {
                                                    ?>
                                                    <option value="<?php echo $cate->name; ?>"><?php echo $cate->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" name="starDate" id="startDate" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Expire Date</label>
                                        <input type="date" name="date" id="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="text" name="quantity" id="quantity" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Discription</label>
                                        <textarea class="form-control" id="disc" name="disc"style="height: 100px;"></textarea>
                                    </div>
                                    <label>Shop Link</label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <select class="form-control" name="shoplink[]" id="shop_name">
                                                    <option>Select Category</option>
                                                    <?php if (!empty($allShop)) { ?>
                                                        <?php foreach ($allShop as $shops) {
                                                            ?>
                                                            <option value="<?php echo $shops->id; ?>"><?php echo $shops->name; ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="button" id="click" class="btn btn-success" value="+">
                                        </div>
                                    </div>
                                    <div class="minuss" id="append"></div>
                                    <div class="form-group">
                                        <label>Terms&Conditions</label>
                                        <textarea style="height: 150px;" name="terms" id="terms" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="img" id="imges" class="form-control">
                                    </div>
                                    <div>
                                        <input type="hidden" id="idvoucher" name="idvoucher">
                                        <input type="hidden" id="imgesedit" name="editimg">
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
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<?php $this->load->view('footer'); ?>
<script>
    $("#click").click(function (e) {
        e.preventDefault();
        $("#append").append(
                '<div class="row a">'
                + '<div class="col-md-10">'
                + '<div class="form-group">'
                + '<select class="form-control" name="shoplink[]" id="shop_name">'
                + '<option>Select Category</option>'
                + '<?php if (!empty($allShop)) { ?>'
                    + '<?php foreach ($allShop as $shops) { ?>'
                        + '<option value="<?php echo $shops->id; ?>"><?php echo $shops->name; ?></option>'
                        + '<?php
    }
}
?>'
                + '</select>'
                + '</div>'
                + '</div>'
                + '<div class="col-md-2">'
                + '<input type="button" id="minus" onclick="sub()" class="btn btn-danger" value="-">'
                + '</div>'
                + '</div>');
    });
    function sub() {
        $('.a').remove();
    }
</script>
<script>
    function editVoucher(id) {
        console.log(id);
        $.ajax({
            url: "<?php echo base_url('Voucher/edit/') ?>" + id,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);
                $("#idvoucher").val(data['id']);
                $("#name").val(data['name']);
                $("#quantity").val(data['quantity']);
                $("#catagory").val(data['category']);
                $("#startDate").val(data['start_date']);
                $("#date").val(data['expire_date']);
                $("#disc").val(data['discription']);
                $("#shop_name").val(data['shop_id']);
                $("#terms").val(data['term_and_condition']);
                $("#imgesedit").val(data['image']);
            }
        })
    }
</script> 
<script>
    function formsubmit() {
        $('#voucher').submit();
    }
</script>
<script>
    $("#category").change(function () {
        $('#category_form').submit();
    });
</script>





























