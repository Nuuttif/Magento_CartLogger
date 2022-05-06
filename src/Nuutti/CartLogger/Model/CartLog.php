<?php
namespace Nuutti\CartLogger\Model;

/**
 * Class CartLog
 */
class CartLog extends \Magento\Framework\Model\AbstractModel implements
    \Nuutti\CartLogger\Api\Data\CartLogInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'cart_log';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\Nuutti\CartLogger\Model\ResourceModel\CartLog::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
