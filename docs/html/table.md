# CodeIgniter 4 - DataTables
A library to easily use DataTables with CodeIgniter 4.

## The Table class

This class allows to obtain a table formatted in html.

```php
    $table 	= new \atsanna\DataTables\Html\Table();
```

## Association of a Model to the table

It is possible to define a model to be passed as a dependency in the constructor; this model will be used for the management of columns and queries.

```php
    $userModel = new \atsanna\Models\UserModel();
    $table 	= new \atsanna\DataTables\Html\Table( $userModel );
```


The model can be associated or replaced using the method `setModel()`

```php
    $table 	= new \atsanna\DataTables\Html\Table();
    $userModel = new \atsanna\Models\UserModel();
    $table->setModel($userModel);
```

To retrieve and use the associated model, use the method `getModel()`

```php
    $model = $table->getModel();
```

## DataTables configuration

Once the class is instantiated, a basic configuration for the javascript part of DataTables will also be created.
This configuration can be called with the method `getConfiguration()` and customized with specific settings according to need.

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

## Return of the table in html format
The `render()` method returns the formatted table.
It is possible to pass an array with the definition of the fields, styles and css classes to improve the visualization

```php
    $data = [
        'id'        => $userModel->table,
        'class'     => 'table table-striped table-bordered',
        'style'     => 'width: 100%; margin-left: auto; margin-right: auto;',
        'fields'    => $userModel->allowedFields,
    ];
    echo $table->render($data);
```

