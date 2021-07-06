 <?php
 session_start();

 $connect = mysqli_connect("localhost", "root", "", "cart"); 
 
 $user = array(
     'name' => 'clinton',
     'Town' => 'Douala',
     'quater' => 'ndokoti',
     'email' => 'mbiakopclinton@gmail.com',
     'contact' => '680703714'
 );


 $_SESSION['user'][] = $user;

//  $user_array = 
 

 var_dump($_SESSION['user'][0]['name']);
 
 if(isset($_POST['add_to_cart'])){

     if(isset($_SESSION['cart'])){
         
        $session_array_id = array_column($_SESSION['cart'], "id");
        
        if(!in_array($_POST['id'], $session_array_id)){
            
            $session_array = array(
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
                
            );
         $_SESSION['cart'][] = $session_array;
         
        }
        
        
    } else {
        $session_array = array(
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
            
        );
        
        $_SESSION['cart'][] = $session_array;
    }
}



 ?>




 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>cart</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>

 <body>


     <style>
     .table-striped>tbody>tr:nth-child(2n+1)>td,
     .table-striped>tbody>tr:nth-child(2n+1)>th {
         background-color: rgb(37, 77, 47);
     }
     </style>

     <div class="container-fluid">
         <div class="col-md-12">
             <div class="row">
                 <div class="col-md-6">
                     <h2 class="text-center"> Shopping cart detail </h2>
                     <div class="col-md-12">
                         <div class="row">


                             <?php
                     
                     $query = mysqli_query($connect, "SELECT * FROM cart_items");
                     
                     while( $row = mysqli_fetch_array($query)){
                         
                         //  echo "ID =  " . $row['id'] . "  name =  "  .$row['name'] . "  price =  " . $row['price'] . "<br>" ;
                         ?>
                             <div class="col-md-4">
                                 <form action="index.php" method="POST">
                                     <img src="./images/<?= $row['id'];?>.jpg" alt="" style="height: 150px;">
                                     <h5><?= $row['name'] ?></h5>
                                     <h5><?= $row['price'] ?></h5>
                                     <input type="hidden" name="name" value="<?= $row['name']?> ">
                                     <input type="hidden" name="price" value="<?= $row['price']?> ">
                                     <input type="hidden" name="id" value="<?= $row['id']?> ">
                                     <input type="number" min="1" value="1" name="quantity">
                                     <input type="submit" name="add_to_cart" value="Add to cart"
                                         class="btn btn-warning btn-block">
                                 </form>


                             </div>



                             <?php
                         
                     }
                     
                     
                     ?>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="item">
                         <h2 class="text-center">Item selected</h2>

                         <?php

$output = "";
      $output.= "
      <table class='table table-bordered table-striped'>
      <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total Price</th>
      <th>Action</th>
      </tr>
      
      
      ";
      
      if(!empty($_SESSION['cart'])){
          $total = 0;

          foreach ($_SESSION['cart'] as $key => $value){
              $id  = $value['id'];  
              
              $output.= "
              <tr>
               <td>$id</td>
               <td> ".$value['name']." </td>
               <td> ".$value['price']." </td>
               <td> ".$value['quantity']." </td>
               <td> " .number_format($value['price'] * $value['quantity'], 2)." frs</td>
               <td> 
                   <form action='index.php' method='POST'>
                   <input type='hidden' name='remove' value='$id'/>
                    <input type='submit' name='remove_plate' value='Remove' class='btn btn-danger btn-block'/>
                    </form>
                    </td>
              
               </tr>
               ";

              $total = $total + $value['price'] * $value['quantity'];
          }
          
          
          $output .= "
          <tr>
            <td colspan='3'></td>
            <td><b>Total Price</b></td>
            <td> " .number_format($total,2)." frs</td>
            <td>
            <form action='index.php' method='POST'>
            <input type='submit' id='clear' name='clear_plate' value='Clear' class='btn btn-warning btn-block'/>
            </form>
            </td>
            
            </tr>
            </table>
            ";
      }

      
      
      echo $output;

?>


                     </div><br>

                     <div class="billing">
                         <h4 class="text-center">Billing info</h4>

                         <?php

$output_user = "";
      $output_user.= "
      <table class='table table-bordered '>
      <tr>
      <th>Name</th>
      <th>Town</th>
      <th>Quater</th>
      <th>Email</th>
      <th>Contact</th>
      </tr>
      
      
      ";

      if(isset($_SESSION['user'])){
          $output_user.= "

          <tr>
          <td>". $_SESSION['user'][0]['name'] ."</td>
          <td>" . $_SESSION['user'][0]['Town'] . "</td>
          <td>" . $_SESSION['user'][0]['quater']. "</td>
          <td>"  . $_SESSION['user'][0]['email']. "</td>
          <td> " . $_SESSION['user'][0]['contact']. "</td>
          
          
          </tr>
          ";
      }

      echo $output_user;

      ?>
                     </div>
                 </div>
             </div>
         </div>

         <?php

     if(isset($_POST['clear_plate'])){
         unset($_SESSION['cart']);
       

    
     }

     
     if(isset($_POST['remove_plate'])){

         $remove_id = $_POST['remove'];

        foreach($_SESSION['cart'] as $key => $value){
          if($value['id'] == $remove_id){
              unset($_SESSION['cart'][$key]);
              echo "<script>window.location.reload()</script>";
          }

        }

     }
     
     ?>


         <script src="app.js"></script>
 </body>

 </html>