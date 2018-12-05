<?php

namespace Anax\View;

?>

<div class="ipman">
    <form class="wing-chun" method="get" >
        <input type="text" name="ipcheck" value=<?=$default?>>
        <input type="submit" name="checkip" value="validate">

    </form>
    <p><?= $res ?></p>
    <p>Domain name = <?php
    if ($num == 1) {
        echo (gethostbyaddr($adress));
        echo $location->country_name . $location->city . $location->longitude . $location->latitude . $location->type;
    } ?></p>

    <a href="<?= url("jsonvoorhees?ipcheck=1.1.1.1")?>">1.1.1.1</a>
    <a href="<?= url("jsonvoorhees?ipcheck=IsIPManTheBest")?>">IPMan?</a>
    <a href="<?= url("jsonvoorhees?ipcheck=2001:db8:a0b:12f0::1%25eth0")?>">IPv6</a>
    <a href="jsonvoorhees">JSON api</a>

    <p>Method: Get</p>
    <p>Input: Ipv4 and ipv6</p>
    <p>Route: controllerJSON</p>
</div>
