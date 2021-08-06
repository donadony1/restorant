<?php 
require_once 'composants/header.php';

try{
    $bdd= new pdo('mysql:host=localhost;dbname=cart;charset=utf8', 'root',  '',
    [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
   
}
catch(exception $e){
    die('Error: ' .$e->getMessage());
}

?>




<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

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
                            <th>nom du plat</th>
                            <th>description</th>
                            <th>prix</th>
                            <th>activation du plat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>nom du plat</th>
                            <th>description</th>
                            <th>prix</th>
                            <th>activation du plat</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php                          
                                try{
                                    $bdd= new pdo('mysql:host=localhost;dbname=cart;charset=utf8', 'root',  '',
                                    [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                                
                                }
                                catch(exception $e){
                                    die('Error: ' .$e->getMessage());
                                }

                                                                        
                                       $re2 = "SELECT * FROM cart_items ORDER BY id DESC";
                                        $afficha = $bdd->query($re2);

                     
                                        
                    ?>
                        <?php
                                                         
                    while($donne=$afficha->fetch()){  
                ?>
                        <tr>
                            <td> <?= $donne['nom'] ?></td>
                            <td><em> <?= $donne['descrire'] ?></td>
                            <td> <b><?= number_format($donne['price'], 0, '.', '') ?></b></td>
                            <td>
                                <a href="supprime.php"><i class="fa fa-trash"></a>
                                <a href="voirplat.php ?di=<?=$donne['id'];?>"> <i class="fa fa-eye"></i></a>
                                <a href="#"> <i class="fa fa-plus"></i></a>

                            </td>

                        </tr>
                        <?php 
                    }if(isset($_GET['action'])=='delete'){
                        $id=$_GET['id'];
                        $supp=$bdd->query("DELETE FROM cart_items WHERE id=$id");
                        $supp->execute();
                    }
                
                
                    ?>

                    </tbody>
                </table>











                <?php                  
                                             
        require_once 'composants/footer.php';
  ?>