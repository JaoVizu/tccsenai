Create database dbbijus;

use dbbijus;

-- Tabelas de entidades 



create table Produto (

	CodProduto int primary key auto_increment,
	NomeProduto varchar(100) not null,
	ValorProduto decimal(10,2) not null,
	MargemLucro decimal(10,2) not null,
	ValorVendaProduto decimal(10,2) not null,
	QntProduto int,
	CodFornecedor int not null,
    ImagemProduto varchar(255),
    QntParcelas int not null, 
    ValorParcela decimal(10,2) not null,
    DataCadastro Timestamp default current_timestamp,
    Descricao varchar(255),
    Categoria varchar(25) not null
    );
create table Cliente (
    
	CodCliente int primary key auto_increment,
	NomeCliente varchar(100) not null,
	DataNasc varchar(10) not null,
	EndCliente varchar(100) not null,
	CepCliente varchar(20) not null,
	CPFCliente varchar(11) not null,
	RGCliente varchar(11) not null,
	TelefoneCliente varchar(15),
	CelularCliente varchar(15) not null,
	CidadeCliente varchar(50) not null,
	EstadoCliente varchar(2) not null,
    BairroCliente varchar(100) not null,
    SexoCliente varchar(1) not null
    );
create table Encomenda (
	
    CodEncomenda int primary key auto_increment,
	DataEncomenda varchar(10) not null,
	CodCliente int,
	TotalEncomenda decimal(10,2) not null,
    EndEncomenda varchar(255),
    StatusPedido varchar(70),
    DescontoVenda decimal,
    FormaPagamento varchar(255) not null,
    NumeroParcelas int,
    DataPagamento varchar(20),
    HoraPedido Timestamp default current_timestamp
    );    
create table ItemEncomenda(

		CodItemEncomenda int primary key auto_increment,
        QntItemEncomenda int,
        ValorItemEncomenda decimal(10,2),
        CodEncomenda int,
        CodProduto Int
        
        );    
create table Venda (
	CodVenda int primary key auto_increment,
	CodCliente int not null,
	DataVenda varchar(10) not null,
    DescontoVenda decimal,
    FormaPagamento varchar(255) not null,
    NumeroParcelas int,
    DataPagamento varchar(20),
    HoraPedido Timestamp default current_timestamp,
	CodEncomenda int,
	DataEncomenda varchar(10),
	TotalEncomenda decimal(10,2),
    EndEncomenda varchar(255),
    StatusPedido varchar(70)
    );
    
create table itemVenda (
	
    CodItem int primary key auto_increment,
	CodProduto int not null,
	CodVenda int not null,
	QntItem int not null,
	ValorItem decimal(10,2) not null
    );
create table Fornecedor (
	
    CodFornecedor int primary key auto_increment, 
	RazaoSocial varchar(100) not null,
	NomeFant varchar(100) not null,
	CNPJ varchar(100) not null,
	TelefoneResi varchar(15),
	Celular varchar(15) not null,
	EndFornecedor varchar(100) not null,
	CepFornecedor varchar(100) not null,
	CidadeFornecedor varchar(100) not null,
	EstadoFornecedor varchar(2) not null,
	EmailFornecedor varchar(100) not null,
	SiteFornecedor varchar(100) not null
    );
create table Login(
	
    CodLogin int primary key auto_increment, 
    CodCliente INT NOT NULL,
    NomeLogin varchar(100) not null,
    Senha varchar(256) not null,
    DataNasc varchar(15),
    email varchar(50) not null,
    inadmin int
    );
    

-- Chave estrangeira fazendo referencia a outras tabelas
		
alter table Produto add foreign key (CodFornecedor) references Fornecedor(CodFornecedor);

alter table Encomenda add foreign key (CodCliente) references Cliente(CodCliente);

alter table Venda add foreign key (CodCliente) references Cliente(CodCliente);

alter table ItemVenda add foreign key (CodProduto) references Produto(CodProduto);

alter table ItemVenda add foreign key (CodVenda) references Venda(CodVenda);

alter table ItemEncomenda add foreign key (CodProduto) references Produto(CodProduto);

alter table ItemEncomenda add foreign key (CodEncomenda) references Encomenda(CodEncomenda);

alter table Venda add foreign key (CodEncomenda) references Encomenda(CodEncomenda);

ALTER TABLE Login ADD FOREIGN KEY (CodCliente) REFERENCES Cliente (CodCliente);


