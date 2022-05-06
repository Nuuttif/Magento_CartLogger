<?php
namespace Nuutti\CartLogger\Model\ResourceModel\CartLog;

/**
 * Class Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(
            \Nuutti\CartLogger\Model\CartLog::class,
            \Nuutti\CartLogger\Model\ResourceModel\CartLog::class
        );
    }
}
