# Exercice 3 - Builder

## Contexte

Vous travaillez pour une pizzeria qui a besoin d'un système flexible pour gérer des commandes de pizzas complexes. Chaque pizza peut être personnalisée à plusieurs niveaux : taille, type de croûte, sauce, types de fromage, garnitures et instructions de cuisson.

## Sujet

Implémenter un système de commande de pizzas avec les exigences suivantes :

### Exigences de base

Prise en charge de plusieurs attributs de pizza :

- Taille (`size`) (petite, moyenne, grande) (`small`, `medium`, `large`)
- Croûte (`crust`) (fine, épaisse, normale) (`thin`, `thick`, `regular`)
- Sauce (`sauce`) (tomate, barbecue, blanche) (`tomato`, `bbq`, `white`)
- Fromage (`cheese`) (Mozzarella, Cheddar, Mixte) (`mozzarella`, `cheddar`, `mixed`)
- Garnitures (`toppings`) (multiples, soyez inventif !)
- Instructions de cuisson (`cookingInstructions`) (Bien cuit, Normal, Léger) (`well done`, `normal`, `light`)

Implémenter un pizzaiolo qui peut créer :

- Pizza Margherita
- Pizza Pepperoni
- Pizza végétarienne
- Pizza personnalisée

## Contraintes métier

Validation de la pizza :

- Doit contenir au moins un type de fromage
- Maximum de 8 garnitures
- La taille est obligatoire
- Le type de croûte est obligatoire

Pizzas prédéfinies :

- Margherita : Sauce tomate, Mozzarella
- Pepperoni : Sauce tomate, Mozzarella, Pepperoni
- Végétarienne : Sauce tomate, fromage mixte, légumes assortis

## Contraintes techniques

- Vous devrez prendre en charge l'enchaînement des méthodes pour la création de pizzas
- Prenez en charge la valeur `null` pour les composants optionnels
- Certains ingrédients peuvent être ajoutés plusieurs fois, pensez dans ces cas là à prevoir un tableau
