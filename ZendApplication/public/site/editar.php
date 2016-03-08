<?php
require_once('../models/bootstrap.php');

$Carro = new Carro();

if (isset($_POST['idcarro'])) {
    $Carro->setIdcarro($_POST['idcarro']);    
    $Carro->setNome($_POST['nome']);
    $Carro->setMarca($_POST['marca']);        
    
    $verifica = $Carro->atualizaCarro();

    if ($verifica == true) {
        header("Location: index.php?msg=atualizou");
    } 
    else 
    {
        header("Location: index.php?msg=erro");
    }
}

$Carro->setIdcarro($_GET['id']);
$reg = $Carro->pesquisaCarroById();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Trabalhando com Doctrine</title>
    </head>
    <body>        
        <h1>Cadastro de Carros</h1>
        <form method="post" action="editar.php">
            <input type="hidden" name="idcarro" value="<?php echo $reg['idcarro'] ?>" />
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nome" value="<?php echo $reg['nome'] ?>" /></td>
                </tr>
                <tr>
                    <td>Marca:</td>
                    <td>
                        <select name="marca">
                            <option value="GM"   <?php echo ($reg['marca'] == 'GM' ? 'selected' : '') ?> >GM</option>
                            <option value="Fiat" <?php echo ($reg['marca'] == 'Fiat' ? 'selected' : '') ?> >Fiat</option>
                            <option value="Ford" <?php echo ($reg['marca'] == 'Ford' ? 'selected' : '') ?> >Ford</option>
                            <option value="VW"   <?php echo ($reg['marca'] == 'VW' ? 'selected' : '') ?> >VW</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Atualizar"/></td>
                </tr>
            </table>
        </form>        
    </body>
</html>
