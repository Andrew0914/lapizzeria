<?php

    /**
     * FUNCIONES
     */

     /**
      * Alamacena los datos del formulario de reservaciones
      */
    function lapizzeria_guardar(){
        if(isset($_POST['enviar']) && $_POST['oculto']== 1){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $captcha = $_POST['g-recaptcha-response'];
                // campos que deben enviare
                $parametros = array(
                    'secret' => '6Lfm_3wUAAAAAI8td3Jxo5-ChzYdXRGrTyNUTYI-',
                    'response' => $captcha ,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                );
                // curl es utilizado para acceder a servidores remotos
                $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
                //configuramos las opciones
                curl_setopt($ch , CURLOPT_RETURNTRANSFER , true);
                curl_setopt($ch , CURLOPT_TIMEOUT , 30);
                //genera una cadena codificada para enviar los parametros
                curl_setopt($ch , CURLOPT_POSTFIELDS , http_build_query($parametros) );
    
                //OBTENEMOS LA RESPUESTA
                $rsp = json_decode(curl_exec($ch));
                if($rsp->success){
                    global $wpdb;
                    $tabla = $wpdb->prefix . "reservaciones";
                    // validamos el envio
                    //sanitizamos los campos
                    $nombre = sanitize_text_field($_POST['nombre']);
                    $fecha = sanitize_text_field($_POST['fecha']);
                    $email = sanitize_email($_POST['email']);
                    $telefono = sanitize_text_field($_POST['telefono']);
                    $mensaje = sanitize_text_field($_POST['mensaje']);
                    // generamos los datos de insercion
                    $datos = array(
                        "nombre" => $nombre,
                        "fecha" => $fecha,
                        "correo" => $email,
                        "telefono" => $telefono,
                        "mensaje"=> $mensaje
                    );
                    // un formato por cada campo de insercion
                    $formato = array('%s','%s','%s','%s','%s');
                    //insertamos
                    $wpdb->insert($tabla,$datos,$formato);
                    // obtenemos la pagina de redireccion
                    $page = get_page_by_title("Gracias por su Reserva");
                    // redirigimos
                    wp_redirect(get_permalink($page->ID));
                    exit();
                    
                }
            }
        }
        
    }

    /**
     * Elimina una reservacion
     */
    function lapizzeria_eliminar(){
        $respuesta = null;
        if(isset($_POST['tipo'])){
            if($_POST['tipo'] == 'eliminar'){
                global $wpdb;
                $tabla = $wpdb->prefix . 'reservaciones';
                $id_registro = $_POST['id'];
                // devuelve 1 si es exitoso, es una funcion nativa de wp
                $resultado = $wpdb->delete($tabla, array('id' => $id_registro) , array('%d'));
                if($resultado == 1){
                    $respuesta = array(
                        'respuesta'=> 1,
                        'id'=>$id_registro
                    );
                }else{
                    $respuesta = array('respuesta'=> 'error');
                }
            }
        }
        // cuando es comunicacion por ajax siempre debe ir un die() al final
        die(json_encode($respuesta));
    }

    /**
     * Acciones
     */
    add_action('init','lapizzeria_guardar');
    // via ajax
    add_action('wp_ajax_lapizzeria_eliminar', 'lapizzeria_eliminar');
?>