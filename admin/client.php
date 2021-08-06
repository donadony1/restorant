<?php 
require_once 'composants/header.php';
?>



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>ville</th>
                        <th>quarter</th>
                        <th>contact</th>
                        <th>email</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php                          
                                try{
                                    $bdd= new pdo('mysql:host=localhost;dbname=cart;charset=utf8', 'root',  '',
                                    [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                                
                                }
                                catch(exception $e){
                                    die('Error: ' .$e->getMessage());
                                }

                                                                        
                                       $re2 = "SELECT * FROM users ORDER BY id DESC";
                                        $afficha = $bdd->query($re2);
                                        $afficha->execute();

                     
                                        
                    ?>
                    <?php
                                                         
                    while($donne=$afficha->fetch()){  
                ?>
                    <tr>
                        <td> <?= $donne['name'] ?></td>
                        <td> <?= $donne['Town'] ?></td>
                        <td> <b><?=$donne['Quarter'] ?></b></td>
                        <td><?=$donne['Contact'] ?></td>
                        <td><?=$donne['Email'] ?></td>

                    </tr>
                    <?php 
            
                    }
                
               ?>


                </tbody>
            </table>










            <?php


require_once 'composants/footer.php';
?>