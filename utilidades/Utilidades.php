<?php

namespace app\utilidades;

use Yii;
use yii\web\Response;
use yii\web\UploadedFile;
use app\models\CatClasificacionGiro;
use app\models\CatEstados;
use app\models\SuscriptorUsuario;
use app\models\SuscriptorImagen;
use app\models\SuscriptorHorario;
use app\models\AuthAssignment;
use yii\helpers\Url;

class Utilidades{
	
	/**
     * Devuelve las clasificaciones de giro disponibles para el usuario súper admin
     */
    public static function getClasificacionesGiro(){
        $tres_meses= (3600 * 24 * 30) * 3;
        $cla_giros = Yii::$app->db->createCommand('SELECT id, nombre FROM Cat_Clasificacion_Giro WHERE estatus=1')->cache($tres_meses)->queryAll();
        $cla_giros = \yii\helpers\ArrayHelper::map($cla_giros, 'id', 'nombre');

        return $cla_giros;
    }

    /**
     * [getGiros Devuelve el listado de Giros existentes en el sistema]
     *
     * @return [array]
     *
     * @author J. Damián Jiménez Navarro <jdamianjm@gmail.com>
     */
    public static function getGiros(){
        $tres_meses= (3600 * 24 * 30) * 3;
        $giros = Yii::$app->db->createCommand('SELECT id, nombre FROM Cat_Giro WHERE estatus=1')->cache($tres_meses)->queryAll();
        $giros = \yii\helpers\ArrayHelper::map($giros, 'id', 'nombre');

        return $giros;
    }

    /**
     * [getGiros Devuelve el listado de Estados de la república mexicana]
     *
     * @return [array]
     *
     * @author J. Damián Jiménez Navarro <jdamianjm@gmail.com>
     */
    public static function getEstados(){
        $doce_meses= (3600 * 24 * 30) * 12;
        $estados = Yii::$app->db->createCommand('SELECT id, nombre FROM Cat_Estados')->cache($doce_meses)->queryAll();
        $estados = \yii\helpers\ArrayHelper::map($estados, 'id', 'nombre');

        return $estados;
    }

