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

  /**
   *
   *
   * @dataProvider phoneNumberData
   *
   * @param $string
   * @param $expected
   *
   * @return void
   */
  public function testNoramlizePhoneNumbers($string, $expected): void
  {
    $actual = NormalizerService::normalizePhoneNumber($string);
    $this->assertEquals(
      $expected,
      $actual,
      "Did not convert '$string' into $expected"
    );
  }

  public function phoneNumberData(): array
  {
    return [
      [
        'FiveFivefiveeighteighteightSixNineSixNine',
        5558886969,
      ],
      [
        'Five Five five eight eight eight Six Nine Six Nine',
        5558886969,
      ],
      [
        '#5 #5 #5 #8 #8 #8 #6 #9 #6 #9',
        5558886969,
      ],
      [
        '8#0#5#3#0#0#4#3#8#9',
        8053004389,
      ],
      [
        '(90nine) 283-942zero',
        9092839420,
      ],
      [
        '(909)twoeightthree-9420',
        9092839420,
      ],
      [
        '(909)283-9 4 2zero',
        9092839420,
      ],
      [
        '(9 0 9) 2 8 3-9 4 2 zero',
        9092839420,
      ],
      [
        '(9 0 9) 2 8 3-9 4 twenty',
        9092839420,
      ],
      [
        '(9 zero 9) eleven 3-9 4 twenty',
        9091139420,
      ],
    ];
  }

}
