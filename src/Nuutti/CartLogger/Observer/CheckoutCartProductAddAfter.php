<?php

namespace Nuutti\CartLogger\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Checkout\Model\Session as CheckoutSession;
use Nuutti\CartLogger\Model\CartLogFactory;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Customer\Model\Session;

class CheckoutCartProductAddAfter implements ObserverInterface
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
        $product = $observer->getEvent()->getDataByKey('product');
        $item = $this->_checkoutSession->getQuote()->getItemByProduct($product);
        $sku = $item->getSku();

        $model = $this->cartLogFactory->create();
        $model->addData([
            "sku" => $sku,
            "date" => $this->date->gmtDate()
        ]);

        if ($this->customerSession->isLoggedIn()) {
            $customer = $this->customerSession->getCustomer();
            $model->addData([
                "name" => $customer->getName()
            ]);
            $this->logger->debug($customer->getName());
        }

        $saveData = $model->save();
        if(!$saveData) {
            $this->logger->debug("Problem with saving data in table 'cart_log'   Class::\Nuutti\CartLogger\Observer\CheckoutCartProductAddAfter");
        }
    }
}
