<?php
    class person{
        private $id=0;
        private $name=null;
        private $email=null;

        public function setId(int $id):void
        {
            $this->id=$id;
        }
        public funcion getId():int{
            return $this->id;
        }

        
        public function setNome(string $nome):void
        {
            $this->nome=$nome;
        }
        public function getNome():string
        {
            return $this->nome;
        }
        
        public function setEmail(string $email):void
        {
            $this->email=$email;
        }
        public function getEmail():string
        {
            return $this->email;
        }

    private function connection(){
        return new \PDO("mysql:host=localhost;dbname=crudPhpApi","root","");
    }

    public function create():array
    {
        $connection=$this->connection();
        $sql='INSERT INTO users(nome,email) VALUES(:nome,:email)';
        $statement=$connection->prepare($sql);
        $statement->bindValue(":nome",$this->getNome(),\PDO::PARAM_STR);
        $statement->bindValue(":email",$this->getEmail(),\PDO::PARAM_INT);
        if($statement->execute()){
            $this->setId($connection->lastInsertId());
            return $this->read();
        }
        return [];
    }

    public function read():array{
        $connection=$this->connection();
        

    if($this->getId()===0){
        $sql='SELECT * FROM users';
        $statement=$connection->prepare($sql);
        if($statement->execute()){
            $data=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }elseif ($this->getId()>0) {
        $sql='SELECT * FROM users WHERE id= :id';
        $statement=$connection->prepare($sql);
        $statement->bindValue("id",$this->id);
        if($statement->execute()){
            $data=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
       return [];
    }
}
?>