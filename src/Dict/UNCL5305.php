<?php

namespace Volter\OpenPeppol\Dict;

class UNCL5305
{

    /**
     * Vat Reverse Charge
     * Code specifying that the standard VAT rate is levied from the invoicee.
     */
    const AE = 'AE';

    /**
     * Exempt from Tax
     * Code specifying that taxes are not applicable.
     */
    const E = 'E';

    /**
     * Standard rate
     * Code specifying the standard rate.
     */
    const S = 'S';

    /**
     * Zero rated goods
     * Code specifying that the goods are at a zero rate.
     */
    const Z = 'Z';

    /**
     * Free export item, VAT not charged
     * Code specifying that the item is free export and taxes are not charged.
     */
    const G = 'G';

    /**
     * Services outside scope of tax
     * Code specifying that taxes are not applicable to the services.
     */
    const O = 'O';

    /**
     * VAT exempt for EEA intra-community supply of goods and services
     * A tax category code indicating the item is VAT exempt due to
     * an intra-community supply in the European Economic Area.
     */
    const K = 'K';

    /**
     * Canary Islands general indirect tax
     * Impuesto General Indirecto Canario (IGIC) is an indirect tax levied on goods and services supplied
     * in the Canary Islands (Spain) by traders and professionals, as well as on import of goods.
     */
    const L = 'L';

    /**
     * Tax for production, services and importation in Ceuta and Melilla
     * Impuesto sobre la Producción, los Servicios y la Importación (IPSI) is an indirect municipal tax,
     * levied on the production, processing and import of all kinds of movable tangible property, the supply
     * of services and the transfer of immovable property located in the cities of Ceuta and Melilla.
     */
    const M = 'M';


    public static function verify($code)
    {
        if (!in_array($code, [self::AE, self::E, self::S, self::Z, self::G, self::O, self::K, self::L, self::M,])) {
            throw new \InvalidArgumentException(
                "Value MUST be part of code list 'Duty or tax or fee category code (UNCL5305)"
            );
        }
    }
}