-- Insercao de dados na tabela fornecedor
	INSERT INTO fornecedor(CodFornecedor,RazaoSocial,NomeFant,CNPJ,telefoneresi,celular,endfornecedor,cepfornecedor,estadofornecedor,emailfornecedor,sitefornecedor)
    values(1,'t','noe','ffdf','45454','f','r','t','fdf','fd','fdfd');
    
    INSERT INTO fornecedor(CodFornecedor,RazaoSocial,NomeFant,CNPJ,telefoneresi,celular,endfornecedor,cepfornecedor,estadofornecedor,emailfornecedor,sitefornecedor)
    values(2,'t','noe','ffdf','45454','f','r','t','fdf','fd','fdfd');
    
    INSERT INTO fornecedor(CodFornecedor,RazaoSocial,NomeFant,CNPJ,telefoneresi,celular,endfornecedor,cepfornecedor,estadofornecedor,emailfornecedor,sitefornecedor)
    values(3,'t','Joias da Raissa','ffdf','45454','f','r','t','fdf','fd','fdfd');


-- Insercao de dados na tabela produto

	INSERT INTO produto(CodProduto,NomeProduto,ValorProduto,MargemLucro,ValorVendaProduto,QntProduto,CodFornecedor,ImagemProduto,QntParcelas,ValorParcela,Descricao)
    VALUES(1,'Anel folheado a ouro, ao melhor estilo egito antigo',12,24,14,4,1,'anel.jpg',2,23,'teste disso');
    
	INSERT INTO produto(CodProduto,NomeProduto,ValorProduto,MargemLucro,ValorVendaProduto,QntProduto,CodFornecedor,ImagemProduto,QntParcelas,ValorParcela,Descricao)
    VALUES(2,'Anel folheado a prata, ao melhor estilo egito antigo',12,24,14,4,1,'tornozeleira.jpg',2,23,'teste disso');
    
    INSERT INTO produto(CodProduto,NomeProduto,ValorProduto,MargemLucro,ValorVendaProduto,QntProduto,CodFornecedor,ImagemProduto,QntParcelas,ValorParcela,Descricao,Categoria)
    VALUES(3,'Coroa folheado a prata, ao melhor estilo egito antigo',12,24,14,4,1,'tornozeleira.jpg',2,23,'teste disso','Anel');
    
     INSERT INTO produto(NomeProduto,ValorProduto,MargemLucro,ValorVendaProduto,QntProduto,CodFornecedor,ImagemProduto,QntParcelas,ValorParcela,Descricao,Categoria)
    VALUES('Coroa folheado a prata, ao melhor estilo egito antigo',12,24,14,4,1,'tornozeleira.jpg',2,23,'teste disso','Anel');


	SELECT * FROM Produto WHERE categoria LIKE 'Anel';
-- Insercao de dados na tabela cliente
	
    INSERT INTO cliente (CodCliente,nomecliente,datanasc,endcliente,cepcliente,cpfcliente,rgcliente,telefonecliente,celularcliente,cidadecliente,estadocliente,bairrocliente,sexocliente) 
    VALUES (1,'Joao Vizu','21051999','albuquerque lins','14680000','47232843895','548775024','36634609','991903216','jardinopolis','SP','Centro','M');
	
    INSERT INTO cliente (CodCliente,nomecliente,datanasc,endcliente,cepcliente,cpfcliente,rgcliente,telefonecliente,celularcliente,cidadecliente,estadocliente,bairrocliente,sexocliente) 
    VALUES (2,'Joao Vizu','21051999','albuquerque lins','14680000','47232843895','548775024','36634609','991903216','jardinopolis','SP','Centro','M');

-- Insercao de dados na tabela login
    
    INSERT INTO login (CodLogin,CodCliente,NomeLogin, Senha, DataNasc, email, inadmin)
    VALUES (1,1,'admin','$2y$12$YlooCyNvyTji8bPRcrfNfOKnVMmZA9ViM2A3IpFjmrpIbp5ovNmga','21051999','admin@admin.com',1);
    
	INSERT INTO login (CodLogin,CodCliente,NomeLogin, Senha, DataNasc, email, inadmin)
    VALUES (2,2,'ademir','$9bfc74ff9e20013b89b6bdef2b365c5b','21051999','admin@admin.com',1);
    
