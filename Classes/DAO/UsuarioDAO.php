<?php
    class UsuarioDAO
    {
        private $conexao;

        public function __construct()
        {
            $this->conexao = new Conexao();            
        }

        public function ConsultarTodosUsuarios()
        {
            $sql = 'SELECT * FROM usuarios';
            $resultado = mysqli_query($this->conexao->getCon(),$sql);

            if(mysqli_num_rows($resultado) > 0)
            {
                return $resultado;
            }
            else
            {
                return false;
            }
        }

        public function ConsultarCodigo($codigo)
        {
            $sql = "SELECT * FROM usuarios WHERE id = {$codigo}";
            $resultado = mysqli_query($this->conexao->getCon(),$sql);

            if(mysqli_num_rows($resultado) > 0)
            {
                return $resultado;
            }
            else
            {
                return false;
            }
        }        

        public function ConsultarIdadeSexo($idade,$sexo)
        {
            $sql = "SELECT * FROM usuarios WHERE sexo = '{$sexo}' and idade = {$idade}";
            $resultado = mysqli_query($this->conexao->getCon(),$sql);

            if(mysqli_num_rows($resultado) > 0)
            {
                return $resultado;
            }
            else
            {
                return false;
            }
        }   
    }
?>