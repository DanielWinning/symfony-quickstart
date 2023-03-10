# Quickstart Symfony Project

A Symfony setup with some basics taken care of, allowing for quicker development.

- Added route annotation support inside `config/routes/attributes.yaml`
- Included Twig and Profiler
- Included Encore
- Added SASS and Typescript support
- Added ORM
- Added Maker
- Added Security
- Added User Entity + Repository and setup SQL (not using Doctrine migrations)
- Added ORM fixtures and Foundry Factories
- Added Tailwind

## Instructions
```
composer create-project dannyxcii/symfony-quickstart my-project
```

Change database credentials and admin credentials (for fixtures) inside `.env`.

```
composer install
bin/console app:regenerate-app-secret
npm install && npm run build
```

Check, update to your requirements and run `sql/setup.sql`.

```
bin/console doctrine:fixtures:load
```