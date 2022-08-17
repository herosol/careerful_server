<?php echo getBredcrum(ADMIN, array('#' => 'About Us')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>About Us</strong></h2>
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
                        <label for="banner_tag" class="control-label"> Tag <span class="symbol required">*</span></label>
                        <input type="text" name="banner_tag" value="<?= $row['banner_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="banner_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="banner_detail" rows="4" class="form-control ckeditor" ><?= $row['banner_detail'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="banner_button_title" class="control-label">Left Button Text <span class="symbol required">*</span></label>
                        <input type="text" name="banner_button_title" id="banner_button_title" value="<?= $row['banner_button_title'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="banner_button_link" class="control-label">Left Button Link<span class="symbol required">*</span></label>
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
                            <label for="ov_card_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="ov_card_heading<?=$i?>" value="<?= $row['ov_card_heading'.$i] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="ov_card_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                            <textarea name="ov_card_detail<?=$i?>" id="ov_card_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['ov_card_detail'.$i] ?></textarea>
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
                        <label for="faq_tag" class="control-label"> Tag <span class="symbol required">*</span></label>
                        <input type="text" name="faq_tag" value="<?= $row['faq_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="faq_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="faq_heading" value="<?= $row['faq_heading'] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-bordered newTable" id="newTable">
                            <tr style="background-color: #eee">
                                <th width="25%">Heading</th>
                                <th>Detail</th>
                                <th width="10%">Order#</th>
                                <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </tr>
                            <?php $sec2s = getMultiText('about-us-faq'); ?>
                            <?php if (count($sec2s) > 0) { $sec2s_count = 1; ?>
                            <?php foreach ($sec2s as $sec2) { ?>
                                <tr>
                                    <td>
                                        <input type="text" name="sec2_title[]" id="sec2_title" value="<?= $sec2->title; ?>" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="sec2_detail[]" id="sec2_detail" class="form-control ckeditor" placeholder="Text" rows="4"><?= $sec2->detail; ?></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="sec2_order_no[]" id="sec2_order_no" value="<?= $sec2->order_no; ?>" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                        <?php if ($sec2s_count > 1) { ?>
                                            <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $sec2s_count++; ?>
                            <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td>
                                        <input type="text" name="sec2_title[]" id="sec2_title" value="" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="sec2_detail[]" id="sec2_detail" class="form-control ckeditor" placeholder="Text" rows="4"></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="sec2_order_no[]" id="sec2_order_no" value="" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                </tr>  
                            <?php } ?>                  
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <h3>Section 4</h3>
        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="cu_tag" class="control-label"> Tag <span class="symbol required">*</span></label>
                        <input type="text" name="cu_tag" id="cu_tag" value="<?= $row['cu_tag'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_heading" id="cu_heading" value="<?= $row['cu_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_desc" class="control-label">Short Description <span class="symbol required">*</span></label>
                        <textarea name="cu_desc" id="cu_desc" rows="5" class="form-control" required=""><?= $row['cu_desc'] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_address" class="control-label"> Address <span class="symbol required">*</span></label>
                        <input type="text" name="cu_address" id="cu_address" value="<?= $row['cu_address'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_email" class="control-label"> Email <span class="symbol required">*</span></label>
                        <input type="text" name="cu_email" id="cu_email" value="<?= $row['cu_email'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_phone" class="control-label"> Phone <span class="symbol required">*</span></label>
                        <input type="text" name="cu_phone" id="cu_phone" value="<?= $row['cu_phone'] ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="cu_form_1_heading" class="control-label"> First Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_1_heading" value="<?= $row['cu_form_1_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_1_field_heading" class="control-label"> First Field Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_1_field_heading" value="<?= $row['cu_form_1_field_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_2_heading" class="control-label"> Second Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_2_heading" value="<?= $row['cu_form_2_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_2_field_heading" class="control-label"> Second Field Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_2_field_heading" value="<?= $row['cu_form_2_field_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_3_heading" class="control-label"> Third Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_3_heading" value="<?= $row['cu_form_3_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_3_field_heading" class="control-label"> Third Field Heading <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_3_field_heading" value="<?= $row['cu_form_3_field_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="cu_form_button_text" class="control-label"> Form Text <span class="symbol required">*</span></label>
                        <input type="text" name="cu_form_button_text" value="<?= $row['cu_form_button_text'] ?>" class="form-control" required>
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