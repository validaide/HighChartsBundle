<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * @author Mark Bijl <mark.bijl@validaide.com>
 */
class DateTimeLabelFormats
{
    /** @var string */
    private $millisecond;
    /** @var string */
    private $second;
    /** @var string */
    private $minute;
    /** @var string */
    private $hour;
    /** @var string */
    private $day;
    /** @var string */
    private $week;
    /** @var string */
    private $month;
    /** @var string */
    private $year;

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
