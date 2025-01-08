# Exercice 7 - Bridge

## Contexte

Imagine que tu développes une API pour une application de gestion de stock et que cette API peut-être utilisée par le plus grand nombre. Tu souhaites donc mettre tes entités à disposition sous plusieurs formats : JSON et XML.


## Sujet

Considérant que tu as deux entités sur ton site (à créer), `User` (`id`, `name`, `email`) et `Product` (`id`, `name`, `price`) elles doivent pouvoir être convertie en tableau grâce à une méthode `toArray`, qui retournera les propriétés des classes dans un tableau.

Tu devras mettre en œuvre le design pattern **Bridge** grâce aux classes et interfaces déjà présentes, `DataRenderer` étant l'abstraction où `FormatterInterface` est l'implémentation.

Tu devras donc créer un `Renderer` pour tes deux entités `Product` et `User` et un `Formatter` pour chacun des formats pris en compte (JSON et XML).

## Hint

> 💡 Trouves un solution pour transformer un tableau PHP en XML
