<?php

class Template {

    // protected $_CI;

    // public function __construct() {
    //     $this->_CI = &get_instance();
    // }

    public function render($template, $data = null) {

        $data['_content'] = view($template, $data, true);
        $data['_navbar'] = view('template/admin/navbar', $data, true);
        $data['_sidebar'] = view('template/admin/sidebar', $data, true);
        $data['_footer'] = view('template/admin/footer', $data, true);
        
        return view('template/admin/main', $data);
    }

}


