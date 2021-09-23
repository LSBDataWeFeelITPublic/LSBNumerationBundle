<?php
declare(strict_types=1);

namespace LSB\NumerationBundle\Tests;

use LSB\NumerationBundle\Exception\NumberingGeneratorException;
use LSB\NumerationBundle\Model\GeneratorOptions;
use LSB\NumerationBundle\Model\SimpleNumber;
use LSB\NumerationBundle\Model\TimeContext;
use LSB\NumerationBundle\Service\NumberingPatternTagVerifier;
use PHPUnit\Framework\TestCase;


/**
 * Class ModelsTest
 * @package LSB\NumerationBundle\Tests
 */
class ModelsTest extends TestCase
{

    public function testTimeContextException()
    {
        $this->expectException(\InvalidArgumentException::class);

        TimeContext::getValueForTag('invalidTag', new \DateTime());
    }

    public function testSimpleNumber()
    {
        $number = 'testNumber10';
        $value = 10;
        $simpleNumber = new SimpleNumber($number, $value);

        $this->assertSame($number, $simpleNumber->getNumber());
        $this->assertSame($number, (string)$simpleNumber);
        $this->assertSame($value, $simpleNumber->getValue());
    }

    public function testGeneratorOptions()
    {
        $configName = 'configName';
        $options = new GeneratorOptions($configName);

        $this->assertSame($configName, $options->getConfigName());
        $this->assertNull($options->getContextObjectValue());
        $this->assertNull($options->getDate());

        $this->assertInstanceOf(GeneratorOptions::class, $options->setContextObjectValue(null));
        $this->assertInstanceOf(GeneratorOptions::class, $options->setDate(null));
        $this->assertInstanceOf(GeneratorOptions::class, $options->setConfigName($configName));
    }
}
