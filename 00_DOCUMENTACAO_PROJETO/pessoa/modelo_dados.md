### pessoas
- id (bigint, PK)
- id_empresa (bigint, FK → empresas.id)
- nome (string)
- email (string, único)
- telefone (string, opcional)
- data_nascimento (date, opcional)
- observacoes (text, opcional)
- created_at (timestamp)
- updated_at (timestamp)
- deleted_at (timestamp, soft delete)