<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magikkart\RedeemPoint\Block\Adminhtml\Form\Field;

class Date extends \Magento\Framework\View\Element\Html\Select {
   /**
     * methodList
     *
     * @var array
     */
    protected $groupfactory;
  
   /**
     * @var \Magento\Framework\Locale\ListsInterface
     */
    protected $localeLists;

  
    public function __construct(
    \Magento\Framework\View\Element\Context $context, \Magento\Customer\Model\GroupFactory $groupfactory, \Magento\Framework\Locale\ListsInterface $localeLists, array $data = []
    ) {
        parent::__construct($context, $data);
        $this->groupfactory = $groupfactory;
        $this->localeLists = $localeLists;
      
    }  
     /**
     * Render block HTML
     *
     * @return string
     */
    public function _toHtml() {
       //~ $elId = $this->getInputId();
        //~ $elName = $this->getInputName();
        $colName = $this->getColumnName();
        //~ $column = $this->getColumn();
 
        return '<input type="text" value="1" id="' . $colName . '"' .
            ' name="' . $colName . '"/>';
    }
    //~ /**
     //~ * Sets name for input element
     //~ *
     //~ * @param string $value
     //~ * @return $this
     //~ */
    //~ public function setInputName($value) {
       //~ return $this->setName($value . '[]');
    //~ }
}
