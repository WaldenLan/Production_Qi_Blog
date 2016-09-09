<?php

/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-30
 * Time: 下午7:42
 */
class Blog_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_entry($id = FALSE)
    {
        if ($id == FALSE)
        {
            $query = $this->db->get('blog_entry');
            return $query->result();
        }
        $query = $this->db->get_where('blog_entry', array('id' => $id));
        return $query->row_array();
//        array('topic' => $topic)
    }

    public function set_entry()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('topic'), 'dash', TRUE);
        $content = $this->input->post('content');

        $data = array(
            'topic' => $slug,
            'tag' => $this->input->post('tag'),
            'title' => $this->input->post('title'),
            'content' => $content,
        );

        return $this->db->insert('blog_entry', $data);
    }

    public function get_blog_count($topic = FALSE)
    {
        if ($topic == FALSE)
        {
            $query = 'SELECT * FROM blog_entry';
            $result = $this->db->query($query);
            return $result->num_rows();
        }

        $nav_title = '\''.$topic.'\'';
        $query = 'SELECT * FROM blog_entry WHERE topic = '.$nav_title;
        $result = $this->db->query($query);
        return $result->num_rows();
    }

    public function get_blog($start, $num, $topic = FALSE)
    {
        if ($topic == FALSE)
        {
            $query = 'SELECT * FROM blog_entry ORDER BY time DESC, id limit '.$start.', '.$num;
            $entry = $this->db->query($query);
            return $entry->result();
        }

        $nav_title = '\''.$topic.'\'';
        $query = 'SELECT * FROM blog_entry WHERE topic = '.$nav_title.' ORDER BY time DESC, id limit '.$start.', '.$num;
//      Question for the above query statement: what is the id specify in the above statement? When I set the constraint of 'topic',
//      Why it still output the correct result??? 这个id是查询索引？？？

        $entry = $this->db->query($query);
        return $entry->result();
    }

    public function get_blog_comment_count()
    {
        $query = 'SELECT * FROM blog_comments';
        $result = $this->db->query($query);
        return $result->num_rows();
    }

    public function set_blog_comment()
    {
        $data = array(
            'nickname' => $this->input->post('nickname'),
            'email' => $this->input->post('email'),
            'content' => $this->input->post('content')
        );

        return $this->db->insert('blog_comments', $data);
    }

    public function get_blog_comment($start, $num)
    {
        $query = 'SELECT * FROM blog_comments ORDER BY time DESC, id limit '.$start.', '.$num;
//      Question for the above query statement: what is the id specify in the above statement? When I set the constraint of 'topic',
//      Why it still output the correct result??? 这个id是查询索引？？？

        $entry = $this->db->query($query);
        return $entry->result();
    }

    public function update_view($id, $view)
    {
        $count = $view + 1;
        $data = array (
            'view' => $count
        );
        $this->db->where('id', $id);
        return $this->db->update('blog_entry', $data);
    }

    public function set_comment($id)
    {
        $data = array(
            'nickname' => $this->input->post('nickname'),
            'email' => $this->input->post('email'),
            'content' => $this->input->post('content'),
            'entry_id'  =>  $id
        );

        return $this->db->insert('entry_comments', $data);
    }

    public function get_comment($id)
    {
        $query = 'SELECT * FROM entry_comments WHERE entry_id = '.$id.' ORDER BY time DESC';
        $comment = $this->db->query($query);
        return $comment->result();
    }

    public function count_comment($id)
    {
        $query = 'SELECT * FROM entry_comments WHERE entry_id = '.$id;
        $count = $this->db->query($query);
        return $count->num_rows();
    }

    public function insert_comment_count($id)
    {
        $data = array(
            'num_comment' => $this->count_comment($id)
        );
        $this->db->where('id', $id);
        $this->db->update('blog_entry', $data);
    }

    public function get_topic_count($nav_title = FALSE)
    {
        if ($nav_title == FALSE)
        {
            $query = 'SELECT * FROM blog_entry';
            $count = $this->db->query($query);
            return $count->num_rows();
        }

        $title = '\''.$nav_title.'\'' ;
        $query = 'SELECT * FROM blog_entry WHERE topic = '.$title;
        $count = $this->db->query($query);
        return $count->num_rows();
    }

    public function update_favor($id)
    {
        $tmp = $this->get_entry($id);
        $favor = $tmp['favor'] + 1;
        $data = array(
            'favor' => $favor
        );
        $this->db->where('id', $id);
        $this->db->update('blog_entry', $data);
    }

    public function get_tags()
    {
        $query = 'SELECT DISTINCT tag FROM blog_entry';
        $result = $this->db->query($query);
        return $result->result();
    }

}