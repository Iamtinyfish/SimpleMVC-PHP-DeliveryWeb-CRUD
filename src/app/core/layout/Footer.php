<?php
class Footer {
    public function render(): string
    {
        return "
            <footer class='footer text-white'>
                <section class='footer__top bg-dark pt-5 d-flex flex-column align-items-center'>
                    <h1 class='pb-3 text-uppercase'>Tiny Fish .Co .Ltd</h1>
                    <div class='contact'>
                        <i class='fas fa-map-marker-alt'></i> Minh Tân - Kiến Thuỵ - Hải Phòng <br>
                        <i class='fas fa-envelope'></i> contact@tinyfish.com <br>
                        <i class='fas fa-phone-alt'></i> 19001570 <br>
                    </div>
                    <div class='social fs-1 py-3'>
                        <a href='https://www.facebook.com/Iamtinyfish'><i class='fab fa-facebook text-white'></i></a>
                        <a href='#'><i class='fab fa-twitter text-white'></i></a>
                        <a href='#'><i class='fab fa-google text-white'></i></a>
                        <a href='#'><i class='fab fa-instagram text-white'></i></a>
                    </div>
                </section>
                <section class='footer__bottom bg-black p-2'>
                    Copyright &copy Nguyễn Trọng Hiếu 2021 | Email: hieunt.ptit.hp@gmail.com
                </section>
            </footer>
        ";
    }
}

