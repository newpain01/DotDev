<?php
/*
* DotDev - PHP Developer Test
* Author: Igor Taskovski
* Date Completed: 28/09/2017
* Time taken: 3h
* Remarks:
*   - Modules
*   - Errors
*/

class StoreData {

  public $customers;

  public $orders;

  public $order_items;

    function __construct() {
    }

    public function loadData() {
        $this->customers = (object) [
            ['id' => 'BQYLCQ0CCwIOBgYNBAcACw', 'name' => 'Bob'],
            ['id' => 'CQwPDAkDDAQLBQsOBAcMBw', 'name' => 'Jan'],
            ['id' => 'AgsIBAsFAwYCCw8GBAINAQ', 'name' => 'Steve'],
            ['id' => 'DAEFDQwPDwMCCwULBAAMDg', 'name' => 'Fred'],
            ['id' => 'DQkCAAYHAAMJBA4LBAUOCg', 'name' => 'Robot']
        ];
        $this->orders = (object) [
            ['id' => 'DwsNDQ4JDQEEBQIJBAwNBA', 'customerId' => 'BQYLCQ0CCwIOBgYNBAcACw', 'dateOrdered' => 1506476504],
            ['id' => 'DwsPBQ0BAA0BBwwMBAoECA', 'customerId' => 'BQYLCQ0CCwIOBgYNBAcACw', 'dateOrdered' => 1506480104],
            ['id' => 'DAEFCwUAAgQPAQIIBA4IBA', 'customerId' => 'CQwPDAkDDAQLBQsOBAcMBw', 'dateOrdered' => 1506562904],
            ['id' => 'BAUNCAUAAQYMDgULBAMDAQ', 'customerId' => 'CgUDCQ8IDAsIBwUBBAgIAA', 'dateOrdered' => 1507081304],
            ['id' => 'DAMGAg8GCggLBwkJBAoECg', 'customerId' => 'AgsIBAsFAwYCCw8GBAINAQ', 'dateOrdered' => 1509068504],
            ['id' => 'CQALBwoDAw0AAQgHBAEJBQ', 'customerId' => 'DAEFDQwPDwMCCwULBAAMDg', 'dateOrdered' => 1538012504]
        ];
        $this->order_items = (object) [
            ['id' => 'DwsNDQ4JDQEEBQIJBAwNBA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 10.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
                ]
            ],
            ['id' => 'DwsPBQ0BAA0BBwwMBAoECA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 90.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
                ]
            ],
            ['id' => 'DAEFCwUAAgQPAQIIBA4IBA', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 3.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,  'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 15.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
                ]
            ],
            ['id' => 'BAUNCAUAAQYMDgULBAMDAQ', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 10.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
                ]
            ],
            ['id' => 'DAMGAg8GCggLBwkJBAoECg', 'items' => [
                ['id' => 'CgkCDwwDDgYODgYFBAwKAQ', 'value' => 32.00,  'name' => 'b0a8b6f820479900e34d34f6b8a4af73'],
                ['id' => 'DQcJBAYFCAoCBAYJBAIGDQ', 'value' => 0.55,   'name' => 'cf3298bb5cbfd41aa44ba18b4f305a36'],
                ['id' => 'BwEOBwgNDQ4NCQkHBA8IDA', 'value' => 101.00, 'name' => 'ecbdb882ae865a07d87611437fda0772']
                ]
            ]
        ];
    }

    public function formatData($option) {
        // All data should be returned as formatted JSON.
        if ($option == 1) {
          $detailedOrders = $this->getOrderDetails();

          $this->prepareJson($detailedOrders);

          return json_encode((object)$detailedOrders);
          // return orders sorted by highest value. Be sure to include the order total in the response
        } elseif ($option == 2) {
          $detailedOrders = $this->getOrderDetails();

          uasort($detailedOrders, function($a, $b){
            return $a['dateOrdered'] <=>  $b['dateOrdered'] ;
          });

          return json_encode(((object) $detailedOrders));
          // return orders sorted by date
        } elseif ($option == 3) {
          $detailedOrders = $this->getOrderDetails();

          foreach ($detailedOrders as &$detailedOrder) {
             unset($detailedOrder['orderItems']);
          }

          $this->prepareJson($detailedOrders);

          return json_encode((object) $detailedOrders);
          // return orders without items
        }
    }

    public function getOrderDetails() {
      $detailedOrders = [];
      $customers = (array) $this->customers;
      $orderItems = (array) $this->order_items;

      foreach ($this->orders as $order) {
          $order['customer'] = $customers[array_search($order['customerId'], array_column($customers, 'id'))];
          unset($order['customerId']);
          $order['orderItems'] = $orderItems[array_search($order['id'], array_column($customers, 'id'))]['items'];

          uasort($order['orderItems'], function($a, $b){
            return  $b['value'] <=> $a['value'];
          });

          $order['total'] = array_sum(array_column($order['orderItems'],'value'));
          $detailedOrders[] = $order;
      }

      return $detailedOrders;
    }

    private function prepareJson(&$orderDetails) {

      foreach ($orderDetails as &$orderDetail) {

        $orderDetailArranged = [];
        $orderDetailArranged['date'] = $orderDetail['dateOrdered'];
        $orderDetailArranged['total'] = $orderDetail['total'];
        $orderDetailArranged['customer'] = $orderDetail['customer'];;

        $orderItems = [];

        if (isset($orderDetail['orderItems'])) {
          foreach ($orderDetail['orderItems'] as $order) {
            $orderItems[] = (object) $order;
          }
          $orderDetailArranged['order_items'] = $orderItems;
        }

        $orderDetail = $orderDetailArranged;
      }
    }
}

$option = isset($argv[0]) ? $argv[1] : $_GET['param'];

$run = new StoreData();
$run->loadData();
echo $run->formatData($option);
