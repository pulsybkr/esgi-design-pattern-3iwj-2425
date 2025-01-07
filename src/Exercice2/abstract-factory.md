# Exercice 2 - Abstract Factory

## Contexte

Vous travaillez pour une société de commerce électronique qui expédie des produits dans le monde entier. L'entreprise a besoin d'un système d'expédition flexible qui puisse gérer différentes méthodes d'expédition (terrestre, aérienne, maritime) tout en conservant la logique d'expédition de base indépendante des implémentations d'expédition spécifiques.

## Sujet

Vous aurez à votre disposition des classes déjà créées sur lesquelles vous devrez vous appuyer pour réaliser cet exercice.

### 1.

Mettre en œuvre trois méthodes d'expédition :

- Expédition par voie terrestre (camions, livraison en 3 à 5 jours) appelée `GroundShipping`
- Expédition par voie aérienne (avions, livraison en 1 à 2 jours) appelée `AirShipping`
- Expédition par voie maritime (bateaux, livraison en 7 à 14 jours) appelée `SeaShipping`

Chaque méthode d'expédition doit permettre :

- le calcul des frais d'expédition en fonction du poids et de la distance
- le délai de livraison estimé
- le formattage du numéro de suivi en fonction de la méthode d'expédition (PREFIX-XXXXXX) avec les prefixs suivants : GRD, AIR ou SEA

Vous pouvez vous baser sur les règles métier suivantes :

### Règles métier

#### Expédition par voie terrestre
| Règle | Tarif |
|:--|--:|
| Tarif de base | 10 € |
| Coût par km | 0,5 € |
| Coût par kg | 1 € |

#### Expédition par voie aérienne
| Règle | Tarif |
|:--|--:|
| Tarif de base | 50 € |
| Coût par km | 2 € |
| Coût par kg | 3 € |

#### Transport maritime
| Règle | Tarif |
|:--|--:|
| Tarif de base | 30 € |
| Coût par km | 0,3 € |
| Coût par kg | 0,5 € |
