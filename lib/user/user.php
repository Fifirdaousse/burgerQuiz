<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/db.php');

/** Bibliothèque de fonctions dédiées aux Utilisateurs. */
class LibUser
{
    /** Fournit une fonction de log. */
    // static function log(): Logger
    // {
    //     return Log::getLog(__CLASS__);
    // }
    
    /**
     * Sélectionne tous les Utilisateurs et les ordonne par leur email, de A à Z.
     * 
     * @return array Tableau de tableaux associatifs des Utilisateurs.
     */
    static function readAllUser()
    {
        // Prépare la requête
        $query = 'SELECT USER.id, USER.nom, USER.prenom, USER.email, score.score, R.nom AS role';
        $query .= ' FROM utilisateur AS USER';
        $query .= ' JOIN score ON score.idUser = USER.id';
        $query .= ' LEFT JOIN role AS R ON USER.idRole = R.id';
        $query .= ' ORDER BY USER.nom';
        $stmt = LibDb::getPDO()->prepare($query);
    
        // Exécute la requête
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    /**
     * Cherche un Utilisateur d'après son email et son mot de passe.
     * NOTE Ajoute les informations du Rôle dans le résultat.
     * 
     * @param string email Adresse email.
     * @param string password Mot de passe.
     * 
     * @return mixed L'Utilisateur avec ses informations de Rôle s'il existe, ou null.
     * 
     */
    static function find($email, $mdp)
    {
        // self::log()->info(__FUNCTION__, ['email' => $email, 'password' => $password]);

        // Prépare la requête
        $query = 'SELECT U.id, U.email, U.motDePasse, U.idRole';
        $query .= ' FROM utilisateur AS U';
        $query .= ' JOIN role AS R ON U.idRole = R.id';
        $query .= ' WHERE U.email = :email';
        $query .= ' AND U.motDePasse = :motDePasse';
        // self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':motDePasse', $mdp);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        // self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        // Quand le résultat vaut 'false', retourne une valeur 'null' (ou 'absence de valeur')
        // sinon, retourne l'Utilisateur identifié.
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result == false) {
            $result = null;
        }

        // self::log()->info(__FUNCTION__, ['result' => $result]);
        return $result;
    }

    /**
     * Obtient un Utilisateur d'après son identifiant.
     * 
     * @param int $id Identifiant de l'Utilisateur.
     * 
     * @return mixed Tableau associatif de l'Utilisateur s'il existe, ou 'null'.
     */
    static function get($idRole)
    {
        // self::log()->info(__FUNCTION__, ['id' => $id]);

        // Prépare la requête
        $query = 'SELECT U.id, U.email, U.motDePasse, U.idRole';
        $query .= ' FROM utilisateur AS U';
        $query .= ' JOIN role AS R ON U.id = U.id';
        $query .= ' WHERE U.idRole = :idRole';
        // self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':idRole', $idRole);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        // self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        // Quand le résultat vaut 'false', retourne une valeur 'null' (ou 'absence de valeur')
        // sinon, retourne l'Utilisateur identifié.
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            return null;
        }

        // self::log()->info(__FUNCTION__, ['result' => $result]);
        return $result;
    }

    /**
     * Crée un Utilisateur.
     * 
     * @param string $email Email.
     * @param string $password Mot de passe.
     * @param string $idRole Identifiant de Rôle.
     * 
     * @return bool 'true' en cas de succès.
     */
    // Créer un utilisateur
    static function createUser($nom, $prenom, $email, $mdp, $idRole)
    {

        // Prépare la requête
        $query = 'INSERT INTO utilisateur (nom, prenom, email, motDePasse, idRole) VALUES';
        $query .= ' (:nom, :prenom, :email, :motDePasse, :idRole)';

        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':motDePasse', $mdp);
        $stmt->bindParam(':idRole', $idRole); 
        
        // Exécute la requête
        $successOrFailure = $stmt->execute();

        return $successOrFailure;
    }

    /**
     * Liste les Rôles ordonnées par libellés, de A à Z.
     * 
     * @return array Tableau de tableaux associatifs des Rôles.
     */
    static function listRole()
    {
        // self::log()->info(__FUNCTION__);

        // Prépare la requête
        $query = 'SELECT ROL.id, ROL.code, ROL.label';
        $query .= ' FROM role ROL';
        $query .= ' ORDER BY ROL.label ASC';
        // self::log()->info(__FUNCTION__, ['query' => $query]);
        $stmt = LibDb::getPDO()->prepare($query);

        // Exécute la requête
        $successOrFailure = $stmt->execute();
        // self::log()->info(__FUNCTION__, ['Success (1) or Failure (0) ?' => $successOrFailure]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // self::log()->info(__FUNCTION__, ['result' => $result]);
        return $result;
    }


    // S'incrire
    static function signup($nom, $prenom, $email, $mdp)
    {
        // ID du rôle Membre
        $idRole = 20; 

        // mots de passe des utilisateurs ne sont pas stockés en clair dans la bdd (cf BCRYPT...)
        $hashMdp = password_hash($mdp, PASSWORD_BCRYPT);

        // Prépare la requête
        $query = 'INSERT INTO utilisateur (nom, prenom, email, motDePasse, idRole) VALUES';
        $query .= ' (:nom, :prenom, :email, :motDePasse, :idRole)';

        $stmt = LibDb::getPDO()->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':motDePasse', $hashMdp); // Stocke le hash du mot de passe
        $stmt->bindParam(':idRole', $idRole); 
        
        // Exécute la requête
        $successOrFailure = $stmt->execute();

        return $successOrFailure;
    }

}
