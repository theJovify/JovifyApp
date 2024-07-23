-- Cria o banco de dados
CREATE DATABASE crud_example;

-- Usa o banco de dados criado
USE crud_example;

-- Cria a tabela 'users'
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(14) NOT NULL,
    fullName VARCHAR(100) NOT NULL,
    birthDate DATE NOT NULL,
    sex VARCHAR(10) NOT NULL,
    otherSex VARCHAR(50) DEFAULT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    zodiac VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
