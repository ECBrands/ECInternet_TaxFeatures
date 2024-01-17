<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\TaxFeatures\Logger;

use Magento\Framework\Filesystem\Driver\File as FileDriver;
use Magento\Framework\Logger\Handler\Base as LoggerHandlerBase;
use Monolog\Logger;

/**
 * Logger handler
 */
class Handler extends LoggerHandlerBase
{
    protected $loggerType = Logger::INFO;

    protected $fileName = '/var/log/ECInternet_TaxFeatures.log';

    protected $filesystem = FileDriver::class;
}
