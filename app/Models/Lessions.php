<?php
namespace App\Models;

use Core\Model;

class Lessions extends Model
{
	
	function __construct()
	{	
		parent::__construct();
	}

	function getAll(){
		$data = null;
		try {
			$data = $this->db->select("SELECT * FROM ".PREFIX."lessions order by id desc ");
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $data;
	}

	function add($data){
		try {
			$this->db->insert(PREFIX.'lessions',$data);
			return true;
		} catch (Exception $e) {
			
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return false;
		}
	}


	function delete($id){
		try {
			$this->db->delete(PREFIX.'lessions',array('id' => $id));
			return true;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return false;
		}
	}

	function get($id){
		$data = null;
		try {
			$data = $this->db->select("SELECT * FROM ".PREFIX."lessions WHERE id =:id",array(':id' => $id));
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $data;
	}

	function getCategory($category){
		$data = null;
		try {
			$data = $this->db->select("SELECT * FROM ".PREFIX."lessions WHERE category =:category",array(':category' => $category));
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $data;
	}

	function update($data,$where){
		try {
			$this->db->update(PREFIX."lessions",$data,$where);
			return true;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return false;
		}
	}

}