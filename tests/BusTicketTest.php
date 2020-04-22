<?php
/**
 * Created by PhpStorm.
 * User: AC75097290 (Redouane YAHIAOUI)
 * Date: 22/04/2020
 * Time: 20:00
 */

/**
 * Test BusTicket
 */
class BusTicketTest extends TicketTest
{
    protected static function getData(){
        return [
            "id_ticket"     => 1,
            "departure"     => "barcelone",
            "arrival"       => "madrid",
            "seat"          => "",
            "type"          => "BUS",
            "counter"       => null,
            "number"        => "1100",
            "departureDate" => "01/02/2020 11:00:00",
            "arrivalDate"   => "01/02/2020 14:00",
            "gate"          => ""
        ];
    }

    /**
     * Data provider for testBuildFromData()
     *
     * @return array
     */
    public static function TicketProvider()
    {
        return [
            'DATA_BUS' => [
                '$data'         => BusTicketTest::getData(),
            ],
        ];
    } 

    /**
     * Data provider for testBuildFromData()
     *
     * @return array
     */
    public static function getItenaryMsgProvider()
    {
        return [
            'DATA_BUS' => [
                '$data'         => BusTicketTest::getData(),
                '$expectedMsg'  =>'Take the airport bus from barcelone to madrid Airport. No seat assignment.'
            ],
        ];
    }

    /**
     * Data provider for testCheck()
     *
     * @return array
     */
    public static function checkProvider()
    {
        return [
            'NO_NUMBER_ID' => [
                '$data'         => [
                    "id_ticket"     => null,
                    "departure"     => "barcelone",
                    "arrival"       => "madrid",
                    "seat"          => "10A",
                    "type"          => "BUS",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "01/02/2020 11:00:00",
                    "arrivalDate"   => "01/02/2020 14:00",
                    "gate"          => ""
                ],
                '$expectedMsg'  =>'le numéro du ticket doit étre renseigné'
            ],
            'NO_DEPARTURE' => [
                '$data'         => [
                    "id_ticket"     => 1,
                    "departure"     => "",
                    "arrival"       => "madrid",
                    "seat"          => "",
                    "type"          => "BUS",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "01/02/2020 11:00:00",
                    "arrivalDate"   => "01/02/2020 14:00",
                    "gate"          => ""
                ],
                '$expectedMsg'  =>'le lieu de depart doit étre renseigné'
            ],
            'NO_ARRIVAL' => [
                '$data'         => [
                    "id_ticket"     => 1,
                    "departure"     => "madrid",
                    "arrival"       => "",
                    "seat"          => "",
                    "type"          => "BUS",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "01/02/2020 11:00:00",
                    "arrivalDate"   => "01/02/2020 14:00",
                    "gate"          => ""
                ],
                '$expectedMsg'  =>'le lieu d\'arrivé doit étre renseigné'
            ],
            'NO_DATE_DEPARTURE' => [
                '$data'         => [
                    "id_ticket"     => 1,
                    "departure"     => "barcelone",
                    "arrival"       => "madrid",
                    "seat"          => "",
                    "type"          => "BUS",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "",
                    "arrivalDate"   => "01/02/2020 14:00",
                    "gate"          => ""
                ],
                '$expectedMsg'  =>'la date de depart doit étre reneigné'
            ],
            'NO_DATE_arrival' => [
                '$data'         => [
                    "id_ticket"     => 1,
                    "departure"     => "barcelone",
                    "arrival"       => "madrid",
                    "seat"          => "",
                    "type"          => "BUS",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "01/02/2020 11:00:00",
                    "arrivalDate"   => "",
                    "gate"          => ""
                ],
                '$expectedMsg'  =>'la date d\'arrivé doit étre reneigné'
            ],
        ];
    }
}
