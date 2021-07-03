<?php
    # import routes
    include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');

    # config
    $title = "Lista de estados";
?>
    <?php require_once(VIEW_TEMPLATE_PATH. "header.php"); ?>
    <?php require_once(VIEW_TEMPLATE_PATH. "navbar.php"); ?>

    <section class="section">
        <div class="container px-5 py-5">
            <h1 class="title">Bienvenidos</h1>
            <p>A un nuevo proyecto de Ásperos Geek, donde aprenderás a hacer un CRUD con PHP y Javascript (AJAX)</p>
            <hr>
            <a href="?c=State&a=view">Crud de estados</a>
        </div>
    </section>


</body>
</html>