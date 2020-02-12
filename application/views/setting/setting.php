<?php $this->load->view('header'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Reward And Setting</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Reward</a></li>
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
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>             
                                <th>Coins = Aed</th>
                                <th>Level 1to20</th>
                                <th>Level 21to50</th>
                                <th>Level 51to100</th>
                                <th>Invite Friend</th>
                                <th>Invited Friend</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data)) { ?>
                                <?php foreach ($data as $res) { ?>
                                    <tr>
                                        <td><?php echo $res->coin_equal_to; ?></td>
                                        <td><?php echo $res->level_1_20; ?></td>
                                        <td><?php echo $res->level_21_50; ?></td>
                                        <td><?php echo $res->level_51_100; ?></td>
                                        <td><?php echo $res->invite_friend; ?></td>
                                        <td><?php echo $res->invited_friend_1st_purchase; ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-eye">
                                                </i>
                                                View
                                            </a>
                                            <a href="#" class="btn btn-info btn-sm" id="manger" onclick="editSetting(<?php echo $res->id; ?>)"  data-toggle="modal" data-target="#exampleModal" <i class="fas fa-pencil-alt">
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
                                <?php }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>             
                                 <th>Coins = Aed</th>
                                <th>Level 1to20</th>
                                <th>Level 21to50</th>
                                <th>Level 51to100</th>
                                <th>Invite Friend</th>
                                <th>Invited Friend</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="setting" method="POST" action="<?php echo base_url('Setting/update'); ?>">
                    <div class="form-group">
                        <label>AED</label>
                        <input type="text" class="form-control" name="aed" id="aed">
                    </div>
                    <div class="form-group">
                        <label>Level 1to20</label>
                        <input type="text" class="form-control" name="20" id="20">
                    </div>
                    <div class="form-group">
                        <label>Level 21to50</label>
                        <input type="text" class="form-control" name="50" id="50">
                    </div>
                    <div class="form-group">
                        <label>Level 51to100</label>
                        <input type="text" class="form-control" name="100" id="100">
                    </div>
                    <div class="form-group">
                        <label>Invite Friend</label>
                        <input type="text" class="form-control" name="invite" id="invite">
                    </div>
                    <div class="form-group">
                        <label>Invited Friend</label>
                        <input type="text" class="form-control" name="invited" id="invited">
                    </div>
                    <input type="hidden" name="editemail" id="edittimeline">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="submit_form()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script>
    function editSetting(id) {
        console.log(id);
        $.ajax({
            url: "<?php echo base_url('Setting/edit/') ?>" + id,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);
                $("#edittimeline").val(data['id']);
                $("#invite").val(data['invite_friend']);
                $("#invited").val(data['invited_friend_1st_purchase']);
                $("#20").val(data['level_1_20']);
                $("#50").val(data['level_21_50']);
                $("#100").val(data['level_51_100']);
                $("#aed").val(data['coin_equal_to']);
            }
        })
    }

</script>
<script>
    function submit_form() {
        $('#setting').submit();
    }
</script>