-- Insercao de dados na tabela Encomenda
	
    INSERT INTO Encomenda(CodEncomenda,CodCliente,DataEncomenda,TotalEncomenda,FormaPagamento,StatusPedido,DescontoVenda,NumeroParcelas,DataPagamento)
    VALUES (1,1,'2017-01-22','22,00','Dinheiro','Realizado',0,3,'2015/12/27');
    
    INSERT INTO Encomenda(CodEncomenda,CodCliente,DataEncomenda,TotalEncomenda,FormaPagamento,StatusPedido,DescontoVenda,NumeroParcelas,DataPagamento)
    VALUES (2,2,'2017-01-12','32,00','Dinheiro','Realizado',0,3,'2015/12/27');
    
-- Insercao de dados na tabela ItemEncomenda    

	INSERT INTO ItemEncomenda(CodItemEncomenda,QntItemEncomenda,ValorItemEncomenda,CodEncomenda,CodProduto)
    VALUES (1,1,'32,00',1,1);
    
    INSERT INTO ItemEncomenda(CodItemEncomenda,QntItemEncomenda,ValorItemEncomenda,CodEncomenda,CodProduto)
    VALUES (2,2,'62,00',2,2);
    
    
-- insercao de dados na tabela venda

    INSERT INTO Venda(CodVenda,CodCliente,CodEncomenda,DataVenda,FormaPagamento,StatusPedido,DescontoVenda,NumeroParcelas,DataPagamento,TotalEncomenda, EndEncomenda, DataEncomenda)
    VALUES (3,1,1,'2017-05-20','Dinheiro','Realizado',0,5,'2017-05-20',1,'ewsdsdsds','2017-05-20');
    
    INSERT INTO Venda(CodVenda,CodCliente,CodEncomenda,DataVenda,FormaPagamento,StatusPedido,DescontoVenda,NumeroParcelas,DataPagamento,TotalEncomenda, EndEncomenda,DataEncomenda)
    VALUES (4,1,2,'2017-05-20','Dinheiro','Realizado',0,5,'2017-05-20',1,'ewsdsdsds','2017-05-20');

-- Insercao de dados na tabela itemvenda

	INSERT INTO itemVenda(CodItem,CodProduto,CodVenda,QntItem,ValorItem)
	VALUES (1,1,3,1,'320,00');
    
    INSERT INTO itemVenda(CodItem,CodProduto,CodVenda,QntItem,ValorItem)
	VALUES (2,2,4,2,'120,00');
		
  
-- insercao de dados na tabela item  
    
    
    
    
-- STORED PROCEDURES

-- PROCEDURE UPDATE DE CLIENTE
DELIMITER $$
CREATE DEFINER='root'@'localhost' PROCEDURE sp_usersupdate_save(
	pcodlogin INT,
    pnomecliente VARCHAR(200),
    pnomelogin VARCHAR(150),
    psenha VARCHAR(256),
    pemail VARCHAR(200),
    ptelefone VARCHAR(200),
    pcelular VARCHAR(200),
    pinadmin INT
)

BEGIN
	DECLARE vcodcliente INT;
    
    SELECT CodCliente INTO vcodcliente FROM login WHERE CodLogin = pcodlogin;
    
    UPDATE cliente
    SET 
		NomeCliente = pnomecliente,
        TelefoneCliente = ptelefone,
        CelularCliente = pcelular
	WHERE CodCliente = vcodcliente;
    
    UPDATE login
    SET
		NomeLogin = pnomelogin,
        Senha = psenha,
        email = pemail,
        inadmin = pinadmin
	WHERE CodLogin = pcodlogin;
    
    SELECT * FROM login a INNER JOIN Cliente b USING(CodCliente) WHERE a.CodLogin = pcodlogin;
END $$
delimiter ;


