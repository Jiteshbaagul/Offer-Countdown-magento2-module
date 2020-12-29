<?php
 
namespace JiteshBaagul\Offercountdown\Block\System\Config;
 
use Magento\Framework\Registry;
use Magento\Backend\Block\Template\Context;
 
class Calendar extends \Magento\Config\Block\System\Config\Form\Field {
 
    /**
     * @var  Registry
     */
    protected $_coreRegistry;
  
    /**
     * @param Context  $context
     * @param Registry $coreRegistry
     * @param array    $data
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        array $data = []
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }
  
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        //get configuration element
        $html = $element->getElementHtml();
        //check datepicker set or not
        if (!$this->_coreRegistry->registry('datepicker_loaded')) {
            $this->_coreRegistry->registry('datepicker_loaded', 1);
        }
        //add icon on datepicker 
        $html .= '<button type="button" style="display:none;" class="ui-datepicker-trigger '
            .'v-middle" data-for="' . $element->getHtmlId() . '"><span>Select Date</span></button>';
        // add datepicker with element by jquery
        $html .= '<script type="text/javascript">
            require(["jquery", "jquery/ui"], function ($) {
                $(document).ready(function () {
                    $("#' . $element->getHtmlId() . '").datepicker( { dateFormat: "dd/mm/yy" } );
                    $(".ui-datepicker-trigger").removeAttr("style");
                    $(".ui-datepicker-trigger").click(function(){
                        var forId = $(this).data("for");
                        $("#"+forId).focus();
                    });
                });
            });
            </script>';
        // return datepicker element
        return $html;
    }
 
}