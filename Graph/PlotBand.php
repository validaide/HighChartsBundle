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
    private $className;

    /**
     * @var
     */
    private $color;

    /**
     * @var Color
     */
    private $borderColor;

    /**
     * @var int
     */
    private $borderWidth;

    /**
     * @var string
     */
    private $id;

    /**
     * @var Label
     */
    private $label;

    /**
     * @var float
     */
    private $from;

    /**
     * @var float
     */
    private $to;

    /**
     * @var int
     */
    private $zIndex;

    /**
     * PlotBand constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * @param string $className
     */
    public function setClassName(string $className)
    {
        $this->className = $className;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getFrom(): float
    {
        return $this->from;
    }

    /**
     * @param float $from
     */
    public function setFrom(float $from)
    {
        $this->from = $from;
    }

    /**
     * @return float
     */
    public function getTo(): float
    {
        return $this->to;
    }

    /**
     * @param float $to
     */
    public function setTo(float $to)
    {
        $this->to = $to;
    }

    /**
     * @return int
     */
    public function getZIndex(): int
    {
        return $this->zIndex;
    }

    /**
     * @param int $zIndex
     */
    public function setZIndex(int $zIndex)
    {
        $this->zIndex = $zIndex;
    }

    /**
     * @return Color
     */
    public function getColor(): Color
    {
        return $this->color;
    }

    /**
     * @param Color $color
     */
    public function setColor(Color $color)
    {
        $this->color = $color;
    }

    /**
     * @return Color
     */
    public function getBorderColor(): Color
    {
        return $this->borderColor;
    }

    /**
     * @param Color $borderColor
     */
    public function setBorderColor(Color $borderColor)
    {
        $this->borderColor = $borderColor;
    }

    /**
     * @return int
     */
    public function getBorderWidth(): int
    {
        return $this->borderWidth;
    }

    /**
     * @param int $borderWidth
     */
    public function setBorderWidth(int $borderWidth)
    {
        $this->borderWidth = $borderWidth;
    }

    /**
     * @return Label
     */
    public function getLabel(): Label
    {
        if (is_null($this->label)) {
            $this->label = new Label();
        }

        return $this->label;
    }

    /**
     * @param Label $label
     */
    public function setLabel(Label $label)
    {
        $this->label = $label;
    }

    /**
     * @return array
     */
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
