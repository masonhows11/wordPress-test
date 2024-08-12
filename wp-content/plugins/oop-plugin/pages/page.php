<?php
abstract class page{
    protected $page_title;
    protected $menu_title;
    protected $capability;
    protected $menu_slug;
    protected $callback;

    public function __construct()
    {
        $this->capability = 'manage_options';
        add_action('admin_menu',[$this,'add_page']);
    }

    public function add_page()
    {
        add_menu_page(
            $this->page_title,
            $this->menu_title,
            $this->capability,
            $this->menu_slug,
            [$this,'index']
        );
    }
    abstract public function index();

}