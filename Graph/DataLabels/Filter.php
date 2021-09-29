<?php


namespace Validaide\HighChartsBundle\Graph\DataLabels;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Filter
{
    /** @var string|null */
    private ?string $property = null;
    /** @var string|null */
    private ?string $operator = null;
    /** @var mixed|null */
    private $value;

    public function getProperty(): ?string
    {
        return $this->property;
    }

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

    public function setProperty(?string $property): void
    {
        $this->property = $property;
    }

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

    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->property)) {
            $result['property'] = $this->property;
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