<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author Marcel Tuinstra <marcel.tuinstra@validaide.com>
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class Axis
{
    private Title $title;
    private ?bool $opposite = null;
    private ?bool $crosshair = null;
    private ?array $categories = null;
    private ?float $min = null;
    private ?float $max = null;
    public Labels $labels;
    /** @var PlotBand[] */
    private $plotBands;
    /** @var PlotLine[] */
    private $plotLines;
    private ?float $tickInterval = null;
    private ?bool $startOnTick = null;
    private ?bool $endOnTick = null;
    private ?bool $alignTicks = null;
    private ?float $softMin = null;
    private ?float $softMax = null;
    private ?string $type = null;
    private ?DateTimeLabelFormats $dateTimeLabelFormats = null;
    private ?bool $allowDecimals = null;
    private ?int $rotation = null;
    private ?int $lineWidth = null;
    private ?string $tickmarkPlacement = null;
    private ?string $gridLineInterpolation = null;

    /**
     * Axis constructor.
     */
    public function __construct()
    {
        $this->title  = new Title();
        $this->labels = new Labels();
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function setTitle(Title $title): void
    {
        $this->title = $title;
    }

    public function getOpposite(): bool
    {
        return $this->opposite;
    }

    public function setOpposite(bool $opposite): void
    {
        $this->opposite = $opposite;
    }

    public function isCrosshair(): bool
    {
        return $this->crosshair;
    }

    public function setCrosshair(bool $crosshair): void
    {
        $this->crosshair = $crosshair;
    }

    public function getCategories(): ?array
    {
        return $this->categories;
    }

    public function setCategories(?array $categories): void
    {
        $this->categories = $categories;
    }

    public function getMin(): float
    {
        return $this->min;
    }

    public function setMin(float $min): void
    {
        $this->min = $min;
    }

    public function getMax(): float
    {
        return $this->max;
    }

    public function setMax(float $max): void
    {
        $this->max = $max;
    }

    public function addPlotBand(PlotBand $plotBand): void
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
    public function setPlotBands(array $plotBands): void
    {
        $this->plotBands = $plotBands;
    }

    public function addPlotLine(PlotLine $plotLine): void
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
    public function setPlotLines(array $plotLines): void
    {
        $this->plotLines = $plotLines;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getTickInterval(): float
    {
        return $this->tickInterval;
    }

    public function setTickInterval(float $tickInterval): void
    {
        $this->tickInterval = $tickInterval;
    }

    public function isEndOnTick(): bool
    {
        return $this->endOnTick;
    }

    public function setEndOnTick(bool $endOnTick): void
    {
        $this->endOnTick = $endOnTick;
    }

    public function isAlignTicks(): bool
    {
        return $this->alignTicks;
    }

    public function setAlignTicks(bool $alignTicks): void
    {
        $this->alignTicks = $alignTicks;
    }

    public function getLabels(): Labels
    {
        return $this->labels;
    }

    public function setLabels(Labels $labels): void
    {
        $this->labels = $labels;
    }

    public function isStartOnTick(): bool
    {
        return $this->startOnTick;
    }

    public function setStartOnTick(bool $startOnTick): void
    {
        $this->startOnTick = $startOnTick;
    }

    public function getSoftMin(): ?float
    {
        return $this->softMin;
    }

    public function setSoftMin(float $softMin = null): void
    {
        $this->softMin = $softMin;
    }

    public function getSoftMax(): ?float
    {
        return $this->softMax;
    }

    public function setSoftMax(float $softMax = null): void
    {
        $this->softMax = $softMax;
    }

    public function getDateTimeLabelFormats(): DateTimeLabelFormats
    {
        if (is_null($this->dateTimeLabelFormats)) {
            $this->dateTimeLabelFormats = new DateTimeLabelFormats();
        }

        return $this->dateTimeLabelFormats;
    }

    public function getAllowDecimals(): bool
    {
        return $this->allowDecimals;
    }

    public function setAllowDecimals(bool $allowDecimals): void
    {
        $this->allowDecimals = $allowDecimals;
    }

    public function getRotation(): int
    {
        return $this->rotation;
    }

    public function setRotation(int $rotation): void
    {
        $this->rotation = $rotation;
    }

    public function getLineWidth(): ?int
    {
        return $this->lineWidth;
    }

    public function setLineWidth(?int $lineWidth): void
    {
        $this->lineWidth = $lineWidth;
    }

    public function getTickmarkPlacement(): ?string
    {
        return $this->tickmarkPlacement;
    }

    public function setTickmarkPlacement(?string $tickmarkPlacement): void
    {
        $this->tickmarkPlacement = $tickmarkPlacement;
    }

    public function getGridLineInterpolation(): ?string
    {
        return $this->gridLineInterpolation;
    }

    public function setGridLineInterpolation(?string $gridLineInterpolation): void
    {
        $this->gridLineInterpolation = $gridLineInterpolation;
    }

    public function toArray(): array
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
