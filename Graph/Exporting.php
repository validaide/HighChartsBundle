<?php

namespace Validaide\HighChartsBundle\Graph;

class Exporting
{
    /**
     * Experimental setting to allow HTML inside the chart (added through the useHTML options), directly in the exported image.
     * This allows you to preserve complicated HTML structures like tables or bi-directional text in exported charts.
     *
     * DISCLAIMER: The HTML is rendered in a foreignObject tag in the generated SVG.
     * The official export server is based on PhantomJS, which supports this, but other SVG clients, like Batik, does not support it.
     * This also applies to downloaded SVG that you want to open in a desktop client.
     */
    private bool $allowHTML = false;

    /**
     * Whether to enable the exporting module.
     * Disabling the module will hide the context button, but API methods will still be available.
     */
    private bool $enabled = true;

    /**
     * The filename, without extension, to use for the exported chart.
     */
    private string $filename = 'chart';

    /**
     * Defines the scale or zoom factor for the exported image compared to the on-screen display.
     * While for instance a 600px wide chart may look good on a website, it will look bad in print.
     * The default scale of 2 makes this chart export to a 1200px PNG or JPG.
     */
    private int $scale = 2;

    /**
     * Analogous to sourceWidth.
     */
    private ?int $sourceHeight = null;

    /**
     * The width of the original chart when exported, unless an explicit width is set, or a pixel width is set on the container.
     * The width exported raster image is then multiplied by scale.
     */
    private ?int $sourceWidth = null;

    /**
     * The pixel width of charts exported to PNG or JPG.
     */
    private ?int $width = null;

    public function isAllowHTML(): bool
    {
        return $this->allowHTML;
    }

    public function setAllowHTML(bool $allowHTML): void
    {
        $this->allowHTML = $allowHTML;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }

    public function getScale(): int
    {
        return $this->scale;
    }

    public function setScale(int $scale): void
    {
        $this->scale = $scale;
    }

    public function getSourceHeight(): int
    {
        return $this->sourceHeight;
    }

    public function setSourceHeight(int $sourceHeight): void
    {
        $this->sourceHeight = $sourceHeight;
    }

    public function getSourceWidth(): int
    {
        return $this->sourceWidth;
    }

    public function setSourceWidth(int $sourceWidth): void
    {
        $this->sourceWidth = $sourceWidth;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return array<string, bool>|array<string, int>|array<string, string>
     */
    public function toArray(): array
    {
        $result = [
            'allowHTML' => (bool)$this->allowHTML,
            'enabled'   => (bool)$this->enabled,
            'filename'  => (string)$this->filename,
            'scale'     => (int)$this->scale,
        ];

        if (!is_null($this->sourceHeight)) {
            $result['sourceHeight'] = (int)$this->sourceHeight;
        }

        if (!is_null($this->sourceWidth)) {
            $result['sourceWidth'] = (int)$this->sourceWidth;
        }

        if (!is_null($this->width)) {
            $result['width'] = (int)$this->width;
        }

        ksort($result);

        return $result;
    }
}
