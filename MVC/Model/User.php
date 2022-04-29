<?php

require_once("Conexion.php");
class User extends Conexion
{
    private $intUserType;
    private $strName;
    private $strLastname;
    private $strTelephone;
    private $strEmail;
    private $strPassword;
    private $strCountry;
    private $strCity;
    private $intPostalCode;
    private $strAddress1;
    private $strAddress2;

    function addUser(int $userType, string $name, string $lastname, string $telephone, string $email, 
    string $password, string $country, string $city, int $postalCode, string $address1, string $address2)
    {
        $sql = "INSERT INTO user(userType, name, lastname, telephone, email,
        password, country, city, postalCode, address1, address2)  
        VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $this->intUserType = $userType;
        $this->strName = $name;
        $this->strLastname = $lastname;
        $this->strTelephone = $telephone;
        $this->strEmail = $email;
        $this->strPassword = $password;
        $this->strCountry = $country;
        $this->strCity = $city;
        $this->intPostalCode = $postalCode;
        $this->strAddress1 = $address1;
        $this->strAddress2 = $address2;
        $result= $this->connect()->prepare($sql);
        $result->execute([$userType, $name, $lastname, $telephone, $email, $password, 
         $country, $city, $postalCode, $address1, $address2]);
        if (!$result) {
            die("Errorsote");
        }
        header("Location: ../index.php");
    }

    function getUser($id) // Obtiene las fuentes asignadas al ID del usuario.
    {
        $sql= "SELECT * FROM user WHERE id = ? "; 
        $result= $this->connect()->prepare($sql);
        $result->execute([$id]);   
        return $result;
    }

    function getUsers() // Obtiene las fuentes asignadas al ID del usuario.
    {
        $sql= "SELECT * FROM user"; 
        $result= $this->connect()->prepare($sql);
        $result->execute();   
        return $result;
    }

    function updateUser(int $id, string $name, string $lastname, string $telephone, string $email, 
    string $password, string $country, string $city, int $postalCode, string $address1, string $address2) // Obtiene las fuentes asignadas al ID del usuario.
    {
        $sql= "UPDATE user SET name = ?, lastname = ?, telephone = ?, email = ?,
        password = ?, country = ?, city = ?, postalCode = ?, address1 = ?, address2 = ?  WHERE id = ?"; 
        $result= $this->connect()->prepare($sql);
        $result->execute([ $name, $lastname, $telephone, $email, $password, 
        $country, $city, $postalCode, $address1, $address2, $id]);   
        header("Location: ../View/RegisterView.php");
    }


    function deleteUser(int $id)
    {

        $sql1= "DELETE FROM user WHERE id = ?";
        $result= $this->connect()->prepare($sql1);
        $result->execute([$id]);   
        $sql2 = "DELETE FROM source WHERE UserId = ?";
        $result= $this->connect()->prepare($sql2);
        $result->execute([$id]);   
        $sql3 = "DELETE FROM feed WHERE UserId = ?";
        $result= $this->connect()->prepare($sql3);
        $result->execute([$id]);   
        header("Location: ../View/RegisterView.php");

    }


}
