<?php $this->load->view('header'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Notification Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Notification</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-12">
                <?php if ($this->session->flashdata('success')) { ?>
                    <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                <?php } else if ($this->session->flashdata('error')) { ?>
                    <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="card" style="margin-left: 5px; margin-right: 5px;">
            <h4 style="padding: 10px;">Notification</h4>
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Create New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Use A Save Audience Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-send-tab" data-toggle="pill" href="#custom-tabs-three-send" role="tab" aria-controls="custom-tabs-three-send" aria-selected="false">Send Notification</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="card card-primary card-outline">
                                        <div>
                                            <button type="button" class="btn-success" data-toggle="modal" data-target="#exampleModal" style="float:right; margin-right: 22px; margin-top: 20px; ">
                                                Add Notification
                                            </button>
                                        </div>
                                        <div class="card-body box-profile">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Image</th>
                                                        <th>Discription</th>
                                                        <th>Shop_id</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($noti)) { ?>
                                                        <?php foreach ($noti as $notifi) { ?>
                                                            <tr>
                                                                <td><?php echo $notifi->name; ?></td>
                                                                <td><?php echo $notifi->image; ?></td>
                                                                <td><?php echo $notifi->discription; ?></td>
                                                                <td><?php echo $notifi->shop_id; ?></td>
                                                                <td>
                                                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('Notification/notification_user/'); ?><?php echo $notifi->id; ?>">
                                                                        <i class="fas fa-eye">
                                                                        </i>
                                                                        View
                                                                    </a>
                                                                    <a href="#" class="btn btn-info btn-sm" id="manger" onclick="editNotification(<?php echo $notifi->id; ?>)"  data-toggle="modal" data-target="#exampleModal"  <i class="fas fa-pencil-alt">
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
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form method="post" action="<?php echo base_url('notification/send_notify'); ?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Audience</label>
                                                    <select class="form-control" name="audience_id" id="audience_id">
                                                        <option>Select A Audience</option>
                                                        <?php
                                                        if (!empty($audience))
                                                            ;
                                                        {
                                                            ?>
                                                            <?php foreach ($audience as $res) { ?>
                                                                <option value="<?php echo $res->id; ?>"><?php echo $res->name; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Notification</label>
                                                    <select class="form-control" name="notification_id" id="audience_id">
                                                        <option>Select A Notification</option>
                                                        <?php
                                                        if (!empty($noti))
                                                            ;
                                                        {
                                                            ?>
                                                            <?php foreach ($noti as $ress) { ?>
                                                                <option value="<?php echo $ress->id; ?>"><?php echo $ress->name; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <input type="submit" class="btn btn-primary btn-sm" value="Send">
                                            </form>
                                        </div>
                                        <div class="col-md-6">

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>             
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>audience
                                <?php if (!empty($audience)) { ?>
                                    <?php foreach ($audience as $audi) { ?>
                                        <tr>
                                            <td><?php echo $audi->name; ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="<?php echo base_url('audience/audience_list/'); ?><?php echo $audi->id; ?>">
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
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-three-send" role="tabpanel" aria-labelledby="custom-tabs-three-send-tab">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>             
                                    <th>Audience Name</th>
                                    <th>Notification Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($send)) { ?>
                                <?php foreach ($send as $snd) { ?>
                                        <tr>
                                            <td><?php echo $snd->AudienceName; ?></td>
                                            <td><?php echo $snd->NoficationName; ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="#">
                                                    <i class="fas fa-eye">
                                                    </i>
                                                    View
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Notification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="Post" id="noti_form" action="<?php echo base_url('notification/add'); ?>" enctype="multipart/form-data">
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <label style="margin-left: 13px;">Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </li>
                        <li class="list-group-item">
                            <label style="margin-left: 13px;">Image:</label>
                            <input type="file" name="img" id="img" class="form-control">
                        </li>
                        <li class="list-group-item">
                            <label style="margin-left: 13px;">Discription:</label>
                            <textarea class="form-control" name="discription" id="discription"></textarea>
                        </li>
                        <label>Shop Link</label>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <select class="form-control" name="shop_link[]" id="shop_name">
                                        <option>Select A Shop</option>
                                        <?php if (!empty($shop)) { ?>
                                            <?php foreach ($shop as $shp) { ?>
                                                <option value="<?php echo $shp->name; ?>"><?php echo $shp->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="button" id="click" class="btn btn-success" value="+">
                            </div>
                        </div>
                        <div class="minuss" id="append">
                        </div>
                    </ul>
                    <input type="hidden" name="idnotification" id="idnotification">
                    <input type="hidden" name="editimg" id="img">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="submitform()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>

<script>
    function submitform() {
        $('#noti_form').submit();
    }

</script>
<script>
    $("#click").click(function (e) {
        e.preventDefault();
        $("#append").append(
                '<div class="row a">'
                + '<div class="col-md-10">'
                + '<div class="form-group">'
                + '<select class="form-control" name="shop_link[]" id="shop_name">'
                + '<option>Select Category</option>'
                + '<?php if (!empty($shop)) { ?>'
                    + '<?php foreach ($shop as $shp) { ?>'
                        + '<option value="<?php echo $shp->name; ?>"><?php echo $shp->name; ?></option>'
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
    function editNotification(id) {
        console.log(id);
        $.ajax({
            url: "<?php echo base_url('Notification/edit/') ?>" + id,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);
                $("#idnotification").val(data['id']);
                $("#discription").val(data['discription']);
                $("#img").val(data['image']);
                $("#name").val(data['name']);
            }
        })
    }
</script> 
