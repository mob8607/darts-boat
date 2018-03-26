# Installation

## 1 Requirements

- PHP 7.1

## 2 Instructions

1. Clone the project.
2. Run `composer install`.

## 3 Create database

1. Run `bin/console doctrine:database:create` to create your configured database
2. Run `bin/console doctrine:schema:update --force` to create the schema for the database
3. Run `bin/console doctrine:migrations:version --add --all latest` to add all migrations
