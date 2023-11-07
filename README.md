# Quickstart Symfony Project

<div>
<!-- Version Badge -->
<img src="https://img.shields.io/badge/Version-0.2.2-blue" alt="Version 0.2.3">
<!-- PHP Coverage Badge -->
<img src="https://img.shields.io/badge/PHP Coverage-11.71%25-red" alt="PHP Coverage 11.71%">
</div>

A heavily opinionated, custom Symfony setup with some basics taken care of, allowing for quicker development.

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
- Unit Testing: PHPUnit

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