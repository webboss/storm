## Create model ##
`php artisan make:model BlogCategory -m`

`php artisan make:model BlogPost -m`

`The foreign key column was SMALLINT(5) UNSIGNED and the referenced column was INT(10) UNSIGNED. Once I made them both the same exact type, the foreign key creation worked perfectly.`
