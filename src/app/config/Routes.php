<?php
require_once PATH_APP . '/core/routing/RoutesCollection.php';

RoutesCollection::any('/','HomeController','index');

RoutesCollection::any('/login','HomeController','login');

RoutesCollection::any('/admin','AdminHomeController','index',true);

RoutesCollection::any('/admin/dashboard','AdminHomeController','dashboard',true);

//=====================================================Manage Shipper - CRUD=====================================================//
//show manage shipper view
RoutesCollection::any('/admin/dashboard/manage-shipper','ManageShipperController','manage_shipper',true);

RoutesCollection::get('/admin/dashboard/manage-shipper/search','ManageShipperController','search',true);

RoutesCollection::get('/admin/dashboard/manage-shipper/read','ManageShipperController','read',true);

RoutesCollection::post('/admin/dashboard/manage-shipper/create','ManageShipperController','create',true);

RoutesCollection::post('/admin/dashboard/manage-shipper/update','ManageShipperController','update',true);

RoutesCollection::get('/admin/dashboard/manage-shipper/delete','ManageShipperController','delete',true);
//===============================================================================================================================//

//=====================================================Manage Provider - CRUD====================================================//
//show manage provider view
RoutesCollection::any('/admin/dashboard/manage-provider','ManageProviderController','manage_provider',true);

RoutesCollection::get('/admin/dashboard/manage-provider/read','ManageProviderController','read',true);

RoutesCollection::post('/admin/dashboard/manage-provider/create','ManageProviderController','create',true);

RoutesCollection::post('/admin/dashboard/manage-provider/update','ManageProviderController','update',true);

RoutesCollection::get('/admin/dashboard/manage-provider/delete','ManageProviderController','delete',true);
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
