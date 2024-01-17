<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\TaxFeatures\Plugin\Quote\Model;

use Magento\Quote\Model\Quote;
use ECInternet\TaxFeatures\Helper\Data;
use ECInternet\TaxFeatures\Logger\Logger;

/**
 * Plugin for Magento/Quote/Model/Quote
 */
class QuotePlugin
{
    /**
     * @var \ECInternet\TaxFeatures\Helper\Data
     */
    private $_helper;

    /**
     * @var \ECInternet\TaxFeatures\Logger\Logger
     */
    private $_logger;

    /**
     * QuotePlugin constructor.
     *
     * @param \ECInternet\TaxFeatures\Helper\Data   $helper
     * @param \ECInternet\TaxFeatures\Logger\Logger $logger
     */
    public function __construct(
        Data $helper,
        Logger $logger
    ) {
        $this->_helper = $helper;
        $this->_logger = $logger;
    }

    /**
     * @param \Magento\Quote\Model\Quote $subject
     * @param int|null                   $result
     *
     * @return mixed
     */
    public function afterGetCustomerTaxClassId(
        Quote $subject,
        $result
    ) {
        if ($this->_helper->isModuleEnabled()) {
            /** @var \Magento\Customer\Api\Data\CustomerInterface $customer */
            if ($customer = $subject->getCustomer()) {
                /** @var \Magento\Framework\Api\AttributeInterface $attribute */
                if ($attribute = $customer->getCustomAttribute(Data::CUSTOMER_ATTRIBUTE_IS_TAX_EXEMPT)) {
                    if ($attribute->getValue() == 1) {
                        $exemptTaxClass = $this->_helper->getExemptTaxClassID();
                        if (!empty($exemptTaxClass)) {
                            return $exemptTaxClass;
                        } else {
                            $this->log('afterGetCustomerTaxClassId(): ERROR. No Tax Class ID for Exempt Class specified.');
                        }
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Write to extension log
     *
     * @param string $message
     */
    private function log(string $message)
    {
        $this->_logger->info('Plugin/Quote/Model/QuotePlugin - ' . $message);
    }
}
