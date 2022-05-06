<?php
namespace Nuutti\CartLogger\Block\Adminhtml;

/**
 * Class Main
 */
class Main extends \Magento\Backend\Block\Template
{

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    function _prepareLayout(){}
}
