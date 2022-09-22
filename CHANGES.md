
# v 1.0.6

- Removido `guild` da tabela `klaza_telegram_instance` pois não é mais necessário.
- Adicionado o arquivo `.gitignore` para ignorar arquivos temporários.
- Adicionado o arquivo `db/upgrade.php` para atualizar o banco de dados em cada versão (não é mais necessario apagar tudo e reinstalar).

# v 1.0.5

- Adicionado `eventname` (`VARCHAR(100)`) na tabela `klaza_quiz_notification` para permitir que o sistema envie notificações para eventos específicos.
- Adicionado `eventname` (`VARCHAR(100)`) na tabela `klaza_assign_notification` para permitir que o sistema envie notificações para eventos específicos.
  
# v 1.0.4

- Adicionado o arquivo `CHANGES.md` para documentar as mudanças feitas no plugin.
- Adicionado o cabeçalho `KlazaKey` nas requisições enviadas para o servidor.

# v 1.0.3

- Mudado `guild` e `channel` da tabela `klaza_discord_instance` para `VARCHAR(100)`. Antes era `BIGINT(10)`. 
- Mudado `guild` e `channel` da tabela `klaza_telegram_instance` para `VARCHAR(100)`. Antes era `BIGINT(10)`. 
- Mudado `course_id` da tabela `klaza_telegram_instance` para `BIGINT(10)`. Antes era `LONGTEXT`. 
- Mudado `type` da tabela `klaza_user_instance` para `VARCHAR(100)`. Antes era `LONGTEXT`. 

# v 1.0.2

- Mudado nome `curse_id` para `course_id` na tabela `klaza_alert`.

# v 1.0.1

- Removida a tabela `klaza_user`

# v 1.0.0

- Versão inicial do plugin.