<?php

namespace Orders;


class OrderFileHandler implements FileHandlerInterface
{
    public static function write($result, $order)
    {
        if(!empty($result) && !empty($order->getOrderId())) {
            if ($order->isValid()) {
                $lines = explode("\n", $result);
                $lineWithoutDebugInfo = [];
                foreach ($lines as $line) {
                    if (strpos($line, 'Reason:') === false) {
                        $lineWithoutDebugInfo[] = $line;
                    }
                }
            }
            try {
                file_put_contents('orderProcessLog', @file_get_contents('orderProcessLog') . implode("\n", $lineWithoutDebugInfo ?? [$result] ));
                if ($order->isValid()) {
                    file_put_contents('result', @file_get_contents('result') . $order->getOrderId() . '-' . implode(',', $order->getItems()) . '-' . $order->getDeliveryDetails() . '-' . ($order->isManual() ? 1 : 0) . '-' . $order->getTotalAmount() . '-' . $order->getName() . "\n");
                }
                return true;
            } catch(Exception $e) {
                file_put_contents('fileHandlerWriteErrorLog', @file_get_contents('fileHandlerWriteErrorLog') . $e->getMessage());
                return false;
            }
        } else {
            return false;
        }
    }    
    
    public static function read($file_path)
    {
        try {
            return file_get_contents('input/minimumAmount');
        } catch(Exception $e) {
            file_put_contents('fileHandlerReadErrorLog', @file_get_contents('fileHandlerReadErrorLog') . $e->getMessage());
            return false;
        }
        
    }
}