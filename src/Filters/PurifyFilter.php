<?php
namespace raditzfarhan\Yii2Sanitizer\Filters;

class PurifyFilter extends BaseFilter
{
    /**
     *  Purify html value.
     *
     *  @param  string  $value
     *  @return string
     */
    public function apply($value)
    {
        return \yii\helpers\HtmlPurifier::process($value);
    }
}
