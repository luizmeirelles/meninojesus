<?php
/**
 * Created by PhpStorm.
 * User: Marlon Araújo
 * Date: 04/04/2019
 * Time: 16:10
 */

if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('formata_string')){
    function formata_string($value, $tipo)
    {
        $CI =& get_instance();
        $CI->load->library('sanitizer');

        switch ($tipo){
            case 'email':
                $retorno = $CI->sanitizer->email($value);
                $retorno = mb_strtolower($retorno);
                break;
            case 'nome':
                $retorno = $CI->sanitizer->alfabetico($value, true, true);
                $retorno = mb_strtolower($retorno);
                $retorno = ucwords($retorno);
                break;
            case 'string':
                $retorno = $CI->sanitizer->alfanumerico($value, true, true);
                $retorno = mb_strtolower($retorno);
                $retorno = ucwords($retorno);
                break;
            case 'sanitize':
                $retorno = $CI->sanitizer->alfanumerico($value, true, true);
                break;
            case 'string_semacento':
                $retorno = $CI->sanitizer->alfanumerico($value, false, true);
                break;
            case 'integer':
                $retorno = $CI->sanitizer->integer($value);
                break;
            case 'numeric':
                $retorno = $CI->sanitizer->numerico($value);
                break;
            case 'float':
                $retorno = $CI->sanitizer->float($value);
                break;
            case 'money':
                $retorno = $CI->sanitizer->money($value);
                break;
            case 'url':
                $retorno = $CI->sanitizer->url($value);
                break;
            case 'protect':
                $retorno = $CI->sanitizer->protect($value);
                break;
        }

        return $retorno;
    }
}

if(!function_exists('envia_email')) {
    function envia_email($assunto, $mensagem, $para, $nome_reply = "", $email_reply = "", $cc = "", $bcc = "", $anexo = "") {

        $CI =& get_instance();
        $CI->load->library('email');

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'email-ssl.com.br ';
        $config['smtp_user'] = 'noreply@wandersonoliveira.com';
        $config['smtp_pass'] = '6G*%DX5Lf';
        $config['smtp_port'] = 587;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $CI->email->initialize($config);

        $CI->email->from('noreply@wandersonoliveira.com', $nome_reply);

        if(!empty($email_reply) && !empty($nome_reply)){
            $CI->email->reply_to($email_reply, $nome_reply);
        }

        $CI->email->to($para);

        $CI->email->subject($assunto);
        $CI->email->message($mensagem);

        if(!empty($cc)) $CI->email->cc($cc);
        if(!empty($bcc)) $CI->email->bcc($bcc);
        if(!empty($anexo)) $CI->email->attach($anexo);

        if ($CI->email->send()) {
            return array('retorno' => true);
        } else {
            return array('retorno' => false, 'erro' => 'Erro ao enviar o e-mail.' . $CI->email->print_debugger());
        }
    }
}

