<?php

class Customer extends CI_model
{
    // private $csvReader;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('csvreader');
    }

    public function getCustomer($uid)
    {
        $result = $this->csvreader->parseFileByUid('assets/contents/sample-data.csv', 'UUID', $uid);
        if (!is_array($result) || !count($result)) {
            return false;
        }
        return $result[0];
    }

    // public function searchItems
}