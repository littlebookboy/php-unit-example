# php 單元測試練習

建立專案資料夾，設定 git

    mkdir php-unit-example
    
    cd php-unit-example
    
    git init
    
    git remote add origin git@github.com:littlebookboy/php-unit-example.git
    
    mkdir src
    
    mkdir tests


composer.json

    composer init

    Welcome to the Composer config generator
    
    This command will guide you through creating your composer.json config.
    
    Package name (<vendor>/<name>) [gene/php-unit-example]:
    Description []:
    Author [gene <gene@js-tech.tw>, n to skip]:
    Minimum Stability []:
    Package Type (e.g. library, project, metapackage, composer-plugin) []: project
    License []: MIT
    
    Define your dependencies.
    
    Would you like to define your dependencies (require) interactively [yes]? no
    Would you like to define your dev dependencies (require-dev) interactively [yes]? no
    
    {
        "name": "gene/php-unit-example",
        "type": "project",
        "license": "MIT",
        "authors": [
            {
                "name": "gene",
                "email": "gene@js-tech.tw"
            }
        ]
    }
    
    Do you confirm generation [yes]?
    Would you like the vendor directory added to your .gitignore [yes]?

update composer.json

    {
        "name": "gene/php-unit-example",
        "type": "project",
        "require": {
            "php": ">=7.0"
        },
        "require-dev": {
            "phpunit/phpunit": "^7.1"
        },
        "license": "MIT",
        "authors": [
            {
                "name": "gene",
                "email": "gene@js-tech.tw"
            }
        ],
        "autoload": {
            "psr-4": {
                "PHPUnit\\Example\\Tests\\": "src/"
            }
        },
        "autoload-dev": {
            "psr-4": {
                "PHPUnit\\Example\\Tests\\": "tests/"
            }
        }
    }
  
composer package install
    
    composer install

php storm set directories

![image 01](https://farm1.staticflickr.com/899/26508935817_aa60a5d2d1_o.png)
![image 02](https://farm1.staticflickr.com/801/26508935697_c16b3ee621_o.png)
![image 03](https://farm1.staticflickr.com/797/39570136360_3db7c0fa18_o.png)
![image 04](https://farm1.staticflickr.com/864/26508935637_e21f99d833_o.png)

make a test case

BaseTestCase.php

    <?php
    
    namespace PHPUnit\Example\Tests;
    
    use PHPUnit\Framework\TestCase;
    
    class BaseTestCase extends TestCase
    {
        /**
         * 建構式
         */
        public function setUp()
        {
            parent::setUp();
        }
    
        /**
         * 解構式
         */
        protected function tearDown()
        {
            parent::tearDown();
        }
    }

ExampleTest.php

    <?php
    
    namespace PHPUnit\Example\Tests;
    
    class ExampleTest extends BaseTestCase
    {
        /**
         * 建構式
         */
        public function setUp()
        {
            parent::setUp();
        }
    
        /**
         * 解構式
         */
        protected function tearDown()
        {
            parent::tearDown();
        }
    
        /**
         * A basic test example.
         *
         * @return void
         */
        public function testBasicTest()
        {
            $this->assertTrue(true);
        }
    }
