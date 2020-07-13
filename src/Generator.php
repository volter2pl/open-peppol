<?php

namespace Volter\OpenPeppol;

use Sabre\Xml\Service;
use Volter\OpenPeppol\Order\Order;

class Generator
{
    public static $currencyID;

    /**
     * @param Order $order
     * @param string $currencyId ISO4217
     * @return string
     */
    public static function order(Order $order, $currencyId)
    {
        self::$currencyID = $currencyId;

        $xmlService = new Service();

        $xmlService->namespaceMap = [
            'urn:oasis:names:specification:ubl:schema:xsd:Order-2' => '',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2' => 'cbc',
            'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2' => 'cac'
        ];

        return $xmlService->write('Order', [$order]);
    }
}
