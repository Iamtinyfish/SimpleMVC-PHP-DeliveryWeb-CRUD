<?php
require_once 'AbstractPage.php';
require_once APP_PATH . '/core/layout/Header.php';

/**
 * @property string $header
 */
class LoginPage extends AbstractPage {
    private string $notify;

    protected function loadHeader() : void{
        $header = new Header('default','login',false);
        $this->header = $header->render();
    }

    protected function loadSidebar() : void { }

    protected function loadData($data) : void{
        $this->notify = (isset($data['login_fail'])) ?
            "<div class='text-danger fw-bold mt - 3'>* tài khoản hoặc mật khẩu không chính xác</div>" : "";
    }

    protected function loadFooter() : void { }

    public function render() : void{
//        echo 'http://' . $_SERVER['HTTP_HOST'] . '/';
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='../../public/node_modules/@fortawesome/fontawesome-free/css/all.css'>
                <link rel='stylesheet' href='../../public/node_modules/bootstrap/dist/css/bootstrap.min.css'>
                <link rel='stylesheet' href='../../public/css/style.css'>
                <title>Đăng nhập</title>
            </head>
            
            <body>
                <div class='wapper'>
                    <!--    HEADER    -->
                    $this->header
            
                    <main>
                        <section class='login-section d-flex justify-content-center align-items-center text-center'>
                            <form action='/login' method='post' style='width:350px'>
                                <div class='mx-auto mb-1' style='width:40%'>
                                    <img src='../../public/img/logo.png' class='img-fluid' alt=''>
                                </div>
                                <h1 class='mb-4'>Đăng nhập</h1>
                                <div class='input-group my-3'>
                                    <span class='input-group-text bg-white text-warning'><i class='fas fa-user'></i></span>
                                    <input name='username' type='text' class='form-control' placeholder='Tên tài khoản' required>
                                </div>
                                <div class='input-group'>
                                    <span class='input-group-text bg-white text-warning'><i class='fas fa-lock'></i></span>
                                    <input name='password' type='password' class='form-control' placeholder='Mật khẩu' required>
                                    <span class='input-group-text bg-white '><i class='fas fa-eye text-warning'></i></span>
                                </div>
                                $this->notify
                                <button class='btn btn-warning text-white text-uppercase my-3' type='submit' style='width: 100%; '>
                                    Đăng nhập
                                </button>
                                <a class='text-muted' href='#'>Quên mật khẩu?</a><br>
                                <a class='text-muted' href='register'>Bạn chưa có tài khoản?</a>
                            </form>
                        </section>
                    </main>
                </div>
            
                <script>
                    let eyeIcon = document.querySelector('.fa-eye');
                    eyeIcon.addEventListener('click', () => {
                        eyeIcon.classList.toggle('fa-eye-slash');
                        let inPwd = eyeIcon.parentElement.previousElementSibling;
                        (inPwd.type === 'password') ? inPwd.type = 'text': inPwd.type = 'password';
                    })
                </script>
            </body>
            
            </html>
        ";
    }
}