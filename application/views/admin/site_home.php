<?php echo getBredcrum(ADMIN, array('#' => 'Home Page')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Home Page</strong></h2>
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
                            <label for="banner_tagline" class="control-label"> Tagline <span class="symbol required">*</span></label>
                            <input type="text" name="banner_tagline" value="<?= $row['banner_tagline'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="banner_field_heading" class="control-label"> Field Heading <span class="symbol required">*</span></label>
                            <input type="text" name="banner_field_heading" value="<?= $row['banner_field_heading'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="banner_button_text" class="control-label"> Button Text <span class="symbol required">*</span></label>
                            <input type="text" name="banner_button_text" value="<?= $row['banner_button_text'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="banner_no_of_candidates" class="control-label"> No Of Candidates Heading <span class="symbol required">*</span></label>
                            <input type="text" name="banner_no_of_candidates" value="<?= $row['banner_no_of_candidates'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="video" class="control-label">Banner Video <span class="symbol required">*</span></label>
                    <input type="file" name="video" id="video" class="form-control" <?php if (empty($row['video'])) {echo 'required=""';} ?>>
                    <br/>
                    <?php if(!empty($row['video'])): ?>
                        <video src="<?= getImageSrc(UPLOAD_PATH . "images/", $row['video'])?>" width="300" controls>
                        </video>
                    <?php endif; ?>
                </div>
            </div>
            <h3>Candidates Images</h3>
            <div class="form-group">
                <?php for($i = 1; $i <= 5; $i++):?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="panel panel-primary" data-collapsed="0">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            Image <?=$i?> 
                                        </div>
                                        <div class="panel-options">
                                            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                                <img src="<?=get_site_image_src("images", $row['image'.($i)]) ?>" alt="--">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image<?=($i)?>" accept="image/*" <?php if(empty($row['image'.($i)])){echo 'required=""';}?>>
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            <label for="muj_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="muj_heading" value="<?= $row['muj_heading'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
                <?php for($i = 1; $i <= 4; $i++):?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="muj_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="muj_heading<?=$i?>" value="<?= $row['muj_heading'.$i] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="muj_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                                <textarea name="muj_detail<?=$i?>" id="muj_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['muj_detail'.$i] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endfor?>
            </div>

            <h3>Section 4</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md12">
                            <label for="syj_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="syj_heading" value="<?= $row['syj_heading'] ?>" class="form-control" required>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="panel panel-primary" data-collapsed="0">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        Right Image
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
                        </div> -->
                    </div>
                </div>
                <!-- <?php for($i = 1; $i <= 4; $i++):?>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="syj_heading<?=$i?>" class="control-label"> Heading <span class="symbol required">*</span></label>
                                <input type="text" name="syj_heading<?=$i?>" value="<?= $row['syj_heading'.$i] ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="syj_detail<?=$i?>" class="control-label"> Card <?=$i?> Short Description <span class="symbol required">*</span></label>
                                <textarea name="syj_detail<?=$i?>" id="syj_detail<?=$i?>" rows="3" class="form-control" required=""><?= $row['syj_detail'.$i] ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endfor?> -->
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <table class="table table-bordered newTable" id="newTable">
                        <tr style="background-color: #eee">
                            <th width="25%">Heading</th>
                            <th>Detail</th>
                            <th width="10%">Order#</th>
                            <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                        </tr>
                        <?php $sec7s = getMultiText('home-sec7'); ?>
                        <?php if (count($sec7s) > 0) { $sec7s_count = 1; ?>
                        <?php foreach ($sec7s as $sec7) { ?>
                            <tr>
                                <td>
                                    <input type="text" name="sec7_title[]" id="sec7_title" value="<?= $sec7->title; ?>" class="form-control" placeholder="Heading">
                                </td>
                                <td>
                                    <textarea name="sec7_detail[]" id="sec7_detail" class="form-control" placeholder="Text" rows="3"><?= $sec7->detail; ?></textarea>
                                </td>
                                <td>
                                    <input type="number" name="sec7_order_no[]" id="sec7_order_no" value="<?= $sec7->order_no; ?>" class="form-control" placeholder="Order#">
                                </td>
                                <td class="text-center">
                                    <?php if ($sec7s_count > 1) { ?>
                                        <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $sec7s_count++; ?>
                        <?php } ?>
                        <?php }else{ ?>
                            <tr>
                                <td>
                                    <input type="text" name="sec7_title[]" id="sec7_title" value="" class="form-control" placeholder="Heading">
                                </td>
                                <td>
                                    <textarea name="sec7_detail[]" id="sec7_detail" class="form-control" placeholder="Text" rows="3"></textarea>
                                </td>
                                <td>
                                    <input type="number" name="sec7_order_no[]" id="sec7_order_no" value="" class="form-control" placeholder="Order#">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>  
                        <?php } ?>                  
                    </table>
                </div>
                <div class="col-md-6" >
                    <table class="table table-bordered newTable" id="newTable">
                        <tr style="background-color: #eee">
                            <th width="10%">Image</th>
                            <th width="10%">Order#</th>
                            <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                        </tr>
                        <?php $sec8s = getMultiText('home-sec8'); ?>
                        <?php if (count($sec8s) > 0) { $sec8s_count = 1; ?>
                        <?php foreach ($sec8s as $sec8) { ?>
                            <tr>
                                <td>
                                    <!-- Notes: Image dimention : 200px x 200px -->
                                    <div id="imgDiv">
                                        <input type="file" name="sec8_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                        <img src="<?php echo get_site_image_src('images', $sec8->image, 'thumb_'); ?>" style="width: 80%; cursor: pointer;" id="newImg"> 
                                        <input type="hidden" name="sec8_pics[]" value="<?= $sec8->image; ?>"> 
                                    </div>
                                </td>
                                <td>
                                    <input type="number" name="sec8_order_no[]" id="sec8_order_no" value="<?= $sec8->order_no; ?>" class="form-control" placeholder="Order#">
                                </td>
                                <td class="text-center">
                                    <?php if ($sec8s_count > 1) { ?>
                                        <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $sec8s_count++; ?>
                        <?php } ?>
                        <?php }else{ ?>
                            <tr>
                                <td>
                                    <!-- Notes: Image dimention : 200px x 200px -->
                                    <div id="imgDiv">
                                        <input type="file" name="sec8_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                        <img src="<?php echo get_site_image_src('images', $sec8->image, 'thumb_'); ?>" style="width: 40%; cursor: pointer;" id="newImg">
                                    </div>
                                </td>
                                <td>
                                    <input type="number" name="sec8_order_no[]" id="sec8_order_no" value="" class="form-control" placeholder="Order#">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>  
                        <?php } ?>                  
                    </table>
                </div>
            </div>

            <h3>Section 5</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="cats_tag" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="cats_tag" value="<?= $row['cats_tag'] ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="cats_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="cats_heading" value="<?= $row['cats_heading'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <table class="table table-bordered newTable" id="newTable">
                        <tr style="background-color: #eee">
                            <th width="10%">Image</th>
                            <th width="25%">Heading</th>
                            <th width="10%">Order#</th>
                            <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                        </tr>
                        <?php $sec6s = getMultiText('home-sec6'); ?>
                        <?php if (count($sec6s) > 0) { $sec6s_count = 1; ?>
                        <?php foreach ($sec6s as $sec6) { ?>
                            <tr>
                                <td>
                                    <!-- Notes: Image dimention : 200px x 200px -->
                                    <div id="imgDiv">
                                        <input type="file" name="sec6_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                        <img src="<?php echo get_site_image_src('images', $sec6->image); ?>" style="width: 40%; cursor: pointer;" id="newImg"> 
                                        <input type="hidden" name="sec6_pics[]" value="<?= $sec6->image; ?>"> 
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="sec6_title[]" id="sec6_title" value="<?= $sec6->title; ?>" class="form-control" placeholder="Heading">
                                </td>
                                <td>
                                    <input type="number" name="sec6_order_no[]" id="sec6_order_no" value="<?= $sec6->order_no; ?>" class="form-control" placeholder="Order#">
                                </td>
                                <td class="text-center">
                                    <?php if ($sec6s_count > 1) { ?>
                                        <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $sec6s_count++; ?>
                        <?php } ?>
                        <?php }else{ ?>
                            <tr>
                                <td>
                                    <!-- Notes: Image dimention : 200px x 200px -->
                                    <div id="imgDiv">
                                        <input type="file" name="sec6_image[]" accept="image/*" id="newImgInput" style="display: none;" />
                                        <img src="<?php echo get_site_image_src('images', $sec6->image); ?>" style="width: 40%; cursor: pointer;" id="newImg">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" name="sec6_title[]" id="sec6_title" value="" class="form-control" placeholder="Heading">
                                </td>
                                <td>
                                    <input type="number" name="sec6_order_no[]" id="sec6_order_no" value="" class="form-control" placeholder="Order#">
                                </td>
                                <td class="text-center">
                                </td>
                            </tr>  
                        <?php } ?>                  
                    </table>
                </div>
            </div>
            <h3>Section 6</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="spons_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="spons_heading" value="<?= $row['spons_heading'] ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Section 7</h3>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label for="testimonials_headig" class="control-label"> Heading <span class="symbol required">*</span></label>
                            <input type="text" name="testimonials_headig" value="<?= $row['testimonials_headig'] ?>" class="form-control" required>
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