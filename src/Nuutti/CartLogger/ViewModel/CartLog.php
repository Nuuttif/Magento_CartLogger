<?php

namespace Nuutti\CartLogger\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Nuutti\CartLogger\Model\CartLogFactory;
use Nuutti\CartLogger\Model\ResourceModel\CartLog\CollectionFactory;

class Cartlog implements ArgumentInterface
{
    private $cartLogFactory;
    private $collectionFactory;

    public function __construct(
        \Nuutti\CartLogger\Model\CartLogFactory $cartLogFactory,
        \Nuutti\CartLogger\Model\ResourceModel\CartLog\CollectionFactory $collectionFactory
    ) {
        $this->cartLogFactory = $cartLogFactory;
        $this->collectionFactory = $collectionFactory;
    }

    public function getSomething()
    {
        return "meme";
    }

    public function getCartLog()
    {
        //$model = $this->cartLogFactory->create();
        $collection = $this->collectionFactory->create();

        return $collection;
    }
}