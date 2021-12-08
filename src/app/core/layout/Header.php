<?php
class Header {
    private array $menu = [];

    public function __construct($menu_type,$current_page,$login)
    {
        array_push($this->menu,$this->header_item('Trang chủ', '', $current_page === 'homepage'));
        array_push($this->menu,$this->header_item('Liên hệ','contact',$current_page === 'contact'));
        $this->set_menu_type($menu_type,$current_page,$login);
    }

    public function set_menu_type($menu_type,$current_page,$login) : void
    {
        switch ($menu_type) {
            case 'default':
                break;
            case 'admin':
                array_pop($this->menu);
                array_push($this->menu,$this->header_item('Admin Dashboard','admin/dashboard',$current_page === 'admin-dashboard'));
                break;
            case 'provider':
                array_push($this->menu,$this->header_item('Nhà cung cấp','provider',$current_page === 'provider'));
                break;
            case 'shipper':
                array_push($this->menu,$this->header_item('Shipper','shipper',$current_page === 'shipper'));
                break;
        }

        if ($login === false) {
            array_push($this->menu,$this->header_item('Đăng nhập','login',$current_page === 'login'));
            array_push($this->menu,$this->header_item('Đăng ký','register',$current_page === 'register'));
        } else {
            array_push($this->menu,$this->header_item('Tài khoản','account',$current_page === 'account'));
            array_push($this->menu,$this->header_item('Đăng xuất <i class="fas fa-sign-out-alt"></i>','logout',false));
        }
    }

    private function header_item(string $name,string $link,bool $active): string
    {
        $active_class = ($active) ? 'text-white active rounded-pill bg-warning' : 'text-dark';
        $link = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $link;
        return "
            <li class='nav-item'>
                <a class='nav-link $active_class' href='$link'>$name</a>
            </li>
        ";
    }

    public function render(): string
    {
        $menu = implode(' ',$this->menu);
        return "
            <header>
                <nav class='navbar fixed-top navbar-expand-lg navbar-light border-bottom bg-white'>
                    <div class='container d-flex'>
                        <a class='navbar-brand' href=''>
                            <div class='logo-container text-warning'>
                                <img src='../../../public/img/logo.png' class='img-fluid' alt='logo'>TINYFISH
                            </div>
                        </a>
                        <button type='button' class='navbar-toggler' data-bs-toggle='collapse' data-bs-target='#navbar' aria-controls='navbar' aria-expanded='false' aria-label='Toggle navigation'>
                            <span class='navbar-toggler-icon'></span>
                        </button>
                        <div class='collapse navbar-collapse flex-grow-0' id='navbar'>
                            <ul class='nav fs-5'>
                                $menu
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        ";
    }
}


