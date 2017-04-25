# IFRS Portal Theme

Tema [Wordpress](https://wordpress.org/) para o Portal Institucional do [Instituto Federal do Rio Grande do Sul](http://ifrs.edu.br/).

## Uso

Para a construção desse projeto são necessárias as seguintes ferramentas:
-   [NodeJs](https://nodejs.org/) com [NPM](https://www.npmjs.com/)
-   [Gulp CLI](http://gulpjs.com/)
-   [Bower](https://bower.io/)

Após, é preciso instalar as dependências de desenvolvimento:

`npm install`

E para compilar/construir o tema:

`gulp`

Ao construir o tema, o Gulp roda automaticamente o comando abaixo para obter as dependências de produção (necessárias para utilizar o tema no Wordpress):

`bower install`

O Gulp deste projeto possui tarefas separadas para...

compilar os estilos:

`gulp css`

processar os scripts:

`gulp js`

otimizar as imagens:

`gulp images`

limpar o projeto:

`gulp clean`

construir e preparar para distribuição:

`gulp dist` (a pasta `./dist` conterá os arquivos do tema)

realizar o deploy (usando rsync):

`gulp deploy --host=ENDEREÇO-DO-SERVIDOR --path=/caminho/para/a/pasta/do/tema`

## Projetos relacionados

Build do Wordpress baseada no projeto [Bedrock](https://roots.io/bedrock/): <https://github.com/IFRS/portal-bedrock>

## Licença

Esse código é distribuído sob a licença [GNU GPL v3](http://www.gnu.org/licenses/gpl-3.0.txt).

A documentação, as imagens e demais mídias são distribuídas sob a licença [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International](https://creativecommons.org/licenses/by-nc-sa/4.0/)
