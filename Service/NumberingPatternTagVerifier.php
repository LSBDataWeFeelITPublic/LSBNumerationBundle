<?php
declare(strict_types=1);

namespace LSB\NumerationBundle\Service;

use LSB\NumerationBundle\Exception\NumberingGeneratorException;
use LSB\NumerationBundle\Model\Tag;

/**
 * Class NumberingPatternTagVerifier
 * @package LSB\NumerationBundle\Service
 */
class NumberingPatternTagVerifier
{

    /**
     * @param array $patternConfig
     * @param array $counterConfig
     * @throws NumberingGeneratorException
     */
    public function verify(array $patternConfig, array $counterConfig): void
    {
        // verify number tag
        preg_match_all(Tag::REG_EXPS[Tag::NUMBER], $patternConfig['pattern'], $matches);
        if (empty($matches[0])) {
            throw new NumberingGeneratorException(sprintf('No {%s} tag in pattern', Tag::NUMBER));
        }

        // TODO verify time and object context tag if necessary
    }


}
