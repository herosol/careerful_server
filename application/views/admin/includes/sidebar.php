<div class="sidebar-menu fixed">
    <div class="sidebar-menu-inner ps-container ps-active-y">
        <header class="logo-env">
            <div class="logo">
                <a href="<?=site_url(ADMIN.'/dashboard')?>">
                    <img src="<?= base_url().SITE_IMAGES.'images/'.$adminsite_setting->site_logo ?>" width="120" alt="">
                </a>
            </div>
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon">
                    <i class="entypo-menu"></i>
                </a>
            </div>
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation">
                    <i class="entypo-menu"></i>
                </a>
            </div>
        </header>
        <ul id="main-menu" class="main-menu">
            <li class="opened <?= ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/dashboard') ?>">
                    <i class="entypo-gauge"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class=" <?= ($this->uri->segment(2) == 'sitecontent' || $this->uri->segment(2) == 'partner_companies' || $this->uri->segment(2) == 'job_profile' || $this->uri->segment(2) == 'preferences') ? ' opened  active' : '' ?>">
                <a href="javascript:void(0)">
                    <i class="entypo-doc-text"></i>
                    <span class="title">Manage Pages</span>
                </a>
                <ul>
                    <li class=" <?= ($this->uri->segment(3) == 'home') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/home') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'signin') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/signin') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Sign In</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'signup') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/signup') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Sign Up</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'forgot_password') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/forgot_password') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Forgot Password</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'reset_password') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/reset_password') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Reset Password</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'about_us') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/about_us') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">About Us</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'video_interview_main') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/video_interview_main') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Video Interview Main Page</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'careers') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/careers') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Careers</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'recruitement_process') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/recruitement_process') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Recruitement Process</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'online_test') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/online_test') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Online Test</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'assessment_center') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/assessment_center') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Assessment Centre</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'interview') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/interview') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Interview</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'cv_and_cover_letter') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/cv_and_cover_letter') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">CV & Cover Letter</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'cv_guidence') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/cv_guidence') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">CV Guidence</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'cv_page') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/cv_page') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">CV Page</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'cover_letter_guidence') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/cover_letter_guidence') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Cover Letter Guidance</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'cover_letter_page') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/cover_letter_page') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Cover Letter Page</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'uk_corporate_culture') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/uk_corporate_culture') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Uk Corporate Culture</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'uni_vs_emp') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/uni_vs_emp') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">University Vs Employer</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'work_with_us' || $this->uri->segment(2) == 'partner_companies') ? ' opened  active' : '' ?>">
                        <a href="javascript:void(0)">
                            <i class="entypo-doc-text"></i>
                            <span class="title">For Universities</span>
                        </a>
                        <ul>
                            <li class=" <?= ($this->uri->segment(3) == 'work_with_us') ? ' active' : '' ?>">
                                <a href="<?= site_url(ADMIN.'/sitecontent/work_with_us') ?>">
                                    <i class="entypo-doc-text  "></i>
                                    <span class="title">Page Content</span>
                                </a>
                            </li>
                            <li class=" <?= ($this->uri->segment(2) == 'partner_companies') ? ' active' : '' ?>">
                                <a href="<?= site_url(ADMIN.'/partner_companies') ?>">
                                    <i class="entypo-doc-text  "></i>
                                    <span class="title">Partner Companies</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'partner_with_us' || $this->uri->segment(2) == 'partner_companies') ? ' opened  active' : '' ?>">
                        <a href="javascript:void(0)">
                            <i class="entypo-doc-text"></i>
                            <span class="title">For Employers</span>
                        </a>
                        <ul>
                            <li class=" <?= ($this->uri->segment(3) == 'partner_with_us') ? ' active' : '' ?>">
                                <a href="<?= site_url(ADMIN.'/sitecontent/partner_with_us') ?>">
                                    <i class="entypo-doc-text  "></i>
                                    <span class="title">Page Content</span>
                                </a>
                            </li>
                            <li class=" <?= ($this->uri->segment(2) == 'partner_companies') ? ' active' : '' ?>">
                                <a href="<?= site_url(ADMIN.'/partner_companies') ?>">
                                    <i class="entypo-doc-text  "></i>
                                    <span class="title">Partner Companies</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'job_profile' || $this->uri->segment(2) == 'job_profile') ? ' opened  active' : '' ?>">
                        <a href="javascript:void(0)">
                            <i class="entypo-doc-text"></i>
                            <span class="title">Job Profile</span>
                        </a>
                        <ul>
                            <li class=" <?= ($this->uri->segment(3) == 'job_profile') ? ' active' : '' ?>">
                                <a href="<?= site_url(ADMIN.'/sitecontent/job_profile') ?>">
                                    <i class="entypo-doc-text  "></i>
                                    <span class="title">Page Content</span>
                                </a>
                            </li>
                            <li class=" <?= ($this->uri->segment(3) == 'jobs') ? ' active' : '' ?>">
                                <a href="<?= site_url(ADMIN.'/job_profile') ?>">
                                    <i class="entypo-doc-text  "></i>
                                    <span class="title">Job Profile Posts</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'faq') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/faq') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">FAQs</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'career_options' || $this->uri->segment(2) == 'career_options') ? ' opened  active' : '' ?>">
                        <a href="javascript:void(0)">
                            <i class="entypo-doc-text"></i>
                            <span class="title">Career Options</span>
                        </a>
                        <ul>
                            <li class=" <?= ($this->uri->segment(3) == 'career_options') ? ' active' : '' ?>">
                                <a href="<?= site_url(ADMIN.'/sitecontent/career_options') ?>">
                                    <i class="entypo-doc-text  "></i>
                                    <span class="title">Page Content</span>
                                </a>
                            </li>
                            <li class=" <?= ($this->uri->segment(2) == 'career_options') ? ' active' : '' ?>">
                                <a href="<?= site_url(ADMIN.'/career_options') ?>">
                                    <i class="entypo-doc-text  "></i>
                                    <span class="title">Page Accordians</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'testimonials') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/testimonials') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Testimonials</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'blogs') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/blogs') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Blogs</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'terms_and_conditions') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/terms_and_conditions') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Terms And Conditions</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'privacy_policy') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/privacy_policy') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Privacy Policy</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'disclaimer') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/sitecontent/disclaimer') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Disclaimer</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" <?= ($this->uri->segment(2) == 'jobs' || $this->uri->segment(2) == 'job_categories') ? ' opened  active' : '' ?>">
                <a href="javascript:void(0)">
                    <i class="entypo-doc-text"></i>
                    <span class="title">Manage Jobs</span>
                </a>
                <ul>
                    <li class=" <?= ($this->uri->segment(3) == 'job_companies') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/job_companies') ?>">
                            <i class="entypo-doc-text"></i>
                            <span class="title">Job Companies</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'job_categories') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/job_categories') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Job Industries</span>
                        </a>
                    </li>
                    <!-- <li class=" <?= ($this->uri->segment(3) == 'job_levels') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/job_levels') ?>">
                            <i class="entypo-doc-text"></i>
                            <span class="title">Job Levels</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'job_cats') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/job_cats') ?>">
                            <i class="entypo-doc-text"></i>
                            <span class="title">Job Categories</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'degree_requirements') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/degree_requirements') ?>">
                            <i class="entypo-doc-text"></i>
                            <span class="title">Degree Requirements</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'jobs_locations') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/jobs_locations') ?>">
                            <i class="entypo-doc-text"></i>
                            <span class="title">Job Locations</span>
                        </a>
                    </li> -->
                    <li class=" <?= ($this->uri->segment(3) == 'jobs') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/jobs') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Jobs</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" <?= ($this->uri->segment(2) == 'onlinetest_categories' || $this->uri->segment(2) == 'onlinetest_subcategories') ? ' opened  active' : '' ?>">
                <a href="javascript:void(0)">
                    <i class="entypo-doc-text"></i>
                    <span class="title">Manage Online Test</span>
                </a>
                <ul>
                    <li class=" <?= ($this->uri->segment(3) == 'onlinetest_categories') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/onlinetest_categories') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Test Categories</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'onlinetest_subcategories') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/onlinetest_subcategories') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Test Subcategories</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" <?= ($this->uri->segment(2) == 'video_interview_categories' || $this->uri->segment(2) == 'video_interview_questions') ? ' opened  active' : '' ?>">
                <a href="javascript:void(0)">
                    <i class="entypo-doc-text"></i>
                    <span class="title">Manage Video Interview</span>
                </a>
                <ul>
                    <li class=" <?= ($this->uri->segment(3) == 'video_interview_categories') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/video_interview_categories') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Interview Categories</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'video_interview_questions') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/video_interview_questions') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Interview Questions</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" <?= ($this->uri->segment(2) == 'blog_categories' || $this->uri->segment(2) == 'blogs') ? ' opened  active' : '' ?>">
                <a href="javascript:void(0)">
                    <i class="entypo-doc-text"></i>
                    <span class="title">Manage Blogs</span>
                </a>
                <ul>
                    <li class=" <?= ($this->uri->segment(2) == 'blog_categories') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/blog_categories') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Blog Categories</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(2) == 'blogs') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/blogs') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Blogs</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="opened<?= $this->uri->segment('2') == 'members' ? ' active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/members') ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">Manage Members</span>
                </a>
            </li>
            <li class="opened<?= $this->uri->segment('2') == 'universities' ? ' active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/universities') ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">Manage Universities</span>
                </a>
            </li>
            <li class="opened<?= $this->uri->segment('2') == 'video_interviews' ? ' active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/video_interviews') ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">Manage Video Interviews</span>
                </a>
            </li>
            <li class="opened<?= $this->uri->segment('2') == 'member_cv' ? ' active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/member_cv') ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">Manage Mmeber CV</span>
                </a>
            </li>
            <li class="opened<?= $this->uri->segment('2') == 'member_cover' ? ' active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/member_cover') ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">Manage Mmeber Cover</span>
                </a>
            </li>
            <li class="opened<?= $this->uri->segment('2') == 'testimonials' ? ' active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/testimonials') ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">Manage Testimonials</span>
                </a>
            </li>
            <li class="opened<?= $this->uri->segment('2') == 'it_skills' ? ' active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/it_skills') ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">Manage IT Skills</span>
                </a>
            </li>
            <li class=" <?= ($this->uri->segment(2) == 'events' || $this->uri->segment(2) == 'event_categories') ? ' opened  active' : '' ?>">
                <a href="javascript:void(0)">
                    <i class="entypo-doc-text"></i>
                    <span class="title">Manage Events</span>
                </a>
                <ul>
                    <li class=" <?= ($this->uri->segment(3) == 'event_categories') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/event_categories') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Event Categories</span>
                        </a>
                    </li>
                    <li class=" <?= ($this->uri->segment(3) == 'events') ? ' active' : '' ?>">
                        <a href="<?= site_url(ADMIN.'/events') ?>">
                            <i class="entypo-doc-text  "></i>
                            <span class="title">Events</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="opened<?= $this->uri->segment('2') == 'partners' ? ' active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/partners') ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">Manage Partners</span>
                </a>
            </li>
            <li class="opened<?= $this->uri->segment('2') == 'visasponsors' ? ' active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/visasponsors') ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">Manage Visa Sponsors</span>
                </a>
            </li>

            <li class="opened <?= ($this->uri->segment(2) == 'contact') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/contact') ?>">
                    <i class="fa fa-usd"></i>
                    <span class="title">Manage Contact Messages</span><span class="badge badge-danger"><?=new_messages()?></span>
                </a>
            </li>
            <li class="opened<?= $this->uri->segment('2') == 'newsletter' ? ' active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/newsletter') ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">Manage Newsletter Subscriptions</span>
                </a>
            </li>
            <li class="opened <?= ($this->uri->segment('2') == 'meta-info') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/meta-info') ?>">
                    <i class="fa fa-tag" aria-hidden="true"></i>
                    <span class="title">Site Meta</span>
                </a>
            </li>
            <li class="opened <?= ($this->uri->segment(2) == 'settings' && $this->uri->segment(3) == '') ? 'active' : '' ?>">
                <a href="<?= site_url(ADMIN.'/settings') ?>">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Site Settings</span>
                </a>
            </li>
            <li class="opened">
                <a href="<?= site_url(ADMIN.'/settings/change') ?>">
                    <i class="fa fa-lock"></i>
                    <span class="title">Change Password</span>
                </a>
            </li>
        </ul>
    </div>
</div>
