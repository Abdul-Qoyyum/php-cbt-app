<?php

class HomeController extends Controller
{
    public function index($name = '')
    {
        
        $this->view('home/index');

    }

    public function blog()
    {
        $this->view('home/blog');
    }

    public function view_blog_post($id = '')
    {
        if($id != ''){
            $sel = Blog::find($id)->first();
            if(!$sel){
                Redirect::to('/home/blog');
            }
        }else{
            Redirect::to('/home/blog');
        }
        $this->view('home/view-blog-post', ['id' => $id]);
    }
}