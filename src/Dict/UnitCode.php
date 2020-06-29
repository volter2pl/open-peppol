<?php

namespace Volter\OpenPeppol\Dict;

/**
 * All possible Unit Codes that can be used
 * To extend, see also:
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/codelist/UNECERec20/
 */
class UnitCode
{
    const UNIT = 'C62';

    const ARE = 'ARE';
    const HECTARE = 'HAR';

    const SQUARE_METRE = 'MTK';
    const SQUARE_KILOMETRE = 'KMK';
    const SQUARE_FOOT = 'FTK';
    const SQUARE_YARD = 'YDK';
    const SQUARE_MILE = 'MIK';

    const KILOGRAM = 'KGM';
    const LITRE = 'LTR';
    const PIECE = 'H87';

    const SECOND = 'SEC';
    const MINUTE = 'MIN';
    const HOUR = 'HUR';
    const DAY = 'DAY';

    /**
     * @param string $code
     */
    public static function validate($code)
    {
        if (in_array($code, self::getAll())) {
            throw new \InvalidArgumentException("Value MUST be part of code list UNECERec20");
        }
    }

    /**
     * @param string $code
     * @return string|null
     */
    public static function getNameByCode($code)
    {
        return self::validate($code)
            ? self::getAll()[$code]
            : null;
    }

    /**
     * @param string $name
     * @return string|null
     */
    public static function getCodeByName($name)
    {
        $flip = array_flip(self::getAll());
        return isset($flip[$name])
            ? $flip[$name]
            : null;
    }

