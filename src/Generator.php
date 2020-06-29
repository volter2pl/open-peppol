<?php

namespace Volter\OpenPeppol;

use Sabre\Xml\Service;
use Volter\OpenPeppol\Dict\CurrencyCode;
use Volter\OpenPeppol\Order\Order;

class Generator
{
    public static $currencyID;

    public static function order(Order $order, $currencyId = CurrencyCode::EUR)
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
