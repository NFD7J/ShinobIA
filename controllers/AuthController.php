<?php
namespace App\controllers;

use App\entities\User;
use App\models\AuthModel;

class AuthController extends Controller
{
    public function login()
    {
        if (isset($_SESSION["user"])) {
            header("location: index.php");
            exit();
        }

        if (isset($_POST["mail"]) && isset($_POST["password"])) {
            if (!empty($_POST["mail"]) && !empty($_POST["password"])) {
                $user = new User();
                $user->setEmail($_POST["mail"]);
                $user->setPassword($_POST["password"]);

                $authModel = new AuthModel();
                $result = $authModel->login($user);

                if ($result !== false) {
                    $_SESSION["user"] = [
                        "id" => $result->user_id,
                        "mail" => $result->mail,
                        "name" => $result->name,
                    ];
                    header("location: index.php?controller=home");
                    exit();
                } else {
                    $error = "Email ou mot de passe incorrect";
                }
            } else {
                $error = "Tous les champs doivent être remplis";
            }

            $this->render("auth/login", ["error" => $error, "title" => "Connexion"]);
        } else {
            $this->render('auth/login', ["title" => "Connexion"]);
        }
    }

    public function logout()
    {
        session_destroy();
        header("location: index.php");
        exit();
    }

    public function guestLogin()
    {
        if (isset($_SESSION["user"])) {
            header("location: index.php");
            exit();
        }

        if (isset($_POST["guest_name"])) {
            if (!empty($_POST["guest_name"])) {
                $guestName = htmlspecialchars(trim($_POST["guest_name"]), ENT_QUOTES, 'UTF-8');
                
                // Créer un nouvel utilisateur "guest" dans la BD
                $user = new User();
                $user->setEmail("guest_" . uniqid() . "@localhost");
                $user->setName($guestName);
                $user->setPassword(password_hash("GUEST_TEMP", PASSWORD_BCRYPT));
                
                $authModel = new AuthModel();
                $guestUserId = $authModel->createGuestUser($user);
                
                // Créer la session guest avec l'ID généré
                $_SESSION["user"] = [
                    "id" => $guestUserId,
                    "name" => $guestName,
                    "mail" => "guest@localhost",
                    "is_guest" => true
                ];
                
                header("location: index.php?controller=game&action=index");
                exit();
            } else {
                $error = "Veuillez entrer un pseudonyme";
                $this->render("auth/guestLogin", ["error" => $error ?? "", "title" => "Jouer en Guest"]);
            }
        } else {
            $this->render("auth/guestLogin", ["title" => "Jouer en Guest"]);
        }
    }

    public function register()
    {
        if (isset($_SESSION["user"])) {
            header("location: index.php");
            exit();
        }

        if (isset($_POST["name"]) && isset($_POST["mail"]) && isset($_POST["password"])) {
            if (!empty($_POST["name"]) && !empty($_POST["mail"]) && !empty($_POST["password"])) {
                $authModel = new AuthModel();

                // Vérifier si l'email existe déjà
                if ($authModel->emailExists($_POST["mail"])) {
                    $error = "Cet email est déjà utilisé";
                    $this->render("auth/register", ["error" => $error, "title" => "Inscription"]);
                    return;
                }

                $user = new User();
                $user->setName($_POST["name"]);
                $user->setEmail($_POST["mail"]);
                $user->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));

                $authModel->register($user);

                // Se connecter automatiquement
                $user->setPassword($_POST["password"]);
                $result = $authModel->login($user);

                if ($result) {
                    $_SESSION["user"] = [
                        "id" => $result->user_id,
                        "mail" => $result->mail,
                        "name" => $result->name
                    ];
                }

                header("location: index.php");
                exit();
            } else {
                $error = "Tous les champs doivent être remplis";
                $this->render("auth/register", ["error" => $error, "title" => "Inscription"]);
            }
        } else {
            $this->render('auth/register', ["title" => "Inscription"]);
        }
    }
}