    /**
     * [actionObtenerMunicipios Obtenemos los municipios (lista) por id de estado]
     * id_estado -> id del estado
     * @return [arreglo en formato json]
     *
     * @author J. Damián Jiménez Navarro <jdamianjm@gmail.com>
     */
    public function getMunicipios($id_estado)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        $estado= CatEstados::findOne($id_estado);
        return \yii\helpers\ArrayHelper::map($estado->municipios, 'id', 'nombre');
    }

    /**
     * Devuelve los roles disponibles para el usuario final (No suscriptor administrador "súper admin", Si suscriptor, usuario, etc.)
     */
    public static function getRoles(){
        $tres_meses= (3600 * 24 * 30) * 3;
        $roles = Yii::$app->db->createCommand('SELECT name FROM auth_item WHERE usuario_final=1')->cache($tres_meses)->queryAll();
        $roles = \yii\helpers\ArrayHelper::map($roles, 'name', 'name');

        return $roles;
    }

    /**
     * Verifica si la sesión del usuario está activa para peticiones tipo ajax
     * retorna true si la sesión está activa, sino regresa código de error 400
     */
    public static function verificarSesionAjax(){
        $session = Yii::$app->session;
        $resultado= true;
        if (!isset($session['id_suscriptor'])){
            $resultado= array('error_sesion_ajax'=> 400);
        }
        return $resultado;
    }

    /**
     * Envío de notificación a usuario por email al momento de registrar un nuevo suscriptor (Contribuyente)
     * rfc_contribuyente -> RFC del suscriptor (Contribuyente) ya registrado
     * pass_generado -> Clave autogenerada para el usuario registrado
     * enviar_mail -> Dirección de email del suscriptor
     * razon_social -> Razón ya registrada del suscriptor (Contribuyente)
     * return Boolean true -> Éxito al enviar mail, false -> Error
     */
    public static function envioEmailNuevoSuscriptor($correo_suscriptor, $pass_generado, $nombre_suscriptor){
        $url= Yii::getAlias('@webroot');
        $params = [
            'from'=>[
                'address'=>'jdamianjm@gmail.com',
                'name'=>'NotiApp'
            ],
            'addresses'=>[
                ['address'=>$correo_suscriptor,'name'=>$nombre_suscriptor]
            ],
            'embedded_image'=>[
                ['url'=>$url.'/img/top_notiapp_email.jpg','name'=>'top_notiapp_email'],
                ['url'=>$url.'/img/bottom_notiapp_email.jpg','name'=>'bottom_notiapp_email']
            ],
            'body'=>"
            <html>
            <head><meta charset='UTF-8'></head>
            <body style=font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;>
            <table>
                   <tr><td><img src='cid:top_notiapp_email' width='550px' height='150px'/></td></tr>
                   <tr>
                          <td>
                                 Hola Estimado Suscriptor.<p><p>
                                 A continuaci&oacute;n los datos para acceder a su cuenta en NotiApp.<p><p>
                                 <table>
                                        <tr><td><strong>Correo Electrónico:</strong></td><td>$correo_suscriptor</td></tr>
                                        <tr><td><strong>Usuario:</strong></td><td>admin</td></tr>
                                        <tr><td><strong>Contrase&ntilde;a:</strong></td><td>$pass_generado</td></tr>
                                        <tr><td><strong>Liga de acceso:</strong></td><td>".Url::home(true)."login</td></tr>
                                 </table>
                                 <p><p>
                                 Gracias por su preferencia.
                                 <br>                          
                            </td>
                   </tr>
                   <tr>
                          <td><img src='cid:bottom_notiapp_email' width='550px' height='50px'/></td>
                   </tr>
            </table>
            </body>
            </html>",
            'subject'=>"Datos de acceso NotiApp - $nombre_suscriptor",
        ];
        $correo = new UtilidadesMailer();
        $mail = $correo->mail($params);
        if(!$mail){
            return false;
        }
        return true;
    }

    /**
     * [registroSuscriptorUsuario Guardado o edición de usuario perteneciente a suscriptor]
     *
     * @param  [int] $tipo [1= Creación, 2= Edición]
     * @param  [obj] $model [Objeto modelo SuscriptorUsuario]
     * @param  [string] $clave [Clave para el usuario]
     * @param  [string] $rol [Rol para el usuario (admin, asistente, etc.)]
     *
     * @return [boolean]
     *
     */
    public static function registroSuscriptorUsuario($tipo, $model, $clave, $rol){
        $clave_modificada= true;
        if($tipo== 1){ #creación
            $model_asignar_rol= new AuthAssignment();

        } else{ #edición
            $model_asignar_rol = new AuthAssignment();
            $model_asignar_rol = $model_asignar_rol->find()->where([ 'user_id' => $model->id ])->one();

            #Si la contraseña no ha sido cambiada
            if($model->password== ''){
                $clave_modificada= false;
            }
        }

        if($clave_modificada){
            $model->password         = sha1($clave);
            $model->password_show= \Yii::$app->encrypter->encrypt($clave);
        }
        
        $model->save(false);
        $model_asignar_rol->item_name   = $rol;
        $model_asignar_rol->user_id     = (string) $model->id;
        if ($model_asignar_rol->save()) {
            return true;
        }
        return false;
    }

    /**
     * Genera una clave aleatoria segura de 10 Caracteres con al menos una letra minúscula, mayúscula, un número y un caracter especial
     */
    public static function generarClave(){
        $characters= "lower_case,upper_case,numbers,special_symbols";
 
        // define variables used within the function    
        $symbols = array();
        $passwords = array();
        $used_symbols = '';
        $pass = '';
        $cadena_basica= '';

        // an array of different character types    
        $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
        $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $symbols["numbers"] = '1234567890';
        $symbols["special_symbols"] = './-_+';

        $characters_ = explode(",",$characters); // get characters types to be used for the passsword
        foreach ($characters_ as $key=>$value) {
            $n = rand(0, strlen($symbols[$value]) - 1 );
            $cadena_basica .= $symbols[$value][$n]; // build a string with all characters
        }
        unset($characters_);

        $characters_alt = explode(",",$characters); // get characters types to be used for the passsword
        foreach ($characters_alt as $key=>$value) {
            $used_symbols .= $symbols[$value]; // build a string with all characters
        }
        unset($characters_alt);
        $symbols_length = strlen($used_symbols) - 1; //strlen starts from 0 so to get number of characters deduct 1

        $pass = '';
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $symbols_length); // get a random character from the string with all characters
            $pass .= $used_symbols[$i]; // add the character to the password string
        }
        return str_shuffle($pass.$cadena_basica);// return the generated password     
    }

    /**
     * [registrarImagen description]
     *
     * @param  [obj] $model           [Objeto de modelo de Suscriptor o modelo SuscriptorImagen]
     * @param  [String] $nombre_atributo [nombre del atributo a ser considerado para cargar la imagen]
     *
     * @return [Boolean] true= éxito al guardar imagen(es), false= error
     *
     */
    public static function registrarImagen($model, $nombre_atributo){
        $resultado_carga_img= [];
        $model->imagenes = UploadedFile::getInstances($model, $nombre_atributo);
        if(!empty($model->imagenes)){
            foreach ($model->imagenes as $img) {
                if($img!= ''){
                    $nombre_imagen= $model->id.'_'.$img->name; #La imagen es guardada con el nombre y se le concatena el id del suscriptor
                    $r= $img->saveAs(\Yii::getAlias('@webroot/img/img_suscriptor/') . $nombre_imagen);
                    if($r){
                        #Registro de imagen en bd
                        $model_suscriptor_imagen= new SuscriptorImagen();
                        $model_suscriptor_imagen->id_suscriptor= $model->id;
                        $model_suscriptor_imagen->nombre= $nombre_imagen;
                        $model_suscriptor_imagen->descripcion= $model_suscriptor_imagen->nombre;
                        if($model_suscriptor_imagen->save()){
                            $resultado_carga_img[]= true;
                        } else{
                            $resultado_carga_img[]= false;
                        }
                    } else{
                        $resultado_carga_img[]= $r;
                    }
                }
            }
        } else{
            return false;
        }

        #Busca de errores en el guardado de loas imágenes - start
        if(array_search(false, $resultado_carga_img)!== false){ #existe un registro en false, entonces hubo problemas al registrar las imágenes
            return false;
        }
        #Busca de errores en el guardado de loas imágenes - end
        return true;
    }

    public static function registrarHorario($id, $datos_horario, $id_suscriptor){
        if(!$id){
            $model_suscriptor_horario= new SuscriptorHorario();
        } else{
            #Hacer find $model_suscriptor_horario= new SuscriptorHorario();
        }

        $model_suscriptor_horario->id_suscriptor= $id_suscriptor;
        if($datos_horario['des_lun_t_a']!= '' && $datos_horario['has_lun_t_a']!= ''){
            $model_suscriptor_horario->lunes=  $datos_horario['des_lun_t_a'] .','. $datos_horario['has_lun_t_a'];
        }
        /*if($datos_horario['des_lun_t_b']!= '' && $datos_horario['has_lun_t_b']!= ''){
            $model_suscriptor_horario->lunes.=  ','.$datos_horario['des_lun_t_b'] .','. $datos_horario['has_lun_t_b'];
        }*/

        if($datos_horario['des_mar_t_a']!= '' && $datos_horario['has_mar_t_a']!= ''){
            $model_suscriptor_horario->martes=  $datos_horario['des_mar_t_a'] .','. $datos_horario['has_mar_t_a'];
        }
        /*if($datos_horario['des_mar_t_b']!= '' && $datos_horario['has_mar_t_b']!= ''){
            $model_suscriptor_horario->martes.=  ','.$datos_horario['des_mar_t_b'] .','. $datos_horario['has_mar_t_b'];
        }*/

        if($datos_horario['des_mie_t_a']!= '' && $datos_horario['has_mie_t_a']!= ''){
            $model_suscriptor_horario->miercoles=  $datos_horario['des_mie_t_a'] .','. $datos_horario['has_mie_t_a'];
        }
        /*if($datos_horario['des_mie_t_b']!= '' && $datos_horario['has_mie_t_b']!= ''){
            $model_suscriptor_horario->miercoles.=  ','.$datos_horario['des_mie_t_b'] .','. $datos_horario['has_mie_t_b'];
        }*/

        if($datos_horario['des_jue_t_a']!= '' && $datos_horario['has_jue_t_a']!= ''){
            $model_suscriptor_horario->jueves=  $datos_horario['des_jue_t_a'] .','. $datos_horario['has_jue_t_a'];
        }
        /*if($datos_horario['des_jue_t_b']!= '' && $datos_horario['has_jue_t_b']!= ''){
            $model_suscriptor_horario->jueves.=  ','.$datos_horario['des_jue_t_b'] .','. $datos_horario['has_jue_t_b'];
        }*/

        if($datos_horario['des_vie_t_a']!= '' && $datos_horario['has_vie_t_a']!= ''){
            $model_suscriptor_horario->viernes=  $datos_horario['des_vie_t_a'] .','. $datos_horario['has_vie_t_a'];
        }
        /*if($datos_horario['des_vie_t_b']!= '' && $datos_horario['has_vie_t_b']!= ''){
            $model_suscriptor_horario->viernes.=  ','.$datos_horario['des_vie_t_b'] .','. $datos_horario['has_vie_t_b'];
        }*/

        if($datos_horario['des_sab_t_a']!= '' && $datos_horario['has_sab_t_a']!= ''){
            $model_suscriptor_horario->sabado=  $datos_horario['des_sab_t_a'] .','. $datos_horario['has_sab_t_a'];
        }
        /*if($datos_horario['des_sab_t_b']!= '' && $datos_horario['has_sab_t_b']!= ''){
            $model_suscriptor_horario->sabado.=  ','.$datos_horario['des_sab_t_b'] .','. $datos_horario['has_sab_t_b'];
        }*/

        if($datos_horario['des_dom_t_a']!= '' && $datos_horario['has_dom_t_a']!= ''){
            $model_suscriptor_horario->domingo=  $datos_horario['des_dom_t_a'] .','. $datos_horario['has_dom_t_a'];
        }
        /*if($datos_horario['des_dom_t_b']!= '' && $datos_horario['has_dom_t_b']!= ''){
            $model_suscriptor_horario->domingo.=  ','.$datos_horario['des_dom_t_b'] .','. $datos_horario['has_dom_t_b'];
        }*/
        $model_suscriptor_horario->labora_festivo=  $datos_horario['labora_festivo'];
        $model_suscriptor_horario->save();
    }
}