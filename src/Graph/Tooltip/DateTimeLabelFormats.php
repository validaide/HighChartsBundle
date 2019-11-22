<?php

namespace Validaide\HighChartsBundle\Graph\Tooltip;

use Validaide\HighChartsBundle\Graph\Tooltip;

/**
 * @author Marian Miczka <marian.miczka@validaide.com>
 */
class DateTimeLabelFormats extends Tooltip
{
    /**
     * @var string
     */
    protected $day;
    /**
     * @var string
     */
    protected $hour;
    /**
     * @var string
     */
    protected $millisecond;
    /**
     * @var string
     */
    protected $minute;
    /**
     * @var string
     */
    protected $month;
    /**
     * @var string
     */
    protected $second;
    /**
     * @var string
     */
    protected $week;
    /**
     * @var string
     */
    protected $year;

    /**
     * @return string
     */
    public function getDay(): string
    {
        return $this->day;
    }

    /**
     * @param string $day
     */
    public function setDay(string $day)
    {
        $this->day = $day;
    }

    /**
     * @return string
     */
    public function getHour(): string
    {
        return $this->hour;
    }

    /**
     * @param string $hour
     */
    public function setHour(string $hour)
    {
        $this->hour = $hour;
    }

    /**
     * @return string
     */
    public function getMillisecond(): string
    {
        return $this->millisecond;
    }

    /**
     * @param string $millisecond
     */
    public function setMillisecond(string $millisecond)
    {
        $this->millisecond = $millisecond;
    }

    /**
     * @return string
     */
    public function getMinute(): string
    {
        return $this->minute;
    }

    /**
     * @param string $minute
     */
    public function setMinute(string $minute)
    {
        $this->minute = $minute;
    }

    /**
     * @return string
     */
    public function getMonth(): string
    {
        return $this->month;
    }

    /**
     * @param string $month
     */
    public function setMonth(string $month)
    {
        $this->month = $month;
    }

    /**
     * @return string
     */
    public function getSecond(): string
    {
        return $this->second;
    }

    /**
     * @param string $second
     */
    public function setSecond(string $second)
    {
        $this->second = $second;
    }

    /**
     * @return string
     */
    public function getWeek(): string
    {
        return $this->week;
    }

    /**
     * @param string $week
     */
    public function setWeek(string $week)
    {
        $this->week = $week;
    }

    /**
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @param string $year
     */
    public function setYear(string $year)
    {
        $this->year = $year;
    }
}