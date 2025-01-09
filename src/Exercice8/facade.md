# Exercice 8 - Facade

## Contexte

Vous travaillez pour un groupe de météo qui souhaite mettre en place un assitant virtuel aidant ses utilisateurs au travers de simple questions telles que "Quel temps fait-il aujourd'hui ?", "Devrais-je prendre un parapluie pour sortir ?", "Est-ce une bonne journée pour pique-niquer ?". Vous devrez, au travers d'un raisonnement complexe,  faire en sorte de répondre aux questions posées simplement.

## Sujet

Créez une classe `WeatherAssistantFacade` qui permettra de répondre aux questions en vous basant sur les données relevées par les appareils de mesure.

### Méthodes requises

- `getTodaysSummary()`: Donne un aperçu des conditions actuelles
- `shouldTakeUmbrella()`: Retourne simplement oui ou non en fonction des conditions actuelles
- `getPicnicRecommendation()`: Donnes une recommandation en fonction des conditions météorologiques

### Contraintes métier

- `getTodaysSummary` me permet de connaître la température, l'humidité, le vent et les précipitations s'il y'en a actuellement ou prévues.
- `shouldTakeUmbrella` me permet de savoir si je dois prendre un parapluie en fonction des précipitations actuelles.
- `getPicnicRecommendation` me permet de savoir si la journée va être bonne et si je peux sortir pique-niquer. Vous devrez prendre en compte la température (21° <= x <= 32°), les chances de pluie (probabilité < 10%), la vitesse du vent (< 15 km/h) et l'humidité (40% <= x <= 70%).
