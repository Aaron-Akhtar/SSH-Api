<?php
  include('Net/SSH2.php');
  //Coded by Aaron Akhtar - The Secret Intelligence - Shprqness
  //May not be the best code, this is my first ever php script ;P

  //edit the information below to match your ssh details or this will not work!
  $address = "1.1.1.1";
  $user = "root"; //do not change unless you are using another user from root
  $password = "myServerPasswordHere";

  $type = $_GET["type"];

  //you can create more then one command type here, for example, if
  //i set a type as 'HELLO' and copy and paste a if statement that checks
  //if the type is equal too 'HELLO' i can execute a command like '# HELLO' through the
  //remote ssh.

  $types = array("command1", "command2");

  if(empty($command)){
    echo "Please specify a command to send to the server...";
    die();
  }

  function execute(){
    global $address;
    global $types;
    global $user;
    global $password;
    $connection = ssh2_connect($address, 22);
    if(ssh2_auth_password($connection, $user, $password)){
      if(in_array("command1", $types)){
        //this is where you can set your custom command, just edit the code.
        if(ssh2_exec($connection, "mkdir directory1")){
          echo "Sent Command!";
        }else{
          echo "Couldn't send command!";
          die();
        }
      }else if(in_array("command2", $types)){
        if(ssh2_exec($connection, "mkdir directory2")){
          echo "Sent Command!";
        }else{
          echo "Couldn't send command!";
          die();
        }
      }else{
        die("Invalid Params.");
      }
    }else {
      die("Could not connect to server...");
    }

  }

  execute();

 ?>
