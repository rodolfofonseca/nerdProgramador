<?php
require_once 'class/Controller.php';
require_once 'model/Descriptions.php';
$id_atualizacao = (int) isset($_GET['id_atualizacao'])? intval($_GET['id_atualizacao'], 10):0;

if($id_atualizacao == 0){
    header('Location:index.php');
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(empty($_POST) == false){
        $description = new description();

        $description->set_id_version((int) $id_atualizacao);

        if(array_key_exists('description', $_POST))
            $description->set_description((string) $_POST['description']);
        
        if(array_key_exists('archivo', $_POST))
            $description->set_archivo((string) $_POST['archivo']);
        
        $validator = (bool) $description->get_validator();

        if($validator == true){
            $controller = new Controller();
            $description->set_id_description((int) $controller->next('descriptions', 'id_description'));

            $return = (bool) $controller->insert('descriptions', (array) $description->get_model());
            echo 'Cadastro efetuado com sucesso!';
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
        <form method="post" action="archivo.php?id_atualizacao=<?php echo $id_atualizacao; ?>" class="container_short">
            <label for="archivo" class="label">Arquivo</label>
            <input type="text" name="archivo" id="archivo" class="field field_large" placeholder="ARQUIVO">
            <br/>
            <label for="description" class="label">Descrição</label>
            <br/>
            <textarea class="field textarea" name="description" id="description">

            </textarea>
            <br/>
            <br/>
            <input type="submit" class="btn" value="Enviar dados"/>
        </form>
        <div class="container_short">
            <button class="btn" onclick="return_index();">Voltar</button>
        </div>
    </body>
</html>