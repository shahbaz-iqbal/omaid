<?php
$this->load->view('header');
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Timeline Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Timeline</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <h3 class="profile-username">Edit Timeline</h3>
        <div class="row">
            <div class="col-md-2"> </div>
            <div class="col-md-8"> 
                <form method="post" action="<?php echo base_url('Timeline/update_timeline'); ?>/<?php echo $data->id; ?>" id="timeline" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="cateegory" id="cateegroy" class="form-control">
                                    <option>Select A Category</option>
                                    <?php if (!empty($category)) { ?>
                                        <?php foreach ($category as $catRes) { ?>
                                            <option <?php echo $catRes->id; ?>><?php echo $catRes->name; ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Slide</label>
                                <select name="slide" id="slide" value="<?php echo $data->slide; ?>" class="form-control">
                                    <option <?php if ($data->slide == 'Latest' ) echo 'selected' ; ?> value="Latest">Latest</option>
                                    <option <?php if ($data->slide == 'Sale' ) echo 'selected' ; ?> value="Sale">Sale</option>
                                    <option <?php if ($data->slide == 'Classic' ) echo 'selected' ; ?> value="Classic">Classic</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Caption</label>
                                <input type="text" name="caption" id="caption" value="<?php echo $data->caption; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Shop Link</label>
                                <select name="shop_id" id="shop_id" value="<?php echo $data->shop_id; ?>" class="form-control">
                                    <?php if (!empty($shops)) { ?>
                                        <?php foreach ($shops as $shopres) { ?>
                                    <option value="<?php echo $shopres->name; ?>"><?php echo $shopres->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Discription</label>
                        <textarea class="form-control" name="discrip" id="disc" style="height: 122px"><?php echo $data->discription; ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" id="price" value="<?php echo $data->real_price; ?>" class="form-control" placeholder="Real">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="discount" value="<?php echo $data->discount_price; ?>" id="discount" class="form-control" placeholder="Discount" style="margin-top: 32px;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="img[]" id="imges" multiple="multiple" class="form-control">
                    </div>
                     <label>Delete Images:</label>
                    <div class="row">
                        <div class="col-md-12">
                            
                            <?php if (!empty($image)) {
                                ?>
                                <?php foreach ($image as $img) {
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
                    <div class="form-group">
                        <label>Vedio</label>
                        <input type="file" name="vedio" value="<?php echo $data->vedio; ?>" id="vedio" class="form-control">
                    </div>
                    <input type="hidden" name="edit_vedio" value="<?php echo $data->vedio; ?>">
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
            url: "<?php echo base_url(); ?>" + "Timeline/delete_image",
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
