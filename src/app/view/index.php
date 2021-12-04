<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="../../public/css/index.css">
    <title>Trang chủ</title>
</head>

<body>
<div class="wapper">
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light border-bottom bg-white">
            <div class="container d-flex">
                <a class="navbar-brand d-inline-block" href="">
                    <div class="logo-container text-warning"><img src="../../public/img/logo.png" class="img-fluid" alt="logo">TINYFISH
                    </div>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar"
                        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-grow-0" id="navbar">
                    <ul class="nav fs-5">
                        <li class="nav-item"><a class="nav-link active text-white rounded-pill bg-warning"
                                                href="./index.php">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="order.html">Đặt giao hàng</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="contact.html">Liên hệ</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="" id="navbarAccountDropdown"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tài khoản
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarAccountDropdown">
                                <li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="register.html">Đăng ký</a></li>
                                <li><a class="dropdown-item visually-hidden" href="account.html">Thông tin tài
                                    khoản</a></li>
                                <li><a class="dropdown-item visually-hidden" href="#">Đơn hàng của tôi</a></li>
                                <li><a class="dropdown-item visually-hidden" href="#logout">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="text-center">
        <section class="banner">
            <div>
                <img src="../../public/img/banner.jpg" class="img-fluid" alt="">
            </div>
        </section>

        <section class="header-promo py-5 bg-white">
            <h1 class="pb-4">Giao hàng TinyFish<br>Siêu tốc - Siêu tiết kiệm</h1>
            <div class="container d-flex flex-wrap align-items-center">
                <div class="section-img slideAnim">
                    <img src="../../public/img/logo.png" class="img-fluid" alt="">
                </div>
                <div class="section-content d-flex justify-content-center">
                    <form action="" method="post" class="quick-order-form shadow rounded bg-white p-4 fs-2">

                        <label for="sender">Địa chỉ lấy hàng</label>
                        <div class="my-2" id="sender">
                            <input type="text" class="form-control" id="sender__name" placeholder="Họ tên">
                            <input type="text" class="form-control my-1" id="sender__address" placeholder="Địa chỉ">
                            <input type="text" class="form-control" id="sender__phone" placeholder="Số điện thoại">
                        </div>

                        <label for="receiver">Địa chỉ giao hàng</label>
                        <div class="my-2" id="receiver">
                            <input type="text" class="form-control" id="receiver__name" placeholder="Họ tên">
                            <input type="text" class="form-control my-1" id="receiver__address" placeholder="Địa chỉ">
                            <input type="text" class="form-control" id="receiver__phone" placeholder="Số điện thoại">
                        </div>

                        <div class="vehicle-options text-center mb-2">
                            <input type="radio" class="btn-check mr-1" name="vehicle-options" id="motobike"
                                   autocomplete="off" checked>
                            <label class="btn btn-sm btn-outline-secondary" for="motobike">Xe máy</label>

                            <input type="radio" class="btn-check" name="vehicle-options" id="truck" autocomplete="off">
                            <label class="btn btn-sm btn-outline-secondary" for="truck">Xe tải</label>
                        </div>

                        <button class="btn btn-warning text-white text-uppercase container" type="submit">Đặt giao
                            ngay
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <section class="about bg-warning py-5">
            <h1>Về chúng tôi</h1>
            <div class="container d-flex flex-wrap align-items-center">
                <div class="section-content text-start">
                    <h2 class="py-3 ms-5">Tiny Fish .Co .Ltd</h2>
                    <p class="ms-5">
                        Tiny Fish là một trong những doanh nghiệp hàng đầu về cung cấp dịch vụ vận chuyển cơ bản tại
                        Việt Nam. Chúng tôi có thể đáp ứng tất cả nhu cầu vận chuyển nội địa của bạn.
                    </p>
                </div>
                <div class="section-img slideAnim">
                    <img src="../../public/img/about.png" class="img-fluid" alt="">
                </div>
            </div>
        </section>

        <section class="service bg-white text-center py-5">
            <div class="container">
                <h1 class="pb-4">Tại sao bạn nên chọn Tiny Fish?</h1>
                <div class="service-container d-flex justify-content-evenly slideAnim">
                    <div class="service-item mb-4 bg-white shadow p-3">
                        <i class="fas fa-wallet fs-1 text-warning"></i>
                        <br>
                        <h4 class="py-2">Tiết kiệm</h4>
                        Hệ thống tự động tối ưu hoá tuyến đường giúp khách hàng tiết kiệm chi phí hiệu quả
                    </div>
                    <div class="service-item mb-4 bg-white shadow p-3">
                        <i class="fas fa-rocket fs-1 text-warning"></i>
                        <!-- <i class="fas fa-shipping-fast"></i> -->
                        <br>
                        <h4 class="py-2">Nhanh chóng</h4>
                        Dịch vụ giao hàng linh hoạt: giao hàng hẹn giờ, giao hàng siêu tốc
                    </div>
                    <div class="service-item mb-4 bg-white shadow p-3">
                        <i class="fas fa-thumbs-up fs-1 text-warning"></i>
                        <br>
                        <h4 class="py-2">Đảm bảo</h4>
                        Với đội ngũ tài xế chuyên biệt và hệ thống quản lý linh hoạt, TinyFish sẽ đảm bảo đơn hàng được
                        giao nhận như ý
                    </div>
                </div>
            </div>
        </section>

        <section class="feedback bg-warning py-5">
            <h1 class="pb-4">Phản hồi của khách hàng</h1>
            <div class="container d-flex flex-wrap align-items-center">
                <div class="section-img slideAnim">
                    <img src="../../public/img/feedback.png" class="img-fluid" alt="">
                </div>
                <div class="section-content">
                    <div id="feedback-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#feedback-carousel" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#feedback-carousel" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#feedback-carousel" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="py-5 d-block">
                                    <h5>Nguyễn Trọng Hiếu</h5>
                                    <p>Giao hàng nhanh, nhân viên thân thiện.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="py-5 d-block">
                                    <h5>Nguyễn Trọng Khánh</h5>
                                    <p>Nhân viên chu đáo, cẩn thận. Sẽ tiếp tục ủng hộ.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="py-5 d-block">
                                    <h5>Phan Đức Đạo</h5>
                                    <p>Nhân viên hỗ trợ tận tình. Sẽ tiếp tục ủng hộ.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#feedback-carousel"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#feedback-carousel"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer text-white">
        <section class="footer__top bg-dark pt-5 d-flex flex-column align-items-center">
            <h1 class="pb-3 text-uppercase">Tiny Fish .Co .Ltd</h1>
            <div class="contact">
                <i class="fas fa-map-marker-alt"></i> Minh Tân - Kiến Thuỵ - Hải Phòng <br>
                <i class="fas fa-envelope"></i> contact@tinyfish.com <br>
                <i class="fas fa-phone-alt"></i> 19001570 <br>
            </div>
            <div class="social fs-1 py-3">
                <a href="https://www.facebook.com/Iamtinyfish"><i class="fab fa-facebook text-white"></i></a>
                <a href="#"><i class="fab fa-twitter text-white"></i></a>
                <a href="#"><i class="fab fa-google text-white"></i></a>
                <a href="#"><i class="fab fa-instagram text-white"></i></a>
            </div>
        </section>
        <section class="footer__bottom bg-black p-2">
            Copyright &copy Nguyễn Trọng Hiếu 2021 | Email: hieunt.ptit.hp@gmail.com
        </section>
    </footer>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const elementList = document.querySelectorAll(".slideAnim");
    window.addEventListener("scroll", function () {
        for (let element of elementList) {
            if (element.offsetTop < (window.pageYOffset + 600)) {
                element.classList.add("slide");
            }
        }
    });
</script>
</body>

</html>