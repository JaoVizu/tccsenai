
Create database dbbijus;

use dbbijus;

-- Tabelas de entidades 



create table produto (

	CodProduto int primary key auto_increment,
	NomeProduto varchar(100) not null,
	ValorProduto decimal(10,2) not null,
	MargemLucro decimal(10,2) not null,
	ValorVendaProduto decimal(10,2),
	QntProduto int,
	CodFornecedor int,
    ImagemProduto varchar(255),
    DataCadastro varchar(50),
    Descricao varchar(255),
    CodCategoria int,
    StatusProduto VARCHAR(10)
    );
create table cliente (
    
	CodCliente int primary key auto_increment,
	NomeCliente varchar(100) not null,
	DataNasc varchar(10) not null,
	EndCliente varchar(100) not null,
	CepCliente varchar(9) not null,
	CPFCliente varchar(14) not null,
	RGCliente varchar(12) not null,
	TelefoneCliente varchar(15),
	CelularCliente varchar(15) not null,
	CidadeCliente varchar(70) not null,
	EstadoCliente varchar(2) not null,
    BairroCliente varchar(70) not null,
    SexoCliente varchar(1) not null,
    ComCliente varchar(100) not null,
    NCliente varchar(5) not null,
    StatusCliente VARCHAR(10)
    );
create table Encomenda (
	
    CodEncomenda int primary key auto_increment,
	DataEncomenda varchar(10) not null,
	CodCliente int,
	TotalEncomenda decimal(10,2) not null,
    EndEncomenda varchar(100),
    StatusPedido varchar(20),
    DescontoVenda decimal,
    FormaPagamento varchar(20) not null,
    NumeroParcelas int,
    DataPagamento varchar(10),
    HoraPedido Timestamp default current_timestamp
    );    
create table ItemEncomenda(

	CodItemEncomenda int primary key auto_increment,
	CodProduto Int,
    CodEncomenda int,
    QntItemEncomenda int,
	ValorItemEncomenda decimal(10,2)
        
);    
create table Venda (
	CodVenda int primary key auto_increment,
	CodCliente int not null,
	DataVenda varchar(10),
    DescontoVenda decimal,
    FormaPagamento varchar(20) not null,
    NumeroParcelas int,
    DataPagamento varchar(10),
    HoraPedido Timestamp default current_timestamp,
	CodEncomenda int,
	DataEncomenda varchar(10),
	TotalEncomenda decimal(10,2),
    EndEncomenda varchar(100),
    StatusPedido varchar(20)
    );
create table itemVenda (
	
    CodItem int primary key auto_increment,
	CodProduto int not null,
	CodVenda int not null,
	QntItem int not null,
	ValorItem decimal(10,2) not null
    );
create table fornecedor (
	
    CodFornecedor int primary key auto_increment, 
	RazaoSocial varchar(100) not null,
	NomeFant varchar(100) not null,
	CNPJ varchar(18) not null,
	TelefoneResi varchar(15),
	Celular varchar(15) not null,
	EndFornecedor varchar(100) not null,
	CepFornecedor varchar(100) not null,
	CidadeFornecedor varchar(100) not null,
	EstadoFornecedor varchar(2) not null,
    BairroFornecedor varchar(70) not null,
	EmailFornecedor varchar(100) not null,
	SiteFornecedor varchar(100) not null,
    StatusFornecedor varchar(50) not null
    );
create table Login(
	
    CodLogin int primary key auto_increment, 
    CodCliente INT NOT NULL,
    NomeLogin varchar(30) not null,
    Senha varchar(256) not null,
    DataNasc varchar(15),
    email varchar(50) not null,
    inadmin int
    );
    
create table categoria(
	CodCategoria int primary key auto_increment,
    NomeCategoria Varchar(50)
    );
    
    

-- Chave estrangeira fazendo referencia a outras tabelas
		
alter table produto add foreign key (CodFornecedor) references fornecedor(CodFornecedor);

