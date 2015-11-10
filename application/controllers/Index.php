<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function _remap()
    {
        $segment_1 = $this->uri->segment(1);
        switch ($segment_1) {
            case null:
            case false:
            case '':
                $result = $this->index();
                break;
            case 'view':
                $result = $this->view($this->uri->segment(2));
                break;
            default:
                $result = $this->view($segment_1);
                break;
        }
        if (empty($result) || $result == false) {
            show_404();
        }
    }

    public function index()
    {
        $this->load->library('csvreader');
        $result            = $this->csvreader->parseFile('assets/contents/sample-data.csv');
        $data['customers'] = $result;
        // $data['uid']     = $uid;
        $this->load->view('index', $data);
        return true;
    }

    public function view($uid = '')
    {
        if ($uid != '' && $this->isUUID($uid)) {
            // echo "OKAY, DONE MEN!";
            $this->load->model('customer');
            $item = $this->customer->getCustomer($uid);
            if ($item == false) {
                return false;
            }
            $data['customer'] = $item;
            $data['customer_fullname'] = $item['First Name'] . ' ' . $item['Last Name'];
            $this->load->view('customer_view', $data);
            return true;
        }
        return false;
    }

    private function isUUID($param)
    {
        return preg_match('/^\{?[A-Za-z0-9]{8}-[A-Za-z0-9]{4}-[A-Za-z0-9]{4}-[A-Za-z0-9]{4}-[A-Za-z0-9]{12}\}?$/', $param);
    }
}
