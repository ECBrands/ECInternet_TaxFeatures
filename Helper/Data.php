<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\TaxFeatures\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const CONFIG_PATH_ENABLED              = 'tax_features/general/enable';

    const CONFIG_PATH_TAX_CLASS_ID         = 'tax_features/general/tax_exempt_class_id';

    const CUSTOMER_ATTRIBUTE_IS_TAX_EXEMPT = 'is_tax_exempt';

    /**
     * @return bool
     */
    public function isModuleEnabled()
    {
        return $this->scopeConfig->isSetFlag(self::CONFIG_PATH_ENABLED);
    }

    /**
     * @return mixed
     */
    public function getExemptTaxClassID()
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH_TAX_CLASS_ID);
    }
}