alter table Encomenda add foreign key (CodCliente) references cliente(CodCliente);

alter table Venda add foreign key (CodCliente) references cliente(CodCliente);

alter table itemVenda add foreign key (CodProduto) references produto(CodProduto);

alter table itemVenda add foreign key (CodVenda) references Venda(CodVenda);

alter table ItemEncomenda add foreign key (CodProduto) references produto(CodProduto);

ALTER TABLE Login ADD FOREIGN KEY (CodCliente) REFERENCES cliente (CodCliente);

alter table produto ADD FOREIGN KEY (CodCategoria) REFERENCES categoria(CodCategoria);




-- Insercao de dados na tabela fornecedor
	INSERT INTO fornecedor(RazaoSocial,NomeFant,CNPJ,telefoneresi,celular,endfornecedor,cepfornecedor,estadofornecedor,emailfornecedor,sitefornecedor,BairroFornecedor)
    values('Arca de Noé','Arca de Noé','90.206.161/0001-29','(16)36637649','(16)993413988','Via de Pedestre Albert Zabel,89','04164-015','SP','noe@gmail.com','noe.com.br','Ipiranga');
    
    INSERT INTO fornecedor(RazaoSocial,NomeFant,CNPJ,telefoneresi,celular,endfornecedor,cepfornecedor,estadofornecedor,emailfornecedor,sitefornecedor,BairroFornecedor)
    values('Shop Diamond','Shop Diamond','04.007.153/0001-11','(17) 3559-8571','(17) 99944-8197','Rua Sebastião Otávio Fácio,290','13455-698','SP','shopdiamond@gmail.com','shopdiamond.com','Santa Rosa');
    
    INSERT INTO fornecedor(RazaoSocial,NomeFant,CNPJ,telefoneresi,celular,endfornecedor,cepfornecedor,estadofornecedor,emailfornecedor,sitefornecedor,BairroFornecedor)
    values('Casa da Biju','Casa da Biju','47.631.777/0001-18','(11) 2527-9241','(11) 99931-2287','Rua Cardon,491','08041-525','SP','homebiju@gmail.com','homebiju.com.br','Jardim Maria');


-- Insercao de dados na tabela Categoria

	INSERT INTO categoria(NomeCategoria)
	VALUES ('Anel');
    
    INSERT INTO categoria(NomeCategoria)
	VALUES ('Tornozeleira');
    
    INSERT INTO categoria(NomeCategoria)
	VALUES ('Brinco');
    
    INSERT INTO categoria(NomeCategoria)
	VALUES ('Colar');
    
	INSERT INTO categoria(NomeCategoria)
	VALUES ('Pulseira');
    

    
-- Insercao de dados na tabela produto

	INSERT INTO produto(NomeProduto,ValorProduto,MargemLucro,ValorVendaProduto,QntProduto,CodFornecedor,ImagemProduto,Descricao,CodCategoria)
    VALUES('Anel folheado a ouro',80,10,88,19,1,'padrao.jpg','Fique sempre na moda sem gastar muito!',1);
    
	INSERT INTO produto(NomeProduto,ValorProduto,MargemLucro,ValorVendaProduto,QntProduto,CodFornecedor,ImagemProduto,Descricao,CodCategoria)
    VALUES('Tornozeleira de Prata',50,20,60,30,2,'padrao.jpg','Mantenha seu estilo com este lindo anel!',2);
    
    INSERT INTO produto(NomeProduto,ValorProduto,MargemLucro,ValorVendaProduto,QntProduto,CodFornecedor,ImagemProduto,Descricao,CodCategoria)
    VALUES('Brinco de Ouro',400,10,440,5,3,'padrao.jpg','Quem nunca teve o sonho de ser uma princesa?, compre nossa coroa e seja uma',3);
    
	INSERT INTO produto(NomeProduto,ValorProduto,MargemLucro,ValorVendaProduto,QntProduto,CodFornecedor,ImagemProduto,Descricao,CodCategoria)
    VALUES('Colar de Prata',200,10,220,20,1,'padrao.jpg','Sem nada pra usar com seu decote? Utilize nosso colar e se enfeite',4);
    
    INSERT INTO produto(NomeProduto,ValorProduto,MargemLucro,ValorVendaProduto,QntProduto,CodFornecedor,ImagemProduto,Descricao,CodCategoria)
    VALUES('Colar de Prata',200,10,220,20,1,'padrao.jpg','Sem nada pra usar com seu decote? Utilize nosso colar e se enfeite',4);