if(!function_exists('data_completa')) {

    /**
     * @data: recebe data em timestamp
     * @tipo_mes: completo ou abreviado
     * @tipo_ano: 2 ou 4 digitos
     * @retorno:
     *          1 - ex.: 16 DE ABRIL DE 2018
     *          2 - ex.: 16/04/2018
     *          3 - ex.: 2018-04-16
     *          4 - ex.: 16 ABR 2018
     *          5 - ex.: 04
     *          6 - ex.: ABR ou ABRIL
     *          7 - ex.: 18 ou 2018
     *          8 - ex.: SEG ou SEGUNDA
     */
    function data_completa($data, $retorno, $tipo_mes = "", $tipo_dia = "") {
        $mes_nome_completo = array('', 'JANEIRO', 'FEVEREIRO', 'MARÇO', 'ABRIL', 'MAIO', 'JUNHO', 'JULHO', 'AGOSTO', 'SETEMBRO', 'OUTUBRO', 'NOVEMBRO', 'DEZEMBRO');
        $mes_nome_abreviado = array('', 'JAN', 'FEV', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ');

        $dia_semana_completo = array('DOMINGO', 'SEGUNDA', 'TERÇA', 'QUARTA', 'QUINTA', 'SEXTA', 'SÁBADO');
        $dia_semana_abreviado = array('DOM', 'SEG', 'TER', 'QUA', 'QUI', 'SEX', 'SÁB');

        $data_usa = explode("-", $data);

        $mes_numero = intval($data_usa[1]);
        $mes = !empty($tipo_mes) ? $tipo_mes == 1 ? $mes_nome_abreviado[$mes_numero] : $mes_nome_completo[$mes_numero] : "";

        switch ($retorno){
            case 1:
                if(empty($tipo_mes)){
                    $mes = $mes_nome_completo[$mes_numero];
                }

                return $data_usa[2] . " DE " . $mes . " DE " . $data_usa[0];
                break;

            case 2:
                return $data_usa[2] . "/" . $data_usa[1] . "/" . $data_usa[0];
                break;

            case 3:
                return $data_usa[0] . "-" . $data_usa[1] . "-" . $data_usa[2];
                break;

            case 4:
                if(empty($tipo_mes)){
                    $mes = $mes_nome_abreviado[$mes_numero];
                }

                return $data_usa[2] . " " . $mes . " " . $data_usa[0];
                break;

            case 5:
                return $data_usa[1];
                break;

            case 6:
                if(empty($tipo_mes)){
                    $mes = $mes_nome_completo[$mes_numero];
                }

                return $mes;
                break;

            case 7:
                return $data_usa[0];
                break;

            case 8:

                $dia_semana = date('w', strtotime($data));
                return $tipo_dia == 1 ? $dia_semana_abreviado[$dia_semana] : $dia_semana_completo[$dia_semana];
                break;

            default:
                if(empty($tipo_mes)){
                    $mes = $mes_nome_completo[$mes_numero];
                }

                return $data_usa[2] . " DE " . $mes . " DE " . $data_usa[0];
                break;
        }

    }
}

if(!function_exists('formata_data')) {

    /**
     * @data: recebe data em '2019-12-03T18:10:53.517Z'
     *
     */
    function formata_data($data) {
        $arr = explode('T', $data);
        $data_usa = explode('-', $arr[0]);
        return $data_usa[2] . '/' . $data_usa[1] . '/' . $data_usa[0] . ' ' . substr($arr[1], 0, 5);
    }
}

if(!function_exists('letras_iniciais')) {
    function letras_iniciais($nome){
        $iniciais = "";
        $array_nomes = explode(' ', $nome);
        $tam = count($array_nomes) == 2 ? 2 : 1;

        for($i = 0; $i < $tam; $i++){
            $iniciais .= substr($array_nomes[$i], 0, 1);
        }

        return $iniciais;
    }
}

if(!function_exists('formata_valor')) {
    function formata_valor($valor, $banco = false) {
        $decimal = substr($valor, -2);
        $valor = substr($valor, 0, -2);
        if($banco){
            return number_format($valor . '.' . $decimal, 2, '.', '');
        }else{
            return number_format($valor . '.' . $decimal, 2, ',', '.');
        }
    }
}

if(!function_exists('tira_acentos')) {
    function tira_acentos($string){
        return preg_replace(array("/(ç)/","/(Ç)/","/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","c C a A e E i I o O u U n N"),$string);
    }
}

if(!function_exists('formata_telefone')) {
    function formata_telefone($string, $whatsapp = true){
        if($whatsapp){
            return str_replace('(', '', str_replace(')', '', str_replace('-', '', str_replace(' ', '', $string))));
        }else{
            return '0' . str_replace('(', '', str_replace(')', '', str_replace('-', '', str_replace(' ', '', $string))));
        }
    }
}

if(!function_exists('tirarAcentos')){

    function tirarAcentos($string){
        //return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $clean = preg_replace("/[\'\/~`\!@#\$%\^&\*\(\)_\+=\{\}\[\]\|;:\"\<\>,\.\?\\\]/", '', $clean);

        return $clean;
    }
}

if(!function_exists('tirarEspacos')){
    function tirarEspacos($string){
        return str_replace(' ', '-', $string);
    }
}

if(!function_exists('somente_numeros')) {
    function somente_numeros($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }
}

if(!function_exists('minify')) {

    function minify($buffer) {
        $search = array("\n", "\t", "\r", "\r\n", "\n\r");
        $replace = array();

        $buffer = str_replace($search, $replace, trim($buffer));

        $search = array(
            '/(\s){2,}/',
            '/\>(\s)+/',
            '/(\s)+\</',
            '/\{(\s)+/',
            '/(\s)+\{/',
            '/\}(\s)+/',
            '/(\s)+\}/',
            '/\((\s)+/',
            '/(\s)+\(/',
            '/\)(\s)+/',
            '/(\s)+\)/',
            '/\=(\s)+/',
            '/(\s)+\=/',
            '/&&(\s)+/',
            '/(\s)+&&/',
            '/(\s)+!/',
            '/<!--[^\[](.*?)-->/',
            '/\/\*(.*?)\*\//',
        );

        $replace = array(' ', '>', '<', '{', '{', '}', '}', '(', '(', ')', ')', '=', '=', '&&', '&&', '!', );
        $buffer = preg_replace($search, $replace, $buffer);
        return $buffer;
    }
}

if(!function_exists('limitarTexto')){
    function limitarTexto($texto, $limite){
        
      $contador = strlen($texto);
      if ( $contador > $limite ) {      
          $texto = substr($texto, 0, $limite) . '...';
          return $texto;
      }
      else{
        return $texto;
      }
    } 
}

if(!function_exists('base64_url_encode')){
    function base64_url_encode($input)
    {
        return strtr(base64_encode($input), '+/=', '._-');
    }
}	

if(!function_exists('base64_url_decode')){
    function base64_url_decode($input)
    {
        return base64_decode(strtr($input, '._-', '+/='));
    }
}

if(!function_exists('extensao')) {
    function extensaoImg($tipo)
    {
        $img_cam = base_url() . 'assets/imagem/icone';

        switch ($tipo) {
            case 'gif':
                $ext = $img_cam . '/gif.png';
                break;
            case 'png':
                $ext = $img_cam . '/png.png';
                break;
            case 'jpg':
            case 'jpeg':
                $ext = $img_cam . '/jpg.png';
                break;
            case 'pdf':
                $ext = $img_cam . '/pdf.png';
                break;
            case 'doc':
            case 'docx':
                $ext = $img_cam . '/doc.png';
                break;
            default:
                $ext = '';
                break;
        }
        return $ext;
    }
}

if(!function_exists('image_type')) {
    function image_type($type) {
        $imageTypeArray = array
        (
            0=>'UNKNOWN',
            1=>'GIF',
            2=>'JPEG',
            3=>'PNG',
            4=>'SWF',
            5=>'PSD',
            6=>'BMP',
            7=>'TIFF_II',
            8=>'TIFF_MM',
            9=>'JPC',
            10=>'JP2',
            11=>'JPX',
            12=>'JB2',
            13=>'SWC',
            14=>'IFF',
            15=>'WBMP',
            16=>'XBM',
            17=>'ICO',
            18=>'COUNT'
        );
        return $imageTypeArray[$type];
    }
}

if(!function_exists('trata_url')) {
    function trata_url($input){
        $input = str_replace(",","", $input);
        $input = str_replace("'","", $input);
        $input = str_replace('"',"", $input);
        $input = str_replace("/","-", $input);
        $input = str_replace("(","", $input);
        $input = str_replace(")","", $input);
        $input = str_replace("[","", $input);
        $input = str_replace("]","", $input);
        $input = str_replace("{","", $input);
        $input = str_replace("}","", $input);
        $input = str_replace("*","", $input);
        $input = str_replace(" ","-", preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($input))));
        return strtolower($input);
    }
}

if(!function_exists('replace_accents')) {

    function replace_accents($str) {
        $str = htmlentities($str, ENT_COMPAT, "UTF-8");
        $str = preg_replace('/&([a-zA-Z])(uml|acute|grave|circ|tilde);/', '$1', $str);
        return html_entity_decode($str);
    }

}

if(!function_exists('remove_accent')) {

    function remove_accent($str) {
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
        return str_replace($a, $b, $str);

        //$string = preg_replace( '/[«»“”!?,.]+/', '', $string ); //CARACTERES MALUCOS
    }

}

if(!function_exists('limitar_texto')) {
    function limitar_texto($texto, $qtde_caracteres) {

        return substr($texto, 0, $qtde_caracteres) . "...";
    }
}

if(!function_exists('formata_views')) {
    function formata_views($numero) {
        $numero = intval($numero);
        
        if($numero > 9999){
            return number_format($numero / 1000, 1, '.') + 'k';
        }elseif($numero > 999999){
            return number_format($numero / 1000, 1, '.') + 'm';
        }elseif($numero > 999999999){
            return number_format($numero / 1000, 1, '.') + 'b';
        }else{
            return $numero;
        }
    }
}


