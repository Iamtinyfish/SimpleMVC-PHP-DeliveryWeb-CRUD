<?php
require_once PATH_APP . '/core/routing/RoutesCollection.php';

RoutesCollection::any('/','HomeController','index');

RoutesCollection::post('/login','HomeController','login');

RoutesCollection::any('/admin','AdminHomeController','index',true);

RoutesCollection::any('/admin/dashboard','AdminHomeController','dashboard',true);

//=====================================================Manage Shipper - CRUD=====================================================//
//show manage shipper view
RoutesCollection::any('/admin/dashboard/manage-shipper','ManageShipperController','manage-shipper');

RoutesCollection::get('/admin/dashboard/manage-shipper/read','ManageShipperController','read');

RoutesCollection::post('/admin/dashboard/manage-shipper/create','ManageShipperController','create');

RoutesCollection::post('/admin/dashboard/manage-shipper/update','ManageShipperController','update');

RoutesCollection::get('/admin/dashboard/manage-shipper/delete','ManageShipperController','delete');
//===============================================================================================================================//

//=====================================================Manage Provider - CRUD====================================================//
//show manage provider view
RoutesCollection::any('/admin/dashboard/manage-provider','ManageProviderController','manage-provider');

RoutesCollection::get('/admin/dashboard/manage-provider/read','ManageProviderController','read');

RoutesCollection::post('/admin/dashboard/manage-provider/create','ManageProviderController','create');

RoutesCollection::post('/admin/dashboard/manage-provider/update','ManageProviderController','update');

RoutesCollection::get('/admin/dashboard/manage-provider/delete','ManageProviderController','delete');
//===============================================================================================================================//

//======================================================Manage Order - CRUD======================================================//
//show manage order view
RoutesCollection::any('/admin/dashboard/manage-order','ManageOrderController','manage-order');

RoutesCollection::get('/admin/dashboard/manage-order/read','ManageOrderController','read');

RoutesCollection::post('/admin/dashboard/manage-order/create','ManageOrderController','create');

RoutesCollection::post('/admin/dashboard/manage-order/update','ManageOrderController','update');

RoutesCollection::get('/admin/dashboard/manage-order/delete','ManageOrderController','delete');
//===============================================================================================================================//

RoutesCollection::any('/contact','HomeController','contact');

RoutesCollection::any('/logout','HomeController','logout');
