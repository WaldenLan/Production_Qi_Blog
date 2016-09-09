<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-30
 * Time: 下午4:10
 */
class About extends CI_Controller
{

    public function index()
    {
        $this->load->model('blog_model');
        $data['nav_id'] = 4;

//        test for tag display
        $data['tags'] = $this->blog_model->get_tags();
//        test for tag display

        $comment_size = 5;
        $data['entry_comment'] = $this->blog_model->get_blog_comment(0, $comment_size);
        $this->load->view('about/overview', $data);
    }

}