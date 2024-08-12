<?php
include_once 'page.php';
class Foods extends page {
    public function __construct()
    {
        // $this->capability = 'manage_options';
        $this->page_title = 'صفحه مدیریت غذاها';
        $this->menu_title = 'مدیریت غذاها';
        $this->menu_slug = 'oop_foods';
        parent::__construct();
    }

    public function index()
    {
        echo '<h1> غذاها </h1>';
    }
}
