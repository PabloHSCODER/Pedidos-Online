<?php
include_once("valida.php");

include_once("connectBD.php");
include_once("process.php");

            if (isset($_POST['add_cart'])){
              if(isset($_SESSION['carrinho'])){
                $session_array_id = array_column($_SESSION['carrinho'], "id");

                if(!in_array($_GET['id'],$session_array_id)){
                  $session_array=array(
                    'id'=> $_GET['id'],
                    "nome"=>$_POST['nome'],
                    "preco"=>$_POST['preco'],
                    "quantidade"=> $_POST['quantidade']
                  );
                  $_SESSION['carrinho'][] = $session_array;
                }

              }else{
                $session_array=array(
                  'id'=> $_GET['id'],
                  "nome"=>$_POST['nome'],
                  "preco"=>$_POST['preco'],
                  "quantidade"=> $_POST['quantidade']
                );
                $_SESSION['carrinho'][] = $session_array;
              }
            }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pedido</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">


</head>

<body>
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <h2 class="text-center">produtos</h2>
          <div class="col-md-12">
            <div class="row">


              <?php
              $query = "SELECT * FROM cadastro.itens";
              $result = mysqli_query($conn, $query);


              while ($row = mysqli_fetch_array($result)) { ?>
                <div class="col-md-4">
                  <form method="post" action="index.php?id=<?= $row['id'] ?>">
                    <?php
                    $imageData = $row['imagem'];
                    $base64Image = base64_encode($imageData);
                    $imageType = $row['imagem_type'];
                    $imageSrc = 'data:' . $imageType . ';base64,' . $base64Image;
                    ?>
                    <img src="<?= $imageSrc ?>" style="height: 150px;">
                    <h2 class="text-center"><?= $row['nome'] ?></h2>
                    <h2 class="text-center">R$<?= number_format($row['preco'], 2); ?></h2>
                    <input type="hidden" name="nome" value="<?= $row['nome'] ?>">
                    <input type="hidden" name="preco" value="<?= $row['preco'] ?>">
                    <input type="number" name="quantidade" value="1" class="form-control">
                    <input type="submit" name="add_cart" class="btn btn-warning btn-block my-2" value="Adicione ao carrinho">
                  </form>
                </div>
              <?php
              }

              ?>
            </div>
          </div>
               <a href="valida.php?sair">deslogar</a> 



        </div>
        <div class="col-md-6"></div>
        <h2 class="text-center">Itens selecionados</h2>
        <?php
        $total_car =0;
        $output = "";

        $output = "
<table class='table table-bordered table-striped'>
<tr>
<th>ID</th>
<th>Nome</th>
<th>Preço</th>
<th>Quantidade</th>
<th>Total</th>
<th>Ação</th>
</tr>";

        if (!empty($_SESSION['carrinho'])) {
          foreach ($_SESSION['carrinho'] as $key => $value) {

            $total = $value['preco'] * $value['quantidade'];

            $output .= "
<tr>
<td>" . $value['id'] . "</td>
<td>" . $value['nome'] . "</td>
<td>R$" . number_format($value['preco'], 2) . "</td>
<td>" . $value['quantidade'] . "</td>
<td>R$" . number_format($total, 2) . "</td>
<td>
<a href='index.php?action=remove&id=" . $value['id'] . "'>
<button class='btn btn-danger btn-block'>Remover</button>
</a>
</td>
";
            $total_car = $total_car+$total;
          }


          $output.="
<tr>
<td colspan='3'></td>
<td></b>Total</b></td>
<td>".number_format($total_car,2)."</td>
<td>
<a href='index.php?action=clearall'>
<button class='btn btn-warning'>Limpar tudo</button>
</a>

</tr>
</tr>";




        }

        echo $output;

        ?>




      </div>
    </div>
  </div>
  
  </div>
 
</form>

<?php
if(isset($_GET['action'])){
 if($_GET['action']== "clearall"){
  unset($_SESSION['carrinho']);
 } 
if($_GET['action']=="remove"){
  foreach($_SESSION['carrinho'] as $key => $value){
    if($value['id'] == $_GET['id']){
      unset($_SESSION['carrinho'][$key]);
    }
  }
}

}

?>



</body>

</html>