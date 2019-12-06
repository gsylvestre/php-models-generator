# PHP models generator
### Painlessly generates PHP models/entities from existing MySQL database!

Run a simple command and you'll get: 
- one pretty model class for each table in your db
- automatic singular class names
- automatic camelCasing
- private props with lightweight getters and setters


## How to install
In your web folder run:
```
composer create-project gsylvestre/php-models-generator
```

## How to use
Inside your new `php-models-generator` directory, execute:
```
php generate models
```
and follow the wizard for setting up database connection... 

*If you need to change database connection infos, edit the generated `config.ini` file.*


Enjoy and big up to Y!