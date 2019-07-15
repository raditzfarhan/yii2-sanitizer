<?php
namespace raditzfarhan\Yii2Sanitizer\Filters;

use yii\web\HttpException;

class CastFilter extends BaseFilter
{
    /**
     *  cast value to given option.
     *
     *  @param  string  $value
     *  @return string
     */
    public function apply($value)
    {
        if (!$this->option) {
            throw new \yii\web\HttpException(422, Yii::t('app', 'Please set an option.'));
        }

        switch ($this->option) {
            case 'int':
            case 'integer':
                return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
                break;
            case 'float':
                return filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);
                break;
            case 'string':
                return filter_var($value, FILTER_SANITIZE_STRING);
                break;               
            default:
                throw new \yii\web\HttpException(422, Yii::t('app', 'Please set an option.'));
        }
    }
}
