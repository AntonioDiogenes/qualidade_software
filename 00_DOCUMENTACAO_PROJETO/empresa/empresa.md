# 🏢 Funcionalidade: Empresa

## 🧾 História de Usuário
> Como administrador, quero **cadastrar e gerenciar empresas** para que eu possa associar funcionários a elas e organizar as movimentações financeiras por entidade jurídica.

---

## 🎯 Caso de Uso: Gerenciar Empresa

**Atores:** Administrador do sistema  
**Pré-condição:** Estar logado no sistema

### Fluxo Principal:
1. Acessa a tela de cadastro de empresa
2. Preenche razão social, nome fantasia, CNPJ e endereço
3. Clica em "Salvar"
4. Sistema valida os dados e armazena no banco
5. Redireciona para a listagem de empresas com mensagem de sucesso

### Fluxo Alternativo:
- Campos obrigatórios não preenchidos → exibe mensagem de erro
- CNPJ inválido → exibe erro e bloqueia o envio
- CNPJ duplicado → exibe erro

---

## ✅ Requisitos Funcionais
- RF01: Permitir cadastro de empresas com razão social, nome fantasia, CNPJ e endereço
- RF02: Permitir edição e exclusão de empresas cadastradas
- RF03: Listar empresas registradas
- RF04: Validar CNPJ antes de salvar

---

## 📐 Requisitos Não Funcionais
- RNF01: Interface responsiva e clara para o cadastro
- RNF02: CNPJ deve ser validado no front e no back-end
- RNF03: Banco deve garantir unicidade do CNPJ

---

## 📌 Validações
- Razão social: obrigatória, mínimo 3 caracteres
- Nome fantasia: opcional
- CNPJ: obrigatório, válido e único
- Endereço: obrigatório

---

## 🧪 Testes
- ✅ Cadastro de empresa com todos os dados válidos
- ❌ Cadastro com CNPJ inválido
- ❌ Cadastro com campos obrigatórios vazios
- ❌ Cadastro com CNPJ duplicado
- ✅ Edição e exclusão de empresa
- ✅ Listagem geral de empresas

---

## 📦 Versionamento
- Introduzido na versão: `v1.0.0`
- Commit padrão: `feat(#ID): implementar cadastro e gestão de empresas`

---

## 🧪 Controle de Qualidade
- Código revisado via Pull Request
- Testes manuais validados
- CNPJ com verificação real
- Integração validada com entidade Pessoa
