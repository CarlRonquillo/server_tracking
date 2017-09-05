<?php 
	class CrudModel extends CI_Model
	{
		public function count_hosts()
		{
			$this->db->where('Active',1);
			$this->db->from('hostserver');
			return $this->db->count_all_results();
			//return $this->db->count_all($table_name);
		}

		public function count_records($ID,$fieldName,$tableName)
		{
			$this->db->where('Active',1);
			$this->db->where($fieldName,$ID);
			$this->db->from($tableName);
			return $this->db->count_all_results();
		}

		public function getRecords($limit,$offset)
		{
			$this->db->limit($limit,$offset);
			$this->db->order_by('HostServerName', 'ASC');
			$query = $this->db->get_where('hostserver', array('Active' => 1));
			return $query->result();
		}

		public function hostCode()
		{
			$this->db->select('HostServerId,HostServerName');
			$query = $this->db->get_where('hostserver', array('Active' => 1));
			return $query->result();
		}

		public function listNames()
		{
			$this->db->distinct();
			$this->db->select('ListName');
			$query = $this->db->get_where('lists', array('Active' => 1));
			return $query->result();
		}

		public function webCodes()
		{
			$this->db->select('WebServerId,WebServerName');
			$query = $this->db->get_where('webserver', array('Active' => 1));
			return $query->result();
		}

		public function getList($listName)
		{
			$this->db->select('ListKey,Value');
			$query = $this->db->get_where('lists', array('Active' => 1,'ListName' => $listName));
			return $query->result();
		}


		public function saveRecord( $data,$tableName )
		{
			return $this->db->insert($tableName,$data);
		}

		public function getAllRecords( $record_id,$tableName,$fieldName)
		{
			$query = $this->db->get_where($tableName,array($fieldName=> $record_id));
			if($query->num_rows() > 0)
			{
				return $query->row();
			}
		}

		public function getWebServers($record_id)
		{
			//$this->db->limit($limit,$offset);
			$this->db->order_by('WebServerName', 'ASC');
			$query = $this->db->get_where('webserver', array('FK_HostServerID'=> $record_id,'Active' => 1));
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
		}

		public function getLists($listName)
		{
			//$this->db->limit($limit,$offset);
			$this->db->order_by('Value', 'ASC');
			$query = $this->db->get_where('lists', array('ListName'=> $listName));
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
		}

		public function getUpdateLogs($record_id,$fieldName)
		{
			//$this->db->limit($limit,$offset);
			$this->db->order_by('DateCreated', 'ASC');
			$query = $this->db->get_where('serverupdatelog', array($fieldName=> $record_id,'Active' => 1));
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
		}

		public function getOtherUsers($record_id,$fieldName)
		{
			//$this->db->limit($limit,$offset);
			$this->db->order_by('Username', 'ASC');
			$query = $this->db->get_where('otherusers', array($fieldName=> $record_id,'Active' => 1));
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
		}

		public function updateRecord( $record_id,$data,$tableName,$fieldName)
		{
			return $this->db->where($fieldName,$record_id)->update($tableName,$data);
		}

		public function deleteRecord($record_id ,$data,$tableName,$fieldName)
		{
			return $this->db->where($fieldName,$record_id)->update($tableName,$data);
		}

		public function search($searched_item)
		{
			$this->db->select('*');
			$this->db->like('HostServerName',$searched_item);
			$this->db->or_like('CommonName',$searched_item);
			$query = $this->db->get_where('hostserver', array('Active' => 1));
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
		}

		public function getHostID($foreignKey,$tableName,$fieldName,$FK_fieldNamme)
		{
			$query = $this->db->get_where($tableName, array('Active' => 1, $fieldName => $foreignKey));
			if($query->num_rows() > 0)
			{
				return $query->row($FK_fieldNamme);
			}
		}

		public function search_web($searched_item,$hostID)
		{
			$this->db->select('*');
			$this->db->like('WebServerName',$searched_item);
			$query = $this->db->get_where('webserver', array('Active' => 1,'FK_HostServerID' => $hostID));
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
		}

		public function search_log($searched_item,$hostID,$FK_fieldName)
		{
			$this->db->select('*');
			$this->db->like('Title',$searched_item);
			$query = $this->db->get_where('serverupdatelog', array('Active' => 1,$FK_fieldName => $hostID));
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
		}

		public function search_user($searched_item,$hostID,$FK_fieldName)
		{
			$this->db->select('*');
			$this->db->like('UserName',$searched_item);
			$query = $this->db->get_where('otherusers', array('Active' => 1,$FK_fieldName => $hostID));
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
		}
	}

?>