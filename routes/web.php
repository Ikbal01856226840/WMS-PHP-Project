<?php
$router = $this->router;

//DashbordController controller resources
$router->map('GET', '/', 'DashbordController@index');
$router->map('GET', '/dashboard', 'DashbordController@index');
$router->map('POST', '/dashboard/service/branch/pagination', 'DashbordController@pagination');
$router->map('GET', '/dashboard/service/branch/show', 'DashbordController@show');
$router->map('GET', '/user/rastio', 'DashbordController@user_ratio');
$router->map('GET', '/group_item/rastio', 'DashbordController@item_group');

//Auth login 
$router->map('GET', '/auth/login', 'Auth\AuthController@login');
$router->map('POST', '/auth/login_check', 'Auth\AuthController@loginAuth');
$router->map('GET', '/auth/service/branch/show', 'Auth\AuthController@show');
$router->map('GET', '/auth/logout', 'Auth\AuthController@logout');
$router->map('GET', '/auth/change/password', 'Auth\ChangePasswordController@ShowPasswordChange');
$router->map('POST', '/auth/change/password', 'Auth\ChangePasswordController@ChangePassword');

$router->map('POST', '/auth/update/profile', 'Auth\ProfileUpdateController@ChangePassword');

//user controller resources
$router->map('GET', '/user/create', 'UserController@create');
$router->map('GET', '/user/index', 'UserController@index');
$router->map('GET', '/user/dealer-index', 'UserController@dealer');
$router->map('POST', '/user/index', 'UserController@index');
$router->map('POST', '/user/save', 'UserController@store');
$router->map('POST', '/user/delete', 'UserController@delete');
$router->map('GET', '/user/access', 'UserController@user_access');


//StockGroup Controller
$router->map('GET', '/stockGroup/create', 'StockGroupController@create');
$router->map('GET', '/stockGroup/index', 'StockGroupController@index');
$router->map('POST', '/stockGroup/save', 'StockGroupController@store');
$router->map('POST', '/stockGroup/delete', 'StockGroupController@delete');
$router->map('GET', '/stockGroup/duplicate_sgc', 'StockGroupController@duplicate_sgc');

//ProductController
$router->map('GET', '/product/create', 'ProductController@create');
$router->map('GET', '/product/index', 'ProductController@index');
$router->map('POST', '/product/save', 'ProductController@store');
$router->map('POST', '/product/data', 'ProductController@data');
$router->map('POST', '/product/delete', 'ProductController@delete');
$router->map('GET', '/product/warranty/period_create', 'ProductController@warranty_period_create');
$router->map('POST', '/product/warranty/period_store', 'ProductController@warranty_period_store');
$router->map('GET', '/product/warranty/period', 'ProductController@warranty_period');
$router->map('POST', '/product/warranty/delete', 'ProductController@warranty_delete');
$router->map('GET', '/duplicate_product_name/check', 'ProductController@duplicate_product_name');
$router->map('GET', '/duplicate_product_id/check', 'ProductController@duplicate_product_id');
$router->map('GET', '/duplicate_batch_no/check', 'ProductController@duplicate_batch_no');

// PriceController

$router->map('GET', '/pricelist/create', 'PricelistController@create');
$router->map('POST', '/pricelist/save', 'PricelistController@store');
$router->map('GET', '/pricelist/index', 'PricelistController@index');
$router->map('POST', '/pricelist/delete', 'PricelistController@delete');

//DealerController
$router->map('GET', '/dealer/create', 'DealerController@create');
$router->map('GET', '/dealer/index', 'DealerController@index');
$router->map('POST', '/dealer/save', 'DealerController@store');
$router->map('GET', '/dealer/data', 'DealerController@data');
$router->map('POST', '/dealer/delete', 'DealerController@delete');
$router->map('GET', '/dealer/area/get', 'DealerController@areaShow');
$router->map('GET', '/dealer/name', 'DealerController@DealerNameShow');


