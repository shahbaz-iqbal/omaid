<?php $this->load->view('header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Mall List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Mall</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
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
                    <a href="<?php echo base_url('shop/filter_mall'); ?>" class="btn btn-success" style="float:left; margin-left: 22px; margin-top: 20px; ">Filter</a>
                    <button type="button" class="btn-primary" data-toggle="modal" data-target="#exampleModal" style="float:right; margin-top: 20px; margin-right: 22px;">
                        Add Mall
                    </button>
                </div>
                <!--            <div class="card-header">
                              <h3 class="card-title">DataTable with minimal features & hover style</h3>
                            </div>-->
                <!-- /.card-header -->
                <div class="card-body">
<!--<input type="button" class="btn-primary" value="Add Admin">-->
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>              
                                <th> Mal Name</th>
                                <th>Location</th>
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
                                        <td><?php echo $result->location; ?></td>
                                        <td><img src="<?php echo base_url('assets/images/'); ?><?php echo $result->image; ?>" alt="" style="width:50px; height:auto;"></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('shop/mall_detail/'); ?><?php echo $result->id; ?>">
                                                <i class="fas fa-eye">
                                                </i>
                                                View
                                            </a>
                                           <a class="btn btn-info btn-sm" href="#" onclick="editMall('<?php echo $result->id; ?>')" data-toggle="modal" data-target="#exampleModal">
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
                        <tfoot>
                            <tr>
                                <th>Id</th>              
                                <th> Mal Name</th>
                                <th>Location</th>
                                <th>Image</th>
                                <th>View Mall</th>
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
                                <form method="post" action="<?php echo base_url('shop/add_mall'); ?>" id="mall" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="location" id="location" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" id="img" name="img" class="form-control">
                                    </div>
                                     <input type="hidden" name="editId" id="editId">
                                     <input type="hidden" name="editimg" id="editimg">
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
    function formsubmit() {
        $('#mall').submit();
    }
</script>
<script>
    function editMall(id) {
        console.log(id);
        $.ajax({
            url: "<?php echo base_url('Shop/mall_edit/') ?>" + id,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);

                $("#editId").val(data['id']);
                $("#location").val(data['location']);
                $("#name").val(data['name']);
                $("#editimg").val(data['image']);
            }
        })
    }

</script>