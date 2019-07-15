<?php
namespace raditzfarhan\Yii2Sanitizer\Filters;

class StripTagsFilter extends BaseFilter
{
    /**
     *  Strip tags from the given string.
     *
     *  @param  string  $value
     *  @return string
     */
    public function apply($value)
    {
        return strip_tags($value);
    }
}
