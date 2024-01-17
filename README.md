# Magento2 Module Tax Features
``ecinternet/taxfeatures - 1.0.1.0``

- [Requirements](#requirements-header)
- [Overview](#overview-header)
- [Installation](#installation-header)
- [Configuration](#configuration-header)
- [Specifications](#specifications-header)
- [Attributes](#attributes-header)
- [Notes](#notes-header)
- [Version History](#version-history-header)

## Requirements

## Overview

## Installation
- Extract the zip to your Magento 2 root directory to create the following folder structure: `app/code/ECInternet/TaxFeatures`
- Run `php -f bin/magento module:enable ECInternet_TaxFeatures`
- Run `php -f bin/magento setup:upgrade`
- Run `php -f bin/magento setup:di:compile`
- Flush the Magento cache
- Done

## Configuration

## Specifications

## Attributes
- `Customer`
  - `is_tax_exempt`

## Notes
- Create new "Customer Tax Class" (https://docs.magento.com/user-guide/tax/tax-class-new.html#add-a-new-tax-class) 
- Create new "Tax Rate" at 0%
- Create new "Tax Rule" which associated new "Customer Tax Class" with new "Tax Rate"
- Is Product Tax Class needed (?)

## Version History
