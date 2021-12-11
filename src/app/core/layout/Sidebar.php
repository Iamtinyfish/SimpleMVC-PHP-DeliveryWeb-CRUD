<?php
class Sidebar {
    private array $menu = [];

    public function __construct($menu_type,$current_page)
    {
        $this->set_menu_type($menu_type,$current_page);
    }

    private function set_menu_type($menu_type, $current_page) : void
    {
        switch ($menu_type) {
            case 'admin':
                $this->set_admin_menu($current_page);
                break;
            case 'provider':
                $this->set_provider_menu($current_page);
                break;
            case 'shipper':
                $this->set_shipper_menu($current_page);
                break;
        }
    }

    private function set_admin_menu($current_page) : void
    {
        array_push($this->menu,$this->sidebar_item('Quản lý shipper','admin/manage-shipper',
            'fas fa-users',$current_page === 'manage-shipper'));
        array_push($this->menu,$this->sidebar_item('Quản lý nhà cung cấp','admin/manage-provider',
            'fas fa-users',$current_page === 'manage-provider'));
        array_push($this->menu,$this->sidebar_item('Quản lý đơn giao hàng','admin/manage-order',
            'fas fa-file-invoice',$current_page === 'manage-order'));
        array_push($this->menu,$this->sidebar_item('Hòm thư liên hệ','admin/manage-contact',
            'fas fa-envelope',$current_page === 'manage-contact'));
    }

    private function set_provider_menu($current_page) : void
    {

    }

    private function set_shipper_menu($current_page) : void
    {

    }

    private function sidebar_item($name,$link,$icon_class,$active): string
    {
        $link = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $link;
        $active_class = ($active) ? 'bg-warning active' : 'text-dark';

        return "
            <li class='nav-item'>
                <a href='$link'
                    class='nav-link $active_class'>
                    <i class='$icon_class'></i> $name
                </a>
            </li>
        ";
    }

    public function render(): string
    {
        $menu = implode(' ',$this->menu);

        return "
            <section class='sidebar d-flex flex-column p-3 border shadow position-fixed' style='width:250px;height:100%;'>
                <a href='/' class='d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none text-warning text-center'>
                    <span class='fs-5'>MENU</span>
                </a>
                <hr>
                <ul class='nav nav-pills flex-column mb-auto'>
                    $menu
                </ul>
            </section>
        ";
    }
}



