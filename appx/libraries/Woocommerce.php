<?php

require_once ('WooCommerce/Client.php');

class Woocommerce
{
    public function request()
    {
        return new Client( 'http://managed.binarytechsolutions.net/', 'ck_465e799f5698cd5f951af1f83d9f3c2612625434', 'cs_2e285337ca8bf4721bab99673f5923c0a63cff51', array('version'=>'wc/v3') );
    }
}