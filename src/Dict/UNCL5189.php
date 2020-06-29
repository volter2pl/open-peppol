<?php

namespace Volter\OpenPeppol\Dict;

class UNCL5189
{
    const BONUS_FOR_WORKS_AHEAD_OF_SCHEDULE = '41';
    const OTHER_BONUS = '42';
    const MANUFACTURERS_CONSUMER_DISCOUNT = '60';
    const DUE_TO_MILITARY_STATUS = '62';
    const DUE_TO_WORK_ACCIDENT = '63';
    const SPECIAL_AGREEMENT = '64';
    const PRODUCTION_ERROR_DISCOUNT = '65';
    const NEW_OUTLET_DISCOUNT = '66';
    const SAMPLE_DISCOUNT = '67';
    const END_OF_RANGE_DISCOUNT = '68';
    const INCOTERM_DISCOUNT = '70';
    const POINT_OF_SALES_THRESHOLD_ALLOWANCE = '71';
    const MATERIAL_SURCHARGE_DEDUCTION = '88';
    const DISCOUNT = '95';
    const SPECIAL_REBATE = '100';
    const FIXED_LONG_TERM = '102';
    const TEMPORARY = '103';
    const STANDARD = '104';
    const YEARLY_TURNOVER = '105';

    public static function verify($code)
    {
        if (!in_array($code, [
            self::BONUS_FOR_WORKS_AHEAD_OF_SCHEDULE,
            self::OTHER_BONUS,
            self::MANUFACTURERS_CONSUMER_DISCOUNT,
            self::DUE_TO_MILITARY_STATUS,
            self::DUE_TO_WORK_ACCIDENT,
            self::SPECIAL_AGREEMENT,
            self::PRODUCTION_ERROR_DISCOUNT,
            self::NEW_OUTLET_DISCOUNT,
            self::SAMPLE_DISCOUNT,
            self::END_OF_RANGE_DISCOUNT,
            self::INCOTERM_DISCOUNT,
            self::POINT_OF_SALES_THRESHOLD_ALLOWANCE,
            self::MATERIAL_SURCHARGE_DEDUCTION,
            self::DISCOUNT,
            self::SPECIAL_REBATE,
            self::FIXED_LONG_TERM,
            self::TEMPORARY,
            self::STANDARD,
            self::YEARLY_TURNOVER,
        ])) {
            throw new \InvalidArgumentException("Value MUST be part of code list UNCL5189");
        }
    }
}
