<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?php echo showMsg(); ?>
    <?php echo getBredcrum(ADMIN, array('#' => 'Add/Update Job Profile')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>Job Profile</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?php echo base_url(ADMIN . '/job_profile'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <form action="" name="frmNewsletter" role="form" class="form-horizontal blog-form" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="">
                                <div class="panel-heading col-md-12">
                                    <div class="panel-title"><h3>Job Basic Information</h3></div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading col-md-12" style="padding: 5.5px 10px"><i class="fa fa-picture-o"></i> Thumbnail </div>
                                            <div class="panel-body thumbnail_blog" style="padding: 10px" id="imgDiv">
                                                <img src="<?= !empty($row->image) ? get_site_image_src("job_profile", $row->image, 'thumb_') : 'http://placehold.it/3000x1000' ?>" style="width: 100px; cursor: pointer;" id="newImg">
                                                <input type="file" name="image" accept="image/*" id="imgInput">
                                            </div>
                                        </div>
                                    </div>                                 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">Title</label>
                                                <input type="text" name="title" value="<?=$row->title?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">Designation</label>
                                                <input type="text" name="designation" value="<?=$row->designation?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>                                  
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">Short Description</label>
                                                <textarea  rows="8" class="form-control" name="short_description" required><?=$row->short_desc?></textarea>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="clearfix"></div>
                                </div>
                            </div>  
                            
                            <div class="clearfix"></div>

                            <div class="panel-heading col-md-12">
                                <div class="panel-title"><h3>Salary Range (A Year)</h3></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">Minimum Salary</label>
                                            <input type="text" name="avg_salary_min" value="<?=$row->avg_salary_min?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">Max Salary</label>
                                            <input type="text" name="avg_salary_max" value="<?=$row->avg_salary_max?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>                                   
                                <div class="clearfix"></div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="panel-heading col-md-12">
                                <div class="panel-title"><h3>Degree Requirements</h3></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">Degree Requirements</label>
                                            <input type="text" name="degree_requirements" value="<?=$row->degree_requirements?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>                                   
                                <div class="clearfix"></div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="panel-heading col-md-12">
                                <div class="panel-title"><h3>Working Hours (A Week)</h3></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">Minimum Hours</label>
                                            <input type="text" name="working_hour_min" value="<?=$row->working_hour_min?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">Max Hours</label>
                                            <input type="text" name="working_hour_max" value="<?=$row->working_hour_max?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>                                   
                                <div class="clearfix"></div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="panel-heading col-md-12">
                                <div class="panel-title"><h3>Location</h3></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">Location</label>
                                            <input type="text" name="location" value="<?=$row->location?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>                                   
                                <div class="clearfix"></div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="panel-heading col-md-12">
                                <div class="panel-title"><h3>Detail</h3></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="control-label">Bold Heading</label>
                                            <textarea  rows="3" class="form-control" name="bold_heading" required><?=$row->bold_heading?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="control-label">Job Profile Detail</label>
                                            <textarea  rows="8" class="form-control ckeditor" name="long_description" required><?=$row->long_description?></textarea>
                                        </div>
                                    </div>
                                </div>                                   
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <!-- <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading col-md-12" style="padding: 5.5px 10px"><i class="fa fa-picture-o"></i> Thumbnail </div>
                                <div class="panel-body thumbnail_blog" style="padding: 10px" id="imgDiv">
                                    <img src="<?= !empty($row->image) ? get_site_image_src("blogs/", $row->image, '500p_') : 'http://placehold.it/3000x1000' ?>" style="width: 100%; cursor: pointer;" id="newImg">
                                    <input type="file" name="image" accept="image/*" id="imgInput">
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading col-md-12" style="padding: 5.5px 10px"><i class="fa fa-eye" aria-hidden="true"></i> Display Options</div>
                                <div class="panel-body" style="padding: 15.5px 0px">                    

                                    <div class="col-md-7">
                                        <h5>Active</h5>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="btn-group" id="status" data-toggle="buttons">
                                            <label class="btn btn-default btn-on btn-sm <?php if($row->status == 1){echo 'active';}?>">
                                            <input type="radio" value="1" name="status"<?php if($row->status == 1){echo 'checked';}?>><i class="fa fa-check" aria-hidden="true"></i></label>
                                          
                                            <label class="btn btn-default btn-off btn-sm <?php if($row->status == 0){echo 'active';}?>">
                                            <input type="radio" value="0" name="status" <?php if($row->status == 0){echo 'checked';}?>><i class="fa fa-times" aria-hidden="true"></i></label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label">Sort Order</label>
                                        <input type="text" name="sort_order" value="<?=$row->sort_order?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>  
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
    <?php echo showMsg(); ?>
    <?php echo getBredcrum(ADMIN, array('#' => 'Manage Job Profile')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>Job Profile</strong></h2>
        </div>
         <div class="col-md-6 text-right">
            <a href="<?= base_url(ADMIN . '/job_profile/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="13%">Image</th>
                <th width="13%">Title</th>
                <th width="20%">Short Description</th>
                <th>Status</th>
                <th>Order</th>
                <th width="15%">Created date</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($blogs) > 0): $count = 0; ?>
                <?php foreach ($blogs as $blog):  ?>                    
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td class="text-center">
                            <img src = "<?= get_site_image_src("job_profile", $blog->image, 'thumb_'); ?>" height = "60">
                        </td>
                        <td><b><?= $blog->title ?></b></td>
                        <td><b><?= $blog->short_desc ?></b></td>
                        <td><b><?=get_active_status($blog->status)?></b></td>
                        <td><b><?=$blog->sort_order?></b></td>
                       <td><b><?= format_date($blog->created_date,'M d Y h:i:s A'); ?></b></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= base_url(ADMIN); ?>/job_profile/manage/<?= $blog->id; ?>">Edit</a></li>
                                    <?php if(access(10)):?>
                                        <li><a href="<?= base_url(ADMIN); ?>/job_profile/delete/<?= $blog->id; ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                                    <?php endif?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>
<script src="<?= base_url('adminassets/js/jquery-3.4.1.js'); ?>"></script>
<script type="text/javascript">
    $(document).on('click', '.add_recipe', function(e) {
        e.preventDefault();
          $ad = $(".recipe_clone:first").clone();
          $ad.find("input").val("");
          $ad.find("textarea").html("");
          var i=0;      
          $('.recipe_container').append($ad);
          $(".remove_recipe").each(function(){
            console.log($(this));
                $(this).click(function(e){
                    e.preventDefault(); 
                    $(this).parent().remove();
                });
          });
     });
    $('.add_new_cat').click(function(e){
        $(".category_new").toggle();
    });
    jQuery(document).on('change', '#imgInput', function () {

                var preview = jQuery(this).closest("#imgDiv").find("#newImg");
                console.log(preview);
                var oFReader = new FileReader();
                oFReader.readAsDataURL(jQuery(this)[0].files[0]);
                oFReader.addEventListener("load", function () {
                    preview.attr('src',oFReader.result);
                }, false);
    });
    $(document).on('click', '#add_category', function (event) {
            event.preventDefault();
            var cat_name=$("#cat_name").val();
            console.log("<?php echo base_url('admin/job_profile/add_category'); ?>");
            $.ajax({
                    url: "<?php echo base_url('admin/job_profile/add_category'); ?>",
                    data: {cat_name:cat_name },
                    type: "post",
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        console.log(response);
                        if(response.status==true){
                            $(".site_categories").append('<li><input type="radio" name="categories" value="'+response.cat_id+'" checked="checked"> <span>'+cat_name+'</span></li>');
                            $('.category_new').hide();
                            $('#cat_name').val("");
                        }
                        
                      },
                      error: function(response)
                   {
                    console.log(response);
                   }
          });
        });
</script>