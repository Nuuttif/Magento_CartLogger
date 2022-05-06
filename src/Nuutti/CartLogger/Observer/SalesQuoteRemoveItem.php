<?php

namespace Nuutti\CartLogger\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Checkout\Model\Session as CheckoutSession;
use Nuutti\CartLogger\Model\CartLogFactory;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Customer\Model\Session;

class SalesQuoteRemoveItem implements ObserverInterface
{
    private $logger;
    private $cartLogFactory;
    private $date;
    private $customerSession;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        CheckoutSession $checkoutSession,
        \Nuutti\CartLogger\Model\CartLogFactory $cartLogFactory,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        \Magento\Customer\Model\Session $customerSession
    ) {
        $this->logger = $logger;
        $this->_checkoutSession = $checkoutSession;
        $this->cartLogFactory = $cartLogFactory;
        $this->date = $date;
        $this->customerSession = $customerSession;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $this->logger->debug('Item was removed from cart');
    }
}
