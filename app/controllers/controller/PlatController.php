<?php

namespace App\Controllers\Controller;

use DateTime;

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use App\controllers\base\WebController;
use App\Models\Classes\Plat;
use App\Models\Repositories\PlatModele;
use App\utils\Template;

class PlatController extends WebController
{
  private $platModele;
  function __construct()
  {
    $this->platModele = new PlatModele();
  }
  function liste($page = 0)
  {
    // Récupère les clients en base.
    $lesPlats = $this->platModele->liste(10, $page);

    return Template::render(
      "views/admin/plat/liste_plat.php",
      array("page" => $page, "plats" => $lesPlats),
      true,
    );
  }

  public function ajouter()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nom = trim($_POST['nom']);
      $prix = floatval($_POST['prix']);
      $description = trim($_POST['description']);
      $type = intval($_POST['type']);

      $error = "";
      $img = $_FILES['img'] ?? null;


      if (!empty($nom) && $prix > 0) {
        $plat = new Plat();
        $plat->setNom($nom);
        $plat->setPrix($prix);
        $plat->setImg(""); // On peut gérer l'image plus tard
        $plat->setDescription($description);
        $plat->setType($type);
        //var_dump($plat);
        $lastId = $this->platModele->addToDB($plat);

        if ($lastId > 0) {
          $message = "✅ Plat ajouté avec succès !";
          echo 'redirection en cours...';
?><script>
            window.setTimeout(function() {
              window.location.href = "/php/tastyfood_mvc/public/admin/plat";
            }, 3000); // Redirection après 3 secondes
          </script>
        <?php
        } else {
          $message = "Erreur lors de l'ajout du plat.";
        }
      } else {
        $message = "Veuillez remplir correctement tous les champs.";
      }

      if ($message): ?>
        <div class="mb-4 p-3 rounded-lg 
                    <?php echo str_contains($message, 'erreur') ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
          <?= htmlspecialchars($message) ?>
        </div>
<?php endif;
      //header("Location: /plats?success=1");
      Template::render(
        "/public/views/admin/plat/liste_plat.php",
        [],
        true
      );
      //header("Location: /public/admin/plat");
      exit;
    }
    // On charge la vue add_plat.php
    require dirname(__DIR__, 2) . "/views/admin/plat/add_plat.php";
    require dirname(__DIR__, 2) . "/views/common/header.php";
    require dirname(__DIR__, 2) . "/views/common/footer.php";
  }

  public function show(int $platId)
  {
    $plat = $this->platModele->getOne($platId);
    return Template::render_admin(
      "views/admin/plat/show_plat.php",
      array("plat" => $plat),
      true
    );
  }
  public function edit(int $platId)
  {
    //$plat = $this->show($platId);
    $plat = $this->platModele->getOne($platId);
    //var_dump($plat);
    return Template::render_admin(
      "/views/admin/plat/edit_plat.php",
      array("plat" => $plat),
    );
  }

  public function update($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $date = (new DateTime())->format('Y-m-d H:i:s');
      /* var_dump($_POST);
        var_dump(ucfirst($_POST['type']));
         */
      $data = [
        "nom" => $_POST['nom'],
        "description" => $_POST['description'],
        "prix" => $_POST['prix'],
        "img" => $_FILES['img']['name'] ?? 'plat_defaut.jpg',
        "type" => ucfirst($_POST['type']) ?? '',
        "updated_at" => $date
      ];


      $updated = $this->platModele->updateOne($id, $data);

      if ($updated) {
        $message = "✅ Plat mis à jour avec succès !";
        return Template::render_admin(
          "views/messages/admin/success.php",
          array("message" => $message)
        );
        /* header("Location: /plat/show/$id?success=1");
            exit; */
      } else {
        $message = "Erreur lors de la mise à jour";
        return Template::render_admin(
          "views/messages/admin/error.php",
          array("message" => $message)
        );
      }
    }
  }


  public function delete(int $platId)
  {
    //if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //$plat = $this->platModele->getOne($platId);
      $result = $this->platModele->deleteOne($platId);
      if ($result) {
        $message = "La suppression a été éffectué avec succes";
        return Template::render_admin(
          "/views/messages/success.php",
          array("message" => $message)
        );
      }
      else{
        $message = "La suppression n'a pas reussi";
        return Template::render_admin(
          "/views/messages/error.php",
          array("message" => $message)
        );
      }
    
  }
  private function showForDelete(Plat $plat) {}
}
