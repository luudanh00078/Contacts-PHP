<?php
class User
{ 
    var $id;
    var $userName;
    var $passWord;
    var $name;
    var $email;
    function User($id, $userName, $passWord, $name, $email)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->passWord = $passWord;
        $this->name = $name;
        $this->email = $email;
    }
    // static function authentication($userName, $pw)
    // {
    //     if ($userName == "luudanh00078@gmail.com" && $pw == "123")
    //         return new User($userName, $pw, "Luu Danh");
    //     return null;
    // }
    static function authentication($userName)
    {
          //b1: mo ket noi voi DB
          $conn = new mysqli('localhost', 'user_hoang', '12345', 'danhbalienlac');
          $conn->set_charset("utf8");
          if($conn->connect_error){
              die('kết nối thất bại' . $conn->connect_error);
          }else{
              //echo 'kết nối thành công';
              }
          //b2:thao tac voi DB
            $query = "SELECT * FROM users WHERE username = '$userName'";
            $result = $conn->query($query);
            $rs = array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                  array_push($rs, new User(
                      $row["id"],
                      $row["username"],
                      $row["password"],
                      $row["name"],
                      $row["email"]
                      
                  ));
                }
            }
             //b3:Dong ket noi voi DB
         $conn->close();
         return $rs;
    }
}
