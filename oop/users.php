<?php
    function __autoload($classname){
        $filename = "classes/" . $classname . ".class.php";
        require($filename);
    }
    //Обьекты класса User
    $user1 = new User("Alex", "admin", "qwerty");
    $user2 = new User("John", "gohn_great", "sup12");
    $user3 = new User("Albert", "alba", "z5fvdf");
    $user5 = new User("Albert", "alba", "z5fvdf");
    $user4 = clone $user3; 
    $user1->showInfo();
    $user2->showInfo();
    $user3->showInfo();
    $user4->showInfo();
    
    //Обьекты класса SuperUser
    $user = new SuperUser("Vasia", "super_vasia", "passqe", "admin");
    $user1 = new SuperUser("Peter", "super_pet", "passqe", "admin");
    $user3 = new SuperUser("Peter", "super_pet", "passqe", "admin");
    $user->showInfo(); 
    $user1->showInfo();
    $user->getInfo();
    
    echo "Число пользователей класса SuperUser: " . SuperUser::$counter . "<br>";
    echo "Число пользователей класса User: " . User::$counter . "<br>";
?>