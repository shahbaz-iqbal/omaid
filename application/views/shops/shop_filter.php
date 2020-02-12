<?php $this->load->view('header');
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>All Shop Filter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
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
                    <h3 class="profile-username text-center">Shops Filter</h3>
                    <form method="POST" action="<?php echo base_url('shop/filter'); ?>" >
                        <ul class="list-group list-group-unbordered mb-3">
                            <div class="form-group">
                                <label style="margin-left: 13px;">Category:</label>
                                <select class="form-control" name="category">
                                    <option>Select option</option>
                                    <?php if (!empty($data)) { ?>
                                        <?php foreach ($data as $result) { ?>
                                            <option value="<?php echo $result->id; ?>"><?php echo $result->name; ?></option>
                                        <?php }
                                    }
                                    ?>
                                </select> 
                            </div>


                            <li class="list-group-item">
                                <label style="margin-left: 13px;">Location:</label>
                                <input type="text" class="form-control" name="location" placeholder="Location">
                            </li>
                        </ul>
                        <div class="form-group">

                        </div>
                        <div class="form-group">

                        </div>
                        <input type="submit" value="Filter" class="btn btn-primary btn-block">
                        <!--<a href="#" class="btn btn-primary btn-block"><b>Filter</b></a>-->
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
                                <th>Name</th>
                                <th>Location</th>
                                <th>Category</th>
                                <th>Mall Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($filterdata)) { ?>
                                <?php foreach ($filterdata as $resultfilter) {
                                    ?>
                                    <tr>
                                        <td><?php echo $resultfilter->name; ?></td>
                                        <td><?php echo $resultfilter->location; ?></td>
                                        <td><?php echo $resultfilter->CatName; ?></td>
                                        <td><?php echo $resultfilter->MallName; ?></td>
<!--                                        <td>
                                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('shop/shop_detail'); ?>">
                                                <i class="fas fa-eye">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="#">
                                                <i class="fas fa-trash-alt">
                                                </i>
                                                Delete
                                            </a>
                                        </td>-->
                                    </tr>
                                <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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