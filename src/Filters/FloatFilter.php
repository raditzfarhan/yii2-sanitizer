<?php
namespace raditzfarhan\Yii2Sanitizer\Filters;

class FloatFilter extends BaseFilter
{
    /**
     *  Cast value to float.
     *
     *  @param  string  $value
     *  @return string
     */
    public function apply($value)
    {
        return filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);
    }
}