//DealerTypeController
$router->map('GET', '/dealer/type/create', 'DealerController@type_create');
$router->map('GET', '/dealer/type/index', 'DealerController@type_index');
$router->map('POST', '/dealer/type/save', 'DealerController@type_store');
$router->map('POST', '/dealer/type/delete', 'DealerController@type_delete');
$router->map('POST', '/dealer/edit', 'DealerController@edit');
//BranchController
$router->map('GET', '/branch/create', 'BranchController@create');
$router->map('GET', '/branch/index', 'BranchController@index');
$router->map('POST', '/branch/save', 'BranchController@store');
$router->map('POST', '/branch/delete', 'BranchController@delete');
$router->map('GET', '/branch/name', 'BranchController@BranchNameShow');

//AreaController
$router->map('GET', '/area/create', 'AreaController@create');
$router->map('GET', '/area/index', 'AreaController@index');
$router->map('POST', '/area/save', 'AreaController@store');
$router->map('POST', '/area/delete', 'AreaController@delete');
$router->map('GET', '/area/name', 'AreaController@AreaNameShow');

//WarrantyCardController
$router->map('GET', '/warrantyCard/create', 'WarrantyCardController@create');
$router->map('POST', '/warrantyCard/save', 'WarrantyCardController@store');
$router->map('GET', '/warrantyCard/warrenty_card_search', 'WarrantyCardController@warrenty_card_search');
$router->map('POST', '/warrantyCard/warrenty_card_search', 'WarrantyCardController@warrenty_card_search');
$router->map('GET', '/warrantyCard/warrenty_search_date', 'WarrantyCardController@warrenty_search_date');
$router->map('POST', '/warrantyCard/warrenty_search_date', 'WarrantyCardController@warrenty_search_date');
$router->map('GET', '/warrantyCard/warrenty_search_dealer', 'WarrantyCardController@warrenty_search_dealer');
$router->map('POST', '/warrantyCard/warrenty_search_dealer', 'WarrantyCardController@warrenty_search_dealer');
$router->map('GET', '/warrantyCard/warrenty_search_dealer_name', 'WarrantyCardController@dealerShow');
$router->map('GET', '/warrantyCard/index', 'WarrantyCardController@index');
$router->map('GET', '/warrantyCard/edit/[i:id]', 'WarrantyCardController@edit');
$router->map('GET', '/warrantyCard/serial', 'WarrantyCardController@get_serial');
$router->map('POST', '/warrantyCard/delete', 'WarrantyCardController@delete');
$router->map('GET', '/warrantyCard/branch', 'WarrantyCardController@get_branch');
$router->map('GET', '/replacement/create', 'WarrantyCardController@replacement_create');
$router->map('GET', '/warrantyCard/replacement', 'WarrantyCardController@replacement_get_old_data');
$router->map('POST', '/warrantyCard/replacement/store', 'WarrantyCardController@replacement_store');
$router->map('GET', '/warrantyCard/replacement/index', 'WarrantyCardController@replacement_index');
$router->map('POST', '/warrantyCard/replacement/index', 'WarrantyCardController@replacement_index');
$router->map('GET', '/warrantyCard/replacement/edit/[i:id]', 'WarrantyCardController@replacement_edit');
$router->map('POST', '/warrantyCard/replacement/delete', 'WarrantyCardController@replacement_delete');
$router->map('GET', '/warrantyCard/replacement_search', 'WarrantyCardController@replacement_card_search');
$router->map('POST', '/warrantyCard/replacement_search', 'WarrantyCardController@replacement_card_search');
$router->map('GET', '/duplicate_serial_id/check', 'WarrantyCardController@duplicate_serial_id');
$router->map('GET', '/replacement/duplicate_serial_id/check', 'WarrantyCardController@replacement_duplicate_serial_id');

$router->map('GET', '/warrantyCard/mfdate', 'WarrantyCardController@mf_date');

