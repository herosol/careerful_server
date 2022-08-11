<?php echo getBredcrum(ADMIN, array('#' => 'Careers')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Careers</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <!--        <a href="<?php echo base_url('admin/services'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>-->
    </div>
</div>
<div>
    <hr>
    <div class="clearfix"></div>
    <div class="panel-body">
        <form role="form"  method="post" class="form-horizontal form-groups-bordered validate" novalidate="novalidate" enctype="multipart/form-data">
        <h3> Main Banner</h3>
        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="banner_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="banner_detail" rows="4" class="form-control" ><?= $row['banner_detail'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="banner_button_title" class="control-label">Left Button Text (For Vendor) <span class="symbol required">*</span></label>
                        <input type="text" name="banner_button_title" id="banner_button_title" value="<?= $row['banner_button_title'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="banner_button_link" class="control-label">Left Button Link (For Vendor)<span class="symbol required">*</span></label>
                        <select name="banner_button_link" id="banner_button_link" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['banner_button_link'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Image
                        </div>
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                <img src="<?= !empty($row['image1']) ? base_url().UPLOAD_PATH.'images/'.$row['image1'] : 'http://placehold.it/3000x1000' ?>" alt="--">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="image1" accept="image/*" <?php if(empty($row['image1'])){echo 'required=""';}?>>
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3>Section 2</h3>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="ov_tag" class="control-label"> Tag <span class="symbol required">*</span></label>
                        <input type="text" name="ov_tag" value="<?= $row['ov_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="ov_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="ov_heading" value="<?= $row['ov_heading'] ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <?php for($i = 1; $i <= 4; $i++):?>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        Card <?=$i?> Image 
                                    </div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                            <img src="<?=get_site_image_src("images", $row['image'.($i+1)]) ?>" alt="--">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image<?=($i+1)?>" accept="image/*" <?php if(empty($row['image'.($i+1)])){echo 'required=""';}?>>
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="dc_card_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="dc_card_heading<?=$i?>" value="<?= $row['dc_card_heading'.$i] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="dc_card_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                            <textarea name="dc_card_detail<?=$i?>" id="dc_card_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['dc_card_detail'.$i] ?></textarea>
                        </div>
                    </div>
                </div>
            <?php endfor?>
        </div>

        <h3>Section 3</h3>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="syt_tag" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="syt_tag" value="<?= $row['syt_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="syt_heading" class="control-label"> Tagline <span class="symbol required">*</span></label>
                        <input type="text" name="syt_heading" value="<?= $row['syt_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="syt_button_title" class="control-label">Button Text<span class="symbol required">*</span></label>
                        <input type="text" name="syt_button_title" id="syt_button_title" value="<?= $row['syt_button_title'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="syt_button_link" class="control-label">Button Link<span class="symbol required">*</span></label>
                        <select name="syt_button_link" id="syt_button_link" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['syt_button_link'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <h3>Section 4 (Left)</h3>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="wwu_tag" class="control-label"> Tag <span class="symbol required">*</span></label>
                        <input type="text" name="wwu_tag" id="wwu_tag" value="<?= $row['wwu_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="wwu_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="wwu_heading" id="wwu_heading" value="<?= $row['wwu_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="wwu_desc" class="control-label">Short Description <span class="symbol required">*</span></label>
                        <textarea name="wwu_desc" id="wwu_desc" rows="5" class="form-control" required=""><?= $row['wwu_desc'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="wwu_button_title" class="control-label">Button Text<span class="symbol required">*</span></label>
                        <input type="text" name="wwu_button_title" id="wwu_button_title" value="<?= $row['wwu_button_title'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="wwu_button_link" class="control-label">Button Link<span class="symbol required">*</span></label>
                        <select name="wwu_button_link" id="wwu_button_link" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['wwu_button_link'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <h3>Section 4 (Right)</h3>
        <div class="form-group">
            <?php for($i = 1; $i <= 4; $i++):?>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        Card <?=$i?> Image 
                                    </div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                            <img src="<?=get_site_image_src("images", $row['image'.($i+5)]) ?>" alt="--">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="image<?=($i+5)?>" accept="image/*" <?php if(empty($row['image'.($i+5)])){echo 'required=""';}?>>
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="wwu_card_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="wwu_card_heading<?=$i?>" value="<?= $row['wwu_card_heading'.$i] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
            <?php endfor?>
        </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-2 control-label "></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>