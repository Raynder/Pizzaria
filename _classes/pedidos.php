<?php
    Class Pedido{
        private $pdo;
        public $erro;

        public function conectar($nome, $host, $usuario, $senha){ //função de conectar ao DB
            try { // tentar conexão
                global $pdo;
                global $erro;

                $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha); //criar nova conexão
            }catch (PDOException $e) { //se der erro
                $erro = $e->getMessage(); //armazenar o erro
            }

            global $pdo;
        }

        public function adicionar($nsab1, $nsab2, $tam, $bor) //declarar função e os parametros a receber
        {
            global $pdo; //declarar como global para podermos usa-la aqui


            $sql = $pdo->prepare("INSERT INTO pizzas (saborx, sabory, tamanho, borda, id_cliente)VALUES (:x, :y, :t, :b, :i)"); //inserir na tab(col, col) os valores :x e :y
            $sql->bindValue(":x",$nsab1);
            $sql->bindValue(":y",$nsab2);// passar os paramentros para os valores que serão passados para tabale
            $sql->bindValue(":t",$tam);
            $sql->bindValue(":b",$bor);
            $sql->bindValue(":i",$_SESSION['id']);

            $sql->execute(); //executar açoes



            return true;
        }
        public function adicionarbeb($beb){
            global $pdo; //declarar como global para podermos usa-la aqui

            $sql = $pdo->prepare("INSERT INTO bebidas (nome_bebida, id_cliente) VALUES (:r, :i)");
            $sql->bindValue(":r",$beb);
            $sql->bindValue(":i",$_SESSION['id']);

            $sql->execute();
        }
        public function adicionarobs($obs){
            global $pdo;

            $sql = $pdo->prepare("INSERT INTO observacoes (observacao, id_cliente) VALUES (:o, :i)");
            $sql->bindValue(":o",$obs );
            $sql->bindValue(":i",$_SESSION['id']);

            $sql->execute();
        }

        /*public function buscarNome($id){

            global $pdo;

            $array = array();

            $sql = 'SELECT nome from usuario where id = :id';
            $sql = $pdo->prepare($sql);
            $sql->bindValue("id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetch();
            }

            return $array;
        }*/
    }
