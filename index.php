<html>
    <head>
        <meta charset="UTF-8">
        <title>ATUALIZAÇÕES DO RODOLFO</title>
        <link rel="stylesheet" href="css/style.css"/>
        <script type="text/javascript" src="js/js.js"></script>
    </head>
    <body>
        <h5 class="text_center title">Atualizações do sistemas</h5>
        <button class="float_center btn" onclick="insert();">Cadastrar</button>
        <br/>
        <table class="container table">
            <thead>
                <tr>
                    <th>Atualização</th>
                    <th>Arquivo</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'class/Controller.php';
                $controller = new Controller();
                $versions = (array) $controller->find_all('versions', [], ['id_version' => false]);
                if(empty($versions) == false){
                    foreach($versions as $version){
                        $id_version = (int) 0;
                        if(array_key_exists('id_version', $version))
                            $id_version = (int) $version['id_version'];
                        
                        $descriptions = (array) $controller->find_all('descriptions', ['id_version', '===', (int) $id_version], ['id_description' => false]);
                        if(empty($descriptions) == false){
                            foreach($descriptions as $description){
                                $software = (string) '';
                                $versions_table = (string) '';
                                $archivo = (string) '';
                                $descriptions_table = (string) '';
                                if(array_key_exists('software', $version))
                                    $software = (string) $version['software'];
                                
                                if(array_key_exists('version', $version))
                                    $versions_table = (string) $version['version'];
                                
                                if(array_key_exists('archivo', $description))
                                    $archivo = (string) $description['archivo'];

                                if(array_key_exists('description', $description))
                                    $descriptions_table = (string) $description['description'];


                                echo "<tr class='".$software."'>";
                                echo "<td class='text_center bold'>".$version['version']."</td>";
                                echo "<td class='text_center bold'>".$archivo."</td>";
                                echo "<td>".$descriptions_table."</td>";
                                echo "</tr>";
                            }
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </body>
</html>