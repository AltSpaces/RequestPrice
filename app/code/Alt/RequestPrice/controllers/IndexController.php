<?php

class Alt_RequestPrice_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Action for submitting and saving request
     */
    public function submitAction()
    {
        $_request = $this->getRequest()->getParams();
        if($_request['is_ajax']) {
            unset($_request['is_ajax']);
            try {
                $doesRequestExist = Mage::getResourceModel('requestprice/requests_collection')
                    ->addFieldToFilter('customer_email', $_request['customer_email'])
                    ->addFieldToFilter('product_sku', $_request['product_sku'])
                    ->getFirstItem()
                    ->getId();
                # Check if request with such email and product already exist to prevent duplicates
                if ($doesRequestExist) {
                    $responseMessage = $this->__('You\'ve already sent request');
                    $this->getResponse()
                        ->setHeader('HTTP/1.0', Mage_Api2_Model_Server::HTTP_BAD_REQUEST, true)
                        ->setHeader('Content-type', 'application/json', true)
                        ->setBody(json_encode($responseMessage));
                    return;
                }
                $requestModel = Mage::getModel('requestprice/requests')
                    ->setData($_request)
                    ->setData('status', 'new')
                    ->setData('created_at', now())
                    ->save();

                $this->getResponse()
                    ->setHeader('HTTP/1.0', Mage_Api2_Model_Server::HTTP_OK, true)
                    ->setHeader('Content-type', 'application/json', true)
                    ->setBody(json_encode($this->__('Your request was send successfully')));

                return;
            } catch (Exception $e) {
                $this->getResponse()
                    ->setHeader('HTTP/1.0', Mage_Api2_Model_Server::HTTP_INTERNAL_ERROR, true)
                    ->setHeader('Content-type', 'application/json', true)
                    ->setBody(json_encode($e->getMessage()));
                return;
            }
        }
        $this->getResponse()
            ->setHeader('HTTP/1.0', Mage_Api2_Model_Server::HTTP_BAD_REQUEST, true)
            ->setHeader('Content-type', 'application/json', true)
            ->setBody(json_encode($this->__('Incorrect request')));
    }
}