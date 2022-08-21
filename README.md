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
        python ~/.local/bin/mdk create -v 400 -e mysqli -n moodle-400-klaza
        ```


