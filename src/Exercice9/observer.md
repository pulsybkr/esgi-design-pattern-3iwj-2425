# Exercice 9 - Observer

## Contexte

Imaginez que vous construisiez un outil de suivi des cours de la bourse pour les passionnés de finance et les investisseurs ! Lorsqu'ils suivent le cours des actions, les utilisateurs souhaitent recevoir des mises à jour en temps réel sur leur appareil afin de pouvoir prendre des décisions rapides.

Par exemple, lorsque le cours de l'action d'une société change, vous pourriez vouloir :
- Envoyer une notification à une application mobile, indiquant le cours actualisé.
- Mettre à jour l'affichage sur un site web, afin que les utilisateurs voient la dernière valeur de l'action.
- Déclencher des alertes sur d'autres appareils connectés, comme les smartwatches ou les tableaux de bord de bureau.


## Sujet

Votre tâche consiste à mettre en œuvre le modèle d'observateur pour alimenter ce système de suivi du cours des actions. Vous allez créer une classe `StockMarket` qui suit le cours des actions dans une propriété `stockPrice` et notifie plusieurs observateurs comme `MobileApp` et `WebApp` lorsque le cours change.
