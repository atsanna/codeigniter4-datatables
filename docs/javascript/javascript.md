## DataTables Javascript
We instantiate the class

```php
		$javascript = new \atsanna\DataTables\Javascript\DataTablesScript();
```

At this point we can import the javascript and css libraries

```php
		echo $javascript->getExternalLibraries();
```

At the end of the page, let's add the automatically generated script

```php
		echo $javascript->getDocumentReady( $data['id'], $table->getConfiguration() );
```
