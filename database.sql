-- 1. Criação do banco de dados
CREATE DATABASE IF NOT EXISTS desafio_p;
USE desafio_p;

-- 2. Criação da tabela de associados
CREATE TABLE IF NOT EXISTS associados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    data_filiacao DATE NOT NULL
);

-- 3. Criação da tabela de anuidades
CREATE TABLE IF NOT EXISTS anuidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ano INT NOT NULL UNIQUE,
    valor DECIMAL(10, 2) NOT NULL
);

-- 4. Criação da tabela de cobranças
CREATE TABLE IF NOT EXISTS cobrancas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    associado_id INT NOT NULL,
    anuidade_id INT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data_cobranca DATE NOT NULL DEFAULT CURRENT_DATE,
    pago BOOLEAN DEFAULT 0,
    -- Definição de chaves estrangeiras
    CONSTRAINT fk_associado_id FOREIGN KEY (associado_id) REFERENCES associados(id) ON DELETE CASCADE,
    CONSTRAINT fk_anuidade_id FOREIGN KEY (anuidade_id) REFERENCES anuidades(id) ON DELETE CASCADE
);

-- 5. Inserindo dados iniciais em anuidades (opcional)
INSERT INTO anuidades (ano, valor) VALUES (2024, 150.00);
INSERT INTO anuidades (ano, valor) VALUES (2023, 130.00);

-- 6. Exemplo de inserção de associados (opcional)
INSERT INTO associados (nome, email, cpf, data_filiacao) 
VALUES ('João da Silva', 'joao.silva@example.com', '111.111.111-11', '2023-05-10');

INSERT INTO associados (nome, email, cpf, data_filiacao) 
VALUES ('Maria Oliveira', 'maria.oliveira@example.com', '222.222.222-22', '2024-02-15');

-- 7. Exemplo de inserção de cobranças (opcional)
INSERT INTO cobrancas (associado_id, anuidade_id, valor, pago) 
VALUES (1, 1, 150.00, 0);

INSERT INTO cobrancas (associado_id, anuidade_id, valor, pago) 
VALUES (2, 2, 130.00, 1);
