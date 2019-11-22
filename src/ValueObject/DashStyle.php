<?php

namespace Validaide\HighChartsBundle\ValueObject;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class DashStyle
{
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

    /** @var string */
    private $dashStyle;

    /**
     * DashStyle constructor.
     *
     * @param string $dashStyle
     */
    public function __construct(string $dashStyle)
    {
        if (!in_array($dashStyle, $this->getDashStyles())) {
            throw new \InvalidArgumentException('This Dash Style is not allowed: ' . $dashStyle);
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

    /**
     * @return array
     */
    public function getDashStyles()
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
