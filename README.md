# Design Pattern

## Installation

1. Créez un fork du répo
2. Installez votre répo en local (celui que vous venez de fork)
3. Installez les dépendances `docker run --rm --interactive --tty --volume $PWD:/app composer install`
4. Faites les exercices, pensez à lancer la commande `./vendor/bin/phpunit --testsuite ex<numero>` pour vérifier votre code (ex: `./vendor/bin/phpunit --testsuite ex1` permet de lancer les tests de l'exercice 1) ou via docker `docker run --rm --interactive --tty --volume $PWD:/app --workdir /app php:8.2-cli vendor/bin/phpunit --testsuite ex1`

## Envoi du résultat

Depuis votre répo, cliquez sur le bouton `Contribuer` et créez une pull request.

Les tests unitaires se lanceront automatiquement.
