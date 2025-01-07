# Exercice 5 - Decorator

## Contexte

Vous travaillez pour un Coffee Shop qui souhaite créer sa propre caisse enregistreuse. Vous souhaitez mettre en place la vente de boissons chaudes auxquelles les clients peuvent rajouter des suppléments comme du lait, de lait végétal, de la crème chantilly ou un sirop.

## Sujet

Implémenter un système de vente de boisson chaude avec les éxigences suivantes :

### Exigences

Les boissons (`Beverage`) sont caractérisés par un prix et une description.

Vente de plusieurs boissons chaudes "basiques" :
- `Expresso` : prix de base 2,00 €
- `Americano` : prix de base 2,50 €

Les suppléments (`BeverageDecorator`) doivent permettre de venir étoffer une boisson.

Vente de plusieurs suppléments :
- `Milk` : + 0,50 €
- `VegetalMilk` : + 1,00 €
- `WhipedCream` : + 1,00 €
- `Syrup` : + 0,75 €

Vous devrez créer et implémenter toutes les interfaces et classes permettant de répondre au besoin, en utilisant le design pattern Decorator.

Faites en sorte de modifier la description et le prix des produits décorés en fonction de ce qui a été ajouté.
