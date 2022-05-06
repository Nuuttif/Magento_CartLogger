<?php
namespace Nuutti\CartLogger\Model\ResourceModel;

/**
 * Class CartLog
 */
class CartLog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init('cart_log', 'entity_id');
    }
}
