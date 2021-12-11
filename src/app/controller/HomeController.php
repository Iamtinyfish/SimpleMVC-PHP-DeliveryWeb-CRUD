<?php
require_once 'ControllerBase.php';

class HomeController extends ControllerBase {
    public function index() {
        require_once APP_PATH . '/view/Homepage.php';
        $view = new Homepage();
        $view->render();
    }

    public function error404() {
        require_once APP_PATH . '/view/Error404Page.php';
        $view = new Error404Page();
        $view->render();
    }

    public function login() {
        //Nếu đăng nhập rồi
        $this->authentication();

        //Nếu không phải submit form thì load trang login
        if (isset($_POST['username']) === false) {
            require_once APP_PATH . '/view/LoginPage.php';
            $data = [];
            if (isset($_SESSION['login_fail'])) {
                $data = array('login_fail' => true);
                unset($_SESSION['login_fail']);
            }
            $view = new LoginPage($data);
            $view->render();
        }

        else {  //Ngược lại thì check login
            $username = $_POST['username'];
            $password = $_POST['password'];

            //lấy thông tin tài khoản từ database
            require_once APP_PATH . '/controller/dao/AccountDAO.php';
            require_once APP_PATH . '/model/Account.php';
            $accountDAO = new AccountDAO();
            $account = $accountDAO->get($username);

            //Nếu không tìm thấy tên tài khoản
            if ($account === false) {
                $_SESSION['login_fail'] = true; //báo về trang login
                header('Location:login'); //redirect về trang login
            }

            //hash mật khẩu: pass + salt + pepper
            $pepper = 'tinyfish';
            $hashPwd = md5($password . $account->salt . $pepper);

            //So sánh kết quả vừa hash với hash lưu trong database
            if ($account->password === $hashPwd) {
                //Đăng nhập thành công
                unset($_SESSION['login_fail']);
                $_SESSION['id'] = $account->id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $account->role;

                //Chuyển đến trang chủ
                header('Location: http://' . $_SERVER['HTTP_HOST']);
            } else
                //Sai mật khẩu -> đăng nhập thất bại
                $_SESSION['login_fail'] = true;         //báo về trang login
                header('Location:login');        //redirect về trang login
        }
    }

    public function logout() {
        session_destroy();
        //redirect về trang chủ
        header('Location: http://' . $_SERVER['HTTP_HOST']);
    }

    public function contact() {
        if (isset($_POST['name']) === false) {//Nếu không phải submit form thì load trang contact
            require_once APP_PATH . '/view/ContactPage.php';
            $view = new ContactPage();
            $view->render();
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $title = $_POST['title'];
            $content = $_POST['content'];

            //TODO build submit contact
        }
    }
}
