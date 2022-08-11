<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

# ADMIN
$route['admin/login']                   = 'admin/index/login';
$route['admin/logout']                  = 'admin/index/logout';
$route['admin/meta-info']               = 'admin/Meta_info/index';
$route['admin/meta-info/manage']        = 'admin/Meta_info/manage';
$route['admin/meta-info/manage/(:any)'] = 'admin/Meta_info/manage/$1';
$route['admin/meta-info/delete/(:any)'] = 'admin/Meta_info/delete/$1';

# API ROUTES
$route['api/home']                      = 'api/pages/home';
$route['api/site-settings']             = 'api/pages/site_settings';
$route['api/signin']                    = 'api/pages/signin';
$route['api/forgot-password-content']   = 'api/pages/forgot_password_content';
$route['api/reset-password-content']   = 'api/pages/reset_password_content';
$route['api/signup']                    = 'api/pages/signup';
$route['api/about-us']                  = 'api/pages/about_us';
$route['api/uk-corporate']              = 'api/pages/uk_corporate';
$route['api/testimonials']              = 'api/pages/testimonials';
$route['api/recruitment-process']       = 'api/pages/recruitment_process';
$route['api/cv-cover-letter']           = 'api/pages/cv_cover_letter';
$route['api/cv-guidance']               = 'api/pages/cv_guidance';
$route['api/cover-letter-guidance']     = 'api/pages/cover_letter_guidance';
$route['api/cv-builder']                = 'api/pages/cv_builder';
$route['api/cv-builder-page']           = 'api/pages/cv_builder_page';
$route['api/cover-builder-page']        = 'api/pages/cover_builder_page';
$route['api/cover-letter-builder']      = 'api/pages/cover_letter_builder';
$route['api/assessment-center']         = 'api/pages/assessment_center';
$route['api/interview']                 = 'api/pages/interview';
$route['api/online-test']               = 'api/pages/online_test';
$route['api/online-test-categories']    = 'api/pages/online_test_categories';
$route['api/test-category-detail']      = 'api/pages/test_category_detail';
$route['api/terms-and-conditions']      = 'api/pages/terms_and_conditions';
$route['api/privacy-policy']            = 'api/pages/privacy_policy';
$route['api/disclaimer']                = 'api/pages/disclaimer';
$route['api/faq']                       = 'api/pages/faq';
$route['api/blogs']                     = 'api/pages/blogs';
$route['api/fetch-blogs-data']          = 'api/pages/fetch_blogs_data';
$route['api/fetch-events-data']         = 'api/pages/fetch_events_data';
$route['api/blog-detail']               = 'api/pages/blog_detail';
$route['api/work-with-us']              = 'api/pages/work_with_us';
$route['api/partner-with-us']           = 'api/pages/partner_with_us';
$route['api/careers']                   = 'api/pages/careers';
$route['api/job-profile']               = 'api/pages/job_profile';
$route['api/job-profile-detail']        = 'api/pages/job_profile_detail';
$route['api/jobs']                      = 'api/pages/jobs';
$route['api/fetch-jobs-data']           = 'api/pages/fetch_jobs_data';
$route['api/events']                    = 'api/pages/events';
$route['api/event-detail']              = 'api/pages/event_detail';
// $route['api/fetch-events-data']         = 'api/pages/fetch_events_data';
$route['api/save-contact-message']      = 'api/pages/save_contact_message';
$route['api/save-interview-video']      = 'api/pages/save_interview_video';
$route['api/save-interview']            = 'api/pages/save_interview';
$route['api/save-job']                  = 'api/pages/save_job';
$route['api/career-options']            = 'api/pages/career_options';
$route['api/uni-vs-emp']                = 'api/pages/uni_vs_emp';
$route['api/video-interview-content']   = 'api/pages/video_interview_content';
$route['api/interview-category']        = 'api/pages/interview_category';
$route['api/interview-category-question']= 'api/pages/interview_category_question';

//AUTH ROUTES
$route['api/auth/create-account']       = 'api/auth/sign_up';
$route['api/auth/signin']               = 'api/auth/sign_in';
$route['api/auth/forgot-password']      = 'api/auth/forgot_password';
$route['api/auth/reset-password']       = 'api/auth/reset_password';

//DASHBOARD
$route['api/user/dashboard']            = 'api/user/dashboard';
$route['api/user/save-job-stat']        = 'api/user/save_job_stat';
$route['api/user/profile-settings']     = 'api/user/profile_settings';
$route['api/user/save-profile-settings']= 'api/user/save_profile_settings';
$route['api/user/change-password']      = 'api/user/change_password';
// $route['api/user/change-password']      = 'api/user/change_password';