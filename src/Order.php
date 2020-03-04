<?php

namespace Orders;


class Order
{
	/**
	 * @var int
	 */
	private $order_id;
	/**
	 * @var bool
	 */
    private $is_manual = false;
    /**
     * @var bool
     */
    private $is_valid = false;
	/**
	 * @var string
	 */
    private $name;
	/**
	 * @var array
	 */
    private $items;
	/**
	 * @var float
	 */
    private $totalAmount;
	/**
	 * @var string
	 */
    private  $deliveryDetails;

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->order_id;
    }

    /**
     * @param int $order_id
     * @return Order
     */
    public function setOrderId(int $order_id): Order
    {
        $this->order_id = $order_id;
        return $this;
    }

    /**
     * @return bool
     */
    public function isManual(): bool
    {
        return $this->is_manual;
    }

    /**
     * @param bool $is_manual
     * @return Order
     */
    public function setIsManual(bool $is_manual): Order
    {
        $this->is_manual = $is_manual;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->is_valid;
    }

    /**
     * @param bool $is_valid
     * @return Order
     */
    public function setIsValid(bool $is_valid): Order
    {
        $this->is_valid = $is_valid;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Order
     */
    public function setName(string $name): Order
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return Order
     */
    public function setItems(array $items): Order
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    /**
     * @param float $totalAmount
     * @return Order
     */
    public function setTotalAmount(float $totalAmount): Order
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryDetails(): string
    {

        return $this->deliveryDetails;
    }

    /**
     * @param string $deliveryDetails
     * @return Order
     */
    public function setDeliveryDetails(string $deliveryDetails): Order
    {
        $this->deliveryDetails = $deliveryDetails;
        return $this;
    }

}