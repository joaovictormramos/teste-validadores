# Projeto Laravel - Validador

## 📥 Instalação

Siga os passos abaixo para configurar o projeto em sua máquina:

### 1️⃣ Clone o repositório
```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

### 2️⃣ Gere a chave da aplicação
```bash
php artisan key:generate
```

### 3️⃣ Crie o banco de dados
No MySQL, execute o seguinte comando para criar o banco de dados:
```sql
CREATE DATABASE teste_validador;
```

### 4️⃣ Configure as credenciais do banco
Edite o arquivo `.env` e altere as seguintes variáveis conforme suas configurações:
```env
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 5️⃣ Execute as migrações
```bash
php artisan migrate
```

## 🚀 Executando o projeto
Para iniciar o servidor local, utilize:
```bash
php artisan serve
```
O projeto estará disponível em: [http://127.0.0.1:8000](http://127.0.0.1:8000)

![Tela de Inicial](docs/Screenshot%202025-02-14%20at%2017-56-50%20VochTech.png)
A tela inicial apresenta o botão de iniciar sessão.

![Tela de Login](docs/Screenshot%202025-02-14%20at%2017-56-58%20VochTech.png)
A tela de login possui duas opções de login: Facebook e Google.

![Painel Administrativo](docs/Screenshot%202025-02-14%20at%2017-57-12%20VochTech.png)
A tela do Painel Administrativo fornece acesso às principais funcionalidades do sistema. Nela, é possível realizar operações de CRUD para:

- **Bandeiras**
- **Grupos Econômicos**
- **Unidades**
- **Colaboradores**

No cabeçalho (header), há um botão para **Logout**(ao lado do botão de Painel), permitindo que o usuário encerre sua sessão com facilidade.

### 📋 Telas do Sistema

#### 📌 Tela de Grupos Econômicos
![Tela de Grupos Economicos](docs/Screenshot%202025-02-14%20at%2017-57-25%20VochTech.png)
Nesta tela, é possível listar todos os registros, cadastrar um novo grupo econômico, visualizar detalhes, editar e excluir registros.

#### 📌 Tela de Bandeiras
![Tela de Bandeiras](docs/Screenshot%202025-02-14%20at%2017-57-31%20VochTech.png)
Nesta tela, é possível listar todas as bandeiras cadastradas, adicionar novas, visualizar detalhes, editar e excluir registros.

#### 📌 Tela de Unidades
![Tela de Unidades](docs/Screenshot%202025-02-14%20at%2017-57-37%20VochTech.png)
Esta tela permite visualizar a lista de unidades cadastradas, adicionar novas unidades, visualizar detalhes, editar e excluir registros.

#### 📌 Tela de Colaboradores
![Tela de Colaboradores](docs/Screenshot%202025-02-14%20at%2017-57-43%20VochTech.png)
Na tela de colaboradores, é possível listar todos os colaboradores cadastrados, adicionar novos, visualizar detalhes, editar e excluir registros.

#### 📌 Tela de Auditoria
![Tela de Auditoria](docs/Screenshot%202025-02-14%20at%2017-57-50%20VochTech.png)
A tela de auditoria exibe um histórico detalhado de todas as ações realizadas no sistema, incluindo registros criados e modificados. Essa funcionalidade permite um acompanhamento preciso das alterações feitas pelos usuários.

## 📜 Licença
Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
