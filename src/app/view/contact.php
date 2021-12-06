<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Liên hệ</title>
</head>

<body>
    <div class="wapper">
        <!--    HEADER    -->
        <?php
        require_once PATH_APP . '/core/layout/header.php';
        getHeader('contact');
        ?>
        <!--    HEADER    -->

        <main>
            <div class="page-title">
                <h1 class="text-center">Liên hệ</h1>
            </div>
            <section class="container pb-5">

                <form class="mx-auto" action="<?php echo '/contact'; ?>" method="post" style="max-width:600px;">
                    <div class="mb-3">
                        <label for="name-input" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="name-input" required>
                    </div>
                    <div class="mb-3">
                        <label for="email-input" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email-input" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject-input" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="subject-input">
                    </div>
                    <div class="mb-3">
                        <label for="content-input" class="form-label">Nội dung</label>
                        <textarea class="form-control" id="content-input" rows="10" placeholder="Hãy mô tả vấn đề của bạn" required></textarea>
                    </div>
                    <button class="btn btn-warning text-white my-3 px-5" type="submit">Gửi</button>
                </form>

            </section>
        </main>

        <!--    FOOTER    -->
        <?php require_once PATH_APP . '/core/layout/footer.php'; ?>
        <!--    FOOTER    -->
    </div>

    <script src="../../public/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>