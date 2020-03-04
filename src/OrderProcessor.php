<?php

namespace Orders;


class OrderProcessor
{

	/**
	 * @var OrderValidator
	 */
	private $validator;

	public function __construct()
	{
		$this->validator = OrderValidator::create();
	}

	/**
	 * @param $order Order
	 */
	public function process(Order $order)
	{
		$template = "Processing started, OrderId: {$order->getOrderId()}\n";
		$this->validator->validate($order);

		if ($order->isValid()) {
			$template .= "Order is valid\n";
			$this->addDeliveryCostLargeItem($order);
			if ($order->isManual()) {
				$template .= "Order \"" . $order->getOrderId() . "\" NEEDS MANUAL PROCESSING\n";
			} else {
				$template .= "Order \"" . $order->getOrderId() . "\" WILL BE PROCESSED AUTOMATICALLY\n";
			}
			if (count($order->getItems()) > 1) {
				$order->setDeliveryDetails('Order delivery time: 2 days');
			} else {
				$order->setDeliveryDetails('Order delivery time: 1 day');
			}
		} else {
			$template .= "Order is invalid\n";
		}
		OrderFileHandler::write($template, $order);
	}

	/**
	 * @param $order Order
	 */
	private function addDeliveryCostLargeItem(Order $order)
	{
		foreach ($order->getItems() as $item) {
			if (in_array($item, [3231, 9823])) {
				$order->setTotalAmount($order->getTotalAmount() + 100.00);
			}
		}
	}
}