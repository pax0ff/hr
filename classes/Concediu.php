<?php

class Concediu
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

    public function createConcediu($fields = array()) {
        if(!$this->_db->insert('concediu', $fields)) {
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
        if(!$this->_db->delete('concediu', array('id','=',$id))) {
            throw new Exception('There was a problem updating');
        }
    }
    public function update($id,$fields = array())
    {
        if(!$this->_db->update('concediu', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }
    public function getDataById($id)
    {
        $data = $this->_db->get('concediu', array('id', '=', $id));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }
    public function getDataByEmail($email)
    {
        $data = $this->_db->get('concediu', array('email', '=', $email));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }
    public function getRequestsForManagers()
    {
        $data = $this->_db->get('concediu', array('aprobat', '=', '0'));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }
    public function getData()
    {
        $data = $this->_db->get('concediu', array('1', '=', '1'));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }

    public function getUserEmail($nume)
    {
        $data = $this->_db->get('users', array('name', '=', $nume));
        if($data->count()) {
            return $data->first()->email;
        }
        else { ?>
            <div class="alert alert-danger">User-ul nu a fost gasit</div>
    <?php    }
    }
}