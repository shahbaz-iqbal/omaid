<?php $this->load->view('header'); ?>



<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Shop List</h1>
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
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Shop Id</th>       
                                <th>Shop Name</th>       
                                <th>Reply</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($shop)) { ?>
                                <?php foreach ($shop as $result) {
                                    ?>
                                    <tr>
                                        <td><?php echo $result->id; ?></td>
                                        <td><?php echo $result->name; ?></td>
                                        <td> 
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-eye">
                                                </i>
                                               Bill View
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-eye">
                                                </i>
                                              View Feedback
                                            </a>
                                            <a href="#" class="btn btn-info btn-sm"  onclick="Shop_id('<?php echo $result->id; ?>')" id="manger" data-toggle="modal" data-target="#feedbackonnote"  <i class="fas fa-pencil-alt">
                                                </i>
                                                Reply
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
</section>
<div class="modal fade" id="feedbackonnote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Feedback On Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo base_url('feedback/add_feedback_on_note'); ?>">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="shahbaz@gmail.com">
                    </div>
                    <div class="form-group">
                        <label>Discription</label>
                        <textarea class="form-control" style="height: 150px;" name="disc"></textarea>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="shop_id" id="shop_id">
                    <input type="submit" class="btn btn-primary" value="Send">
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>
<script>
function Shop_id(id){
    console.log(id);
    $("#shop_id").val(id);
}
</script>-->