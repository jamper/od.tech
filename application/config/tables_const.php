<?php
/**
 * Created by PhpStorm.
 * User: Fumo
 * Date: 26.05.16
 * Time: 15:42
 */

$prefix = langPrefix();

//database tables
define('TABLE_USER',                                    'user');
define('TABLE_USER_ROLE',                               'user_role');
define('TABLE_USER_ADDRESS',                            'user_address');
define('TABLE_LANGUAGE',                                'language');
define('TABLE_WISHLIST',                                'wishlist');
define('TABLE_ORDER',                                   'order');

define('TABLE_CATEGORY',                                $prefix.'category');
define('TABLE_STATUS',                                  $prefix.'status');
define('TABLE_BLOG',                                    $prefix.'blog');
define('TABLE_PAGE',                                    $prefix.'page');
define('TABLE_PRODUCT',                                 $prefix.'product');
define('TABLE_PRODUCT_PARAMETERS',                      $prefix.'product_param');
define('TABLE_PRODUCT_PARAMETERS_VALUE',                $prefix.'product_param_value');
define('TABLE_PRODUCT_TYPE',                            $prefix.'product_type');
define('TABLE_PRODUCT_2_PARAMETERS_VALUE',              $prefix.'product2param_value');
define('TABLE_PRODUCT_IMAGES',                          $prefix.'product_images');
define('TABLE_SALE',                                    $prefix.'sale');
define('TABLE_SLIDER',                                  $prefix.'slider');
define('TABLE_MENU',                                    $prefix.'menu');
define('TABLE_GROUP',                                   $prefix.'group');
define('TABLE_PRODUCT_2_GROUP',                         $prefix.'product2group');
define('TABLE_SYSTEM',									$prefix.'system');
define('TABLE_ORDER_DELIVERY',                          $prefix.'order_delivery');
define('TABLE_REVIEW',                                  $prefix.'review');
define('TABLE_ACTION',									$prefix.'action');