<?php

namespace Orders;


class OrderValidator
{
	private $minimumAmount;

	private function setMinimumAmount(int $amount)
	{
		$this->minimumAmount = $amount;
	}

	public function getMinimumAmount()
	{
		return $this->minimumAmount;
	}

    public static function create()
    {
    	$validator = new self();
	    $validator->setMinimumAmount((int)OrderFileHandler::read('input/minimumAmount'));
    	return $validator;
    }

	/**
	 * @param $order Order
	 */
    public function validate(Order $order)
    {
	    $is_valid = true;
	    if (!is_string($order->getName()) || !(strlen($order->getName()) > 2) || !($order->getTotalAmount() > 0) || $order->getTotalAmount() < $this->minimumAmount) {
		    $is_valid = false;
	    }

	    foreach ($order->getItems() as $item_id) {
		    if (!is_int($item_id)) {
			    $is_valid = false;
		    }
	    }

	    $order->setIsValid($is_valid);
    }
}