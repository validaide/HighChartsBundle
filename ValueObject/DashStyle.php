<?php

namespace Validaide\HighChartsBundle\ValueObject;

use Stringable;
use InvalidArgumentException;

class DashStyle implements Stringable
{
    private const ERROR_UNSUPPORTED_DASH_STYLE = "This Dash Style is not allowed: %s";

    final public const DASH_STYLE_SOLID              = "Solid";
    final public const DASH_STYLE_SHORT_DASH         = "ShortDash";
    final public const DASH_STYLE_SHORT_DOT          = "ShortDot";
    final public const DASH_STYLE_SHORT_DASH_DOT     = "ShortDashDot";
    final public const DASH_STYLE_SHORT_DASH_DOT_DOT = "ShortDashDotDot";
    final public const DASH_STYLE_DOT                = "Dot";
    final public const DASH_STYLE_DASH               = "Dash";
    final public const DASH_STYLE_LONG_DASH          = "LongDash";
    final public const DASH_STYLE_DASH_DOT           = "DashDot";
    final public const DASH_STYLE_LONG_DASH_DOT      = "LongDashDot";
    final public const DASH_STYLE_LONG_DASH_DOT_DOT  = "LongDashDotDot";

    private readonly string $dashStyle;

    public function __construct(string $dashStyle)
    {
        if (!in_array($dashStyle, $this->getDashStyles())) {
            throw new InvalidArgumentException(sprintf(self::ERROR_UNSUPPORTED_DASH_STYLE, $dashStyle));
        }

        $this->dashStyle = $dashStyle;
    }

    public function __toString(): string
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