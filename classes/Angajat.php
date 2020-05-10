<?php

class Angajat
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

    public function createAngajat($fields = array()) {
        if(!$this->_db->insert('angajat', $fields)) {
            throw new Exception('Sorry, there was a problem to create new employer holiday');
        }
    }
    public function trimite($fields = array()) {
        if(!$this->_db->insert('concedii_manager', $fields)) {
            throw new Exception('Sorry, there was a problem to create new employer holiday');
        }
    }
    public function delete($id)
    {
        if(!$this->_db->delete('anagajat', array('id','=',$id))) {
            throw new Exception('There was a problem updating');
        }
    }
    public function update($id,$fields = array())
    {
        if(!$this->_db->update('angajat', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }
    public function updateUser($id,$fields = array())
    {
        if(!$this->_db->update('users', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }
    public function getAngajatDataById($id)
    {
        $data = $this->_db->get('angajat', array('id', '=', $id));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }

    public function getData()
    {
        $data = $this->_db->get('angajat', array('1', '=', '1'));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }
    public function getDepartmentIdByName($name)
    {
        $data = $this->_db->get('departamente', array('nume', '=', $name));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }
    public function getAngajatEmail($nume)
    {
        $data = $this->_db->get('`angajat`', array('`nume`', '=', $nume));
        if($data->count()) {
            $this->_data = $data;
        }
        return $this->data()->results();
    }
}