-- PROCEDURE PARA INSERIR CLIENTE E USUARIO
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save`(
pnomecliente VARCHAR(255),
    pdatanasc VARCHAR(10),
    pendcliente VARCHAR(100),
    pcepcliente VARCHAR(20),
    pcpfcliente VARCHAR(11),
    prgcliente VARCHAR(11),
    ptelcliente VARCHAR(15),
    pcelularcliente VARCHAR(15),
    pcidadecliente VARCHAR(50),
    pestado VARCHAR(2),
    pbairro VARCHAR(100),
    psexo VARCHAR(2),
    plogin VARCHAR(64),
    psenha VARCHAR(256),
    pemail VARCHAR(128),
    inadmin int)
BEGIN
DECLARE vidcliente INT;
    
    INSERT INTO Cliente (NomeCliente, DataNasc, Endcliente, CepCliente,CPFCliente, RGCLiente, TelefoneCliente, CelularCliente, CidadeCliente, EstadoCliente, BairroCliente, Sexocliente)
    VALUES (pnomecliente, pdatanasc, pendcliente, pcepcliente, pcpfcliente, prgcliente, ptelcliente, pcelularcliente, pcidadecliente,
    pestado, pbairro, psexo);
    
    SET vidcliente = LAST_INSERT_ID();
    
    INSERT INTO Login (CodCliente, NomeLogin, Senha, DataNasc, email, inadmin)
    VALUES (vidcliente, plogin, psenha, pdatanasc, pemail, inadmin);
    
    SELECT * FROM login a INNER JOIN cliente b USING(CodCliente) WHERE a.CodCliente = LAST_INSERT_ID();
END $$
delimiter ;

-- PROCEDURE PARA EXCLUIR CLIENTE
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_delete`(
	pcodlogin INT 
)
BEGIN
	DECLARE vcodcliente INT;
    
    SELECT CodCliente INTO vcodcliente FROM login WHERE CodLogin = pcodlogin;
    
    DELETE FROM login WHERE CodLogin = pcodlogin;
    
    DELETE FROM Cliente WHERE CodCliente = vcodcliente;
END $$
delimiter ;

-- PROCEDURE DE INSERIR PRODUTO
DELIMITER $$
CREATE PROCEDURE sp_products_save (
	pnomeproduto VARCHAR(100),
    pvalorproduto decimal(10,2),
    pmargemlucro decimal(10,2),
    pvalorvenda decimal(10,2),
    pquantidade INT,
    pcodfornecedor INT,
    
    pqntparcelas INT,
    pvalorparcela DECIMAL(10,2),
    pdescricao VARCHAR(255),
    pcategoria VARCHAR(25)
)
BEGIN
	
    declare vcodproduto INT;
    
    INSERT INTO produto (NomeProduto,ValorProduto,MargemLucro,
    ValorVendaProduto,QntProduto,CodFornecedor,QntParcelas,ValorParcela,Descricao,Categoria)
    VALUES (pnomeproduto, pvalorproduto,pmargemlucro,pvalorvenda,pquantidade,pcodfornecedor,
    pqntparcelas,pvalorparcela,pdescricao,pcategoria);
    
    SET vcodproduto = LAST_INSERT_ID();
    
    SELECT * FROM produto WHERE CodProduto = vcodproduto;
    
END $$
DELIMITER ;

-- PROCEDURE PARA UPDATE DE PRODUTO
DELIMITER $$
CREATE PROCEDURE sp_products_update(
	pcodproduto INT,
	pnomeproduto VARCHAR(100),
    pvalorproduto decimal(10,2),
    pmargemlucro decimal(10,2),
    pvalorvenda decimal(10,2),
    pquantidade INT,
    
    pqntparcelas INT,
    pvalorparcela DECIMAL(10,2),
    pdescricao VARCHAR(255),
    pcategoria VARCHAR(25)
)
BEGIN

    
    UPDATE produto SET
			NomeProduto = pnomeproduto,
            ValorProduto = pvalorproduto,
            MargemLucro = pmargemlucro,
            ValorVendaProduto =pvalorvenda,
            QntProduto = pquantidade,
           
            QntParcelas = pqntparcelas,
            ValorParcela = pvalorparcela,
            DataCadastro = NOW(),
            Descricao = pdescricao,
            Categoria = pcategoria WHERE CodProduto = pcodproduto;
            
		SELECT * FROM produto WHERE codproduto = pcodproduto;
    
END$$
DELIMITER ;

CALL sp_products_save ('Fazendo um teste',12,12,33,5,1,'aasas',4,4,'testandop','colar');


CALL sp_products_update(4,'Mudou será?',3,4,5,6,1,'a zaaa',32,32,'Mudou mesmo','Colar');
    
-- Visualização de tabelas
	select*from Produto;
    select*from Fornecedor;
    select*from Login;
    select*from Venda;
    select*from itemVenda;
    select*from Encomenda;
    select*from Cliente;
    select*from ItemEncomenda;

    select NomeFant FROM Fornecedor;
	

