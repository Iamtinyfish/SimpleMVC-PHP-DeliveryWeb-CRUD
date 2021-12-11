<?php
require_once APP_PATH . '/core/routing/RoutesCollection.php';

RoutesCollection::any('/404','HomeController','error404');

RoutesCollection::any('/','HomeController','index');

RoutesCollection::any('/login','HomeController','login');

RoutesCollection::any('/admin','AdminHomeController','index',true);

RoutesCollection::any('/admin/dashboard','AdminHomeController','dashboard',true);

//=====================================================Manage Shipper - CRUD=====================================================//
//show manage shipper view
RoutesCollection::any('/admin/manage-shipper','ManageShipperController','manage_shipper',true);

RoutesCollection::get('/admin/manage-shipper/search','ManageShipperController','search',true);

RoutesCollection::get('/admin/manage-shipper/detail','ManageShipperController','detail',true);

RoutesCollection::post('/admin/manage-shipper/add','ManageShipperController','add',true);

RoutesCollection::post('/admin/manage-shipper/update','ManageShipperController','update',true);

RoutesCollection::get('/admin/manage-shipper/delete','ManageShipperController','delete',true);

RoutesCollection::get('/admin/manage-shipper/statistic','ManageShipperController','statistic',true);
//===============================================================================================================================//

//=====================================================Manage Provider - CRUD====================================================//
//show manage provider view
RoutesCollection::any('/admin/manage-provider','ManageProviderController','manage_provider',true);

RoutesCollection::get('/admin/manage-provider/search','ManageProviderController','search',true);

RoutesCollection::get('/admin/manage-provider/detail','ManageProviderController','detail',true);

RoutesCollection::post('/admin/manage-provider/add','ManageProviderController','add',true);

RoutesCollection::post('/admin/manage-provider/update','ManageProviderController','update',true);

RoutesCollection::get('/admin/manage-provider/delete','ManageProviderController','delete',true);

RoutesCollection::get('/admin/manage-provider/statistic','ManageProviderController','statistic',true);
//===============================================================================================================================//

//======================================================Manage Order - CRUD======================================================//
//show manage order view
RoutesCollection::any('/admin/dashboard/manage-order','ManageOrderController','manage_order',true);

RoutesCollection::get('/admin/dashboard/manage-order/read','ManageOrderController','read',true);

RoutesCollection::post('/admin/dashboard/manage-order/create','ManageOrderController','create',true);

RoutesCollection::post('/admin/dashboard/manage-order/update','ManageOrderController','update',true);

RoutesCollection::get('/admin/dashboard/manage-order/delete','ManageOrderController','delete',true);
//===============================================================================================================================//

RoutesCollection::any('/contact','HomeController','contact');

RoutesCollection::any('/logout','HomeController','logout');
