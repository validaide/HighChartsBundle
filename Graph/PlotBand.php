<?php

namespace Validaide\HighChartsBundle\Graph;

use Validaide\HighChartsBundle\ValueObject\Color;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class PlotBand
{
    const COLOR        = 'color';
    const BORDER_COLOR = 'borderColor';
    const BORDER_WIDTH = 'borderWidth';
    const CLASS_NAME   = 'className';
    const FROM         = 'from';
    const ID           = 'id';
    const LABEL        = 'label';
    const TO           = 'to';
    const Z_INDEX      = 'zIndex';

    /**
     * @var
     */
    private ?string $className = null;

    /**
     * @var
     */
    private ?Color $color = null;

    private ?Color $borderColor = null;

    private ?int $borderWidth = null;

    private ?string $id = null;

    private ?Label $label = null;

    private ?float $from = null;

    private ?float $to = null;

    private ?int $zIndex = null;

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className): void
    {
        $this->className = $className;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getFrom(): float
    {
        return $this->from;
    }

    public function setFrom(float $from): void
    {
        $this->from = $from;
    }

    public function getTo(): float
    {
        return $this->to;
    }

    public function setTo(float $to): void
    {
        $this->to = $to;
    }

    public function getZIndex(): int
    {
        return $this->zIndex;
    }

    public function setZIndex(int $zIndex): void
    {
        $this->zIndex = $zIndex;
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function setColor(Color $color): void
    {
        $this->color = $color;
    }

    public function getBorderColor(): Color
    {
        return $this->borderColor;
    }

    public function setBorderColor(Color $borderColor): void
    {
        $this->borderColor = $borderColor;
    }

    public function getBorderWidth(): int
    {
        return $this->borderWidth;
    }

    public function setBorderWidth(int $borderWidth): void
    {
        $this->borderWidth = $borderWidth;
    }

    public function getLabel(): Label
    {
        if (is_null($this->label)) {
            $this->label = new Label();
        }

        return $this->label;
    }

    public function setLabel(Label $label): void
    {
        $this->label = $label;
    }

    public function toArray(): array
    {
        $result = [];

        if (!is_null($this->color)) {
            $result[self::COLOR] = (string)$this->color;
        }
        if (!is_null($this->borderColor)) {
            $result[self::BORDER_COLOR] = (string)$this->borderColor;
        }
        if (!is_null($this->borderWidth)) {
            $result[self::BORDER_WIDTH] = (string)$this->borderWidth;
        }
        if (!is_null($this->className)) {
            $result[self::CLASS_NAME] = $this->className;
        }
        if (!is_null($this->from)) {
            $result[self::FROM] = $this->from;
        }
        if (!is_null($this->id)) {
            $result[self::ID] = $this->id;
        }
        if (!is_null($this->label)) {
            $result[self::LABEL] = $this->label->toArray();
        }
        if (!is_null($this->to)) {
            $result[self::TO] = $this->to;
        }
        if (!is_null($this->zIndex)) {
            $result[self::Z_INDEX] = $this->zIndex;
        }

        return $result;
    }
}
