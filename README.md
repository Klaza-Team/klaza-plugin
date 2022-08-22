# klaza-plugin

Repositorio do plugin do `Klaza` para o Moodle.

# Instalação para Desenvolvimento

- Clonear o repositorio do plugin:

    ```bash
    git clone https://github.com/Klaza-Team/klaza-plugin.git
    ```

- Instalar o MDK ([Moodle Development Kit](https://github.com/FMCorz/mdk)):

    Para o Moodle e o MDK funcionaram corretamente, são necessários os seguintes pacotes:

    - python
    - pip
    - libmysqlclient
    - libpq
    - unixodbc
    - apache2
    - php7.4
    - php74-iconv


    ```bash
    sudo apt-get install python-pip libmysqlclient-dev libpq-dev python-dev unixodbc-dev
    pip install moodle-sdk --user
    ```

- Iniciar o MDK:

  - Se os arquivos do ~/.local/bin estiverem no PATH

    ```bash
    mdk init
    ```

  - Se os arquivos do ~/.local/bin não estiverem no PATH, 

    ```bash
    python ~/.local/bin/mdk init
    ```

   ⚠️ **ATENÇÃO**: O MDK irá criar toda a configuração necessária para o Moodle. Incluindo o banco de dados e o usuário do banco de dados (tenha certaza de ter passado o login certo). Será criado as pastas para o Apache (tenha certeza que o servidor apache tenha permissão de escrita nesse diretório).

- Criar uma instancia do Moodle:
    
    - Se os arquivos do ~/.local/bin estiverem no PATH

        ```bash
        mdk create my-moodle -v 400 -e mysqli -n moodle-400-klaza
        ```

    - Se os arquivos do ~/.local/bin não estiverem no PATH, 
    
        ```bash
        python ~/.local/bin/mdk create -v 400 -e mariadb -n moodle-400-klaza
        ```

- Adicionar os requisitos do PHP 7.4

  ⚠️ **ATENÇÃO**: O Moodle 4.0.0 usa PHP 7.4 e o Apache 2.4. Podendo não funcionar corretamente com outras versões.
  Tambem é necessário instalar e ativar as segintes extensões no `/etc/php7/php.ini` para o Moodle funcionar corretamente:

  - curl
  - iconv
  - mysqli
  - gd
  - intl
  - xmlrpc
  - soap
  - sodium
  - exif
  - mbstring
  - openssl
  - tokenizer
  - ctype
  - zip
  - zlib
  - simplexml
  - spl
  - pcre
  - dom
  - xml
  - xmlreader
  - json
  - hash
  - fileinfo
  - memory_limit
  - file_uploads

  ⚠️ **ATENÇÃO**: lembre-se de sempre reiniciar o servidor apache após a instalação e modificação do Moodle e/ou PHP.

- Adicionar o config.php

  Depois de tudo é necessario adicionar o arquivo `config.php` no diretório raiz do Moodle (normalmente `/srv/http/www/moodle-400-klaza`, dependendo da pasta raiz se foi configurada no init do MDK).

  ⚠️ **ATENÇÃO**: O sistema do Moodle pode criar a configuração sozinho pelo link `http://localhost/www/moodle-400-klaza/install.php`, mas problemas podem ocorrer. Caso isso ocorra, adicione o arquivo manualmente.

  ```php
  <?php  // Moodle configuration file

  unset($CFG);
  global $CFG;
  $CFG = new stdClass();

  $CFG->dbtype    = 'mariadb';
  $CFG->dblibrary = 'native';
  $CFG->dbhost    = 'SEU HOST DO BANCO DE DADOS (provavelmente localhost)';
  $CFG->dbname    = 'NOME DO BANCO DE DADOS (provavelmente moodle400klaza)';
  $CFG->dbuser    = 'USUARIO DO BANCO DE DADOS (provavelmente root)';
  $CFG->dbpass    = 'SENHA DO BANCO DE DADOS (provavelmente root)';
  $CFG->prefix    = 'mdl_';
  $CFG->dboptions = array (
    'dbpersist' => 0,
    'dbport' => 3306,
    'dbsocket' => '',
    'dbcollation' => 'utf8mb4_unicode_ci',
  );

  $CFG->wwwroot   = 'http://localhost/www/moodle-400-klaza';
  $CFG->dataroot  = '/srv/http/moodles/moodle-400-klaza/moodledata';
  $CFG->admin     = 'admin';

  $CFG->directorypermissions = 0777;

  require_once(__DIR__ . '/lib/setup.php');

  // There is no php closing tag in this file,
  // it is intentional because it prevents trailing whitespace problems! 

  ```

- Entrar no Moodle:
    
  Entre no link `http://localhost/www/moodle-400-klaza/` ou `http://localhost/www/moodle-400-klaza/admin/index.php` para o Moodle fazer todas as configurações necessárias e criar o banco de dados.

- Instalar o plugin:
    
  ```bash
  sudo python dev/install.py
  ```