<?php
namespace raditzfarhan\Yii2Sanitizer\Filters;

class DigitFilter extends BaseFilter
{
    /**
     *  cast value to integer or float value.
     *
     *  @param  string  $value
     *  @return string
     */
    public function apply($value)
    {
        return ($value == (int) $value) ? intval($value) : floatval($value);
    }
}
