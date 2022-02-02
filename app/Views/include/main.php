<main id="main">

    <?php
    foreach ($main as $row => $val) {
        echo  $this->include($val, $main);
    }
    ?>
</main><!-- End #main -->