<?php
    # import routes
    include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');

    # config
    $title = "Gestión de estados";
?>
    <?php require_once(VIEW_TEMPLATE_PATH. "header.php"); ?>
    <?php require_once(VIEW_TEMPLATE_PATH. "navbar.php"); ?>

    <section class="section">
        <div class="container">
            <h1 class="title is-4">Crear estado</h1>
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <form action="" id="frmCreate">
                            <div class="field">
                                <label class="label">Estado</label>
                                <div class="control">
                                    <input class="input" name="name" type="text" placeholder="Ingrese el nuevo estado" value="">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Proceso</label>
                                <div class="control">
                                    <input class="input" name="process" type="text" placeholder="Ingrese el proceso del estado" value="">
                                </div>
                            </div>
                            <div class="control">
                                <button class="button is-primary" type="button" id="btnCreate">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <a href="?c=State&a=view">Listar estados</a>
        </div>
    </section>

    <script src="<?= STATIC_PAGE_JS ?>state.js"></script>
    
    <?php require_once(VIEW_TEMPLATE_PATH. "footer.php"); ?>
