<?php


namespace JiteshBaagul\Offercountdown\Block;

class Offer extends \Magento\Catalog\Block\Product\AbstractProduct {

    protected $scopeConfig;
    protected $urlHelper;
    protected $_date;

    public function __construct(
        \Magento\Catalog\Block\Product\Context $context, 
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Url\Helper\Data $urlHelper, 
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->urlHelper = $urlHelper;
        $this->_date = $date;
        parent::__construct($context, $data);
    }


    

    public function getScopeConfig($path) {
        return $this->_scopeConfig->getValue($path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
    
}
