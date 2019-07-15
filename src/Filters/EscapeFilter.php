<?php
namespace raditzfarhan\Yii2Sanitizer\Filters;

class EscapeFilter extends BaseFilter
{
    /**
     *  Escape quote string with slashes.
     *
     *  @param  string  $value
     *  @return string
     */
    public function apply($value)
    {
        return filter_var($value, FILTER_SANITIZE_MAGIC_QUOTES);
    }
}
