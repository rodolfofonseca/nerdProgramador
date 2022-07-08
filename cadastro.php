<?php
require_once 'class/Controller.php';
require_once 'model/Version.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(empty($_POST) == false){
        $version = new Version();
        if(array_key_exists('version', $_POST))
            $version->set_version((string) $_POST['version']);
        
        if(array_key_exists('system', $_POST))
            $version->set_software((string) $_POST['system']);
        
        $validator = (bool) $version->get_validator();
        
        $controller = new Controller();

        if($validator == true){
            $version->set_id_version((int) $controller->next('versions', 'id_version'));
            $return = (bool) $controller->insert('versions', $version->get_model());
            if($return == true)
                header('Location:archivo.php?id_atualizacao='.$version->get_id_version());
        }
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ATUALIZAÇÕES DO RODOLFO</title>
        <link rel="stylesheet" href="css/style.css"/>
        <script type="text/javascript" src="js/js.js"></script>
    </head>
    <body>
        <h5 class="text_center title">Atualizações do sistemas</h5>
        <form method="post" action="cadastro.php" class="container_short">
            <label for="version" class="label">Versão</label>
            <input type="text" name="version" id="version" class="field field_70px" maxlength="6">
            <label for="system" class="label">Sistema</label>
            <select name="system" id="system" class="field field_70px">
                <option value="erp">ERP</option>
                <option value="frente">FRENTE</option>
                <option value="gd">GD</option>
            </select>
            <input type="submit" class="btn" value="Enviar dados"/>
        </form>
    </body>
</html>