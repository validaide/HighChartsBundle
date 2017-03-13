<?php

namespace Validaide\HighChartsBundle\Graph;

/**
 * Class: Title
 */
class Title
{
    /**
     * @var string
     */
    private $text;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function toArray()
    {
        $result = [];

        if (!is_null($this->text)) {
            $result['text'] = $this->text;
        }

        return $result;
    }
}
