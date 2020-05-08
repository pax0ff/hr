<?php
class Demisie
{
    private $_db,
        $_data,
        $_results;

    public function __construct() {
        $this->_db = DB::getInstance();
    }
    public function data(){
        return $this->_data;
    }

    public function results() {
        return $this->_results;
    }

    public function first() {
        $data = $this->results();
        return $data[0];
    }

    public function createDemisie($fields = array()) {
        if(!$this->_db->insert('demisie', $fields)) {
            throw new Exception('Sorry, there was a problem to create new employer holiday');
        }
    }
    public function trimite($fields = array()) {
        if(!$this->_db->insert('demisie', $fields)) {
            throw new Exception('Sorry, there was a problem to create new employer holiday');
        }
    }
    public function delete($id)
    {
        if(!$this->_db->delete('demisie', array('id','=',$id))) {
            throw new Exception('There was a problem updating');
        }
    }
    public function update($id,$fields = array())
    {
        if(!$this->_db->update('demisie', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }
    public function getDepartmentId($departmentName)
    {
        $data = $this->_db->get('departamente', array('nume', '=', $departmentName));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }
    public function getDataById($id)
    {
        $data = $this->_db->get('demisie', array('id', '=', $id));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }
    public function getRequestsForManagers()
    {
        $data = $this->_db->get('demisie', array('aprobat', '=', '0'));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }
    public function getData()
    {
        $data = $this->_db->get('demisie', array('1', '=', '1'));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }
    public function getDataFromEmployee($email)
    {
        $data = $this->_db->get('angajat', array('email','=',$email));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }

    public function getUserEmail()
    {
        $data = $this->_db->get('demisie', array('1','=','1'));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }
}