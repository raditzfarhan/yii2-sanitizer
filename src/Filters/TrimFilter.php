<?php
namespace raditzfarhan\Yii2Sanitizer\Filters;

class TrimFilter extends BaseFilter
{
    /**
     *  Trim given string value.
     *
     *  @param  string  $value
     *  @return string
     */
    public function apply($value)
    {
        return is_string($value) ? trim($value) : $value;
    }
}