-- Insercao de dados na tabela cliente
    INSERT INTO cliente (nomecliente,datanasc,endcliente,cepcliente,cpfcliente,rgcliente,telefonecliente,celularcliente,cidadecliente,estadocliente,bairrocliente,sexocliente) 
    VALUES ('Ana Carolina de Marco','06/07/1980','Rua Varldir Valim,775','14056-707','219.518.898-78','32.555.477-8','(16) 3289-3079','(16) 98121-2285','Ribeirão Preto','SP','Paulo Gomes Romeu','F');

	INSERT INTO cliente (nomecliente,datanasc,endcliente,cepcliente,cpfcliente,rgcliente,telefonecliente,celularcliente,cidadecliente,estadocliente,bairrocliente,sexocliente) 
    VALUES ('Bárbara Alícia Oliveira','01/01/1987','Rua Maria Aparecida da Cruz Rosa,723','14403-322','643.773.508-20','32.804.606-1','(16) 3694-2349','(16) 99123-0823','Franca','SP','Prolongamento Recanto Elimar','F');
    
    INSERT INTO cliente (nomecliente,datanasc,endcliente,cepcliente,cpfcliente,rgcliente,telefonecliente,celularcliente,cidadecliente,estadocliente,bairrocliente,sexocliente) 
    VALUES ('Beatriz Isabelle Natália de Paula','17/08/1987','Avenida Marechal Hermes da Fonseca,798','06182-250','119.630.448-35','23.759.316-6','(11) 3707-8864','(11) 99904-3381','Osasco','SP','Quitaúna','F');
	
    INSERT INTO cliente (nomecliente,datanasc,endcliente,cepcliente,cpfcliente,rgcliente,telefonecliente,celularcliente,cidadecliente,estadocliente,bairrocliente,sexocliente) 
    VALUES ('Hugo André Davi Gomes','24/06/1987','Rua Esther Scartezini,997','13487-131','902.937.758-50','33.208.826-1','(19) 3548-8700','(19) 99921-1084','Limeira','SP','Jardim Olga Veroni','M');
    
    INSERT INTO cliente (nomecliente,datanasc,endcliente,cepcliente,cpfcliente,rgcliente,telefonecliente,celularcliente,cidadecliente,estadocliente,bairrocliente,sexocliente) 
    VALUES ('Hugo André Davi Gomes','24/06/1987','Rua Esther Scartezini,997','13487-131','902.937.758-50','33.208.826-1','(19) 3548-8700','(19) 99921-1084','Limeira','SP','Jardim Olga Veroni','M');

-- Insercao de dados na tabela login
    
    INSERT INTO Login (CodCliente,NomeLogin, Senha, DataNasc, email, inadmin)
    VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','06/07/1980','admin@admin.com',1);
    
	INSERT INTO Login (CodCliente,NomeLogin, Senha, DataNasc, email, inadmin)
    VALUES (2,'joao','21232f297a57a5a743894a0e4a801fc3','01/01/1987','func@admin.com',1);
	
    INSERT INTO Login (CodCliente,NomeLogin, Senha, DataNasc, email, inadmin)
    VALUES (3,'ademir','21232f297a57a5a743894a0e4a801fc3','17/08/1987','ademir@admin.com',0);
    
	INSERT INTO Login (CodCliente,NomeLogin, Senha, DataNasc, email, inadmin)
    VALUES (4,'gersom','21232f297a57a5a743894a0e4a801fc3','24/06/1987','gersom@admin.com',0);
    
