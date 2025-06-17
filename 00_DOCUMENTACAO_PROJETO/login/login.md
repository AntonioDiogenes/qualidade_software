# 🔐 Funcionalidade: Login

## 🧾 História de Usuário
> Como **usuário cadastrado**, quero **fazer login no sistema** para **acessar as funcionalidades protegidas**.

---

## 🎯 Caso de Uso: Realizar Login

**Ator Principal:** Usuário  
**Pré-condição:** Usuário já deve estar cadastrado

### Fluxo Principal:
1. Usuário acessa a tela de login
2. Preenche os campos de e-mail e senha
3. Clica no botão "Entrar"
4. Sistema valida as credenciais
5. Se válidas, redireciona para o dashboard

### Fluxo Alternativo:
- Se inválidas, o sistema exibe uma mensagem de erro e permanece na tela de login

---

## ✅ Requisitos Funcionais
- RF01: Exibir formulário de login com campos de e-mail e senha
- RF02: Validar credenciais com base nos dados do banco
- RF03: Redirecionar para a dashboard em caso de sucesso
- RF04: Exibir mensagem de erro se as credenciais forem inválidas

---

## 📐 Requisitos Não Funcionais
- RNF01: O login deve ser processado em até 2 segundos
- RNF02: A senha deve estar protegida via hash (bcrypt)
- RNF03: A interface deve ser responsiva e acessível

---

## 📌 Validações
- E-mail: obrigatório e formato válido
- Senha: obrigatória
- Autenticação deve falhar se e-mail ou senha forem inválidos

---

## 🧪 Testes
- ✅ Login com credenciais corretas
- ❌ Login com e-mail incorreto
- ❌ Login com senha incorreta
- ❌ Login com campos vazios

---

## 📦 Versionamento
- Introduzido na versão: `v1.0.0`
- Commit padrão: `feat(#ID): implementar login com Breeze`

---

## 🧪 Controle de Qualidade
- Código revisado via Pull Request
- Cobertura de testes manuais validada
- Nenhum erro no console
- Funcionalidade integrada ao fluxo de autenticação do Laravel Breeze
