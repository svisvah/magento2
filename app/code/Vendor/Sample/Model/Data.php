<?php
// app/code/Vendor/Sample/Model/Data.php

namespace Vendor\Sample\Model;

use Magento\Framework\Model\AbstractModel;

class Data extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Vendor\Sample\Model\ResourceModel\Data');
    }
}
?>