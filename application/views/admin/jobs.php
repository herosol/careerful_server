<?php if ($this->uri->segment(3) == 'manage'): ?>
    <?php echo showMsg(); ?>
    <?php echo getBredcrum(ADMIN, array('#' => 'Add/Update Jobs')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Add/Update <strong>Jobs</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?php echo base_url(ADMIN . '/jobs'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
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
                                        <label for="job_category" class="control-label">Job Industry<span class="symbol required">*</span></label>
                                        <select name="job_category" id="job_category" class="form-control" required>
                                            <option value=''>-- Select --</option>
                                            <?php foreach ($cats as $index => $c) { ?>
                                                <option value="<?= $c->id ?>" <?= ($row->job_cat == $c->id) ? 'selected' : '' ?>> <?= $c->title ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="degree_requirement" class="control-label">Degree Requirements<span class="symbol required">*</span></label>
                                                <select name="degree_requirement" id="degree_requirement" class="form-control" required>
                                                    <option value=''>-- Select --</option>
                                                    <?php foreach (['Collage Degree', 'University Degree', 'Graduate Diploma', 'Not Specified', 'No Minimum Requirement'] as $dr) : ?>
                                                        <option value="<?= $dr ?>" <?= $row->degree_requirement == $dr ? 'selected' : '' ?>><?= $dr ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">Degree In</label>
                                                <input type="text" name="degree_in" value="<?=$row->degree_in?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>                                  
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">Job Title</label>
                                                <input type="text" name="title" value="<?=$row->title?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>                                  
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-heading col-md-12">
                                    <div class="panel-title"><h3>Company Info</h3></div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading col-md-12" style="padding: 5.5px 10px"><i class="fa fa-picture-o"></i> Thumbnail </div>
                                            <div class="panel-body thumbnail_blog" style="padding: 10px" id="imgDiv">
                                                <img src="<?= !empty($row->image) ? get_site_image_src("jobs", $row->image, 'thumb_') : 'http://placehold.it/3000x1000' ?>" style="width: 100px; cursor: pointer;" id="newImg">
                                                <input type="file" name="image" accept="image/*" id="imgInput">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">Company Name</label>
                                                <input type="text" name="company_name" value="<?=$row->company_name?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>                                  
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">Company Link</label>
                                                <input type="text" name="company_link" value="<?=$row->company_link?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>                                  
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">Company's Job Link</label>
                                                <input type="text" name="job_link" value="<?=$row->job_link?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>                                  
                                    <div class="clearfix"></div>
                                </div>

                                <div class="panel-heading col-md-12">
                                    <div class="panel-title"><h3>Experience</h3></div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <label for="years_of_experience" class="control-label">Years Of Experience<span class="symbol required">*</span></label>
                                        <select name="years_of_experience" id="years_of_experience" class="form-control" required>
                                            <option value=''>-- Select --</option>
                                            <?php foreach ([1,2,3,4,5,6,7,8,9,10] as $y) : ?>
                                                <option value="<?= $y ?>" <?= $row->years_of_experience == $y ? 'selected' : '' ?>><?= $y==10?'10+':$y ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="panel-heading col-md-12">
                                    <div class="panel-title"><h3>Salary Range</h3></div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">Minimum Salary</label>
                                                <input type="text" name="min_salary" value="<?=$row->min_salary?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">Max Salary</label>
                                                <input type="text" name="max_salary" value="<?=$row->max_salary?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>                                   
                                    <div class="clearfix"></div>
                                </div>


                                <div class="panel-heading col-md-12">
                                    <div class="panel-title"><h3>Job Type</h3></div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <label for="job_type" class="control-label">Job Type<span class="symbol required">*</span></label>
                                        <select name="job_type" id="job_type" class="form-control" required>
                                            <option value=''>-- Select --</option>
                                            <?php foreach (['Graduate Jobs', 'Interships', 'Placements', 'Insight Programmes'] as $jt) : ?>
                                                <option value="<?= $jt ?>" <?= $row->job_type == $jt ? 'selected' : '' ?>><?= $jt ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="panel-heading col-md-12">
                                    <div class="panel-title"><h3>VISA ACCEPTANCE</h3></div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <label for="visa_acceptance" class="control-label">Accept Graduate Visa Holders<span class="symbol required">*</span></label>
                                        <select name="visa_acceptance" id="visa_acceptance" class="form-control" required>
                                            <option value=''>-- Select --</option>
                                            <?php foreach (['Yes', 'No'] as $jt) : ?>
                                                <option value="<?= $jt ?>" <?= $row->visa_acceptance == $jt ? 'selected' : '' ?>><?= $jt ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="panel-heading col-md-12">
                                    <div class="panel-title"><h3>Location</h3></div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label class="control-label">City</label>
                                                <input type="text" name="city" value="<?=$row->city?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>                                 
                                    <div class="clearfix"></div>
                                </div>
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
    <?php echo getBredcrum(ADMIN, array('#' => 'Manage Jobs')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage <strong>Jobs</strong></h2>
        </div>
         <div class="col-md-6 text-right">
            <a href="<?= base_url(ADMIN . '/jobs/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="13%">Company Name</th>
                <th width="13%">Job Type</th>
                <th width="20%">Title</th>
                <th width="30%">Job Link</th>
                <th width="5%">Years Of Experiece</th>
                <th width="10%">Salary Range</th>
                <th width="10%">Location</th>
                <th>Status</th>
                <th width="15%">Created date</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($blogs) > 0): $count = 0; ?>
                <?php foreach ($blogs as $blog):  ?>                    
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td><b><?= $blog->company_name ?></b></td>
                        <td><?= $blog->job_type ?><br/><b><?= get_job_cat($blog->job_cat) ?></b></td>
                        <td><b><?= $blog->title ?></b></td>
                        <td><b><?= $blog->job_link ?></b></td>
                        <td><b><?= $blog->years_of_experience==10?'10+':$blog->years_of_experience ?></b></td>
                        <td><b><?= $blog->min_salary.' - '.$blog->max_salary.'/yearly' ?></b></td>
                        <td><b><?= $blog->city ?></b></td>
                        <td><b><?=get_active_status($blog->status)?></b></td>
                       <td><b><?= format_date($blog->created_date,'M d Y h:i:s A'); ?></b></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-primary" role="menu">
                                    <li><a href="<?= base_url(ADMIN); ?>/jobs/manage/<?= $blog->id; ?>">Edit</a></li>
                                    <?php if(access(10)):?>
                                        <li><a href="<?= base_url(ADMIN); ?>/jobs/delete/<?= $blog->id; ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
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
            console.log("<?php echo base_url('admin/jobs/add_category'); ?>");
            $.ajax({
                    url: "<?php echo base_url('admin/jobs/add_category'); ?>",
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