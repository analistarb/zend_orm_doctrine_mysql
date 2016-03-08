<?php
require_once('../models/bootstrap.php');

$verifica = '';
$verifica_exclusao = '';
$Carro = new Carro();

//Condição para Salvar
if (isset($_POST['nome'])) {
    $Carro->setNome($_POST['nome']);
    $Carro->setMarca($_POST['marca']);
    $verifica = $Carro->inserirCarro();
}

//Condição para Excluir
if (isset($_GET['acao']) == 'excluir' && isset($_GET['id']) != '') { 
    $Carro->setIdcarro($_GET['id']);
    $verifica_exclusao = $Carro->excluirCarro();
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Trabalhando com Doctrine</title>
    </head>
    <body>
        <?php
        $msg = isset($_GET['msg']);

        if ($verifica == true) {
            echo "Dados salvos com sucesso!";
        }
        if ($verifica_exclusao == true) {
            echo "Dados excluidos com sucesso!";
        }

        if (isset($_GET['msg'])) {
            if (!empty($_GET['msg'])) {
                if ($_GET['msg'] == 'atualizou') {
                    echo "Dados atualizados com sucesso!";
                }
                if ($_GET['msg'] == 'erro') {
                    echo "Erro ao atualizados os dados!";
                }
            }
        }
        ?>
        <h1>Cadastro de Carros</h1>
        <form method="post" action="index.php">
            <table>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nome" /></td>
                </tr>
                <tr>
                    <td>Marca:</td>
                    <td>
                        <select name="marca">
                            <option value="GM">GM</option>
                            <option value="Fiat">Fiat</option>
                            <option value="Ford">Ford</option>
                            <option value="VW">VW</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Salvar"/></td>
                </tr>
            </table>
        </form>

        <?php
        $rs = $Carro->pesquisaCarros();
        echo "<table border='1'>\n";
        echo "<tr>\n";
        echo "<td>Código</td>\n";
        echo "<td>Nome</td>\n";
        echo "<td>Marca</td>\n";
        echo "</tr>\n";

        foreach ($rs as $reg) {
            echo "<tr>\n";
            echo "<td>$reg->idcarro</td>";
            echo "<td>$reg->nome</td>";
            echo "<td>$reg->marca</td>";
            echo "<td><a href='editar.php?id=" . $reg->idcarro . "'>Editar</a></td>\n";
            echo "<td><a href='?acao=excluir&id=" . $reg->idcarro . "'>Excluir</a></td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";
        ?>

    </body>
</html>
