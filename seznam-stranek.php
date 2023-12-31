<?php

// dynamicky seznam stranek

class Stranka {
    private $id;
    private $titulek;
    private $menu;

    function __construct($id, $titulek, $menu) {
            $this->id=$id;
            $this->titulek=$titulek;
            $this->menu=$menu;
    }

    function get_id() {
        return $this->id;
    }

    function get_titulek() {
        return $this->titulek;
    }

    function get_menu() {
        return $this->menu;
    }

     // funkce pro volani obsahu do administracniho formulare
     function get_obsah() {
        return file_get_contents("$this->id.html");
     }

     function set_obsah($obsah) {
        file_put_contents("$this->id.html", $obsah);
     }

} // ===== end classa Stranka =====


$pole_stranek = array (
    "uvod" => new Stranka ("uvod", "Sklady Praha10: Pronájem skladů a hal", "ÚVOD"),
    "kancelare" => new Stranka ("kancelare", "Sklady Praha10: Pronájem kanceláří", "PRONÁJEM KANCELÁŘÍ"),
    "haly" => new Stranka ("haly", "Sklady Praha10: Pronájem haly", "PRONÁJEM HAL"),
    "plochy" => new Stranka ("plochy", "Sklady Praha10: Pronájem venkovních ploch", "PRONÁJEM PLOCH"),
    "kontakty" => new Stranka ("kontakty", "Sklady Praha10: kontakty", "KONTAKTY"),
);