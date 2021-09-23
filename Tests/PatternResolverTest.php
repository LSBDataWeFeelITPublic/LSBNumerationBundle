<?php
declare(strict_types=1);

namespace LSB\NumerationBundle\Tests;

use LSB\NumerationBundle\Entity\NumberingCounterData;
use LSB\NumerationBundle\Service\NumberingPatternResolver;
use LSB\NumerationBundle\Model\Tag;
use PHPUnit\Framework\TestCase;

/**
 * Class PatternResolverTest
 * @package LSB\NumerationBundle\Tests
 */
class PatternResolverTest extends TestCase
{

    public function testPatternResolverContextObject()
    {
        $testPattern = 'IN/{' . Tag::YEAR . '}/{' . Tag::NUMBER . '}/{' . Tag::CONTEXT_OBJECT . '}';
        $randNumber = rand(1, 10);
        $testContextValue = 'TestContextValue';

        $numberingCounterDataMock = $this->createMock(NumberingCounterData::class);

        $numberingCounterDataMock->method('getCurrent')->willReturn($randNumber);
        $numberingCounterDataMock->method('getContextObjectValue')->willReturn($testContextValue);

        $numberingCounterDataMock->expects($this->once())->method('getCurrent');
        $numberingCounterDataMock->expects($this->once())->method('getContextObjectValue');

        $patternResolver = new NumberingPatternResolver();
        $resolvedNumber = $patternResolver->resolve($testPattern, $numberingCounterDataMock);

        $this->assertStringContainsString((string)$randNumber, $resolvedNumber);
        $this->assertStringContainsString((string)$testContextValue, $resolvedNumber);
    }

}
