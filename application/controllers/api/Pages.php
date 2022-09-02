<?php
class Pages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->load->model('Pages_model', 'page');
        $this->load->model('Member_model', 'member');
    }

    function site_settings()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            if(empty($post['authToken']))
            {
                $memData = null;
            }
            else
            {
                $token = explode('_', doDecode($post['authToken']));
                $mem_id = $token[1];
                $memData = $this->member->getMemData($mem_id);
            }

            $this->data['memData'] = $memData;
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
    }

    function home()
    {
        $meta = $this->page->getMetaContent('home');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('home');
        if ($data) 
        {
            $this->data['content'] = $content = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['partners']  = $this->master->get_data_rows('partners', ['status'=> '1']); 
            $this->data['sponsors']  = $this->master->get_data_rows('visa_sponsors', ['status'=> '1', 'slider'=> 1]); 
            $this->data['sponsors2']  = $this->master->get_data_rows('visa_sponsors', ['status'=> '1', 'slider'=> 2]); 
            $this->data['testimonials']  = $this->master->get_data_rows('testimonials', ['status'=> '1']); 
            $this->data['sec6s'] = getMultiText('home-sec6');
            $this->data['sec7s'] = getMultiText('home-sec7');
            $this->data['sec8s'] = getMultiText('home-sec8');
            $this->data['candidates_images'] = [$content['image1'], $content['image2'], $content['image3'], $content['image4'], $content['image5']];
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function signin()
    {
        $meta = $this->page->getMetaContent('signin');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('signin');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function forgot_password_content()
    {
        $meta = $this->page->getMetaContent('forgot_password');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('forgot_password');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function reset_password_content()
    {
        $meta = $this->page->getMetaContent('reset_password');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('reset_password');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function signup()
    {
        $meta = $this->page->getMetaContent('signup');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('signup');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
   }

    function about_us()
    {
        $meta = $this->page->getMetaContent('about_us');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('about_us');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['faqs'] = getMultiText('about-us-faq');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }
    
    function uk_corporate()
    {
        $meta = $this->page->getMetaContent('uk_corporate_culture');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('uk_corporate_culture');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function testimonials()
    {
        $meta = $this->page->getMetaContent('testimonials');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('testimonials');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['testimonials'] = $this->master->getRows('testimonials', ['status'=> 1], '', '', 'desc', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cv_cover_letter()
    {
        $meta = $this->page->getMetaContent('cv_and_cover_letter');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('cv_and_cover_letter');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function uni_vs_emp()
    {
        $meta = $this->page->getMetaContent('uni_vs_emp');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('uni_vs_emp');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cv_guidance()
    {
        $meta = $this->page->getMetaContent('cv_guidence');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('cv_guidence');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cover_letter_guidance()
    {
        $meta = $this->page->getMetaContent('cover_letter_guidence');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('cover_letter_guidence');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cv_builder()
    {
        $meta = $this->page->getMetaContent('cv_page');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('cv_page');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['sec2sLeft'] = getMultiText('cv-page-left-instructions');
            $this->data['languages'] = $this->master->getRows('languages', ['status'=> 1]);
            $this->data['it_skills'] = $this->master->getRows('it_skills', ['status'=> 1]);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cover_letter_builder()
    {
        $meta = $this->page->getMetaContent('cover_letter_page');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('cover_letter_page');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['sec2sLeft'] = getMultiText('cover-letter-page-left-instructions');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function recruitment_process()
    {
        $meta = $this->page->getMetaContent('recruitement_process');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('recruitement_process');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['sec2s'] = getMultiText('recruitement-proccess-sec2');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function assessment_center()
    {
        $meta = $this->page->getMetaContent('assessment_center');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('assessment_center');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['sec2s'] = getMultiText('assessment-center-sec2');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function interview()
    {
        $meta = $this->page->getMetaContent('interview');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('interview');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['sec2s'] = getMultiText('interview-sec2');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function online_test()
    {
        $meta = $this->page->getMetaContent('online_test');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('online_test');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['tests'] = $this->master->getRows('online_test_categories', ['status'=> 1], '', '', 'asc', 'sort_order');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function terms_and_conditions()
    {
        $meta = $this->page->getMetaContent('terms_and_conditions');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('terms_and_conditions');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function disclaimer()
    {
        $meta = $this->page->getMetaContent('disclaimer');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('disclaimer');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function faq()
    {
        $meta = $this->page->getMetaContent('faq');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('faq');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['faqs'] = getMultiText('faqs');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function career_options()
    {
        $meta = $this->page->getMetaContent('career_options');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('career_options');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
			$rows = $this->master->getRows('career_options_accordians', ['status'=> 1], '', '', 'asc', 'sort_order');
			$this->data['rows'] = [];

			foreach($rows as $index => $row):
				$row->accordians = getMultiText('career_options_'.$row->id);
				$this->data['rows'][] = $row;
			endforeach;
			
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function blogs()
    {
        $meta = $this->page->getMetaContent('blogs');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('blogs');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['blogs'] = $this->master->getRows('blogs', ['status'=> 1], '', '', 'desc', 'id');
            $cats  = $this->master->getRows('blog_categories', ['status'=> 1]);
            $this->data['cats'] = [];
            foreach($cats as $index => $cat):
                $num = $this->master->num_rows('blogs', ['blog_cat'=> $cat->id, 'status'=> 1]);
                if($num > 0)
                    $this->data['cats'][] = $cat;
            endforeach;
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function work_with_us()
    {
        $meta = $this->page->getMetaContent('work_with_us');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('work_with_us');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['faqs'] = getMultiText('for-university-faq');
            $this->data['companies'] = $this->master->getRows('partner_companies', ['status'=> 1, 'page'=> 'work_with_us'], '', '', 'desc', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function partner_with_us()
    {
        $meta = $this->page->getMetaContent('partner_with_us');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('partner_with_us');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['faqs'] = getMultiText('for-employer-faq');
            $this->data['companies'] = $this->master->getRows('partner_companies', ['status'=> 1, 'page'=> 'partner_with_us'], '', '', 'desc', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function careers()
    {
        $meta = $this->page->getMetaContent('careers');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('careers');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function job_profile()
    {
        $meta = $this->page->getMetaContent('job_profile');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('job_profile');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['profiles'] = $this->master->getRows('job_profiles', ['status'=> 1], '', '', 'asc', 'sort_order');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function video_interview_content()
    {
        $meta = $this->page->getMetaContent('video_interview_main');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('video_interview_main');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['cats'] = $this->master->getRows('video_interview_categories', ['status'=> 1], '', '', 'desc', 'id');
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function events()
    {
        $meta = $this->page->getMetaContent('events');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $this->data['meta_desc'] = json_decode($meta->content);
        $events = $this->master->getRows('events', ['status'=> 1], '', '', 'desc', 'id');

        $this->data['events'] = [];
        foreach($events as $index => $event):
            $row = $this->master->getRow('event_categories', ['id'=> $event->event_type]);
            $event->cat_name = ucfirst($row->title);
            $this->data['events'][] = $event;
        endforeach;

        $cats = $this->master->get_data_rows('event_categories', ['status'=> 1]);
        $this->data['cats'] = [];
        foreach($cats as $index => $cat):
            $num = $this->master->num_rows('events', ['event_type'=> $cat->id, 'status'=> 1]);
            if($num > 0)
                $this->data['cats'][] = $cat;
        endforeach;

        http_response_code(200);
        echo json_encode($this->data);
        exit;
    }

    function event_detail()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('event_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['event'] = $this->master->getRow('events', ['id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function interview_category()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('interview_category');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['category'] = $this->master->getRow('video_interview_categories', ['id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function interview_category_question()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('interview_category_question');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['questions'] = $this->master->getRows('video_interview_questions', ['cat_id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function online_test_categories()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('online_test_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['main'] = $this->master->getRow('online_test_categories', ['id'=> $post['catId']]);
            $this->data['categories'] = $this->master->getRows('online_test_sub_categories', ['cat_id'=> $post['catId'], 'status'=> 1]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cv_builder_page()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 1;
            // $res['validationErrors'] = '';
            // $res['msg'] = '';
            // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            // $this->form_validation->set_rules('password', 'Password', 'required');
            // if ($this->form_validation->run() === FALSE) {
            //     $res['validationErrors'] = validation_errors();
            // }
            // else
            // {
                $post  = $this->input->post();
                // pr($post);
                $token = explode('_', doDecode($post['authToken']));
                $mem_id = $token[1];
                
                $cv_id = $this->master->save('mem_cv', ['mem_id'=> $mem_id]); 
                foreach($post['e_university_name'] as $index => $uni):
                    $education = [
                        'cv_id'=> $cv_id,
                        'university_name' => trim($uni),
                        'course_name'     => trim($post['e_course_name'][$index]),
                        'detail'          => trim($post['e_detail'][$index]),
                        'year_start'      => trim($post['e_year_start'][$index]),
                        'year_end'        => trim($post['e_year_end'][$index])
                    ];

                    $this->master->save('cv_educational', $education);
                endforeach;

                foreach($post['pe_company_name'] as $index => $pro):
                    $professional = [
                        'cv_id'=> $cv_id,
                        'company_name'    => trim($pro),
                        'job_title'       => trim($post['pe_job_title'][$index]),
                        'detail'          => trim($post['pe_detail'][$index]),
                        'year_start'      => trim($post['pe_year_start'][$index]),
                        'year_end'        => trim($post['pe_year_end'][$index])
                    ];
                    $this->master->save('cv_professional_experience', $professional);
                endforeach;

                foreach($post['s_it_skill'] as $index => $skill):
                    $it_skillsArr = [
                        'cv_id'           => $cv_id,
                        'it_skill_id'     => trim($skill),
                        'type'            => 'it_skill',
                    ];

                    $this->master->save('cv_others', $it_skillsArr);
                endforeach;

                foreach($post['s_language'] as $index => $language):
                    $languageArr = [
                        'cv_id'           => $cv_id,
                        'language_id'     => trim($language),
                        'type'            => 'language',
                    ];

                    $this->master->save('cv_others', $languageArr);
                endforeach;

                foreach($post['v_volunteer'] as $index => $volunteer):
                    $volunteerArr = [
                        'cv_id'           => $cv_id,
                        'volunteer'        => trim($volunteer),
                        'type'            => 'volunteer',
                    ];

                    $this->master->save('cv_others', $volunteerArr);
                endforeach;

                foreach($post['i_interest'] as $index => $interst):
                    $interstArr = [
                        'cv_id'=> $cv_id,
                        'interest'        => trim($interst),
                        'type'            => 'interest',
                    ];

                    $this->master->save('cv_others', $interstArr);
                endforeach;

                foreach($post['r_person_name'] as $index => $pref):
                    $reference = [
                        'cv_id'                 => $cv_id,
                        'person_name'           => trim($pref),
                        'job_title_and_company' => trim($post['r_job_title_and_company'][$index]),
                        'year_start'            => trim($post['r_year_start'][$index]),
                        'year_end'              => trim($post['r_year_end'][$index])
                    ];

                    $this->master->save('cv_references', $reference);
                endforeach;
            // }

            http_response_code(200);
            echo json_encode($res);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function cover_builder_page()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            $res['msg'] = '';
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('date', 'Date', 'required');
            $this->form_validation->set_rules('dear', 'Dear Sir/Madam', 'required');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('text[]', 'Missing Paragraph', 'required');
            // foreach($this->input->post('paragraph') as $index => $para):
            //     $para = json_decode($para);
            //     if(empty(trim($para->text)))
            //     {
            //         $this->form_validation->set_rules('missing_paragraph', 'Missing Paragraph', 'required');
            //         break;
            //     }
            // endforeach;

            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post  = $this->input->post();
                $token = explode('_', doDecode($post['authToken']));
                $mem_id = $token[1];
                
                $cover_data = [
                    'mem_id' => $mem_id,
                    'name'   => trim($post['name']),
                    'email'  => trim($post['email']),
                    'phone'  => trim($post['phone']),
                    'date'   => trim($post['date']),
                    'dear'   => trim($post['dear']),
                    'subject'=> trim($post['subject'])
                ];
                $cover_id = $this->master->save('mem_cover', $cover_data); 

                foreach($post['text'] as $index => $para):
                    // $para = json_decode($para);
                    $paragraph = [
                        'cover_id'              => $cover_id,
                        'text'                  => trim($para,  '"')
                    ];
                    $this->master->save('cover_paragraphs', $paragraph);
                endforeach;
                $res['status'] = 1;
            }

            http_response_code(200);
            echo json_encode($res);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function test_category_detail()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('test_category_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['category'] = $cat = $this->master->getRow('online_test_sub_categories', ['id'=> $post['catId']]);
            $this->data['main'] = $this->master->getRow('online_test_categories', ['id'=> $cat->cat_id]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function blog_detail()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('blog_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['blog'] = $this->master->getRow('blogs', ['id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function job_profile_detail()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $meta = $this->page->getMetaContent('job_profile_detail');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $this->data['meta_desc'] = json_decode($meta->content);
            $this->data['profile'] = $this->master->getRow('job_profiles', ['id'=> $post['id']]);
            http_response_code(200);
            echo json_encode($this->data);
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    

    function jobs()
    {
        if($this->input->post())
        {
            $post = $this->input->post();
            $token = explode('_', doDecode($post['authToken']));
            $mem_id = $token[1];
            $meta = $this->page->getMetaContent('jobs');
            $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
            $this->data['slug'] = $meta->slug;
            $data = $this->page->getPageContent('jobs');
            if ($data) 
            {
                $this->data['content'] = unserialize($data->code);
                $this->data['details'] = ($data->full_code);
                $this->data['meta_desc'] = json_decode($meta->content);
                $cats     = $this->master->getRows('job_categories', ['status'=> 1], '', '', 'asc', 'id');
                $this->data['cats'] = [];
                foreach($cats as $index => $cat):
                    $num = $this->master->num_rows('jobs', ['job_cat'=> $cat->id, 'job_expire >' => date('Y-m-d')]);
                    if($num > 0)
                    {
                        $cat->count = $num; 
                        $this->data['cats'][] = $cat;
                    }
                endforeach;
    
                $types = ['Graduate Jobs', 'Interships', 'Placements', 'Insight Programmes'];
                $this->data['types'] = [];
                foreach($types as $index => $type):
                    $num = $this->master->num_rows('jobs', ['job_type'=> trim($type), 'job_expire >' => date('Y-m-d')]);
                    if($num > 0)
                    {
                        $t = new stdClass();
                        $t->type  = $type;
                        $t->count = $num;
                        $this->data['types'][] = $t;
                    }
                endforeach;
    
                $degree_req = ['Collage Degree', 'University Degree', 'Graduate Diploma', 'Not Specified', 'No Minimum Requirement'];
                $this->data['degree_req'] = [];
                foreach($degree_req as $index => $requirement):
                    $num = $this->master->num_rows('jobs', ['degree_requirement'=> trim($requirement), 'job_expire >' => date('Y-m-d')]);
                    if($num > 0)
                    {
                        $t = new stdClass();
                        $t->type  = $requirement;
                        $t->count = $num;
                        $this->data['degree_req'][] = $t;
                    }
                endforeach;
    
                $cities = $this->page->getJobCities();
                $this->data['cities'] = [];
                foreach($cities as $index => $city):
                    $num = $this->master->num_rows('jobs', ['city'=> $city->city, 'job_expire >' => date('Y-m-d')]);
                    if($num > 0)
                    {
                        $city->count = $num; 
                        $this->data['cities'][] = $city;
                    }
                endforeach;
    
                $this->data['jobs'] =  [];
                $jobs = $this->master->getRows('jobs', ['status'=> 1, 'job_expire >' => date('Y-m-d')], '', '', 'desc', 'id');
				// pr($this->db->last_query());
                foreach($jobs as $index => $j):
                    $num = $this->master->num_rows('saved_jobs', ['mem_id'=> $mem_id, 'job_id'=> $j->id]);
                    $j->saved = false;
                    if($num > 0)
                        $j->saved = true;

                    $this->data['jobs'][] = $j;
                endforeach;
                
                http_response_code(200);
                echo json_encode($this->data);
            } 
            else
            {
                http_response_code(404);
            }
        }
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function save_interview_video()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $videoRecord = [];
            $token = explode('_', doDecode($post['authToken']));
            $mem_id = $token[1];
            // pr($_FILES, false);
            // pr($post);
            if (isset($_FILES["video"]["name"]) && $_FILES["video"]["name"] != "") {
                $video = upload_video(UPLOAD_PATH.'interview_videos/', 'video');
                // generate_thumb(UPLOAD_PATH.'images/',UPLOAD_PATH.'images/',$video['file_name'],600,'thumb_');
                if(!empty($video['file_name'])){
                    // if(isset($content_row['video']))
                    //     $this->remove_file(UPLOAD_PATH."images/".$content_row['video']);
                    //     $this->remove_file(UPLOAD_PATH."images/thumb_".$content_row['video']);
                    if($post['questionNo'] == '0')
                    {
                        $videoRecord['setup_video'] = $video['file_name'];
                    }
                    else
                    {
						$videoRecord['question']     = $post['question'];
                        $videoRecord['video'] 	     = $video['file_name'];
						$videoRecord['interview_id'] = $post['interview_session_id'];
						
                    }
                }
            }

            if(isset($post['interview_session_id']) && !empty($post['interview_session_id']))
            {
				// pr($videoRecord);
                $this->master->save('video_interview_videos', $videoRecord);
            }
            else
            {
                $videoRecord['mem_id'] = $mem_id;
                $interview_session_id = $this->master->save('video_interview', $videoRecord);
                $res['interview_session_id'] = $interview_session_id;
            }

            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function save_job()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $token = explode('_', doDecode($post['authToken']));
            $mem_id = $token[1];
            
            $this->master->save('saved_jobs', ['job_id'=> $post['id'], 'mem_id'=> $mem_id]);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function save_interview()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();

            $submit_for_review = $post['submit_for_review'] == 'yes' ? '1' : '0';

            $this->master->save('video_interview', ['submit_for_review'=> $submit_for_review], 'id', $post['interview_session_id']);
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }


    function fetch_jobs_data()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            $token = explode('_', doDecode($post['authToken']));
            $mem_id = $token[1];

            $jobs = $this->page->fetch_jobs_data($post);
            $res['jobs'] =  [];
            foreach($jobs as $index => $j):
                $num = $this->master->num_rows('saved_jobs', ['mem_id'=> $mem_id, 'job_id'=> $j->id]);
                $j->saved = false;
                if($num > 0)
                    $j->saved = true;

                $res['jobs'][] = $j;
            endforeach;
            
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function fetch_events_data()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();
            // $token = explode('_', doDecode($post['authToken']));
            // $mem_id = $token[1];

            $events = $this->page->fetch_events_data($post);
            $res['events'] = [];
            foreach($events as $index => $event):
                $row = $this->master->getRow('event_categories', ['id'=> $event->event_type]);
                $event->cat_name = ucfirst($row->title);
                $res['events'][] = $event;
            endforeach;
            
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }

    function fetch_blogs_data()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $post = $this->input->post();

            $res['blogs'] = $this->master->getRows('blogs', ['blog_cat'=> $post['cat_id']], '','', 'desc', 'id');
            $res['status'] = 1;
            echo json_encode($res);
            exit;
        }
    }
    
    function privacy_policy()
    {
        $meta = $this->page->getMetaContent('privacy_policy');
        $this->data['page_title'] = $meta->page_name.' - '.$this->data['site_settings']->site_name;
        $this->data['slug'] = $meta->slug;
        $data = $this->page->getPageContent('privacy_policy');
        if ($data) 
        {
            $this->data['content'] = unserialize($data->code);
            $this->data['details'] = ($data->full_code);
            $this->data['meta_desc'] = json_decode($meta->content);
            http_response_code(200);
            echo json_encode($this->data);
        } 
        else
        {
            http_response_code(404);
        }
        exit;
    }

    function save_contact_message()
    {
        if($this->input->post())
        {
            $res = [];
            $res['status'] = 0;
            $res['validationErrors'] = '';
            
            $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[30]', ['min_length'=> 'Please enter full name.', 'max_length'=> 'Name too long.']);
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('msg', 'Comment', 'trim|required|min_length[10]|max_length[1000]', ['min_length'=> 'Please enter a complete Comment.', 'max_length'=> '1000 character limit reached.']);
            if ($this->form_validation->run() === FALSE) {
                $res['validationErrors'] = validation_errors();
            }
            else
            {
                $post = html_escape($this->input->post());
                $is_added = $this->master->save('contact', $post);
                if($is_added)
                {
                    $res['status'] = 1;
                }
            }
            echo json_encode($res);
            exit;
        }
    }

}
