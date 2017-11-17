# README

The Validaide HighCharts Bundle project provides a HighCharts integration for your PHP 5.6+ project. It allows you to manage graphs using [HighCharts](http://highcharts.com)
(who are awesome, by the way).

# Documentation
## Installation
### Download the Bundle
Require the library in your ```composer.json``` file:

``` bash
$ composer require validaide/highchartsbundle
```

### Register the Bundle

Now add the Bundle in your ```AppKernel```:

``` php
// app/AppKernel.php

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        ...
        
        $bundles = [
            ...
            new Validaide\HighChartsBundle\HighChartsBundle()
            ...
        ];
        
        ...
        
        return $bundles;
    }
```

## License

The Validaide HighCharts Bundle is under the MIT license. For the full copyright and license information, please read the
[LICENSE](/LICENSE) file that was distributed with this source code.
