<?php
/**
 * Created by PhpStorm.
 * User: AC75097290 (Redouane YAHIAOUI)
 * Date: 22/04/2020
 * Time: 20:00
 */

 /**
 * Test PlainTicket
 */
class PlainTicketTest extends TicketTest
{
    protected static function getData(){
        return [
            "id_ticket"     => 1,
            "departure"     => "alicante",
            "arrival"       =>  "canari",
            "seat"          =>  "24A",
            "type"          =>  "PLAIN",
            "counter"       =>  null,
            "number"        =>  "1954A",
            "departureDate" =>  "01/02/2020 17:00",
            "arrivalDate"   =>  "01/02/2020 20:00",
            "gate"          =>  "47B"
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
            'DATA_PLAIN' => [
                '$data'         => PlainTicketTest::getData(),
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
            'DATA_PLAIN' => [
                '$data'         => PlainTicketTest::getData(),
                '$expectedMsg'  =>'From alicante Airport, take flight 1954A to canari. Gate 47B, Sit in seat 24A.Baggage will we automatically transferred from your last leg.'
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
                    "type"          => "PLAIN",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "01/02/2020 11:00:00",
                    "arrivalDate"   => "01/02/2020 14:00",
                    "gate"          => "10"
                ],
                '$expectedMsg'  =>'le numéro du ticket doit étre renseigné'
            ],
            'NO_SEAT' => [
                '$data'         => [
                    "id_ticket"     => 1,
                    "departure"     => "barcelone",
                    "arrival"       => "madrid",
                    "seat"          => "",
                    "type"          => "PLAIN",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "01/02/2020 11:00:00",
                    "arrivalDate"   => "01/02/2020 14:00",
                    "gate"          => ""
                ],
                '$expectedMsg'  =>'le numéro du siege doit étre renseigné'
            ],
            'NO_GATE' => [
                '$data'         => [
                    "id_ticket"     => 1,
                    "departure"     => "barcelone",
                    "arrival"       => "madrid",
                    "seat"          => "32A",
                    "type"          => "PLAIN",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "01/02/2020 11:00:00",
                    "arrivalDate"   => "01/02/2020 14:00",
                    "gate"          => ""
                ],
                '$expectedMsg'  =>'la porte d\'embarquement doit étre renseigné'
            ],
            'NO_DEPARTURE' => [
                '$data'         => [
                    "id_ticket"     => 1,
                    "departure"     => "",
                    "arrival"       => "madrid",
                    "seat"          => "32A",
                    "type"          => "PLAIN",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "01/02/2020 11:00:00",
                    "arrivalDate"   => "01/02/2020 14:00",
                    "gate"          => "B20"
                ],
                '$expectedMsg'  =>'le lieu de depart doit étre renseigné'
            ],
            'NO_ARRIVAL' => [
                '$data'         => [
                    "id_ticket"     => 1,
                    "departure"     => "madrid",
                    "arrival"       => "",
                    "seat"          => "32A",
                    "type"          => "PLAIN",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "01/02/2020 11:00:00",
                    "arrivalDate"   => "01/02/2020 14:00",
                    "gate"          => "B20"
                ],
                '$expectedMsg'  =>'le lieu d\'arrivé doit étre renseigné'
            ],
            'NO_DATE_DEPARTURE' => [
                '$data'         => [
                    "id_ticket"     => 1,
                    "departure"     => "barcelone",
                    "arrival"       => "madrid",
                    "seat"          => "32A",
                    "type"          => "PLAIN",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "",
                    "arrivalDate"   => "01/02/2020 14:00",
                    "gate"          => "B20"
                ],
                '$expectedMsg'  =>'la date de depart doit étre reneigné'
            ],
            'NO_DATE_arrival' => [
                '$data'         => [
                    "id_ticket"     => 1,
                    "departure"     => "barcelone",
                    "arrival"       => "madrid",
                    "seat"          => "32A",
                    "type"          => "PLAIN",
                    "counter"       => null,
                    "number"        => "1100",
                    "departureDate" => "01/02/2020 11:00:00",
                    "arrivalDate"   => "",
                    "gate"          => "B20"
                ],
                '$expectedMsg'  =>'la date d\'arrivé doit étre reneigné'
            ],
        ];
    }
}
