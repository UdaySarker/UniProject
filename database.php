<?php

class Database
{
    public $host = HOST;
    public $user = USER;
    public $pass = PASSWORD;
    public $database = DATABASE;

    public $link;
    public $error;

    public function __construct()
    {
        $this->connection();
    }

    private function connection()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->database);

        if(!$this->link)
        {
            $this->error = "connection failed".$this->link->connect_error;
            return false;
        }
    }

    public function select($query)
    {
        $result = $this->link->query($query) or die ($this->link->error.__LINE__);

        if($result->num_rows > 0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
    public function selectDept($query){
      $result=$this->link->query($query) or die($this->link->error.__LINE__);
      if($result->num_rows>0){
        return $result->fetch_all(MYSQLI_ASSOC);
      }else{
        return false;
      }
    }
    public function selectCourse(){
      $query="select * from course";
      $result=$this->link->query($query) or die($this->link->error.__LINE__);
      if($result->num_rows>0){
        return $result->fetch_all(MYSQLI_ASSOC);
      }else{
        return false;
      }
    }
    public function insert($query)
    {
        $result = $this->link->query($query) or die ($this->link->error.__LINE__);

        if($result)
        {
            echo "data inserted successfully";
        }
        else
        {
            return false;
        }
    }

     public function update($update_query)
    {
        $result = $this->link->query($update_query) or die ($this->link->error.__LINE__);

        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

     public function delete($query)
    {
        $result = $this->link->query($query) or die ($this->link->error.__LINE__);

        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
      public function takenCourse($id){
        $sql="select taken_course from student where id=$id";
        $query=$this->link->query($sql);
        return $query->fetch_assoc();
      }

}
