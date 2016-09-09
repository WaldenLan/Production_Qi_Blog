<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-30
 * Time: 下午11:58
 */
class Edit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Add Entry';
        $data['nav_title'] = 'Entry';
        $data['nav_id'] = 0;

//        test for tag display
        $comment_size = 5;
        $data['entry_comment'] = $this->blog_model->get_blog_comment(0, $comment_size);
        $data['tags'] = $this->blog_model->get_tags();
        $this->load->view('edit/add', $data);
    }

    public function create()
    {
        if ($this->blog_model->set_entry())
        {
            redirect('coding');
        }
    }

}