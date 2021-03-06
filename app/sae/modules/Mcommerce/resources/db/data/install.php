<?php
$catalog_option = new Application_Model_Option();
$catalog_option->find('catalog', 'code');

$category = new Application_Model_Option_Category();
$category->find("monetization", "code");

$data = array(
    'category_id' => $category->getId(),
    'library_id' => $catalog_option->getLibraryId(),
    'icon_id' => $catalog_option->getIconId(),
    'code' => 'm_commerce',
    'name' => 'Commerce',
    'model' => 'Mcommerce_Model_Mcommerce',
    'desktop_uri' => 'mcommerce/application/',
    'mobile_uri' => 'mcommerce/mobile_category/',
    "mobile_view_uri" => "mcommerce/mobile_product/",
    "mobile_view_uri_parameter" => "product_id",
    'only_once' => 1,
    'is_ajax' => 1,
    'position' => 220,
    'social_sharing_is_available' => 1
);
$option = new Application_Model_Option();
$option->setData($data)->save();


$datas = array(
    array('code' => 'in_store', 'name' => 'In store', 'is_free' => 1),
    array('code' => 'carry_out', 'name' => 'Carry Out', 'is_free' => 1),
    array('code' => 'home_delivery', 'name' => 'Delivery', 'is_free' => 0)
);
foreach($datas as $data) {
    $method = new Mcommerce_Model_Delivery_Method();
    $method->setData($data)->save();
}

$datas = array(
    array('code' => 'paypal', 'name' => 'Paypal', 'online_payment' => 1),
    array('code' => 'cash', 'name' => 'Cash', 'online_payment' => 0),
    array('code' => 'check', 'name' => 'Check', 'online_payment' => 0),
    array('code' => 'meal_voucher', 'name' => 'Meal Voucher', 'online_payment' => 0),
    array('code' => 'cc_upon_delivery', 'name' => 'Credit card (pay upon pickup or delivery)', 'online_payment' => 0),
);
foreach($datas as $data) {
    $method = new Mcommerce_Model_Payment_Method();
    $method->setData($data)->save();
}
