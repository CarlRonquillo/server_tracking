<?php
	class Home extends CI_Controller
	{
		public function index()
		{
			$this->load->library('pagination');
			$this->load->model('CrudModel');
			//$config = $this->pagination_config(base_url().'index.php/home/index',$this->CrudModel->count_hosts(),5);

			//$this->pagination->initialize($config);
			$data['records']= $this->CrudModel->getRecords(0);
			$data['links'] = $this->pagination->create_links();
			$data['showAll'] = 0;
			$this->load->view('home',$data);
		}

		public function show_all()
		{
			$this->load->library('pagination');
			$this->load->model('CrudModel');
			//$config = $this->pagination_config(base_url().'index.php/home/index',$this->CrudModel->count_hosts(),5);

			//$this->pagination->initialize($config);
			$data['records']= $this->CrudModel->getRecords(1);
			$data['links'] = $this->pagination->create_links();
			$data['showAll'] = 1;
			$this->load->view('home',$data);
		}

		public function view_lists($listName,$record_id)
		{
			//$this->load->library('pagination');
			$this->load->model('CrudModel');
			//$config = $this->pagination_config(base_url().'index.php/home/view_vendor/'.$record_id,$this->CrudModel->count_products($record_id),2);

			//$this->pagination->initialize($config);
			$data['edit_list'] = $this->CrudModel->getAllRecords( $record_id,'lists','ListID');
			$data['lists'] = $this->CrudModel->getLists($listName);
			$data['ListName'] = $listName;
			$data['ListNames'] = $this->CrudModel->listNames();
			$data['id'] = $record_id;
			//$data['products'] = $this->CrudModel->getProducts($record_id);
			//$data['links'] = $this->pagination->create_links();
			$this->load->view('view_lists',$data);
		}

		public function view_host($record_id)
		{
			//$this->load->library('pagination');
			$this->load->model('CrudModel');
			//$config = $this->pagination_config(base_url().'index.php/home/view_vendor/'.$record_id,$this->CrudModel->count_products($record_id),2);

			//$this->pagination->initialize($config);
			$data['record'] = $this->CrudModel->getAllRecords( $record_id,'hostserver','HostServerId');
			//$data['products'] = $this->CrudModel->getProducts($record_id);
			//$data['links'] = $this->pagination->create_links();
			$this->load->view('update_host',$data);
		}

		public function view_webserver($record_id)
		{
			//$this->load->library('pagination');
			$this->load->model('CrudModel');
			//$config = $this->pagination_config(base_url().'index.php/home/view_vendor/'.$record_id,$this->CrudModel->count_products($record_id),2);

			//$this->pagination->initialize($config);
			$data['record'] = $this->CrudModel->getAllRecords( $record_id,'hostserver','HostServerId');
			$data['webservers'] = $this->CrudModel->getWebServers($record_id);
			//$data['links'] = $this->pagination->create_links();
			$this->load->view('view_webserver',$data);
		}

		public function view_updatelogs($record_id)
		{
			//$this->load->library('pagination');
			$this->load->model('CrudModel');
			//$config = $this->pagination_config(base_url().'index.php/home/view_vendor/'.$record_id,$this->CrudModel->count_products($record_id),2);

			//$this->pagination->initialize($config);
			$data['record'] = $this->CrudModel->getAllRecords( $record_id,'hostserver','HostServerId');
			$data['UpdateLogs'] = $this->CrudModel->getUpdateLogs($record_id,'FK_HostServerId');
			//$data['links'] = $this->pagination->create_links();
			$this->load->view('view_updatelog',$data);
		}

		public function view_web_updatelogs($record_id)
		{
			//$this->load->library('pagination');
			$this->load->model('CrudModel');
			//$config = $this->pagination_config(base_url().'index.php/home/view_vendor/'.$record_id,$this->CrudModel->count_products($record_id),2);

			//$this->pagination->initialize($config);
			$data['record'] = $this->CrudModel->getAllRecords( $record_id,'webserver','WebServerId');
			$data['UpdateLogs'] = $this->CrudModel->getUpdateLogs($record_id,'FK_WebServerID');
			//$data['links'] = $this->pagination->create_links();
			$this->load->view('view_web_updatelog',$data);
		}

		public function view_users($record_id)
		{
			//$this->load->library('pagination');
			$this->load->model('CrudModel');
			//$config = $this->pagination_config(base_url().'index.php/home/view_vendor/'.$record_id,$this->CrudModel->count_products($record_id),2);

			//$this->pagination->initialize($config);
			$data['record'] = $this->CrudModel->getAllRecords( $record_id,'hostserver','HostServerId');
			$data['OtherUsers'] = $this->CrudModel->getOtherUsers($record_id,'FK_HostServerId');
			//$data['links'] = $this->pagination->create_links();
			$this->load->view('view_user',$data);
		}

		public function view_web_users($record_id)
		{
			//$this->load->library('pagination');
			$this->load->model('CrudModel');
			//$config = $this->pagination_config(base_url().'index.php/home/view_vendor/'.$record_id,$this->CrudModel->count_products($record_id),2);

			//$this->pagination->initialize($config);
			$data['record'] = $this->CrudModel->getAllRecords( $record_id,'webserver','WebServerId');
			$data['OtherUsers'] = $this->CrudModel->getOtherUsers($record_id,'FK_WebServerId');
			//$data['links'] = $this->pagination->create_links();
			$this->load->view('view_web_user',$data);
		}

		public function pagination_config($base_url,$total_rows,$per_page)
		{
			$config = array();
			$config['base_url'] = $base_url;
			$config['total_rows'] = $total_rows;
			$config['per_page'] = $per_page;
			$config['num_links'] = 3;

			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = '&laquo; First';
			$config['first_tag_open'] = '<li class="prev page">';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last &raquo;';
			$config['last_tag_open'] = '<li class="next page">';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = 'Next &rarr;';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&larr; Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';

			return $config;
		}

		public function search()
		{
			$this->load->model('CrudModel');
			$searched_item = $this->input->post('searchBar');
			$checkValue =  $this->input->post('ShowAll');

			if(isset($searched_item) and !empty($searched_item))
			{
				$data['links'] = '';
				$data['showAll'] = $checkValue;
				$data['records'] = $this->CrudModel->search($searched_item);
				$this->load->view('home',$data);
			}
			else
			{
				redirect($this->index());
			}
		}

		public function search_web($hostID)
		{
			$this->load->model('CrudModel');
			$searched_item = $this->input->post('search');
			$data['record'] = $this->CrudModel->getAllRecords( $hostID,'hostserver','HostServerId');
			$data['webservers'] = $this->CrudModel->search_web($searched_item,$hostID);
			$this->load->view('view_webserver',$data);
		}

		public function search_log($hostID)
		{
			$this->load->model('CrudModel');
			$searched_item = $this->input->post('search');
			$data['record'] = $this->CrudModel->getAllRecords( $hostID,'hostserver','HostServerId');
			$data['UpdateLogs'] = $this->CrudModel->search_log($searched_item,$hostID,'FK_HostServerId');
			$this->load->view('view_updatelog',$data);
		}

		public function search_web_log($hostID)
		{
			$this->load->model('CrudModel');
			$searched_item = $this->input->post('search');
			$data['record'] = $this->CrudModel->getAllRecords( $hostID,'webserver','WebServerId');
			$data['UpdateLogs'] = $this->CrudModel->search_log($searched_item,$hostID,'FK_WebServerID');
			$this->load->view('view_web_updatelog',$data);
		}

		public function search_user($hostID)
		{
			$this->load->model('CrudModel');
			$searched_item = $this->input->post('search');
			$data['record'] = $this->CrudModel->getAllRecords( $hostID,'hostserver','HostServerId');
			$data['OtherUsers'] = $this->CrudModel->search_user($searched_item,$hostID,'FK_HostServerId');
			$this->load->view('view_user',$data);
		}

		public function search_web_user($hostID)
		{
			$this->load->model('CrudModel');
			$searched_item = $this->input->post('search');
			$data['record'] = $this->CrudModel->getAllRecords( $hostID,'webserver','WebServerId');
			$data['OtherUsers'] = $this->CrudModel->search_user($searched_item,$hostID,'FK_WebServerID');
			$this->load->view('view_web_user',$data);
		}

		public function add_host()
		{
			$this->load->model('CrudModel');
			$data['ActiveStatus'] = $this->CrudModel->getList('ActiveStatus');
            $data['Locations'] = $this->CrudModel->getList('Locations');
			$data['OSs'] = $this->CrudModel->getList('OS');
			$data['Databases'] = $this->CrudModel->getList('Database');
			$data['TechWebserverTypes'] = $this->CrudModel->getList('TechWebserverType');
			$data['VirtualPhysicals'] = $this->CrudModel->getList('VirtualPhysical');
			$data['ISPConfigInstalleds'] = $this->CrudModel->getList('ISPConfigInstalled');
			$data['MailEnableds'] = $this->CrudModel->getList('MailEnabled');
			$this->load->view('add_host',$data);
		}

		public function add_web($hostID)
		{
			$this->load->model('CrudModel');
			$data['records']= $this->CrudModel->hostCode();
			$data['CMSs'] = $this->CrudModel->getList('CMS');
			$data['HostServerId'] = $hostID;
			$this->load->view('add_web',$data);
		}

		public function add_updatelog($hostID)
		{
			$this->load->model('CrudModel');
			$records= $this->CrudModel->hostCode();
			$this->load->view('add_updatelog',['records'=>$records,'HostServerId' => $hostID]);
		}

		public function add_web_updatelog($webID)
		{
			$this->load->model('CrudModel');
			$records= $this->CrudModel->webCodes();
			$this->load->view('add_web_updatelog',['records'=>$records,'WebServerId' => $webID]);
		}

		public function add_user($hostID)
		{
			$this->load->model('CrudModel');
			$records= $this->CrudModel->hostCode();
			$this->load->view('add_user',['records'=>$records,'HostServerId' => $hostID]);
		}

		public function add_web_user($webID)
		{
			$this->load->model('CrudModel');
			$records= $this->CrudModel->webCodes();
			$this->load->view('add_web_user',['records'=>$records,'WebServerId' => $webID]);
		}

		public function add_list($listName)
		{
			//$this->load->library('pagination');
			$this->load->model('CrudModel');
			//$config = $this->pagination_config(base_url().'index.php/home/view_vendor/'.$record_id,$this->CrudModel->count_products($record_id),2);

			//$this->pagination->initialize($config);
			$data['lists'] = $this->CrudModel->getLists($listName);
			$data['ListName'] = $listName;
			$data['ListNames'] = $this->CrudModel->listNames();
			//$data['products'] = $this->CrudModel->getProducts($record_id);
			//$data['links'] = $this->pagination->create_links();
			$this->load->view('add_list',$data);
		}

		public function save_host()
		{
			$this->form_validation->set_rules('HostServerName','Host Server Name','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			$this->load->model('CrudModel');
			if ($this->form_validation->run())
            {
            	$data = $this->input->post();

            	if(empty($_POST['TechWebserver']))
            	{
            		$data['TechWebserver'] = 0;
            	}

            	if(empty($_POST['TechJava']))
            	{
            		$data['TechJava'] = 0;
            	}

            	if(empty($_POST['TechPHP']))
            	{
            		$data['TechPHP'] = 0;
            	}
            	
				if(empty($_POST['TechRuby']))
            	{
            		$data['TechRuby'] = 0;
            	}

                if($this->CrudModel->saveRecord($data,'hostserver'))
                {
                	$this->session->set_flashdata('response','Host server successfully saved.');
                }
                else
                {
					$this->session->set_flashdata('response','Host server was not saved.');
                }
                //return redirect('home/add_host');
            }
            $data['ActiveStatus'] = $this->CrudModel->getList('ActiveStatus');
            $data['Locations'] = $this->CrudModel->getList('Locations');
			$data['OSs'] = $this->CrudModel->getList('OS');
			$data['Databases'] = $this->CrudModel->getList('Database');
			$data['TechWebserverTypes'] = $this->CrudModel->getList('TechWebserverType');
			$data['VirtualPhysicals'] = $this->CrudModel->getList('VirtualPhysical');
			$data['ISPConfigInstalleds'] = $this->CrudModel->getList('ISPConfigInstalled');
			$data['MailEnableds'] = $this->CrudModel->getList('MailEnabled');
			$this->load->view('add_host',$data);
		}

		public function save_web($hostID)
		{
			$this->form_validation->set_rules('WebServerName','Web Server Name','required');
			$this->form_validation->set_rules('FK_HostServerID','Host Server Name','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            $data = $this->input->post();
            $pass_data['HostServerId'] = $data['FK_HostServerID'];
            $this->load->model('CrudModel');
			if ($this->form_validation->run())
            {
                if($this->CrudModel->saveRecord($data,'webserver'))
                {
                	$this->session->set_flashdata('response', $data['WebServerName'].' was Successfully Saved.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['WebServerName'].' was Not Saved!');
                }
            }
            $pass_data['records'] = $this->CrudModel->hostCode();
            $pass_data['CMSs'] = $this->CrudModel->getList('CMS');
            $this->load->view('add_web',$pass_data);
		}

		public function save_updatelog()
		{
			$this->form_validation->set_rules('Title','Title','required');
			$this->form_validation->set_rules('Notes','Notes','required');
			$this->form_validation->set_rules('FK_HostServerId','Host Server Name','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			$data = $this->input->post();
            $this->load->model('CrudModel');
			if ($this->form_validation->run())
            {
                if($this->CrudModel->saveRecord($data,'serverupdatelog'))
                {
                	$this->session->set_flashdata('response', $data['Title'].' was Successfully Saved.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['Title'].' was Not Saved!');
                }
            }
            $records= $this->CrudModel->hostCode();
            $this->load->view('add_updatelog',['records'=>$records,'HostServerId' => $data['FK_HostServerId']]);
		}

		public function save_web_updatelog()
		{
			$this->form_validation->set_rules('Title','Title','required');
			$this->form_validation->set_rules('Notes','Notes','required');
			$this->form_validation->set_rules('FK_WebServerID','Web Server Name','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			$this->load->model('CrudModel');
			$data = $this->input->post();
			if ($this->form_validation->run())
            {
                if($this->CrudModel->saveRecord($data,'serverupdatelog'))
                {
                	$this->session->set_flashdata('response', $data['Title'].' was Successfully Saved.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['Title'].' was Not Saved!');
                }
            }
            $records= $this->CrudModel->webCodes();
            $this->load->view('add_web_updatelog',['records'=>$records,'WebServerId' => $data['FK_WebServerID']]);
		}

		public function save_user()
		{
			$this->form_validation->set_rules('Usertype','User Type','required');
			$this->form_validation->set_rules('Username','User Name','required');
			$this->form_validation->set_rules('Password','Password','required');
			$this->form_validation->set_rules('FK_HostServerID','Host Server Name','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			$data = $this->input->post();
            $this->load->model('CrudModel');
			if ($this->form_validation->run())
            {
                if($this->CrudModel->saveRecord($data,'otherusers'))
                {
                	$this->session->set_flashdata('response', $data['Username'].' was Successfully Saved.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['Username'].' was Not Saved!');
                }
            }
            $records= $this->CrudModel->hostCode();
            $this->load->view('add_user',['records'=>$records,'HostServerId' => $data['FK_HostServerID']]);
		}

		public function save_web_user()
		{
			$this->form_validation->set_rules('Usertype','User Type','required');
			$this->form_validation->set_rules('Username','User Name','required');
			$this->form_validation->set_rules('Password','Password','required');
			$this->form_validation->set_rules('FK_WebServerID','Web Server Name','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			$data = $this->input->post();
            $this->load->model('CrudModel');
			if ($this->form_validation->run())
            {
                if($this->CrudModel->saveRecord($data,'otherusers'))
                {
                	$this->session->set_flashdata('response', $data['Username'].' was Successfully Saved.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['Username'].' was Not Saved!');
                }
            }
            $records= $this->CrudModel->webCodes();
            $this->load->view('add_web_user',['records'=>$records,'WebServerId' => $data['FK_WebServerID']]);
		}

		public function save_list($listName)
		{
			$this->form_validation->set_rules('ListName','List Name','required');
			$this->form_validation->set_rules('ListKey','List Key','required');
			$this->form_validation->set_rules('Value','Value','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run())
            {
            	$data = $this->input->post();
            	if(empty($_POST['Active']))
            	{
            		$data['Active'] = 0;
            	}
                $this->load->model('CrudModel');
                if($this->CrudModel->saveRecord($data,'lists'))
                {
                	$this->session->set_flashdata('response', $data['Value'].' was Successfully Saved.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['Value'].' was Not Saved!');
                }
                return redirect("home/add_list/{$listName}");
            }
            else
            {
				//$this->load->library('pagination');
				$this->load->model('CrudModel');
				//$config = $this->pagination_config(base_url().'index.php/home/view_vendor/'.$record_id,$this->CrudModel->count_products($record_id),2);

				//$this->pagination->initialize($config);
				$data['lists'] = $this->CrudModel->getLists($listName);
				$data['ListName'] = $listName;
				$data['ListNames'] = $this->CrudModel->listNames();
				//$data['products'] = $this->CrudModel->getProducts($record_id);
				//$data['links'] = $this->pagination->create_links();
				$this->load->view('add_list',$data);
            }
		}

		public function edit_host($hostID)
		{
			$this->load->model('CrudModel');
			$data['Locations'] = $this->CrudModel->getList('Locations');
			$data['ActiveStatus'] = $this->CrudModel->getList('ActiveStatus');
			$data['OSs'] = $this->CrudModel->getList('OS');
			$data['Databases'] = $this->CrudModel->getList('Database');
			$data['TechWebserverTypes'] = $this->CrudModel->getList('TechWebserverType');
			$data['VirtualPhysicals'] = $this->CrudModel->getList('VirtualPhysical');
			$data['ISPConfigInstalleds'] = $this->CrudModel->getList('ISPConfigInstalled');
			$data['MailEnableds'] = $this->CrudModel->getList('MailEnabled');
			$data['record'] = $this->CrudModel->getAllRecords( $hostID,'hostserver','HostServerId');
			$this->load->view('update_host',$data);
		}

		public function edit_web($record_id)
		{
			$this->load->model('CrudModel');
			$data['record'] = $this->CrudModel->getAllRecords( $record_id,'webserver','WebServerId');
			$data['hostCodes']= $this->CrudModel->hostCode();
			$data['records']= $this->CrudModel->hostCode();
			$data['CMSs'] = $this->CrudModel->getList('CMS');
			$this->load->view('update_web',$data);
		}

		public function edit_updatelog($record_id)
		{
			$this->load->model('CrudModel');
			$record = $this->CrudModel->getAllRecords( $record_id,'serverupdatelog','ServerUpdateLogID');
			$hostCode= $this->CrudModel->hostCode();
			$this->load->view('update_updatelog',['record'=>$record,'hostCodes' => $hostCode]);
		}

		public function edit_web_updatelog($record_id)
		{
			$this->load->model('CrudModel');
			$record = $this->CrudModel->getAllRecords( $record_id,'serverupdatelog','ServerUpdateLogID');
			$webCodes = $this->CrudModel->webCodes();
			$this->load->view('update_web_updatelog',['record'=>$record,'webCodes' => $webCodes]);
		}

		public function edit_user($record_id)
		{
			$this->load->model('CrudModel');
			$record = $this->CrudModel->getAllRecords( $record_id,'otherusers','OtherUsersID');
			$hostCode= $this->CrudModel->hostCode();
			$this->load->view('update_user',['record'=>$record,'hostCodes' => $hostCode]);
		}

		public function edit_web_user($record_id)
		{
			$this->load->model('CrudModel');
			$record = $this->CrudModel->getAllRecords( $record_id,'otherusers','OtherUsersID');
			$webCodes= $this->CrudModel->webCodes();
			$this->load->view('update_web_user',['record'=>$record,'webCodes' => $webCodes]);
		}

		public function update_host($record_id)
		{
			$this->form_validation->set_rules('HostServerName','Host Server Name','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run())
            {
            	$data = $this->input->post();

            	if(empty($_POST['TechWebserver']))
            	{
            		$data['TechWebserver'] = 0;
            	}

            	if(empty($_POST['TechJava']))
            	{
            		$data['TechJava'] = 0;
            	}

            	if(empty($_POST['TechPHP']))
            	{
            		$data['TechPHP'] = 0;
            	}

				if(empty($_POST['TechRuby']))
            	{
            		$data['TechRuby'] = 0;
            	}


                $this->load->model('CrudModel');
                if($this->CrudModel->updateRecord( $record_id,$data,'hostserver','HostServerId'))
                {
                	$this->session->set_flashdata('response',$data['HostServerName'].' was Successfully Updated.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['HostServerName'].' was Not Updated!');
                }
                return redirect("home");
            }
            else
            {
                $this->load->model('CrudModel');
				$record = $this->CrudModel->getAllRecords( $record_id,'hostserver' );
				//$products = $this->CrudModel->getProducts( $record_id );
				$this->load->view('view_vendor',['record'=>$record]);//,'products' => $products]);
            }
		}

		public function update_web($record_id,$hostID)
		{
			$this->form_validation->set_rules('WebServerName','Web Server Name','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run())
            {
            	$data = $this->input->post();
                $this->load->model('CrudModel');
                if($this->CrudModel->updateRecord( $record_id,$data,'webserver','WebServerId'))
                {
                	$this->session->set_flashdata('response',$data['WebServerName'].' was  successfully updated.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['WebServerName'].' was  not successfully updated.!');
                }
                return redirect("home/view_webserver/{$hostID}");
            }
            else
            {
				$this->load->model('CrudModel');
				$record = $this->CrudModel->getAllRecords( $record_id,'webserver','WebServerId');
				$hostCode= $this->CrudModel->hostCode();
				$this->load->view('update_web',['record'=>$record,'hostCodes' => $hostCode]);
            }
		}

		public function update_updatelog($record_id,$hostID)
		{
			$this->form_validation->set_rules('Title','Title','required');
			$this->form_validation->set_rules('Notes','Notes','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run())
            {
            	$data = $this->input->post();
                $this->load->model('CrudModel');
                if($this->CrudModel->updateRecord( $record_id,$data,'serverupdatelog','ServerUpdateLogID'))
                {
                	$this->session->set_flashdata('response',$data['Title'].' was  successfully updated.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['Title'].' was  not successfully updated.!');
                }
                return redirect("home/view_updatelogs/{$hostID}");
            }
            else
            {
				$this->load->model('CrudModel');
				$record = $this->CrudModel->getAllRecords( $record_id,'serverupdatelog','ServerUpdateLogID');
				$hostCode= $this->CrudModel->hostCode();
				$this->load->view('update_updatelog',['record'=>$record,'hostCodes' => $hostCode]);
            }
		}

		public function update_web_updatelog($record_id,$hostID)
		{
			$this->form_validation->set_rules('Title','Title','required');
			$this->form_validation->set_rules('Notes','Notes','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run())
            {
            	$data = $this->input->post();
                $this->load->model('CrudModel');
                if($this->CrudModel->updateRecord( $record_id,$data,'serverupdatelog','ServerUpdateLogID'))
                {
                	$this->session->set_flashdata('response',$data['Title'].' was  successfully updated.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['Title'].' was  not successfully updated.!');
                }
                return redirect("home/view_web_updatelogs/{$hostID}");
            }
            else
            {
				$this->load->model('CrudModel');
				$record = $this->CrudModel->getAllRecords( $record_id,'serverupdatelog','ServerUpdateLogID');
				$hostCode= $this->CrudModel->hostCode();
				$this->load->view('update_web_updatelog',['record'=>$record,'hostCodes' => $hostCode]);
            }
		}

		public function update_user($record_id,$hostID)
		{
			$this->form_validation->set_rules('Usertype','User Type','required');
			$this->form_validation->set_rules('Username','User Name','required');
			$this->form_validation->set_rules('Password','Password','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run())
            {
            	$data = $this->input->post();
                $this->load->model('CrudModel');
                if($this->CrudModel->updateRecord( $record_id,$data,'otherusers','OtherUsersID'))
                {
                	$this->session->set_flashdata('response',$data['Username'].' was  successfully updated.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['Username'].' was  not successfully updated.!');
                }
                return redirect("home/view_users/{$hostID}");
            }
            else
            {
            	$this->load->model('CrudModel');
				$record = $this->CrudModel->getAllRecords( $record_id,'otherusers','OtherUsersID');
				$hostCode= $this->CrudModel->hostCode();
				$this->load->view('update_user',['record'=>$record,'hostCodes' => $hostCode]);
            }
		}

		public function update_web_user($record_id,$hostID)
		{
			$this->form_validation->set_rules('Usertype','User Type','required');
			$this->form_validation->set_rules('Username','User Name','required');
			$this->form_validation->set_rules('Password','Password','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run())
            {
            	$data = $this->input->post();
                $this->load->model('CrudModel');
                if($this->CrudModel->updateRecord( $record_id,$data,'otherusers','OtherUsersID'))
                {
                	$this->session->set_flashdata('response',$data['Username'].' was  successfully updated.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['Username'].' was  not successfully updated.!');
                }
                return redirect("home/view_web_users/{$hostID}");
            }
            else
            {
            	$this->load->model('CrudModel');
				$record = $this->CrudModel->getAllRecords( $record_id,'otherusers','OtherUsersID');
				$webCodes= $this->CrudModel->webCodes();
				$this->load->view('update_web_user',['record'=>$record,'webCodes' => $webCodes]);
            }
		}

		public function update_list($listName,$record_id)
		{
			$this->form_validation->set_rules('ListName','List Name','required');
			$this->form_validation->set_rules('ListKey','List Key','required');
			$this->form_validation->set_rules('Value','Value','required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run())
            {
            	$data = $this->input->post();
            	if(empty($_POST['Active']))
            	{
            		$data['Active'] = 0;
            	}
                $this->load->model('CrudModel');
                if($this->CrudModel->updateRecord( $record_id,$data,'lists','ListID'))
                {
                	$this->session->set_flashdata('response',$data['Value'].' was  successfully updated.');
                }
                else
                {
					$this->session->set_flashdata('response',$data['Value'].' was  not successfully updated.!');
                }
                return redirect("home/view_lists/{$listName}/{$record_id}");
            }
            else
            {
				//$this->load->library('pagination');
				$this->load->model('CrudModel');
				//$config = $this->pagination_config(base_url().'index.php/home/view_vendor/'.$record_id,$this->CrudModel->count_products($record_id),2);

				//$this->pagination->initialize($config);
				$data['edit_list'] = $this->CrudModel->getAllRecords( $record_id,'lists','ListID');
				$data['lists'] = $this->CrudModel->getLists($listName);
				$data['ListName'] = $listName;
				$data['ListNames'] = $this->CrudModel->listNames();
				$data['id'] = $record_id;
				//$data['products'] = $this->CrudModel->getProducts($record_id);
				//$data['links'] = $this->pagination->create_links();
				$this->load->view('view_lists',$data);
            }
		}

		public function delete($record_id,$tableName,$fieldName,$FK_fieldName)
		{
			$data = array('Active' => 0, 'DateDeleted' => date("Y-m-d H:i:s"));
			$this->load->model('CrudModel');
			$ID = $this->CrudModel->getHostID($record_id,$tableName,$fieldName,$FK_fieldName);
			if($this->CrudModel->deleteRecord( $record_id,$data,$tableName,$fieldName))
			{
				$this->session->set_flashdata('response','Record Successfully Deleted.');
			}
			else
			{
				$this->session->set_flashdata('response','Record Not Deleted!');
			}

			if($tableName == 'webserver')
			{
				
				return redirect("home/view_webserver/{$ID}");
			}
			elseif($tableName == 'serverupdatelog')
			{
				if($FK_fieldName == 'FK_HostServerId')
				{
					return redirect("home/view_updatelogs/{$ID}");
				}
				else
				{
					return redirect("home/view_web_updatelogs/{$ID}");
				}
			}
			if($tableName == 'otherusers')
			{
				if($FK_fieldName == 'FK_HostServerId')
				{
					return redirect("home/view_users/{$ID}");
				}
				else
				{
					return redirect("home/view_web_users/{$ID}");
				}
			}
			else
			{
				return redirect('home');
			}
		}
	}

?>