# 🎟️ Ação entre amigos

> Plataforma Full Stack para gestão de rifas digitais.
> **Contexto:** Este projeto foi um marco fundamental na minha jornada, desenvolvido para consolidar os conhecimentos adquiridos no início do meu estágio em desenvolvimento Web.

### 💻 Sobre o Projeto (A Jornada)

O **Ação entre amigos** nasceu não apenas para resolver o problema de gestão de rifas manuais, mas principalmente como meu **primeiro grande desafio Full Stack**.

O objetivo era claro: pegar tudo que eu estava aprendendo no estágio (PHP, Laravel, MVC) e aplicar em um produto real, do zero. Foi neste projeto que saí da teoria e entendi, na prática, como conectar um front-end dinâmico a um banco de dados relacional, lidando com regras de negócio reais.

---

### 🛠 Tecnologias (O Alicerce)

Utilizei a stack clássica e robusta que fundamentou minha base como desenvolvedor:

- **Back-end:** PHP 8.2 e Laravel 11(Framework MVC).
- **Front-end:** Blade Templates (Renderização no servidor) e Bootstrap 5 (Estilização).
- **Interatividade:** JavaScript Vanilla (Manipulação do DOM).
- **Banco de Dados:** PostgreSQL.

---

### ✨ Funcionalidades Entregues

Apesar de ser um projeto de aprendizado, foquei em entregar um fluxo completo:

- [x] **Landing Page e design responsivo:** Aprendizados e melhorias em HTML, CSS e JS básicos para solidificar conhecimentos.
- [x] **CRUD de Campanhas:** Criação, edição e exclusão de rifas.
- [x] **Grid de Bilhetes:** Geração visual dos números (000 a 999) com status (Livre/Reservado).
- [x] **Cadastro e Autenticação de Usuários/Admins(Instituições):** CRUD de usuário e autenticação com o próprio laravel em si (método attempt($credentials)).
- [x] **Buscas** Uso de queries com o Eloquent para filtragem de rifas.
- [ ] **Filtragem das rifas:** Construção de filtros para melhorar consultas.
- [x] **Fluxo de Compra:** O usuário pode selecionar números de rifas e "comprar", tornado-os "reservados".
- [x] **Validação de Dados:** Uso das `Requests` do Laravel para impedir dados inválidos.

---

### 🧠 O que eu aprendi (Consolidação)

Este projeto foi minha "escola" para conceitos que uso até hoje:

1. **Arquitetura MVC na Prática:** Foi aqui que entendi de verdade a responsabilidade de cada camada (Model, View, Controller) e por que não devemos misturar lógica de banco de dados na visualização.
2. **Relacionamentos SQL:** Aprendi a modelar tabelas relacionais (Uma Rifa *tem muitos* Números; Um Número *pertence a* uma Rifa) e tabelas-pivô (Usuários compraram 1 ou muitos números).
3. **Blade & Componentização:** Como reutilizar pedaços de código HTML (como headers e cards) para não repetir código.
4. **O problema da Concorrência:** Tive meu primeiro contato com o conceito de *Race Conditions* (o que acontece se duas pessoas clicarem no número 50 ao mesmo tempo?) e comecei a estudar como transações de banco de dados e filas de mensageria resolvem isso.

---

### 🚀 Melhorias (Visão de Futuro)

Olhando hoje para este projeto, com a experiência que adquiri, eu implementaria:

- [ ] **Filas (Queues):** Para processar as reservas em segundo plano.
- [ ] **Implementação de Mutex:** Para evitar race conditions.
- [ ] **API Rest:** Separar o Back-end do Front-end para permitir um app mobile.
- [ ] **Testes Automatizados:** Garantir que a lógica de venda nunca quebre.

---

### 📦 Como rodar o projeto

```bash
# 1. Clone o repositório
$git clone [https://github.com/emanuelbrebal/acao-entre-amigos.git$](https://github.com/emanuelbrebal/acao-entre-amigos.git$) cd acao-entre-amigos

# 2. Instale as dependências
$ composer install
$ npm install

# 3. Configure o ambiente
$cp .env.example .env$ php artisan key:generate

# 4. Rode as migrações (Criação do Banco)
$ php artisan migrate

# 5. Inicie o servidor
$ php artisan serve
