<?php

class bd
{

    private $bd_tipo = "mysql";
    private $bd_host = "localhost";
    private $bd_nome = "trab_tai_2021";
    private $bd_porta = "3306";
    private $bd_usuario = "root";
    private $bd_senha = "";
    private $bd_charset = "utf8mb4";

    public function connection()
    {
        $str_conn = $this->bd_tipo . ":host=" . $this->bd_host .
            ";dbname=" . $this->bd_nome . ";port=" . $this->bd_porta;

        return new PDO(
            $str_conn,
            $this->bd_usuario,
            $this->bd_senha,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->bd_charset)
        );
    }

    public function select($nameTable)
    {
        $conn = $this->connection();

        $stmt = $conn->prepare("SELECT * FROM $nameTable");

        $stmt->execute();

        return $stmt;
    }

    public function find($nameTable, $id)
    {
        $conn = $this->connection();

        $stmt = $conn->prepare("SELECT * FROM $nameTable WHERE id = ?;");

        $stmt->execute([$id]);

        return $stmt->fetchObject();
    }

    
    public function update($nameTable, $dados)
    {
        $id = $dados['id'];
        $sql = "UPDATE $nameTable SET ";

        $flag = 0;
        $arrayValor = [];
        foreach ($dados as $campo => $valor) {

            if ($flag == 0) {
                $sql .= " $campo = ?";
            } else {
                $sql .= ", $campo = ?";
            }
            $flag = 1;
            $arrayValor[] = $valor;
        }

        $sql .= " WHERE id = $id;";

        $conn = $this->connection();

        $stmt = $conn->prepare($sql);

        $stmt->execute($arrayValor);

        return $stmt;
    }

    public function insert($nameTable, $dados)
    {
        unset($dados['id']);
        $sql = "INSERT INTO $nameTable(";

        $flag = 0;
        foreach ($dados as $campo => $valor) {
            $sql .= ($flag == 0 ? $campo : ", $campo");

            $flag = 1;
        }

        $sql .= ") VALUES (";

        $flag = 0;
        $arrayValue = [];
        foreach ($dados as $campo => $valor) {

            $sql .= ($flag == 0 ? " ? " : ", ?");
            $flag = 1;

            $arrayValue[] = $valor;
        }

        $sql .= ");";

        $conn = $this->connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($arrayValue);

        return $stmt;
    }

    public function remove($nameTable, $id)
    {
        $conn = $this->connection();

        $stmt = $conn->prepare("DELETE FROM $nameTable WHERE id = ?;");

        $stmt->execute([$id]);

        return $stmt;
    }

    public function search($nameTable, $dados)
    {
        $conn = $this->connection();
        $campo = $dados['tipo'];

        $stmt = $conn->prepare("SELECT * FROM $nameTable WHERE $campo like ?;");

        $stmt->execute(["%" . $dados['valor'] . "%"]);

        return $stmt;
    }
}