<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class DateTimeLabelFormats
{
    /** @var string|null */
    private $millisecond;
    /** @var string|null */
    private $second;
    /** @var string|null */
    private $minute;
    /** @var string|null */
    private $hour;
    /** @var string|null */
    private $day;
    /** @var string|null */
    private $week;
    /** @var string|null */
    private $month;
    /** @var string|null */
    private $year;

    /**
     * @return null|string
     */
    public function getMillisecond(): string
    {
        return $this->millisecond;
    }

    /**
     * @param null|string $millisecond
     */
    public function setMillisecond(string $millisecond)
    {
        $this->millisecond = $millisecond;
    }

    /**
     * @return null|string
     */
    public function getSecond(): string
    {
        return $this->second;
    }

    /**
     * @param null|string $second
     */
    public function setSecond(string $second)
    {
        $this->second = $second;
    }

    /**
     * @return null|string
     */
    public function getMinute(): string
    {
        return $this->minute;
    }

    /**
     * @param null|string $minute
     */
    public function setMinute(string $minute)
    {
        $this->minute = $minute;
    }

    /**
     * @return null|string
     */
    public function getHour(): string
    {
        return $this->hour;
    }

    /**
     * @param null|string $hour
     */
    public function setHour(string $hour)
    {
        $this->hour = $hour;
    }

    /**
     * @return null|string
     */
    public function getDay(): string
    {
        return $this->day;
    }

    /**
     * @param null|string $day
     */
    public function setDay(string $day)
    {
        $this->day = $day;
    }

    /**
     * @return null|string
     */
    public function getWeek(): string
    {
        return $this->week;
    }

    /**
     * @param null|string $week
     */
    public function setWeek(string $week)
    {
        $this->week = $week;
    }

    /**
     * @return null|string
     */
    public function getMonth(): string
    {
        return $this->month;
    }

    /**
     * @param null|string $month
     */
    public function setMonth(string $month)
    {
        $this->month = $month;
    }

    /**
     * @return null|string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @param null|string $year
     */
    public function setYear(string $year)
    {
        $this->year = $year;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->millisecond)) {
            $result['millisecond'] = $this->millisecond;
        }
        if (!is_null($this->second)) {
            $result['second'] = $this->second;
        }
        if (!is_null($this->minute)) {
            $result['minute'] = $this->minute;
        }
        if (!is_null($this->hour)) {
            $result['hour'] = $this->hour;
        }
        if (!is_null($this->day)) {
            $result['day'] = $this->day;
        }
        if (!is_null($this->week)) {
            $result['week'] = $this->week;
        }
        if (!is_null($this->month)) {
            $result['month'] = $this->month;
        }
        if (!is_null($this->year)) {
            $result['year'] = $this->year;
        }

        return $result;
    }
}
