<?php
declare(strict_types=1);

namespace LSB\NumerationBundle\Tests;

use LSB\NumerationBundle\Exception\NumberingGeneratorException;
use LSB\NumerationBundle\Service\NumberingPatternTagVerifier;
use PHPUnit\Framework\TestCase;


/**
 * Class TagVerifierTest
 * @package LSB\NumerationBundle\Tests
 */
class TagVerifierTest extends TestCase
{

    public function testTagVerifierException()
    {
        $testPattern = 'IN/{year}';
        $patternConfig = ['pattern' => $testPattern];
        $counterConfig = [];

        $this->expectException(NumberingGeneratorException::class);

        $verifier = new NumberingPatternTagVerifier();
        $verifier->verify($patternConfig, $counterConfig);
    }
}
