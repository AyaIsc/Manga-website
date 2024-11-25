<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model{
    public static function getManga() {
         
        return DB::select("SELECT DISTINCT s.id, couverture, titre, auteur, nombre_volumes, s.date_premiere_parution, serie_finie,s.description
        FROM series s
        JOIN personnages p ON s.id = p.serie_id
        ORDER BY s.date_premiere_parution");


    }
    public static function getPersonnagesAPI($id){
        return DB::select("SELECT id, nom, serie_id, type, description
                            FROM personnages
                            WHERE serie_id = :id", ['id' => $id]);
    }
    public static function getPersosAjax(){
        return DB::select("SELECT s.id AS serie_id, p.id, p.nom, p.description, p.type
        FROM series s
        JOIN personnages p ON s.id = p.serie_id
        ORDER BY s.date_premiere_parution");
    }

    public static function getallPerso($id){
        return DB::select("SELECT p.nom
        FROM personnages p
        WHERE p.serie_id = ?
        ORDER BY p.id", [$id]);
    }

}