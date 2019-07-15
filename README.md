# Yii2 Sanitizer
Yii2 Sanitizer is an easy way to sanitize or filter your inputs.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require raditzfarhan/yii2-sanitizer "^1.0.0"
```

or add

```
"raditzfarhan/yii2-sanitizer": "^1.0.0"
```

to the require section of your `composer.json` file.

## Release Changes

> NOTE: Refer the [CHANGE LOG](https://github.com/raditzfarhan/yii2-sanitizer/blob/master/CHANGE.md) for details on changes to various releases.

## Usage

Add this to the component section of your main config.  
```php
'components' => [
    ...
    'sanitizer' => [           
        'class' => 'raditzfarhan\Yii2Sanitizer\Sanitize',                   
    ],
    ...
],
```

## Examples

### Filters an array on inputs

```php
// data to be filtered
$data = [
    'name' => ' Farhan"',
    'address' => '<p>No 1, Residence ABC</p>',
    'postcode' => '81221A',
    'points' => '-152.1711B',
    'status' => 'C1',
];

// create a filters corresponding to the input data array
$filters = [
    'name' => ['trim', 'escape'],
    'address' => ['trim', 'escape', 'cast:string'],
    'postcode' => ['digit'],
    'points' => ['digit'],
    'status' => ['cast:int'],
];

// call sanitize function to filter an array of inputs
$filtered_data = Yii::$app->sanitizer->sanitize($data, $filters);
var_dump($filtered_data);
```
Results in:
```php
[
    'name' => 'Farhan\\\"'
    'address' => 'No 1, Residence ABC'
    'postcode' => 81221
    'points' => -152.1711
    'status' => '1'
]
```

Usage is fairly simple. Your filter array needs to match the data array with the filters as the array value. You can combine the filters and it will be executed in order from left to right. 

### Filter single value

```php
// call filter function to filter a single value. You can add filter type as the second argument.
$filtered_data = Yii::$app->sanitizer->filter('<p>No 1, Residence ABC</p>', ['trim', 'cast:string']);
echo $filtered_data;
```
Results in:
```php
No 1, Residence ABC
```
The first argument would be the value that needs filtering. The second argument would be the filters that needs to be applied.

## Available Filters
Here are the filters that you can use:

 Filter  | Description
:---------|:----------
**cast** | Cast given value into given type. Options are int, float, string.
**digit** | Will removes non-digit from given value.
**encode**| Escaping unwanted tags and only output plain HTML using Yii's HTML:encode() function. 
**escape** | Quote string with slashes using filter_var (FILTER_SANITIZE_MAGIC_QUOTES) function.
**float** | Removes unwanted characters and remain a float number only. Similar to cast:float.
**int** | Removes unwanted characters and remain a integer number only. Similar to case:int.
**purify** | Purify HTML content using Yii's HtmlPurifier::process() function. Note that HtmlPurifier processing is quite heavy so use with caution.
**strip_tags** | Removes HTML tags from given string value.
**trim** | Trims a string and remove white spaces.

## License

**Yii2 Sanitizer** is released under the [MIT license](http://opensource.org/licenses/MIT)



