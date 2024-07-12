<?php

session_start();
class users
{

    private $conn;

    public function __construct()
    {

        $this->conn = new mysqli("localhost", "root", "", "newdb");


        if ($this->conn->connect_error) {

            die("connection error  " . $this->conn->connect_error);
        } else {
            // echo "connection succcesful";
        }
    }


    public function add($request)
    {

        $name = $request['name'];
        $email = $request['email'];
        $comment = $request['comment'];

        $query1 = "insert into users(name,email,comment) VALUES('$name','$email','$comment')";
        $this->conn->query($query1);
    }


    public function view()
    {

        $query2 = "select * from users where 1";

        $result = $this->conn->query($query2);

        if ($result->num_rows > 0) {

            $data = [];

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $_SESSION['data'] = $data;
            header('location:OutPut.php');
        }
    }
}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['submit'])) {
        $user = new users;
        $user->add($_REQUEST);
    } elseif (isset($_POST['view'])) {
        $user = new users;
        $user->view();
    }
}
