CREATE DATABASE transportes;

USE transportes;

CREATE TABLE clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(150),
  telefone VARCHAR(20),
  email VARCHAR(150),
  doc VARCHAR(20),
  cep VARCHAR(10),
  cidade VARCHAR(255),
  endereco VARCHAR(255)
);

CREATE TABLE entregas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_destinatario INT,
  id_remetente INT,
  peso DECIMAL(10, 2),
  volume DECIMAL(10, 2),
  quantidade int,
  id_entregador INT,
  situacao VARCHAR(100),
  FOREIGN KEY (id_destinatario) REFERENCES clientes (id),
  FOREIGN KEY (id_remetente) REFERENCES clientes (id),
  FOREIGN KEY (id_entregador) REFERENCES entregadores (id)
);

CREATE TABLE entregadores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(150),
  email VARCHAR(150),
  telefone VARCHAR(20),
  veiculo VARCHAR(150)
);

DELIMITER //
CREATE PROCEDURE deleteByid(IN in_id INT, IN in_tabela INT)
BEGIN
  IF in_tabela = 1 THEN
   DELETE FROM clientes WHERE id = in_id;
  ELSEIF in_tabela = 2 THEN
      DELETE FROM entregadores WHERE id = in_id;
    ELSEIF in_tabela = 3 THEN
      DELETE FROM entregas WHERE id = in_id;
    END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE selectbyTable(IN in_tabela INT)
BEGIN
  IF in_tabela = 1 THEN
   SELECT * FROM clientes;
  ELSEIF in_tabela = 2 THEN
      SELECT * FROM entregadores; 
    ELSEIF in_tabela = 3 THEN
      SELECT * FROM entregas;
    END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE selectClientes(IN in_id INT)
BEGIN
  SELECT * FROM clientes WHERE id = in_id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE selectEntregadores(IN in_id INT)
BEGIN
  SELECT * FROM entregadores WHERE id = in_id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE selectEntregas(IN in_id INT)
BEGIN
  SELECT * FROM entregas WHERE id = in_id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE getEntregas()
BEGIN
 SELECT e.id, d.nome AS destinatario, d.endereco AS endereco, r.nome AS remetente, e.peso, e.volume, e.quantidade, en.nome AS entregador, e.situacao FROM entregas e JOIN clientes d ON e.id_destinatario = d.id JOIN clientes r ON e.id_remetente = r.id JOIN entregadores en ON e.id_entregador = en.id;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE addClientes(IN in_nome VARCHAR(150), IN in_telefone VARCHAR(20), IN in_email VARCHAR(150), IN in_doc VARCHAR(20), IN in_cep VARCHAR(10), IN in_cidade VARCHAR(255), IN in_endereco VARCHAR(255))
BEGIN
 INSERT INTO clientes(nome, telefone, email, doc, cep, cidade, endereco) VALUES (in_nome, in_telefone, in_email, in_doc, in_cep, in_cidade, in_endereco);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE addEntregador(IN in_nome VARCHAR(150), IN in_email VARCHAR(150), IN in_telefone VARCHAR(20), IN in_veiculo VARCHAR(150))
BEGIN
 INSERT INTO entregadores(nome, email, telefone, veiculo) VALUES (in_nome, in_email, in_telefone, in_veiculo);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE inicializarEntrega(IN in_destinatario INT, IN in_remetente INT, IN in_peso DECIMAL(10, 2), IN in_volume DECIMAL(10, 2), IN in_quantidade INT, IN in_entregador INT)
BEGIN
  DECLARE in_situacao VARCHAR(100);
  SET in_situacao = 'Em transporte';

  INSERT INTO entregas(id_destinatario, id_remetente, peso, volume, quantidade, id_entregador, situacao) VALUES (in_destinatario, in_remetente, in_peso, in_volume, in_quantidade, in_entregador, in_situacao);
END //
DELIMITER ;

DELIMITER //

CREATE PROCEDURE atualizarCliente(
  IN in_id INT,
  IN in_nome VARCHAR(150),
  IN in_telefone VARCHAR(20),
  IN in_email VARCHAR(150),
  IN in_doc VARCHAR(20),
  IN in_cep VARCHAR(10),
  IN in_cidade VARCHAR(255),
  IN in_endereco VARCHAR(255)
)
BEGIN
  UPDATE clientes SET nome = in_nome, telefone = in_telefone, email = in_email, doc = in_doc, cep = in_cep, cidade = in_cidade, endereco = in_endereco WHERE id = in_id;
  
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE atualizarEntregador(
  IN in_id INT,
  IN in_nome VARCHAR(150),
  IN in_email VARCHAR(150),
  IN in_telefone VARCHAR(20),
  IN in_veiculo VARCHAR(150)
)
BEGIN
  UPDATE entregadores SET nome = in_nome, email = in_email, telefone = in_telefone, veiculo = in_veiculo WHERE id = in_id;
END //

DELIMITER ;


DELIMITER //
CREATE PROCEDURE entregue(IN in_id INT)
BEGIN
  DECLARE in_situacao VARCHAR(100);
  SET in_situacao = 'Entregue';
   UPDATE entregas SET situacao = in_situacao WHERE id = in_id;
END //
DELIMITER ;
