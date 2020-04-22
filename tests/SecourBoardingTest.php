<?php
/**
 * Created by PhpStorm.
 * User: AC75097290 (Redouane YAHIAOUI)
 * Date: 22/04/2020
 * Time: 20:00
 */

 /**
  * Test SecourBoarding
  */
class SecourBoardingTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test SecourBoarding::__construct()
     * @return void
     * @throws Exception_Http
     */
    public function testConstructor()
    {
        $secourBoarding = new SecourBoarding('boarding.json');
        self::assertEquals('boarding.json', $secourBoarding->getFile());
    }

    /**
     * Test SecourBoarding::getItinerary()
     * @return void
     * @throws Exception_Http
     */
    public function testGetItinerary()
    {
        $secourBoarding = new SecourBoarding('boarding.json');
        $actual = $secourBoarding->getItinerary();
        self::assertInternalType('array', $secourBoarding->getListBoarding());
        self::assertCount(5, $secourBoarding->getListBoarding());
        self::assertInternalType('string', $actual);
        self::assertNotEmpty($actual);

        $secourBoarding = new SecourBoarding('');
        $actual         = $secourBoarding->getItinerary();
        self::assertInternalType('array', $secourBoarding->getListBoarding());
        self::assertEmpty($secourBoarding->getListBoarding());
        self::assertInternalType('string', $actual);
        self::assertNotEmpty($actual);
        self::assertEquals('Please charge boarding.json with datas', $actual);

        $secourBoarding = new SecourBoarding('file_not_exist');
        $actual         = $secourBoarding->getItinerary();
        self::assertInternalType('array', $secourBoarding->getListBoarding());
        self::assertEmpty($secourBoarding->getListBoarding());
        self::assertInternalType('string', $actual);
        self::assertNotEmpty('string', $actual);
        self::assertEquals('the file does not exist', $actual);
    }
    
}
