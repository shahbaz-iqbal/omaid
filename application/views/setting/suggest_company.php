<?php
$this->load->view('header');

?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Company Suggestion List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Company</a></li>
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
                    <button type="button" class="btn-success" data-toggle="modal" data-target="#exampleModal" style="float:right; margin-right: 22px; margin-top: 20px; ">
                        Add Company
                    </button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>             
                                <th>id</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($company)) { ?>
                                <?php foreach ($company as $result) { ?>
                                    <tr>
                                        <td><?php echo $result->id; ?></td>
                                        <td><?php echo $result->name; ?></td>
                                        <td><?php echo $result->location; ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-eye">
                                                </i>
                                                View
                                            </a>
                                           <a class="btn btn-info btn-sm" href="#" onclick="editShop('<?php echo $result->id; ?>')" data-toggle="modal" data-target="#exampleModal">
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
                                <th>Name</th>
                                <th>Location</th>
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
                                <form method="post" action="<?php echo base_url('Setting/add_company'); ?>" id="company_form" enctype="multipart/form-data">
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
                                        <input type="file" name="img" id="img" class="form-control">
                                    </div>
                                    <input type="hidden" name="edit_id" id="editId">
                                    <input type="hidden" name="edit_img" id="editimg">
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
    function formsubmit() {
        $('#company_form').submit();
    }
</script>
<script>
    function editShop(id) {
        console.log(id);
        $.ajax({
            url: "<?php echo base_url('Setting/edit_company/') ?>" + id,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);

                $("#editId").val(data['id']);
                $("#name").val(data['name']);
                $("#location").val(data['location']);
                $("#editimg").val(data['image']);
            }
        })
    }
</script>
