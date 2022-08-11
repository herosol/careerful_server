<?php if ($this->uri->segment(3) == 'detail'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Member CV Detail')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="fa fa-bars"></i> Member CV <strong>Detail</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/member_cv'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div>
	<hr>
        <div class="row col-md-12">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Member Name</th>
                        <td><b><?= get_mem_name($cv->mem_id) ?></b></td>
                        <th>Member Phone</th>
                        <td><?= fet_mem_email($cv->mem_id); ?></td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <h3><i class="fa fa-bars"></i> Educational</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>University Name</th>
                        <th>Course Name</th>
                        <th>Detail</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($educational as $key => $pro): ?>
                        <tr>
                            <td><?= $key+1?></td>
                            <td><?= $pro->university_name?></td>
                            <td><?= $pro->course_name?></td>
							<td><?= $pro->detail?></td>
							<td><?= $pro->year_start?> - <?= $pro->year_end?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <hr>
            <h3><i class="fa fa-bars"></i> ProfessionaL Experience</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Job TItle</th>
                        <th>Detail</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($professional as $key => $pro): ?>
                        <tr>
                            <td><?= $key+1?></td>
                            <td><?= $pro->company_name?></td>
                            <td><?= $pro->job_title?></td>
							<td><?= $pro->detail?></td>
							<td><?= $pro->year_start?> - <?= $pro->year_end?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <hr>
            <h3><i class="fa fa-bars"></i> Languages</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Language</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$count = 0;
					foreach ($others as $key => $pro):
						if($pro->type == 'language'):	
					?>
                        <tr>
                            <td><?= ++$count; ?></td>
                            <td><?= get_language_name($pro->language_id)?></td>
                        </tr>
                    <?php
					endif; 
					endforeach ?>
                </tbody>
            </table>

            <hr>
            <h3><i class="fa fa-bars"></i> IT Skills</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>IT Skill</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
					$count = 0;
					foreach ($others as $key => $pro):
						if($pro->type == 'it_skill'):	
					?>
                        <tr>
                            <td><?= ++$count;?></td>
                            <td><?= get_skill_name($pro->it_skill_id)?></td>
                        </tr>
                    <?php
					endif; 
					endforeach ?>
                </tbody>
            </table>
          
            <hr>
            <h3><i class="fa fa-bars"></i> Volunteers</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Volunteer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$count = 0;
					 foreach ($others as $key => $pro):
						if($pro->type == 'volunteer'):	
					?>
                        <tr>
                            <td><?= ++$count; ?></td>
                            <td><?= $pro->volunteer ?></td>
                        </tr>
                    <?php
					endif; 
					endforeach ?>
                </tbody>
            </table>

            <hr>
            <h3><i class="fa fa-bars"></i> Interests</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Interests</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$count = 0; 
					foreach ($others as $key => $pro):
						if($pro->type == 'interest'):	
					?>
                        <tr>
                            <td><?= ++$count;?></td>
                            <td><?= $pro->interest ?></td>
                        </tr>
                    <?php
					endif; 
					endforeach ?>
                </tbody>
            </table>


            <hr>
            <h3><i class="fa fa-bars"></i> References </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Person Name</th>
                        <th>Job Title And Company</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($references as $key => $pro): ?>
                        <tr>
                            <td><?= $key+1?></td>
                            <td><?= $pro->person_name?></td>
                            <td><?= $pro->job_title_and_company?></td>
							<td><?= $pro->year_start?> - <?= $pro->year_end?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

                <div class="clearfix"></div>
                <div class="col-md-12 hidden">     
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Save Status</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Manage Members CV')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="entypo-users"></i> Manage <strong>Members CV</strong></h2>
        </div>
        <!-- <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/member_cv/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
        </div> -->
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="10%">User Name</th>
                <th width="20%">User Email</th>
                <th>Submit For Review</th>
                <th width="8%" class="text-center">Status</th>
                <th width="12%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
            <?php foreach ($rows as $row): ?>
            <tr class="odd gradeX">
                <td class="text-center"><?= ++$count; ?></td>
                <td><b><?= get_mem_name($row->mem_id) ?></b></td>
                <td><?= fet_mem_email($row->mem_id); ?></td>
                <td><?= $row->submit_for_review == 1 ? 'Yes' : 'No'; ?></td>
                <td class="text-center"><?= get_member_active_status($row->status); ?></td>
                <td class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-primary" role="menu">
                            <li><a href="<?= site_url(ADMIN); ?>/member_cv/detail/<?= $row->cv_id; ?>">Detail</a></li>
                            <li><a href="<?= site_url(ADMIN); ?>/member_cv/delete/<?= $row->cv_id; ?>" onclick="return confirm('Are you sure?');">Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php endif; ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
// Prepare the preview for profile picture
    jQuery("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            jQuery('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }}
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmqmsf3pVEVUoGAmwerePWzjUClvYUtwM&libraries=geometry,places&ext=.js"></script>
    <script>
        
        var map, startLat = "", startLng = "";

        const getLocationAndInitMap = myThis => 
        {
            console.log('run');
            var value= myThis.value;
            value = value.trim();
            var myType = myThis.getAttribute('data-type');
            if(value.length == 0){
                if( myType == 'hotel'){
                    document.getElementById('mem_hotel_map_lat').value = '';
                    document.getElementById('mem_hotel_map_lng').value = '';
                }else if( myType == 'office'){
                    document.getElementById('mem_business_map_lat').value = '';
                    document.getElementById('mem_business_map_lng').value = '';
                }else if( myType == 'home'){
                    document.getElementById('mem_map_lat').value = '';
                    document.getElementById('mem_map_lng').value = '';
                } 
                return false;
            }
            
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode(
            { 
            componentRestrictions: { 
                country: 'gb', 
                postalCode: value
            } 
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    latitude = results[0].geometry.location.lat();
                    longitude = results[0].geometry.location.lng();
                    if( myType == 'hotel'){
                        document.getElementById('mem_hotel_map_lat').value = latitude;
                        document.getElementById('mem_hotel_map_lng').value = longitude;
                    }else if( myType == 'office'){
                        document.getElementById('mem_business_map_lat').value = latitude;
                        document.getElementById('mem_business_map_lng').value = longitude;
                    }else if( myType == 'home'){
                        document.getElementById('mem_map_lat').value = latitude;
                        document.getElementById('mem_map_lng').value = longitude;
                    }    
                    
                    
                } else {
                    if( myType == 'hotel'){
                        document.getElementById('mem_hotel_map_lat').value = '';
                        document.getElementById('mem_hotel_map_lng').value = '';
                    }else if( myType == 'office'){
                        document.getElementById('mem_business_map_lat').value = '';
                        document.getElementById('mem_business_map_lng').value = '';
                    }else if( myType == 'home'){
                        document.getElementById('mem_map_lat').value = '';
                        document.getElementById('mem_map_lng').value = '';
                    } 
                }
            });
        }
        </script>
