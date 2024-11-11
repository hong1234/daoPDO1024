# daoPDO1024

## project

git clone https://github.com/hong1234/daoPDO1024.git

cd daoPDO1024

composer install

// cd C:\HONG\PHPtest\daoPDO1024

## run app

php app_add_user.php

php app_show_users.php

## run product-feature commands 

php bin/sym7console show-product-list

php bin/sym7console show-product <productID>

php bin/sym7console add-product "<product name>"

php bin/sym7console add-feature <productID> "<feature name>"

## run user commands

php bin/sym7console add-user "<name>" <email> <password>

php bin/sym7console show-user-list

## run tests

php ./vendor/bin/phpunit tests