-- Insercao de dados na tabela Encomenda
	
    INSERT INTO Encomenda(CodCliente,DataEncomenda,TotalEncomenda,FormaPagamento,StatusPedido,DescontoVenda,NumeroParcelas,DataPagamento)
    VALUES (1,'2017-01-22','88','Dinheiro','Realizado',0,4,'2017-01-22');
    
    INSERT INTO Encomenda(CodCliente,DataEncomenda,TotalEncomenda,FormaPagamento,StatusPedido,DescontoVenda,NumeroParcelas,DataPagamento)
    VALUES (2,'2017-05-12','60','Dinheiro','Realizado',0,4,'2017-05-12');
    
    INSERT INTO Encomenda(CodCliente,DataEncomenda,TotalEncomenda,FormaPagamento,StatusPedido,DescontoVenda,NumeroParcelas,DataPagamento)
    VALUES (3,'2017-06-30','440','Cartao','Não Realizado',0,4,'');
    
    INSERT INTO Encomenda(CodCliente,DataEncomenda,TotalEncomenda,FormaPagamento,StatusPedido,DescontoVenda,NumeroParcelas,DataPagamento)
    VALUES (4,'2017-12-12','220','Cartao','Não Realizado',0,4,'');
    
-- Insercao de dados na tabela ItemEncomenda    
	INSERT INTO ItemEncomenda(CodProduto,CodEncomenda,QntItemEncomenda,ValorItemEncomenda)
    VALUES (1,1,1,88);
    
    INSERT INTO ItemEncomenda(CodEncomenda,CodProduto,QntItemEncomenda,ValorItemEncomenda)
    VALUES (2,2,1,60);
    
    INSERT INTO ItemEncomenda(CodProduto,CodEncomenda,QntItemEncomenda,ValorItemEncomenda)
    VALUES (3,3,1,440);
    
    INSERT INTO ItemEncomenda(CodProduto,CodEncomenda,QntItemEncomenda,ValorItemEncomenda)
    VALUES (4,4,2,220);
    
    
-- insercao de dados na tabela venda

    INSERT INTO Venda(CodCliente,CodEncomenda,DataVenda,FormaPagamento,StatusPedido,DescontoVenda,NumeroParcelas,DataPagamento,TotalEncomenda, EndEncomenda, DataEncomenda)
    VALUES (2,1,'2017-01-22','Dinheiro','Realizado',0,4,'2017-01-22',1,'Rua Maria Aparecida da Cruz Rosa,723','2017-01-22');
    
    INSERT INTO Venda(CodCliente,CodEncomenda,DataVenda,FormaPagamento,StatusPedido,DescontoVenda,NumeroParcelas,DataPagamento,TotalEncomenda, EndEncomenda,DataEncomenda)
    VALUES (3,2,'2017-05-12','Dinheiro','Realizado',0,4,'2017-05-12',1,'Avenida Marechal Hermes da Fonseca,798','2017-05-20');
    
-- Insercao de dados na tabela itemvenda

	INSERT INTO itemVenda(CodProduto,CodVenda,QntItem,ValorItem)
	VALUES (1,1,5,88);
    
    INSERT INTO itemVenda(CodProduto,CodVenda,QntItem,ValorItem)
	VALUES (2,2,3,60);
    

-- STORED PROCEDURES

-- PROCEDURE UPDATE DE CLIENTE
DELIMITER $$
CREATE DEFINER='root'@'localhost' PROCEDURE sp_usersupdate_save(
	pcodlogin INT,
    pnomecliente VARCHAR(100),
    pnomelogin VARCHAR(30),
    pemail VARCHAR(100),
    ptelefone VARCHAR(15),
    pcelular VARCHAR(15),
    pend varchar(100),
    pn varchar(5),
    pcom varchar(100),
    pstatus VARCHAR(10),
    pinadmin INT
)

