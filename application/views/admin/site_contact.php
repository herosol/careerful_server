<?php echo getBredcrum(ADMIN, array('#' => 'Contact')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Contact</strong></h2>
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
            <div class="col-md-4">
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
            <div class="col-md-8">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="banner_heading" class="control-label"> Banner Heading <span class="symbol required">*</span></label>
                        <input type="text" name="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="banner_detail" class="control-label"> Banner Detail <span class="symbol required">*</span></label>
                        <textarea name="banner_detail" rows="4" class="form-control" ><?= $row['banner_detail'] ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <h3> Section 2</h3>
            <div class="form-group">
                <div class="col-md-12">

                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="l_heading_1" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="l_heading_1" value="<?= $row['l_heading_1']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="l_detail_1" class="control-label"> Detail <span class="symbol required">*</span></label>
                            <input type="text" name="l_detail_1" value="<?= $row['l_detail_1']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="l_heading_2" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="l_heading_2" value="<?= $row['l_heading_2']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="l_detail_2" class="control-label"> Detail <span class="symbol required">*</span></label>
                            <input type="text" name="l_detail_2" value="<?= $row['l_detail_2']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="l_heading_3" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="l_heading_3" value="<?= $row['l_heading_3']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="l_detail_3" class="control-label"> Detail <span class="symbol required">*</span></label>
                            <input type="text" name="l_detail_3" value="<?= $row['l_detail_3']?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="form_heading" class="control-label"> Form Heading <span class="symbol required">*</span></label>
                            <input type="text" name="form_heading" value="<?= $row['form_heading']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="field_text1" class="control-label"> First Field Name <span class="symbol required">*</span></label>
                            <input type="text" name="field_text1" value="<?= $row['field_text1']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="field_placeholder1" class="control-label"> First Field Placeholder <span class="symbol required">*</span></label>
                            <input type="text" name="field_placeholder1" value="<?= $row['field_placeholder1']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="field_text2" class="control-label"> Second Field Name <span class="symbol required">*</span></label>
                            <input type="text" name="field_text2" value="<?= $row['field_text2']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="field_placeholder2" class="control-label"> Second Field Placeholder <span class="symbol required">*</span></label>
                            <input type="text" name="field_placeholder2" value="<?= $row['field_placeholder2']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="field_text3" class="control-label"> Third Field Name <span class="symbol required">*</span></label>
                            <input type="text" name="field_text3" value="<?= $row['field_text3']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="field_placeholder3" class="control-label"> Third Field Placeholder <span class="symbol required">*</span></label>
                            <input type="text" name="field_placeholder3" value="<?= $row['field_placeholder3']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="field_text4" class="control-label"> Fourth Field Name <span class="symbol required">*</span></label>
                            <input type="text" name="field_text4" value="<?= $row['field_text4']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="field_placeholder4" class="control-label"> Fourth Field Placeholder <span class="symbol required">*</span></label>
                            <input type="text" name="field_placeholder4" value="<?= $row['field_placeholder4']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="field_text5" class="control-label"> Fifth Field Name <span class="symbol required">*</span></label>
                            <input type="text" name="field_text5" value="<?= $row['field_text5']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="field_placeholder5" class="control-label"> Fifth Field Placeholder <span class="symbol required">*</span></label>
                            <input type="text" name="field_placeholder5" value="<?= $row['field_placeholder5']?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="button_text" class="control-label"> Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="button_text" value="<?= $row['button_text']?>" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Map Iframe Link</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="iframe_link" class="control-label"> Map iframe link <span class="symbol required">*</span></label>
                            <input type="text" name="iframe_link" value="<?= $row['iframe_link']?>" class="form-control" required>
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