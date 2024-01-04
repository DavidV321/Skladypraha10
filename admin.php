<?php
// 1. nacteni dat
require "./seznam-stranek.php";

// 2. volani funkce session pro ulozeni dat z formulare
session_start();
// 7. nastaveni chybove hlasky defaultne
$chyba = "";

// 4. zpracovani prihlasovaciho formulare
if (array_key_exists("prihlasit", $_POST)) {

    $jmeno = $_POST["jmeno"];
    $heslo = $_POST["heslo"];

    // 5. nastaveni pevnych prihlasovacich udaju
    if ($jmeno == "admin" && $heslo =="pokus123") {

        // platne prihlasovaci udaje
        // 9. musime si to ulozit do promenne session
        $_SESSION["prihlaseny_uzivatel"] = $jmeno;

    }else {
        // neplatne prihlasovaci udaje
        // 6. promenna pro chybovou hlasku pri neplatnem prihlaseni
        $chyba = "Nesprávné přihlašovací údaje";
    }
}


// 13. zpracovani odhlasovaciho formulare
if (array_key_exists("odhlasit", $_POST)) {
    // 14.pouzijeme funkci unset k odstraneni informace ze session
    unset ($_SESSION["prihlaseny_uzivatel"]);
    header("Location: ?");
}

// 17 vytvoreni GLOBALNI podminky aby editace sla jen pro prihlasene uzivatel
if (array_key_exists("prihlaseny_uzivatel", $_SESSION)) {
    //19. vytvoreni pomocne promenne, ktera predstavuje stranku kterou chceme upravovat
    $instance_aktualni_stranky = null;


    // podminka pro zvolenou stranku
    if (array_key_exists("id-stranky", $_GET)) {
        $id_stranky = $_GET["id-stranky"];
        // 18. zpracovani vyberu aktualni stranky + ulozeni aktualni instance z pole stranek
        $instance_aktualni_stranky = $pole_stranek[$id_stranky];
    }

    // 22.zpracovani formulare pro ulozeni editace
    if (array_key_exists("ulozit", $_POST)) {
        // vytvoreni nove promenne pro ulozeni obsahu z textarea name="obsah"
        $obsah = $_POST["obsah"];
        $instance_aktualni_stranky->set_obsah($obsah);
    }



}

?>




<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklady Praha10: administrace</title>
</head>
<body>
    
    <?php
    // 10. vytvoreni podminky pro formular pro neprihlasene uzivatele
    if (!array_key_exists("prihlaseny_uzivatel", $_SESSION)) {

       ?>
       <!-- 3. vytvoreni prihlasovaciho formulare -->
        <form method="post">
        <label for="jmeno">Přihlašovací jméno</label>
        <input type="text" name="jmeno" id="jmeno">
        <br>
        <label for="heslo">Heslo</label>
        <input type="password" name="heslo" id="heslo">
        <br>

        <button name="prihlasit">Přihlásit</button>
    </form>

    <?php 
    // 8. vypsani chybove hlasky do stranky
    echo $chyba;
    
    }else {
        // 11. sekce pro prihlasene uzivatele
        echo "Přihlášen uživatel: {$_SESSION["prihlaseny_uzivatel"]}"; 

        //  12. tlacitko pro odhlasovani
        echo "<form method='post'>
            <button name='odhlasit'>Odhlásit</button>
            </form>";

        // 15. vypsat seznam stranek pro editovani

        echo "<ul?>";
        // foreach ($nazev_pole as $klic => $hodnota/instance pole)
            foreach ($pole_stranek as $id_stranky => $instance_stranky) {
        // 16. dame do odkazu a musime pridat parametr ktery rekne ktera stranka je editovana
                echo "<li>
                <a href='?id-stranky={$instance_stranky->get_id()}'>{$instance_stranky->get_id()}</a>

                / <a href='{$instance_stranky->get_id()}' target='_blank'>Zobrazit</a>
                </li>";
            }
        echo "</ul>";


        
            // 20. vytvoreni formulare + zobrazeni jen pokud je vybrana nejaka strnaka k editaci
            if ($instance_aktualni_stranky != null) {

                echo "<h1>Editace stranky {$instance_aktualni_stranky->get_id()}</h1>";
                ?>
                <!-- 21 editacni formular -->
                <form method="post">
                    <textarea name="obsah" id="" cols="80" rows="15"><?php 
                    echo htmlspecialchars ($instance_aktualni_stranky->get_obsah());
                    ?></textarea>
                    <br>
                    <button name="ulozit">Uložit</button>
                </form>
                <?php


            }


    }
   ?>
    
</body>
</html>