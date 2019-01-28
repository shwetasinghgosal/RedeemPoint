<?php
namespace Magikkart\RedeemPoint\Block;
 
use Magento\Framework\App\Config\ScopeConfigInterface;
 
class Ordernumberpoints extends \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray
{
	
	   /**
     * Grid columns
     *
     * @var array
     */
    protected $_columns = [];

   
    protected $_getStatusRenderer;
    protected $_getTimeRenderer;

    /**
     * Enable the "Add after" button or not
     *
     * @var bool
     */
    protected $_addAfter = true;
     /**
     * Label of add button
     *
     * @var string
     */
    protected $_addButtonLabel;
     protected function _construct()	
	{
		parent::_construct();
        $this->_addButtonLabel = __('Add');
	}
	
   
    
  
   
     protected function getStatusRenderer() {
        if (!$this->_getStatusRenderer) {
            $this->_getStatusRenderer = $this->getLayout()->createBlock(
                    '\Magikkart\RedeemPoint\Block\Adminhtml\Form\Field\Status', '', ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->_getStatusRenderer;
    }
    /**
     * Prepare to render
     *
     * @return void
     */
    protected function _prepareToRender() {
        $this->addColumn(
                'order_number', [
            'label' => __('Order Number')
                ]
        );
        $this->addColumn(
                'reward_points', [
            'label' => __('Reward Points')
                ]
        );
        $this->addColumn(
                'maximum_number_of_uses', [
            'label' => __('Maximum Number of Uses (Leave blank for unlimited)')
                ]
        );
        $this->addColumn(
                'expiration_date', [
            'label' => __('Expiration Date  (Leave blank for not to expire)'),
            'style' => 'width:150px',
            'class' => 'date_pick'
                ]
        );
       
         
       $this->addColumn(
                'status', [
            'label' => __('Status'),
            'renderer' => $this->getStatusRenderer(), 
                ]
        );
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }
     protected function _prepareArrayRow(\Magento\Framework\DataObject $row) {
       
        $status = $row->getStatus();
        $options = [];
       
        if ($status) {
            $options['option_' . $this->getStatusRenderer()->calcOptionHash($status)] = 'selected="selected"';
          
        }
       
        $row->setData('option_extra_attrs', $options);
        }
    
}
