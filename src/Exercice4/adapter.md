# Exercice 4 - Adapter

## Contexte

Votre entreprise de commerce électronique utilise actuellement un système de paiement ancien, mais doit s'intégrer à des fournisseurs de paiement modernes. Au lieu de réécrire l'intégralité du code de traitement des paiements, vous devez créer des adaptateurs pour les nouvelles passerelles de paiement tout en conservant l'interface existante.

## Sujet

Créez des adaptateurs pour deux passerelles de paiement modernes (Stripe et PayPal) qui fonctionnent avec votre ancien système de traitement des paiements.

### Pré-requis

Maintenir l'interface existante `LegacyPaymentProcessor`.

Créer des adaptateurs pour :
- Passerelle de paiement Stripe
- Passerelle de paiement PayPal

Prise en charge de différentes méthodes de paiement :
- Carte de crédit
- Portefeuille numérique
- Virement bancaire

### Règles métier

#### Traitement des paiements
- Doit valider le montant du paiement (> 0)
- Doit fournir l'identifiant de la transaction
- Doit gérer la conversion des devises
- Doit fournir le statut du paiement

#### Traitement des erreurs
- Montant invalide
- Paiements refusés
- Erreurs de réseau
- Informations d'identification non valides
