# Installation

This is a Datatables support for CodeIgniter 4. It is designed so that you can download it and incorporate into your
new or existing CodeIgniter 4 application, modifying everything as you would need to.
It uses [Composer](https://getcomposer.org) to install and manage dependencies. These directions assume that
you have Composer installed globally. If you do not, then you will need to adjust the commands according
to your setup.

NOTE: CODEIGNITER VERSIONS PRIOR TO 4.2 MUST EXTEND THE VALIDATION CLASS FROM BASECONFIG.

## Install CodeIgniter

You must have an existing CodeIgniter 4 project already setup. To install a new project, type the folloing
at the command line:

```php
    > composer create-project codeigniter4/appstarter my-app --stability dev
```

This creates a new CodeIgniter 4 project in the `my-app` directory. Finish any required setup as per
the [CodeIgniter User Guide](https://codeigniter.com/user_guide/installation/installing_composer.html#installation-set-up).

## Download Initial Repo

Next you need to install Datatables support as a dependency in your project. From your command line type the following:

```php
    >  composer require atsanna/codeigniter4-datatables --stability dev
```

This will download the latest version and all dependencies.


## Enjoy

That's all that's needed to get started.
