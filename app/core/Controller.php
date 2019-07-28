<?php
    class Controller
    {
        
        public function model($model)
        {
            require_once 'app/models/' . $model . '.php';
            return new $model();
        }

        public function view($view, $data = [])
        {
            $domain = Config::get('default/domain');
            $assets = "$domain/public";
            if(file_exists('app/views/' . $view . '.php')){
                require_once 'app/views/' . $view . '.php';
            }else{
                Redirect::to(404);
            }
        }

        public function inputError($field)
        {
            $output = '  <span class="text-danger" style="font-size: 12px;">';

            if(Input::errors($field)){
                foreach (Input::errors($field) as $error) {
                    $error = ucfirst(str_replace('_', ' ', $error));
                $output .= $error.' ';
                }

            $output .= '</span>';
            //unset(Session::get('inputs-errors')[$field]);
            return $output;

            }
            return false;
        }

        public function guardian_id()
        {
            if(Session::exists(Config::get('session/guardian'))){
                return Session::get(Config::get('session/guardian'));
            }else{
                return false;
            }
        }

        public function student_id()
        {
            if(Session::exists(Config::get('session/student'))){
                return Session::get(Config::get('session/student'));
            }else{
                return false;
            }
        }

        public function admin_id()
        {
            if(Session::exists(Config::get('session/admin'))){
                return Session::get(Config::get('session/admin'));
            }else{
                return false;
            }
        }

        public function notifications($type = 'success', $message){
            if($type == 'success'){
                return '<div style="position: absolute; top: 0; left: 0; right: 0; width: 400px; margin: auto;"class="text-center alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-check"></i>  <strong>' . $message . '!</strong>
                </div>';
            }
            return '<div style="position: absolute; top: 0; left: 0; right: 0; width: 400px; margin: auto;"class="text-center alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="fa fa-times"></i>  <strong>' . $message . '!</strong>
            </div>';
        }

        public function pagination_links($data, $per_page)
        {
            $no_of_pages =ceil( (count($data))/ $per_page );
            //return $no_of_pages; die();

            $link = '';
            $current_page = (isset($_GET['page']))?  $_GET['page'] : 1 ;

            $page_prev = ($current_page == 1 || (!isset($current_page)))? 1 :( $current_page -1) ;
            $page_next = ($current_page == $no_of_pages )? $no_of_pages :( $current_page + 1) ;


            $prev_page = "<a href='?page=$page_prev#focus' class='prev page-numbers'><i class='lnr lnr-chevron-left'></i></a>";
            $next_page = "<a href='?page=$page_next#focus' class='next page-numbers'><i class='lnr lnr-chevron-right'></i></a>";
            //$prev_page = "<li class='page-item'><a class='page-link' href='?page=$page_prev'>Prev</a></li>";
            //$next_page = "<li class='page-item'><a class='page-link' href='?page=$page_next'>Next</a></li>";


            for ($i=1; $i <= $no_of_pages; $i++) { 

                if($current_page == $i){ 
                    $active = 'current';
                }elseif (!isset($current_page) && ($i == 1)) { 
                    $active = 'current';
                }else{ 
                    $active = '';
                }

                $link .= "<a href='?page=$i#focus' class='page-numbers $active'>$i</a>";
                //$link .= "<li class='page-item $active'><a class='page-link' href='?page=$i'>$i</a></li>";


            }

            $link = $prev_page.$link.$next_page;
            return  $link;

        }

        public function student()
        {
            if(Session::exists(Config::get('session/student'))){
                return Student::find(Session::get(Config::get('session/student')));
            }
        }

        public function guardian()
        {
            if(Session::exists(Config::get('session/guardian'))){
                return Guardian::find(Session::get(Config::get('session/guardian')));
            }
        }

        public function admin()
        {
            if(Session::exists(Config::get('session/admin'))){
                return Admin::find(Session::get(Config::get('session/admin')));
            }
        }

        public function domain()
        {
            return Config::get('default/domain');
        }

        public function currency()
        {
            return Config::get('default/currency');
        }

        public function profile()
        {
            return Config::get('default/profile_image');
        }

        public function password()
        {
            return Config::get('default/password');
        }

        public function middleware($middleware)
        {
			require_once 'app/middlewares/' . $middleware . '.php';
			return new $middleware;
		}
    
    }