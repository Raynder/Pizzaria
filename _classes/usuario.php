<?php
    session_start();
    Class Usuario {
        private $pdo;
        public $msgErro = "";
        public function conectar($nome, $host, $usuario, $senha){
            try{
                global $pdo;
                global $msgErro;
                $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
            }catch (PDOException $e) {
                $msgErro = $e->getMessage();
            }

        }
        public function cadastrar($nome, $telefone, $endereco, $complemento, $email, $senha){
            global $pdo;

            //Verificar se ja existe email cadastrado
            $sql = $pdo->prepare("SELECT id FROM usuario WHERE email = :e"); //chamar função, e selecionar o id da tabela usuarios onde o email :e ja existe
            $sql->bindValue(":e",$email); // pegar o email capturado e colocar sobre o :e da tabela
            $sql->execute(); //executar os paços
            if($sql->rowCount() > 0){ //contas as linhas que foram encontradas, se for maior que 0, ja existe o email
                return false;//ja esta cadastrado
            }

            else{
                //caso não, Cadastrar
                $sql = $pdo->prepare("INSERT INTO usuario (nome, telefone, endereco, complemento, email, senha)VALUES (:n, :t, :l, :c, :e, :s)");
                $sql->bindValue(":n",$nome);
                $sql->bindValue(":t",$telefone);
                $sql->bindValue(":l",$endereco);
                $sql->bindValue(":c",$complemento);
                $sql->bindValue(":e",$email);
                $sql->bindValue(":s",md5($senha));
                $sql->execute();
                return true;
            }


        }
        public function logar($email, $senha){
            global $pdo;

            //verificar se o email e senha estão cadastrados, se sim
            $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :e AND senha = :s");
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));
            $sql->execute();


            if ($sql->rowCount() > 0){

                //entrar no sistema(sessão)
                $dado = $sql->fetch();
                
                $_SESSION['id'] = $dado['id'];
                $_SESSION['nome'] = $dado['nome'];

                return true; //logado com sucesso
            }
            else{
                return false;//não foi possivel logar
            }
        }
    }

