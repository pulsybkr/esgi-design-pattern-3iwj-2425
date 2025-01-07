# Exercice 1 - Factory Method

## Contexte

Vous développez une application permettant de construire différents types de véhicules avec des propriétés différentes.

## Sujet

### 1.

Modifiez la classe `Car` en ajoutant une propriété public `speed` de type `float`. La vitesse initiale d'une voiture est de 0 m/s.

Ajoutez une méthode `accelerate` qui permet de faire avancer le véhicule. La voiture accélère de 3,5 m/s, la vitesse de la voiture doit donc augmenter de 3,5 m/s à chaque fois que la méthode `accelerate` est appelée.

Ajoutez une méthode `breaks` qui permet de faire freiner le véhicule. La voiture freine de 5 m/s, la vitesse de la voiture doit donc diminuer de 5 m/s à chaque fois que la méthode `breaks` est appelée. La vitesse ne peut pas être négative.

### 2.

Créez une interface `Vehicule` qui définit une méthode public `accelerate` qui devra retourner la vitesse actuelle du véhicule ainsi qu'une méthode public `breaks` qui devra aussi retourner la vitesse actuelle de véhicule.

Faites en sorte que votre classe `Car` implémente sans erreur l'interface `Vehicule`.

### 3.

Ajoutez une nouvelle classe `Truck`. Le camion a une vitesse initiale de 0 m/s, accélère de 1.75 m/s et freine de 2 m/s. La classe `Truck` doit implémenter la même interface que `Car` et doit fonctionner de la même manière.
