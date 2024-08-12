<?php
include_once 'page.php';

class Users extends page
{
    public function __construct()
    {
        // $this->capability = 'manage_options';
        $this->page_title = 'صفحه مدیریت کاربران';
        $this->menu_title = 'مدیریت کاربران';
        $this->menu_slug = 'oop_users';
        parent::__construct();
    }

    public function index()
    {
        // echo '<h1> hello Users oop plugin </h1>';

        if (isset($_POST['save-data'])) {
            $this->saveData($_POST);
        }
        include OOP_DIR . 'views/users.php';
    }

    private function saveData($data)
    {
        var_dump($data);
    }

}