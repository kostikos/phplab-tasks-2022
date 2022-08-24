<?php
require_once './src/web/functions.php';

use PHPUnit\Framework\TestCase;

class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($inputArray, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($inputArray));
    }

    public function positiveDataProvider(): array
    {
        return [
            [
                [
                    [
                        "name" => "Albuquerque Sunport International Airport",
                        "code" => "ABQ",
                        "city" => "Albuquerque",
                        "state" => "New Mexico",
                        "address" => "2200 Sunport Blvd, Albuquerque, NM 87106, USA",
                        "timezone" => "America/Los_Angeles",
                    ],
                    [
                        "name" => "Atlanta Hartsfield International Airport",
                        "code" => "ATL",
                        "city" => "Atlanta",
                        "state" => "Georgia",
                        "address" => "6000 N Terminal Pkwy, Atlanta, GA 30320, USA",
                        "timezone" => "America/New_York",
                    ],
                ],
                ['A'],
            ],
            [
                [
                    [
                        "name" => "Mobile Regional Airport",
                        "code" => "MOB",
                        "city" => "Mobile",
                        "state" => "Alabama",
                        "address" => "371 Flave Pierce Rd, Mobile, AL 36608, USA",
                        "timezone" => "America/Chicago",
                    ],
                    [
                        "name" => "Worcester Regional Airport",
                        "code" => "ORH",
                        "city" => "Worcester",
                        "state" => "Massachusetts",
                        "address" => "375 Airport Dr, Worcester, MA 01602, USA",
                        "timezone" => "America/New_York",
                    ],
                ],
                ['M', 'W'],
            ],
            [
                [], [],
            ],

        ];
    }
}
