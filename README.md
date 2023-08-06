# Quickstart Symfony Project

A Symfony setup with some basics taken care of, allowing for quicker development.

- Route annotation support
- Twig and Profiler, Encore
- SASS and Typescript support
- Tailwind
- ORM Bundle
- Maker Bundle
- Security
- Forms
- User Entity + Repository and setup SQL (not using Doctrine migrations)
- ORM fixtures and Foundry Factories

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