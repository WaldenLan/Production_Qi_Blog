<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-24
 * Time: 下午10:13
 */
class Home extends CI_Controller
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

        $config['base_url'] = site_url('home');
        $data['nav_id'] = 0;
        $rows = $this->blog_model->get_blog_count();
        $page_size = 6;
        $config['total_rows'] = $rows;
        $config['per_page'] = $page_size;
        $config['attributes']['rel'] = FALSE;
        $config['uri_segment'] = 2;

//      First link setting of the pagination
        $config['first_url'] = site_url();

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
            $data['coding'] = $this->blog_model->get_blog($page, $page_size);
        }
        else
        {
            $data['coding'] = $this->blog_model->get_blog(0, $page_size);
        }

        $data['nav_topic_count'] = $this->blog_model->get_topic_count();

//        $this->output->enable_profiler(TRUE);     // Output the debug info
//        if (!file_exists(APPPATH . '/views/home/' . $page . '.php')) {
//            //We don't have a page for that!
//            show_404();
//        }
//        $data['title'] = ucfirst($page); // Capitalize the first letter

//        test for tag display
        $data['tags'] = $this->blog_model->get_tags();
//        test for tag display

        $comment_size = 5;
        $data['entry_comment'] = $this->blog_model->get_blog_comment(0, $comment_size);
        $this->load->view('home/overview', $data);
    }

}
