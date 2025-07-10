# 📘 Documentação do Projeto de Qualidade de Software

Bem-vindo à documentação oficial deste projeto de desenvolvimento de software com foco em **boas práticas de qualidade**.

Este repositório tem como objetivo registrar de forma clara, rastreável e padronizada **todos os artefatos e decisões** relacionados ao sistema, desde a elicitação de requisitos até os testes e controle de versão.

---

## 🔍 Sobre o Projeto

Este sistema foi idealizado para atender a uma demanda simulada de mercado, permitindo o cadastro de empresas, seus funcionários, e o controle de movimentações financeiras (entradas e saídas) por colaborador.

---

## 🧾 Padrão de Nomenclatura de Arquivos

Todos os arquivos e pastas dentro da documentação seguirão o padrão de **snake_case**.

### ✅ Formato adotado:
- Letras minúsculas
- Palavras separadas por underline (_)

### 📌 Exemplos:
- `login.md`
- `cadastro_empresa.md`
- `registro_caixa.md`

### 🎯 Justificativa:
O padrão **snake_case** foi escolhido por ser:
- **Coerente com a estrutura do Laravel**, especialmente em rotas, nomes de migrações e tabelas.
- **Fácil de ler e organizar** em sistemas de arquivos.
- Um formato amplamente adotado em projetos PHP e Laravel.

> Esse padrão garante uniformidade, clareza e alinhamento com a convenção do framework utilizado no projeto.


## 🗂️ Padrão de Commits

Para garantir organização e rastreabilidade no projeto, todos os commits devem seguir o padrão abaixo:

### 🏷️ Formato do Commit:

<tag_gitflow>(#id_tarefa): descrição breve da alteração

### 🔧 Tags de GitFlow válidas:
- `feat`: nova funcionalidade
- `fix`: correção de bug
- `docs`: alteração na documentação
- `refactor`: refatoração de código
- `test`: adição ou modificação de testes
- `chore`: tarefas gerais (build, configs, dependências)
- `style`: ajustes visuais ou de formatação

### 📌 Regras:
- Sempre vincular o commit ao **ID do card** no quadro de tarefas (ex: `#23`)
- A descrição deve ser **curta e objetiva**, no imperativo
- Commits devem refletir mudanças **coesas e rastreáveis**

### ✅ Exemplos:
- `feat(#12): implementar tela de login`
- `fix(#34): corrigir erro na validação de CNPJ`
- `docs(#07): criar documentação da funcionalidade de caixa`

> Esse padrão facilita o rastreio entre código e planejamento, integra bem com ferramentas como GitHub Issues e segue o fluxo GitFlow adotado no projeto.

## 📁 Estrutura da Documentação

Cada **funcionalidade** do sistema terá sua própria **pasta dedicada**, contendo todos os documentos relacionados ao seu ciclo de vida.

### Exemplo de estrutura:

00_DOCUMENTACAO_PROJETO/
│
├── index.md
├── login/
│ └── login.md
├── cadastro_empresa/
│ └── cadastro_empresa.md
├── registro_caixa/
│ └── registro_caixa.md
...

Dentro de cada pasta, será seguido o **padrão de documentação** com:

- História de usuário  
- Caso de uso  
- Requisitos funcionais  
- Requisitos não funcionais  
- Validações e regras de negócio  
- Estratégia de testes  
- Versionamento  
- Controle de qualidade

> Esse formato facilita a organização, rastreabilidade e evolução da documentação ao longo do projeto.
---

## ✅ Objetivo

Garantir que todas as funcionalidades implementadas sigam um **padrão de qualidade**, facilitando o entendimento, manutenção e evolução do sistema.

## Controle de Mudanças de Código

O controle de mudanças é um processo estruturado para gerenciar modificações no código-fonte de um projeto, garantindo estabilidade, rastreabilidade e qualidade. Ele define como as alterações são desenvolvidas, testadas e promovidas até a produção, minimizando riscos e falhas. Dessa forma, utilizamos Git como sistema de controle de versão distribuído e GitHub como plataforma para gerenciamento de repositórios, revisão de código e colaboração entre desenvolvedores.

### Fluxo de linhas:

- **Branches das issues**:
    - Linhas responsáveis pelo de desenvolvimento, criada a partir da branch "dev";
    - A branch deve começar com o prefixo "feat/", depois o nome da funcionalidade que será tratada. Exemplo: feat/cadasto-lote-candidato;
    - As issues são criadas a partir da main, caso seja a primeira a ser criada, ou a partir de outra branch já testada, caso possua outras branches que podem ser aproveitadas;  
    - Cada issue terá sua própria branch para desenvolvimento;
    - Após a implementação, deve-se abrir um Pull Request para a branch "dev";
    
- **Homologação**:
    - Linha responsável por validar as branches criadas antes de ser envida para a produção;
    - Linha criada a partir da branch "main";
    - Caso todas as branches criadas sejam validadas com sucesso nesta linha, haverá um Pull Request para a linha de produção, ou seja, para a branch "main";
    - Caso exista algum erro ao realizar a validação de alguma branch enviada para essa linha, serão criadas branches de correção até que tudo esteja validado com sucesso.

- **Produção**:
    - Linha responsável por receber códigos validados pela branch de homologação e por subir o sistema para o servidor de produção automaticamente;
    - Se trata da linha chamada "main";
    - Caso exista algum erro no sistema em produção, será feita a restauração do "commit" anterior, caso exista versões antigas, e serão criadas branches de correção.
    
- **Branches das hotfix/correções de erro:**
    - Linha responsável pela correção de erros verificada na branch de homologação ou produção;
    - A branch deve começar com o prefixo "hotfix/", depois o nome da funcionalidade que será tratada. Exemplo: hotfix/validacao-imc-candidato;
    - Se um erro for identificado nas validações da linha "dev" ou na "main", uma nova branch de hotfix será criada a partir dela;
    - Cada correção será implementada, testada e, se aprovada, integrada novamente à dev, assim como nas branches de issues.

### Diagrama de Fluxo:

O fluxo ilustrado abaixo demonstrando as linhas de desenvolvimento (branches das issues, representadas por "feat"), homologação ("dev"), produção ("main") e correções ("hotfix"). Esse diagrama reforça a importância de seguir o processo para garantir a qualidade e integridade do código.

[![Fluxo de Mudanças](https://i.postimg.cc/26zB50dN/Fluxo-de-mudan-as-2.png)](https://postimg.cc/CZQKPH6c)
