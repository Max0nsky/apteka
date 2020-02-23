<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Курсовая работа по дисциплине "СУБД"</h1>
    <br>
</p>

Экспорт базы данных:

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 23 2020 г., 19:24
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pharmacy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `analogues`
--

CREATE TABLE `analogues` (
  `drug_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `analogue` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `analogues`
--

INSERT INTO `analogues` (`drug_name`, `analogue`) VALUES
('Но-шпа', 'Дротаверин');

-- --------------------------------------------------------

--
-- Структура таблицы `check_store`
--

CREATE TABLE `check_store` (
  `num` int(11) NOT NULL,
  `date_check` date NOT NULL,
  `count_start` int(11) NOT NULL,
  `count_finish` int(11) NOT NULL,
  `name_worker` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `check_store`
--

INSERT INTO `check_store` (`num`, `date_check`, `count_start`, `count_finish`, `name_worker`) VALUES
(1, '2019-11-17', 18, 17, 'Медведев'),
(1, '2019-11-27', 32, 32, 'Медведев'),
(1, '2020-01-17', 32, 31, 'Проверков'),
(2, '2019-11-17', 25, 25, 'Зайцев'),
(2, '2019-11-27', 40, 40, 'Зайцев');

-- --------------------------------------------------------

--
-- Структура таблицы `medicines`
--

CREATE TABLE `medicines` (
  `drug_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `medicines`
--

INSERT INTO `medicines` (`drug_name`, `description`, `price`, `img`) VALUES
('Алфавит', 'Одни из наиболее известных и популярных витаминных комплексов. Их представлено много комбинаций для разных возрастов, для разных целей (профилактическая, лечебная и другое), для некоторых видов деятельности (спорт, учеба), для косметических целей. ', 415, 'Алфавит.jpg'),
('Амброксол', 'Муколитическое и отхаркивающее средство, является активным N-деметилированным метаболитом бромгексина. Обладает секретомоторным, секретолитическим и отхаркивающим действием. Стимулирует серозные клетки слизистой оболочки бронхов, повышает двигательную активность мерцательного эпителия путем воздействия на пневмоциты 2 типа в альвеолах и клетки Клара в бронхиолах, усиливает образование эндогенного сурфактанта - поверхностно-активного вещества, обеспечивающего скольжение бронхиального секрета в просвете дыхательных путей. ', 150, 'Амброксол.jpg'),
('Антигриппин', 'Препарат для симптоматической терапии острых респираторных заболеваний\r\nКомбинированный препарат. Парацетамол обладает анальгезирующим и жаропонижающим действием; устраняет головную и другие виды боли, снижает повышенную температуру. Хлорфенамин - блокатор гистаминовых Н1-рецепторов, обладает противоаллергическим действием, облегчает дыхание через нос, снижает чувство заложенности носа, чихание, слезотечение, зуд и покраснение глаз. Аскорбиновая кислота (витамин С) участвует в регулировании окислительно-восстановительных процессов, углеводного обмена, повышает сопротивляемость организма.', 285, 'Антигриппин.jpg'),
('Аспирин', 'Таблетки шипучие белого цвета, круглые, плоские, скошенные к краю, с оттиском в виде фирменного знака (\"байеровский\" крест) с одной стороны, другая сторона гладкая.Ацетилсалициловая кислота оказывает анальгезирующее, жаропонижающее, противовоспалительное действие, связанное с подавлением ЦОГ-1 и ЦОГ-2, регулирующих синтез простагландинов; тормозит агрегацию тромбоцитов.', 300, 'Аспирин.jpg'),
('Витамины группы Б', 'Витамины группы B участвуют непосредственно в поддержании нормального функционирования нервной системы, головного мозга, сердца и сосудов, органов пищеварения. Кроме того, витамины В улучшают защитные функции организма от агрессивной внешней среды (ультрафиолетовые лучи, инфекция и др.), поддерживают в хорошем и здоровом состоянии внешний вид человека – кожу, волосы, ногти. Предупреждают преждевременное старение человека и многое другое.', 190, 'Витамины_группы_Б.jpg'),
('Дротаверин', 'Спазмолитик миотропного действия. По химической структуре и фармакологическим свойствам близок к папаверину, однако превосходит его по эффективности и продолжительности действия. Снижает тонус гладких мышц внутренних органов, снижает их двигательную активность. ', 70, 'Дротаверин.jpg'),
('Но-шпа', 'Миотропный спазмолитик\r\nСпазмолитическое средство, производное изохинолина. Оказывает мощное спазмолитическое действие на гладкую мускулатуру за счет ингибирования фермента ФДЭ 4 типа (ФДЭ4). Ингибирование ФДЭ4 приводит к повышению концентрации цАМФ, инактивации киназы легкой цепи миозина, что в дальнейшем вызывает расслабление гладкой мускулатуры. ', 220, 'Но-шпа.jpg'),
('Теравит', 'Комбинированный препарат, содержащий витамины, минералы и микроэлементы; действие обусловлено свойствами, входящими в его состав ингредиентами.\r\nПоказания: профилактика и лечение гипо- и авитаминозов, недостатка минеральных веществ у взрослых, при несбалансированном или неполноценном питании, в период выздоровления после перенесенных заболеваний.', 120, 'Теравит.jpg'),
('Терафлю', 'Комбинированный препарат, действие которого обусловлено входящими в его состав компонентами. Оказывает жаропонижающее, анальгезирующее, сосудосуживающее действие, устраняет симптомы \"простуды\". ', 422, 'Терафлю.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `price_story`
--

CREATE TABLE `price_story` (
  `drug_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_price` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `price_story`
--

INSERT INTO `price_story` (`drug_name`, `date_price`, `price`) VALUES
('Алфавит', '2019-11-27', 410),
('Амброксол', '2019-11-17', 150),
('Антигриппин', '2019-11-17', 285),
('Аспирин', '2019-11-17', 300),
('Витамины группы Б', '2019-11-27', 190),
('Дротаверин', '2019-11-17', 70),
('Но-шпа', '2019-11-17', 220),
('Теравит', '2019-11-27', 120),
('Терафлю', '2019-11-17', 420);

-- --------------------------------------------------------

--
-- Структура таблицы `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drug_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `num_store` int(11) NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_buy` date NOT NULL,
  `condition_purchase` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `purchases`
--

INSERT INTO `purchases` (`id`, `firstname`, `surname`, `patronymic`, `drug_name`, `quantity`, `num_store`, `phone`, `date_buy`, `condition_purchase`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', 'Амброксол', 1, 1, '89121231212', '2019-11-17', 'Продано'),
(2, 'Петр', 'Петров', 'Петрович', 'Антигриппин', 1, 2, '88998886611', '2019-11-24', 'Продано'),
(3, 'Дмитрий', 'Бобров', 'Олегович', 'Алфавит', 2, 1, '89232342323', '2019-12-08', 'Продано'),
(4, 'Иван', 'Иванов', 'Иванович', 'Но-шпа', 1, 1, '8123456789', '2020-01-16', 'Продано'),
(5, 'Дмитрий', 'Бобров', 'Олегович', 'Антигриппин', 2, 1, '89232342323', '2020-02-15', 'Продано'),
(6, 'Петр', 'Петров', 'Петрович', 'Амброксол', 1, 1, '88998886611', '2020-02-15', 'Продано');

-- --------------------------------------------------------

--
-- Структура таблицы `store`
--

CREATE TABLE `store` (
  `num` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `store`
--

INSERT INTO `store` (`num`, `address`, `phone`) VALUES
(1, 'г. Воронеж, ул. Победы, д. 133', '89031231223'),
(2, 'г. Воронеж, ул. Пушкина, д. 7', '89031231222');

-- --------------------------------------------------------

--
-- Структура таблицы `store_condition`
--

CREATE TABLE `store_condition` (
  `num` int(11) NOT NULL,
  `drug_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `store_condition`
--

INSERT INTO `store_condition` (`num`, `drug_name`, `quantity`) VALUES
(1, 'Алфавит', 6),
(1, 'Амброксол', 3),
(1, 'Антигриппин', 3),
(1, 'Аспирин', 4),
(1, 'Витамины группы Б', 5),
(1, 'Дротаверин', 3),
(1, 'Но-шпа', 3),
(1, 'Теравит', 5),
(1, 'Терафлю', 5),
(2, 'Алфавит', 5),
(2, 'Амброксол', 2),
(2, 'Антигриппин', 5),
(2, 'Аспирин', 4),
(2, 'Витамины группы Б', 5),
(2, 'Дротаверин', 1),
(2, 'Но-шпа', 4),
(2, 'Теравит', 5),
(2, 'Терафлю', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`) VALUES
(1, 'admin', '$2y$13$9kSZGSwMzWs1XS8rV8mf0.CfIxCBWKGHmEk4GrtlLZP1PXvohg/5a', 'YAnjG-mKZATeEJsxK3Q1Rg1EkA0FOWMo');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `analogues`
--
ALTER TABLE `analogues`
  ADD PRIMARY KEY (`drug_name`),
  ADD KEY `analogue` (`analogue`);

--
-- Индексы таблицы `check_store`
--
ALTER TABLE `check_store`
  ADD PRIMARY KEY (`num`,`date_check`);

--
-- Индексы таблицы `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`drug_name`);

--
-- Индексы таблицы `price_story`
--
ALTER TABLE `price_story`
  ADD PRIMARY KEY (`drug_name`,`date_price`);

--
-- Индексы таблицы `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`num`);

--
-- Индексы таблицы `store_condition`
--
ALTER TABLE `store_condition`
  ADD PRIMARY KEY (`num`,`drug_name`),
  ADD KEY `drug_name` (`drug_name`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `analogues`
--
ALTER TABLE `analogues`
  ADD CONSTRAINT `analogues_ibfk_1` FOREIGN KEY (`drug_name`) REFERENCES `medicines` (`drug_name`),
  ADD CONSTRAINT `analogues_ibfk_2` FOREIGN KEY (`analogue`) REFERENCES `medicines` (`drug_name`);

--
-- Ограничения внешнего ключа таблицы `check_store`
--
ALTER TABLE `check_store`
  ADD CONSTRAINT `check_store_ibfk_1` FOREIGN KEY (`num`) REFERENCES `store` (`num`);

--
-- Ограничения внешнего ключа таблицы `price_story`
--
ALTER TABLE `price_story`
  ADD CONSTRAINT `price_story_ibfk_1` FOREIGN KEY (`drug_name`) REFERENCES `medicines` (`drug_name`);

--
-- Ограничения внешнего ключа таблицы `store_condition`
--
ALTER TABLE `store_condition`
  ADD CONSTRAINT `store_condition_ibfk_1` FOREIGN KEY (`num`) REFERENCES `store` (`num`),
  ADD CONSTRAINT `store_condition_ibfk_2` FOREIGN KEY (`drug_name`) REFERENCES `medicines` (`drug_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


------------
Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


### Install with Docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist
    
Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    
    
Start the container

    docker-compose up -d
    
You can then access the application through the following URL:

    http://127.0.0.1:8000

**NOTES:** 
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](http://codeception.com/).
By default there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser. 


### Running  acceptance tests

To execute acceptance tests do the following:  

1. Rename `tests/acceptance.suite.yml.example` to `tests/acceptance.suite.yml` to enable suite configuration

2. Replace `codeception/base` package in `composer.json` with `codeception/codeception` to install full featured
   version of Codeception

3. Update dependencies with Composer 

    ```
    composer update  
    ```

4. Download [Selenium Server](http://www.seleniumhq.org/download/) and launch it:

    ```
    java -jar ~/selenium-server-standalone-x.xx.x.jar
    ```

    In case of using Selenium Server 3.0 with Firefox browser since v48 or Google Chrome since v53 you must download [GeckoDriver](https://github.com/mozilla/geckodriver/releases) or [ChromeDriver](https://sites.google.com/a/chromium.org/chromedriver/downloads) and launch Selenium with it:

    ```
    # for Firefox
    java -jar -Dwebdriver.gecko.driver=~/geckodriver ~/selenium-server-standalone-3.xx.x.jar
    
    # for Google Chrome
    java -jar -Dwebdriver.chrome.driver=~/chromedriver ~/selenium-server-standalone-3.xx.x.jar
    ``` 
    
    As an alternative way you can use already configured Docker container with older versions of Selenium and Firefox:
    
    ```
    docker run --net=host selenium/standalone-firefox:2.53.0
    ```

5. (Optional) Create `yii2_basic_tests` database and update it by applying migrations if you have them.

   ```
   tests/bin/yii migrate
   ```

   The database configuration can be found at `config/test_db.php`.


6. Start web server:

    ```
    tests/bin/yii serve
    ```

7. Now you can run all available tests

   ```
   # run all available tests
   vendor/bin/codecept run

   # run acceptance tests
   vendor/bin/codecept run acceptance

   # run only unit and functional tests
   vendor/bin/codecept run unit,functional
   ```

### Code coverage support

By default, code coverage is disabled in `codeception.yml` configuration file, you should uncomment needed rows to be able
to collect code coverage. You can run your tests and collect coverage with the following command:

```
#collect coverage for all tests
vendor/bin/codecept run -- --coverage-html --coverage-xml

#collect coverage only for unit tests
vendor/bin/codecept run unit -- --coverage-html --coverage-xml

#collect coverage for unit and functional tests
vendor/bin/codecept run functional,unit -- --coverage-html --coverage-xml
```

You can see code coverage output under the `tests/_output` directory.
"# apteka" 
