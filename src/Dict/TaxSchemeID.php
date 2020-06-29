<?php


namespace Volter\OpenPeppol\Dict;

class TaxSchemeID
{
    const VAT = 'VAT';
    const GST = 'GST';

    public static function verify($code)
    {
        if (!in_array($code, [
            self::VAT,
            self::GST,
        ])) {
            throw new \InvalidArgumentException("Value MUST be 'VAT' or 'GST'");
        }
    }
}
