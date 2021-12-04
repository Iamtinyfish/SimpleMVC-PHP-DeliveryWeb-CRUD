<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="../../public/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="wapper">
        <header>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light border-bottom bg-white">
                <div class="container d-flex">
                    <a class="navbar-brand" href="index.php">
                        <div class="logo-container text-warning"><img src="../../public/img/logo.png" class="img-fluid" alt="logo">TINYFISH</div>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse flex-grow-0" id="navbar">
                        <ul class="nav fs-5">
                            <li class="nav-item"><a class="nav-link text-dark" href="index.php">Trang chủ</a></li>
                            <li class="nav-item"><a class="nav-link text-dark" href="order.html">Đặt giao hàng</a></li>
                            <li class="nav-item"><a class="nav-link text-dark" href="contact.html">Liên hệ</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active text-white rounded-pill bg-warning" href="" id="navbarAccountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tài khoản
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarAccountDropdown">
                                    <li><a class="dropdown-item" href="./login.php">Đăng nhập</a></li>
                                    <li><a class="dropdown-item" href="register.html">Đăng ký</a></li>
                                    <li><a class="dropdown-item visually-hidden" href="account.html">Tài khoản của tôi</a></li>
                                    <li><a class="dropdown-item visually-hidden" href="#">Đơn hàng của tôi</a></li>
                                    <li><a class="dropdown-item visually-hidden" href="#logout">Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <section class="login-section d-flex justify-content-center align-items-center text-center">
                <form action="#" method="post" style="width:350px">
                    <div class="mx-auto mb-1" style="width:40%">
                        <img src="../../public/img/logo.png" class="img-fluid" alt="">
                    </div>
                    <h1 class="mb-4">Đăng nhập</h1>
                    <div class="input-group my-3">
                        <span class="input-group-text bg-white text-warning"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Tên tài khoản" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text bg-white text-warning"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Mật khẩu" required>
                        <span class="input-group-text bg-white "><i class="fas fa-eye text-warning"></i></span>
                    </div>
                    <button class="btn btn-warning text-white text-uppercase my-3" type="submit" style="width: 100%; ">
                        Đăng nhập
                    </button>
                    <a class="text-muted" href="#">Quên mật khẩu?</a><br>
                    <a class="text-muted" href="register.html">Bạn chưa có tài khoản?</a>
                </form>

            </section>
        </main>

    </div>

    <script src="../../public/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js "></script>
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