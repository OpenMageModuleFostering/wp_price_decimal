<?php

class WP_PriceDecimal_Helper_Data extends Mage_Core_Helper_Abstract
{
    public static function getParams()
    {
        $config         = Mage::getStoreConfig('price_decimal/general');
        $moduleName     = Mage::app()->getRequest()->getModuleName();
        $controllerName = Mage::app()->getRequest()->getControllerName();

        $skeep          = !$config['enabled'];
        if ($moduleName == 'checkout' && $config['exclude_cart']) $skeep = true;
        if ($moduleName == 'admin') $skeep = true; // --- if Backand skeep

        $precision      = 0;
        if (isset($config['precision']) && ($config['precision'] + 0) >= 0)
            $precision = $config['precision'] + 0;

        return array(
            'skeep'     => $skeep,
            'precision' => $precision,
        );
    }
}
