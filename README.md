# Pet Shop Management System

Sistema de gerenciamento para pet shop, incluindo cadastro de clientes, pets, serviços e agendamentos.

## Pré-requisitos

Antes de começar, certifique-se de ter instalado em sua máquina:

- [XAMPP](https://www.apachefriends.org/pt_br/index.html) (versão 8.0 ou superior)
- Navegador web (Chrome, Firefox, Edge, etc.)

## Instalação e Configuração

### Passo 1: Clonagem ou Download do Projeto

1. Certifique-se de que o XAMPP está instalado no diretório padrão: `C:\xampp`
2. Copie ou clone este projeto para o diretório `C:\xampp\htdocs\pet_shop`
   - Se estiver baixando um arquivo ZIP, extraia o conteúdo diretamente nesta pasta
   - Se estiver usando Git, execute:
     ```bash
     cd C:\xampp\htdocs
     git clone <url-do-repositorio> pet_shop
     ```

### Passo 2: Iniciar o XAMPP

1. Abra o painel de controle do XAMPP
2. Inicie os módulos **Apache** e **MySQL** clicando em "Start" para cada um
3. Aguarde até que ambos os módulos estejam com status "Running"

### Passo 3: Configurar o Banco de Dados

1. Abra o navegador e acesse: `http://localhost/phpmyadmin`
2. Clique em "Novo" (ou "New") no menu lateral esquerdo
3. Digite `petshop_db` como nome do banco de dados
4. Clique em "Criar" (ou "Create")
5. Selecione o banco `petshop_db` na lista lateral
6. Clique na aba "Importar" (ou "Import")
7. Clique em "Escolher arquivo" (ou "Choose file") e selecione o arquivo `db.sql` localizado na raiz do projeto
8. Clique em "Executar" (ou "Go") para importar as tabelas

### Passo 4: Executar a Aplicação

1. Abra o navegador web
2. Acesse: `http://localhost/pet_shop`
3. A aplicação estará rodando e pronta para uso

## Estrutura do Projeto

```
pet_shop/
├── db.sql                    # Script de criação do banco de dados
├── README.md                 # Este arquivo
├── index.php                 # Página inicial da aplicação
├── [outros arquivos PHP]     # Arquivos da aplicação
└── Modelagem/                # Diagramas do sistema
    ├── Caso de Uso.png
    ├── Modelo Conceitual.png
    └── Modelo Lógico.png
```

## Estrutura do Banco de Dados

O sistema utiliza as seguintes tabelas:

- **Cliente**: Armazena informações dos clientes (nome, CPF, email, telefone)
- **Pets**: Gerencia os pets dos clientes (nome, espécie, porte, data de nascimento)
- **Servicos**: Lista os serviços oferecidos (nome, preço, duração)
- **Agendamentos**: Controla os agendamentos de serviços (data/hora, status, observações)

## Tecnologias Utilizadas

- **Backend**: PHP
- **Banco de Dados**: MySQL
- **Servidor Local**: XAMPP (Apache + MySQL)
- **Interface**: HTML, CSS, JavaScript

## Suporte

Em caso de dúvidas ou problemas:

1. Verifique se o XAMPP está corretamente instalado e os módulos Apache/MySQL estão rodando
2. Confirme se o banco de dados foi criado e as tabelas importadas corretamente
3. Verifique se o projeto está localizado em `C:\xampp\htdocs\pet_shop`

## Notas Adicionais

- Certifique-se de que a porta 80 (Apache) e 3306 (MySQL) não estão sendo utilizadas por outros programas
- O projeto foi desenvolvido para funcionar em ambiente local com XAMPP
- Para produção, considere configurações adicionais de segurança e otimização