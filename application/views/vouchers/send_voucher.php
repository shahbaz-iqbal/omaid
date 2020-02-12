<?php $this->load->view('header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Send Vouchers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Voucher</a></li>
                    <li class="breadcrumb-item active">Send Voucher</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="card">
        <form action="<?php echo base_url('voucher/voucher_send_detail'); ?>" method="post">
            <div class="row" style="padding: 30;">
                <div class="col-6">
                    <label>Select Voucher</label>
                    <div class="form-group">
                        <select class="form-control" name="voucher_id" id="voucher_id">
                            <option>Select A Voucher</option>
                            <?php
                            if (!empty($voucher))
                                ;
                            {
                                ?>
                                <?php foreach ($voucher as $voc) { ?>
                            <option value="<?php echo $voc->id; ?>"><?php echo $voc->name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <label>Select Audience</label>
                    <div class="form-group">
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
                            s
                            ?>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-confirm" value="Send">
               
                <!-- /.card -->
            </div>
        </form>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<?php $this->load->view('footer'); ?>










