<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-30
 * Time: 下午7:29
 */
class Life extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = site_url('life');
        $data['nav_id'] = 3;
        $data['nav_title'] = 'life';
        $rows = $this->blog_model->get_blog_count($data['nav_title']);
        $page_size = 6;
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
            $data['coding'] = $this->blog_model->get_blog($page, $page_size, $data['nav_title']);
        }
        else
        {
            $data['coding'] = $this->blog_model->get_blog(0, $page_size, $data['nav_title']);
        }

        $data['nav_topic_count'] = $this->blog_model->get_topic_count($data['nav_title']);

//        test for tag display
        $comment_size = 5;
        $data['entry_comment'] = $this->blog_model->get_blog_comment(0, $comment_size);
        $data['tags'] = $this->blog_model->get_tags();
        $this->load->view('coding/overview', $data);
    }

    public function view($id)
    {
//        $data['topic'] = $topic;
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['nav_title'] = 'life';
        $data['nav_id'] = 3;
        $data['id'] = $id;
        $data['coding'] = $this->blog_model->get_entry($id);
        $data['comment'] = $this->blog_model->get_comment($id);

//        test for favor
        if ($this->input->is_ajax_request())
        {
            $this->blog_model->update_favor($id);
        }
//        test for favor

//        test for tag display
        $data['tags'] = $this->blog_model->get_tags();

        $comment_size = 5;
        $data['entry_comment'] = $this->blog_model->get_blog_comment(0, $comment_size);
        $this->blog_model->update_view($id, $data['coding']['view']);
        $this->load->view('check/check', $data);
    }

    public function comment($id)
    {
        $data['nav_title'] = 'life';

//      Rules for the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nickname', 'Nickname', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'trim');
        $this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[10]|max_length[500]');

//      Actions corresponding to the rule validation
        if ($this->form_validation->run() == FALSE)
        {
            redirect($data['nav_title'].'/view/'.$id);
        }
        else
        {
            $this->blog_model->set_comment($id);
            $this->blog_model->insert_comment_count($id);
            redirect($data['nav_title'].'/view/'.$id);
        }
    }

}