    /**
     * @return string[]
     */
    public static function getAll()
    {
        return [
            /* A unit of count defining the number of groups (group: set of items classifiedtogether). */
            '10' => 'group',
            /* A unit of count defining the number of outfits (outfit: a complete set ofequipment / materials / objects used for a specific purpose). */
            '11' => 'outfit',
            /* A unit of count defining the number of rations (ration: a single portion ofprovisions). */
            '13' => 'ration',
            /* A unit of liquid measure, especially related to spirits. */
            '14' => 'shot',
            /* A unit of count defining the number of military sticks (military stick: bombsor paratroops released in rapid succession from an aircraft). */
            '15' => 'stick, military',
            /* A unit of count defining the number of shipping containers that measure 20 footin length. */
            '20' => 'twenty foot container',
            /* A unit of count defining the number of shipping containers that measure 40 footin length. */
            '21' => 'forty foot container',
            /* decilitre per gram */
            '22' => 'decilitre per gram',
            /* gram per cubic centimetre */
            '23' => 'gram per cubic centimetre',
            /* A unit of mass defining the expected mass of material expressed as the numberof pounds. */
            '24' => 'theoretical pound',
            /* gram per square centimetre */
            '25' => 'gram per square centimetre',
            /* A unit of mass defining the expected mass of material, expressed as the numberof tons. */
            '27' => 'theoretical ton',
            /* kilogram per square metre */
            '28' => 'kilogram per square metre',
            /* kilopascal square metre per gram */
            '33' => 'kilopascal square metre per gram',
            /* kilopascal per millimetre */
            '34' => 'kilopascal per millimetre',
            /* millilitre per square centimetre second */
            '35' => 'millilitre per square centimetre second',
            /* ounce per square foot */
            '37' => 'ounce per square foot',
            /* ounce per square foot per 0,01inch */
            '38' => 'ounce per square foot per 0,01inch',
            /* millilitre per second */
            '40' => 'millilitre per second',
            /* millilitre per minute */
            '41' => 'millilitre per minute',
            /* A unit of area for tin plate equal to a surface area of 100 squaremetres. */
            '56' => 'sitas',
            /* A unit of count defining the number of strands per inch as a measure of thefineness of a woven product. */
            '57' => 'mesh',
            /* A unit of mass defining the total number of kilograms afterdeductions. */
            '58' => 'net kilogram',
            /* A unit of proportion equal to 10⁻⁶. */
            '59' => 'part per million',
            /* A unit of proportion equal to 10⁻². */
            '60' => 'percent weight',
            /* A unit of proportion equal to 10⁻⁹. */
            '61' => 'part per billion (US)',
            /* millipascal */
            '74' => 'millipascal',
            /* milli-inch */
            '77' => 'milli-inch',
            /* pound per square inch absolute */
            '80' => 'pound per square inch absolute',
            /* henry */
            '81' => 'henry',
            /* foot pound-force */
            '85' => 'foot pound-force',
            /* pound per cubic foot */
            '87' => 'pound per cubic foot',
            /* poise */
            '89' => 'poise',
            /* stokes */
            '91' => 'stokes',
            /* A unit of quantity expressed as a predetermined or set rate for usage of afacility or service. */
            '1I' => 'fixed rate',
            /* Refer ISO/TC12 SI Guide */
            '2A' => 'radian per second',
            /* Refer ISO/TC12 SI Guide */
            '2B' => 'radian per second squared',
            /* roentgen */
            '2C' => 'roentgen',
            /* A unit of electric potential in relation to alternating current(AC). */
            '2G' => 'volt AC',
            /* A unit of electric potential in relation to direct current (DC). */
            '2H' => 'volt DC',
            /* British thermal unit (international table) per hour */
            '2I' => 'British thermal unit (international table) per hour',
            /* cubic centimetre per second */
            '2J' => 'cubic centimetre per second',
            /* cubic foot per hour */
            '2K' => 'cubic foot per hour',
            /* cubic foot per minute */
            '2L' => 'cubic foot per minute',
            /* centimetre per second */
            '2M' => 'centimetre per second',
            /* decibel */
            '2N' => 'decibel',
            /* A unit of information equal to 10³ (1000) bytes. */
            '2P' => 'kilobyte',
            /* kilobecquerel */
            '2Q' => 'kilobecquerel',
            /* kilocurie */
            '2R' => 'kilocurie',
            /* megagram */
            '2U' => 'megagram',
            /* metre per minute */
            '2X' => 'metre per minute',
            /* milliroentgen */
            '2Y' => 'milliroentgen',
            /* millivolt */
            '2Z' => 'millivolt',
            /* megajoule */
            '3B' => 'megajoule',
            /* A unit of count defining the number of months for a person or persons toperform an undertaking. */
            '3C' => 'manmonth',
            /* centistokes */
            '4C' => 'centistokes',
            /* microlitre */
            '4G' => 'microlitre',
            /* micrometre (micron) */
            '4H' => 'micrometre (micron)',
            /* milliampere */
            '4K' => 'milliampere',
            /* A unit of information equal to 10⁶ (1000000) bytes. */
            '4L' => 'megabyte',
            /* milligram per hour */
            '4M' => 'milligram per hour',
            /* megabecquerel */
            '4N' => 'megabecquerel',
            /* microfarad */
            '4O' => 'microfarad',
            /* newton per metre */
            '4P' => 'newton per metre',
            /* ounce inch */
            '4Q' => 'ounce inch',
            /* ounce foot */
            '4R' => 'ounce foot',
            /* picofarad */
            '4T' => 'picofarad',
            /* pound per hour */
            '4U' => 'pound per hour',
            /* ton (US) per hour */
            '4W' => 'ton (US) per hour',
            /* kilolitre per hour */
            '4X' => 'kilolitre per hour',
            /* barrel (US) per minute */
            '5A' => 'barrel (US) per minute',
            /* A unit of count defining the number of batches (batch: quantity of materialproduced in one operation or number of animals or persons coming at once). */
            '5B' => 'batch',
            /* A unit of volume equal to one million (1000000) cubic feet of gas perday. */
            '5E' => 'MMSCF/day',
            /* A unit of power defining the hydraulic horse power delivered by a fluid pumpdepending on the viscosity of the fluid. */
            '5J' => 'hydraulic horse power',
            /* ampere square metre per joule second */
            'A10' => 'ampere square metre per joule second',
            /* angstrom */
            'A11' => 'angstrom',
            /* astronomical unit */
            'A12' => 'astronomical unit',
            /* attojoule */
            'A13' => 'attojoule',
            /* barn */
            'A14' => 'barn',
            /* barn per electronvolt */
            'A15' => 'barn per electronvolt',
            /* barn per steradian electronvolt */
            'A16' => 'barn per steradian electronvolt',
            /* barn per steradian */
            'A17' => 'barn per steradian',
            /* becquerel per kilogram */
            'A18' => 'becquerel per kilogram',
            /* becquerel per cubic metre */
            'A19' => 'becquerel per cubic metre',
            /* ampere per centimetre */
            'A2' => 'ampere per centimetre',
            /* British thermal unit (international table) per second square foot degreeRankine */
            'A20' => 'British thermal unit (international table) per second square foot degreeRankine',
            /* British thermal unit (international table) per pound degree Rankine */
            'A21' => 'British thermal unit (international table) per pound degree Rankine',
            /* British thermal unit (international table) per second foot degree Rankine */
            'A22' => 'British thermal unit (international table) per second foot degree Rankine',
            /* British thermal unit (international table) per hour square foot degree Rankine */
            'A23' => 'British thermal unit (international table) per hour square foot degree Rankine',
            /* candela per square metre */
            'A24' => 'candela per square metre',
            /* coulomb metre */
            'A26' => 'coulomb metre',
            /* coulomb metre squared per volt */
            'A27' => 'coulomb metre squared per volt',
            /* coulomb per cubic centimetre */
            'A28' => 'coulomb per cubic centimetre',
            /* coulomb per cubic metre */
            'A29' => 'coulomb per cubic metre',
            /* ampere per millimetre */
            'A3' => 'ampere per millimetre',
            /* coulomb per cubic millimetre */
            'A30' => 'coulomb per cubic millimetre',
            /* coulomb per kilogram second */
            'A31' => 'coulomb per kilogram second',
            /* coulomb per mole */
            'A32' => 'coulomb per mole',
            /* coulomb per square centimetre */
            'A33' => 'coulomb per square centimetre',
            /* coulomb per square metre */
            'A34' => 'coulomb per square metre',
            /* coulomb per square millimetre */
            'A35' => 'coulomb per square millimetre',
            /* cubic centimetre per mole */
            'A36' => 'cubic centimetre per mole',
            /* cubic decimetre per mole */
            'A37' => 'cubic decimetre per mole',
            /* cubic metre per coulomb */
            'A38' => 'cubic metre per coulomb',
            /* cubic metre per kilogram */
            'A39' => 'cubic metre per kilogram',
            /* ampere per square centimetre */
            'A4' => 'ampere per square centimetre',
            /* cubic metre per mole */
            'A40' => 'cubic metre per mole',
            /* ampere per square metre */
            'A41' => 'ampere per square metre',
            /* curie per kilogram */
            'A42' => 'curie per kilogram',
            /* A unit of mass defining the difference between the weight of a ship whencompletely empty and its weight when completely loaded, expressed as the number oftons. */
            'A43' => 'deadweight tonnage',
            /* decalitre */
            'A44' => 'decalitre',
            /* decametre */
            'A45' => 'decametre',
            /* A unit of yarn density. One decitex equals a mass of 1 gram per 10 kilometresof length. */
            'A47' => 'decitex',
            /* Refer ISO 80000-5 (Quantities and units — Part 5: Thermodynamics) */
            'A48' => 'degree Rankine',
            /* A unit of yarn density. One denier equals a mass of 1 gram per 9 kilometres oflength. */
            'A49' => 'denier',
            /* ampere square metre */
            'A5' => 'ampere square metre',
            /* electronvolt */
            'A53' => 'electronvolt',
            /* electronvolt per metre */
            'A54' => 'electronvolt per metre',
            /* electronvolt square metre */
            'A55' => 'electronvolt square metre',
            /* electronvolt square metre per kilogram */
            'A56' => 'electronvolt square metre per kilogram',
            /* A unit of count defining the number of eighth-parts as a measure of thecelestial dome cloud coverage. Synonym: OKTA , OCTA */
            'A59' => '8-part cloud cover',
            /* ampere per square metre kelvin squared */
            'A6' => 'ampere per square metre kelvin squared',
            /* exajoule */
            'A68' => 'exajoule',
            /* farad per metre */
            'A69' => 'farad per metre',
            /* ampere per square millimetre */
            'A7' => 'ampere per square millimetre',
            /* femtojoule */
            'A70' => 'femtojoule',
            /* femtometre */
            'A71' => 'femtometre',
            /* foot per second squared */
            'A73' => 'foot per second squared',
            /* foot pound-force per second */
            'A74' => 'foot pound-force per second',
            /* A unit of information typically used for billing purposes, defined as eitherthe number of metric tons or the number of cubic metres, whichever is thelarger. */
            'A75' => 'freight ton',
            /* gal */
            'A76' => 'gal',
            /* ampere second */
            'A8' => 'ampere second',
            /* gigacoulomb per cubic metre */
            'A84' => 'gigacoulomb per cubic metre',
            /* gigaelectronvolt */
            'A85' => 'gigaelectronvolt',
            /* gigahertz */
            'A86' => 'gigahertz',
            /* gigaohm */
            'A87' => 'gigaohm',
            /* gigaohm metre */
            'A88' => 'gigaohm metre',
            /* gigapascal */
            'A89' => 'gigapascal',
            /* A unit of quantity expressed as a rate for usage of a facility orservice. */
            'A9' => 'rate',
            /* gigawatt */
            'A90' => 'gigawatt',
            /* Synonym: grade */
            'A91' => 'gon',
            /* gram per cubic metre */
            'A93' => 'gram per cubic metre',
            /* gram per mole */
            'A94' => 'gram per mole',
            /* gray */
            'A95' => 'gray',
            /* gray per second */
            'A96' => 'gray per second',
            /* hectopascal */
            'A97' => 'hectopascal',
            /* henry per metre */
            'A98' => 'henry per metre',
            /* A unit of information equal to one binary digit. */
            'A99' => 'bit',
            /* A unit of count defining the number of balls (ball: object formed in the shapeof sphere). */
            'AA' => 'ball',
            /* A unit of count defining the number of items per bulk pack. */
            'AB' => 'bulk pack',
            /* acre */
            'ACR' => 'acre',
            /* A unit of count defining the number of activities (activity: a unit of work oraction). */
            'ACT' => 'activity',
            /* A unit of information equal to 8 bits. */
            'AD' => 'byte',
            /* ampere per metre */
            'AE' => 'ampere per metre',
            /* A unit of time defining the number of minutes in addition to the referencedminutes. */
            'AH' => 'additional minute',
            /* A unit of count defining the number of minutes for the average interval of acall. */
            'AI' => 'average minute per call',
            /* fathom */
            'AK' => 'fathom',
            /* A unit of count defining the number of telephone access lines. */
            'AL' => 'access line',
            /* A unit of electric charge defining the amount of charge accumulated by a steadyflow of one ampere for one hour. */
            'AMH' => 'ampere hour',
            /* ampere */
            'AMP' => 'ampere',
            /* Unit of time equal to 365,25 days. Synonym: Julian year */
            'ANN' => 'year',
            /* troy ounce or apothecary ounce */
            'APZ' => 'troy ounce or apothecary ounce',
            /* A unit of measure for blood potency (US). */
            'AQ' => 'anti-hemophilic factor (AHF) unit',
            /* A unit of count defining the number of assortments (assortment: set of itemsgrouped in a mixed collection). */
            'AS' => 'assortment',
            /* A unit of mass defining the alcoholic strength of a liquid. */
            'ASM' => 'alcoholic strength by mass',
            /* A unit of volume defining the alcoholic strength of a liquid (e.g. spirit,wine, beer, etc), often at a specific temperature. */
            'ASU' => 'alcoholic strength by volume',
            /* standard atmosphere */
            'ATM' => 'standard atmosphere',
            /* A unit of distance used for measuring the diameter of small tubes or wires suchas the outer diameter of hypotermic or suture needles. */
            'AWG' => 'american wire gauge',
            /* A unit of count defining the number of assemblies (assembly: items that consistof component parts). */
            'AY' => 'assembly',
            /* British thermal unit (international table) per pound */
            'AZ' => 'British thermal unit (international table) per pound',
            /* barrel (US) per day */
            'B1' => 'barrel (US) per day',
            /* A unit of information equal to one binary digit per second. */
            'B10' => 'bit per second',
            /* joule per kilogram kelvin */
            'B11' => 'joule per kilogram kelvin',
            /* joule per metre */
            'B12' => 'joule per metre',
            /* Synonym: joule per metre squared */
            'B13' => 'joule per square metre',
            /* joule per metre to the fourth power */
            'B14' => 'joule per metre to the fourth power',
            /* joule per mole */
            'B15' => 'joule per mole',
            /* joule per mole kelvin */
            'B16' => 'joule per mole kelvin',
            /* A unit of count defining the number of entries made to the credit side of anaccount. */
            'B17' => 'credit',
            /* joule second */
            'B18' => 'joule second',
            /* A unit of information defining the quantity of numerals used to form anumber. */
            'B19' => 'digit',
            /* joule square metre per kilogram */
            'B20' => 'joule square metre per kilogram',
            /* kelvin per watt */
            'B21' => 'kelvin per watt',
            /* kiloampere */
            'B22' => 'kiloampere',
            /* kiloampere per square metre */
            'B23' => 'kiloampere per square metre',
            /* kiloampere per metre */
            'B24' => 'kiloampere per metre',
            /* kilobecquerel per kilogram */
            'B25' => 'kilobecquerel per kilogram',
            /* kilocoulomb */
            'B26' => 'kilocoulomb',
            /* kilocoulomb per cubic metre */
            'B27' => 'kilocoulomb per cubic metre',
            /* kilocoulomb per square metre */
            'B28' => 'kilocoulomb per square metre',
            /* kiloelectronvolt */
            'B29' => 'kiloelectronvolt',
            /* A unit of mass defining the number of pounds of wadded fibre. */
            'B3' => 'batting pound',
            /* A unit of information equal to 2³⁰ bits (binary digits). */
            'B30' => 'gibibit',
            /* kilogram metre per second */
            'B31' => 'kilogram metre per second',
            /* kilogram metre squared */
            'B32' => 'kilogram metre squared',
            /* kilogram metre squared per second */
            'B33' => 'kilogram metre squared per second',
            /* kilogram per cubic decimetre */
            'B34' => 'kilogram per cubic decimetre',
            /* kilogram per litre */
            'B35' => 'kilogram per litre',
            /* A unit of volume used to measure beer. One beer barrel equals 36 imperialgallons. */
            'B4' => 'barrel, imperial',
            /* kilojoule per kelvin */
            'B41' => 'kilojoule per kelvin',
            /* kilojoule per kilogram */
            'B42' => 'kilojoule per kilogram',
            /* kilojoule per kilogram kelvin */
            'B43' => 'kilojoule per kilogram kelvin',
            /* kilojoule per mole */
            'B44' => 'kilojoule per mole',
            /* kilomole */
            'B45' => 'kilomole',
            /* kilomole per cubic metre */
            'B46' => 'kilomole per cubic metre',
            /* kilonewton */
            'B47' => 'kilonewton',
            /* kilonewton metre */
            'B48' => 'kilonewton metre',
            /* kiloohm */
            'B49' => 'kiloohm',
            /* kiloohm metre */
            'B50' => 'kiloohm metre',
            /* kilosecond */
            'B52' => 'kilosecond',
            /* kilosiemens */
            'B53' => 'kilosiemens',
            /* kilosiemens per metre */
            'B54' => 'kilosiemens per metre',
            /* kilovolt per metre */
            'B55' => 'kilovolt per metre',
            /* kiloweber per metre */
            'B56' => 'kiloweber per metre',
            /* A unit of length defining the distance that light travels in a vacuum in oneyear. */
            'B57' => 'light year',
            /* litre per mole */
            'B58' => 'litre per mole',
            /* lumen hour */
            'B59' => 'lumen hour',
            /* lumen per square metre */
            'B60' => 'lumen per square metre',
            /* lumen per watt */
            'B61' => 'lumen per watt',
            /* lumen second */
            'B62' => 'lumen second',
            /* lux hour */
            'B63' => 'lux hour',
            /* lux second */
            'B64' => 'lux second',
            /* megaampere per square metre */
            'B66' => 'megaampere per square metre',
            /* megabecquerel per kilogram */
            'B67' => 'megabecquerel per kilogram',
            /* A unit of information equal to 10⁹ bits (binary digits). */
            'B68' => 'gigabit',
            /* megacoulomb per cubic metre */
            'B69' => 'megacoulomb per cubic metre',
            /* A unit of count defining the number of cycles (cycle: a recurrent period ofdefinite duration). */
            'B7' => 'cycle',
            /* megacoulomb per square metre */
            'B70' => 'megacoulomb per square metre',
            /* megaelectronvolt */
            'B71' => 'megaelectronvolt',
            /* megagram per cubic metre */
            'B72' => 'megagram per cubic metre',
            /* meganewton */
            'B73' => 'meganewton',
            /* meganewton metre */
            'B74' => 'meganewton metre',
            /* megaohm */
            'B75' => 'megaohm',
            /* megaohm metre */
            'B76' => 'megaohm metre',
            /* megasiemens per metre */
            'B77' => 'megasiemens per metre',
            /* megavolt */
            'B78' => 'megavolt',
            /* megavolt per metre */
            'B79' => 'megavolt per metre',
            /* joule per cubic metre */
            'B8' => 'joule per cubic metre',
            /* A unit of information equal to 10⁹ bits (binary digits) persecond. */
            'B80' => 'gigabit per second',
            /* reciprocal metre squared reciprocal second */
            'B81' => 'reciprocal metre squared reciprocal second',
            /* A unit of length defining the number of inches per linear foot. */
            'B82' => 'inch per linear foot',
            /* metre to the fourth power */
            'B83' => 'metre to the fourth power',
            /* microampere */
            'B84' => 'microampere',
            /* microbar */
            'B85' => 'microbar',
            /* microcoulomb */
            'B86' => 'microcoulomb',
            /* microcoulomb per cubic metre */
            'B87' => 'microcoulomb per cubic metre',
            /* microcoulomb per square metre */
            'B88' => 'microcoulomb per square metre',
            /* microfarad per metre */
            'B89' => 'microfarad per metre',
            /* microhenry */
            'B90' => 'microhenry',
            /* microhenry per metre */
            'B91' => 'microhenry per metre',
            /* micronewton */
            'B92' => 'micronewton',
            /* micronewton metre */
            'B93' => 'micronewton metre',
            /* microohm */
            'B94' => 'microohm',
            /* microohm metre */
            'B95' => 'microohm metre',
            /* micropascal */
            'B96' => 'micropascal',
            /* microradian */
            'B97' => 'microradian',
            /* microsecond */
            'B98' => 'microsecond',
            /* microsiemens */
            'B99' => 'microsiemens',
            /* bar [unit of pressure] */
            'BAR' => 'bar [unit of pressure]',
            /* A unit of area of 112 sheets of tin mil products (tin plate, tin free steel orblack plate) 14 by 20 inches, or 31,360 square inches. */
            'BB' => 'base box',
            /* A unit of volume defining the number of cords (cord: a stack of firewood of 128cubic feet). */
            'BFT' => 'board foot',
            /* brake horse power */
            'BHP' => 'brake horse power',
            /* Synonym: trillion (US) */
            'BIL' => 'billion (EUR)',
            /* dry barrel (US) */
            'BLD' => 'dry barrel (US)',
            /* barrel (US) */
            'BLL' => 'barrel (US)',
            /* A unit of volume equal to one hundred board foot. */
            'BP' => 'hundred board foot',
            /* The number of beats per minute. */
            'BPM' => 'beats per minute',
            /* becquerel */
            'BQL' => 'becquerel',
            /* British thermal unit (international table) */
            'BTU' => 'British thermal unit (international table)',
            /* bushel (US) */
            'BUA' => 'bushel (US)',
            /* bushel (UK) */
            'BUI' => 'bushel (UK)',
            /* A unit of count defining the number of calls (call: communication session orvisitation). */
            'C0' => 'call',
            /* millifarad */
            'C10' => 'millifarad',
            /* milligal */
            'C11' => 'milligal',
            /* milligram per metre */
            'C12' => 'milligram per metre',
            /* milligray */
            'C13' => 'milligray',
            /* millihenry */
            'C14' => 'millihenry',
            /* millijoule */
            'C15' => 'millijoule',
            /* millimetre per second */
            'C16' => 'millimetre per second',
            /* millimetre squared per second */
            'C17' => 'millimetre squared per second',
            /* millimole */
            'C18' => 'millimole',
            /* mole per kilogram */
            'C19' => 'mole per kilogram',
            /* millinewton */
            'C20' => 'millinewton',
            /* A unit of information equal to 2¹⁰ (1024) bits (binary digits). */
            'C21' => 'kibibit',
            /* millinewton per metre */
            'C22' => 'millinewton per metre',
            /* milliohm metre */
            'C23' => 'milliohm metre',
            /* millipascal second */
            'C24' => 'millipascal second',
            /* milliradian */
            'C25' => 'milliradian',
            /* millisecond */
            'C26' => 'millisecond',
            /* millisiemens */
            'C27' => 'millisiemens',
            /* millisievert */
            'C28' => 'millisievert',
            /* millitesla */
            'C29' => 'millitesla',
            /* microvolt per metre */
            'C3' => 'microvolt per metre',
            /* millivolt per metre */
            'C30' => 'millivolt per metre',
            /* milliwatt */
            'C31' => 'milliwatt',
            /* milliwatt per square metre */
            'C32' => 'milliwatt per square metre',
            /* milliweber */
            'C33' => 'milliweber',
            /* mole */
            'C34' => 'mole',
            /* mole per cubic decimetre */
            'C35' => 'mole per cubic decimetre',
            /* mole per cubic metre */
            'C36' => 'mole per cubic metre',
            /* A unit of information equal to 10³ (1000) bits (binary digits). */
            'C37' => 'kilobit',
            /* mole per litre */
            'C38' => 'mole per litre',
            /* nanoampere */
            'C39' => 'nanoampere',
            /* nanocoulomb */
            'C40' => 'nanocoulomb',
            /* nanofarad */
            'C41' => 'nanofarad',
            /* nanofarad per metre */
            'C42' => 'nanofarad per metre',
            /* nanohenry */
            'C43' => 'nanohenry',
            /* nanohenry per metre */
            'C44' => 'nanohenry per metre',
            /* nanometre */
            'C45' => 'nanometre',
            /* nanoohm metre */
            'C46' => 'nanoohm metre',
            /* nanosecond */
            'C47' => 'nanosecond',
            /* nanotesla */
            'C48' => 'nanotesla',
            /* nanowatt */
            'C49' => 'nanowatt',
            /* neper */
            'C50' => 'neper',
            /* neper per second */
            'C51' => 'neper per second',
            /* picometre */
            'C52' => 'picometre',
            /* newton metre second */
            'C53' => 'newton metre second',
            /* newton metre squared per kilogram squared */
            'C54' => 'newton metre squared per kilogram squared',
            /* newton per square metre */
            'C55' => 'newton per square metre',
            /* newton per square millimetre */
            'C56' => 'newton per square millimetre',
            /* newton second */
            'C57' => 'newton second',
            /* newton second per metre */
            'C58' => 'newton second per metre',
            /* A unit used in music to describe the ratio in frequency betweennotes. */
            'C59' => 'octave',
            /* ohm centimetre */
            'C60' => 'ohm centimetre',
            /* ohm metre */
            'C61' => 'ohm metre',
            /* Synonym: unit */
            'C62' => 'one',
            /* parsec */
            'C63' => 'parsec',
            /* pascal per kelvin */
            'C64' => 'pascal per kelvin',
            /* pascal second */
            'C65' => 'pascal second',
            /* pascal second per cubic metre */
            'C66' => 'pascal second per cubic metre',
            /* pascal second per metre */
            'C67' => 'pascal second per metre',
            /* petajoule */
            'C68' => 'petajoule',
            /* A unit of subjective sound loudness. A sound has loudness p phons if it seemsto the listener to be equal in loudness to the sound of a pure tone of frequency 1kilohertz and strength p decibels. */
            'C69' => 'phon',
            /* centipoise */
            'C7' => 'centipoise',
            /* picoampere */
            'C70' => 'picoampere',
            /* picocoulomb */
            'C71' => 'picocoulomb',
            /* picofarad per metre */
            'C72' => 'picofarad per metre',
            /* picohenry */
            'C73' => 'picohenry',
            /* A unit of information equal to 10³ (1000) bits (binary digits) persecond. */
            'C74' => 'kilobit per second',
            /* picowatt */
            'C75' => 'picowatt',
            /* picowatt per square metre */
            'C76' => 'picowatt per square metre',
            /* pound-force */
            'C78' => 'pound-force',
            /* A unit of accumulated energy of 1000 volt amperes over a period of onehour. */
            'C79' => 'kilovolt ampere hour',
            /* millicoulomb per kilogram */
            'C8' => 'millicoulomb per kilogram',
            /* rad */
            'C80' => 'rad',
            /* radian */
            'C81' => 'radian',
            /* radian square metre per mole */
            'C82' => 'radian square metre per mole',
            /* radian square metre per kilogram */
            'C83' => 'radian square metre per kilogram',
            /* radian per metre */
            'C84' => 'radian per metre',
            /* reciprocal angstrom */
            'C85' => 'reciprocal angstrom',
            /* reciprocal cubic metre */
            'C86' => 'reciprocal cubic metre',
            /* Synonym: reciprocal second per cubic metre */
            'C87' => 'reciprocal cubic metre per second',
            /* reciprocal electron volt per cubic metre */
            'C88' => 'reciprocal electron volt per cubic metre',
            /* reciprocal henry */
            'C89' => 'reciprocal henry',
            /* A unit of count defining the number of coil groups (coil group: groups of itemsarranged by lengths of those items placed in a joined sequence of concentriccircles). */
            'C9' => 'coil group',
            /* reciprocal joule per cubic metre */
            'C90' => 'reciprocal joule per cubic metre',
            /* reciprocal kelvin or kelvin to the power minus one */
            'C91' => 'reciprocal kelvin or kelvin to the power minus one',
            /* reciprocal metre */
            'C92' => 'reciprocal metre',
            /* Synonym: reciprocal metre squared */
            'C93' => 'reciprocal square metre',
            /* reciprocal minute */
            'C94' => 'reciprocal minute',
            /* reciprocal mole */
            'C95' => 'reciprocal mole',
            /* reciprocal pascal or pascal to the power minus one */
            'C96' => 'reciprocal pascal or pascal to the power minus one',
            /* reciprocal second */
            'C97' => 'reciprocal second',
            /* reciprocal second per metre squared */
            'C99' => 'reciprocal second per metre squared',
            /* A unit of mass defining the carrying capacity, expressed as the number ofmetric tons. */
            'CCT' => 'carrying capacity in metric ton',
            /* candela */
            'CDL' => 'candela',
            /* Refer ISO 80000-5 (Quantities and units — Part 5: Thermodynamics) */
            'CEL' => 'degree Celsius',
            /* A unit of count defining the number of units in multiples of 100. */
            'CEN' => 'hundred',
            /* A unit of count defining the number of units of card (card: thick stiff paperor cardboard). */
            'CG' => 'card',
            /* centigram */
            'CGM' => 'centigram',
            /* coulomb per kilogram */
            'CKG' => 'coulomb per kilogram',
            /* A unit of count defining the number of leaves, expressed in units of onehundred leaves. */
            'CLF' => 'hundred leave',
            /* centilitre */
            'CLT' => 'centilitre',
            /* square centimetre */
            'CMK' => 'square centimetre',
            /* cubic centimetre */
            'CMQ' => 'cubic centimetre',
            /* centimetre */
            'CMT' => 'centimetre',
            /* A unit of count defining the number of hundred-packs (hundred-pack: set of onehundred items packaged together). */
            'CNP' => 'hundred pack',
            /* A unit of mass equal to one hundred weight (US). */
            'CNT' => 'cental (UK)',
            /* coulomb */
            'COU' => 'coulomb',
            /* A unit of mass defining the number of grams of a named item in aproduct. */
            'CTG' => 'content gram',
            /* metric carat */
            'CTM' => 'metric carat',
            /* A unit of mass defining the number of metric tons of a named item in aproduct. */
            'CTN' => 'content ton (metric)',
            /* curie */
            'CUR' => 'curie',
            /* hundred pound (cwt) / hundred weight (US) */
            'CWA' => 'hundred pound (cwt) / hundred weight (US)',
            /* hundred weight (UK) */
            'CWI' => 'hundred weight (UK)',
            /* A unit of accumulated energy of a thousand watts over a period of onehour. */
            'D03' => 'kilowatt hour per hour',
            /* A unit of weight equal to about 1/2 ounce or 15 grams. */
            'D04' => 'lot [unit of weight]',
            /* reciprocal second per steradian */
            'D1' => 'reciprocal second per steradian',
            /* siemens per metre */
            'D10' => 'siemens per metre',
            /* A unit of information equal to 2²⁰ (1048576) bits (binarydigits). */
            'D11' => 'mebibit',
            /* siemens square metre per mole */
            'D12' => 'siemens square metre per mole',
            /* sievert */
            'D13' => 'sievert',
            /* A unit of subjective sound loudness. One sone is the loudness of a pure tone offrequency one kilohertz and strength 40 decibels. */
            'D15' => 'sone',
            /* square centimetre per erg */
            'D16' => 'square centimetre per erg',
            /* square centimetre per steradian erg */
            'D17' => 'square centimetre per steradian erg',
            /* metre kelvin */
            'D18' => 'metre kelvin',
            /* square metre kelvin per watt */
            'D19' => 'square metre kelvin per watt',
            /* reciprocal second per steradian metre squared */
            'D2' => 'reciprocal second per steradian metre squared',
            /* square metre per joule */
            'D20' => 'square metre per joule',
            /* square metre per kilogram */
            'D21' => 'square metre per kilogram',
            /* square metre per mole */
            'D22' => 'square metre per mole',
            /* A unit of count defining the number of grams of amino acid prescribed forparenteral/enteral therapy. */
            'D23' => 'pen gram (protein)',
            /* square metre per steradian */
            'D24' => 'square metre per steradian',
            /* square metre per steradian joule */
            'D25' => 'square metre per steradian joule',
            /* square metre per volt second */
            'D26' => 'square metre per volt second',
            /* steradian */
            'D27' => 'steradian',
            /* terahertz */
            'D29' => 'terahertz',
            /* terajoule */
            'D30' => 'terajoule',
            /* terawatt */
            'D31' => 'terawatt',
            /* terawatt hour */
            'D32' => 'terawatt hour',
            /* tesla */
            'D33' => 'tesla',
            /* A unit of yarn density. One decitex equals a mass of 1 gram per 1 kilometre oflength. */
            'D34' => 'tex',
            /* A unit of information equal to 10⁶ (1000000) bits (binarydigits). */
            'D36' => 'megabit',
            /* tonne per cubic metre */
            'D41' => 'tonne per cubic metre',
            /* tropical year */
            'D42' => 'tropical year',
            /* unified atomic mass unit */
            'D43' => 'unified atomic mass unit',
            /* The name of the unit is an acronym for volt-ampere-reactive. */
            'D44' => 'var',
            /* volt squared per kelvin squared */
            'D45' => 'volt squared per kelvin squared',
            /* volt - ampere */
            'D46' => 'volt - ampere',
            /* volt per centimetre */
            'D47' => 'volt per centimetre',
            /* volt per kelvin */
            'D48' => 'volt per kelvin',
            /* millivolt per kelvin */
            'D49' => 'millivolt per kelvin',
            /* kilogram per square centimetre */
            'D5' => 'kilogram per square centimetre',
            /* volt per metre */
            'D50' => 'volt per metre',
            /* volt per millimetre */
            'D51' => 'volt per millimetre',
            /* watt per kelvin */
            'D52' => 'watt per kelvin',
            /* watt per metre kelvin */
            'D53' => 'watt per metre kelvin',
            /* watt per square metre */
            'D54' => 'watt per square metre',
            /* watt per square metre kelvin */
            'D55' => 'watt per square metre kelvin',
            /* watt per square metre kelvin to the fourth power */
            'D56' => 'watt per square metre kelvin to the fourth power',
            /* watt per steradian */
            'D57' => 'watt per steradian',
            /* watt per steradian square metre */
            'D58' => 'watt per steradian square metre',
            /* weber per metre */
            'D59' => 'weber per metre',
            /* roentgen per second */
            'D6' => 'roentgen per second',
            /* weber per millimetre */
            'D60' => 'weber per millimetre',
            /* minute [unit of angle] */
            'D61' => 'minute [unit of angle]',
            /* second [unit of angle] */
            'D62' => 'second [unit of angle]',
            /* A unit of count defining the number of books (book: set of items bound togetheror written document of a material whole). */
            'D63' => 'book',
            /* A unit of count defining the number of rounds (round: A circular or cylindricalobject). */
            'D65' => 'round',
            /* A unit of count defining the number of words. */
            'D68' => 'number of words',
            /* inch to the fourth power */
            'D69' => 'inch to the fourth power',
            /* joule square metre */
            'D73' => 'joule square metre',
            /* kilogram per mole */
            'D74' => 'kilogram per mole',
            /* megacoulomb */
            'D77' => 'megacoulomb',
            /* A unit of accumulated energy equal to one million joules persecond. */
            'D78' => 'megajoule per second',
            /* microwatt */
            'D80' => 'microwatt',
            /* microtesla */
            'D81' => 'microtesla',
            /* microvolt */
            'D82' => 'microvolt',
            /* millinewton metre */
            'D83' => 'millinewton metre',
            /* microwatt per square metre */
            'D85' => 'microwatt per square metre',
            /* millicoulomb */
            'D86' => 'millicoulomb',
            /* millimole per kilogram */
            'D87' => 'millimole per kilogram',
            /* millicoulomb per cubic metre */
            'D88' => 'millicoulomb per cubic metre',
            /* millicoulomb per square metre */
            'D89' => 'millicoulomb per square metre',
            /* rem */
            'D91' => 'rem',
            /* second per cubic metre */
            'D93' => 'second per cubic metre',
            /* second per cubic metre radian */
            'D94' => 'second per cubic metre radian',
            /* joule per gram */
            'D95' => 'joule per gram',
            /* decare */
            'DAA' => 'decare',
            /* A unit of time defining the number of days in multiples of 10. */
            'DAD' => 'ten day',
            /* day */
            'DAY' => 'day',
            /* A unit of mass defining the number of pounds of a product, disregarding thewater content of the product. */
            'DB' => 'dry pound',
            /* degree [unit of angle] */
            'DD' => 'degree [unit of angle]',
            /* A unit of count defining the number of decades (decade: quantity equal to 10 ortime equal to 10 years). */
            'DEC' => 'decade',
            /* decigram */
            'DG' => 'decigram',
            /* decagram */
            'DJ' => 'decagram',
            /* decilitre */
            'DLT' => 'decilitre',
            /* cubic decametre */
            'DMA' => 'cubic decametre',
            /* square decimetre */
            'DMK' => 'square decimetre',
            /* A unit of volume defining the number of kilolitres of a product at atemperature of 15 degrees Celsius, especially in relation to hydrocarbonoils. */
            'DMO' => 'standard kilolitre',
            /* cubic decimetre */
            'DMQ' => 'cubic decimetre',
            /* decimetre */
            'DMT' => 'decimetre',
            /* decinewton metre */
            'DN' => 'decinewton metre',
            /* A unit of count defining the number of pieces in multiples of 12 (piece: asingle item, article or exemplar). */
            'DPC' => 'dozen piece',
            /* A unit of count defining the number of pairs in multiples of 12 (pair: itemdescribed by two's). */
            'DPR' => 'dozen pair',
            /* A unit of mass defining the volume of sea water a ship displaces, expressed asthe number of tons. */
            'DPT' => 'displacement tonnage',
            /* Synonym: drachm (UK), troy dram */
            'DRA' => 'dram (US)',
            /* Synonym: avoirdupois dram */
            'DRI' => 'dram (UK)',
            /* A unit of count defining the number of rolls, expressed in twelve rollunits. */
            'DRL' => 'dozen roll',
            /* A unit of mass defining the number of tons of a product, disregarding the watercontent of the product. */
            'DT' => 'dry ton',
            /* Synonym: centner, metric 100 kg; quintal, metric 100 kg */
            'DTN' => 'decitonne',
            /* pennyweight */
            'DWT' => 'pennyweight',
            /* A unit of count defining the number of units in multiples of 12. */
            'DZN' => 'dozen',
            /* A unit of count defining the number of packs in multiples of 12 (pack: standardpackaging unit). */
            'DZP' => 'dozen pack',
            /* A measure of pressure expressed in newtons per square centimetre. */
            'E01' => 'newton per square centimetre',
            /* A unit of accumulated energy of a million watts over a period of onehour. */
            'E07' => 'megawatt hour per hour',
            /* A unit of energy expressed as the load change in million watts that will causea frequency shift of one hertz. */
            'E08' => 'megawatt per hertz',
            /* A unit of power load delivered at the rate of one thousandth of an ampere overa period of one hour. */
            'E09' => 'milliampere hour',
            /* A unit of measure used in meteorology and engineering to measure the demand forheating or cooling over a given period of days. */
            'E10' => 'degree day',
            /* A unit of count defining the number of cigarettes in units of1000. */
            'E12' => 'mille',
            /* A unit of heat energy equal to one thousand calories. */
            'E14' => 'kilocalorie (international table)',
            /* A unit of energy equal to one thousand calories per hour. */
            'E15' => 'kilocalorie (thermochemical) per hour',
            /* A unit of power equal to one million British thermal units perhour. */
            'E16' => 'million Btu(IT) per hour',
            /* A unit of volume equal to one cubic foot passing a given point in a period ofone second. */
            'E17' => 'cubic foot per second',
            /* A unit of weight or mass equal to one tonne per hour. */
            'E18' => 'tonne per hour',
            /* A unit of area equal to 3.3 square metres. */
            'E19' => 'ping',
            /* A unit of information equal to 10⁶ (1000000) bits (binary digits) persecond. */
            'E20' => 'megabit per second',
            /* A unit of count defining the number of shares (share: a total or portion of theparts into which a business entity’s capital is divided). */
            'E21' => 'shares',
            /* A unit of count defining the number of twenty-foot equivalent units (TEUs) as ameasure of containerized cargo capacity. */
            'E22' => 'TEU',
            /* A unit of count defining the number of tyres (a solid or air-filled coveringplaced around a wheel rim to form a soft contact with the road, absorb shock and providetraction). */
            'E23' => 'tyre',
            /* A unit of count defining the number of active units within asubstance. */
            'E25' => 'active unit',
            /* A unit of count defining the number of doses (dose: a definite quantity of amedicine or drug). */
            'E27' => 'dose',
            /* A unit of mass defining the number of tons of a product, disregarding the watercontent of the product. */
            'E28' => 'air dry ton',
            /* A unit of count defining the number of strands (strand: long, thin, flexible,single thread, strip of fibre, constituent filament or multiples of the same, twistedtogether). */
            'E30' => 'strand',
            /* A unit of count defining the number of square metres per litre. */
            'E31' => 'square metre per litre',
            /* A unit of count defining the number of litres per hour. */
            'E32' => 'litre per hour',
            /* A unit of count defining the number of feet per thousand units. */
            'E33' => 'foot per thousand',
            /* A unit of information equal to 10⁹ bytes. */
            'E34' => 'gigabyte',
            /* A unit of information equal to 10¹² bytes. */
            'E35' => 'terabyte',
            /* A unit of information equal to 10¹⁵ bytes. */
            'E36' => 'petabyte',
            /* A unit of count defining the number of pixels (pixel: pictureelement). */
            'E37' => 'pixel',
            /* A unit of count equal to 10⁶ (1000000) pixels (picture elements). */
            'E38' => 'megapixel',
            /* A unit of information defining the number of dots per linear inch as a measureof the resolution or sharpness of a graphic image. */
            'E39' => 'dots per inch',
            /* A unit of mass defining the total number of kilograms beforedeductions. */
            'E4' => 'gross kilogram',
            /* A unit of proportion equal to 10⁻⁵. */
            'E40' => 'part per hundred thousand',
            /* A unit of pressure defining the number of kilograms force per squaremillimetre. */
            'E41' => 'kilogram-force per square millimetre',
            /* A unit of pressure defining the number of kilograms force per squarecentimetre. */
            'E42' => 'kilogram-force per square centimetre',
            /* A unit of energy defining the number of joules per squarecentimetre. */
            'E43' => 'joule per square centimetre',
            /* A unit of torsion defining the torque kilogram-force metre per squarecentimetre. */
            'E44' => 'kilogram-force metre per square centimetre',
            /* milliohm */
            'E45' => 'milliohm',
            /* A unit of energy consumption expressed as kilowatt hour per cubicmetre. */
            'E46' => 'kilowatt hour per cubic metre',
            /* A unit of energy consumption expressed as kilowatt hour perkelvin. */
            'E47' => 'kilowatt hour per kelvin',
            /* A unit of count defining the number of service units (service unit: definedperiod / property / facility / utility of supply). */
            'E48' => 'service unit',
            /* A unit of count defining the number of working days (working day: a day onwhich work is ordinarily performed). */
            'E49' => 'working day',
            /* A unit of count defining the number of accounting units. */
            'E50' => 'accounting unit',
            /* A unit of count defining the number of jobs. */
            'E51' => 'job',
            /* A unit of count defining the number feet per run. */
            'E52' => 'run foot',
            /* A unit of count defining the number of tests. */
            'E53' => 'test',
            /* A unit of count defining the number of trips. */
            'E54' => 'trip',
            /* A unit of count defining the number of times an object is used. */
            'E55' => 'use',
            /* A unit of count defining the number of wells. */
            'E56' => 'well',
            /* A unit of count defining the number of zones. */
            'E57' => 'zone',
            /* A unit of information equal to 10¹⁸ bits (binary digits) persecond. */
            'E58' => 'exabit per second',
            /* A unit of information equal to 2⁶⁰ bytes. */
            'E59' => 'exbibyte',
            /* A unit of information equal to 2⁵⁰ bytes. */
            'E60' => 'pebibyte',
            /* A unit of information equal to 2⁴⁰ bytes. */
            'E61' => 'tebibyte',
            /* A unit of information equal to 2³⁰ bytes. */
            'E62' => 'gibibyte',
            /* A unit of information equal to 2²⁰ bytes. */
            'E63' => 'mebibyte',
            /* A unit of information equal to 2¹⁰ bytes. */
            'E64' => 'kibibyte',
            /* A unit of information equal to 2⁶⁰ bits (binary digits) permetre. */
            'E65' => 'exbibit per metre',
            /* A unit of information equal to 2⁶⁰ bits (binary digits) per squaremetre. */
            'E66' => 'exbibit per square metre',
            /* A unit of information equal to 2⁶⁰ bits (binary digits) per cubicmetre. */
            'E67' => 'exbibit per cubic metre',
            /* A unit of information equal to 10⁹ bytes per second. */
            'E68' => 'gigabyte per second',
            /* A unit of information equal to 2³⁰ bits (binary digits) permetre. */
            'E69' => 'gibibit per metre',
            /* A unit of information equal to 2³⁰ bits (binary digits) per squaremetre. */
            'E70' => 'gibibit per square metre',
            /* A unit of information equal to 2³⁰ bits (binary digits) per cubicmetre. */
            'E71' => 'gibibit per cubic metre',
            /* A unit of information equal to 2¹⁰ bits (binary digits) permetre. */
            'E72' => 'kibibit per metre',
            /* A unit of information equal to 2¹⁰ bits (binary digits) per squaremetre. */
            'E73' => 'kibibit per square metre',
            /* A unit of information equal to 2¹⁰ bits (binary digits) per cubicmetre. */
            'E74' => 'kibibit per cubic metre',
            /* A unit of information equal to 2²⁰ bits (binary digits) permetre. */
            'E75' => 'mebibit per metre',
            /* A unit of information equal to 2²⁰ bits (binary digits) per squaremetre. */
            'E76' => 'mebibit per square metre',
            /* A unit of information equal to 2²⁰ bits (binary digits) per cubicmetre. */
            'E77' => 'mebibit per cubic metre',
            /* A unit of information equal to 10¹⁵ bits (binary digits). */
            'E78' => 'petabit',
            /* A unit of information equal to 10¹⁵ bits (binary digits) persecond. */
            'E79' => 'petabit per second',
            /* A unit of information equal to 2⁵⁰ bits (binary digits) permetre. */
            'E80' => 'pebibit per metre',
            /* A unit of information equal to 2⁵⁰ bits (binary digits) per squaremetre. */
            'E81' => 'pebibit per square metre',
            /* A unit of information equal to 2⁵⁰ bits (binary digits) per cubicmetre. */
            'E82' => 'pebibit per cubic metre',
            /* A unit of information equal to 10¹² bits (binary digits). */
            'E83' => 'terabit',
            /* A unit of information equal to 10¹² bits (binary digits) persecond. */
            'E84' => 'terabit per second',
            /* A unit of information equal to 2⁴⁰ bits (binary digits) permetre. */
            'E85' => 'tebibit per metre',
            /* A unit of information equal to 2⁴⁰ bits (binary digits) per cubicmetre. */
            'E86' => 'tebibit per cubic metre',
            /* A unit of information equal to 2⁴⁰ bits (binary digits) per squaremetre. */
            'E87' => 'tebibit per square metre',
            /* A unit of information equal to 1 bit (binary digit) per metre. */
            'E88' => 'bit per metre',
            /* A unit of information equal to 1 bit (binary digit) per squaremetre. */
            'E89' => 'bit per square metre',
            /* reciprocal centimetre */
            'E90' => 'reciprocal centimetre',
            /* reciprocal day */
            'E91' => 'reciprocal day',
            /* cubic decimetre per hour */
            'E92' => 'cubic decimetre per hour',
            /* kilogram per hour */
            'E93' => 'kilogram per hour',
            /* kilomole per second */
            'E94' => 'kilomole per second',
            /* mole per second */
            'E95' => 'mole per second',
            /* degree per second */
            'E96' => 'degree per second',
            /* millimetre per degree Celcius metre */
            'E97' => 'millimetre per degree Celcius metre',
            /* degree Celsius per kelvin */
            'E98' => 'degree Celsius per kelvin',
            /* hectopascal per bar */
            'E99' => 'hectopascal per bar',
            /* A unit of count defining the number of items regarded as separateunits. */
            'EA' => 'each',
            /* A unit of count defining the number of electronic mail boxes. */
            'EB' => 'electronic mail box',
            /* A unit of volume defining the number of gallons of product produced fromconcentrate. */
            'EQ' => 'equivalent gallon',
            /* A unit of information equal to 1 bit (binary digit) per cubicmetre. */
            'F01' => 'bit per cubic metre',
            /* kelvin per kelvin */
            'F02' => 'kelvin per kelvin',
            /* kilopascal per bar */
            'F03' => 'kilopascal per bar',
            /* millibar per bar */
            'F04' => 'millibar per bar',
            /* megapascal per bar */
            'F05' => 'megapascal per bar',
            /* poise per bar */
            'F06' => 'poise per bar',
            /* pascal per bar */
            'F07' => 'pascal per bar',
            /* milliampere per inch */
            'F08' => 'milliampere per inch',
            /* kelvin per hour */
            'F10' => 'kelvin per hour',
            /* kelvin per minute */
            'F11' => 'kelvin per minute',
            /* kelvin per second */
            'F12' => 'kelvin per second',
            /* A unit of mass. One slug is the mass accelerated at 1 foot per second persecond by a force of 1 pound. */
            'F13' => 'slug',
            /* gram per kelvin */
            'F14' => 'gram per kelvin',
            /* kilogram per kelvin */
            'F15' => 'kilogram per kelvin',
            /* milligram per kelvin */
            'F16' => 'milligram per kelvin',
            /* pound-force per foot */
            'F17' => 'pound-force per foot',
            /* kilogram square centimetre */
            'F18' => 'kilogram square centimetre',
            /* kilogram square millimetre */
            'F19' => 'kilogram square millimetre',
            /* pound inch squared */
            'F20' => 'pound inch squared',
            /* pound-force inch */
            'F21' => 'pound-force inch',
            /* pound-force foot per ampere */
            'F22' => 'pound-force foot per ampere',
            /* gram per cubic decimetre */
            'F23' => 'gram per cubic decimetre',
            /* kilogram per kilomol */
            'F24' => 'kilogram per kilomol',
            /* gram per hertz */
            'F25' => 'gram per hertz',
            /* gram per day */
            'F26' => 'gram per day',
            /* gram per hour */
            'F27' => 'gram per hour',
            /* gram per minute */
            'F28' => 'gram per minute',
            /* gram per second */
            'F29' => 'gram per second',
            /* kilogram per day */
            'F30' => 'kilogram per day',
            /* kilogram per minute */
            'F31' => 'kilogram per minute',
            /* milligram per day */
            'F32' => 'milligram per day',
            /* milligram per minute */
            'F33' => 'milligram per minute',
            /* milligram per second */
            'F34' => 'milligram per second',
            /* gram per day kelvin */
            'F35' => 'gram per day kelvin',
            /* gram per hour kelvin */
            'F36' => 'gram per hour kelvin',
            /* gram per minute kelvin */
            'F37' => 'gram per minute kelvin',
            /* gram per second kelvin */
            'F38' => 'gram per second kelvin',
            /* kilogram per day kelvin */
            'F39' => 'kilogram per day kelvin',
            /* kilogram per hour kelvin */
            'F40' => 'kilogram per hour kelvin',
            /* kilogram per minute kelvin */
            'F41' => 'kilogram per minute kelvin',
            /* kilogram per second kelvin */
            'F42' => 'kilogram per second kelvin',
            /* milligram per day kelvin */
            'F43' => 'milligram per day kelvin',
            /* milligram per hour kelvin */
            'F44' => 'milligram per hour kelvin',
            /* milligram per minute kelvin */
            'F45' => 'milligram per minute kelvin',
            /* milligram per second kelvin */
            'F46' => 'milligram per second kelvin',
            /* newton per millimetre */
            'F47' => 'newton per millimetre',
            /* pound-force per inch */
            'F48' => 'pound-force per inch',
            /* A unit of distance equal to 5.5 yards (16 feet 6 inches). */
            'F49' => 'rod [unit of distance]',
            /* micrometre per kelvin */
            'F50' => 'micrometre per kelvin',
            /* centimetre per kelvin */
            'F51' => 'centimetre per kelvin',
            /* metre per kelvin */
            'F52' => 'metre per kelvin',
            /* millimetre per kelvin */
            'F53' => 'millimetre per kelvin',
            /* milliohm per metre */
            'F54' => 'milliohm per metre',
            /* ohm per mile (statute mile) */
            'F55' => 'ohm per mile (statute mile)',
            /* ohm per kilometre */
            'F56' => 'ohm per kilometre',
            /* milliampere per pound-force per square inch */
            'F57' => 'milliampere per pound-force per square inch',
            /* reciprocal bar */
            'F58' => 'reciprocal bar',
            /* milliampere per bar */
            'F59' => 'milliampere per bar',
            /* degree Celsius per bar */
            'F60' => 'degree Celsius per bar',
            /* kelvin per bar */
            'F61' => 'kelvin per bar',
            /* gram per day bar */
            'F62' => 'gram per day bar',
            /* gram per hour bar */
            'F63' => 'gram per hour bar',
            /* gram per minute bar */
            'F64' => 'gram per minute bar',
            /* gram per second bar */
            'F65' => 'gram per second bar',
            /* kilogram per day bar */
            'F66' => 'kilogram per day bar',
            /* kilogram per hour bar */
            'F67' => 'kilogram per hour bar',
            /* kilogram per minute bar */
            'F68' => 'kilogram per minute bar',
            /* kilogram per second bar */
            'F69' => 'kilogram per second bar',
            /* milligram per day bar */
            'F70' => 'milligram per day bar',
            /* milligram per hour bar */
            'F71' => 'milligram per hour bar',
            /* milligram per minute bar */
            'F72' => 'milligram per minute bar',
            /* milligram per second bar */
            'F73' => 'milligram per second bar',
            /* gram per bar */
            'F74' => 'gram per bar',
            /* milligram per bar */
            'F75' => 'milligram per bar',
            /* milliampere per millimetre */
            'F76' => 'milliampere per millimetre',
            /* pascal second per kelvin */
            'F77' => 'pascal second per kelvin',
            /* inch of water */
            'F78' => 'inch of water',
            /* inch of mercury */
            'F79' => 'inch of mercury',
            /* A unit of power defining the amount of power required to move a given volume ofwater against acceleration of gravity to a specified elevation (pressurehead). */
            'F80' => 'water horse power',
            /* bar per kelvin */
            'F81' => 'bar per kelvin',
            /* hectopascal per kelvin */
            'F82' => 'hectopascal per kelvin',
            /* kilopascal per kelvin */
            'F83' => 'kilopascal per kelvin',
            /* millibar per kelvin */
            'F84' => 'millibar per kelvin',
            /* megapascal per kelvin */
            'F85' => 'megapascal per kelvin',
            /* poise per kelvin */
            'F86' => 'poise per kelvin',
            /* volt per litre minute */
            'F87' => 'volt per litre minute',
            /* newton centimetre */
            'F88' => 'newton centimetre',
            /* newton metre per degree */
            'F89' => 'newton metre per degree',
            /* newton metre per ampere */
            'F90' => 'newton metre per ampere',
            /* bar litre per second */
            'F91' => 'bar litre per second',
            /* bar cubic metre per second */
            'F92' => 'bar cubic metre per second',
            /* hectopascal litre per second */
            'F93' => 'hectopascal litre per second',
            /* hectopascal cubic metre per second */
            'F94' => 'hectopascal cubic metre per second',
            /* millibar litre per second */
            'F95' => 'millibar litre per second',
            /* millibar cubic metre per second */
            'F96' => 'millibar cubic metre per second',
            /* megapascal litre per second */
            'F97' => 'megapascal litre per second',
            /* megapascal cubic metre per second */
            'F98' => 'megapascal cubic metre per second',
            /* pascal litre per second */
            'F99' => 'pascal litre per second',
            /* Refer ISO 80000-5 (Quantities and units — Part 5: Thermodynamics) */
            'FAH' => 'degree Fahrenheit',
            /* farad */
            'FAR' => 'farad',
            /* A unit of length defining the number of metres of individualfibre. */
            'FBM' => 'fibre metre',
            /* A unit of volume equal to one thousand cubic foot. */
            'FC' => 'thousand cubic foot',
            /* A unit of volume equal to one hundred cubic metres. */
            'FF' => 'hundred cubic metre',
            /* micromole */
            'FH' => 'micromole',
            /* A unit of count defining the number of failures that can be expected over aspecified time interval. Failure rates of semiconductor components are often specifiedas FIT (failures in time unit) where 1 FIT' => 10⁻⁹ /h. */
            'FIT' => 'failures in time',
            /* A unit of mass defining the number of tons of a flaked substance (flake: asmall flattish fragment). */
            'FL' => 'flake ton',
            /* foot */
            'FOT' => 'foot',
            /* pound per square foot */
            'FP' => 'pound per square foot',
            /* foot per minute */
            'FR' => 'foot per minute',
            /* foot per second */
            'FS' => 'foot per second',
            /* square foot */
            'FTK' => 'square foot',
            /* cubic foot */
            'FTQ' => 'cubic foot',
            /* pascal cubic metre per second */
            'G01' => 'pascal cubic metre per second',
            /* centimetre per bar */
            'G04' => 'centimetre per bar',
            /* metre per bar */
            'G05' => 'metre per bar',
            /* millimetre per bar */
            'G06' => 'millimetre per bar',
            /* square inch per second */
            'G08' => 'square inch per second',
            /* square metre per second kelvin */
            'G09' => 'square metre per second kelvin',
            /* stokes per kelvin */
            'G10' => 'stokes per kelvin',
            /* gram per cubic centimetre bar */
            'G11' => 'gram per cubic centimetre bar',
            /* gram per cubic decimetre bar */
            'G12' => 'gram per cubic decimetre bar',
            /* gram per litre bar */
            'G13' => 'gram per litre bar',
            /* gram per cubic metre bar */
            'G14' => 'gram per cubic metre bar',
            /* gram per millilitre bar */
            'G15' => 'gram per millilitre bar',
            /* kilogram per cubic centimetre bar */
            'G16' => 'kilogram per cubic centimetre bar',
            /* kilogram per litre bar */
            'G17' => 'kilogram per litre bar',
            /* kilogram per cubic metre bar */
            'G18' => 'kilogram per cubic metre bar',
            /* newton metre per kilogram */
            'G19' => 'newton metre per kilogram',
            /* US gallon per minute */
            'G2' => 'US gallon per minute',
            /* pound-force foot per pound */
            'G20' => 'pound-force foot per pound',
            /* cup [unit of volume] */
            'G21' => 'cup [unit of volume]',
            /* peck */
            'G23' => 'peck',
            /* tablespoon (US) */
            'G24' => 'tablespoon (US)',
            /* teaspoon (US) */
            'G25' => 'teaspoon (US)',
            /* stere */
            'G26' => 'stere',
            /* cubic centimetre per kelvin */
            'G27' => 'cubic centimetre per kelvin',
            /* litre per kelvin */
            'G28' => 'litre per kelvin',
            /* cubic metre per kelvin */
            'G29' => 'cubic metre per kelvin',
            /* Imperial gallon per minute */
            'G3' => 'Imperial gallon per minute',
            /* millilitre per kelvin */
            'G30' => 'millilitre per kelvin',
            /* kilogram per cubic centimetre */
            'G31' => 'kilogram per cubic centimetre',
            /* ounce (avoirdupois) per cubic yard */
            'G32' => 'ounce (avoirdupois) per cubic yard',
            /* gram per cubic centimetre kelvin */
            'G33' => 'gram per cubic centimetre kelvin',
            /* gram per cubic decimetre kelvin */
            'G34' => 'gram per cubic decimetre kelvin',
            /* gram per litre kelvin */
            'G35' => 'gram per litre kelvin',
            /* gram per cubic metre kelvin */
            'G36' => 'gram per cubic metre kelvin',
            /* gram per millilitre kelvin */
            'G37' => 'gram per millilitre kelvin',
            /* kilogram per cubic centimetre kelvin */
            'G38' => 'kilogram per cubic centimetre kelvin',
            /* kilogram per litre kelvin */
            'G39' => 'kilogram per litre kelvin',
            /* kilogram per cubic metre kelvin */
            'G40' => 'kilogram per cubic metre kelvin',
            /* square metre per second bar */
            'G41' => 'square metre per second bar',
            /* microsiemens per centimetre */
            'G42' => 'microsiemens per centimetre',
            /* microsiemens per metre */
            'G43' => 'microsiemens per metre',
            /* nanosiemens per centimetre */
            'G44' => 'nanosiemens per centimetre',
            /* nanosiemens per metre */
            'G45' => 'nanosiemens per metre',
            /* stokes per bar */
            'G46' => 'stokes per bar',
            /* cubic centimetre per day */
            'G47' => 'cubic centimetre per day',
            /* cubic centimetre per hour */
            'G48' => 'cubic centimetre per hour',
            /* cubic centimetre per minute */
            'G49' => 'cubic centimetre per minute',
            /* gallon (US) per hour */
            'G50' => 'gallon (US) per hour',
            /* litre per second */
            'G51' => 'litre per second',
            /* cubic metre per day */
            'G52' => 'cubic metre per day',
            /* cubic metre per minute */
            'G53' => 'cubic metre per minute',
            /* millilitre per day */
            'G54' => 'millilitre per day',
            /* millilitre per hour */
            'G55' => 'millilitre per hour',
            /* cubic inch per hour */
            'G56' => 'cubic inch per hour',
            /* cubic inch per minute */
            'G57' => 'cubic inch per minute',
            /* cubic inch per second */
            'G58' => 'cubic inch per second',
            /* milliampere per litre minute */
            'G59' => 'milliampere per litre minute',
            /* volt per bar */
            'G60' => 'volt per bar',
            /* cubic centimetre per day kelvin */
            'G61' => 'cubic centimetre per day kelvin',
            /* cubic centimetre per hour kelvin */
            'G62' => 'cubic centimetre per hour kelvin',
            /* cubic centimetre per minute kelvin */
            'G63' => 'cubic centimetre per minute kelvin',
            /* cubic centimetre per second kelvin */
            'G64' => 'cubic centimetre per second kelvin',
            /* litre per day kelvin */
            'G65' => 'litre per day kelvin',
            /* litre per hour kelvin */
            'G66' => 'litre per hour kelvin',
            /* litre per minute kelvin */
            'G67' => 'litre per minute kelvin',
            /* litre per second kelvin */
            'G68' => 'litre per second kelvin',
            /* cubic metre per day kelvin */
            'G69' => 'cubic metre per day kelvin',
            /* cubic metre per hour kelvin */
            'G70' => 'cubic metre per hour kelvin',
            /* cubic metre per minute kelvin */
            'G71' => 'cubic metre per minute kelvin',
            /* cubic metre per second kelvin */
            'G72' => 'cubic metre per second kelvin',
            /* millilitre per day kelvin */
            'G73' => 'millilitre per day kelvin',
            /* millilitre per hour kelvin */
            'G74' => 'millilitre per hour kelvin',
            /* millilitre per minute kelvin */
            'G75' => 'millilitre per minute kelvin',
            /* millilitre per second kelvin */
            'G76' => 'millilitre per second kelvin',
            /* millimetre to the fourth power */
            'G77' => 'millimetre to the fourth power',
            /* cubic centimetre per day bar */
            'G78' => 'cubic centimetre per day bar',
            /* cubic centimetre per hour bar */
            'G79' => 'cubic centimetre per hour bar',
            /* cubic centimetre per minute bar */
            'G80' => 'cubic centimetre per minute bar',
            /* cubic centimetre per second bar */
            'G81' => 'cubic centimetre per second bar',
            /* litre per day bar */
            'G82' => 'litre per day bar',
            /* litre per hour bar */
            'G83' => 'litre per hour bar',
            /* litre per minute bar */
            'G84' => 'litre per minute bar',
            /* litre per second bar */
            'G85' => 'litre per second bar',
            /* cubic metre per day bar */
            'G86' => 'cubic metre per day bar',
            /* cubic metre per hour bar */
            'G87' => 'cubic metre per hour bar',
            /* cubic metre per minute bar */
            'G88' => 'cubic metre per minute bar',
            /* cubic metre per second bar */
            'G89' => 'cubic metre per second bar',
            /* millilitre per day bar */
            'G90' => 'millilitre per day bar',
            /* millilitre per hour bar */
            'G91' => 'millilitre per hour bar',
            /* millilitre per minute bar */
            'G92' => 'millilitre per minute bar',
            /* millilitre per second bar */
            'G93' => 'millilitre per second bar',
            /* cubic centimetre per bar */
            'G94' => 'cubic centimetre per bar',
            /* litre per bar */
            'G95' => 'litre per bar',
            /* cubic metre per bar */
            'G96' => 'cubic metre per bar',
            /* millilitre per bar */
            'G97' => 'millilitre per bar',
            /* microhenry per kiloohm */
            'G98' => 'microhenry per kiloohm',
            /* microhenry per ohm */
            'G99' => 'microhenry per ohm',
            /* gallon (US) per day */
            'GB' => 'gallon (US) per day',
            /* gigabecquerel */
            'GBQ' => 'gigabecquerel',
            /* A unit of mass defining the number of grams of a product, disregarding thewater content of the product. */
            'GDW' => 'gram, dry weight',
            /* pound per gallon (US) */
            'GE' => 'pound per gallon (US)',
            /* gram per metre (gram per 100 centimetres) */
            'GF' => 'gram per metre (gram per 100 centimetres)',
            /* A unit of mass defining the number of grams of a fissile isotope (fissileisotope: an isotope whose nucleus is able to be split when irradiated with low energyneutrons). */
            'GFI' => 'gram of fissile isotope',
            /* A unit of count defining the number of units in multiples of 1728 (12 x 12 x12). */
            'GGR' => 'great gross',
            /* gill (US) */
            'GIA' => 'gill (US)',
            /* A unit of mass defining the number of grams of a product, including itscontainer. */
            'GIC' => 'gram, including container',
            /* gill (UK) */
            'GII' => 'gill (UK)',
            /* A unit of mass defining the number of grams of a product, including its innerpackaging materials. */
            'GIP' => 'gram, including inner packaging',
            /* gram per millilitre */
            'GJ' => 'gram per millilitre',
            /* gram per litre */
            'GL' => 'gram per litre',
            /* dry gallon (US) */
            'GLD' => 'dry gallon (US)',
            /* gallon (UK) */
            'GLI' => 'gallon (UK)',
            /* gallon (US) */
            'GLL' => 'gallon (US)',
            /* gram per square metre */
            'GM' => 'gram per square metre',
            /* milligram per square metre */
            'GO' => 'milligram per square metre',
            /* milligram per cubic metre */
            'GP' => 'milligram per cubic metre',
            /* microgram per cubic metre */
            'GQ' => 'microgram per cubic metre',
            /* gram */
            'GRM' => 'gram',
            /* grain */
            'GRN' => 'grain',
            /* A unit of count defining the number of units in multiples of 144 (12 x12). */
            'GRO' => 'gross',
            /* gigajoule */
            'GV' => 'gigajoule',
            /* gigawatt hour */
            'GWH' => 'gigawatt hour',
            /* henry per kiloohm */
            'H03' => 'henry per kiloohm',
            /* henry per ohm */
            'H04' => 'henry per ohm',
            /* millihenry per kiloohm */
            'H05' => 'millihenry per kiloohm',
            /* millihenry per ohm */
            'H06' => 'millihenry per ohm',
            /* pascal second per bar */
            'H07' => 'pascal second per bar',
            /* microbecquerel */
            'H08' => 'microbecquerel',
            /* reciprocal year */
            'H09' => 'reciprocal year',
            /* reciprocal hour */
            'H10' => 'reciprocal hour',
            /* reciprocal month */
            'H11' => 'reciprocal month',
            /* degree Celsius per hour */
            'H12' => 'degree Celsius per hour',
            /* degree Celsius per minute */
            'H13' => 'degree Celsius per minute',
            /* degree Celsius per second */
            'H14' => 'degree Celsius per second',
            /* square centimetre per gram */
            'H15' => 'square centimetre per gram',
            /* Synonym: are */
            'H16' => 'square decametre',
            /* Synonym: hectare */
            'H18' => 'square hectometre',
            /* cubic hectometre */
            'H19' => 'cubic hectometre',
            /* cubic kilometre */
            'H20' => 'cubic kilometre',
            /* A unit of count defining the number of blanks. */
            'H21' => 'blank',
            /* volt square inch per pound-force */
            'H22' => 'volt square inch per pound-force',
            /* volt per inch */
            'H23' => 'volt per inch',
            /* volt per microsecond */
            'H24' => 'volt per microsecond',
            /* A unit of proportion, equal to 0.01, in relation to the SI base unitKelvin. */
            'H25' => 'percent per kelvin',
            /* ohm per metre */
            'H26' => 'ohm per metre',
            /* degree per metre */
            'H27' => 'degree per metre',
            /* microfarad per kilometre */
            'H28' => 'microfarad per kilometre',
            /* microgram per litre */
            'H29' => 'microgram per litre',
            /* square micrometre (square micron) */
            'H30' => 'square micrometre (square micron)',
            /* ampere per kilogram */
            'H31' => 'ampere per kilogram',
            /* ampere squared second */
            'H32' => 'ampere squared second',
            /* farad per kilometre */
            'H33' => 'farad per kilometre',
            /* hertz metre */
            'H34' => 'hertz metre',
            /* kelvin metre per watt */
            'H35' => 'kelvin metre per watt',
            /* megaohm per kilometre */
            'H36' => 'megaohm per kilometre',
            /* megaohm per metre */
            'H37' => 'megaohm per metre',
            /* megaampere */
            'H38' => 'megaampere',
            /* megahertz kilometre */
            'H39' => 'megahertz kilometre',
            /* newton per ampere */
            'H40' => 'newton per ampere',
            /* newton metre watt to the power minus 0,5 */
            'H41' => 'newton metre watt to the power minus 0,5',
            /* pascal per metre */
            'H42' => 'pascal per metre',
            /* siemens per centimetre */
            'H43' => 'siemens per centimetre',
            /* teraohm */
            'H44' => 'teraohm',
            /* volt second per metre */
            'H45' => 'volt second per metre',
            /* volt per second */
            'H46' => 'volt per second',
            /* watt per cubic metre */
            'H47' => 'watt per cubic metre',
            /* attofarad */
            'H48' => 'attofarad',
            /* centimetre per hour */
            'H49' => 'centimetre per hour',
            /* reciprocal cubic centimetre */
            'H50' => 'reciprocal cubic centimetre',
            /* decibel per kilometre */
            'H51' => 'decibel per kilometre',
            /* decibel per metre */
            'H52' => 'decibel per metre',
            /* kilogram per bar */
            'H53' => 'kilogram per bar',
            /* kilogram per cubic decimetre kelvin */
            'H54' => 'kilogram per cubic decimetre kelvin',
            /* kilogram per cubic decimetre bar */
            'H55' => 'kilogram per cubic decimetre bar',
            /* kilogram per square metre second */
            'H56' => 'kilogram per square metre second',
            /* inch per two pi radiant */
            'H57' => 'inch per two pi radiant',
            /* metre per volt second */
            'H58' => 'metre per volt second',
            /* square metre per newton */
            'H59' => 'square metre per newton',
            /* cubic metre per cubic metre */
            'H60' => 'cubic metre per cubic metre',
            /* millisiemens per centimetre */
            'H61' => 'millisiemens per centimetre',
            /* millivolt per minute */
            'H62' => 'millivolt per minute',
            /* milligram per square centimetre */
            'H63' => 'milligram per square centimetre',
            /* milligram per gram */
            'H64' => 'milligram per gram',
            /* millilitre per cubic metre */
            'H65' => 'millilitre per cubic metre',
            /* millimetre per year */
            'H66' => 'millimetre per year',
            /* millimetre per hour */
            'H67' => 'millimetre per hour',
            /* millimole per gram */
            'H68' => 'millimole per gram',
            /* picopascal per kilometre */
            'H69' => 'picopascal per kilometre',
            /* picosecond */
            'H70' => 'picosecond',
            /* A unit of proportion, equal to 0.01, in relation to a month. */
            'H71' => 'percent per month',
            /* A unit of proportion, equal to 0.01, in relation to 100-fold of the unitbar. */
            'H72' => 'percent per hectobar',
            /* A unit of proportion, equal to 0.01, in relation to 10-fold of the SI base unitKelvin. */
            'H73' => 'percent per decakelvin',
            /* watt per metre */
            'H74' => 'watt per metre',
            /* decapascal */
            'H75' => 'decapascal',
            /* gram per millimetre */
            'H76' => 'gram per millimetre',
            /* A unit of measure used to describe the breadth of electronic assemblies asan installation standard or mounting dimension. */
            'H77' => 'module width',
            /* A unit of distance used for measuring the diameter of small tubes such asurological instruments and catheters. Synonym: French, Charrière, Charrièregauge */
            'H79' => 'French gauge',
            /* A unit of measure used to describe the height in rack units of equipmentintended for mounting in a 19-inch rack or a 23-inch rack. One rack unit is 1.75 inches(44.45 mm) high. */
            'H80' => 'rack unit',
            /* millimetre per minute */
            'H81' => 'millimetre per minute',
            /* A unit of length defining the number of big points (big point: Adobesoftware(US) defines the big point to be exactly 1/72 inch (0.013 888 9 inch or 0.352777 8 millimeters)) */
            'H82' => 'big point',
            /* litre per kilogram */
            'H83' => 'litre per kilogram',
            /* gram millimetre */
            'H84' => 'gram millimetre',
            /* reciprocal week */
            'H85' => 'reciprocal week',
            /* A unit of count defining the number of pieces (piece: a single item, article orexemplar). */
            'H87' => 'piece',
            /* megaohm kilometre */
            'H88' => 'megaohm kilometre',
            /* A unit of proportion, equal to 0.01, in relation to the SI derived unitohm. */
            'H89' => 'percent per ohm',
            /* A unit of proportion, equal to 0.01, in relation to an angle of onedegree. */
            'H90' => 'percent per degree',
            /* A unit of proportion, equal to 0.01, in relation to multiples of tenthousand. */
            'H91' => 'percent per ten thousand',
            /* A unit of proportion, equal to 0.01, in relation to multiples of one hundredthousand. */
            'H92' => 'percent per one hundred thousand',
            /* A unit of proportion, equal to 0.01, in relation to multiples of onehundred. */
            'H93' => 'percent per hundred',
            /* A unit of proportion, equal to 0.01, in relation to multiples of onethousand. */
            'H94' => 'percent per thousand',
            /* A unit of proportion, equal to 0.01, in relation to the SI derived unitvolt. */
            'H95' => 'percent per volt',
            /* A unit of proportion, equal to 0.01, in relation to an atmospheric pressure ofone bar. */
            'H96' => 'percent per bar',
            /* A unit of proportion, equal to 0.01, in relation to an inch. */
            'H98' => 'percent per inch',
            /* A unit of proportion, equal to 0.01, in relation to a metre. */
            'H99' => 'percent per metre',
            /* A unit of length, typically for yarn. */
            'HA' => 'hank',
            /* hectobar */
            'HBA' => 'hectobar',
            /* A unit of count defining the number of boxes in multiples of one hundred boxunits. */
            'HBX' => 'hundred boxes',
            /* A unit of count defining the number of units counted in multiples of100. */
            'HC' => 'hundred count',
            /* A unit of mass defining the number of hundred kilograms of a product,disregarding the water content of the product. */
            'HDW' => 'hundred kilogram, dry weight',
            /* A unit of count defining the number of heads (head: a person or animalconsidered as one of a number). */
            'HEA' => 'head',
            /* hectogram */
            'HGM' => 'hectogram',
            /* A unit of volume equal to one hundred cubic foot. */
            'HH' => 'hundred cubic foot',
            /* A unit of count defining the number of international units in multiples of100. */
            'HIU' => 'hundred international unit',
            /* A unit of mass defining the number of hundred kilograms of a product, afterdeductions. */
            'HKM' => 'hundred kilogram, net mass',
            /* hectolitre */
            'HLT' => 'hectolitre',
            /* mile per hour (statute mile) */
            'HM' => 'mile per hour (statute mile)',
            /* A unit of volume equal to one million cubic metres. */
            'HMQ' => 'million cubic metre',
            /* hectometre */
            'HMT' => 'hectometre',
            /* A unit of volume equal to one hundred litres of pure alcohol. */
            'HPA' => 'hectolitre of pure alcohol',
            /* hertz */
            'HTZ' => 'hertz',
            /* hour */
            'HUR' => 'hour',
            /* inch pound (pound inch) */
            'IA' => 'inch pound (pound inch)',
            /* A unit of count defining the number of persons. */
            'IE' => 'person',
            /* inch */
            'INH' => 'inch',
            /* square inch */
            'INK' => 'square inch',
            /* Synonym: inch cubed */
            'INQ' => 'cubic inch',
            /* A unit of measure defining the sugar content of a solution, expressed indegrees. */
            'ISD' => 'international sugar degree',
            /* inch per second */
            'IU' => 'inch per second',
            /* inch per second squared */
            'IV' => 'inch per second squared',
            /* A unit of proportion, equal to 0.01, in relation to a millimetre. */
            'J10' => 'percent per millimetre',
            /* A unit of pressure equal to one thousandth of a psi (pound-force per squareinch). */
            'J12' => 'per mille per psi',
            /* A unit of relative density as a measure of how heavy or light a petroleumliquid is compared to water (API: American Petroleum Institute). */
            'J13' => 'degree API',
            /* A traditional unit of relative density for liquids. Named after AntoineBaumé. */
            'J14' => 'degree Baume (origin scale)',
            /* A unit of relative density for liquids heavier than water. */
            'J15' => 'degree Baume (US heavy)',
            /* A unit of relative density for liquids lighter than water. */
            'J16' => 'degree Baume (US light)',
            /* A unit of density as a measure of sugar content, especially of beer wort. Namedafter Karl Balling. */
            'J17' => 'degree Balling',
            /* A unit of proportion used in measuring the dissolved sugar-to-water mass ratioof a liquid. Named after Adolf Brix. */
            'J18' => 'degree Brix',
            /* degree Fahrenheit hour square foot per British thermal unit (thermochemical) */
            'J19' => 'degree Fahrenheit hour square foot per British thermal unit (thermochemical)',
            /* joule per kilogram */
            'J2' => 'joule per kilogram',
            /* degree Fahrenheit per kelvin */
            'J20' => 'degree Fahrenheit per kelvin',
            /* degree Fahrenheit per bar */
            'J21' => 'degree Fahrenheit per bar',
            /* degree Fahrenheit hour square foot per British thermal unit (internationaltable) */
            'J22' => 'degree Fahrenheit hour square foot per British thermal unit (internationaltable)',
            /* degree Fahrenheit per hour */
            'J23' => 'degree Fahrenheit per hour',
            /* degree Fahrenheit per minute */
            'J24' => 'degree Fahrenheit per minute',
            /* degree Fahrenheit per second */
            'J25' => 'degree Fahrenheit per second',
            /* reciprocal degree Fahrenheit */
            'J26' => 'reciprocal degree Fahrenheit',
            /* A unit of density as a measure of sugar content of must, the unfermentedliqueur from which wine is made. Named after Ferdinand Oechsle. */
            'J27' => 'degree Oechsle',
            /* degree Rankine per hour */
            'J28' => 'degree Rankine per hour',
            /* degree Rankine per minute */
            'J29' => 'degree Rankine per minute',
            /* degree Rankine per second */
            'J30' => 'degree Rankine per second',
            /* A unit of density for liquids that are heavier than water. 1 degree Twaddlerepresents a difference in specific gravity of 0.005. */
            'J31' => 'degree Twaddell',
            /* micropoise */
            'J32' => 'micropoise',
            /* microgram per kilogram */
            'J33' => 'microgram per kilogram',
            /* microgram per cubic metre kelvin */
            'J34' => 'microgram per cubic metre kelvin',
            /* microgram per cubic metre bar */
            'J35' => 'microgram per cubic metre bar',
            /* microlitre per litre */
            'J36' => 'microlitre per litre',
            /* A unit of signal transmission speed equal to one signalling event persecond. */
            'J38' => 'baud',
            /* British thermal unit (mean) */
            'J39' => 'British thermal unit (mean)',
            /* British thermal unit (international table) foot per hour square foot degreeFahrenheit */
            'J40' => 'British thermal unit (international table) foot per hour square foot degreeFahrenheit',
            /* British thermal unit (international table) inch per hour square foot degreeFahrenheit */
            'J41' => 'British thermal unit (international table) inch per hour square foot degreeFahrenheit',
            /* British thermal unit (international table) inch per second square foot degreeFahrenheit */
            'J42' => 'British thermal unit (international table) inch per second square foot degreeFahrenheit',
            /* British thermal unit (international table) per pound degree Fahrenheit */
            'J43' => 'British thermal unit (international table) per pound degree Fahrenheit',
            /* British thermal unit (international table) per minute */
            'J44' => 'British thermal unit (international table) per minute',
            /* British thermal unit (international table) per second */
            'J45' => 'British thermal unit (international table) per second',
            /* British thermal unit (thermochemical) foot per hour square foot degreeFahrenheit */
            'J46' => 'British thermal unit (thermochemical) foot per hour square foot degreeFahrenheit',
            /* British thermal unit (thermochemical) per hour */
            'J47' => 'British thermal unit (thermochemical) per hour',
            /* British thermal unit (thermochemical) inch per hour square foot degreeFahrenheit */
            'J48' => 'British thermal unit (thermochemical) inch per hour square foot degreeFahrenheit',
            /* British thermal unit (thermochemical) inch per second square foot degreeFahrenheit */
            'J49' => 'British thermal unit (thermochemical) inch per second square foot degreeFahrenheit',
            /* British thermal unit (thermochemical) per pound degree Fahrenheit */
            'J50' => 'British thermal unit (thermochemical) per pound degree Fahrenheit',
            /* British thermal unit (thermochemical) per minute */
            'J51' => 'British thermal unit (thermochemical) per minute',
            /* British thermal unit (thermochemical) per second */
            'J52' => 'British thermal unit (thermochemical) per second',
            /* coulomb square metre per kilogram */
            'J53' => 'coulomb square metre per kilogram',
            /* A unit of signal transmission speed equal to 10⁶ (1000000) signaling events persecond. */
            'J54' => 'megabaud',
            /* watt second */
            'J55' => 'watt second',
            /* bar per bar */
            'J56' => 'bar per bar',
            /* barrel (UK petroleum) */
            'J57' => 'barrel (UK petroleum)',
            /* barrel (UK petroleum) per minute */
            'J58' => 'barrel (UK petroleum) per minute',
            /* barrel (UK petroleum) per day */
            'J59' => 'barrel (UK petroleum) per day',
            /* barrel (UK petroleum) per hour */
            'J60' => 'barrel (UK petroleum) per hour',
            /* barrel (UK petroleum) per second */
            'J61' => 'barrel (UK petroleum) per second',
            /* barrel (US petroleum) per hour */
            'J62' => 'barrel (US petroleum) per hour',
            /* barrel (US petroleum) per second */
            'J63' => 'barrel (US petroleum) per second',
            /* bushel (UK) per day */
            'J64' => 'bushel (UK) per day',
            /* bushel (UK) per hour */
            'J65' => 'bushel (UK) per hour',
            /* bushel (UK) per minute */
            'J66' => 'bushel (UK) per minute',
            /* bushel (UK) per second */
            'J67' => 'bushel (UK) per second',
            /* bushel (US dry) per day */
            'J68' => 'bushel (US dry) per day',
            /* bushel (US dry) per hour */
            'J69' => 'bushel (US dry) per hour',
            /* bushel (US dry) per minute */
            'J70' => 'bushel (US dry) per minute',
            /* bushel (US dry) per second */
            'J71' => 'bushel (US dry) per second',
            /* centinewton metre */
            'J72' => 'centinewton metre',
            /* centipoise per kelvin */
            'J73' => 'centipoise per kelvin',
            /* centipoise per bar */
            'J74' => 'centipoise per bar',
            /* calorie (mean) */
            'J75' => 'calorie (mean)',
            /* calorie (international table) per gram degree Celsius */
            'J76' => 'calorie (international table) per gram degree Celsius',
            /* calorie (thermochemical) per centimetre second degree Celsius */
            'J78' => 'calorie (thermochemical) per centimetre second degree Celsius',
            /* calorie (thermochemical) per gram degree Celsius */
            'J79' => 'calorie (thermochemical) per gram degree Celsius',
            /* calorie (thermochemical) per minute */
            'J81' => 'calorie (thermochemical) per minute',
            /* calorie (thermochemical) per second */
            'J82' => 'calorie (thermochemical) per second',
            /* clo */
            'J83' => 'clo',
            /* centimetre per second kelvin */
            'J84' => 'centimetre per second kelvin',
            /* centimetre per second bar */
            'J85' => 'centimetre per second bar',
            /* cubic centimetre per cubic metre */
            'J87' => 'cubic centimetre per cubic metre',
            /* cubic decimetre per day */
            'J90' => 'cubic decimetre per day',
            /* cubic decimetre per cubic metre */
            'J91' => 'cubic decimetre per cubic metre',
            /* cubic decimetre per minute */
            'J92' => 'cubic decimetre per minute',
            /* cubic decimetre per second */
            'J93' => 'cubic decimetre per second',
            /* ounce (UK fluid) per day */
            'J95' => 'ounce (UK fluid) per day',
            /* ounce (UK fluid) per hour */
            'J96' => 'ounce (UK fluid) per hour',
            /* ounce (UK fluid) per minute */
            'J97' => 'ounce (UK fluid) per minute',
            /* ounce (UK fluid) per second */
            'J98' => 'ounce (UK fluid) per second',
            /* ounce (US fluid) per day */
            'J99' => 'ounce (US fluid) per day',
            /* joule per kelvin */
            'JE' => 'joule per kelvin',
            /* megajoule per kilogram */
            'JK' => 'megajoule per kilogram',
            /* megajoule per cubic metre */
            'JM' => 'megajoule per cubic metre',
            /* A count of the number of pipeline joints. */
            'JNT' => 'pipeline joint',
            /* joule */
            'JOU' => 'joule',
            /* A unit of count defining the number of 100 metre lengths. */
            'JPS' => 'hundred metre',
            /* A unit of count defining the number of jewels (jewel: preciousstone). */
            'JWL' => 'number of jewels',
            /* A unit of measure defining the power load measured at predeterminedintervals. */
            'K1' => 'kilowatt demand',
            /* ounce (US fluid) per hour */
            'K10' => 'ounce (US fluid) per hour',
            /* ounce (US fluid) per minute */
            'K11' => 'ounce (US fluid) per minute',
            /* ounce (US fluid) per second */
            'K12' => 'ounce (US fluid) per second',
            /* foot per degree Fahrenheit */
            'K13' => 'foot per degree Fahrenheit',
            /* foot per hour */
            'K14' => 'foot per hour',
            /* foot pound-force per hour */
            'K15' => 'foot pound-force per hour',
            /* foot pound-force per minute */
            'K16' => 'foot pound-force per minute',
            /* foot per psi */
            'K17' => 'foot per psi',
            /* foot per second degree Fahrenheit */
            'K18' => 'foot per second degree Fahrenheit',
            /* foot per second psi */
            'K19' => 'foot per second psi',
            /* A unit of measure defining the reactive power demand equal to one kilovoltampere of reactive power. */
            'K2' => 'kilovolt ampere reactive demand',
            /* reciprocal cubic foot */
            'K20' => 'reciprocal cubic foot',
            /* cubic foot per degree Fahrenheit */
            'K21' => 'cubic foot per degree Fahrenheit',
            /* cubic foot per day */
            'K22' => 'cubic foot per day',
            /* cubic foot per psi */
            'K23' => 'cubic foot per psi',
            /* gallon (UK) per day */
            'K26' => 'gallon (UK) per day',
            /* gallon (UK) per hour */
            'K27' => 'gallon (UK) per hour',
            /* gallon (UK) per second */
            'K28' => 'gallon (UK) per second',
            /* A unit of measure defining the accumulated reactive energy equal to onekilovolt ampere of reactive power per hour. */
            'K3' => 'kilovolt ampere reactive hour',
            /* gallon (US liquid) per second */
            'K30' => 'gallon (US liquid) per second',
            /* gram-force per square centimetre */
            'K31' => 'gram-force per square centimetre',
            /* gill (UK) per day */
            'K32' => 'gill (UK) per day',
            /* gill (UK) per hour */
            'K33' => 'gill (UK) per hour',
            /* gill (UK) per minute */
            'K34' => 'gill (UK) per minute',
            /* gill (UK) per second */
            'K35' => 'gill (UK) per second',
            /* gill (US) per day */
            'K36' => 'gill (US) per day',
            /* gill (US) per hour */
            'K37' => 'gill (US) per hour',
            /* gill (US) per minute */
            'K38' => 'gill (US) per minute',
            /* gill (US) per second */
            'K39' => 'gill (US) per second',
            /* standard acceleration of free fall */
            'K40' => 'standard acceleration of free fall',
            /* grain per gallon (US) */
            'K41' => 'grain per gallon (US)',
            /* horsepower (boiler) */
            'K42' => 'horsepower (boiler)',
            /* horsepower (electric) */
            'K43' => 'horsepower (electric)',
            /* inch per degree Fahrenheit */
            'K45' => 'inch per degree Fahrenheit',
            /* inch per psi */
            'K46' => 'inch per psi',
            /* inch per second degree Fahrenheit */
            'K47' => 'inch per second degree Fahrenheit',
            /* inch per second psi */
            'K48' => 'inch per second psi',
            /* reciprocal cubic inch */
            'K49' => 'reciprocal cubic inch',
            /* A unit of signal transmission speed equal to 10³ (1000) signaling events persecond. */
            'K50' => 'kilobaud',
            /* kilocalorie (mean) */
            'K51' => 'kilocalorie (mean)',
            /* kilocalorie (international table) per hour metre degree Celsius */
            'K52' => 'kilocalorie (international table) per hour metre degree Celsius',
            /* kilocalorie (thermochemical) */
            'K53' => 'kilocalorie (thermochemical)',
            /* kilocalorie (thermochemical) per minute */
            'K54' => 'kilocalorie (thermochemical) per minute',
            /* kilocalorie (thermochemical) per second */
            'K55' => 'kilocalorie (thermochemical) per second',
            /* kilomole per hour */
            'K58' => 'kilomole per hour',
            /* kilomole per cubic metre kelvin */
            'K59' => 'kilomole per cubic metre kelvin',
            /* kilolitre */
            'K6' => 'kilolitre',
            /* kilomole per cubic metre bar */
            'K60' => 'kilomole per cubic metre bar',
            /* kilomole per minute */
            'K61' => 'kilomole per minute',
            /* litre per litre */
            'K62' => 'litre per litre',
            /* reciprocal litre */
            'K63' => 'reciprocal litre',
            /* pound (avoirdupois) per degree Fahrenheit */
            'K64' => 'pound (avoirdupois) per degree Fahrenheit',
            /* pound (avoirdupois) square foot */
            'K65' => 'pound (avoirdupois) square foot',
            /* pound (avoirdupois) per day */
            'K66' => 'pound (avoirdupois) per day',
            /* pound per foot hour */
            'K67' => 'pound per foot hour',
            /* pound per foot second */
            'K68' => 'pound per foot second',
            /* pound (avoirdupois) per cubic foot degree Fahrenheit */
            'K69' => 'pound (avoirdupois) per cubic foot degree Fahrenheit',
            /* pound (avoirdupois) per cubic foot psi */
            'K70' => 'pound (avoirdupois) per cubic foot psi',
            /* pound (avoirdupois) per gallon (UK) */
            'K71' => 'pound (avoirdupois) per gallon (UK)',
            /* pound (avoirdupois) per hour degree Fahrenheit */
            'K73' => 'pound (avoirdupois) per hour degree Fahrenheit',
            /* pound (avoirdupois) per hour psi */
            'K74' => 'pound (avoirdupois) per hour psi',
            /* pound (avoirdupois) per cubic inch degree Fahrenheit */
            'K75' => 'pound (avoirdupois) per cubic inch degree Fahrenheit',
            /* pound (avoirdupois) per cubic inch psi */
            'K76' => 'pound (avoirdupois) per cubic inch psi',
            /* pound (avoirdupois) per psi */
            'K77' => 'pound (avoirdupois) per psi',
            /* pound (avoirdupois) per minute */
            'K78' => 'pound (avoirdupois) per minute',
            /* pound (avoirdupois) per minute degree Fahrenheit */
            'K79' => 'pound (avoirdupois) per minute degree Fahrenheit',
            /* pound (avoirdupois) per minute psi */
            'K80' => 'pound (avoirdupois) per minute psi',
            /* pound (avoirdupois) per second */
            'K81' => 'pound (avoirdupois) per second',
            /* pound (avoirdupois) per second degree Fahrenheit */
            'K82' => 'pound (avoirdupois) per second degree Fahrenheit',
            /* pound (avoirdupois) per second psi */
            'K83' => 'pound (avoirdupois) per second psi',
            /* pound per cubic yard */
            'K84' => 'pound per cubic yard',
            /* pound-force per square foot */
            'K85' => 'pound-force per square foot',
            /* pound-force per square inch degree Fahrenheit */
            'K86' => 'pound-force per square inch degree Fahrenheit',
            /* psi cubic inch per second */
            'K87' => 'psi cubic inch per second',
            /* psi litre per second */
            'K88' => 'psi litre per second',
            /* psi cubic metre per second */
            'K89' => 'psi cubic metre per second',
            /* psi cubic yard per second */
            'K90' => 'psi cubic yard per second',
            /* pound-force second per square foot */
            'K91' => 'pound-force second per square foot',
            /* pound-force second per square inch */
            'K92' => 'pound-force second per square inch',
            /* reciprocal psi */
            'K93' => 'reciprocal psi',
            /* quart (UK liquid) per day */
            'K94' => 'quart (UK liquid) per day',
            /* quart (UK liquid) per hour */
            'K95' => 'quart (UK liquid) per hour',
            /* quart (UK liquid) per minute */
            'K96' => 'quart (UK liquid) per minute',
            /* quart (UK liquid) per second */
            'K97' => 'quart (UK liquid) per second',
            /* quart (US liquid) per day */
            'K98' => 'quart (US liquid) per day',
            /* quart (US liquid) per hour */
            'K99' => 'quart (US liquid) per hour',
            /* A unit of count defining the number of cakes (cake: object shaped into a flat,compact mass). */
            'KA' => 'cake',
            /* A unit of catalytic activity defining the catalytic activity of enzymes andother catalysts. */
            'KAT' => 'katal',
            /* A unit of information equal to 10³ (1000) characters. */
            'KB' => 'kilocharacter',
            /* kilobar */
            'KBA' => 'kilobar',
            /* A unit of mass equal to one thousand grams of choline chloride. */
            'KCC' => 'kilogram of choline chloride',
            /* A unit of mass defining the net number of kilograms of a product, disregardingthe liquid content of the product. */
            'KDW' => 'kilogram drained net weight',
            /* Refer ISO 80000-5 (Quantities and units — Part 5: Thermodynamics) */
            'KEL' => 'kelvin',
            /* A unit of mass equal to one thousand grams. */
            'KGM' => 'kilogram',
            /* kilogram per second */
            'KGS' => 'kilogram per second',
            /* A unit of mass equal to one thousand grams of hydrogen peroxide. */
            'KHY' => 'kilogram of hydrogen peroxide',
            /* kilohertz */
            'KHZ' => 'kilohertz',
            /* kilogram per millimetre width */
            'KI' => 'kilogram per millimetre width',
            /* A unit of mass defining the number of kilograms of a product, including itscontainer. */
            'KIC' => 'kilogram, including container',
            /* A unit of mass defining the number of kilograms of a product, including itsinner packaging materials. */
            'KIP' => 'kilogram, including inner packaging',
            /* A unit of information equal to 10³ (1000) segments. */
            'KJ' => 'kilosegment',
            /* kilojoule */
            'KJO' => 'kilojoule',
            /* kilogram per metre */
            'KL' => 'kilogram per metre',
            /* A unit of proportion defining the percentage of dry lactic material in aproduct. */
            'KLK' => 'lactic dry material percentage',
            /* A unit of illuminance equal to one thousand lux. */
            'KLX' => 'kilolux',
            /* A unit of mass equal to one thousand grams of methylamine. */
            'KMA' => 'kilogram of methylamine',
            /* kilometre per hour */
            'KMH' => 'kilometre per hour',
            /* square kilometre */
            'KMK' => 'square kilometre',
            /* A unit of weight expressed in kilograms of a substance that fills a volume ofone cubic metre. */
            'KMQ' => 'kilogram per cubic metre',
            /* kilometre */
            'KMT' => 'kilometre',
            /* A unit of mass equal to one thousand grams of nitrogen. */
            'KNI' => 'kilogram of nitrogen',
            /* Pressure expressed in kN/m2. */
            'KNM' => 'kilonewton per square metre',
            /* A unit of mass equal to one kilogram of a named substance. */
            'KNS' => 'kilogram named substance',
            /* knot */
            'KNT' => 'knot',
            /* A unit of count defining the number of milligrams of potassium hydroxide pergram of product as a measure of the concentration of potassium hydroxide in theproduct. */
            'KO' => 'milliequivalence caustic potash per gram of product',
            /* kilopascal */
            'KPA' => 'kilopascal',
            /* A unit of mass equal to one thousand grams of potassium hydroxide (causticpotash). */
            'KPH' => 'kilogram of potassium hydroxide (caustic potash)',
            /* A unit of mass equal to one thousand grams of potassium oxide. */
            'KPO' => 'kilogram of potassium oxide',
            /* A unit of mass equal to one thousand grams of phosphorus pentoxide phosphoricanhydride. */
            'KPP' => 'kilogram of phosphorus pentoxide (phosphoric anhydride)',
            /* kiloroentgen */
            'KR' => 'kiloroentgen',
            /* A unit of mass equal to one thousand grams of a named substance that is 90%dry. */
            'KSD' => 'kilogram of substance 90 % dry',
            /* A unit of mass equal to one thousand grams of sodium hydroxide (causticsoda). */
            'KSH' => 'kilogram of sodium hydroxide (caustic soda)',
            /* A unit of count defining the number of kits (kit: tub, barrel orpail). */
            'KT' => 'kit',
            /* kilotonne */
            'KTN' => 'kilotonne',
            /* A unit of mass equal to one thousand grams of uranium. */
            'KUR' => 'kilogram of uranium',
            /* kilovolt - ampere */
            'KVA' => 'kilovolt - ampere',
            /* kilovar */
            'KVR' => 'kilovar',
            /* kilovolt */
            'KVT' => 'kilovolt',
            /* kilogram per millimetre */
            'KW' => 'kilogram per millimetre',
            /* kilowatt hour */
            'KWH' => 'kilowatt hour',
            /* A unit of mass equal to one thousand grams of tungsten trioxide. */
            'KWO' => 'kilogram of tungsten trioxide',
            /* kilowatt */
            'KWT' => 'kilowatt',
            /* millilitre per kilogram */
            'KX' => 'millilitre per kilogram',
            /* quart (US liquid) per minute */
            'L10' => 'quart (US liquid) per minute',
            /* quart (US liquid) per second */
            'L11' => 'quart (US liquid) per second',
            /* metre per second kelvin */
            'L12' => 'metre per second kelvin',
            /* metre per second bar */
            'L13' => 'metre per second bar',
            /* square metre hour degree Celsius per kilocalorie (international table) */
            'L14' => 'square metre hour degree Celsius per kilocalorie (international table)',
            /* millipascal second per kelvin */
            'L15' => 'millipascal second per kelvin',
            /* millipascal second per bar */
            'L16' => 'millipascal second per bar',
            /* milligram per cubic metre kelvin */
            'L17' => 'milligram per cubic metre kelvin',
            /* milligram per cubic metre bar */
            'L18' => 'milligram per cubic metre bar',
            /* millilitre per litre */
            'L19' => 'millilitre per litre',
            /* litre per minute */
            'L2' => 'litre per minute',
            /* reciprocal cubic millimetre */
            'L20' => 'reciprocal cubic millimetre',
            /* cubic millimetre per cubic metre */
            'L21' => 'cubic millimetre per cubic metre',
            /* mole per hour */
            'L23' => 'mole per hour',
            /* mole per kilogram kelvin */
            'L24' => 'mole per kilogram kelvin',
            /* mole per kilogram bar */
            'L25' => 'mole per kilogram bar',
            /* mole per litre kelvin */
            'L26' => 'mole per litre kelvin',
            /* mole per litre bar */
            'L27' => 'mole per litre bar',
            /* mole per cubic metre kelvin */
            'L28' => 'mole per cubic metre kelvin',
            /* mole per cubic metre bar */
            'L29' => 'mole per cubic metre bar',
            /* mole per minute */
            'L30' => 'mole per minute',
            /* milliroentgen aequivalent men */
            'L31' => 'milliroentgen aequivalent men',
            /* nanogram per kilogram */
            'L32' => 'nanogram per kilogram',
            /* ounce (avoirdupois) per day */
            'L33' => 'ounce (avoirdupois) per day',
            /* ounce (avoirdupois) per hour */
            'L34' => 'ounce (avoirdupois) per hour',
            /* ounce (avoirdupois) per minute */
            'L35' => 'ounce (avoirdupois) per minute',
            /* ounce (avoirdupois) per second */
            'L36' => 'ounce (avoirdupois) per second',
            /* ounce (avoirdupois) per gallon (UK) */
            'L37' => 'ounce (avoirdupois) per gallon (UK)',
            /* ounce (avoirdupois) per gallon (US) */
            'L38' => 'ounce (avoirdupois) per gallon (US)',
            /* ounce (avoirdupois) per cubic inch */
            'L39' => 'ounce (avoirdupois) per cubic inch',
            /* ounce (avoirdupois)-force */
            'L40' => 'ounce (avoirdupois)-force',
            /* ounce (avoirdupois)-force inch */
            'L41' => 'ounce (avoirdupois)-force inch',
            /* picosiemens per metre */
            'L42' => 'picosiemens per metre',
            /* peck (UK) */
            'L43' => 'peck (UK)',
            /* peck (UK) per day */
            'L44' => 'peck (UK) per day',
            /* peck (UK) per hour */
            'L45' => 'peck (UK) per hour',
            /* peck (UK) per minute */
            'L46' => 'peck (UK) per minute',
            /* peck (UK) per second */
            'L47' => 'peck (UK) per second',
            /* peck (US dry) per day */
            'L48' => 'peck (US dry) per day',
            /* peck (US dry) per hour */
            'L49' => 'peck (US dry) per hour',
            /* peck (US dry) per minute */
            'L50' => 'peck (US dry) per minute',
            /* peck (US dry) per second */
            'L51' => 'peck (US dry) per second',
            /* psi per psi */
            'L52' => 'psi per psi',
            /* pint (UK) per day */
            'L53' => 'pint (UK) per day',
            /* pint (UK) per hour */
            'L54' => 'pint (UK) per hour',
            /* pint (UK) per minute */
            'L55' => 'pint (UK) per minute',
            /* pint (UK) per second */
            'L56' => 'pint (UK) per second',
            /* pint (US liquid) per day */
            'L57' => 'pint (US liquid) per day',
            /* pint (US liquid) per hour */
            'L58' => 'pint (US liquid) per hour',
            /* pint (US liquid) per minute */
            'L59' => 'pint (US liquid) per minute',
            /* pint (US liquid) per second */
            'L60' => 'pint (US liquid) per second',
            /* slug per day */
            'L63' => 'slug per day',
            /* slug per foot second */
            'L64' => 'slug per foot second',
            /* slug per cubic foot */
            'L65' => 'slug per cubic foot',
            /* slug per hour */
            'L66' => 'slug per hour',
            /* slug per minute */
            'L67' => 'slug per minute',
            /* slug per second */
            'L68' => 'slug per second',
            /* tonne per kelvin */
            'L69' => 'tonne per kelvin',
            /* tonne per bar */
            'L70' => 'tonne per bar',
            /* tonne per day */
            'L71' => 'tonne per day',
            /* tonne per day kelvin */
            'L72' => 'tonne per day kelvin',
            /* tonne per day bar */
            'L73' => 'tonne per day bar',
            /* tonne per hour kelvin */
            'L74' => 'tonne per hour kelvin',
            /* tonne per hour bar */
            'L75' => 'tonne per hour bar',
            /* tonne per cubic metre kelvin */
            'L76' => 'tonne per cubic metre kelvin',
            /* tonne per cubic metre bar */
            'L77' => 'tonne per cubic metre bar',
            /* tonne per minute */
            'L78' => 'tonne per minute',
            /* tonne per minute kelvin */
            'L79' => 'tonne per minute kelvin',
            /* tonne per minute bar */
            'L80' => 'tonne per minute bar',
            /* tonne per second */
            'L81' => 'tonne per second',
            /* tonne per second kelvin */
            'L82' => 'tonne per second kelvin',
            /* tonne per second bar */
            'L83' => 'tonne per second bar',
            /* ton (UK shipping) */
            'L84' => 'ton (UK shipping)',
            /* ton long per day */
            'L85' => 'ton long per day',
            /* ton (US shipping) */
            'L86' => 'ton (US shipping)',
            /* ton short per degree Fahrenheit */
            'L87' => 'ton short per degree Fahrenheit',
            /* ton short per day */
            'L88' => 'ton short per day',
            /* ton short per hour degree Fahrenheit */
            'L89' => 'ton short per hour degree Fahrenheit',
            /* ton short per hour psi */
            'L90' => 'ton short per hour psi',
            /* ton short per psi */
            'L91' => 'ton short per psi',
            /* ton (UK long) per cubic yard */
            'L92' => 'ton (UK long) per cubic yard',
            /* ton (US short) per cubic yard */
            'L93' => 'ton (US short) per cubic yard',
            /* ton-force (US short) */
            'L94' => 'ton-force (US short)',
            /* common year */
            'L95' => 'common year',
            /* sidereal year */
            'L96' => 'sidereal year',
            /* yard per degree Fahrenheit */
            'L98' => 'yard per degree Fahrenheit',
            /* yard per psi */
            'L99' => 'yard per psi',
            /* pound per cubic inch */
            'LA' => 'pound per cubic inch',
            /* A unit of proportion defining the percentage of lactose in a product thatexceeds a defined percentage level. */
            'LAC' => 'lactose excess percentage',
            /* pound */
            'LBR' => 'pound',
            /* troy pound (US) */
            'LBT' => 'troy pound (US)',
            /* litre per day */
            'LD' => 'litre per day',
            /* A unit of count defining the number of leaves. */
            'LEF' => 'leaf',
            /* A unit of count defining the number of feet (12-inch) in length of a uniformwidth object. */
            'LF' => 'linear foot',
            /* A unit of time defining the number of labour hours. */
            'LH' => 'labour hour',
            /* A unit of distance equal to 0.01 chain. */
            'LK' => 'link',
            /* A unit of count defining the number of metres in length of a uniform widthobject. */
            'LM' => 'linear metre',
            /* A unit of distance defining the linear extent of an item measured from end toend. */
            'LN' => 'length',
            /* A unit of count defining the number of lots (lot: a collection of associateditems). */
            'LO' => 'lot [unit of procurement]',
            /* A unit of mass defining the number of pounds of a liquidsubstance. */
            'LP' => 'liquid pound',
            /* A unit of volume equal to one litre of pure alcohol. */
            'LPA' => 'litre of pure alcohol',
            /* A unit of count defining the number of layers. */
            'LR' => 'layer',
            /* A unit of count defining the number of whole or a complete monetaryamounts. */
            'LS' => 'lump sum',
            /* Synonym: gross ton (2240 lb) */
            'LTN' => 'ton (UK) or long ton (US)',
            /* litre */
            'LTR' => 'litre',
            /* A unit of mass defining the number of metric tons of lubricatingoil. */
            'LUB' => 'metric ton, lubricating oil',
            /* lumen */
            'LUM' => 'lumen',
            /* lux */
            'LUX' => 'lux',
            /* A unit of count defining the number of 36-inch units in length of a uniformwidth object. */
            'LY' => 'linear yard',
            /* milligram per litre */
            'M1' => 'milligram per litre',
            /* reciprocal cubic yard */
            'M10' => 'reciprocal cubic yard',
            /* cubic yard per degree Fahrenheit */
            'M11' => 'cubic yard per degree Fahrenheit',
            /* cubic yard per day */
            'M12' => 'cubic yard per day',
            /* cubic yard per hour */
            'M13' => 'cubic yard per hour',
            /* cubic yard per psi */
            'M14' => 'cubic yard per psi',
            /* cubic yard per minute */
            'M15' => 'cubic yard per minute',
            /* cubic yard per second */
            'M16' => 'cubic yard per second',
            /* kilohertz metre */
            'M17' => 'kilohertz metre',
            /* gigahertz metre */
            'M18' => 'gigahertz metre',
            /* An empirical measure for describing wind speed based mainly on observed seaconditions. The Beaufort scale indicates the wind speed by numbers that typically rangefrom 0 for calm, to 12 for hurricane. */
            'M19' => 'Beaufort',
            /* reciprocal megakelvin or megakelvin to the power minus one */
            'M20' => 'reciprocal megakelvin or megakelvin to the power minus one',
            /* reciprocal kilovolt - ampere reciprocal hour */
            'M21' => 'reciprocal kilovolt - ampere reciprocal hour',
            /* millilitre per square centimetre minute */
            'M22' => 'millilitre per square centimetre minute',
            /* newton per centimetre */
            'M23' => 'newton per centimetre',
            /* ohm kilometre */
            'M24' => 'ohm kilometre',
            /* A unit of proportion, equal to 0.01, in relation to a temperature of onedegree. */
            'M25' => 'percent per degree Celsius',
            /* gigaohm per metre */
            'M26' => 'gigaohm per metre',
            /* megahertz metre */
            'M27' => 'megahertz metre',
            /* kilogram per kilogram */
            'M29' => 'kilogram per kilogram',
            /* reciprocal volt - ampere reciprocal second */
            'M30' => 'reciprocal volt - ampere reciprocal second',
            /* kilogram per kilometre */
            'M31' => 'kilogram per kilometre',
            /* pascal second per litre */
            'M32' => 'pascal second per litre',
            /* millimole per litre */
            'M33' => 'millimole per litre',
            /* newton metre per square metre */
            'M34' => 'newton metre per square metre',
            /* millivolt - ampere */
            'M35' => 'millivolt - ampere',
            /* A unit of count defining the number of months expressed in multiples of 30days, one day equals 24 hours. */
            'M36' => '30-day month',
            /* A unit of count defining the number of years expressed in multiples of 360days, one day equals 24 hours. */
            'M37' => 'actual/360',
            /* 1000-fold of the SI base unit metre divided by the power of the SI base unitsecond by exponent 2. */
            'M38' => 'kilometre per second squared',
            /* 0,01-fold of the SI base unit metre divided by the power of the SI base unitsecond by exponent 2. */
            'M39' => 'centimetre per second squared',
            /* A unit of measure expressed as a monetary amount. */
            'M4' => 'monetary value',
            /* Unit of the length according to the Anglo-American and Imperial system of unitsdivided by the power of the SI base unit second by exponent 2. */
            'M40' => 'yard per second squared',
            /* 0,001-fold of the SI base unit metre divided by the power of the SI base unitsecond by exponent 2. */
            'M41' => 'millimetre per second squared',
            /* Unit of the length according to the Imperial system of units divided by thepower of the SI base unit second by exponent 2. */
            'M42' => 'mile (statute mile) per second squared',
            /* Unit to indicate an angle at military zone, equal to the 6400th part of thefull circle of the 360° or 2·p·rad. */
            'M43' => 'mil',
            /* Unit to identify an angle of the full circle of 360° or 2·p·rad (Refer ISO/TC12SI Guide). */
            'M44' => 'revolution',
            /* 360 part of a full circle divided by the power of the SI base unit second andthe exponent 2. */
            'M45' => 'degree [unit of angle] per second squared',
            /* Unit of the angular velocity. */
            'M46' => 'revolution per minute',
            /* Unit of an area, of which the size is given by a diameter of length of 1 mm(0,001 in) based on the formula: area' => p·(diameter/2)². */
            'M47' => 'circular mil',
            /* Unit of the area, which is mainly common in the agriculture andforestry. */
            'M48' => 'square mile (based on U.S. survey foot)',
            /* Unit of the length according the Anglo-American system of units. */
            'M49' => 'chain (based on U.S. survey foot)',
            /* microcurie */
            'M5' => 'microcurie',
            /* Unit commonly used in Great Britain at rural distances: 1 furlong' => 40 rods =10 chains (UK)' => 1/8 mile' => 1/10 furlong' => 220 yards' => 660 foot. */
            'M50' => 'furlong',
            /* Unit commonly used in the United States for ordnance survey. */
            'M51' => 'foot (U.S. survey)',
            /* Unit commonly used in the United States for ordnance survey. */
            'M52' => 'mile (based on U.S. survey foot)',
            /* SI base unit metre divided by the derived SI unit pascal. */
            'M53' => 'metre per pascal',
            /* Unit of the translation factor for implementation from rotation to linearmovement. */
            'M55' => 'metre per radiant',
            /* Unit for a very short period. */
            'M56' => 'shake',
            /* Unit of velocity from the Imperial system of units. */
            'M57' => 'mile per minute',
            /* Unit of the velocity from the Imperial system of units. */
            'M58' => 'mile per second',
            /* SI base unit meter divided by the product of SI base unit second and thederived SI unit pascal. */
            'M59' => 'metre per second pascal',
            /* SI base unit metre divided by the unit hour. */
            'M60' => 'metre per hour',
            /* Unit of the length according to the Anglo-American and Imperial system of unitsdivided by the unit common year with 365 days. */
            'M61' => 'inch per year',
            /* 1000-fold of the SI base unit metre divided by the SI base unitsecond. */
            'M62' => 'kilometre per second',
            /* Unit inch according to the Anglo-American and Imperial system of units dividedby the unit minute. */
            'M63' => 'inch per minute',
            /* Unit yard according to the Anglo-American and Imperial system of units dividedby the SI base unit second. */
            'M64' => 'yard per second',
            /* Unit yard according to the Anglo-American and Imperial system of units dividedby the unit minute. */
            'M65' => 'yard per minute',
            /* Unit yard according to the Anglo-American and Imperial system of units dividedby the unit hour. */
            'M66' => 'yard per hour',
            /* Unit of the volume, which is used in the United States to measure/gauge thecapacity of reservoirs. */
            'M67' => 'acre-foot (based on U.S. survey foot)',
            /* Traditional unit of the volume of stacked firewood which has been measured witha cord. */
            'M68' => 'cord (128 ft3)',
            /* Unit of volume according to the Imperial system of units. */
            'M69' => 'cubic mile (UK statute)',
            /* micro-inch */
            'M7' => 'micro-inch',
            /* Traditional unit of the cargo capacity. */
            'M70' => 'ton, register',
            /* Power of the SI base unit meter by exponent 3 divided by the derived SI baseunit pascal. */
            'M71' => 'cubic metre per pascal',
            /* Logarithmic relationship to base 10. */
            'M72' => 'bel',
            /* SI base unit kilogram divided by the product of the power of the SI base unitmetre with exponent 3 and the derived SI unit pascal. */
            'M73' => 'kilogram per cubic metre pascal',
            /* SI base unit kilogram divided by the derived SI unit pascal. */
            'M74' => 'kilogram per pascal',
            /* 1000-fold of the unit of the force pound-force (lbf) according to theAnglo-American system of units with the relationship. */
            'M75' => 'kilopound-force',
            /* Non SI-conforming unit of the power, which corresponds to a mass of a poundmultiplied with the acceleration of a foot per square second. */
            'M76' => 'poundal',
            /* Product of the SI base unit kilogram and the SI base unit metre divided by thepower of the SI base unit second by exponent 2. */
            'M77' => 'kilogram metre per second squared',
            /* 0,001-fold of the unit of the weight, defined as a mass of 1 kg which finds outabout a weight strength from 1 kp by the gravitational force at sea level whichcorresponds to a strength of 9,806 65 newton. */
            'M78' => 'pond',
            /* Power of the unit foot according to the Anglo-American and Imperial system ofunits by exponent 2 divided by the unit of time hour. */
            'M79' => 'square foot per hour',
            /* CGS (Centimetre-Gram-Second system) unit stokes divided by the derived SI unitpascal. */
            'M80' => 'stokes per pascal',
            /* 0,000 1-fold of the power of the SI base unit metre by exponent 2 divided bythe SI base unit second. */
            'M81' => 'square centimetre per second',
            /* Power of the SI base unit metre with the exponent 2 divided by the SI base unitsecond and the derived SI unit pascal. */
            'M82' => 'square metre per second pascal',
            /* Traditional unit for the indication of the linear mass of textile fibers andyarns. */
            'M83' => 'denier',
            /* Unit for linear mass according to avoirdupois system of units. */
            'M84' => 'pound per yard',
            /* Non SI-conforming unit of the mass used in the mineralogy to determine theconcentration of precious metals in ore according to the mass of the precious metal inmilligrams in a sample of the mass of an assay sound (number of troy ounces in a shortton (1 000 lb)). */
            'M85' => 'ton, assay',
            /* Outdated unit of the mass used in Germany. */
            'M86' => 'pfund',
            /* SI base unit kilogram divided by the product of the SI base unit second and thederived SI unit pascal. */
            'M87' => 'kilogram per second pascal',
            /* Unit tonne divided by the unit month. */
            'M88' => 'tonne per month',
            /* Unit tonne divided by the unit year with 365 days. */
            'M89' => 'tonne per year',
            /* million Btu per 1000 cubic foot */
            'M9' => 'million Btu per 1000 cubic foot',
            /* 1000-fold of the unit of the mass avoirdupois pound according to theavoirdupois unit system divided by the unit hour. */
            'M90' => 'kilopound per hour',
            /* Proportion of the mass consisting of the avoirdupois pound according to theavoirdupois unit system divided by the avoirdupois pound according to the avoirdupoisunit system. */
            'M91' => 'pound per pound',
            /* Product of the unit pound-force according to the Anglo-American system of unitsand the unit foot according to the Anglo-American and the Imperial system ofunits. */
            'M92' => 'pound-force foot',
            /* Product of the derived SI unit newton and the SI base unit metre divided by theunit radian. */
            'M93' => 'newton metre per radian',
            /* Unit of imbalance as a product of the SI base unit kilogram and the SI baseunit metre. */
            'M94' => 'kilogram metre',
            /* Product of the non SI-conforming unit of the force poundal and the unit footaccording to the Anglo-American and Imperial system of units . */
            'M95' => 'poundal foot',
            /* Product of the non SI-conforming unit of the force poundal and the unit inchaccording to the Anglo-American and Imperial system of units . */
            'M96' => 'poundal inch',
            /* CGS (Centimetre-Gram-Second system) unit of the rotationalmoment. */
            'M97' => 'dyne metre',
            /* Product of the SI base unit kilogram and the 0,01-fold of the SI base unitmetre divided by the SI base unit second. */
            'M98' => 'kilogram centimetre per second',
            /* Product of the 0,001-fold of the SI base unit kilogram and the 0,01-fold of theSI base unit metre divided by the SI base unit second. */
            'M99' => 'gram centimetre per second',
            /* A unit of electrical reactive power defining the total amount of reactive poweracross a power system. */
            'MAH' => 'megavolt ampere reactive hour',
            /* megalitre */
            'MAL' => 'megalitre',
            /* megametre */
            'MAM' => 'megametre',
            /* A unit of electrical reactive power represented by a current of one thousandamperes flowing due a potential difference of one thousand volts where the sine of thephase angle between them is 1. */
            'MAR' => 'megavar',
            /* A unit of power defining the rate of energy transferred or consumed when acurrent of 1000 amperes flows due to a potential of 1000 volts at unity powerfactor. */
            'MAW' => 'megawatt',
            /* A unit of count defining the number of one thousand brick equivalentunits. */
            'MBE' => 'thousand standard brick equivalent',
            /* A unit of volume equal to one thousand board foot. */
            'MBF' => 'thousand board foot',
            /* millibar */
            'MBR' => 'millibar',
            /* microgram */
            'MC' => 'microgram',
            /* millicurie */
            'MCU' => 'millicurie',
            /* A unit of count defining the number of metric tons of a product, disregardingthe water content of the product. */
            'MD' => 'air dry metric ton',
            /* milligram */
            'MGM' => 'milligram',
            /* megahertz */
            'MHZ' => 'megahertz',
            /* square mile (statute mile) */
            'MIK' => 'square mile (statute mile)',
            /* thousand */
            'MIL' => 'thousand',
            /* minute [unit of time] */
            'MIN' => 'minute [unit of time]',
            /* million */
            'MIO' => 'million',
            /* A unit of count defining the number of international units in multiples of10⁶. */
            'MIU' => 'million international unit',
            /* Synonym: billion (US) */
            'MLD' => 'milliard',
            /* millilitre */
            'MLT' => 'millilitre',
            /* square millimetre */
            'MMK' => 'square millimetre',
            /* cubic millimetre */
            'MMQ' => 'cubic millimetre',
            /* millimetre */
            'MMT' => 'millimetre',
            /* A unit of mass defining the number of kilograms of a product, disregarding thewater content of the product. */
            'MND' => 'kilogram, dry weight',
            /* Unit of time equal to 1/12 of a year of 365,25 days. */
            'MON' => 'month',
            /* megapascal */
            'MPA' => 'megapascal',
            /* cubic metre per hour */
            'MQH' => 'cubic metre per hour',
            /* cubic metre per second */
            'MQS' => 'cubic metre per second',
            /* metre per second squared */
            'MSK' => 'metre per second squared',
            /* square metre */
            'MTK' => 'square metre',
            /* Synonym: metre cubed */
            'MTQ' => 'cubic metre',
            /* metre */
            'MTR' => 'metre',
            /* metre per second */
            'MTS' => 'metre per second',
            /* megavolt - ampere */
            'MVA' => 'megavolt - ampere',
            /* A unit of power defining the total amount of bulk energy transferred orconsumed. */
            'MWH' => 'megawatt hour (1000 kW.h)',
            /* A unit of count defining the number of calories prescribed daily forparenteral/enteral therapy. */
            'N1' => 'pen calorie',
            /* Product of the avoirdupois pound according to the avoirdupois unit system andthe unit foot according to the Anglo-American and Imperial system of units divided bythe SI base unit second. */
            'N10' => 'pound foot per second',
            /* Product of the avoirdupois pound according to the avoirdupois unit system andthe unit inch according to the Anglo-American and Imperial system of units divided bythe SI base unit second. */
            'N11' => 'pound inch per second',
            /* Obsolete unit of the power relating to DIN 1301-3:1979: 1 PS' => 735,498 75W. */
            'N12' => 'Pferdestaerke',
            /* Non SI-conforming unit of pressure, at which a value of 1 cmHg meets the staticpressure, which is generated by a mercury at a temperature of 0 °C with a height of 1centimetre . */
            'N13' => 'centimetre of mercury (0 ºC)',
            /* Non SI-conforming unit of pressure, at which a value of 1 cmH2O meets thestatic pressure, which is generated by a head of water at a temperature of 4 °C with aheight of 1 centimetre . */
            'N14' => 'centimetre of water (4 ºC)',
            /* Non SI-conforming unit of pressure according to the Anglo-American and Imperialsystem for units, whereas the value of 1 ftH2O is equivalent to the static pressure,which is generated by a head of water at a temperature 39,2°F with a height of 1 foot. */
            'N15' => 'foot of water (39.2 ºF)',
            /* Non SI-conforming unit of pressure according to the Anglo-American and Imperialsystem for units, whereas the value of 1 inHg meets the static pressure, which isgenerated by a mercury at a temperature of 32°F with a height of 1 inch. */
            'N16' => 'inch of mercury (32 ºF)',
            /* Non SI-conforming unit of pressure according to the Anglo-American and Imperialsystem for units, whereas the value of 1 inHg meets the static pressure, which isgenerated by a mercury at a temperature of 60°F with a height of 1 inch. */
            'N17' => 'inch of mercury (60 ºF)',
            /* Non SI-conforming unit of pressure according to the Anglo-American and Imperialsystem for units, whereas the value of 1 inH2O meets the static pressure, which isgenerated by a head of water at a temperature of 39,2°F with a height of 1 inch. */
            'N18' => 'inch of water (39.2 ºF)',
            /* Non SI-conforming unit of pressure according to the Anglo-American and Imperialsystem for units, whereas the value of 1 inH2O meets the static pressure, which isgenerated by a head of water at a temperature of 60°F with a height of 1 inch. */
            'N19' => 'inch of water (60 ºF)',
            /* Non SI-conforming unit of the pressure according to the Anglo-American systemof units as the 1000-fold of the unit of the force pound-force divided by the power ofthe unit inch by exponent 2. */
            'N20' => 'kip per square inch',
            /* Non SI-conforming unit of pressure by the Imperial system of units according toNIST: 1 pdl/ft²' => 1,488 164 Pa. */
            'N21' => 'poundal per square foot',
            /* Unit of the surface specific mass (avoirdupois ounce according to theavoirdupois system of units according to the surface square inch according to theAnglo-American and Imperial system of units). */
            'N22' => 'ounce (avoirdupois) per square inch',
            /* Not SI-conforming unit of pressure, whereas a value of 1 mH2O is equivalent tothe static pressure, which is produced by one metre high water column . */
            'N23' => 'conventional metre of water',
            /* 0,001-fold of the SI base unit kilogram divided by the 0.000 001-fold of thepower of the SI base unit meter by exponent 2. */
            'N24' => 'gram per square millimetre',
            /* Unit for areal-related mass as a unit pound according to the avoirdupois unitsystem divided by the power of the unit yard according to the Anglo-American andImperial system of units with exponent 2. */
            'N25' => 'pound per square yard',
            /* Non SI-conforming unit of the pressure according to the Imperial system ofunits (poundal by square inch). */
            'N26' => 'poundal per square inch',
            /* Power of the unit foot according to the Anglo-American and Imperial system ofunits by exponent 4 according to NIST: 1 ft4' => 8,630 975 m4. */
            'N27' => 'foot to the fourth power',
            /* 0,001 fold of the power of the SI base unit meter by exponent 3 divided by theSI based unit kilogram. */
            'N28' => 'cubic decimetre per kilogram',
            /* Power of the unit foot according to the Anglo-American and Imperial system ofunits by exponent 3 divided by the unit avoirdupois pound according to the avoirdupoisunit system. */
            'N29' => 'cubic foot per pound',
            /* print point */
            'N3' => 'print point',
            /* Power of the unit inch according to the Anglo-American and Imperial system ofunits by exponent 3 divided by the avoirdupois pound according to the avoirdupois unitsystem . */
            'N30' => 'cubic inch per pound',
            /* 1000-fold of the derived SI unit newton divided by the SI base unitmetre. */
            'N31' => 'kilonewton per metre',
            /* Non SI-conforming unit of the surface tension according to the Imperial unitsystem as quotient poundal by inch. */
            'N32' => 'poundal per inch',
            /* Unit of force per unit length based on the Anglo-American system ofunits. */
            'N33' => 'pound-force per yard',
            /* Non SI-conforming unit of viscosity. */
            'N34' => 'poundal second per square foot',
            /* CGS (Centimetre-Gram-Second system) unit poise divided by the derived SI unitpascal. */
            'N35' => 'poise per pascal',
            /* Unit of the dynamic viscosity as a product of unit of the pressure (newton bysquare metre) multiplied with the SI base unit second. */
            'N36' => 'newton second per square metre',
            /* Unit of the dynamic viscosity as a quotient SI base unit kilogram divided bythe SI base unit metre and by the SI base unit second. */
            'N37' => 'kilogram per metre second',
            /* Unit of the dynamic viscosity as a quotient SI base unit kilogram divided bythe SI base unit metre and by the unit minute. */
            'N38' => 'kilogram per metre minute',
            /* Unit of the dynamic viscosity as a quotient SI base unit kilogram divided bythe SI base unit metre and by the unit day. */
            'N39' => 'kilogram per metre day',
            /* Unit of the dynamic viscosity as a quotient SI base unit kilogram divided bythe SI base unit metre and by the unit hour. */
            'N40' => 'kilogram per metre hour',
            /* Unit of the dynamic viscosity as a quotient of the 0,001-fold of the SI baseunit kilogram divided by the 0,01-fold of the SI base unit metre and SI base unitsecond. */
            'N41' => 'gram per centimetre second',
            /* Non SI-conforming unit of dynamic viscosity according to the Imperial system ofunits as product unit of the pressure (poundal by square inch) multiplied by the SI baseunit second. */
            'N42' => 'poundal second per square inch',
            /* Unit of the dynamic viscosity according to the Anglo-American unitsystem. */
            'N43' => 'pound per foot minute',
            /* Unit of the dynamic viscosity according to the Anglo-American unitsystem. */
            'N44' => 'pound per foot day',
            /* Power of the SI base unit meter by exponent 3 divided by the product of the SIbase unit second and the derived SI base unit pascal. */
            'N45' => 'cubic metre per second pascal',
            /* Unit of the work (force-path). */
            'N46' => 'foot poundal',
            /* Unit of work (force multiplied by path) according to the Imperial system ofunits as a product unit inch multiplied by poundal. */
            'N47' => 'inch poundal',
            /* Derived SI unit watt divided by the power of the 0,01-fold the SI base unitmetre by exponent 2. */
            'N48' => 'watt per square centimetre',
            /* Derived SI unit watt divided by the power of the unit inch according to theAnglo-American and Imperial system of units by exponent 2. */
            'N49' => 'watt per square inch',
            /* Unit of the surface heat flux according to the Imperial system ofunits. */
            'N50' => 'British thermal unit (international table) per square foot hour',
            /* Unit of the surface heat flux according to the Imperial system ofunits. */
            'N51' => 'British thermal unit (thermochemical) per square foot hour',
            /* Unit of the surface heat flux according to the Imperial system ofunits. */
            'N52' => 'British thermal unit (thermochemical) per square foot minute',
            /* Unit of the surface heat flux according to the Imperial system ofunits. */
            'N53' => 'British thermal unit (international table) per square foot second',
            /* Unit of the surface heat flux according to the Imperial system ofunits. */
            'N54' => 'British thermal unit (thermochemical) per square foot second',
            /* Unit of the surface heat flux according to the Imperial system ofunits. */
            'N55' => 'British thermal unit (international table) per square inch second',
            /* Unit of the surface heat flux according to the Imperial system ofunits. */
            'N56' => 'calorie (thermochemical) per square centimetre minute',
            /* Unit of the surface heat flux according to the Imperial system ofunits. */
            'N57' => 'calorie (thermochemical) per square centimetre second',
            /* Unit of the energy density according to the Imperial system ofunits. */
            'N58' => 'British thermal unit (international table) per cubic foot',
            /* Unit of the energy density according to the Imperial system ofunits. */
            'N59' => 'British thermal unit (thermochemical) per cubic foot',
            /* Unit of the heat capacity according to the Imperial system ofunits. */
            'N60' => 'British thermal unit (international table) per degree Fahrenheit',
            /* Unit of the heat capacity according to the Imperial system ofunits. */
            'N61' => 'British thermal unit (thermochemical) per degree Fahrenheit',
            /* Unit of the heat capacity according to the Imperial system ofunits. */
            'N62' => 'British thermal unit (international table) per degree Rankine',
            /* Unit of the heat capacity according to the Imperial system ofunits. */
            'N63' => 'British thermal unit (thermochemical) per degree Rankine',
            /* Unit of the heat capacity (British thermal unit according to the internationaltable according to the Rankine degree) according to the Imperial system of units dividedby the unit avoirdupois pound according to the avoirdupois system ofunits. */
            'N64' => 'British thermal unit (thermochemical) per pound degree Rankine',
            /* Unit of the mass-related heat capacity as quotient 1000-fold of the calorie(international table) divided by the product of the 0,001-fold of the SI base unitskilogram and kelvin. */
            'N65' => 'kilocalorie (international table) per gram kelvin',
            /* Unit of heat energy according to the Imperial system of units in a referencetemperature of 39 °F. */
            'N66' => 'British thermal unit (39 ºF)',
            /* Unit of heat energy according to the Imperial system of units in a referencetemperature of 59 °F. */
            'N67' => 'British thermal unit (59 ºF)',
            /* Unit of head energy according to the Imperial system of units at a referencetemperature of 60 °F. */
            'N68' => 'British thermal unit (60 ºF)',
            /* Unit for quantity of heat, which is to be required for 1 g air free water at aconstant pressure from 101,325 kPa, to warm up the pressure of standard atmosphere atsea level, from 19,5 °C on 20,5 °C. */
            'N69' => 'calorie (20 ºC)',
            /* Unit of heat energy according to the imperial system of units. */
            'N70' => 'quad (1015 BtuIT)',
            /* Unit of heat energy in commercial use, within the EU defined: 1 thm (EC)' => 100000 BtuIT. */
            'N71' => 'therm (EC)',
            /* Unit of heat energy in commercial use. */
            'N72' => 'therm (U.S.)',
            /* Unit of the heat energy according to the Imperial system of units divided theunit avoirdupois pound according to the avoirdupois system of units. */
            'N73' => 'British thermal unit (thermochemical) per pound',
            /* Unit of the heat transition coefficient according to the Imperial system ofunits. */
            'N74' => 'British thermal unit (international table) per hour square foot degreeFahrenheit',
            /* Unit of the heat transition coefficient according to the imperial system ofunits. */
            'N75' => 'British thermal unit (thermochemical) per hour square foot degree Fahrenheit',
            /* Unit of the heat transition coefficient according to the imperial system ofunits. */
            'N76' => 'British thermal unit (international table) per second square foot degreeFahrenheit',
            /* Unit of the heat transition coefficient according to the imperial system ofunits. */
            'N77' => 'British thermal unit (thermochemical) per second square foot degree Fahrenheit',
            /* 1000-fold of the derived SI unit watt divided by the product of the power ofthe SI base unit metre by exponent 2 and the SI base unit kelvin. */
            'N78' => 'kilowatt per square metre kelvin',
            /* SI base unit kelvin divided by the derived SI unit pascal. */
            'N79' => 'kelvin per pascal',
            /* Derived SI unit watt divided by the product of the SI base unit metre and theunit for temperature degree Celsius. */
            'N80' => 'watt per metre degree Celsius',
            /* 1000-fold of the derived SI unit watt divided by the product of the SI baseunit metre and the SI base unit kelvin. */
            'N81' => 'kilowatt per metre kelvin',
            /* 1000-fold of the derived SI unit watt divided by the product of the SI baseunit metre and the unit for temperature degree Celsius. */
            'N82' => 'kilowatt per metre degree Celsius',
            /* SI base unit metre divided by the product of the unit degree Celsius and the SIbase unit metre. */
            'N83' => 'metre per degree Celcius metre',
            /* Non SI-conforming unit of the thermal resistance according to the Imperialsystem of units. */
            'N84' => 'degree Fahrenheit hour per British thermal unit (international table)',
            /* Non SI-conforming unit of the thermal resistance according to the Imperialsystem of units. */
            'N85' => 'degree Fahrenheit hour per British thermal unit (thermochemical)',
            /* Non SI-conforming unit of the thermal resistance according to the Imperialsystem of units. */
            'N86' => 'degree Fahrenheit second per British thermal unit (international table)',
            /* Non SI-conforming unit of the thermal resistance according to the Imperialsystem of units. */
            'N87' => 'degree Fahrenheit second per British thermal unit (thermochemical)',
            /* Unit of specific thermal resistance according to the Imperial system ofunits. */
            'N88' => 'degree Fahrenheit hour square foot per British thermal unit (international table)inch',
            /* Unit of specific thermal resistance according to the Imperial system ofunits. */
            'N89' => 'degree Fahrenheit hour square foot per British thermal unit (thermochemical)inch',
            /* 1000-fold of the derived SI unit farad. */
            'N90' => 'kilofarad',
            /* Reciprocal of the derived SI unit joule. */
            'N91' => 'reciprocal joule',
            /* 0,000 000 000 001-fold of the derived SI unit siemens. */
            'N92' => 'picosiemens',
            /* SI base unit ampere divided by the derived SI unit pascal. */
            'N93' => 'ampere per pascal',
            /* CGS (Centimetre-Gram-Second system) unit of the electrical charge, where thecharge amounts to exactly 1 Fr where the force of 1 dyn on an equal load is performed ata distance of 1 cm. */
            'N94' => 'franklin',
            /* A unit of electric charge defining the amount of charge accumulated by a steadyflow of one ampere for one minute.. */
            'N95' => 'ampere minute',
            /* CGS (Centimetre-Gram-Second system) unit of the electric power which is definedby a force of 2 dyn per cm between two parallel conductors of infinite length withnegligible cross-section in the distance of 1 cm. */
            'N96' => 'biot',
            /* CGS (Centimetre-Gram-Second system) unit of the magnetomotive force, which isdefined by the work to increase the magnetic potential of a positive common pol with 1erg. */
            'N97' => 'gilbert',
            /* Derived SI unit volt divided by the derived SI unit pascal. */
            'N98' => 'volt per pascal',
            /* 0,000 000 000 001-fold of the derived SI unit volt. */
            'N99' => 'picovolt',
            /* milligram per kilogram */
            'NA' => 'milligram per kilogram',
            /* A unit of count defining the number of articles (article: item). */
            'NAR' => 'number of articles',
            /* A unit of count defining the number of cells (cell: an enclosed orcircumscribed space, cavity, or volume). */
            'NCL' => 'number of cells',
            /* newton */
            'NEW' => 'newton',
            /* A unit of count defining the number of messages. */
            'NF' => 'message',
            /* A unit of count defining the number of instances of nothing. */
            'NIL' => 'nil',
            /* A unit of count defining the number of international units. */
            'NIU' => 'number of international units',
            /* A unit of volume defining the number of loads (load: a quantity of itemscarried or processed at one time). */
            'NL' => 'load',
            /* Normalised cubic metre (temperature 0°C and pressure 101325 millibars) */
            'NM3' => 'Normalised cubic metre',
            /* nautical mile */
            'NMI' => 'nautical mile',
            /* A unit of count defining the number of packs (pack: a collection of objectspackaged together). */
            'NMP' => 'number of packs',
            /* A unit of count defining the number of parts (part: component of a largerentity). */
            'NPT' => 'number of parts',
            /* A unit of mass equal to 2000 pounds, see ton (US). Refer InternationalConvention on tonnage measurement of Ships. */
            'NT' => 'net ton',
            /* newton metre */
            'NU' => 'newton metre',
            /* A unit of proportion equal to 10⁻³. Synonym: per mille */
            'NX' => 'part per thousand',
            /* A unit of count defining the number of panels (panel: a distinct, usuallyrectangular, section of a surface). */
            'OA' => 'panel',
            /* A unit of mass defining the ozone depletion potential in kilograms of a productrelative to the calculated depletion for the reference substance, Trichlorofluoromethane(CFC-11). */
            'ODE' => 'ozone depletion equivalent',
            /* ohm */
            'OHM' => 'ohm',
            /* ounce per square yard */
            'ON' => 'ounce per square yard',
            /* ounce (avoirdupois) */
            'ONZ' => 'ounce (avoirdupois)',
            /* The number of oscillations per minute. */
            'OPM' => 'oscillations per minute',
            /* A unit of time defining the number of overtime hours. */
            'OT' => 'overtime hour',
            /* fluid ounce (US) */
            'OZA' => 'fluid ounce (US)',
            /* fluid ounce (UK) */
            'OZI' => 'fluid ounce (UK)',
            /* A unit of proportion equal to 0.01. */
            'P1' => 'percent',
            /* Derived SI unit coulomb divided by the SI base unit metre. */
            'P10' => 'coulomb per metre',
            /* 1000 fold of the derived SI unit weber. */
            'P11' => 'kiloweber',
            /* Unit of magnetic flow density. */
            'P12' => 'gamma',
            /* 1000-fold of the derived SI unit tesla. */
            'P13' => 'kilotesla',
            /* Quotient of the derived SI unit joule divided by the SI base unitsecond. */
            'P14' => 'joule per second',
            /* Quotient from the derived SI unit joule divided by the unitminute. */
            'P15' => 'joule per minute',
            /* Quotient from the derived SI unit joule divided by the unit hour. */
            'P16' => 'joule per hour',
            /* Quotient from the derived SI unit joule divided by the unit day. */
            'P17' => 'joule per day',
            /* Quotient from the 1000-fold of the derived SI unit joule divided by the SI baseunit second. */
            'P18' => 'kilojoule per second',
            /* Quotient from the 1000-fold of the derived SI unit joule divided by the unitminute. */
            'P19' => 'kilojoule per minute',
            /* pound per foot */
            'P2' => 'pound per foot',
            /* Quotient from the 1000-fold of the derived SI unit joule divided by the unithour. */
            'P20' => 'kilojoule per hour',
            /* Quotient from the 1000-fold of the derived SI unit joule divided by the unitday. */
            'P21' => 'kilojoule per day',
            /* 0,000 000 001-fold of the derived SI unit ohm. */
            'P22' => 'nanoohm',
            /* Unit of resistivity. */
            'P23' => 'ohm circular-mil per foot',
            /* 1000-fold of the derived SI unit henry. */
            'P24' => 'kilohenry',
            /* Derived SI unit lumen divided by the power of the unit foot according to theAnglo-American and Imperial system of units by exponent 2. */
            'P25' => 'lumen per square foot',
            /* CGS (Centimetre-Gram-Second system) unit of luminance, defined as lumen bysquare centimetre. */
            'P26' => 'phot',
            /* Non SI conform traditional unit, defined as density of light which impinges ona surface which has a distance of one foot from a light source, which shines with anintensity of an international candle. */
            'P27' => 'footcandle',
            /* SI base unit candela divided by the power of unit inch according to theAnglo-American and Imperial system of units by exponent 2. */
            'P28' => 'candela per square inch',
            /* Unit of the luminance according to the Anglo-American system of units, definedas emitted or reflected luminance of a lm/ft². */
            'P29' => 'footlambert',
            /* CGS (Centimetre-Gram-Second system) unit of luminance, defined as the emittedor reflected luminance by one lumen per square centimetre. */
            'P30' => 'lambert',
            /* CGS (Centimetre-Gram-Second system) unit of luminance, defined as emitted orreflected luminance by one lumen per square centimetre. */
            'P31' => 'stilb',
            /* Base unit SI candela divided by the power of the unit foot according to theAnglo-American and Imperial system of units by exponent 2. */
            'P32' => 'candela per square foot',
            /* 1000-fold of the SI base unit candela. */
            'P33' => 'kilocandela',
            /* 0,001-fold of the SI base unit candela. */
            'P34' => 'millicandela',
            /* Obsolete, non-legal unit of the power in Germany relating to DIN 1301-3:1979: 1HK' => 0,903 cd. */
            'P35' => 'Hefner-Kerze',
            /* Obsolete, non-legal unit of the power in Germany relating to DIN 1301-3:1979: 1HK' => 1,019 cd. */
            'P36' => 'international candle',
            /* Unit of the areal-related energy transmission according to the Imperial systemof units. */
            'P37' => 'British thermal unit (international table) per square foot',
            /* Unit of the areal-related energy transmission according to the Imperial systemof units. */
            'P38' => 'British thermal unit (thermochemical) per square foot',
            /* Unit of the areal-related energy transmission according to the Imperial systemof units. */
            'P39' => 'calorie (thermochemical) per square centimetre',
            /* CGS (Centimetre-Gram-Second system) unit of the areal-related energytransmission (as a measure of the incident quantity of heat of solar radiation on theearth's surface). */
            'P40' => 'langley',
            /* 1 Dec := log2 10 ˜ 3,32 according to the logarithm for frequency range betweenf1 and f2, when f2/f1' => 10. */
            'P41' => 'decade (logarithmic)',
            /* Unit of the set as a product of the power of derived SI unit pascal withexponent 2 and the SI base unit second. */
            'P42' => 'pascal squared second',
            /* Unit bel divided by the SI base unit metre. */
            'P43' => 'bel per metre',
            /* Non SI-conforming unit of quantity of a substance relating that one pound moleof a chemical composition corresponds to the same number of pounds as the molecularweight of one molecule of this composition in atomic mass units. */
            'P44' => 'pound mole',
            /* Non SI-conforming unit of the power of the amount of substance non-SI compliantunit of the molar flux relating that a pound mole of a chemical composition the samenumber of pound corresponds like the molecular weight of a molecule of this compositionin atomic mass units. */
            'P45' => 'pound mole per second',
            /* Non SI-conforming unit of the power of the amount of substance non-SI compliantunit of the molar flux relating that a pound mole of a chemical composition the samenumber of pound corresponds like the molecular weight of a molecule of this compositionin atomic mass units. */
            'P46' => 'pound mole per minute',
            /* 1000-fold of the SI base unit mol divided by the SI base unitkilogram. */
            'P47' => 'kilomole per kilogram',
            /* Non SI-conforming unit of the material molar flux divided by the avoirdupoispound for mass according to the avoirdupois unit system. */
            'P48' => 'pound mole per pound',
            /* Product of the derived SI unit newton and the power of SI base unit metre withexponent 2 divided by the SI base unit ampere. */
            'P49' => 'newton square metre per ampere',
            /* A unit of count defining the number of five-packs (five-pack: set of five itemspackaged together). */
            'P5' => 'five pack',
            /* Product of the derived SI unit weber and SI base unit metre. */
            'P50' => 'weber metre',
            /* SI base unit mol divided by the product of the SI base unit kilogram and thederived SI unit pascal. */
            'P51' => 'mol per kilogram pascal',
            /* SI base unit mol divided by the product of the power from the SI base unitmetre with exponent 3 and the derived SI unit pascal. */
            'P52' => 'mol per cubic metre pascal',
            /* CGS (Centimetre-Gram-Second system) unit for magnetic flux of a magnetic pole(according to the interaction of identical poles of 1 dyn at a distance of acm). */
            'P53' => 'unit pole',
            /* 0,001-fold of the derived SI unit gray divided by the SI base unitsecond. */
            'P54' => 'milligray per second',
            /* 0,000 001-fold of the derived SI unit gray divided by the SI base unitsecond. */
            'P55' => 'microgray per second',
            /* 0,000 000 001-fold of the derived SI unit gray divided by the SI base unitsecond. */
            'P56' => 'nanogray per second',
            /* SI derived unit gray divided by the unit minute. */
            'P57' => 'gray per minute',
            /* 0,001-fold of the derived SI unit gray divided by the unitminute. */
            'P58' => 'milligray per minute',
            /* 0,000 001-fold of the derived SI unit gray divided by the unitminute. */
            'P59' => 'microgray per minute',
            /* 0,000 000 001-fold of the derived SI unit gray divided by the unitminute. */
            'P60' => 'nanogray per minute',
            /* SI derived unit gray divided by the unit hour. */
            'P61' => 'gray per hour',
            /* 0,001-fold of the derived SI unit gray divided by the unit hour. */
            'P62' => 'milligray per hour',
            /* 0,000 001-fold of the derived SI unit gray divided by the unithour. */
            'P63' => 'microgray per hour',
            /* 0,000 000 001-fold of the derived SI unit gray divided by the unithour. */
            'P64' => 'nanogray per hour',
            /* Derived SI unit sievert divided by the SI base unit second. */
            'P65' => 'sievert per second',
            /* 0,001-fold of the derived SI unit sievert divided by the SI base unitsecond. */
            'P66' => 'millisievert per second',
            /* 0,000 001-fold of the derived SI unit sievert divided by the SI base unitsecond. */
            'P67' => 'microsievert per second',
            /* 0,000 000 001-fold of the derived SI unit sievert divided by the SI base unitsecond. */
            'P68' => 'nanosievert per second',
            /* Unit for the equivalent tin rate relating to DIN 1301-3:1979: 1 rem/s' => 0,01J/(kg·s)' => 1 Sv/s. */
            'P69' => 'rem per second',
            /* Derived SI unit sievert divided by the unit hour. */
            'P70' => 'sievert per hour',
            /* 0,001-fold of the derived SI unit sievert divided by the unithour. */
            'P71' => 'millisievert per hour',
            /* 0,000 001-fold of the derived SI unit sievert divided by the unithour. */
            'P72' => 'microsievert per hour',
            /* 0,000 000 001-fold of the derived SI unit sievert divided by the unithour. */
            'P73' => 'nanosievert per hour',
            /* Derived SI unit sievert divided by the unit minute. */
            'P74' => 'sievert per minute',
            /* 0,001-fold of the derived SI unit sievert divided by the unitminute. */
            'P75' => 'millisievert per minute',
            /* 0,000 001-fold of the derived SI unit sievert divided by the unitminute. */
            'P76' => 'microsievert per minute',
            /* 0,000 000 001-fold of the derived SI unit sievert divided by the unitminute. */
            'P77' => 'nanosievert per minute',
            /* Complement of the power of the unit inch according to the Anglo-American andImperial system of units by exponent 2. */
            'P78' => 'reciprocal square inch',
            /* Unit of the burst index as derived unit for pressure pascal related to thesubstance, represented as a quotient from the SI base unit kilogram divided by the powerof the SI base unit metre by exponent 2. */
            'P79' => 'pascal square metre per kilogram',
            /* 0,001-fold of the derived SI unit pascal divided by the SI base unitmetre. */
            'P80' => 'millipascal per metre',
            /* 1000-fold of the derived SI unit pascal divided by the SI base unitmetre. */
            'P81' => 'kilopascal per metre',
            /* 100-fold of the derived SI unit pascal divided by the SI base unitmetre. */
            'P82' => 'hectopascal per metre',
            /* Outdated unit of the pressure divided by the SI base unit metre. */
            'P83' => 'standard atmosphere per metre',
            /* Obsolete and non-legal unit of the pressure which is generated by a 10 metrewater column divided by the SI base unit metre. */
            'P84' => 'technical atmosphere per metre',
            /* CGS (Centimetre-Gram-Second system) unit of the pressure divided by the SI baseunit metre. */
            'P85' => 'torr per metre',
            /* Compound unit for pressure (pound-force according to the Anglo-American unitsystem divided by the power of the unit inch according to the Anglo-American andImperial system of units with the exponent 2) divided by the unit inch according to theAnglo-American and Imperial system of units . */
            'P86' => 'psi per inch',
            /* Unit of volume flow cubic meters by second related to the transmission surfacein square metres. */
            'P87' => 'cubic metre per second square metre',
            /* Non SI-conforming unit of fluidity of dynamic viscosity. */
            'P88' => 'rhe',
            /* Unit for length-related rotational moment according to the Anglo-American andImperial system of units. */
            'P89' => 'pound-force foot per inch',
            /* Unit for length-related rotational moment according to the Anglo-American andImperial system of units. */
            'P90' => 'pound-force inch per inch',
            /* Traditional unit for the ability of a material to allow the transition of thesteam, defined at a temperature of 0 °C as steam transmittance, where the mass of onegrain steam penetrates an area of one foot squared at a pressure from one inch mercuryper hour. */
            'P91' => 'perm (0 ºC)',
            /* Traditional unit for the ability of a material to allow the transition of thesteam, defined at a temperature of 23 °C as steam transmittance at which the mass of onegrain of steam penetrates an area of one square foot at a pressure of one inch mercuryper hour. */
            'P92' => 'perm (23 ºC)',
            /* Unit byte divided by the SI base unit second. */
            'P93' => 'byte per second',
            /* 1000-fold of the unit byte divided by the SI base unit second. */
            'P94' => 'kilobyte per second',
            /* 1 000 000-fold of the unit byte divided by the SI base unitsecond. */
            'P95' => 'megabyte per second',
            /* Reciprocal of the derived SI unit volt. */
            'P96' => 'reciprocal volt',
            /* Reciprocal of the unit radian. */
            'P97' => 'reciprocal radian',
            /* Unit of the equilibrium constant on the basis of the pressure(ISO 80000-9:2009,9-35.a). */
            'P98' => 'pascal to the power sum of stoichiometric numbers',
            /* Unit of the equilibrium constant on the basis of the concentration (ISO80000-9:2009, 9-36.a). */
            'P99' => 'mole per cubiv metre to the power sum of stoichiometric numbers',
            /* pascal */
            'PAL' => 'pascal',
            /* A unit of count defining the number of pads (pad: block of paper sheetsfastened together at one end). */
            'PD' => 'pad',
            /* A unit of volume equal to one litre of proof spirits, or the alcohol equivalentthereof. Used for measuring the strength of distilled alcoholic liquors, expressed as apercentage of the alcohol content of a standard mixture at a specifictemperature. */
            'PFL' => 'proof litre',
            /* A unit of volume equal to one gallon of proof spirits, or the alcoholequivalent thereof. Used for measuring the strength of distilled alcoholic liquors,expressed as a percentage of the alcohol content of a standard mixture at a specifictemperature. */
            'PGL' => 'proof gallon',
            /* A unit of count defining the number of characters that fit in a horizontalinch. */
            'PI' => 'pitch',
            /* A unit of proportion defining the sugar content of a product, especially inrelation to beer. */
            'PLA' => 'degree Plato',
            /* pound per inch of length */
            'PO' => 'pound per inch of length',
            /* A unit of quantity defining the degree of thickness of a bound publication,expressed as the number of pages per inch of thickness. */
            'PQ' => 'page per inch',
            /* A unit of count defining the number of pairs (pair: item described bytwo's). */
            'PR' => 'pair',
            /* pound-force per square inch */
            'PS' => 'pound-force per square inch',
            /* dry pint (US) */
            'PTD' => 'dry pint (US)',
            /* pint (UK) */
            'PTI' => 'pint (UK)',
            /* liquid pint (US) */
            'PTL' => 'liquid pint (US)',
            /* A quantity of allowance of food allotted to, or enough for, oneperson. */
            'PTN' => 'portion',
            /* Unit of the magnetic dipole moment of the molecule as derived SI unit jouledivided by the derived SI unit tesla. */
            'Q10' => 'joule per tesla',
            /* Unit of the market value according to the feature of a single feature as astatistical measurement of the existing utilization. */
            'Q11' => 'erlang',
            /* Synonym for byte: 1 octet' => 8 bit' => 1 byte. */
            'Q12' => 'octet',
            /* Unit octet divided by the SI base unit second. */
            'Q13' => 'octet per second',
            /* Logarithmic unit for information equal to the content of decision of a sentenceof two mutually exclusive events, expressed as a logarithm to base 2. */
            'Q14' => 'shannon',
            /* Logarithmic unit for information equal to the content of decision of a sentenceof ten mutually exclusive events, expressed as a logarithm to base 10. */
            'Q15' => 'hartley',
            /* Logarithmic unit for information equal to the content of decision of a sentenceof ,718 281 828 459 mutually exclusive events, expressed as a logarithm to base Eulervalue e. */
            'Q16' => 'natural unit of information',
            /* Time related logarithmic unit for information equal to the content of decisionof a sentence of two mutually exclusive events, expressed as a logarithm to base2. */
            'Q17' => 'shannon per second',
            /* Time related logarithmic unit for information equal to the content of decisionof a sentence of ten mutually exclusive events, expressed as a logarithm to base10. */
            'Q18' => 'hartley per second',
            /* Time related logarithmic unit for information equal to the content of decisionof a sentence of 2,718 281 828 459 mutually exclusive events, expressed as a logarithmto base of the Euler value e. */
            'Q19' => 'natural unit of information per second',
            /* Unit of the Einstein transition probability for spontaneous or inducingemissions and absorption according to ISO 80000-7:2008, expressed as SI base unit seconddivided by the SI base unit kilogram. */
            'Q20' => 'second per kilogramm',
            /* Unit of the first radiation constants c1' => 2·p·h·c0², the value of which is3,741 771 18·10?¹6-fold that of the comparative value of the product of the derived SIunit watt multiplied with the power of the SI base unit metre with the exponent2. */
            'Q21' => 'watt square metre',
            /* Unit of the density of states as an expression of angular frequency ascomplement of the product of hertz and radiant and the power of SI base unit metre byexponent 3 . */
            'Q22' => 'second per radian cubic metre',
            /* Complement of the derived SI unit weber as unit of the Josephson constant,which value is equal to the 384 597,891-fold of the reference value gigahertz divided byvolt. */
            'Q23' => 'weber to the power minus one',
            /* Complement of the unit inch according to the Anglo-American and Imperial systemof units. */
            'Q24' => 'reciprocal inch',
            /* Unit used at the statement of relative refractive indexes of optical systems ascomplement of the focal length with correspondence to: 1 dpt' => 1/m. */
            'Q25' => 'dioptre',
            /* Value of the quotient from two physical units of the same kind as a numeratorand denominator whereas the units are shortened mutually. */
            'Q26' => 'one per one',
            /* Unit for length-related rotational moment as product of the derived SI unitnewton and the SI base unit metre divided by the SI base unit metre. */
            'Q27' => 'newton metre per metre',
            /* Unit for the ability of a material to allow the transition ofsteam. */
            'Q28' => 'kilogram per square metre pascal second',
            /* Microgram per hectogram. */
            'Q29' => 'microgram per hectogram',
            /* The activity of the (solvated) hydrogen ion (a logarithmic measure used tostate the acidity or alkalinity of a chemical solution). */
            'Q30' => 'pH (potential of Hydrogen)',
            /* kilojoule per gram */
            'Q31' => 'kilojoule per gram',
            /* femtolitre */
            'Q32' => 'femtolitre',
            /* picolitre */
            'Q33' => 'picolitre',
            /* nanolitre */
            'Q34' => 'nanolitre',
            /* A unit of power defining the total amount of bulk energy transferred orconsumer per minute. */
            'Q35' => 'megawatts per minute',
            /* A unit of the amount of surface area per unit volume of an object or collectionof objects. */
            'Q36' => 'square metre per cubic metre',
            /* Standard cubic metre (temperature 15°C and pressure 101325 millibars ) perday */
            'Q37' => 'Standard cubic metre per day',
            /* Standard cubic metre (temperature 15°C and pressure 101325 millibars ) perhour */
            'Q38' => 'Standard cubic metre per hour',
            /* Normalized cubic metre (temperature 0°C and pressure 101325 millibars ) perday */
            'Q39' => 'Normalized cubic metre per day',
            /* Normalized cubic metre (temperature 0°C and pressure 101325 millibars ) perhour */
            'Q40' => 'Normalized cubic metre per hour',
            /* A unit of count defining the number of meals (meal: an amount of food to beeaten on a single occasion). */
            'Q3' => 'meal',
            /* A unit of count defining the number of facsimile pages. */
            'QA' => 'page - facsimile',
            /* A unit of time defining the number of quarters (3 months). */
            'QAN' => 'quarter (of a year)',
            /* A unit of count defining the number of hardcopy pages (hardcopy page: a pagerendered as printed or written output on paper, film, or other permanentmedium). */
            'QB' => 'page - hardcopy',
            /* A unit of count for paper, expressed as the number of quires (quire: a numberof paper sheets, typically 25). */
            'QR' => 'quire',
            /* dry quart (US) */
            'QTD' => 'dry quart (US)',
            /* quart (UK) */
            'QTI' => 'quart (UK)',
            /* liquid quart (US) */
            'QTL' => 'liquid quart (US)',
            /* A traditional unit of weight equal to 1/4 hundredweight. In the United Kingdom,one quarter equals 28 pounds. */
            'QTR' => 'quarter (UK)',
            /* A unit of count defining the number of picas. (pica: typographical length equalto 12 points or 4.22 mm (approx.)). */
            'R1' => 'pica',
            /* A unit of volume equal to one thousand cubic metres. */
            'R9' => 'thousand cubic metre',
            /* A unit of time defining the number of hours of operation. */
            'RH' => 'running or operating hour',
            /* A unit of count for paper, expressed as the number of reams (ream: a largequantity of paper sheets, typically 500). */
            'RM' => 'ream',
            /* A unit of count defining the number of rooms. */
            'ROM' => 'room',
            /* A unit of mass for paper, expressed as pounds per ream. (ream: a large quantityof paper, typically 500 sheets). */
            'RP' => 'pound per ream',
            /* Refer ISO/TC12 SI Guide */
            'RPM' => 'revolutions per minute',
            /* Refer ISO/TC12 SI Guide */
            'RPS' => 'revolutions per second',
            /* A unit of information typically used for billing purposes, expressed as thenumber of revenue tons (revenue ton: either a metric ton or a cubic metres, whichever isthe larger), moved over a distance of one mile. */
            'RT' => 'revenue ton mile',
            /* Synonym: foot squared per second */
            'S3' => 'square foot per second',
            /* Synonym: metre squared per second (square metres/second US) */
            'S4' => 'square metre per second',
            /* A unit of time defining the number of half years (6 months). */
            'SAN' => 'half year (6 months)',
            /* A unit of count defining the number of units in multiples of 20. */
            'SCO' => 'score',
            /* scruple */
            'SCR' => 'scruple',
            /* second [unit of time] */
            'SEC' => 'second [unit of time]',
            /* A unit of count defining the number of sets (set: a number of objects groupedtogether). */
            'SET' => 'set',
            /* A unit of information equal to 64000 bytes. */
            'SG' => 'segment',
            /* siemens */
            'SIE' => 'siemens',
            /* Standard cubic metre (temperature 15°C and pressure 101325 millibars) */
            'SM3' => 'Standard cubic metre',
            /* mile (statute mile) */
            'SMI' => 'mile (statute mile)',
            /* A unit of count defining the number of squares (square: rectangularshape). */
            'SQ' => 'square',
            /* A unit of count defining the number of squares of roofing materials, measuredin multiples of 100 square feet. */
            'SQR' => 'square, roofing',
            /* A unit of count defining the number of strips (strip: long narrow piece of anobject). */
            'SR' => 'strip',
            /* A unit of count defining the number of sticks (stick: slender and oftencylindrical piece of a substance). */
            'STC' => 'stick',
            /* stone (UK) */
            'STI' => 'stone (UK)',
            /* A unit of count defining the number of cigarettes in the smallest unit forstock-taking and/or duty computation. */
            'STK' => 'stick, cigarette',
            /* A unit of volume defining the number of litres of a product at a temperature of15 degrees Celsius, especially in relation to hydrocarbon oils. */
            'STL' => 'standard litre',
            /* Synonym: net ton (2000 lb) */
            'STN' => 'ton (US) or short ton (UK/US)',
            /* A unit of count defining the number of straws (straw: a slender tube used forsucking up liquids). */
            'STW' => 'straw',
            /* A unit of count defining the number of skeins (skein: a loosely-coiled bundleof yarn or thread). */
            'SW' => 'skein',
            /* A unit of count defining the number of shipments (shipment: an amount of goodsshipped or transported). */
            'SX' => 'shipment',
            /* A unit of count defining the number of syringes (syringe: a small device forpumping, spraying and/or injecting liquids through a small aperture). */
            'SYR' => 'syringe',
            /* A unit of count defining the number of lines in service. */
            'T0' => 'telecommunication line in service',
            /* A unit of count defining the number of pieces in multiples of 1000 (piece: asingle item, article or exemplar). */
            'T3' => 'thousand piece',
            /* kiloampere hour (thousand ampere hour) */
            'TAH' => 'kiloampere hour (thousand ampere hour)',
            /* A unit of chemistry defining the amount of potassium hydroxide (KOH) inmilligrams that is needed to neutralize the acids in one gram of oil. It is an importantquality measurement of crude oil. */
            'TAN' => 'total acid number',
            /* thousand square inch */
            'TI' => 'thousand square inch',
            /* A unit of mass defining the number of metric tons of a product, including itscontainer. */
            'TIC' => 'metric ton, including container',
            /* A unit of mass defining the number of metric tons of a product, including itsinner packaging materials. */
            'TIP' => 'metric ton, including inner packaging',
            /* A unit of information typically used for billing purposes, expressed as thenumber of tonnes (metric tons) moved over a distance of one kilometre. */
            'TKM' => 'tonne kilometre',
            /* A unit of mass equal to one thousand grams of imported meat, disregarding lessvaluable by-products such as the entrails. */
            'TMS' => 'kilogram of imported meat, less offal',
            /* Synonym: metric ton */
            'TNE' => 'tonne (metric ton)',
            /* A unit of count defining the number of items in multiples of 10. */
            'TP' => 'ten pack',
            /* The number of teeth per inch. */
            'TPI' => 'teeth per inch',
            /* A unit of count defining the number of pairs in multiples of 10 (pair: itemdescribed by two's). */
            'TPR' => 'ten pair',
            /* A unit of volume equal to one thousand cubic metres per day. */
            'TQD' => 'thousand cubic metre per day',
            /* trillion (EUR) */
            'TRL' => 'trillion (EUR)',
            /* A unit of count defining the number of sets in multiples of 10 (set: a numberof objects grouped together). */
            'TST' => 'ten set',
            /* A unit of count defining the number of sticks in multiples of 10000 (stick:slender and often cylindrical piece of a substance). */
            'TTS' => 'ten thousand sticks',
            /* A unit of count defining the number of treatments (treatment: subjection to theaction of a chemical, physical or biological agent). */
            'U1' => 'treatment',
            /* A unit of count defining the number of tablets (tablet: a small flat orcompressed solid object). */
            'U2' => 'tablet',
            /* A unit of count defining the average number of lines in service. */
            'UB' => 'telecommunication line in service average',
            /* A unit of count defining the number of network access ports. */
            'UC' => 'telecommunication port',
            /* volt - ampere per kilogram */
            'VA' => 'volt - ampere per kilogram',
            /* volt */
            'VLT' => 'volt',
            /* A measure of concentration, typically expressed as the percentage volume of asolute in a solution. */
            'VP' => 'percent volume',
            /* A unit of mass defining the number of kilograms of a product, including thewater content of the product. */
            'W2' => 'wet kilo',
            /* watt per kilogram */
            'WA' => 'watt per kilogram',
            /* A unit of mass defining the number of pounds of a material, including the watercontent of the material. */
            'WB' => 'wet pound',
            /* A unit of volume used for measuring lumber. One board foot equals 1/12 of acubic foot. */
            'WCD' => 'cord',
            /* A unit of mass defining the number of tons of a material, including the watercontent of the material. */
            'WE' => 'wet ton',
            /* weber */
            'WEB' => 'weber',
            /* week */
            'WEE' => 'week',
            /* A unit of volume equal to 231 cubic inches. */
            'WG' => 'wine gallon',
            /* watt hour */
            'WHR' => 'watt hour',
            /* A unit of time defining the number of working months. */
            'WM' => 'working month',
            /* A unit of volume of finished lumber equal to 165 cubic feet. Synonym: standardcubic foot */
            'WSD' => 'standard',
            /* watt */
            'WTT' => 'watt',
            /* A unit of distance used or formerly used by British surveyors. */
            'X1' => 'Gunters chain',
            /* square yard */
            'YDK' => 'square yard',
            /* cubic yard */
            'YDQ' => 'cubic yard',
            /* yard */
            'YRD' => 'yard',
            /* A unit of count defining the number of hanging containers. */
            'Z11' => 'hanging container',
            /* A unit of count defining the number of pages. */
            'ZP' => 'page',
            /* A unit of measure as agreed in common between two or moreparties. */
            'ZZ' => 'mutually defined',
            /* Drum, steel */
            'X1A' => 'Drum, steel',
            /* Drum, aluminium */
            'X1B' => 'Drum, aluminium',
            /* Drum, plywood */
            'X1D' => 'Drum, plywood',
            /* A packaging container of flexible construction. */
            'X1F' => 'Container, flexible',
            /* Drum, fibre */
            'X1G' => 'Drum, fibre',
            /* Drum, wooden */
            'X1W' => 'Drum, wooden',
            /* Barrel, wooden */
            'X2C' => 'Barrel, wooden',
            /* Jerrican, steel */
            'X3A' => 'Jerrican, steel',
            /* Jerrican, plastic */
            'X3H' => 'Jerrican, plastic',
            /* A cloth plastic or paper based bag having the dimensions of the pallet on whichit is constructed. */
            'X43' => 'Bag, super bulk',
            /* A type of plastic bag, typically used to wrap promotional pieces, publications,product samples, and/or catalogues. */
            'X44' => 'Bag, polybag',
            /* Box, steel */
            'X4A' => 'Box, steel',
            /* Box, aluminium */
            'X4B' => 'Box, aluminium',
            /* Box, natural wood */
            'X4C' => 'Box, natural wood',
            /* Box, plywood */
            'X4D' => 'Box, plywood',
            /* Box, reconstituted wood */
            'X4F' => 'Box, reconstituted wood',
            /* Box, fibreboard */
            'X4G' => 'Box, fibreboard',
            /* Box, plastic */
            'X4H' => 'Box, plastic',
            /* Bag, woven plastic */
            'X5H' => 'Bag, woven plastic',
            /* Bag, textile */
            'X5L' => 'Bag, textile',
            /* Bag, paper */
            'X5M' => 'Bag, paper',
            /* Composite packaging, plastic receptacle */
            'X6H' => 'Composite packaging, plastic receptacle',
            /* Composite packaging, glass receptacle */
            'X6P' => 'Composite packaging, glass receptacle',
            /* A type of portable container designed to store equipment for carriage in anautomobile. */
            'X7A' => 'case, car',
            /* A case made of wood for retaining substances or articles. */
            'X7B' => 'case, wooden',
            /* A platform or open-ended box, made of wood, on which goods are retained forease of mechanical handling during transport and storage. */
            'X8A' => 'Pallet, wooden',
            /* A receptacle, made of wood, on which goods are retained for ease of mechanicalhandling during transport and storage. */
            'X8B' => 'Crate, wooden',
            /* Loose or unpacked pieces of wood tied or wrapped together. */
            'X8C' => 'Bundle, wooden',
            /* Intermediate bulk container, rigid plastic */
            'XAA' => 'Intermediate bulk container, rigid plastic',
            /* Containment vessel made of fibre used for retaining substances orarticles. */
            'XAB' => 'Receptacle, fibre',
            /* Containment vessel made of paper for retaining substances orarticles. */
            'XAC' => 'Receptacle, paper',
            /* Containment vessel made of wood for retaining substances orarticles. */
            'XAD' => 'Receptacle, wooden',
            /* Aerosol */
            'XAE' => 'Aerosol',
            /* Standard sized pallet of dimensions 80 centimeters by 60 centimeters(cms). */
            'XAF' => 'Pallet, modular, collars 80cms * 60cms',
            /* Pallet load secured with transparent plastic film that has been wrapped aroundand then shrunk tightly. */
            'XAG' => 'Pallet, shrinkwrapped',
            /* Standard sized pallet of dimensions 100centimeters by 110 centimeters(cms). */
            'XAH' => 'Pallet, 100cms * 110cms',
            /* Clamshell */
            'XAI' => 'Clamshell',
            /* Container used in the transport of linear material such as yarn. */
            'XAJ' => 'Cone',
            /* A spherical containment vessel for retaining substances orarticles. */
            'XAL' => 'Ball',
            /* Ampoule, non-protected */
            'XAM' => 'Ampoule, non-protected ',
            /* Ampoule, protected */
            'XAP' => 'Ampoule, protected ',
            /* Atomizer */
            'XAT' => 'Atomizer',
            /* Capsule */
            'XAV' => 'Capsule',
            /* A band use to retain multiple articles together. */
            'XB4' => 'Belt',
            /* Barrel */
            'XBA' => 'Barrel',
            /* Bobbin */
            'XBB' => 'Bobbin',
            /* Bottlecrate / bottlerack */
            'XBC' => 'Bottlecrate / bottlerack',
            /* Board */
            'XBD' => 'Board',
            /* Bundle */
            'XBE' => 'Bundle',
            /* Balloon, non-protected */
            'XBF' => 'Balloon, non-protected ',
            /* A receptacle made of flexible material with an open or closedtop. */
            'XBG' => 'Bag',
            /* Bunch */
            'XBH' => 'Bunch',
            /* Bin */
            'XBI' => 'Bin',
            /* Bucket */
            'XBJ' => 'Bucket',
            /* Basket */
            'XBK' => 'Basket',
            /* Bale, compressed */
            'XBL' => 'Bale, compressed',
            /* Basin */
            'XBM' => 'Basin',
            /* Bale, non-compressed */
            'XBN' => 'Bale, non-compressed',
            /* A narrow-necked cylindrical shaped vessel without external protective packingmaterial. */
            'XBO' => 'Bottle, non-protected, cylindrical',
            /* Balloon, protected */
            'XBP' => 'Balloon, protected ',
            /* A narrow-necked cylindrical shaped vessel with external protective packingmaterial. */
            'XBQ' => 'Bottle,
    protected cylindrical',
            /* Bar */
            'XBR' => 'Bar',
            /* A narrow-necked bulb shaped vessel without external protective packingmaterial. */
            'XBS' => 'Bottle, non-protected, bulbous',
            /* Bolt */
            'XBT' => 'Bolt',
            /* Butt */
            'XBU' => 'Butt',
            /* A narrow-necked bulb shaped vessel with external protective packingmaterial. */
            'XBV' => 'Bottle, protected bulbous',
            /* Box, for liquids */
            'XBW' => 'Box, for liquids',
            /* Box */
            'XBX' => 'Box',
            /* Board, in bundle/bunch/truss */
            'XBY' => 'Board, in bundle/bunch/truss',
            /* Bars, in bundle/bunch/truss */
            'XBZ' => 'Bars, in bundle/bunch/truss',
            /* Can, rectangular */
            'XCA' => 'Can, rectangular',
            /* Crate, beer */
            'XCB' => 'Crate, beer',
            /* Churn */
            'XCC' => 'Churn',
            /* Can, with handle and spout */
            'XCD' => 'Can, with handle and spout',
            /* Creel */
            'XCE' => 'Creel',
            /* Coffer */
            'XCF' => 'Coffer',
            /* Cage */
            'XCG' => 'Cage',
            /* Chest */
            'XCH' => 'Chest',
            /* Canister */
            'XCI' => 'Canister',
            /* Coffin */
            'XCJ' => 'Coffin',
            /* Cask */
            'XCK' => 'Cask',
            /* Coil */
            'XCL' => 'Coil',
            /* A flat package usually made of fibreboard from/to which product is often hungor attached. */
            'XCM' => 'Card',
            /* Container, not otherwise specified as transport equipment */
            'XCN' => 'Container, not otherwise specified as transport equipment',
            /* Carboy, non-protected */
            'XCO' => 'Carboy, non-protected',
            /* Carboy, protected */
            'XCP' => 'Carboy, protected',
            /* Package containing a charge such as propelling explosive for firearms or inktoner for a printer. */
            'XCQ' => 'Cartridge',
            /* Crate */
            'XCR' => 'Crate',
            /* Case */
            'XCS' => 'case',
            /* Carton */
            'XCT' => 'Carton',
            /* Cup */
            'XCU' => 'Cup',
            /* Cover */
            'XCV' => 'Cover',
            /* Cage, roll */
            'XCW' => 'Cage, roll',
            /* Can, cylindrical */
            'XCX' => 'Can, cylindrical',
            /* Cylinder */
            'XCY' => 'Cylinder',
            /* Canvas */
            'XCZ' => 'Canvas',
            /* Crate, multiple layer, plastic */
            'XDA' => 'Crate, multiple layer, plastic',
            /* Crate, multiple layer, wooden */
            'XDB' => 'Crate, multiple layer, wooden',
            /* Crate, multiple layer, cardboard */
            'XDC' => 'Crate, multiple layer, cardboard',
            /* Cage, Commonwealth Handling Equipment Pool (CHEP) */
            'XDG' => 'Cage, Commonwealth Handling Equipment Pool (CHEP)',
            /* A box mounted on a pallet base under the control of CHEP. */
            'XDH' => 'Box, Commonwealth Handling Equipment Pool (CHEP), Eurobox',
            /* Drum, iron */
            'XDI' => 'Drum, iron',
            /* Demijohn, non-protected */
            'XDJ' => 'Demijohn, non-protected',
            /* Crate, bulk, cardboard */
            'XDK' => 'Crate, bulk, cardboard',
            /* Crate, bulk, plastic */
            'XDL' => 'Crate, bulk, plastic',
            /* Crate, bulk, wooden */
            'XDM' => 'Crate, bulk, wooden',
            /* Dispenser */
            'XDN' => 'Dispenser',
            /* Demijohn, protected */
            'XDP' => 'Demijohn, protected',
            /* Drum */
            'XDR' => 'Drum',
            /* Tray, one layer no cover, plastic */
            'XDS' => 'Tray, one layer no cover, plastic',
            /* Tray, one layer no cover, wooden */
            'XDT' => 'Tray, one layer no cover, wooden',
            /* Tray, one layer no cover, polystyrene */
            'XDU' => 'Tray, one layer no cover, polystyrene',
            /* Tray, one layer no cover, cardboard */
            'XDV' => 'Tray, one layer no cover, cardboard',
            /* Tray, two layers no cover, plastic tray */
            'XDW' => 'Tray, two layers no cover, plastic tray',
            /* Tray, two layers no cover, wooden */
            'XDX' => 'Tray, two layers no cover, wooden',
            /* Tray, two layers no cover, cardboard */
            'XDY' => 'Tray, two layers no cover, cardboard',
            /* Bag, plastic */
            'XEC' => 'Bag, plastic',
            /* Case, with pallet base */
            'XED' => 'case, with pallet base',
            /* Case, with pallet base, wooden */
            'XEE' => 'case, with pallet base, wooden',
            /* Case, with pallet base, cardboard */
            'XEF' => 'case, with pallet base, cardboard',
            /* Case, with pallet base, plastic */
            'XEG' => 'case, with pallet base, plastic',
            /* Case, with pallet base, metal */
            'XEH' => 'case, with pallet base, metal',
            /* Case, isothermic */
            'XEI' => 'case, isothermic',
            /* Envelope */
            'XEN' => 'Envelope',
            /* A flexible containment bag made of plastic, typically for the transportationbulk non-hazardous cargoes using standard size shipping containers. */
            'XFB' => 'Flexibag',
            /* Crate, fruit */
            'XFC' => 'Crate, fruit',
            /* Crate, framed */
            'XFD' => 'Crate, framed',
            /* A flexible containment tank made of plastic, typically for the transportationbulk non-hazardous cargoes using standard size shipping containers. */
            'XFE' => 'Flexitank',
            /* Firkin */
            'XFI' => 'Firkin',
            /* Flask */
            'XFL' => 'Flask',
            /* Footlocker */
            'XFO' => 'Footlocker',
            /* Filmpack */
            'XFP' => 'Filmpack',
            /* Frame */
            'XFR' => 'Frame',
            /* Foodtainer */
            'XFT' => 'Foodtainer',
            /* Wheeled flat bedded device on which trays or other regular shaped items arepacked for transportation purposes. */
            'XFW' => 'Cart, flatbed',
            /* Bag, flexible container */
            'XFX' => 'Bag, flexible container',
            /* A narrow-necked metal cylinder for retention of liquefied or compressedgas. */
            'XGB' => 'Bottle, gas',
            /* Girder */
            'XGI' => 'Girder',
            /* A container with a capacity of one gallon. */
            'XGL' => 'Container, gallon',
            /* Containment vessel made of glass for retaining substances orarticles. */
            'XGR' => 'Receptacle, glass',
            /* Tray containing flat items stacked on top of one another. */
            'XGU' => 'Tray, containing horizontally stacked flat items',
            /* A sack made of gunny or burlap, used for transporting coarse commodities, suchas grains, potatoes, and other agricultural products. */
            'XGY' => 'Bag, gunny',
            /* Girders, in bundle/bunch/truss */
            'XGZ' => 'Girders, in bundle/bunch/truss',
            /* Basket, with handle, plastic */
            'XHA' => 'Basket, with handle, plastic',
            /* Basket, with handle, wooden */
            'XHB' => 'Basket, with handle, wooden',
            /* Basket, with handle, cardboard */
            'XHC' => 'Basket, with handle, cardboard',
            /* Hogshead */
            'XHG' => 'Hogshead',
            /* A purpose shaped device with a hook at the top for hanging items from arail. */
            'XHN' => 'Hanger',
            /* Hamper */
            'XHR' => 'Hamper',
            /* Package, display, wooden */
            'XIA' => 'Package, display, wooden',
            /* Package, display, cardboard */
            'XIB' => 'Package, display, cardboard',
            /* Package, display, plastic */
            'XIC' => 'Package, display, plastic',
            /* Package, display, metal */
            'XID' => 'Package, display, metal',
            /* Package, show */
            'XIE' => 'Package, show',
            /* A flexible tubular package or skin, possibly transparent, often used forcontainment of foodstuffs (e.g. salami sausage). */
            'XIF' => 'Package, flow',
            /* Package, paper wrapped */
            'XIG' => 'Package, paper wrapped',
            /* Drum, plastic */
            'XIH' => 'Drum, plastic',
            /* Packaging material made out of cardboard that facilitates the separation ofindividual glass or plastic bottles. */
            'XIK' => 'Package, cardboard, with bottle grip-holes',
            /* Lidded stackable rigid tray compliant with CEN TS 14482:2002. */
            'XIL' => 'Tray, rigid, lidded stackable (CEN TS 14482:2002)',
            /* Ingot */
            'XIN' => 'Ingot',
            /* Ingots, in bundle/bunch/truss */
            'XIZ' => 'Ingots, in bundle/bunch/truss',
            /* A flexible containment bag, widely used for storage, transportation andhandling of powder, flake or granular materials. Typically constructed from wovenpolypropylene (PP) fabric in the form of cubic bags. */
            'XJB' => 'Bag, jumbo',
            /* Jerrican, rectangular */
            'XJC' => 'Jerrican, rectangular',
            /* Jug */
            'XJG' => 'Jug',
            /* Jar */
            'XJR' => 'Jar',
            /* Jutebag */
            'XJT' => 'Jutebag',
            /* Jerrican, cylindrical */
            'XJY' => 'Jerrican, cylindrical',
            /* Keg */
            'XKG' => 'Keg',
            /* A set of articles or implements used for a specific purpose. */
            'XKI' => 'Kit',
            /* A collection of bags, cases and/or containers which hold personal belongingsfor a journey. */
            'XLE' => 'Luggage',
            /* Log */
            'XLG' => 'Log',
            /* Lot */
            'XLT' => 'Lot',
            /* A wooden box for the transportation and storage of fruit orvegetables. */
            'XLU' => 'Lug',
            /* A wooden or metal container used for packing household goods and personaleffects. */
            'XLV' => 'Liftvan',
            /* Logs, in bundle/bunch/truss */
            'XLZ' => 'Logs, in bundle/bunch/truss',
            /* Containment box made of metal for retaining substances orarticles. */
            'XMA' => 'Crate, metal',
            /* Bag, multiply */
            'XMB' => 'Bag, multiply',
            /* Crate, milk */
            'XMC' => 'Crate, milk',
            /* A type of containment box made of metal for retaining substances or articles,not otherwise specified as transport equipment. */
            'XME' => 'Container, metal',
            /* Containment vessel made of metal for retaining substances orarticles. */
            'XMR' => 'Receptacle, metal',
            /* Sack, multi-wall */
            'XMS' => 'Sack, multi-wall',
            /* Mat */
            'XMT' => 'Mat',
            /* Containment vessel wrapped with plastic for retaining substances orarticles. */
            'XMW' => 'Receptacle, plastic wrapped',
            /* Matchbox */
            'XMX' => 'Matchbox',
            /* Not available */
            'XNA' => 'Not available',
            /* Unpacked or unpackaged */
            'XNE' => 'Unpacked or unpackaged',
            /* Unpacked or unpackaged, single unit */
            'XNF' => 'Unpacked or unpackaged, single unit',
            /* Unpacked or unpackaged, multiple units */
            'XNG' => 'Unpacked or unpackaged, multiple units',
            /* Nest */
            'XNS' => 'Nest',
            /* Net */
            'XNT' => 'Net',
            /* Net, tube, plastic */
            'XNU' => 'Net, tube, plastic',
            /* Net, tube, textile */
            'XNV' => 'Net, tube, textile',
            /* Commonwealth Handling Equipment Pool (CHEP) standard pallet of dimensions 40centimeters x 60 centimeters. */
            'XOA' => 'Pallet, CHEP 40 cm x 60 cm',
            /* Commonwealth Handling Equipment Pool (CHEP) standard pallet of dimensions 80centimeters x 120 centimeters. */
            'XOB' => 'Pallet, CHEP 80 cm x 120 cm',
            /* Commonwealth Handling Equipment Pool (CHEP) standard pallet of dimensions 100centimeters x 120 centimeters. */
            'XOC' => 'Pallet, CHEP 100 cm x 120 cm',
            /* Australian standard pallet of dimensions 115.5 centimeters x 116.5centimeters. */
            'XOD' => 'Pallet, as 4068-1993',
            /* ISO standard pallet of dimensions 110 centimeters x 110 centimeters, prevalentin Asia - Pacific region. */
            'XOE' => 'Pallet, ISO T11',
            /* A pallet equivalent shipping platform of unknown dimensions or unknownweight. */
            'XOF' => 'Platform, unspecified weight or dimension',
            /* A solid piece of a hard substance, such as granite, having one or more flatsides. */
            'XOK' => 'Block',
            /* A standard cardboard container of large dimensions for storing for examplevegetables, granules of plastics or other dry products. */
            'XOT' => 'Octabin',
            /* A type of containment box that serves as the outer shipping container, nototherwise specified as transport equipment. */
            'XOU' => 'Container, outer',
            /* A shallow, wide, open container, usually of metal. */
            'XP2' => 'Pan',
            /* Small package. */
            'XPA' => 'Packet',
            /* Pallet, box Combined open-ended box and pallet */
            'XPB' => 'Pallet, box Combined open-ended box and pallet',
            /* Parcel */
            'XPC' => 'Parcel',
            /* Standard sized pallet of dimensions 80 centimeters by 100 centimeters(cms). */
            'XPD' => 'Pallet, modular, collars 80cms * 100cms',
            /* Standard sized pallet of dimensions 80 centimeters by 120 centimeters(cms). */
            'XPE' => 'Pallet, modular, collars 80cms * 120cms',
            /* A small open top enclosure for retaining animals. */
            'XPF' => 'Pen',
            /* Plate */
            'XPG' => 'Plate',
            /* Pitcher */
            'XPH' => 'Pitcher',
            /* Pipe */
            'XPI' => 'Pipe',
            /* Punnet */
            'XPJ' => 'Punnet',
            /* Standard packaging unit. */
            'XPK' => 'Package',
            /* Pail */
            'XPL' => 'Pail',
            /* Plank */
            'XPN' => 'Plank',
            /* Pouch */
            'XPO' => 'Pouch',
            /* A loose or unpacked article. */
            'XPP' => 'Piece',
            /* Containment vessel made of plastic for retaining substances orarticles. */
            'XPR' => 'Receptacle, plastic',
            /* Pot */
            'XPT' => 'Pot',
            /* Tray */
            'XPU' => 'Tray',
            /* Pipes, in bundle/bunch/truss */
            'XPV' => 'Pipes, in bundle/bunch/truss',
            /* Platform or open-ended box, usually made of wood, on which goods are retainedfor ease of mechanical handling during transport and storage. */
            'XPX' => 'Pallet',
            /* Plates, in bundle/bunch/truss */
            'XPY' => 'Plates, in bundle/bunch/truss',
            /* Planks, in bundle/bunch/truss */
            'XPZ' => 'Planks, in bundle/bunch/truss',
            /* Drum, steel, non-removable head */
            'XQA' => 'Drum, steel, non-removable head',
            /* Drum, steel, removable head */
            'XQB' => 'Drum, steel, removable head',
            /* Drum, aluminium, non-removable head */
            'XQC' => 'Drum, aluminium, non-removable head',
            /* Drum, aluminium, removable head */
            'XQD' => 'Drum, aluminium, removable head',
            /* Drum, plastic, non-removable head */
            'XQF' => 'Drum, plastic, non-removable head',
            /* Drum, plastic, removable head */
            'XQG' => 'Drum, plastic, removable head',
            /* Barrel, wooden, bung type */
            'XQH' => 'Barrel, wooden, bung type',
            /* Barrel, wooden, removable head */
            'XQJ' => 'Barrel, wooden, removable head',
            /* Jerrican, steel, non-removable head */
            'XQK' => 'Jerrican, steel, non-removable head',
            /* Jerrican, steel, removable head */
            'XQL' => 'Jerrican, steel, removable head',
            /* Jerrican, plastic, non-removable head */
            'XQM' => 'Jerrican, plastic, non-removable head',
            /* Jerrican, plastic, removable head */
            'XQN' => 'Jerrican, plastic, removable head',
            /* Box, wooden, natural wood, ordinary */
            'XQP' => 'Box, wooden, natural wood, ordinary',
            /* Box, wooden, natural wood, with sift proof walls */
            'XQQ' => 'Box, wooden, natural wood, with sift proof walls',
            /* Box, plastic, expanded */
            'XQR' => 'Box, plastic, expanded',
            /* Box, plastic, solid */
            'XQS' => 'Box, plastic, solid',
            /* Rod */
            'XRD' => 'Rod',
            /* Ring */
            'XRG' => 'Ring',
            /* Rack, clothing hanger */
            'XRJ' => 'Rack, clothing hanger',
            /* Rack */
            'XRK' => 'Rack',
            /* Cylindrical rotatory device with a rim at each end on which materials arewound. */
            'XRL' => 'Reel',
            /* Roll */
            'XRO' => 'Roll',
            /* Containment material made of red mesh netting for retaining articles (e.g.trees). */
            'XRT' => 'Rednet',
            /* Rods, in bundle/bunch/truss */
            'XRZ' => 'Rods, in bundle/bunch/truss',
            /* Sack */
            'XSA' => 'Sack',
            /* Slab */
            'XSB' => 'Slab',
            /* Crate, shallow */
            'XSC' => 'Crate, shallow',
            /* Spindle */
            'XSD' => 'Spindle',
            /* Sea-chest */
            'XSE' => 'Sea-chest',
            /* Sachet */
            'XSH' => 'Sachet',
            /* A low movable platform or pallet to facilitate the handling and transport ofgoods. */
            'XSI' => 'Skid',
            /* Case, skeleton */
            'XSK' => 'case, skeleton',
            /* Hard plastic sheeting primarily used as the base on which to stack goods tooptimise the space within a container. May be used as an alternative to a palletizedpackaging. */
            'XSL' => 'Slipsheet',
            /* Sheetmetal */
            'XSM' => 'Sheetmetal',
            /* A packaging container used in the transport of such items as wire, cable, tapeand yarn. */
            'XSO' => 'Spool',
            /* Sheet, plastic wrapping */
            'XSP' => 'Sheet, plastic wrapping',
            /* Case, steel */
            'XSS' => 'case, steel',
            /* Sheet */
            'XST' => 'Sheet',
            /* Suitcase */
            'XSU' => 'Suitcase',
            /* Envelope, steel */
            'XSV' => 'Envelope, steel',
            /* Goods retained in a transparent plastic film that has been wrapped around andthen shrunk tightly on to the goods. */
            'XSW' => 'Shrinkwrapped',
            /* Sleeve */
            'XSY' => 'Sleeve',
            /* Sheets, in bundle/bunch/truss */
            'XSZ' => 'Sheets, in bundle/bunch/truss',
            /* A loose or unpacked article in the form of a bar, block or piece. */
            'XT1' => 'Tablet',
            /* Tub */
            'XTB' => 'Tub',
            /* Tea-chest */
            'XTC' => 'Tea-chest',
            /* Tube, collapsible */
            'XTD' => 'Tube, collapsible',
            /* A ring made of rubber and/or metal surrounding a wheel. */
            'XTE' => 'Tyre',
            /* A specially constructed container for transporting liquids and gases inbulk. */
            'XTG' => 'Tank container, generic',
            /* Tierce */
            'XTI' => 'Tierce',
            /* Tank, rectangular */
            'XTK' => 'Tank, rectangular',
            /* Tub, with lid */
            'XTL' => 'Tub, with lid',
            /* Tin */
            'XTN' => 'Tin',
            /* Tun */
            'XTO' => 'Tun',
            /* Trunk */
            'XTR' => 'Trunk',
            /* Truss */
            'XTS' => 'Truss',
            /* A capacious bag or basket. */
            'XTT' => 'Bag, tote',
            /* Tube */
            'XTU' => 'Tube',
            /* A tube made of plastic, metal or cardboard fitted with a nozzle, containing aliquid or semi-liquid product, e.g. silicon. */
            'XTV' => 'Tube, with nozzle',
            /* A lightweight pallet made from heavy duty corrugated board. */
            'XTW' => 'Pallet, triwall',
            /* Tank, cylindrical */
            'XTY' => 'Tank, cylindrical',
            /* Tubes, in bundle/bunch/truss */
            'XTZ' => 'Tubes, in bundle/bunch/truss',
            /* Uncaged */
            'XUC' => 'Uncaged',
            /* A type of package composed of a single item or object, not otherwise specifiedas a unit of transport equipment. */
            'XUN' => 'Unit',
            /* Vat */
            'XVA' => 'Vat',
            /* Bulk, gas (at 1031 mbar and 15°C) */
            'XVG' => 'Bulk, gas (at 1031 mbar and 15°C)',
            /* Vial */
            'XVI' => 'Vial',
            /* A type of wooden crate. */
            'XVK' => 'Vanpack',
            /* Bulk, liquid */
            'XVL' => 'Bulk, liquid',
            /* Bulk, solid, large particles (“nodules”) */
            'XVO' => 'Bulk, solid, large particles (“nodules”)',
            /* Vacuum-packed */
            'XVP' => 'Vacuum-packed',
            /* Bulk, liquefied gas (at abnormal temperature/pressure) */
            'XVQ' => 'Bulk, liquefied gas (at abnormal temperature/pressure)',
            /* A self-propelled means of conveyance. */
            'XVN' => 'Vehicle',
            /* Bulk, solid, granular particles (“grains”) */
            'XVR' => 'Bulk, solid, granular particles (“grains”)',
            /* Loose or unpacked scrap metal transported in bulk form. */
            'XVS' => 'Bulk, scrap metal',
            /* Bulk, solid, fine particles (“powders”) */
            'XVY' => 'Bulk, solid, fine particles (“powders”)',
            /* A reusable container made of metal, plastic, textile, wood or compositematerials used to facilitate transportation of bulk solids and liquids in manageablevolumes. */
            'XWA' => 'Intermediate bulk container',
            /* Wickerbottle */
            'XWB' => 'Wickerbottle',
            /* Intermediate bulk container, steel */
            'XWC' => 'Intermediate bulk container, steel',
            /* Intermediate bulk container, aluminium */
            'XWD' => 'Intermediate bulk container, aluminium',
            /* Intermediate bulk container, metal */
            'XWF' => 'Intermediate bulk container, metal',
            /* Intermediate bulk container, steel, pressurised > 10 kpa */
            'XWG' => 'Intermediate bulk container, steel, pressurised > 10 kpa',
            /* Intermediate bulk container, aluminium, pressurised > 10 kpa */
            'XWH' => 'Intermediate bulk container, aluminium, pressurised > 10 kpa',
            /* Intermediate bulk container, metal, pressure 10 kpa */
            'XWJ' => 'Intermediate bulk container, metal, pressure 10 kpa',
            /* Intermediate bulk container, steel, liquid */
            'XWK' => 'Intermediate bulk container, steel, liquid',
            /* Intermediate bulk container, aluminium, liquid */
            'XWL' => 'Intermediate bulk container, aluminium, liquid',
            /* Intermediate bulk container, metal, liquid */
            'XWM' => 'Intermediate bulk container, metal, liquid',
            /* Intermediate bulk container, woven plastic, without coat/liner */
            'XWN' => 'Intermediate bulk container, woven plastic, without coat/liner',
            /* Intermediate bulk container, woven plastic, coated */
            'XWP' => 'Intermediate bulk container, woven plastic, coated',
            /* Intermediate bulk container, woven plastic, with liner */
            'XWQ' => 'Intermediate bulk container, woven plastic, with liner',
            /* Intermediate bulk container, woven plastic, coated and liner */
            'XWR' => 'Intermediate bulk container, woven plastic, coated and liner',
            /* Intermediate bulk container, plastic film */
            'XWS' => 'Intermediate bulk container, plastic film',
            /* Intermediate bulk container, textile with out coat/liner */
            'XWT' => 'Intermediate bulk container, textile with out coat/liner',
            /* Intermediate bulk container, natural wood, with inner liner */
            'XWU' => 'Intermediate bulk container, natural wood, with inner liner',
            /* Intermediate bulk container, textile, coated */
            'XWV' => 'Intermediate bulk container, textile, coated',
            /* Intermediate bulk container, textile, with liner */
            'XWW' => 'Intermediate bulk container, textile, with liner',
            /* Intermediate bulk container, textile, coated and liner */
            'XWX' => 'Intermediate bulk container, textile, coated and liner',
            /* Intermediate bulk container, plywood, with inner liner */
            'XWY' => 'Intermediate bulk container, plywood, with inner liner',
            /* Intermediate bulk container, reconstituted wood, with inner liner */
            'XWZ' => 'Intermediate bulk container, reconstituted wood, with inner liner',
            /* Bag, woven plastic, without inner coat/liner */
            'XXA' => 'Bag, woven plastic, without inner coat/liner',
            /* Bag, woven plastic, sift proof */
            'XXB' => 'Bag, woven plastic, sift proof',
            /* Bag, woven plastic, water resistant */
            'XXC' => 'Bag, woven plastic, water resistant',
            /* Bag, plastics film */
            'XXD' => 'Bag, plastics film',
            /* Bag, textile, without inner coat/liner */
            'XXF' => 'Bag, textile, without inner coat/liner',
            /* Bag, textile, sift proof */
            'XXG' => 'Bag, textile, sift proof',
            /* Bag, textile, water resistant */
            'XXH' => 'Bag, textile, water resistant',
            /* Bag, paper, multi-wall */
            'XXJ' => 'Bag, paper, multi-wall',
            /* Bag, paper, multi-wall, water resistant */
            'XXK' => 'Bag, paper, multi-wall, water resistant',
            /* Composite packaging, plastic receptacle in steel drum */
            'XYA' => 'Composite packaging, plastic receptacle in steel drum',
            /* Composite packaging, plastic receptacle in steel crate box */
            'XYB' => 'Composite packaging, plastic receptacle in steel crate box',
            /* Composite packaging, plastic receptacle in aluminium drum */
            'XYC' => 'Composite packaging, plastic receptacle in aluminium drum',
            /* Composite packaging, plastic receptacle in aluminium crate */
            'XYD' => 'Composite packaging, plastic receptacle in aluminium crate',
            /* Composite packaging, plastic receptacle in wooden box */
            'XYF' => 'Composite packaging, plastic receptacle in wooden box',
            /* Composite packaging, plastic receptacle in plywood drum */
            'XYG' => 'Composite packaging, plastic receptacle in plywood drum',
            /* Composite packaging, plastic receptacle in plywood box */
            'XYH' => 'Composite packaging, plastic receptacle in plywood box',
            /* Composite packaging, plastic receptacle in fibre drum */
            'XYJ' => 'Composite packaging, plastic receptacle in fibre drum',
            /* Composite packaging, plastic receptacle in fibreboard box */
            'XYK' => 'Composite packaging, plastic receptacle in fibreboard box',
            /* Composite packaging, plastic receptacle in plastic drum */
            'XYL' => 'Composite packaging, plastic receptacle in plastic drum',
            /* Composite packaging, plastic receptacle in solid plastic box */
            'XYM' => 'Composite packaging, plastic receptacle in solid plastic box',
            /* Composite packaging, glass receptacle in steel drum */
            'XYN' => 'Composite packaging, glass receptacle in steel drum',
            /* Composite packaging, glass receptacle in steel crate box */
            'XYP' => 'Composite packaging, glass receptacle in steel crate box',
            /* Composite packaging, glass receptacle in aluminium drum */
            'XYQ' => 'Composite packaging, glass receptacle in aluminium drum',
            /* Composite packaging, glass receptacle in aluminium crate */
            'XYR' => 'Composite packaging, glass receptacle in aluminium crate',
            /* Composite packaging, glass receptacle in wooden box */
            'XYS' => 'Composite packaging, glass receptacle in wooden box',
            /* Composite packaging, glass receptacle in plywood drum */
            'XYT' => 'Composite packaging, glass receptacle in plywood drum',
            /* Composite packaging, glass receptacle in wickerwork hamper */
            'XYV' => 'Composite packaging, glass receptacle in wickerwork hamper',
            /* Composite packaging, glass receptacle in fibre drum */
            'XYW' => 'Composite packaging, glass receptacle in fibre drum',
            /* Composite packaging, glass receptacle in fibreboard box */
            'XYX' => 'Composite packaging, glass receptacle in fibreboard box',
            /* Composite packaging, glass receptacle in expandable plastic pack */
            'XYY' => 'Composite packaging, glass receptacle in expandable plastic pack',
            /* Composite packaging, glass receptacle in solid plastic pack */
            'XYZ' => 'Composite packaging, glass receptacle in solid plastic pack',
            /* Intermediate bulk container, paper, multi-wall */
            'XZA' => 'Intermediate bulk container, paper, multi-wall',
            /* Bag, large */
            'XZB' => 'Bag, large',
            /* Intermediate bulk container, paper, multi-wall, water resistant */
            'XZC' => 'Intermediate bulk container, paper, multi-wall, water resistant',
            /* Intermediate bulk container, rigid plastic, with structural equipment, solids */
            'XZD' => 'Intermediate bulk container, rigid plastic, with structural equipment, solids',
            /* Intermediate bulk container, rigid plastic, freestanding, solids */
            'XZF' => 'Intermediate bulk container, rigid plastic, freestanding, solids',
            /* Intermediate bulk container, rigid plastic, with structural equipment,pressurised */
            'XZG' => 'Intermediate bulk container, rigid plastic, with structural equipment,pressurised',
            /* Intermediate bulk container, rigid plastic, freestanding, pressurised */
            'XZH' => 'Intermediate bulk container, rigid plastic, freestanding, pressurised',
            /* Intermediate bulk container, rigid plastic, with structural equipment, liquids */
            'XZJ' => 'Intermediate bulk container, rigid plastic, with structural equipment, liquids',
            /* Intermediate bulk container, rigid plastic, freestanding, liquids */
            'XZK' => 'Intermediate bulk container, rigid plastic, freestanding, liquids',
            /* Intermediate bulk container, composite, rigid plastic, solids */
            'XZL' => 'Intermediate bulk container, composite, rigid plastic, solids',
            /* Intermediate bulk container, composite, flexible plastic, solids */
            'XZM' => 'Intermediate bulk container, composite, flexible plastic, solids',
            /* Intermediate bulk container, composite, rigid plastic, pressurised */
            'XZN' => 'Intermediate bulk container, composite, rigid plastic, pressurised',
            /* Intermediate bulk container, composite, flexible plastic, pressurised */
            'XZP' => 'Intermediate bulk container, composite, flexible plastic, pressurised',
            /* Intermediate bulk container, composite, rigid plastic, liquids */
            'XZQ' => 'Intermediate bulk container, composite, rigid plastic, liquids',
            /* Intermediate bulk container, composite, flexible plastic, liquids */
            'XZR' => 'Intermediate bulk container, composite, flexible plastic, liquids',
            /* Intermediate bulk container, composite */
            'XZS' => 'Intermediate bulk container, composite',
            /* Intermediate bulk container, fibreboard */
            'XZT' => 'Intermediate bulk container, fibreboard',
            /* Intermediate bulk container, flexible */
            'XZU' => 'Intermediate bulk container, flexible',
            /* Intermediate bulk container, metal, other than steel */
            'XZV' => 'Intermediate bulk container, metal, other than steel',
            /* Intermediate bulk container, natural wood */
            'XZW' => 'Intermediate bulk container, natural wood',
            /* Intermediate bulk container, plywood */
            'XZX' => 'Intermediate bulk container, plywood',
            /* Intermediate bulk container, reconstituted wood */
            'XZY' => 'Intermediate bulk container, reconstituted wood'];
    }
}
