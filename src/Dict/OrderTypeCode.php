<?php

namespace Volter\OpenPeppol\Dict;

/**
 * All possible Unit Codes that can be used
 * @see https://test-docs.peppol.eu/poacc/upgrade-3/codelist/UNCL1001_T01/
 */
class OrderTypeCode
{
    /**
     * Document/message by means of which a buyer initiates a transaction with a seller involving the supply of goods
     * or services as specified, according to conditions set out in an offer, or otherwise known to the buyer.
     */
    const ORDER = 220;

    /**
     * Order to deliver goods into stock with agreement on payment when goods are sold out of this stock.
     */
    const CONSIGNMENT_ORDER = 227;

    public static function verify($code)
    {
        if (!in_array($code, [self::ORDER, self::CONSIGNMENT_ORDER])) {
            throw new \InvalidArgumentException("Value MUST be part of code list 'Order type code (UNCL1001 subset)");
        }
    }
}
