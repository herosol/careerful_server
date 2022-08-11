<?php echo getBredcrum(ADMIN, array('#' => 'Reset Password')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Reset Password</strong></h2>
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
        <h3>Left Section</h3>
        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="banner_tag" class="control-label"> Tag <span class="symbol required">*</span></label>
                        <input type="text" name="banner_tag" value="<?= $row['banner_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="banner_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="banner_detail" rows="4" class="form-control" ><?= $row['banner_detail'] ?></textarea>
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <!-- <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label> -->
                        <input type="text" name="banner_create_heading" value="<?= $row['banner_create_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="banner_button_title" class="control-label">Link Text <span class="symbol required">*</span></label>
                        <input type="text" name="banner_button_title" id="banner_button_title" value="<?= $row['banner_button_title'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="banner_button_link" class="control-label">Link<span class="symbol required">*</span></label>
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
                            Left Background Image
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

        <h3>Right Section</h3>
        <div class="form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="right_heading" class="control-label">Section Heading <span class="symbol required">*</span></label>
                        <input type="text" name="right_heading" value="<?= $row['right_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="right_tagline" class="control-label">Section Tagline <span class="symbol required">*</span></label>
                        <input type="text" name="right_tagline" value="<?= $row['right_tagline'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="first_field_heading" class="control-label">First Field Heading <span class="symbol required">*</span></label>
                        <input type="text" name="first_field_heading" value="<?= $row['first_field_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="first_field_placeholder" class="control-label">First Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="first_field_placeholder" value="<?= $row['first_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="second_field_heading" class="control-label">Second Field Heading <span class="symbol required">*</span></label>
                        <input type="text" name="second_field_heading" value="<?= $row['second_field_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="second_field_placeholder" class="control-label">Second Field Placeholder <span class="symbol required">*</span></label>
                        <input type="text" name="second_field_placeholder" value="<?= $row['second_field_placeholder'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="submit_text" class="control-label">Button Text<span class="symbol required">*</span></label>
                        <input type="text" name="submit_text" value="<?= $row['submit_text'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="forgot_password" class="control-label">Left Heading<span class="symbol required">*</span></label>
                        <input type="text" name="forgot_password" value="<?= $row['forgot_password'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="forgot_password_heading" class="control-label">Link Text<span class="symbol required">*</span></label>
                        <input type="text" name="forgot_password_heading" value="<?= $row['forgot_password_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="forgot_password_link" class="control-label">Link<span class="symbol required">*</span></label>
                        <select name="forgot_password_link" id="forgot_password_link" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['forgot_password_link'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
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