<?php
require_once './config.php';

if (isset($_POST['ok'])) {
   if (!empty($_POST['numero']) && !empty($_POST['montant']) && !empty($_POST['versement'])) {
    $numero = htmlspecialchars($_POST['numero']);
    $montant = htmlspecialchars($_POST['montant']);
    $versement = htmlspecialchars($_POST['versement']);

    $check = _recp($numero);
    $data = $check->fetch();
    $compt_crdit = _versement($versement);
    $result = $compt_crdit->fetch();
    if ($data['solde'] > 0) {
        $credit = $data['solde'] - $montant;
        $trnsfert = $credit + $result['solde'];
        
        $stmt = updateCompte($trnsfert, $versement);
        ($stmt) ? $_SESSION['message'] = 'Le transfère a été réçu' : $_SESSION['message'] = 'Une erreur s\'est produite lors du transfère';
        updateCompteDebit($credit, $numero);
    } else {
        $_SESSION['message'] = 'Solde insuffisant';
    }
   } else {
    $_SESSION['message'] = 'les champs sont vides';
   }
   header('Location: ./');
}