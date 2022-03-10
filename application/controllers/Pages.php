<?php
class Pages extends CI_Controller {

        public function __construct() {
                parent::__construct();
        
                $this->load->helper('url');

                $this->load->helper('tools');
                // Load session library
                $this->load->library('session');
        
        }

        public function view($page = 'home')
        {

                if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }
        
                $data['title'] = ucfirst($page); // Capitalize the first letter
                $data['body_class'] = $page . '-page';       

                $this->load->view('pages/'.$page, $data);


        }
}