<?php

namespace Validaide\HighChartsBundle\ValueObject;

use InvalidArgumentException;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class DashStyle
{
    private const ERROR_UNSUPPORTED_DASH_STYLE = "This Dash Style is not allowed: %s";

    const DASH_STYLE_SOLID              = "Solid";
    const DASH_STYLE_SHORT_DASH         = "ShortDash";
    const DASH_STYLE_SHORT_DOT          = "ShortDot";
    const DASH_STYLE_SHORT_DASH_DOT     = "ShortDashDot";
    const DASH_STYLE_SHORT_DASH_DOT_DOT = "ShortDashDotDot";
    const DASH_STYLE_DOT                = "Dot";
    const DASH_STYLE_DASH               = "Dash";
    const DASH_STYLE_LONG_DASH          = "LongDash";
    const DASH_STYLE_DASH_DOT           = "DashDot";
    const DASH_STYLE_LONG_DASH_DOT      = "LongDashDot";
    const DASH_STYLE_LONG_DASH_DOT_DOT  = "LongDashDotDot";

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
