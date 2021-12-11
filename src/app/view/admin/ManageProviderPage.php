<?php
use JetBrains\PhpStorm\Pure;

require_once APP_PATH . '/view/AbstractPage.php';
require_once APP_PATH . '/model/Provider.php';
require_once APP_PATH . '/core/layout/Header.php';
require_once APP_PATH . '/core/layout/Sidebar.php';

/**
 * @property string $header
 * @property string $sidebar
 */
class ManageProviderPage extends AbstractPage {
    private string $provider_list = 'Không tìm thấy thông tin nhà cung cấp nào!';

    protected function loadHeader() : void
    {
        $header = new Header('admin','admin-dashboard',true);
        $this->header = $header->render();
    }

    protected function loadSidebar() : void
    {
        $sidebar = new Sidebar('admin','manage-provider');
        $this->sidebar = $sidebar->render();
    }

    protected function loadData($data = []) : void
    {
        if (!empty($data)) {
            $provider_list = [];
            foreach($data as $provider) {
                array_push($provider_list,$this->provider_card($provider));
            }
            $this->provider_list = implode(' ',$provider_list);
        }
    }

    protected function loadFooter() : void { }

    #[Pure] private function provider_card(Provider $provider) : string
    {
        return "
            <div id='$provider->id' class='card' style='width: 18rem;'>
                <img src='../../../public/img/provider-avatar.jpg' class='card-img-top' alt='provider-avatar'>
                <div class='card-body'>
                    <h5 class='card-title'>$provider->name</h5>
                    <p class='card-text'>
                        ID: $provider->id<br>
                        Số điện thoại: $provider->phone<br>
                        Email: $provider->email
                    </p>
                    <button value='$provider->id' class='btn btn-info text-white detailProviderBtn'>
                        <i class='fas fa-info'></i> Chi tiết
                    </button>
                    <button value='$provider->id' class='btn btn-warning text-white editProviderBtn'>
                        <i class='fas fa-user-edit'></i> Sửa
                    </button>
                    <button value='$provider->id' class='btn btn-danger deleteProviderBtn'>
                        <i class='fas fa-trash'></i> Xóa
                    </button>
                </div>
            </div>
        ";
    }

    public function render() : void
    {
        $search_link = 'http://' . $_SERVER['HTTP_HOST'] . '/admin/manage-provider/search';
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
                                <button type='button' class='btn btn-primary addProviderBtn'>
                                    <i class='fas fa-user-plus'></i> Thêm
                                </button>
                                <button type='button' class='btn btn-primary statisticBtn'>Thống kê</button>
                            </div>
                            
                            <form action='$search_link' method='get'>
                                <div class='input-group' style='width: 400px;'>
                                    <input name='keyword' type='text' class='form-control'>
                                    <div class='input-group-append'>
                                        <button type='submit'  class='btn btn-primary' id='button-addon2'>Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
            
                        <div class='list d-flex flex-row flex-wrap'>
                            $this->provider_list
                        </div>
                    </section>
                </main>
                
                <script src='../../../public/js/manageProvider.js'></script>
            </body>
            
            </html>
        ";
    }
}

