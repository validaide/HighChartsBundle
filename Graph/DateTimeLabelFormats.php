<?php

namespace Validaide\HighChartsBundle\Graph;

class DateTimeLabelFormats
{
    private ?string $millisecond = null;
    private ?string $second      = null;
    private ?string $minute      = null;
    private ?string $hour        = null;
    private ?string $day         = null;
    private ?string $week        = null;
    private ?string $month       = null;
    private ?string $year        = null;

    public function getMillisecond(): ?string
    {
        return $this->millisecond;
    }

    public function setMillisecond(?string $millisecond): void
    {
        $this->millisecond = $millisecond;
    }

    public function getSecond(): ?string
    {
        return $this->second;
    }

    public function setSecond(?string $second): void
    {
        $this->second = $second;
    }

    public function getMinute(): ?string
    {
        return $this->minute;
    }

    public function setMinute(?string $minute): void
    {
        $this->minute = $minute;
    }

    public function getHour(): ?string
    {
        return $this->hour;
    }

    public function setHour(?string $hour): void
    {
        $this->hour = $hour;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(?string $day): void
    {
        $this->day = $day;
    }

    public function getWeek(): ?string
    {
        return $this->week;
    }

    public function setWeek(?string $week): void
    {
        $this->week = $week;
    }

    public function getMonth(): ?string
    {
        return $this->month;
    }

    public function setMonth(?string $month): void
    {
        $this->month = $month;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): void
    {
        $this->year = $year;
    }

    public function toArray(): array
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
