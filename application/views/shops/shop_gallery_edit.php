<?php
$this->load->view('header');
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Shop Gallery</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Gallery</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <h3 class="profile-username">Edit Gallery</h3>
        <div class="row">
            <div class="col-md-2"> </div>
            <div class="col-md-8"> 
                <form method="post" action="<?php echo base_url('shop/update_gallery_shop'); ?>/<?php echo $data[0]->id; ?>" id="timeline" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category" id="category" value="<?php echo $data[0]->category; ?>" >
                                    <?php if (!empty($category)) { ?>
                                        <option>Select Mall</option>
                                        <?php foreach ($category as $catname) {
                                            ?>
                                         <option value="<?php echo $catname->id; ?>"  <?php if ($data[0]->category_id == $catname->id) { echo ' selected="selected"'; } ?>  ><?php echo $catname->name; ?></option>
                                        <?php }
                                        ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" id="title" value="<?php echo $data[0]->title; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Before Price</label>
                                <input type="text" name="before" id="before" value="<?php echo $data[0]->before_price; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>After Price</label>
                                <input type="text" name="after" id="after" value="<?php echo $data[0]->after_price; ?>" class="form-control">
                            </div>                       
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Vedio</label>
                                <input type="file" name="vedio" id="vedio" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Shop Name</label>
                                <select class="form-control" name="shopName" id="mall_id_name">
                                    <?php if (!empty($shop)) { ?>
                                        <option>Select Mall</option>
                                        <?php foreach ($shop as $mallname) {
                                            ?>
                                         <option value="<?php echo $mallname->ShopId; ?>"  <?php if ($data[0]->shop_id == $mallname->ShopId) { echo ' selected="selected"'; } ?>  ><?php echo $mallname->ShopName; ?></option>
                                            <option value="<?php echo $mallname->ShopId; ?>"><?php echo $mallname->ShopName; ?></option>
                                        <?php } ?>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="img[]" multiple="multiple" class="form-control">
                    </div>
                    <label>Delete Images:</label>
                    <div class="row">
                        <div class="col-md-12">
                             <?php if (!empty($timeline_image)) {
                                ?>
                                <?php foreach ($timeline_image as $img) {
                                    ?>
                                    <div class="test" id="test">
                                        <img width="100" height="100" src="<?php echo base_url('assets/images/'); ?><?php echo $img->images; ?>">	
                                        <a class="remImage delete" href="#" id="delete">
                                            <input type="hidden" id="imgid" name="imgid" value="<?php echo $img->id; ?>">
                                            <img width="100" height="100" src="<?php echo base_url('assets/images/'); ?><?php echo $img->images; ?>">	
                                            <!--<img src="https://image.flaticon.com/icons/svg/261/261935.svg" style="width:10px;height:10px;">-->
                                        </a>   
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                        </div>
                    </div>

                    
                    <input type="hidden" name="edit_vedio" value="<?php echo $data[0]->vedio; ?>">
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script>
    $('img').click(function ()
    {
        var id = $('#imgid').val();
        var test = $(this).attr('src').split('\/');
        var name = test[test.length - 1];
        
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "Shop/delete_image",
            dataType: 'json',
            data: {name: name, id: id},
            success: function (res) {
                if (res) {
                    location.reload();
                }
            }
        });
    });
</script>
