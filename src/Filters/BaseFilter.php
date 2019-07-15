<?php
namespace raditzfarhan\Yii2Sanitizer\Filters;

class BaseFilter implements Filter
{
    protected $option;
    
    /**
     *  Return given value
     *
     *  @param  string  $value
     *  @return string
     */
    public function apply($value)
    {
        return $value;
    }

    /**
     *  Set an option
     *
     *  @param  string  $value
     *  @return $this
     */

    public function option($value)
    {
        $this->option = $value;

        return $this;
    }
}
