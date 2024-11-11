CREATE DATABASE devs_do_rn;
USE devs_do_rn;

CREATE TABLE associados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    data_filiacao DATE NOT NULL
);

CREATE TABLE anuidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ano INT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL
);

CREATE TABLE cobrancas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_associado INT NOT NULL,
    id_anuidade INT NOT NULL,
    status_pagamento TINYINT(1) DEFAULT 0,
    FOREIGN KEY (id_associado) REFERENCES associados(id),
    FOREIGN KEY (id_anuidade) REFERENCES anuidades(id)
);
