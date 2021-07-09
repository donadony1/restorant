 <?php
 session_start();


 $connect = mysqli_connect("localhost", "root", "", "cart"); 
 
// var_dump($_SESSION['user']);
 
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


if(isset($_SESSION['cart'])){
    $num_items = count($_SESSION['cart']);
}
else{

    $num_items= 0;
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
     <link rel="stylesheet" href="../../assets/styles/style.css">
 </head>

 <body>


     <style>
     input[type='submit'] {
         margin: 5px 0px 5px 0px;
     }

     .table-striped>tbody>tr:nth-child(2n+1)>td,
     .table-striped>tbody>tr:nth-child(2n+1)>th {
         background-color: rgb(37, 77, 47);
     }
     </style>

     <div class="container-fluid">
         <div onclick="toggle()" class="cart_icon">
             <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="darkgreen" class="bi bi-cart4"
                 viewBox="0 0 16 16">
                 <path
                     d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
             </svg><span class="num_items">(<?= $num_items?>)</span>
         </div>
         <div class="col-md-12">
             <div class="cart_container">
                 <div class="col-md-6 plate_container">
                     <h2 class="text-center"> Passer votre commande</h2>
                     <div class="col-md-12">
                         <div class="row">


                             <?php
                     
                     $query = mysqli_query($connect, "SELECT * FROM cart_items");
                     
                     while( $row = mysqli_fetch_array($query)){
                         
                         //  echo "ID =  " . $row['id'] . "  name =  "  .$row['name'] . "  price =  " . $row['price'] . "<br>" ;
                         ?>
                             <div class="col-md-4">
                                 <form action="cart.php" method="POST">
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
                 <div id="recipt" class="col-md-6 recipt">
                     <div class="item">
                         <h2 class="text-center">Plat choisi</h2>

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
      
      $total = 0;
      if(!empty($_SESSION['cart'])){
        

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
                   <form action='cart.php' method='POST'>
                   <input type='hidden' name='remove' value='$id'/>
                    <input type='submit' name='remove_plate' value='Remove' class='btn btn-danger btn-block'/>
                    </form>
                    </td>
              
               </tr>
               ";

               $num_items++;
              $total = $total + $value['price'] * $value['quantity'];
          }
          
          
          $output .= "
          <tr>
            <td colspan='3'></td>
            <td><b>Total Price</b></td>
            <td> " .number_format($total,2)." frs</td>
            <td>
            <form action='cart.php' method='POST'>
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
          </table>
          ";
      }

       $output_user.= '
        <form action="cart.php" method="POST">
          <input type="submit" class="btn btn-success btn-block" value="Confirm your order" name="confirm">
        </form>';

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