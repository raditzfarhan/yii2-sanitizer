<?php 
namespace raditzfarhan\Yii2Sanitizer;

use Yii;
use yii\base\Component;
use yii\web\HttpException;

class Sanitize extends Component
{
    protected $filters = [
        'cast' => \raditzfarhan\Yii2Sanitizer\Filters\CastFilter::class,
        'digit' => \raditzfarhan\Yii2Sanitizer\Filters\DigitFilter::class,
        'encode' => \raditzfarhan\Yii2Sanitizer\Filters\EncodeFilter::class,
        'escape' => \raditzfarhan\Yii2Sanitizer\Filters\EscapeFilter::class,
        'float' => \raditzfarhan\Yii2Sanitizer\Filters\FloatFilter::class,
        'int' => \raditzfarhan\Yii2Sanitizer\Filters\IntFilter::class,
        'purify' => \raditzfarhan\Yii2Sanitizer\Filters\PurifyFilter::class,
        'strip_tags' => \raditzfarhan\Yii2Sanitizer\Filters\StripTagsFilter::class,
        'trim' => \raditzfarhan\Yii2Sanitizer\Filters\TrimFilter::class,   
    ];

    public function __construct($config = [])
    {
        // ... initialization before configuration is applied

        parent::__construct($config);
    }

    /*
     *  Sanitize given data.
     *  return array
     */
    public function sanitize($data, array $filters)
    {
        if (!($data && $filters)) {
            throw new \yii\web\HttpException(422, Yii::t('app', 'No data or no filters supplied.'));
        }

        if (!(is_array($data) && is_array($filters))) {
            throw new \yii\web\HttpException(422, Yii::t('app', 'Data and filters must be an array.'));
        }

        $all_filters = [];

        array_walk($filters, function($item, $key) use (&$all_filters){
            $all_filters = array_merge($all_filters, $item);
        });

        $all_filters = array_unique($all_filters);

        foreach ($all_filters as $filter_var) {           

            $filter_arr = explode(':', $filter_var);
            $filter_name = isset($filter_arr[0]) ? $filter_arr[0] : null;
            $filter_options = isset($filter_arr[1]) ? $filter_arr[1] : null;

            if (!isset($this->filters[$filter_name])) {
                continue;
            }

            $$filter_name = new $this->filters[$filter_name];
        }

        foreach ($filters as $key=>$filter) {
           
            if (!isset($data[$key])) {
                continue; // skipped
            }

            foreach ($filter as $val) {               

                $fltr_arr = explode(':', $val);
                $fltr_name = isset($fltr_arr[0]) ? $fltr_arr[0] : null;
                $fltr_option = isset($fltr_arr[1]) ? $fltr_arr[1] : null;


                if (!isset($this->filters[$fltr_name])) {
                    continue; // skipped
                }

                if ($fltr_option) {
                    $data[$key] = $$fltr_name->option($fltr_option)->apply($data[$key]);
                } else {
                    $data[$key] = $$fltr_name->apply($data[$key]);
                }
                
                           
            }            
        }

        return $data;
    }

    /*
     *  Sanitize given value.
     *  return array
     */
    public function filter($value, $filters)
    {
        if (!($value && $filters)) {
            throw new \yii\web\HttpException(422, Yii::t('app', 'No value or no filters supplied.'));
        }

        if (is_array($filters)) {
            foreach ($filters as $key => $filter) {
                $value = $this->applyFilter($value, $filter);
            }
        } else {
            $value = $this->applyFilter($value, $filter);
        }

        return $value;
    }

    /*
    *  Apply filters to given value
    *  return $value
    */

    private function applyFilter($value, $filter)
    {
        $filter_arr = explode(':', $filter);
        $filter_name = isset($filter_arr[0]) ? $filter_arr[0] : null;
        $filter_option = isset($filter_arr[1]) ? $filter_arr[1] : null;

        if (!isset($this->filters[$filter_name])) {
            return $value;
        }

        if ($filter_option) {
            return (new $this->filters[$filter_name])->option($filter_option)->apply($value);
        } else {
            return (new $this->filters[$filter_name])->apply($value);
        }        
    }

    /*
     *  Just for lulz
     */
    public static function kamen()
    {
        return 'Henshin!!!';
    }
}