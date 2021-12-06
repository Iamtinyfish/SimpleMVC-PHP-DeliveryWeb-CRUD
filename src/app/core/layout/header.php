<?php
function nav_item(string $name,string $link,bool $active) {
?>
    <li class="nav-item">
        <a class="nav-link
        <?php if ($active) echo 'text-white active rounded-pill bg-warning'; else echo 'text-dark'; ?>"
           href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/' . $link; ?>"><?php echo $name ?></a>
    </li>
<?php
}
?>

<?php
function getHeader($page) {
?>
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light border-bottom bg-white">
        <div class="container d-flex">
            <a class="navbar-brand" href="">
                <div class="logo-container text-warning">
                    <img src="../../../public/img/logo.png" class="img-fluid" alt="logo">TINYFISH
                </div>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbar">
                <ul class="nav fs-5">
                    <?php
                    nav_item('Trang chủ','',$page === 'homepage');
                    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') nav_item('Liên hệ','contact',$page === 'contact');
                    if (isset($_SESSION['username']) === false) {
                        nav_item('Đăng nhập','login',$page === 'login');
                        nav_item('Đăng ký','register',$page === 'register');
                    } else {
                        switch ($_SESSION['role']) {
                            case 'provider':
                                nav_item('Nhà cung cấp','provider',$page === 'provider');
                                break;
                            case 'shipper':
                                nav_item('Shipper','shipper',$page === 'shipper');
                                break;
                            case 'admin':
                                nav_item('Admin Dashboard','admin/dashboard',$page === 'admin-dashboard');
                                break;
                        }
                        nav_item('Tài khoản','account',$page === 'account');
                        nav_item('Đăng xuất','logout',false);
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php
}
?>