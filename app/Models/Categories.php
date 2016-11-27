<?php
namespace App\Models;

use Core\Model;

class Categories extends Model
{
    
    function __construct()
    {   
        parent::__construct();
    }

    function getAll(){
        $data = null;
        try {
            $data = $this->db->select("SELECT * FROM ".PREFIX."categories order by id desc ");
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        return $data;
    }

    function add($data){
        try {
            $this->db->insert(PREFIX.'categories',$data);
            return true;
        } catch (Exception $e) {
            
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return false;
        }
    }


    function delete($id){
        try {
            $this->db->delete(PREFIX.'categories',array('id' => $id));
            return true;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return false;
        }
    }

    function get($id){
        $data = null;
        try {
            $data = $this->db->select("SELECT * FROM ".PREFIX."categories WHERE id =:id",array(':id' => $id));
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        return $data;
    }

    function getCode($code){
        $data = null;
        try {
            $data = $this->db->select("SELECT * FROM ".PREFIX."categories WHERE code =:code",array(':code' => $code));
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        return $data[0];
    }

    function update($data,$where){
        try {
            $this->db->update(PREFIX."categories",$data,$where);
            return true;
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return false;
        }
    }

    function checkCode($code){
        $data = null;
        try {
            $data = $this->db->select("SELECT * FROM ".PREFIX."categories WHERE code =:code",array(':code' => $code));
            if(count($data) >= 1){
                return false;
            }else{
                return true;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return true;
        }
    }

}