<?php $this->load->view('header'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Bill List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Bill</a></li>
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
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <input type="text" id="search-bar" placeholder="What can I help you with today?">
                        </div>
    
                    </div>
                    <form method="POST" action="<?php echo base_url('Welcome/bill'); ?>">
                        <div class="row">
                            <div class="col-md-2">
                                <select class="form-control" name="year" style="margin-top: 8px; margin-top: 8px;color: #2a263c; background-color: #f4f6f9;">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                    <option value="2033">2033</option>
                                    <option value="2034">2034</option>
                                    <option value="2035">2035</option>
                                    <option value="2036">2036</option>
                                </select>
                            </div>
                            <div class="col-md-7">
                                <!--<div class="month-picker">-->
                                <fieldset class="month-picker-fieldset" style="width: 100%; margin-top: 7px;">
                                    
                                        <input type="radio" name="month" value="1" id="jan">
                                        <label for="jan" class="month-picker-label">Jan</label>
                                        <input type="radio" name="month" value="2" id="feb" checked>
                                        <label for="feb" class="month-picker-label">Feb</label>
                                        <input type="radio" name="month" value="3" id="mar">
                                        <label for="mar" class="month-picker-label">Mar</label>
                                        <input type="radio" name="month" value="4" id="apr">
                                        <label for="apr" class="month-picker-label">Apr</label>
                                        <input type="radio" name="month" value="5" id="may">
                                        <label for="may" class="month-picker-label">May</label>
                                        <input type="radio" name="month" value="6" id="jun">
                                        <label for="jun" class="month-picker-label">Jun</label>
                                        <input type="radio" name="month" value="7" id="jul">
                                        <label for="jul" class="month-picker-label">Jul</label>
                                        <input type="radio" name="month" value="8" id="aug">
                                        <label for="aug" class="month-picker-label">Aug</label>
                                        <input type="radio" name="month" value="9" id="sep">
                                        <label for="sep" class="month-picker-label">Sep</label>
                                        <input type="radio" name="month" value="10" id="oct">
                                        <label for="oct" class="month-picker-label">Oct</label>
                                        <input type="radio" name="month" value="11" id="nov">
                                        <label for="nov" class="month-picker-label">Nov</label>
                                        <input type="radio" name="month" value="12" id="dec">
                                        <label for="dec" class="month-picker-label">Dec</label>
                                        
                                    </fieldset>
                                <!--</div>-->
                            </div>
                            <div class="col-md-3">
                                <button type="submit" style="margin-top: 11px;">Search</button>
                                <!--<input type="submit" class="btn btn-" value="search" style="margin-top: 11px;">-->
                            </div>
                        </div>
                    </form>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>User Name</th>       
                                <th>Shop Name</th>
                                <th>Voucher Used</th>
                                <th>Bill No</th>
                                <th>Payment</th>
                                <th>Price</th>
                                <th>Discription</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($bill)) { ?>
                                <?php foreach ($bill as $result) { ?>
                                    <tr>
                                        <td><?php echo $result->name; ?></td>
                                        <td><?php echo $result->ShopName; ?></td>
                                        <td><?php echo $result->VoucherName; ?></td>
                                        <td><?php echo $result->bill_number; ?></td>
                                        <td><?php echo $result->payment_method; ?></td>
                                        <td><?php echo $result->total_price; ?></td>
                                        <td><?php echo $result->discription; ?></td>
                                        <td><?php echo $result->purchase_date; ?></td>

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
<?php $this->load->view('footer'); ?>
<script>
$(document).ready(function(){
  $("#search-bar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#example2 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>