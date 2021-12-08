<?php
use JetBrains\PhpStorm\Pure;

require_once '../AbstractPage.php';
require_once PATH_APP . '/model/Shipper.php';
require_once PATH_APP . '/core/layout/Header.php';
require_once PATH_APP . '/core/layout/Sidebar.php';

/**
 * @property string $header
 * @property string $sidebar
 */
class ManageShipperPage extends AbstractPage {
    private string $shipper_list = 'Không tìm thấy thông tin shipper nào!';

    protected function loadHeader() : void
    {
        $header = new Header('admin','admin-dashboard',true);
        $this->header = $header->render();
    }

    protected function loadSidebar() : void
    {
        $sidebar = new Sidebar('admin','manage-shipper');
        $this->sidebar = $sidebar->render();
    }

    protected function loadData($data) : void
    {
        if (!empty($data)) {
            $shipper_list = [];
            foreach($data as $shipper) {
                array_push($shipper_list,$this->shipper_card($shipper));
            }
            $this->shipper_list = implode(' ',$shipper_list);
        }
    }

    protected function loadFooter() : void { }

    #[Pure] private function shipper_card(Shipper $shipper) : string
    {
        return "
            <div class='card' style='width: 18rem;'>
                <img src='../../../public/img/shipper-avatar.jpg' class='card-img-top' alt='shipper-avatar'>
                <div class='card-body'>
                    <h5 class='card-title'>{$shipper->getName()}</h5>
                    <p class='card-text'>
                        ID: {$shipper->getId()}<br>
                        Số điện thoại: {$shipper->getPhone()}<br>
                        Phương tiện: {$shipper->getVehicle()}<br>
                        Biển số: {$shipper->getLicensePlate()}
                    </p>
                    <a href='#' class='btn btn-info text-white'>
                        <i class='fas fa-info'></i> Chi tiết
                    </a>
                    <a href='#' class='btn btn-warning text-white'>
                        <i class='fas fa-user-edit'></i> Sửa
                    </a>
                    <a href='#' class='btn btn-danger'>
                        <i class='fas fa-trash'></i> Xóa
                    </a>
                </div>
            </div>
        ";
    }

    public function render() : void
    {
        echo "
            <!DOCTYPE html>
            <html lang='en'>

            <head>
                <meta charset='utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Admin Dashboard</title>
                <link rel='stylesheet' href='../../../public/node_modules/@fortawesome/fontawesome-free/css/all.css'>
                <link rel='stylesheet' href='../../../public/node_modules/bootstrap/dist/css/bootstrap.min.css'>
                <link href='../../../public/css/style.css' rel='stylesheet'>
            </head>

            <body>
                <!--    HEADER    -->
                $this->header
            
                <main style='margin-top:80px'>
                    <!--    SIDEBAR    -->
                    $this->sidebar
            
                    <!-- content -->
                    <section class='content px-3' style='margin-left:250px'>
                        <!-- toolbar -->
                        <div class='py-3 d-flex flex-row justify-content-between'>
                            <div>
                                <a href='' class='btn btn-primary add-btn'>
                                    <i class='fas fa-user-plus'></i> Thêm
                                </a>
            
                            </div>
                            
                            <form action='' method='get'>
                                <div class='input-group' style='width: 400px;'>
                                    <input type='text' class='form-control' placeholder='Search by name'>
                                    <div class='input-group-append'>
                                        <a href='' class='btn btn-primary' id='button-addon2'>Tìm kiếm</a>
                                    </div>
                                </div>
                            </form>
                        </div>
            
                        <div class='list d-flex flex-row flex-wrap'>
                            $this->shipper_list
                        </div>
                    </section>
            
                </main>
            
                <!-- bootstrap -->
                <script src='../../../public/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'></script>
                <!-- bootstrap -->
            </body>
            
            </html>
        ";
    }
}

