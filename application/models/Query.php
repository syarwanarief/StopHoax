<?php


class Query extends CI_Model
{

    function GetAllData($table)
    {
        //$this->db->query("SET sql_mode = '' ");
        return $this->db->get($table);
    }

    function inputData($data, $table)
    {

        //$this->db->query("SET sql_mode = '' ");
        return $this->db->insert($table, $data);

    }

    function delData($table)
    {
        //$this->db->query("SET sql_mode = '' ");
        $delete = $this->db->empty_table($table);
        return $delete;
    }
}