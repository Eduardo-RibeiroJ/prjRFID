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

INSERT INTO `tbprodutos`(`nomeProd`, `personalizado`, `cor`, `obs`, `quantTotal`, `quantDisponivel`) VALUES ("Cadeira",1,"Preta",NULL,50,40);
INSERT INTO `tbprodutos`(`nomeProd`, `personalizado`, `cor`, `obs`, `quantTotal`, `quantDisponivel`) VALUES ("Mesa",0,"Preta",NULL,30,30);



create table tbEtiqueta (
rfid varchar (30) NOT NULL,
idProduto int NOT NULL,
CONSTRAINT FK_IDPRODUTO FOREIGN KEY (idProduto) REFERENCES tbProduto (ID_idProduto)
);

INSERT INTO `tbetiqueta`(`rfid`, `idProduto`) VALUES (12345,1);
INSERT INTO `tbetiqueta`(`rfid`, `idProduto`) VALUES (12346,1);
INSERT INTO `tbetiqueta`(`rfid`, `idProduto`) VALUES (12347,1);
INSERT INTO `tbetiqueta`(`rfid`, `idProduto`) VALUES (12348,1);
INSERT INTO `tbetiqueta`(`rfid`, `idProduto`) VALUES (12349,1); 

create table tbContrato (
idContrato int NOT NULL,
status varchar (1) NOT NULL,
CONSTRAINT PK_IDCONTRATO PRIMARY KEY (idContrato)
);

INSERT INTO `tbContrato`(`idContrato`, `status`) VALUES (45612,"S");
INSERT INTO `tbContrato`(`idContrato`, `status`) VALUES (48496,"E");

create table tbItensContrato (
idContrato int NOT NULL,
rfidProduto varchar (30) NOT NULL,
horaSaida timestamp,
horaEntrada timestamp,
obs varchar (100),
CONSTRAINT PK_CONTRATO_PRODUTO PRIMARY KEY (idContrato, rfidProduto)
);

INSERT INTO `tbItensContrato`(`idContrato`, `rfidProduto`, `horaSaida`, `horaEntrada`, `obs`) VALUES (45612,12345,"2019-05-01 14:00:20",NULL,NULL);
INSERT INTO `tbItensContrato`(`idContrato`, `rfidProduto`, `horaSaida`, `horaEntrada`, `obs`) VALUES (45612,12346,"2019-05-01 14:00:25",NULL,NULL);
INSERT INTO `tbItensContrato`(`idContrato`, `rfidProduto`, `horaSaida`, `horaEntrada`, `obs`) VALUES (45612,12347,"2019-05-01 14:00:40",NULL,NULL);

CREATE TABLE tbTemp (
idTemp int NOT NULL AUTO_INCREMENT,
etiqueta varchar (25) NOT NULL,
CONSTRAINT PK_IDTEMP PRIMARY KEY (IdTemp)
);