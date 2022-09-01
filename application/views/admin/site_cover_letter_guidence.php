<?php echo getBredcrum(ADMIN, array('#' => 'Cover Letter Guidance')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Cover Letter Guidance</strong></h2>
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
                                    <input type="file" name="image1" accept="image/*">
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <label for="display_banner_image" class="control-label">Display Image<span class="symbol required">*</span></label>
                <select name="display_banner_image" id="display_banner_image" class="form-control" required>
                    <option value='no' <?=$row['display_banner_image'] == 'no' ? 'selected' : ''?>>No</option>
                    <option value='yes' <?=$row['display_banner_image'] == 'yes' ? 'selected' : ''?>>Yes</option>
                </select>
            </div>
        </div>

        <h3>Section 2</h3>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="detail" rows="4" class="form-control ckeditor" ><?= $row['detail'] ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                        <label for="left_banner_button_title" class="control-label">Left Button Text<span class="symbol required">*</span></label>
                        <input type="text" name="left_banner_button_title" id="left_banner_button_title" value="<?= $row['left_banner_button_title'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="left_banner_button_link" class="control-label">Left Button Link<span class="symbol required">*</span></label>
                        <select name="left_banner_button_link" id="left_banner_button_link" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['left_banner_button_link'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <!-- <div class="col-md-6">
                        <label for="right_banner_button_title" class="control-label">Right Button Text<span class="symbol required">*</span></label>
                        <input type="text" name="right_banner_button_title" id="right_banner_button_title" value="<?= $row['right_banner_button_title'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="right_banner_button_link" class="control-label">Right Button Link<span class="symbol required">*</span></label>
                        <select name="right_banner_button_link" id="right_banner_button_link" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['right_banner_button_link'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div> -->
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