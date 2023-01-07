# v 1.0.10

- Removido `db/install.php` pois não é mais necessário.
- Modificado formato de versão numerica no `version.php` para `XYYZZ` (ex: 10010).

# v 1.0.9

- Adicionado `creator_id` na tabela `klaza_alert` para armazenar o id do usuario que criou o alerta.

# v 1.0.8

- Adicionada a tabela `klaza_user_config` para armazenar configs do usuario.
- Adicionada a tabela `klaza_user_inst_conf` para armazenar as configurações da instancia do usuario.
- Adicionada a tabela `klaza_disc_inst_conf` para armazenar as configurações das instancias do discord.
- Adicionada a tabela `klaza_tele_inst_conf` para armazenar as configurações das instancias do telegram.
- Adicionada a tabela `klaza_disc_accounts` para armazenar as contas do discord.
- Adicionada a tabela `klaza_tele_accounts` para armazenar as contas do telegram.
- Adicionada a tabela `klaza_whats_accounts` para armazenar as contas do whatsapp.
- Adicionada a table `klaza_global_config` para armazenar as configurações globais.
- Adicionado `creator_id` na tabela `klaza_discord_instance` para armazenar o id do usuario que criou a instancia.
- Adicionado `creator_id` na tabela `klaza_telegram_instance` para armazenar o id do usuario que criou a instancia.

# v 1.0.7

- Arrumado e comentado o `db/events.php` para funcionar com os eventos que estavam falhando e/ou com erro.

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