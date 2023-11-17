<?php
// app/code/Vendor/Sample/Model/ResourceModel/Data.php

namespace Vendor\Sample\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Data extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('eodform', 'id'); 
    }
}
?>