<?php
use PHPUnit\Framework\TestCase;
use Orders\Order;
use Orders\OrderProcessor;
use Orders\OrderValidator;

require_once 'vendor/autoload.php';

/*
 * phpunit OrderTest
 */
class OrderTest extends TestCase
{
    public function testOrderProcessor()
    {
        $order = new Order();
        $order->setOrderId(7)
            ->setName('Evandro')
            ->setItems([3231, 9823])
            ->setTotalAmount(399.99)
            ->setIsManual(true);
        $orderProcessor = new OrderProcessor();
        $orderProcessor->process($order);
        //testing if validator has worked
        $this->assertNotEmpty($order->isValid());
        //testing addDeliveryCostLargeItem method
        $this->assertEquals(599.99, $order->getTotalAmount());
        //testing itens quantity and delivery details
        $this->assertCount(2, $order->getItems());
        $this->assertStringContainsString('Order delivery time: 2 days', $order->getDeliveryDetails());
    }

    public function testMinimumAmountFile()
    {
        $validator = OrderValidator::create();
        $this->assertGreaterThan(0, $validator->getMinimumAmount());
    }
}