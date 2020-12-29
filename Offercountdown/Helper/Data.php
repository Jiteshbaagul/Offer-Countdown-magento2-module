<?php

namespace JiteshBaagul\Offercountdown\Helper;

use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\DriverInterface;

/**
 * Catalog data helper
 * @SuppressWarnings(PHPMD.TooManyFields)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper {

    /**
     * Currently selected store ID if applicable
     *
     * @var int
     */
    protected $_storeId;

    /**
     *
     * @var \Magento\Framework\App\ResourceConnection
     */
    protected $_resource;

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * Store manager
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var \Magento\Framework\DB\Helper
     */
    protected $_resourceHelper;

    /**
     * @var CustomerSession
     */
    protected $_customerSession;

    /**
     * @var \Magento\MediaStorage\Model\File\Uploader
     */
    protected $_uploaderFactory;

    /**
     * @var Filesystem
     */
    protected $_fileSystem;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    protected $_localeDate;
    protected $_jsonEncoder;

    public function __construct(
    \Magento\Framework\App\Helper\Context $context, 
            \Magento\Framework\App\ResourceConnection $resource, 
            \Magento\Store\Model\StoreManagerInterface $storeManager, 
            \Magento\Framework\Registry $coreRegistry, CustomerSession $customerSession, 
            \Magento\Framework\Json\EncoderInterface $jsonEncoder, 
            \Magento\Framework\DB\Helper $resourceHelper, 
            \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory, 
            \Magento\Framework\Filesystem $fileSystem, 
            \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate
    ) {
        $this->_resource = $resource;
        $this->_storeManager = $storeManager;
        $this->_coreRegistry = $coreRegistry;
        $this->_customerSession = $customerSession;
        $this->_resourceHelper = $resourceHelper;
        $this->_uploaderFactory = $uploaderFactory;
        $this->_fileSystem = $fileSystem;
        $this->_localeDate = $localeDate;
        $this->_jsonEncoder = $jsonEncoder;

        parent::__construct($context);
    }

    /**
     * Set a specified store ID value
     *
     * @param int $store
     * @return $this
     */
    public function setStoreId($store) {
        $this->_storeId = $store;
        return $this;
    }

}
