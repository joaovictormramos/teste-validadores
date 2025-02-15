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



## 📜 Licença
Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