//Task Route
$router->map('GET', '/phoner_number/create', 'TaskController@create');
$router->map('GET', '/phoner_number/duplicate_number/check', 'TaskController@duplicate_number_check');
$router->map('POST', '/phoner_number/store', 'TaskController@store');
$router->map('GET', '/phoner_number/view', 'TaskController@index');
$router->map('POST', '/phoner_number/view', 'TaskController@index');
$router->map('GET', '/phoner_number/edit/[i:id]', 'TaskController@edit');
$router->map('POST', '/phoner_number/delete', 'TaskController@delete');
$router->map('GET', '/phoner_number/edit/duplicate_number/check', 'TaskController@duplicate_number_check');
$router->map('POST', '/phoner_number/update/[i:id]', 'TaskController@update');
$router->map('GET', '/task/user', 'TaskController@get_user');
//Phone Number stock group
$router->map('GET', '/phone_number/stock/create', 'PhoneNumberStockGroupController@create');
$router->map('GET', '/phone_number/stock/index', 'PhoneNumberStockGroupController@index');
$router->map('POST', '/phone_number/stock/save', 'PhoneNumberStockGroupController@store');
$router->map('POST', '/phone_number/stock/delete', 'PhoneNumberStockGroupController@delete');
//Retailer Route
$router->map('GET', '/retailer/create', 'RetailerController@create');
$router->map('GET', '/retailer/index', 'RetailerController@index');
$router->map('POST', '/retailer/save', 'RetailerController@store');
$router->map('POST', '/retailer/data', 'RetailerController@data');
$router->map('POST', '/retailer/edit', 'RetailerController@edit');
$router->map('POST', '/retailer/delete', 'RetailerController@delete');
//offer route
$router->map('GET', '/offer/index', 'OfferController@all_offer');
$router->map('POST', '/offer/index', 'OfferController@all_offer');
$router->map('GET', '/offer/edit/[i:id]', 'OfferController@offer_edit');
$router->map('GET', '/offer/file/edit', 'OfferController@file_edit');
$router->map('POST', '/offer/delete', 'OfferController@delete');
$router->map('GET', '/regular/offer/create', 'OfferController@create');
$router->map('GET', '/regular/offer/user_id', 'OfferController@getDealer');
$router->map('GET', '/regular/offer/access_retrailer', 'OfferController@getRetrailer');
$router->map('GET', '/regular/offer/index', 'OfferController@index');
$router->map('POST', '/regular/offer/save', 'OfferController@store');
$router->map('POST', '/offer/update/[i:id]', 'OfferController@update');
$router->map('GET', '/individual/offer/file/delete', 'OfferController@file_delete');
// $router->map('POST', '/regular/offer/delete', 'OfferController@delete');

//DealerController
$router->map('GET', '/offer/dealer/create', 'OfferDealerController@create');
$router->map('GET', '/offer/dealer/index', 'OfferDealerController@index');
$router->map('POST', '/offer/dealer/save', 'OfferDealerController@store');
$router->map('POST', '/offer/dealer/data', 'OfferDealerController@data');
$router->map('POST', '/offer/dealer/delete', 'OfferDealerController@delete');
$router->map('POST', '/offer/dealer/edit', 'OfferDealerController@edit');

// Dealer App Controller
$router->map('GET', '/dealerapp', 'DealerAppController@index');
$router->map('GET', '/dealerpage', 'DealerAppController@dealerpage');
$router->map('GET', '/dealerapp/message', 'DealerAppController@message');
$router->map('GET', '/dealerapp/message_details/[i:id]', 'DealerAppController@message_details');
$router->map('GET', '/dealerapp/offers', 'DealerAppController@offer');
$router->map('POST', '/regular/offerdealer', 'OfferController@offerDealer');
$router->map('GET', '/dealerapp/offer_details/[i:id]', 'DealerAppController@offer_details');
$router->map('GET', '/dealerapp/pricelist', 'DealerAppController@pricelist');
$router->map('GET', '/dealerapp/pricelist_details/[i:id]', 'DealerAppController@pricelist_details');
$router->map('GET', '/dealerapp/swr', 'DealerAppController@swr');
$router->map('POST', '/dealerapp/swr', 'DealerAppController@swr');

