<?php

class Food {
  // Properties
  public $name;
  public $img;
  public $description;

  // Methods
  function createFoodCart($name, $img, $description) {
    $this->name = $name;
    $this->img = $img;
    $this->description = $description;

    $cartElement = " 
        <div class='card my=5' style='width: 18rem;'> 
            <img src='./assets/images/$img.jpg' class='card-img-top' alt=''>
            <div class='card-body'>
                <h5 class='card-title'>$name</h5>
                <p class='card-text'>$description</p>
                <form action='./checkout.php'><input type='submit' class='btn btn-warning' value='Add to card'></form>
            </div>
        </div>
       ";

    echo $cartElement;
    
  }

}

?>