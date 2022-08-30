<?php if ($this->uri->segment(3) == 'manage'): ?>

<?= showMsg(); ?>

<?= getBredcrum(ADMIN, array('#' => 'Add/Update Visa Sponsor Logo')); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>Visa Sponsor</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="<?= site_url(ADMIN . '/visasponsors'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
    </div>
</div>
<div>
    <hr>
    <div class="row col-md-12">
        <form action="" name="frmLocation" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="row col-md-6">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Partners Image
                                </div>
                                <div class="panel-options">
                                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden"><input type="hidden">
                                    <div class="fileinput-new thumbnail" style="max-width: 310px; height: 110px;" data-trigger="fileinput">
                                        <img src="<?= !empty($row->image) ? getImageSrc(SITE_IMAGES . "/visasponsors/thumb_", $row->image) : 'http://placehold.it/1500x1000' ?>" alt="--">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px; line-height: 6px;"></div>

                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image" accept="image/*" >
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <br>
                        <label class="control-label" for="status"> Slider <span class="symbol required">*</span></label>
                        <select name="slider" id="slider" class="form-control">
                            <option value="1" <?php
                            if (isset($row->slider) && '1' == $row->slider) {
                                echo 'selected';
                            }
                            ?>>Upper</option>
                            <option value="2" <?php
                            if (isset($row->slider) && '2' == $row->slider) {
                                echo 'selected';
                            }
                            ?>>Lower</option>
                        </select>
                        <!-- <label for="" class="control-label">External Link<span class="symbol required">*</span></label>
                        <input type="text" name="external_link" value="<?= $row->external_link ?>" class="form-control" required> -->
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr class="hr-short">
                <div class="form-group text-right">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
</div>
<?php else: ?>
<?= showMsg(); ?>
<?= getBredcrum(ADMIN, array('#' => 'Manage Visa Sponsor Logo')); ?>
<div class="row margin-bottom-10">
    <div class="col-md-6">
        <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>Visa Sponsor Logo</strong></h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="<?= site_url(ADMIN . '/visasponsors/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
    </div>
</div>
<table class="table table-bordered datatable" id="table-1">
    <thead>
        <tr>
            <th width="5%" class="text-center">Sr#</th>
            <th>Image</th>
            <th>Slider Option</th>
            <th>Status</th>
            <th width="12%" class="text-center">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($rows) > 0): $count = 0; ?>
            <?php foreach ($rows as $row): 
                // pr($row);
                ?>
                <tr class="odd gradeX">
                    <td class="text-center"><?= ++$count; ?></td>
                    <td><img src="<?=  getImageSrc(UPLOAD_PATH . "/visasponsors/thumb_", $row->image) ?>" height="50" alt="--"></td>
                    <!-- <td><?=  $row->external_link ?></td> -->
                    <td class="text-center"><?= getStatus($row->status); ?></td>
                    <td class="text-center"><?= $row->slider == 1 ? 'Upper' : 'Lower'; ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-primary" role="menu">
                                <li><a href="<?= site_url(ADMIN); ?>/visasponsors/manage/<?= $row->id; ?>">Edit</a></li>
                                <li><a href="<?= site_url(ADMIN); ?>/visasponsors/delete/<?= $row->id; ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?php endif; ?>