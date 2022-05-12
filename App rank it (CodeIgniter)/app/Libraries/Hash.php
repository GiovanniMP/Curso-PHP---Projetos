<?php   namespace App\Libraries;

    class Hash{
        public static function make($senha){
            return password_hash($senha, PASSWORD_BCRYPT);
        }

        public static function check($senha_campo, $senha_db){
            if(password_verify($senha_campo, $senha_db)){
                return true;
            }else{
                return false;
            }
        }
    }

?>

