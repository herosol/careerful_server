<?php echo getBredcrum(ADMIN, array('#' => 'Assessment Centre')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Assessment Centre</strong></h2>
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
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label for="banner_detail" class="control-label"> Detail <span class="symbol required">*</span></label>
                        <textarea name="banner_detail" rows="4" class="form-control ckeditor" ><?= $row['banner_detail'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="left_banner_button_title" class="control-label">Button Text<span class="symbol required">*</span></label>
                        <input type="text" name="left_banner_button_title" id="left_banner_button_title" value="<?= $row['left_banner_button_title'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="left_banner_button_link" class="control-label">Button Link<span class="symbol required">*</span></label>
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
                    <div class="col-md-6">
                        <label for="right_banner_button_title" class="control-label">Button Text<span class="symbol required">*</span></label>
                        <input type="text" name="right_banner_button_title" id="right_banner_button_title" value="<?= $row['right_banner_button_title'] ?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="right_banner_button_link" class="control-label">Button Link<span class="symbol required">*</span></label>
                        <select name="right_banner_button_link" id="right_banner_button_link" class="form-control" required>
                            <option value=''>-- Select --</option>
                            <?php $pages = get_pages();
                            foreach ($pages as $index => $page) { ?>
                                <option value="<?= $index ?>" <?= ($row['right_banner_button_link'] == $index) ? 'selected' : '' ?>> <?= $page ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

        </div>

        <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <h3> Section 2</h3>
                    </div>
                    <div class="col-md-12">
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <table class="table table-bordered newTable" id="newTable" isCkeditor="true">
                                    <tr style="background-color: #eee">
                                        <th width="25%">Heading</th>
                                        <th>Detail</th>
                                        <th width="10%">Order#</th>
                                        <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                                    </tr>
                                    <?php $sec2s = getMultiText('assessment-center-sec2'); ?>
                                    <?php if (count($sec2s) > 0) { $sec2s_count = 1; ?>
                                    <?php foreach ($sec2s as $sec2) { ?>
                                        <tr>
                                            <td>
                                                <input type="text" name="sec2_title[]" id="sec2_title" value="<?= $sec2->title; ?>" class="form-control" placeholder="Heading">
                                            </td>
                                            <td>
                                                <textarea name="sec2_detail[]" id="sec2_detail" class="form-control ckeditor" placeholder="Text" rows="3"><?= $sec2->detail; ?></textarea>
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
                                                <textarea name="sec2_detail[]" id="sec2_detail" class="form-control ckeditor" placeholder="Text" rows="3"></textarea>
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
                    <div class="clearfix"></div>
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