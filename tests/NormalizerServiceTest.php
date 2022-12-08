<?php

use PHPUnit\Framework\TestCase;
use BoktosoEnterprise\NormalizeSpamPhoneNumbers\NormalizerService;

class NormalizerServiceTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testWithAllWordsNoSpaces(): void
    {
        $expected = 5558886969;
        $string = 'FiveFivefiveeighteighteightSixNineSixNine';
        $actual = NormalizerService::normalize($string);
        $this->assertEquals(
          $expected,
          $actual,
          "Did not convert '$string' into $expected"
        );
    }

    public function testWithAllWordsAndSpaces(): void
    {
        $expected = 5558886969;
        $string = 'Five Five five eight eight eight Six Nine Six Nine';
        $actual = NormalizerService::normalize($string);
        $this->assertEquals(
          $expected,
          $actual,
          "Did not convert '$string' into $expected"
        );
    }

    public function testWithNumbersAndPoundSigns(): void
    {
        $expected = 5558886969;
        $string = '#5 #5 #5 #8 #8 #8 #6 #9 #6 #9';
        $actual = NormalizerService::normalize('#5 #5 #5 #8 #8 #8 #6 #9 #6 #9');
        $this->assertEquals(
          $expected,
          $actual,
          "Did not convert '$string' into $expected"
        );
    }

}