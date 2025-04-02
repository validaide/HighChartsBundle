<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\Color;

class Zone
{
    private ?float $value = null;
    private ?Color  $color = null;

    public function __construct(?float $value = null, ?Color $color = null)
    {
        $this->value = $value;
        $this->color = $color;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(?float $value): void
    {
        $this->value = $value;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): void
    {
        $this->color = $color;
    }

    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->value)) {
            $result['value'] = $this->value;
        }

        if (!is_null($this->color)) {
            $result['color'] = (string)$this->color;
        }

        ksort($result);

        return $result;
    }
}
