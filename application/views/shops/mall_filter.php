<?php
$this->load->view('header');
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Mall Filter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Mall</a></li>
                    <li class="breadcrumb-item active">Filter</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">Mall Filter</h3>
                    <form method="POST" action="<?php echo base_url('shop/filter_mall'); ?>">
                        <ul class="list-group list-group-unbordered mb-3">
<!--                            <li class="list-group-item">
                                <label style="margin-left: 13px;">Category:</label>
                                <select class="select2-multiple" data-toggle="select2" id="module_access" name="category[]" multiple="multiple"  placeholder="Location" style="width: 50px;">
                                    <option value="fashion">Fashion</option>
                                    <option value="kids">Kids</option> 
                                    <option value="restaurants">Restorent</option> 
                                </select> 
                            </li>-->
                            <li class="list-group-item">
                                <label style="margin-left: 13px;">Location:</label>
                                <input type="text" name="location" class="form-control"  placeholder="Location">
                            </li>

                        </ul>
                        <input type="submit" class="btn btn-primary btn-block" value="Filter"> 

                    </form>
                </div>

                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
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
                                        <td><img src="<?php echo base_url('assets/images/11.png'); ?>" alt="" style="width:100px; height:auto;"></td>
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
            </div>
        </div>
    </div>
</div>
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
                                <form method="post" action="<?php echo base_url('shop/add_mall'); ?>" id="mall">
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
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="formsubmit()" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
<?php $this->load->view('footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example-getting-started').multiselect();
    });</script>
<script>
    $('#module_access').select2({width: '100%'});
</script>
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
                $("#img").val(data['image']);
            }
        })
    }

</script>