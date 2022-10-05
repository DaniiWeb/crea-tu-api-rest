<?php
    require_once ('models/Client.php');

    switch ($_SERVER['REQUEST_METHOD']) { //Aqui identificaremos los metodos
        case 'GET':
            //Si existe el indice id en el metodo $_GET (Es decir, si te pasan pos url el id), traeras y convertiras el dato que tenga ese id en un Json, sino devolvemos todos los datos convertidos a Json
            if(isset($_GET['id'])){
                echo json_encode(Client::getData($_GET['id'], null)); 
            }else{
                if(isset($_GET['name'])) { //Si no me trajo una id en la peticion, probaremos con el name o el campo que usted requiera
                    echo json_encode(Client::getData(null, $_GET['name'])); 
                }else{ //Si no trae nada en la peticion, trae todos los datos
                    echo json_encode(Client::getAll());
                }
            } 
            break;
        case 'POST':
            $data = json_decode(file_get_contents('php://input')); //Desconvertimos el Json, leemos los datos que estemos enviando por el metodo POST (NO COMENTAR!!!!!!!)
            
            if($data !== null){
                if (Client::postData($data->name, $data->lastname)) { //Accedemos a los valores que nos esta enviando, lo ponemos dentro de un if ya que nos devuelve un TRUE/FALSE
                    http_response_code(200); //Respuesta esperada, codigos 200 (OK)
                }else{
                    http_response_code(502); //Respuesta de mala entrada
                }
            }else{
                http_response_code(404); //No se encontro los recursos solicitados
            }

            /********************* EN CASO DE QUE QUIERAMOS QUE SOLO SE PUEDA HACER PETICIONES GET A LA API, DEBEMOS DESCOMENTAR EL SIGUIENTE CODIGO Y COMENTAR EL IF DE ARRIBA *****************************/
            //http_response_code(501); //«No implementado». Este error indica que el servidor no es compatible con la funcionalidad necesaria para cumplir con la solicitud
            //echo '{ Data not found :( }';
            break;
        case 'PUT':
            $data = json_decode(file_get_contents('php://input')); //Desconvertimos el Json, leemos los datos que estemos enviando por el metodo PUT (NO COMENTAR EN NINGUNA SITUACION!!!)
            
            if($data !== null){
                if (Client::updateData($data->id, $data->name, $data->lastname)) { //Accedemos a los valores, lo ponemos dentro de un if ya que nos devuelve un TRUE/FALSE
                    http_response_code(200); //Respuesta esperada, codigos 200 (OK)
                }else{
                    http_response_code(502); //Respuesta de mala entrada
                }
            }else{
                http_response_code(404); //No se encontro los recursos solicitados
            }
            /********************* EN CASO DE QUE QUIERAMOS QUE SOLO SE PUEDA HACER PETICIONES GET A LA API, DEBEMOS DESCOMENTAR EL SIGUIENTE CODIGO Y COMENTAR EL IF DE ARRIBA *****************************/
            //http_response_code(501); //«No implementado». Este error indica que el servidor no es compatible con la funcionalidad necesaria para cumplir con la solicitud
            //echo '{ Data not found :( }';
            break;
        case 'DELETE':
            //PARA TODOS
            if(isset($_GET['id'])){ //Si nos pasan un id por la url
                if (Client::deleteData($_GET['id'])) { //Accedemos al metodo delete y le pasamos la id que vamos a eliminar, lo ponemos dentro de un if ya que nos devuelve un TRUE/FALSE
                    http_response_code(200); //Respuesta esperada, codigos 200 (OK)
                }else{
                    http_response_code(400); //Respuesta para solicitudes incorrectas
                }
            }else{
                http_response_code(404); //No se encontro los recursos solicitados
            }
            /********************* EN CASO DE QUE QUIERAMOS QUE SOLO SE PUEDA HACER PETICIONES GET A LA API, DEBEMOS DESCOMENTAR EL SIGUIENTE CODIGO Y COMENTAR EL IF DE ARRIBA *****************************/
            //http_response_code(501); //«No implementado». Este error indica que el servidor no es compatible con la funcionalidad necesaria para cumplir con la solicitud
            //echo '{ Data not found :( }';
            break;
    }
?>