$router->map('GET', '/dealerapp/number', 'DealerAppController@number');
$router->map('POST', '/dealerapp/number_store', 'DealerAppController@number_store');

$router->map('GET', '/dealerapp/profileupdate', 'DealerAppController@profileupdate');

//Individual Dealer Offer  Route

$router->map('GET', '/individual/dealer/offer/index', 'OfferController@individual_offer');
$router->map('GET', '/offer/retrailer/index', 'OfferController@retrailerShow');
$router->map('GET', '/individual/dealer/offer/allShow', 'OfferController@individual_offer_all_show');
$router->map('GET', '/individual/dealer/offer/show/[i:id]', 'OfferController@individual_offer_image_show');
$router->map('GET', '/individual/dealer/offer/count', 'OfferController@individual_offer_count');
$router->map('POST', '/individual/dealer/offer/delete', 'OfferController@individual_offer_delete');
$router->map('GET', '/individual/dealer/offer/notification', 'OfferController@individual_offer_notification');
$router->map('GET', '/individual/dealer/offer/notification/show/[i:id]', 'OfferController@individual_offer_notification_show');
$router->map('GET', '/individual/dealer/offer/notification/view', 'OfferController@individual_offer_notification_view');
$router->map('GET', '/pdf/show/[:offer_file_id]', 'OfferController@individual_offer_pdf_show');
$router->map('GET', '/individual/retrailer/offer/show/[i:id]', 'OfferController@individual_offer_retrailer_show');

//Service Branch Route
$router->map('GET', '/service/branch/create', 'ServiceBranchController@create');
$router->map('GET', '/service/branch/index', 'ServiceBranchController@index');
$router->map('POST', '/service/branch/save', 'ServiceBranchController@store');
$router->map('POST', '/service/branch/delete', 'ServiceBranchController@delete');
$router->map('GET', '/service/center/image/create', 'ServiceBranchController@image_create');
$router->map('POST', '/service/center/image/save', 'ServiceBranchController@image_save');
$router->map('GET', '/service/center/image/index', 'ServiceBranchController@image_index');
$router->map('POST', '/service/center/image/delete', 'ServiceBranchController@image_delete');

//Service Center Route
$router->map('GET', '/service/customer/index', 'ServiceCenterController@index');
$router->map('GET', '/dealer', 'ServiceCenterController@dealerIndex');
$router->map('GET', '/service/center/show', 'ServiceCenterController@show');
$router->map('GET', '/service/article/create', 'ServiceBranchController@article_create');
$router->map('POST', '/service/article/save', 'ServiceBranchController@article_store');
$router->map('GET', '/service/article/index', 'ServiceBranchController@article_index');
$router->map('POST', '/service/article/delete', 'ServiceBranchController@article_delete');
$router->map('GET', '/service/show', 'ServiceCenterController@service_show');

// product list serial route
$router->map('GET', '/product/list/serial/create', 'ProductListSerialController@create');
$router->map('POST', '/product/list/serial/store', 'ProductListSerialController@store');
$router->map('GET', '/product/list/serial/index', 'ProductListSerialController@index');
$router->map('POST', '/product/list/serial/delete', 'ProductListSerialController@delete');
$router->map('GET', '/product/list/serial/edit/[i:id]', 'ProductListSerialController@edit');
$router->map('GET', '/product/list/serial/edit/in', 'ProductListSerialController@productSerialInEdit');
$router->map('POST', '/product/list/serial/update/[i:id]', 'ProductListSerialController@update');
$router->map('GET', '/product/list/serial/report/show', 'ProductListSerialController@productSerialReportShow');
$router->map('GET', '/product/list/serial/report/data', 'ProductListSerialController@productSerialReport');
$router->map('GET', '/product/list/serial/duplicate/check', 'ProductListSerialController@duplicate_serial_id');