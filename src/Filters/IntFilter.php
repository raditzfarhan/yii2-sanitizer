<?php
namespace raditzfarhan\Yii2Sanitizer\Filters;

class IntFilter extends BaseFilter
{
    /**
     *  Cast value to integer.
     *
     *  @param  string  $value
     *  @return string
     */
    public function apply($value)
    {
        return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    }
}
