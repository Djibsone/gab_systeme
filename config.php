<?php
session_start();
// Connexion à la base de données
function dbConnect(){
    try{
        $db = new PDO('mysql:host=127.0.0.1;dbname=gab_systeme;charset=utf8', 'djibril', 'tamou');
        return $db;
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

function _recp($num){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM compte WHERE num_compte = ?');
    $req->execute(array($num));
    return $req;
}

function _versement($num){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM compte WHERE num_compte = ?');
    $req->execute(array($num));
    return $req;
}

//modifier compte
function updateCompte($trnsfert, $versement){
    $db = dbConnect();

    $req = $db->prepare('UPDATE compte SET solde = ? WHERE num_compte = ?');

    if($req->execute(array($trnsfert, $versement)))
        return true;
    else
        return false;
}

//modifier compte
function updateCompteDebit($credit, $numero){
    $db = dbConnect();

    $req = $db->prepare('UPDATE compte SET solde = ? WHERE num_compte = ?');

    if($req->execute(array($credit, $numero)))
        return true;
    else
        return false;
}