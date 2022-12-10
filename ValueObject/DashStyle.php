<?php

namespace Validaide\HighChartsBundle\ValueObject;

use InvalidArgumentException;

class DashStyle
{
    private const ERROR_UNSUPPORTED_DASH_STYLE = "This Dash Style is not allowed: %s";

    public const DASH_STYLE_SOLID              = "Solid";
    public const DASH_STYLE_SHORT_DASH         = "ShortDash";
    public const DASH_STYLE_SHORT_DOT          = "ShortDot";
    public const DASH_STYLE_SHORT_DASH_DOT     = "ShortDashDot";
    public const DASH_STYLE_SHORT_DASH_DOT_DOT = "ShortDashDotDot";
    public const DASH_STYLE_DOT                = "Dot";
    public const DASH_STYLE_DASH               = "Dash";
    public const DASH_STYLE_LONG_DASH          = "LongDash";
    public const DASH_STYLE_DASH_DOT           = "DashDot";
    public const DASH_STYLE_LONG_DASH_DOT      = "LongDashDot";
    public const DASH_STYLE_LONG_DASH_DOT_DOT  = "LongDashDotDot";

    private string $dashStyle;

    public function __construct(string $dashStyle)
    {
        if (!in_array($dashStyle, $this->getDashStyles())) {
            throw new InvalidArgumentException(sprintf(self::ERROR_UNSUPPORTED_DASH_STYLE, $dashStyle));
        }

        $this->dashStyle = $dashStyle;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->dashStyle;
    }

    public function getDashStyles(): array
    {
        return [
            self::DASH_STYLE_SOLID,
            self::DASH_STYLE_SHORT_DASH,
            self::DASH_STYLE_SHORT_DOT,
            self::DASH_STYLE_SHORT_DASH_DOT,
            self::DASH_STYLE_SHORT_DASH_DOT_DOT,
            self::DASH_STYLE_DOT,
            self::DASH_STYLE_DASH,
            self::DASH_STYLE_LONG_DASH,
            self::DASH_STYLE_DASH_DOT,
            self::DASH_STYLE_LONG_DASH_DOT,
            self::DASH_STYLE_LONG_DASH_DOT_DOT,
        ];
    }
}
