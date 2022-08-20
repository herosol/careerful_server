<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?= showMsg(); ?>
    <?php // getBredcrum(ADMIN, array('#' => 'Add/Update FAQ)); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> <?= $page_title?></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/career_options'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action="" name="frmFaq" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-6">
                        <label class="control-label" for="status"> Status <span class="symbol required">*</span></label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" <?php
                            if (isset($row->status) && '1' == $row->status) {
                                echo 'selected';
                            }
                            ?>>Active</option>
                            <option value="0" <?php
                            if (isset($row->status) && '0' == $row->status) {
                                echo 'selected';
                            }
                            ?>>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label"> Title <span class="symbol required">*</span></label>
                        <input type="text" name="title" value="<?php if (isset($row->title)) echo $row->title; ?>" class="form-control" required autofocus>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label"> Sort Order <span class="symbol required">*</span></label>
                        <input type="text" name="sort_order" value="<?php if (isset($row->sort_order)) echo $row->sort_order; ?>" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-bordered newTable" id="newTable" isCkeditor="true">
                            <tr style="background-color: #eee">
                                <th width="25%">Heading</th>
                                <th>Detail</th>
                                <th width="10%">Order#</th>
                                <th width="4%" class="text-center"><a href="javascript:void(0)" id="addNewRowTbl" class="addNewRowTbl"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                            </tr>
                            <?php
							if(empty($this->uri->segment(4)))
							{
								$headings = [];
							} 
							else
							{
								$headings = getMultiText('career_options_'.$this->uri->segment(4));
							}
							?>
							
                            <?php if (count($headings) > 0) { $headings_count = 1; ?>
                            <?php foreach ($headings as $heading) { ?>
                                <tr>
                                    <td>
                                        <input type="text" name="heading_title[]" id="heading_title" value="<?= $heading->title; ?>" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="heading_detail[]" id="heading_detail" class="form-control ckeditor" placeholder="Text" rows="4"><?= $heading->detail; ?></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="heading_order_no[]" id="heading_order_no" value="<?= $heading->order_no; ?>" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                        <?php if ($headings_count > 1) { ?>
                                            <a href="javascript:void(0)" id="delNewRowTbl" class="delNewRowTbl"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $headings_count++; ?>
                            <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td>
                                        <input type="text" name="heading_title[]" id="heading_title" value="" class="form-control" placeholder="Heading">
                                    </td>
                                    <td>
                                        <textarea name="heading_detail[]" id="heading_detail" class="form-control ckeditor" placeholder="Text" rows="4"></textarea>
                                    </td>
                                    <td>
                                        <input type="number" name="heading_order_no[]" id="heading_order_no" value="" class="form-control" placeholder="Order#">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                </tr>  
                            <?php } ?>                  
                        </table>
                    </div>
                </div>
                <hr class="hr-short">
                <div class="form-group text-right">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php else: ?>
        <?= showMsg(); ?>
        <?php // getBredcrum(ADMIN, array('#' => 'Manage FAQ)); ?>
        <div class="row margin-bottom-10">
            <div class="col-md-6">
                <h2 class="no-margin"><i class="entypo-list"></i> Career Options Main Headings</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="<?= site_url(ADMIN . '/career_options/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
            </div>
        </div>
        <table class="table table-bordered datatable" id="table-1">
            <thead>
                <tr>
                    <th width="10%" class="text-center">#</th>
                    <th>Title</th>
                    <th>Sort Order</th>
                    <th width="10%" class="text-center">Status</th>
                    <th width="12%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($rows) > 0): $count = 0; ?>
                    <?php foreach ($rows as $row): ?>
                        <tr class="odd gradeX">
                            <td class="text-center"><?= ++$count; ?></td>
                            <td><b><?= $row->title; ?></b></td>                     
                            <td><b><?= $row->sort_order; ?></b></td>                     
                            <td class="text-center"><?= get_member_active_status($row->status); ?></td>
                            <td class="text-center">
                                <a href="<?= site_url(ADMIN.'/career_options/manage/'.$row->id); ?>">Edit</a> |
                                <a href="<?= site_url(ADMIN.'/career_options/delete/'.$row->id); ?>" onclick="return confirm('Your are about to delete this FAQ. Press OK to continue.');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <?php endif; ?>
