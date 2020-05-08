<?php

class Pontaj
{
    private $_db,
        $_data,
        $_results;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
    }

    public function data(){
        return $this->_data;
    }

    public function getPersonalPonting($userID = null)
    {
            $data = $this->_db->get('pontaj', array('pontatorID', '=', $userID));
            return $data;
    }

    public function results() {
        return $this->_results;
    }

    public function first() {
        $data = $this->results();
        return $data[0];
    }

    public function getPontatorName($table1,$table2,$fields=array(),$where=array())
    {
        if(count($where) === 3)
        {
            $operators = array('=', '>', '<', '>=', '<=');

            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];
            if(in_array($operator, $operators)) {

                $sql = "SELECT ";
                $values = null;
                $x = 1;

                foreach($fields as $col) {
                    $values = $col;
                    if ($x < count($fields)) {
                        $values .= ', ';
                    }
                    $sql .= "{$table1}.$values";
                    $x++;
                }
                $sql .= " FROM {$table1} JOIN {$table2} WHERE {$table1}.{$field} {$operator} {$table2}.{$value}";
                if(!$this->_db->query($sql,array($value))->error())
                {
                    $this->_results = $this->_db->query($sql,array($value));
                    return $this->_results;
                }
                return false;
            }
        }
    }

    public function getRole($table1,$table2,$fields=array(),$where=array())
    {
        if(count($where) === 3)
        {
            $operators = array('=', '>', '<', '>=', '<=');

            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];
            if(in_array($operator, $operators)) {

                $sql = "SELECT ";
                $values = null;
                $x = 1;

                foreach($fields as $col) {
                    $values = $col;
                    if ($x < count($fields)) {
                        $values .= ', ';
                    }
                    $sql .= "{$table1}.$values";
                    $x++;
                }
                $sql .= " FROM {$table1} JOIN {$table2} WHERE {$table1}.{$field} {$operator} {$table2}.{$value}";
                if(!$this->_db->query($sql,array($value))->error())
                {
                    $this->_results = $this->_db->query($sql,array($value));
                    return $this->_results;
                }
                return false;
            }
        }
    }

    public function createPontaj($fields = array()) {
        if(!$this->_db->insert('vizite', $fields)) {
            throw new Exception('Sorry, there was a problem to pontaj');
        }
    }

    public function check($user)
    {
        if(!empty($user))
        {
            $_error = false;
            echo "<pre>";
            $sql = "SELECT name FROM users WHERE name='$user'";
            if(!$this->_db->simpleQuery($sql)->error())
            {
                $this->_results = $this->_db->simpleQuery($sql);
                if(sizeof($this->_db->results()) == 0)
                {
                    $_error = true;
                }
                else
                {
                    $_error = false;
                }
            }
        }
        return $_error;
    }

    public function pontaje()
    {
        $data = $this->_db->get('vizite', array('1', '=', '1'));
        if($data->count()) {
            $this->_data = $data;
        }
        return  $this->data()->results();
    }
}