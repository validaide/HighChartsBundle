<?php


namespace Validaide\HighChartsBundle\Graph\DataLabels;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Filter
{
    /** @var string|null */
    private ?string $property;
    /** @var string|null */
    private ?string $operator;
    /** @var mixed|null */
    private $value;

    /**
     * @return string|null
     */
    public function getProperty(): ?string
    {
        return $this->property;
    }

    /**
     * @return string|null
     */
    public function getOperator(): ?string
    {
        return $this->operator;
    }

    /**
     * @return mixed|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string|null $property
     */
    public function setProperty(?string $property): void
    {
        $this->property = $property;
    }

    /**
     * @param string|null $operator
     */
    public function setOperator(?string $operator): void
    {
        $this->operator = $operator;
    }

    /**
     * @param mixed|null $value
     */
    public function setValue($value = null): void
    {
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->property)) {
            $result['property'] = (string)$this->property;
        }
        if (!is_null($this->operator)) {
            $result['operator'] = $this->operator;
        }
        if (!is_null($this->value)) {
            $result['value'] = $this->value;
        }

        return $result;
    }
}