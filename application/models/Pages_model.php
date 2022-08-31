<?php 
 
 class Pages_model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->database();
 		$this->table_name="sitecontent";
 	}

	 function checkJobCategoryExist($val)
	 {
		$this->db->where(['LOWER(title)'=> $val, 'status'=> 1]);
		$this->db->from('job_categories');
		$row = $this->db->get()->row();

		if(!empty($row))
		{
			return $row->id;
		}
		else
		{
			$arr = [];
			$arr['title'] = $val;
			$arr['status'] = 1;
			$this->db->set($arr);
			$this->db->insert('job_categories');
			return $this->db->insert_id();
		}
	 }
 	function savePageContent($vals,$page_slug=""){
 		$this->db->set($vals);
 		if($page_slug != ""){
 			//die("here");
 			$this->db->where("ckey",$page_slug);
 			$this->db->update($this->table_name);
 			return $page_slug;
 		}	 		
 		else{
 			$this->db->insert($this->table_name);
 			return $this->db->insert_id();
 		}
 	}
 	function saveMetaContent($vals,$page_slug=""){
 		$this->db->set($vals);
 		if($page_slug != ""){
 			//die("here");
 			$this->db->where("slug",$page_slug);
 			$this->db->update('meta_info');
 			return $page_slug;
 		}	 		
 		else{
 			$this->db->insert('meta_info');
 			return $this->db->insert_id();
 		}
 	}
	 function getJobCities()
	 {
		 $this->db->from('jobs');
		 $this->db->where(['status'=> 1]);
		 $this->db->select('city');
		 $this->db->distinct();
		 return $this->db->get()->result();
	 }
 	function getPageContent($page_slug=""){
 		if($page_slug != ""){
 			$this->db->where("ckey",$page_slug);
 			return $this->db->get($this->table_name)->row();
 		}
 		else{
 			 return $this->db->get($this->table_name)->result();
 		}
 	}
 	 function getMetaContent($page_slug=""){
 		if($page_slug != ""){
 			$this->db->where("slug",$page_slug);
 			return $this->db->get('meta_info')->row();
 		}
 		else{
 			 return $this->db->get('meta_info')->result();
 		}
 	}
 	function deletePage($page_slug=""){
 		$this->where("ckey",$page_slug);
 		$this->db->delete($this->table_name);
 		return $page_slug;	
 	}

	function get_products($post)
	{
		$this->db->select('*, (price - discount) as final_price');
		$this->db->from('products');
		$this->db->where('category_id', $post['category']);

		if(isset($post['price']) && !empty(trim($post['price'])))
		{
		  $priceIndex = explode(';', $post['price']);
		  $this->db->where(['(price - discount) >='=> $priceIndex[0], '(price - discount) <='=> $priceIndex[1]]);
		}

		if(isset($post['types']) && !empty($post['types']))
		{
			$this->db->group_start();
			foreach($post['types'] as $key => $value)
			{
				if($key == 0)
					$this->db->where('phone_type', $value);
				else
					$this->db->or_where('phone_type', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['brands']) && !empty($post['brands']))
		{
			$this->db->group_start();
			foreach($post['brands'] as $key => $value)
			{
				if($key == 0)
					$this->db->where('brand_id', $value);
				else
					$this->db->or_where('brand_id', $value);
			}
			$this->db->group_end();
		}

		$this->db->where(['status'=> 1]);
		$this->db->order_by('id', 'DESC');
		return $this->db->get()->result();
		// pr($this->db->last_query());

	}

	function fetch_jobs_data($post)
	{
		$this->db->select('*');
		$this->db->from('jobs');

		// if(isset($post['price']) && !empty(trim($post['price'])))
		// {
		//   $priceIndex = explode(';', $post['price']);
		//   $this->db->where(['(price - discount) >='=> $priceIndex[0], '(price - discount) <='=> $priceIndex[1]]);
		// }

		if(isset($post['jobCats']) && !empty($post['jobCats']))
		{
			$this->db->group_start();
			foreach($post['jobCats'] as $key => $value)
			{
				if($key == 0)
					$this->db->where('job_cat', $value);
				else
					$this->db->or_where('job_cat', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['cities']) && !empty($post['cities']))
		{
			$this->db->group_start();
			foreach($post['cities'] as $key => $value)
			{
				$value = str_replace('"', '', $value);
				if($key == 0)
					$this->db->where('city', $value);
				else
					$this->db->or_where('city', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['types']) && !empty($post['types']))
		{
			$this->db->group_start();
			foreach($post['types'] as $key => $value)
			{
				$value = str_replace('"', '', $value);
				if($key == 0)
					$this->db->where('job_type', $value);
				else
					$this->db->or_where('job_type', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['jobRequirements']) && !empty($post['jobRequirements']))
		{
			$this->db->group_start();
			foreach($post['jobRequirements'] as $key => $value)
			{
				$value = str_replace('"', '', $value);
				if($key == 0)
					$this->db->where('degree_requirement', $value);
				else
					$this->db->or_where('degree_requirement', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['searchKeyword']) && !empty($post['searchKeyword']) && $post['searchKeyword'] != 'null')
		{
			$keyword = trim($post['searchKeyword']);
			$this->db->group_start();
			$this->db->like('title', $keyword);
			$this->db->or_like('company_name', $keyword);
			$this->db->or_like('city', $keyword);
			$this->db->group_end();
		}

		if($post['visaAcceptance'] == 'true')
		{
			$this->db->where('visa_acceptance', 'Yes');
		}
		

		$this->db->where(['status'=> 1]);
		if(!empty($post['sortBy']))
		{
			$this->db->order_by('id', $post['sortBy']);
		}
		else
		{
			$this->db->order_by('id', 'desc');
		}

		return $this->db->get()->result();
		// pr($this->db->last_query());

	}

	function fetch_events_data($post)
	{
		$this->db->select('*');
		$this->db->from('events');

		if(isset($post['searchKeyword']) && !empty($post['searchKeyword']) && $post['searchKeyword'] != 'null')
		{
			$keyword = trim($post['searchKeyword']);
			$this->db->group_start();
			$this->db->like('title', $keyword);
			$this->db->group_end();
		}

		if(isset($post['location']) && !empty(trim($post['location'])))
		{
			$this->db->where('location', $post['location']);
		}

		if(isset($post['eventCats']) && !empty($post['eventCats']))
		{
			$this->db->group_start();
			foreach($post['eventCats'] as $key => $value)
			{
				$value = str_replace('"', '', $value);
				if($key == 0)
					$this->db->where('event_type', $value);
				else
					$this->db->or_where('event_type', $value);
			}
			$this->db->group_end();
		}

		if(isset($post['dateRange']) && !empty(trim($post['dateRange'])))
		{
			$today = date('Y-m-d');
			if($today === $post['dateRange'])
			{
				$this->db->where('event_date', $today);
			}
			else
			{
				$this->db->where(['event_date >='=> $today, 'event_date <='=> $post['dateRange']]);
			}
			
		}
		
		$this->db->where(['status'=> 1]);
		// if(!empty($post['sortBy']))
		// {
		// 	$this->db->order_by('id', $post['sortBy']);
		// }
		// else
		// {
		// 	$this->db->order_by('id', 'desc');
		// }

		return $this->db->get()->result();
		// pr($this->db->last_query());

	}

 }



?>