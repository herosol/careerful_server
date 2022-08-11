<?php echo getBredcrum(ADMIN, array('#' => 'Career Options')); ?>
<?php echo showMsg(); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-window"></i> Update <strong>Career Options</strong></h2>
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
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="banner_heading" class="control-label"> Heading <span class="symbol required">*</span></label>
                        <input type="text" name="banner_heading" value="<?= $row['banner_heading'] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="heading_1" class="control-label"> Heading 1 <span class="symbol required">*</span></label>
                        <input type="text" name="heading_1" value="<?= $row['heading_1'] ?>" class="form-control" required>
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <table class="table table-bordered newTable" id="newTable">
                            <tr style="background-color: #eee">
                                <th width="25%">Heading</th>
                                <th>Detail</th>
                                <th width="10%">Order#</th>
                                <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </tr>
                            <?php $heading1s = getMultiText('heading1-content'); ?>
                            <?php if (count($heading1s) > 0) { $heading1s_count = 1; ?>
                            <?php foreach ($heading1s as $heading1) { ?>
                                <tr>
                                    <td>
                                        <input type="text" name="heading1_title[]" id="heading1_title" value="<?= $heading1->title; ?>" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="heading1_detail[]" id="heading1_detail" class="form-control" placeholder="Text" rows="4"><?= $heading1->detail; ?></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="heading1_order_no[]" id="heading1_order_no" value="<?= $heading1->order_no; ?>" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                        <?php if ($heading1s_count > 1) { ?>
                                            <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $heading1s_count++; ?>
                            <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td>
                                        <input type="text" name="heading1_title[]" id="heading1_title" value="" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="heading1_detail[]" id="heading1_detail" class="form-control" placeholder="Text" rows="4"></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="heading1_order_no[]" id="heading1_order_no" value="" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                </tr>  
                            <?php } ?>                  
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="heading_2" class="control-label"> Heading 2 <span class="symbol required">*</span></label>
                        <input type="text" name="heading_2" value="<?= $row['heading_2'] ?>" class="form-control" required>
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <table class="table table-bordered newTable" id="newTable">
                            <tr style="background-color: #eee">
                                <th width="25%">Heading</th>
                                <th>Detail</th>
                                <th width="10%">Order#</th>
                                <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </tr>
                            <?php $heading2s = getMultiText('heading2-content'); ?>
                            <?php if (count($heading2s) > 0) { $heading2s_count = 1; ?>
                            <?php foreach ($heading2s as $heading2) { ?>
                                <tr>
                                    <td>
                                        <input type="text" name="heading2_title[]" id="heading2_title" value="<?= $heading2->title; ?>" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="heading2_detail[]" id="heading2_detail" class="form-control" placeholder="Text" rows="4"><?= $heading2->detail; ?></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="heading2_order_no[]" id="heading2_order_no" value="<?= $heading2->order_no; ?>" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                        <?php if ($heading2s_count > 1) { ?>
                                            <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $heading2s_count++; ?>
                            <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td>
                                        <input type="text" name="heading2_title[]" id="heading2_title" value="" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="heading2_detail[]" id="heading2_detail" class="form-control" placeholder="Text" rows="4"></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="heading2_order_no[]" id="heading2_order_no" value="" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                </tr>  
                            <?php } ?>                  
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="heading_3" class="control-label"> Heading 3 <span class="symbol required">*</span></label>
                        <input type="text" name="heading_3" value="<?= $row['heading_3'] ?>" class="form-control" required>
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <table class="table table-bordered newTable" id="newTable">
                            <tr style="background-color: #eee">
                                <th width="25%">Heading</th>
                                <th>Detail</th>
                                <th width="10%">Order#</th>
                                <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </tr>
                            <?php $heading3s = getMultiText('heading3-content'); ?>
                            <?php if (count($heading3s) > 0) { $heading3s_count = 1; ?>
                            <?php foreach ($heading3s as $heading3) { ?>
                                <tr>
                                    <td>
                                        <input type="text" name="heading3_title[]" id="heading3_title" value="<?= $heading3->title; ?>" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="heading3_detail[]" id="heading3_detail" class="form-control" placeholder="Text" rows="4"><?= $heading3->detail; ?></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="heading3_order_no[]" id="heading3_order_no" value="<?= $heading3->order_no; ?>" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                        <?php if ($heading3s_count > 1) { ?>
                                            <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $heading3s_count++; ?>
                            <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td>
                                        <input type="text" name="heading3_title[]" id="heading3_title" value="" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="heading3_detail[]" id="heading3_detail" class="form-control" placeholder="Text" rows="4"></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="heading3_order_no[]" id="heading3_order_no" value="" class="form-control" placeholder="Order#">
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

        

            <div class="form-group">
                <label for="field-1" class="col-sm-2 control-label "></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>