<?php
/**
 * Created by PhpStorm.
 * User: AC75097290 (Redouane YAHIAOUI)
 * Date: 22/04/2020
 * Time: 20:00
 */

 /**
 * Test Ticket
 */
abstract class TicketTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test Ticket::buildFromData()
     * @param array $data
     * @return void
     * @dataProvider TicketProvider
     */
    public function testBuildFromData($data)
    {
        $actualObject = Ticket::buildFromData($data);
        self::assertInstanceOf(ucfirst(strtolower($data['type'])).'Ticket', $actualObject);
        self::assertEquals($data['departure'], $actualObject->getDeparture());
        self::assertEquals($data['arrival'], $actualObject->getArrival());
        self::assertEquals($data['seat'], $actualObject->getSeat());
        self::assertEquals($data['counter'], $actualObject->getCounter());
        self::assertEquals($data['number'], $actualObject->getNumber());
        self::assertEquals(new DateTime($data['departureDate']), $actualObject->getDepartureDate());
        self::assertEquals(new DateTime($data['arrivalDate']), $actualObject->getArrivalDate());
        self::assertEquals($data['gate'], $actualObject->getGate());
    }

    /**
     * Test Ticket::getItenaryMsg()
     * @param           array $data
     * @param           string $expectedMsg
     * @return          void
     * @dataProvider    getItenaryMsgProvider
     */
    public function testGetItenaryMsg($data, $expectedMsg)
    {
        $actualObject = Ticket::buildFromData($data);
        $actualMsg = $actualObject->getItenaryMsg();
        self::assertEquals($expectedMsg, $actualMsg);
        self::assertInternalType('string', $actualMsg);
    }

    /**
     * Test Ticket::check()
     * @param           array $data
     * @param           string $expectedMsg
     * @return          void
     * @dataProvider    checkProvider
     */
    public function testCheck($data, $expectedMsg)
    {
        $this->expectExceptionMessage($expectedMsg);
        $actualObject = Ticket::buildFromData($data);
    }

}
