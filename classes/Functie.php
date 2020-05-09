<?php

class Functie
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

    public function createFunctie($fields = array()) {
        if(!$this->_db->insert('functii', $fields)) {
            throw new Exception('Sorry, there was a problem to create new employer holiday');
        }
    }

    public function delete($id)
    {
        if(!$this->_db->delete('functii', array('id','=',$id))) {
            throw new Exception('There was a problem updating');
        }
    }
    public function update($id,$fields = array())
    {
        if(!$this->_db->update('functii', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }
    public function getFunctieById($id)
    {
        $data = $this->_db->get('functii', array('id', '=', $id));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }

    public function getData()
    {
        $data = $this->_db->get('functii', array('1', '=', '1'));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }

}