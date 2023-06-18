<?php
include_once '../model/crud.php';

class Controll
{
  private $crud;

  public function __construct()
  {
    $this->crud = new Crud();
  }

  public function selectByid($id, $tabela)
  {
    switch ($tabela) {
      case 1:
        $query = "call selectClientes('$id')";
        $result = $this->crud->getData($query);
        return $result;
        break;
      case 2:
        $query = "call selectEntregadores('$id')";
        $result = $this->crud->getData($query);
        return $result;
        break;
    }
  }

  public function addCliente()
  {
    if (isset($_POST['Submit'])) {
      $nome = $this->crud->escape($_POST['nome']);
      $telefone = $this->crud->escape($_POST['telefone']);
      $email = $this->crud->escape($_POST['email']);
      $doc = $this->crud->escape($_POST['doc']);
      $cep = $this->crud->escape($_POST['cep']);
      $cidade = $this->crud->escape($_POST['cidade']);
      $endereco = $this->crud->escape($_POST['endereco']);

      $insert = $this->crud->execute("CALL addClientes('$nome', '$telefone', '$email', '$doc', '$cep', '$cidade', '$endereco')");

      if ($insert) {
       header("Location: ../view/viewClientes.php");
      }
      else {
        return "Erro ao adicionar cliente";
      }
    }
  }

  public function addEntregador()
  {
    if (isset($_POST['Submit'])) {
      $nome = $this->crud->escape($_POST['nome']);
      $email = $this->crud->escape($_POST['email']);
      $telefone = $this->crud->escape($_POST['telefone']);
      $veiculo = $this->crud->escape($_POST['veiculo']);

      $insert = $this->crud->execute("CALL addEntregador('$nome', '$email', '$telefone', '$veiculo')");

      if ($insert) {
        header("Location: ../view/viewEntregadores.php");
      }
      else {
        return "Erro ao adicionar entregador";
      }
    }
  }

  public function inicializarEntrega()
  {
    if (isset($_POST['Submit'])) {
      $destinatario = $this->crud->escape($_POST['destinatario']);
      $remetente = $this->crud->escape($_POST['remetente']);
      $peso = $this->crud->escape($_POST['peso']);
      $volume = $this->crud->escape($_POST['volume']);
      $quantidade = $this->crud->escape($_POST['quantidade']);
      $entregador = $this->crud->escape($_POST['entregador']);

      $insert = $this->crud->execute("CALL inicializarEntrega('$destinatario', '$remetente', '$peso', '$volume', '$quantidade', '$entregador')");

      if ($insert) {
        header('Location: ../view/viewEncomendas.php');
      }
      else {
        return "Erro ao cadastrar entrega";
      }

    }
  }

  public function apagar($id, $tabela)
  {
    $id = $this->crud->escape($id);
    $tabela = $this->crud->escape($tabela);

    $result = $this->crud->delete($id, $tabela);
    if ($result) {
      return true;
    }
    else {
      return false;
    }
  }

  public function atualizarCliente()
  {
    if (isset($_POST['Submit'])) {
      $id = $this->crud->escape($_POST['id']);
      $nome = $this->crud->escape($_POST['nome']);
      $telefone = $this->crud->escape($_POST['telefone']);
      $email = $this->crud->escape($_POST['email']);
      $doc = $this->crud->escape($_POST['doc']);
      $cep = $this->crud->escape($_POST['cep']);
      $cidade = $this->crud->escape($_POST['cidade']);
      $endereco = $this->crud->escape($_POST['endereco']);

      $update = $this->crud->execute("CALL atualizarCliente($id, '$nome', '$telefone', '$email', '$doc', '$cep', '$cidade', '$endereco')");

      if ($update) {
        return "Cadastro alterado com sucesso!!";
      }
      else {
        return "Erro ao alterar cadastro";
      }
    }
  }

  public function atualizarEntregador()
  {
    if (isset($_POST['Submit'])) {
      $id = $this->crud->escape($_POST['id']);
      $nome = $this->crud->escape($_POST['nome']);
      $email = $this->crud->escape($_POST['email']);
      $telefone = $this->crud->escape($_POST['telefone']);
      $veiculo = $this->crud->escape($_POST['veiculo']);

      $update = $this->crud->execute("CALL atualizarEntregador($id, '$nome', '$email', '$telefone', '$veiculo')");

      if ($update) {
        return "Cadastro alterado com sucesso!!";
      }
      else {
        return "Erro ao alterar cadastro";
      }
    }
  }

  public function atualizarEntrega()
  {
    if (isset($_POST['Submit'])) {
      $id = $this->crud->escape($_POST['id']);
      $peso = $this->crud->escape($_POST['peso']);
      $volume = $this->crud->escape($_POST['volume']);
      $quantidade = $this->crud->escape($_POST['quantidade']);
      $entregador = $this->crud->escape($_POST['entregador']);

      $update = $this->crud->execute("CALL atualizarEntrega($id, $peso, $volume, $quantidade, $entregador)");

      if ($update) {
        return "Alterado com sucesso!!";
      }
      else {
        return "Erro ao alterar";
      }
    }
  }

  public function selectbyTable($tabela)
  {
    $result = $this->crud->getData("CALL selectbyTable('$tabela')");
    
    return $result;
  }

  public function selectEncomendas()
  {
    $result = $this->crud->getData("CALL getEntregas()");

    return $result;
  }

  public function setDelivered($id)
  {
    $update = $this->crud->execute("call entregue('$id')");

    if ($update) {
      return true;
    }
    else {
      return false;
    }

  }
}
?>