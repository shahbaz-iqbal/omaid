<?php
$this->load->view('header');
if (!empty($data)) {
    foreach ($data as $res) {
        
    }
};
if (isset($res->BillDetailPrice)) {
    $total = $res->BillDetailPrice;
}

if (isset($res->BillDetailDiscountPrice)) {
    $discount = $res->BillDetailDiscountPrice;
}
?>
<div class="card" style="padding: 50px;" >
    <div class="invoice p-3 mb-3" style="border: 5px solid;">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-book"></i> Bill No:<?php echo $res->bill_number; ?>
                    <small class="float-right"><i class="fas fa-user"></i>Manager Id: 12</small>
                </h4>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h4>
                    <span style="color:red;"><i class="fas fa-user"></i>Customer ID : <?php echo $res->user_id; ?></span> 
                    <span style="margin-left: 100px; color: red;"><i class="fas fa-user"></i>Name : <?php echo $res->UserName; ?></span>      
                    <span style="margin-left: 100px; color: red;"></span>      
                </h4>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-4">
                <h4>
                    <span style="color:blue;">Work Place:</span>  <span style="color:blue; margin-left: 10px"><?php echo $res->UserWorkPlace; ?></span> 
                </h4>
            </div>
            <div class="col-4">
               <!--cssc <?php echo $res->total_price; ?><span class="dot" style="text-align: center;">$</span>-->
            </div>
            <div class="col-4">
                <label>Vouchers:</label>
                <div class="row">
                    <div class="col-md-12">
                        <span class="bg-green" style="text-align: center; padding: 0px; border-radius: 5px; display: block; width: 65px;">
                            <?php echo $res->VoucherName; ?>                                                                                                           
                        </span>
                        <div style="margin-top:15px; "></div>

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h1>
                    <p style="text-align: center;">  <?php $res->discription; ?>       </p>

                </h1>

                <button id="bttn" class="btn btn-primary btn-sm"><i class="fas fa-eye"> </i>View Bill Detail</button>
            </div>
        </div>
        <hr>
        <div class="row hide">
            <div class="col-6">
                <h3 style="">Order</h3>
            </div>
            <div class="col-6">
                <h3 style="">Delivery</h3>
            </div>
        </div>
        <hr>
        <div class="row hide">
            <div class="col-12">
                <ul>
                     <?php if (!empty($data)) { ?>
                <?php foreach ($data as $order) { ?> 
                    <li>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Name:</label><br>
                                <span><?php echo $order->product_name; ?></span>

                            </div>
                            <div class="col-md-3">

                                <label>Total Amount:</label><br>
                                <span><?php echo $order->BillDetailPrice; ?></span>

                            </div>
                            <div class="col-md-3">
                                <label>Discount:</label><br>
                                <span style=" color: green;"><label>Percent:</label><?php $order->discount_percent; ?>%</span>
                            </div>
                            <div class="col-md-3">
                                <label>After Discount:</label><br>
                                <span><?php echo $order->BillDetailDiscountPrice; ?></span>
                            </div>
                        </div>
                    </li>
                     <?php
                }
            }
            ?>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row hide">
            <div class="col-6">
                <span style="text-align: center;">Selected Voucher:</span>
                <span class="bg-green" style="text-align: center; padding: 5px; border-radius: 5px;  width: 65px;">
                    <?php echo $res->VoucherName; ?>
                </span>
            </div>
            <div class="col-6">
                <span style="font-size: 50px; margin-left: 80px;">Total:</span><span style="margin-left: 50px;"><?php echo $total; ?></span>
                <p style="margin-left: 250px; color: red;"><?php echo $discount; ?></p>
                <span style=" color: green;">Over All Discount</span><span style="margin-left: 130px; color: green;">30%</span>
                <p style="margin-left: 230px;">---------------</p>
                <p style="margin-left: 250px; color: green;"><?php echo $number = $total - $discount; ?></p>
            </div>
        </div>
        <hr>
        <div class="row hide">
            <div class="col-12">
                <h3 style="float: right;"><span style="color: blue;">Level =</span> <?php echo $number ?> xp</h3>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script>
    $(".hide").hide();
    $("#bttn").click(function () {
        $(".hide").show();
    });
</script>
