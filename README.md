# Bloogy

Historique des versions



V.O.4
Design Patten : MVC
Programmation Orienté Objet
Intégration de _NAMESPACE_
Refonte complète du code et restructuration de l'achitecture:

Modules => 
            - Post      -> Pour la gestion complète (création, rendu, édition, suppression ) de billet
            - Comment   -> Pour la gestion complète de comentaire
            - Category  -> Pour la gestion de catégorie d'article
            - user      -> Pour la gestion des utilisateurs


                                                _______________________________
                                                _______________________________
DOSSIER--> Public:
    Contient les dossiers CSS, JS, et librairie utilisé pour le rendu des vue coté client
    
    Fichier--> index.php:
        -> Défini le ROOT de l'application
        -> Charge l'aapplication via le fichier /App/App.php
        -> Défini la variable $page et la méthode d'examen de l'url ou 'p' représente $page -> activé lors d'un _GET ou 'p' sera la      page a chargée via les paramètre passer dans l'url sinon on arrive sur la page par défaut post.index.php (affichage des      billets sous forme de liste, accueil par défaut de l'application)
        -> Dispather : Celui-ci permet de définir les controleurs à appeler en fonction que l'on soit sur l'espace d'administartion      (Backend) ou sur l'espace utilisateur (Frontend)  -> Location -> Class to call -> method to call
        
        
DOSSIER-> App :

    Dossier --> Controller: Contient les controlleurs DU FRONTEND des différents modules de l'application (App (l'application en elle même), Billet, Commentaire, Utilisateur...)
    
        Sous-Dossier --> Admin:
            Contient les controlleurs DU BACKEND des différentS modules de l'application (App (l'application en elle même), Billet, Commentaire, Utilisateur...)
            
                --> appController -> use \Core\Auth\DBAuth  pour l'autentification utilisateur à la BDD et l'accès à l'espace Admin et ses fonctionnalitées
    
    Dossier --> Entity (model -> appel des données):
        Extends Core/Entity/Entity
        Getters des modules de l'application 
    
    Dossier --> Table (model -> manipulation des données) :
        Extends Core/Table/Table
        Défini les modules additionnels (billet, comentaires...) de l'applicationn sous forme forme d'objet et intégre les méthodes propre à chacun.
    
    Dossier --> Views:
        Contient les vues et templates de l'application et de ses modules, les Vues Admin étant dans un Sous-Dossier Admin et les Templates généraux de l'application dans un Sous-Dossier Templates
    
    Fichier --> App:
        use Core\Config;
        use Core\Database\MysqlDatabase;
        Class App: Initialise l'application et garantie les opérations principales comme:
            => Créer l'instance de la Database $db et de la Table $table, les donnnées des variable étant fourni via le dossier _ROOT_ Config/config.php sous la forme d'un tableau de donnée (array)
            => Inscris au registre les 'autoloaders'
            => initialise la session => start session
        
        
    Fichier --> Autoloader:
        Fichier d'automatisation du chargement des Class du Namespace App via la méthode spl_autoload_register()
        
                                                _______________________________
        
DOSSIER-> Config : Contient les paramètre de connexion à la base de donnée sous forme de tableau de donnée (array)

                                                _______________________________

DOSSIER-> Core : Contient le coeur de l'application Bloogy à savoir toutes les Class de base de celle-ci

    Dossier --> Auth:
        Fichier des paramètre d'autentification à la base de donnée MySql pour le démarage de Session utilisateur

    Dossier --> Controller:
        Class mère des controlleurs de l'application, fourni les définitions de base pour le chargement des paths des vues et des templates associés, inclu des fonction gérant les actions interdite (forbidden acces - error 403) et les erreur 404

    Dossier --> Database:
        Fichier des modèles de connexion à la base de donnée, de traitement des requettes MySql sous forme de requête préparé
        Class mère Database permettant d'intégrer d'autre type de gestionnaire de base de donnée
        Class fille MysqlDatabase : permet la connexion à la bdd MySql
        
    Dossier --> Entity (Model)
        Class mère des Entity de l'application (récupère les Data du Model, celle-ci étant manipulé par Table): Utilisation de la méthode magique __GET pour modéliser la récupération des données (chaque classe fille héritant de celle-ci disposant de ses propres getters)
        
    Dossier --> HTML
        Form: Class destiné à la génération automatique e formulaire
        BootstrapForm/ étend la class Form afin d'insérer le framework bootstrap pour le rendu des vues des formulaires
    
    Dossier --> Table (model):
        Class mère des Tables de l'appliction (Model -> manipulation des données) : Modélise les fonctions CRUD pour la mainipulation de la base de donnée
    
    --> Fichier Autoloader:
        Autoloader -> Fichier de chargement automatique des Class du Core via la methode "spl_autoload_register"
    
    --> Fichier Config
        Fichier de configuration des paramètres de connexion de l'application
        
                                                _______________________________
                                                _______________________________

                                                _______________________________
                                                _______________________________

V.O.3
Nouveau design pattern MVC
Restructuration des dossier et du code selon les directives du design pattern MVC
Intégration de nouveaux paramètres de sécurité : vérification des données issus de $POST et $GET
                                                _______________________________
                                                _______________________________

V.O.2
Code monolithique
Intégration de l'interface d'administration et du module de conexxion à la base de donnéee. On peutdésormais utilisé les fonction de CRUD sur les Billets.
                                                _______________________________
                                                _______________________________
V.O.1
Code Monolithique
Définition de la charte graphique et des fonctionnalités première. Affichage Billets et commentaires
                                                _______________________________
                                                _______________________________
                                                
                                                            BLOOGY