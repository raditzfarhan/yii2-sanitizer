<?php
namespace raditzfarhan\Yii2Sanitizer\Filters;

class EncodeFilter extends BaseFilter
{
    /**
     *  Strip tags from the given string.
     *
     *  @param  string  $value
     *  @return string
     */
    public function apply($value)
    {
        return \yii\helpers\Html::encode($value);
    }
}
