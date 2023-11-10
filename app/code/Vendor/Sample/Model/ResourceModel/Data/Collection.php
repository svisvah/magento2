<?php
namespace Vendor\Sample\Model\ResourceModel\Data;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName ='id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Vendor\Sample\Model\Data', 'Vendor\Sample\Model\ResourceModel\Data');
    }

}