BEGIN
	DECLARE vcodcliente INT;
    
    SELECT CodCliente INTO vcodcliente FROM login WHERE CodLogin = pcodlogin;
    
    UPDATE cliente
    SET 
		NomeCliente = pnomecliente,
        TelefoneCliente = ptelefone,
        CelularCliente = pcelular,
        EndCliente = pend,
		NCliente = pn,
		ComCliente = pcom,
        StatusCliente = pstatus
	WHERE CodCliente = vcodcliente;
    
    UPDATE login
    SET
		NomeLogin = pnomelogin,
        email = pemail,
        inadmin = pinadmin
	WHERE CodLogin = pcodlogin;
    
    SELECT * FROM login a INNER JOIN Cliente b USING(CodCliente) WHERE a.CodLogin = pcodlogin;
END $$
delimiter ;


-- PROCEDURE PARA INSERIR CLIENTE E USUARIO
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_users_save`(
pnomecliente VARCHAR(100),
    pdatanasc VARCHAR(10),
    pendcliente VARCHAR(100),
    pcepcliente VARCHAR(9),
    pcpfcliente VARCHAR(14),
    prgcliente VARCHAR(12),
    ptelcliente VARCHAR(15),
    pcelularcliente VARCHAR(15),
    pcidadecliente VARCHAR(70),
    pestado VARCHAR(2),
    pbairro VARCHAR(50),
    psexo VARCHAR(1),
    plogin VARCHAR(30),
    psenha VARCHAR(256),
    pemail VARCHAR(100),
    pn varchar(5),
    pcom varchar(100),
    pstatus VARCHAR(10),
    inadmin int
    )
BEGIN
DECLARE vidcliente INT;
    
    INSERT INTO Cliente (NomeCliente, DataNasc, Endcliente, CepCliente,CPFCliente, RGCLiente, TelefoneCliente, CelularCliente, CidadeCliente, EstadoCliente, BairroCliente, Sexocliente,ComCliente,NCliente)
    VALUES (pnomecliente, pdatanasc, pendcliente, pcepcliente, pcpfcliente, prgcliente, ptelcliente, pcelularcliente, pcidadecliente,
    pestado, pbairro, psexo,pcom,pn, pstatus);
    
    SET vidcliente = LAST_INSERT_ID();
    
    INSERT INTO Login (CodCliente, NomeLogin, Senha, DataNasc, email, inadmin)
    VALUES (vidcliente, plogin,psenha, pdatanasc, pemail, inadmin);
    
    SELECT * FROM login a INNER JOIN cliente b USING(CodCliente) WHERE a.CodCliente = LAST_INSERT_ID();
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
    pimagem varchar(255),
    pdescricao VARCHAR(255),
    pcodcategoria VARCHAR(20),
    pstatus VARCHAR(10)
)
BEGIN
	
    declare vcodproduto INT;
    
    INSERT INTO produto (NomeProduto,ValorProduto,MargemLucro,
    ValorVendaProduto,QntProduto,CodFornecedor,ImagemProduto,Descricao,CodCategoria)
    VALUES (pnomeproduto, pvalorproduto,pmargemlucro,pvalorvenda,pquantidade,pcodfornecedor,pimagem,
    pdescricao,pcodcategoria, pstatus);
    
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
    
   
    pdescricao VARCHAR(255),
    pcodcategoria VARCHAR(20),
    pstatus VARCHAR(10)
)
BEGIN

    
    UPDATE produto SET
			NomeProduto = pnomeproduto,
            ValorProduto = pvalorproduto,
            MargemLucro = pmargemlucro,
            ValorVendaProduto =pvalorvenda,
            QntProduto = pquantidade,
            
            DataCadastro = NOW(),
            Descricao = pdescricao,
            StatusProduto = pstatus,
            CodCategoria = pcodcategoria WHERE CodProduto = pcodproduto;
            
		SELECT * FROM produto WHERE codproduto = pcodproduto;
    
END$$
DELIMITER ;