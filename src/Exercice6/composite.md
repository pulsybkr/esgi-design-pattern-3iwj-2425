# Exercice 6 - Composite

## Contexte

Vous êtes chargé de concevoir un système permettant de représenter la hiérarchie d'une organisation. L'organisation se compose de différents types d'entités, notamment des employés et des départements. Chaque employé possède un identifiant unique, un nom et un titre de poste. Les départements ont un identifiant unique, un nom et peuvent contenir des employés ou d'autres sous-départements.

## Sujet

1. Créez une interface `OrganizationUnit` qui déclare des méthodes communes pour les employés et les départements, telles que `displayDetails`.

2. Implémentez des classes concrètes pour deux types d'entités : `Employee` et `Department`. Ces entités doivent implémenter l'interface `OrganizationUnit`.

3. La classe `Employee` doit avoir des attributs pour l'ID (nombre aléatoire), le nom et l'intitulé du poste. La classe `Department` doit avoir des attributs pour l'ID (nombre aléatoire), le nom et une liste d'instances `OrganizationUnit` représentant soit des employés, soit des sous-départements.
On doit pouvoir ajouter des instances d'`OrganizationUnit` grâce à une méthode `addOrganizationUnit` ou en supprimer via `removeOrganizationUnit`

4. Implémentez une méthode `displayDetails` dans chaque classe pour afficher les détails de l'entité. Pour les employés, elle doit afficher l'ID, le nom et l'intitulé du poste. Pour les départements, elle doit afficher l'identifiant, le nom et une liste de détails pour les entités contenues (employés ou sous-départements).

5. Créez une classe `Organization` qui contient une liste d'instances `OrganizationUnit` représentant les entités de premier niveau de l'organisation.
On doit pouvoir ajouter des instances d'`OrganizationUnit` grâce à une méthode `addOrganizationUnit` ou en supprimer via `removeOrganizationUnit`

6. Implémentez une méthode `displayDetails` dans la classe `Organization` pour afficher les détails de l'ensemble de l'organisation, y compris tous les employés et les départements imbriqués.

## Structure du résulat d'affichage attendu

```
Organization name : Toto Corp
Organization details :

    Department ID : 1231
    Department name : Ressources humaines
    Department details :

        Employee ID : 2138
        Employee name : Titi
        Employee job title : Directrice des ressources humaines

        Employee ID : 3434
        Employee name : Vovo
        Employee job title : Employé en ressources humaines

    Department ID : 2103
    Department name : Informatique
    Department details :

        Employee ID : 1238
        Employee name : Leaz
        Employee job title : Développeuse fullstack senior

        Employee ID : 9873
        Employee name : Toto
        Employee job title : Développeur backend junior
```
