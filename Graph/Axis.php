<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author Marcel Tuinstra <marcel.tuinstra@validaide.com>
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Axis
{
    /** @var Title */
    private $title;
    /** @var bool */
    private $opposite;
    /** @var bool */
    private $crosshair;
    /** @var array|null */
    private $categories = null;
    /** @var float */
    private $min;
    /** @var float */
    private $max;
    /** @var Labels */
    public $labels;
    /** @var PlotBand[] */
    private $plotBands;
    /** @var PlotLine[] */
    private $plotLines;
    /** @var float */
    private $tickInterval;
    /** @var bool */
    private $startOnTick;
    /** @var bool */
    private $endOnTick;
    /** @var bool */
    private $alignTicks;
    /** @var float */
    private $softMin;
    /** @var float */
    private $softMax;
    /** @var string */
    private $type;
    /** @var DateTimeLabelFormats */
    private $dateTimeLabelFormats;
    /** @var bool */
    private $allowDecimals;
    /** @var int */
    private $rotation;
    /** @var int|null */
    private $lineWidth = null;
    /** @var string|null */
    private $tickmarkPlacement = null;
    /** @var string|null */
    private $gridLineInterpolation = null;

    /**
     * Axis constructor.
     */
    public function __construct()
    {
        $this->title  = new Title();
        $this->labels = new Labels();
    }

    /**
     * @return Title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param Title $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return bool
     */
    public function getOpposite(): bool
    {
        return $this->opposite;
    }

    /**
     * @param bool $opposite
     */
    public function setOpposite(bool $opposite)
    {
        $this->opposite = $opposite;
    }

    /**
     * @return bool
     */
    public function isCrosshair(): bool
    {
        return $this->crosshair;
    }

    /**
     * @param bool $crosshair
     */
    public function setCrosshair(bool $crosshair)
    {
        $this->crosshair = $crosshair;
    }

    /**
     * @return array|null
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param array|null $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return float
     */
    public function getMin(): float
    {
        return $this->min;
    }

    /**
     * @param float $min
     */
    public function setMin(float $min)
    {
        $this->min = $min;
    }

    /**
     * @return float
     */
    public function getMax(): float
    {
        return $this->max;
    }

    /**
     * @param float $max
     */
    public function setMax(float $max)
    {
        $this->max = $max;
    }

    /**
     * @param PlotBand $plotBand
     */
    public function addPlotBand(PlotBand $plotBand)
    {
        $this->plotBands[] = $plotBand;
    }

    /**
     * @return PlotBand[]
     */
    public function getPlotBands(): array
    {
        return $this->plotBands;
    }

    /**
     * @param PlotBand[] $plotBands
     */
    public function setPlotBands(array $plotBands)
    {
        $this->plotBands = $plotBands;
    }

    /**
     * @param PlotLine $plotLine
     */
    public function addPlotLine(PlotLine $plotLine)
    {
        $this->plotLines[] = $plotLine;
    }

    /**
     * @return PlotLine[]
     */
    public function getPlotLines(): array
    {
        return $this->plotLines;
    }

    /**
     * @param PlotLine[] $plotLines
     */
    public function setPlotLines(array $plotLines)
    {
        $this->plotLines = $plotLines;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getTickInterval(): float
    {
        return $this->tickInterval;
    }

    /**
     * @param float $tickInterval
     */
    public function setTickInterval(float $tickInterval)
    {
        $this->tickInterval = $tickInterval;
    }

    /**
     * @return bool
     */
    public function isEndOnTick(): bool
    {
        return $this->endOnTick;
    }

    /**
     * @param bool $endOnTick
     */
    public function setEndOnTick(bool $endOnTick)
    {
        $this->endOnTick = $endOnTick;
    }

    /**
     * @return bool
     */
    public function isAlignTicks(): bool
    {
        return $this->alignTicks;
    }

    /**
     * @param bool $alignTicks
     */
    public function setAlignTicks(bool $alignTicks)
    {
        $this->alignTicks = $alignTicks;
    }

    /**
     * @return Labels
     */
    public function getLabels(): Labels
    {
        return $this->labels;
    }

    /**
     * @param Labels $labels
     */
    public function setLabels(Labels $labels)
    {
        $this->labels = $labels;
    }

    /**
     * @return bool
     */
    public function isStartOnTick(): bool
    {
        return $this->startOnTick;
    }

    /**
     * @param bool $startOnTick
     */
    public function setStartOnTick(bool $startOnTick)
    {
        $this->startOnTick = $startOnTick;
    }

    /**
     * @return float|null
     */
    public function getSoftMin()
    {
        return $this->softMin;
    }

    /**
     * @param float $softMin
     */
    public function setSoftMin(float $softMin = null)
    {
        $this->softMin = $softMin;
    }

    /**
     * @return float|null
     */
    public function getSoftMax()
    {
        return $this->softMax;
    }

    /**
     * @param float $softMax
     */
    public function setSoftMax(float $softMax = null)
    {
        $this->softMax = $softMax;
    }

    /**
     * @return DateTimeLabelFormats
     */
    public function getDateTimeLabelFormats(): DateTimeLabelFormats
    {
        if (is_null($this->dateTimeLabelFormats)) {
            $this->dateTimeLabelFormats = new DateTimeLabelFormats();
        }

        return $this->dateTimeLabelFormats;
    }

    /**
     * @return bool
     */
    public function getAllowDecimals(): bool
    {
        return $this->allowDecimals;
    }

    /**
     * @param bool $allowDecimals
     */
    public function setAllowDecimals(bool $allowDecimals)
    {
        $this->allowDecimals = $allowDecimals;
    }

    /**
     * @return int
     */
    public function getRotation(): int
    {
        return $this->rotation;
    }

    /**
     * @param int $rotation
     */
    public function setRotation(int $rotation): void
    {
        $this->rotation = $rotation;
    }

    /**
     * @return int|null
     */
    public function getLineWidth(): ?int
    {
        return $this->lineWidth;
    }

    /**
     * @param int|null $lineWidth
     */
    public function setLineWidth(?int $lineWidth): void
    {
        $this->lineWidth = $lineWidth;
    }

    /**
     * @return string|null
     */
    public function getTickmarkPlacement(): ?string
    {
        return $this->tickmarkPlacement;
    }

    /**
     * @param string|null $tickmarkPlacement
     */
    public function setTickmarkPlacement(?string $tickmarkPlacement): void
    {
        $this->tickmarkPlacement = $tickmarkPlacement;
    }

    /**
     * @return string|null
     */
    public function getGridLineInterpolation(): ?string
    {
        return $this->gridLineInterpolation;
    }

    /**
     * @param string|null $gridLineInterpolation
     */
    public function setGridLineInterpolation(?string $gridLineInterpolation): void
    {
        $this->gridLineInterpolation = $gridLineInterpolation;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        // List elements alphabetically

        if (!is_null($this->alignTicks)) {
            $result['alignTicks'] = $this->alignTicks;
        }

        if (!is_null($this->allowDecimals)) {
            $result['allowDecimals'] = $this->allowDecimals;
        }

        if (!is_null($this->categories)) {
            $result['categories'] = $this->categories;
        }

        if (!is_null($this->crosshair)) {
            $result['crosshair'] = $this->crosshair;
        }

        if (!is_null($this->endOnTick)) {
            $result['endOnTick'] = $this->endOnTick;
        }

        if (!is_null($this->startOnTick)) {
            $result['startOnTick'] = $this->startOnTick;
        }

        if (!is_null($this->labels) && !empty($this->labels->toArray())) {
            $result['labels'] = $this->labels->toArray();
        }

        if (!is_null($this->min)) {
            $result['min'] = $this->min;
        }

        if (!is_null($this->max)) {
            $result['max'] = $this->max;
        }

        if (!is_null($this->opposite)) {
            $result['opposite'] = $this->opposite;
        }

        if (!is_null($this->plotBands)) {
            $plotBands = [];
            /** @var PlotBand $plotBand */
            foreach ($this->plotBands as $plotBand) {
                $plotBands[] = $plotBand->toArray();
            }

            $result['plotBands'] = $plotBands;
        }

        if (!is_null($this->plotLines)) {
            $plotLines = [];
            /** @var PlotLine $plotLine */
            foreach ($this->plotLines as $plotLine) {
                $plotLines[] = $plotLine->toArray();
            }

            $result['plotLines'] = $plotLines;
        }

        if (!is_null($this->tickInterval)) {
            $result['tickInterval'] = $this->tickInterval;
        }

        if (!is_null($this->title) && !empty($this->title->toArray())) {
            $result['title'] = $this->title->toArray();
        }

        if (!is_null($this->type)) {
            $result['type'] = $this->type;
        }

        if (!is_null($this->softMin)) {
            $result['softMin'] = $this->softMin;
        }

        if (!is_null($this->softMax)) {
            $result['softMax'] = $this->softMax;
        }

        if (!is_null($this->dateTimeLabelFormats)) {
            $result['dateTimeLabelFormats'] = $this->dateTimeLabelFormats->toArray();
        }

        if (!is_null($this->rotation)) {
            $result['rotation'] = $this->rotation;
        }

        if (!is_null($this->lineWidth)) {
            $result['lineWidth'] = $this->lineWidth;
        }

        if (!is_null($this->tickmarkPlacement)) {
            $result['tickmarkPlacement'] = $this->tickmarkPlacement;
        }

        if (!is_null($this->gridLineInterpolation)) {
            $result['gridLineInterpolation'] = $this->gridLineInterpolation;
        }

        return $result;
    }
}
