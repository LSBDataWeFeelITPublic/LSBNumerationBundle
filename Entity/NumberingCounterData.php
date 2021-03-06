<?php

namespace LSB\NumerationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LSB\NumerationBundle\Model\TimeContext;
use Symfony\Component\Validator\Constraints as Assert;
use LSB\UtilityBundle\Traits\IdTrait;

/**
 * Class NumberingCounterData
 * @package LSB\NumerationBundle\Entity
 *
 * @ORM\Entity(repositoryClass="LSB\NumerationBundle\Repository\NumberingCounterDataRepository")
 * @ORM\Table(name="numbering_counter_data")
 */
class NumberingCounterData
{
    use IdTrait;

    const DEFAULT_START = 1;
    const DEFAULT_STEP = 1;


    /**
     * Pattern name from configuration
     *
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    protected ?string $configName = null;

    /**
     * Initial value of the counter
     *
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    protected ?int $start = self::DEFAULT_START;

    /**
     * Step of the counter
     *
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    protected ?int $step = self::DEFAULT_STEP;


    /**
     * Current value of the counter
     *
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     */
    protected ?int $current = self::DEFAULT_START;


    /**
     * FQCN of the subject object
     *
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    protected ?string $subjectFQCN = null;

    /**
     * Time context type e.g. "year" or  "month", if specified, current value will be determined in that context
     * @see TimeContext
     *
     * @var string|null
     * @ORM\Column(type="string", length=30, nullable=true)
     * @Assert\Length(max=30)
     */
    protected ?string $timeContext = null;

    /**
     * Time context value e.g. 2019, if time context specified
     *
     * @var integer|null
     * @ORM\Column(type="integer", nullable=true)
     */
    protected ?int $timeContextValue = null;

    /**
     * FQCN of the context object
     *
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    protected ?string $contextObjectFQCN = null;

    /**
     * Object context value
     *
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    protected ?string $contextObjectValue = null;


    /**
     * NumberingCounterData constructor.
     */
    public function __construct()
    {
    }


    public function __clone()
    {
        if ($this->getId()) {
            $this->setId(null);
        }
    }

    /**
     * @param int|null $id
     * @return NumberingCounterData
     */
    public function setId(?int $id): NumberingCounterData
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getConfigName(): ?string
    {
        return $this->configName;
    }

    /**
     * @param string|null $configName
     * @return NumberingCounterData
     */
    public function setConfigName(?string $configName): NumberingCounterData
    {
        $this->configName = $configName;
        return $this;
    }

    /**
     * @return int
     */
    public function getStart(): int
    {
        return $this->start;
    }

    /**
     * @param int $start
     * @return NumberingCounterData
     */
    public function setStart(int $start): NumberingCounterData
    {
        $this->start = $start;
        return $this;
    }

    /**
     * @return int
     */
    public function getStep(): int
    {
        return $this->step;
    }

    /**
     * @param int $step
     * @return NumberingCounterData
     */
    public function setStep(int $step): NumberingCounterData
    {
        $this->step = $step;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrent(): int
    {
        return $this->current;
    }

    /**
     * @param int $current
     * @return NumberingCounterData
     */
    public function setCurrent(int $current): NumberingCounterData
    {
        $this->current = $current;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubjectFQCN(): ?string
    {
        return $this->subjectFQCN;
    }

    /**
     * @param string|null $subjectFQCN
     * @return NumberingCounterData
     */
    public function setSubjectFQCN(?string $subjectFQCN): NumberingCounterData
    {
        $this->subjectFQCN = $subjectFQCN;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTimeContext(): ?string
    {
        return $this->timeContext;
    }

    /**
     * @param string|null $timeContext
     * @return NumberingCounterData
     */
    public function setTimeContext(?string $timeContext): NumberingCounterData
    {
        $this->timeContext = $timeContext;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTimeContextValue(): ?int
    {
        return $this->timeContextValue;
    }

    /**
     * @param int|null $timeContextValue
     * @return NumberingCounterData
     */
    public function setTimeContextValue(?int $timeContextValue): NumberingCounterData
    {
        $this->timeContextValue = $timeContextValue;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContextObjectFQCN(): ?string
    {
        return $this->contextObjectFQCN;
    }

    /**
     * @param string|null $contextObjectFQCN
     * @return NumberingCounterData
     */
    public function setContextObjectFQCN(?string $contextObjectFQCN): NumberingCounterData
    {
        $this->contextObjectFQCN = $contextObjectFQCN;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContextObjectValue(): ?string
    {
        return $this->contextObjectValue;
    }

    /**
     * @param string|null $contextObjectValue
     * @return NumberingCounterData
     */
    public function setContextObjectValue(?string $contextObjectValue): NumberingCounterData
    {
        $this->contextObjectValue = $contextObjectValue;
        return $this;
    }


}
