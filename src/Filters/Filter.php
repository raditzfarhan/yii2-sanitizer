<?php
namespace raditzfarhan\Yii2Sanitizer\Filters;

interface Filter
{
    /**
     *  Apply filter to the value
     *
     *  @param  mixed $value, $options
     *  @return mixed
     */
    public function apply($value);

    /**
     *  Apply filter option. Filter option is optional and only certain filter uses it.
     *
     *  @param  mixed $value, $options
     *  @return mixed
     */
    public function option($value);
}
