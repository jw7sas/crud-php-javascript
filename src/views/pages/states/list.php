<?php
    # import routes
    include_once ($_SERVER['DOCUMENT_ROOT'].'/dirs.php');

    # config
    $title = "Lista de estados";
?>
    <?php require_once(VIEW_TEMPLATE_PATH. "header.php"); ?>
    <?php require_once(VIEW_TEMPLATE_PATH. "navbar.php"); ?>

    <section class="section">
        <div class="container">
            <h1 class="title is-4">Lista de estados</h1>
            <div class="is-flex is-justify-content-center">
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Proceso de uso</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($states as $key => $st){
                            ?>
                                <tr id="tr_<?= $key ?>">
                                    <td><?= $st->getId(); ?></td>
                                    <td><?= $st->getName(); ?></td>
                                    <td><?= $st->getProcess(); ?></td>
                                    <td>
                                        <div>
                                            <a class="button is-info" href='javascript:doAction(showItem, <?= json_encode($st->getJSON()) ?>);'>
                                                <span class="icon is-small"><i class="fas fa-info-circle"></i></span>
                                            </a>
                                            <a class="button is-warning" href='javascript:doAction(viewUpdate, {"data": <?= json_encode($st->getJSON()) ?>, "row_number": <?= $key ?>});'>
                                                <span class="icon is-small"><i class="fas fa-edit"></i></span>
                                            </a>
                                            <a class="button is-danger" href='javascript:doAction(dropItem, {"id": <?= $st->getId() ?>, "row_number": <?= $key ?>});'>
                                                <span class="icon is-small"><i class="fas fa-times-circle"></i></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>   
                            <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>  
            <div class="is-pulled-right">
                <div class="control">
                    <a href="?c=State&a=create" class="button is-success">
                        <span>Nuevo estado</span>    
                        <span class="icon">
                            <i class="fas fa-plus"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
                            
    <?php require_once(VIEW_UTILS_PATH. "modal.php"); ?>
    
    <script src="<?= STATIC_PAGE_JS ?>state.js"></script>

    <?php require_once(VIEW_TEMPLATE_PATH. "footer.php"); ?>

