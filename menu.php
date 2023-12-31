<?php

foreach ($pole_stranek as $stranka =>$instance_stranky) {

    if ($instance_stranky->get_obsah() !="") {
        $escaped_menu = htmlspecialchars($instance_stranky->get_menu());
        $escaped_id = htmlspecialchars($instance_stranky->get_id());
        echo "<li><a href='{$escaped_id}'>{$escaped_menu}</a></li>";
    }
}