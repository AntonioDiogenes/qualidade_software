# 👤 Funcionalidade: Pessoa

## 🧾 História de Usuário
> Como administrador, quero **cadastrar pessoas (funcionários)** vinculadas a uma empresa, para poder gerenciar suas informações e movimentações financeiras.

---

## 🎯 Caso de Uso: Gerenciar Pessoa

**Atores:** Administrador do sistema  
**Pré-condição:** A empresa deve estar previamente cadastrada

### Fluxo Principal:
1. Acessa a tela de cadastro de pessoa
2. Preenche nome, CPF, data de nascimento e vínculo com a empresa
3. Clica em "Salvar"
4. Sistema valida os dados e salva no banco
5. Redireciona para a listagem de pessoas com mensagem de sucesso

### Fluxo Alternativo:
- Campos obrigatórios não preenchidos → exibe mensagem de erro
- CPF inválido → exibe erro e bloqueia o envio

---

## ✅ Requisitos Funcionais
- RF01: Permitir cadastrar pessoas com nome, CPF, data de nascimento e empresa associada
- RF02: Permitir editar e excluir registros de pessoa
- RF03: Listar todas as pessoas cadastradas por empresa
- RF04: Validar CPF antes de salvar

---

## 📐 Requisitos Não Funcionais
- RNF01: Interface responsiva e acessível
- RNF02: Validação de CPF feita no front e back-end
- RNF03: Banco deve manter integridade com a chave estrangeira da empresa

---

## 📌 Validações
- Nome: obrigatório, mínimo 3 caracteres
- CPF: obrigatório, formato válido e único
- Data de nascimento: obrigatória, deve ser data válida
- Empresa associada: obrigatória

---

## 🧪 Testes
- ✅ Cadastro com todos os dados corretos
- ❌ Cadastro com CPF inválido
- ❌ Cadastro com campos obrigatórios vazios
- ✅ Edição e exclusão de uma pessoa
- ✅ Listagem filtrada por empresa

---

## 📦 Versionamento
- Introduzido na versão: `v1.1.0`
- Commit padrão: `feat(#ID): implementar cadastro e gestão de pessoas`

---

## 🧪 Controle de Qualidade
- Código revisado via Pull Request
- Testes manuais validados
- Nenhum erro de console ou quebra de fluxo
- Funcionalidade integrada ao relacionamento com empresas
