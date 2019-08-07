CREATE DATABASE bd_rfid;

use bd_rfid;

/******************* Criação das Tabelas */

create table tbProduto (
	idProduto int NOT NULL AUTO_INCREMENT,
	nomeProd varchar (30) NOT NULL,
	personalizado  bit NOT NULL,
	cor  varchar (15) NOT NULL,
	obs  varchar (50),
	quantTotal int NOT NULL,
	quantDisponivel int NOT NULL,
	CONSTRAINT PK_IDPRODUTO PRIMARY KEY (idProduto)
);

create table tbEtiqueta (
	rfid varchar (50) NOT NULL,
	idProduto int NOT NULL,
	CONSTRAINT FK_IDPRODUTO FOREIGN KEY (idProduto) REFERENCES tbProduto (idProduto)
);

create table tbContrato (
	idContrato int NOT NULL,
	status varchar (1) NOT NULL,
	obs varchar (100),
	CONSTRAINT PK_IDCONTRATO PRIMARY KEY (idContrato)
);

create table tbItensContrato (
	idContrato int NOT NULL,
	rfidProduto varchar (50) NOT NULL,
	horaSaida datetime,
	horaEntrada datetime,
	CONSTRAINT PK_CONTRATO_PRODUTO PRIMARY KEY (idContrato, rfidProduto)
);

CREATE TABLE tbNaoRetornado (
	rfidProduto varchar (50) NOT NULL,
	idContrato int NOT NULL,
	CONSTRAINT PK_RFID_IDCONTRATO PRIMARY KEY (rfidProduto, idContrato)
);

CREATE TABLE tbTemp (
	idTemp int NOT NULL AUTO_INCREMENT,
	etiqueta varchar (50) NOT NULL,
	CONSTRAINT PK_IDTEMP PRIMARY KEY (IdTemp)
);

/******************** Inserção de dados */

INSERT INTO `tbProduto`(`nomeProd`, `personalizado`, `cor`, `obs`, `quantTotal`, `quantDisponivel`)
VALUES
("Cadeira",0,"Preta",NULL,50,50),
("Mesa",0,"Preta",NULL,20,20),
("Luminária",0,"Preta",NULL,10,10);



/****************** Alterações (Só executar quem tem o BD antigo) */

CREATE TABLE tbNaoRetornado (
	rfidProduto varchar (50) NOT NULL,
	idContrato int NOT NULL,
	CONSTRAINT PK_RFID_IDCONTRATO PRIMARY KEY (rfidProduto, idContrato)
);

ALTER TABLE tbItensContrato DROP COLUMN obs;
ALTER TABLE tbContrato ADD obs varchar(50);

ALTER TABLE tbEtiqueta CHANGE rfid rfid varchar(50) not null;
ALTER TABLE tbItensContrato CHANGE rfidProduto rfidProduto varchar(50) not null;
ALTER TABLE tbTemp CHANGE etiqueta etiqueta varchar(50) not null;