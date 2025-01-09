# Exercice 10 - Strategy

## Contexte

Imaginez que vous construisiez un système de paiement en ligne pour une plateforme de commerce électronique. Les clients veulent avoir la possibilité de choisir parmi plusieurs méthodes de paiement :

- Carte de crédit : Traiter le paiement par l'intermédiaire d'une passerelle pour cartes de crédit.
- PayPal : Utiliser leur compte PayPal pour effectuer le paiement.
- Crypto-monnaie : Payez en utilisant Bitcoin, Ethereum ou d'autres monnaies numériques.

Chaque méthode de paiement a son propre processus de traitement des transactions, mais en tant que développeur, vous avez besoin d'un système flexible et facilement extensible. L'ajout de nouvelles méthodes de paiement ne doit pas perturber le code existant.

## Sujet

Implementez les classes et interfaces `PaymentProcessor` et `PaymentMethod` avec au moins trois stratégies : `CreditCardPayment`, `PayPalPayment` et `CryptoPayment`.
