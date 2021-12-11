<?php

require_once 'AbstractPage.php';
require_once APP_PATH . '/core/layout/Header.php';
require_once APP_PATH . '/core/layout/Footer.php';

/**
 * @property string $header
 * @property string $footer
 */
class Error404Page extends AbstractPage
{

    protected function loadHeader(): void
    {
        if (isset($_SESSION['role'])) {
            $menu_type = $_SESSION['role'];
            $login = true;
        } else {
            $menu_type = 'default';
            $login = false;
        }

        $header = new Header($menu_type,'',$login);
        $this->header = $header->render();
    }

    protected function loadSidebar(): void { }

    protected function loadData($data): void { }

    protected function loadFooter(): void
    {
        $this->footer = (new Footer())->render();
    }

    public function render(): void
    {
        echo "
            <!DOCTYPE html>
            <html lang='en'>
            
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='../../public/node_modules/bootstrap/dist/css/bootstrap.min.css'>
                <link rel='stylesheet' href='../../public/node_modules/@fortawesome/fontawesome-free/css/all.css'>
                <link rel='stylesheet' href='../../public/css/style.css'>
                <title>404</title>
            </head>
            
            <body>
                <div class='wapper'>
                    <!--    HEADER    -->
                    $this->header
                    
                    <main>
                        <div class='page-title' style='margin-top:200px;margin-bottom:200px'>
                            <h1 class='text-center'>Oops! Lỗi 404: Không tìm thấy tài nguyên :(</h1>
                        </div>
                    </main>
            
                    <!--    FOOTER    -->
                    $this->footer
                </div>
            </body>
            
            </html>
        ";
    }
}