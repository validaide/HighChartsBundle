<?php

namespace Validaide\HighChartsBundle\Graph\Tooltip;

use Validaide\HighChartsBundle\Graph\Tooltip;

/**
 * @author Marian Miczka <marian.miczka@validaide.com>
 */
class DateTimeLabelFormats extends Tooltip
{
    protected ?string $day = null;
    protected ?string $hour = null;
    protected ?string $millisecond = null;
    protected ?string $minute = null;
    protected ?string $month = null;
    protected ?string $second = null;
    protected ?string $week = null;
    protected ?string $year = null;

    public function getDay(): string
    {
        return $this->day;
    }

    public function setDay(string $day): void
    {
        $this->day = $day;
    }

    public function getHour(): string
    {
        return $this->hour;
    }

    public function setHour(string $hour): void
    {
        $this->hour = $hour;
    }

    public function getMillisecond(): string
    {
        return $this->millisecond;
    }

    public function setMillisecond(string $millisecond): void
    {
        $this->millisecond = $millisecond;
    }

    public function getMinute(): string
    {
        return $this->minute;
    }

    public function setMinute(string $minute): void
    {
        $this->minute = $minute;
    }

    public function getMonth(): string
    {
        return $this->month;
    }

    public function setMonth(string $month): void
    {
        $this->month = $month;
    }

    public function getSecond(): string
    {
        return $this->second;
    }

    public function setSecond(string $second): void
    {
        $this->second = $second;
    }

    public function getWeek(): string
    {
        return $this->week;
    }

    public function setWeek(string $week): void
    {
        $this->week = $week;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): void
    {
        $this->year = $year;
    }
}