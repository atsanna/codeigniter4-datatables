# codeigniter4-datatables
[![CodeIgniter 4.2.x](https://img.shields.io/badge/CodeIgniter-4.2.x-orange.svg)](https://codeigniter.com/)
[![Unit Tests](https://github.com/atsanna/codeigniter4-datatables/workflows/PHPUnit/badge.svg)](https://github.com/atsanna/codeigniter4-datatables/actions/workflows/phpunit.yml)
[![Static Analysis](https://github.com/atsanna/codeigniter4-datatables/workflows/PHPStan/badge.svg)](https://github.com/atsanna/codeigniter4-datatables/actions/workflows/phpstan.yml)
[![Architecture](https://github.com/atsanna/codeigniter4-datatables/workflows/Deptrac/badge.svg)](https://github.com/atsanna/codeigniter4-datatables/actions/workflows/deptrac.yml)
[![Coverage Status](https://coveralls.io/repos/github/atsanna/codeigniter4-datatables/badge.svg?branch=main&service=github&kill_cache=1)](https://coveralls.io/github/atsanna/codeigniter4-datatables?branch=main)
[![GitHub license](https://img.shields.io/github/license/atsanna/codeigniter4-datatables)](https://github.com/atsanna/codeigniter4-datatables/blob/main/LICENSE)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/atsanna/codeigniter4-datatables/pulls)

This is an extension for CodeIgniter 4.2.x to add Datatables support to your application.

## Warning: this is a non-functional experimental version!

The purpose is to generate the html table and the javascript function for its management with a few lines of code.

It is possible to define a model to be passed as a dependency in the constructor; this model will be used for the management of columns and queries.
```php
    $userModel = new \atsanna\Models\UserModel();

    $table 	= new \atsanna\DataTables\Html\Table( $userModel );
```

There are many configuration possibilities:

- Enable or disable automatic calculation of column width
- Enable or disable deferred rendering for faster initialization speed
- Enable or disable the table information display field
- Enable or disable column sorting
- Enable or disable table pagination
- Layout button display options
- Enable or disable the display of a 'processing' indicator
- Enable horizontal scrolling
- Enable vertical scrolling
- Allow the table to shrink in height when a limited number of rows are displayed
- Ability to search (filter) feature control
- Enable or disable server side processing
- Enable or disable state saving
- Change the options in the page length selection list
- Set column specific initialization properties

The default configuration can be customized as follows:
```php
    $table->getConfiguration()
            ->setPaging(true)
            ->setPagingType( 'full_numbers')
            ->setOrdering(true)
            ->setInfo(false)
            ->setSearching(true)
            ->setLengthMenu('[[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]')
            ->setAutoWidth(false)
            ->setScrollX(true);
```

It is possible to customize the rendering:
```php
    $data = [
        'id'        => $userModel->table,
        'class'     => 'table table-striped table-bordered',
        'style'     => 'width: 100%; margin-left: auto; margin-right: auto;',
        'fields'    => $userModel->allowedFields,
    ];

    echo $table->render($data);
```
