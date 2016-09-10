<?php

/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-9-3
 * Time: 下午10:56
 */
class Message extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');

        $data['nav_id'] = 5;
        $data['nav_title'] = 'message';
        $rows = $this->blog_model->get_blog_comment_count();
        $page_size = 8;
        $config['base_url'] = site_url('message');
        $config['total_rows'] = $rows;
        $config['per_page'] = $page_size;
        $config['attributes']['rel'] = FALSE;
        $config['uri_segment'] = 2;

//      Pagination style config
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['prev_tag_open'] = '<li><span aria-hidden="true">';
        $config['prev_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li><span aria-hidden="true">';
        $config['next_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

//      Pagination content config
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';

//      Pass the pagination config to the view
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $page = $this->uri->segment(2);     // return type : int (index starts from 0)
        if ($page)
        {
            $data['comment'] = $this->blog_model->get_blog_comment($page, $page_size);
        }
        else
        {
            $data['comment'] = $this->blog_model->get_blog_comment(0, $page_size);
        }

        $data['num_blog_comments'] = $rows;
        $comment_size = 5;
        $data['entry_comment'] = $this->blog_model->get_blog_comment(0, $comment_size);

//        test for tag display
        $data['tags'] = $this->blog_model->get_tags();
        $this->load->view('message/overview', $data);
    }

    public function comment()
    {
        $data['nav_title'] = 'message';

//      Rules for the form
        $this->form_validation->set_rules('nickname', 'Nickname', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'trim');
        $this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[10]|max_length[800]');

//      Actions corresponding to the rule validation
        if ($this->form_validation->run() == FALSE)
        {
            redirect($data['nav_title']);
        }
        else
        {
            $this->blog_model->set_blog_comment();
            redirect($data['nav_title']);
        }
    }

}