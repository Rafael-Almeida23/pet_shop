CREATE DATABASE IF NOT EXISTS petshop_db;
USE petshop_db;

CREATE TABLE Cliente (
    cliente_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(20)
);

CREATE TABLE Pets (
    pet_id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(50) NOT NULL,
    porte ENUM('Pequeno', 'Médio', 'Grande') NOT NULL,
    nascimento DATE,
    FOREIGN KEY (cliente_id) REFERENCES Cliente(cliente_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE Servicos (
    servico_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    duracao_min INT NOT NULL
);

CREATE TABLE Agendamentos (
    agendamento_id INT AUTO_INCREMENT PRIMARY KEY,
    pet_id INT NOT NULL,
    servico_id INT NOT NULL,
    data_hora DATETIME NOT NULL,
    status ENUM('Pendente', 'Confirmado', 'Concluído', 'Cancelado') DEFAULT 'Pendente',
    observacoes TEXT,
    FOREIGN KEY (pet_id) REFERENCES Pets(pet_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (servico_id) REFERENCES Servicos(servico_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
