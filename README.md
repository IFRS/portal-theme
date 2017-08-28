# IFRS Portal Theme

Tema [Wordpress](https://wordpress.org/) para o Portal Institucional do [Instituto Federal do Rio Grande do Sul](http://ifrs.edu.br/).

## Uso

Para a construção desse projeto são necessárias as seguintes ferramentas:
-   [NodeJs](https://nodejs.org/) com [NPM](https://www.npmjs.com/)
-   [Gulp CLI](http://gulpjs.com/)

Após, é preciso instalar as dependências:

`npm install`

E para compilar/construir o tema:

`gulp` ou `gulp build`

O Gulp deste projeto possui tarefas separadas para...

somente compilar os estilos:

`gulp sass`

compilar e minificar os estilos:

`gulp css`

empacotar os scripts:

`gulp webpack`

empacotar e minificar os scripts:

`gulp js`

otimizar as imagens:

`gulp images`

preparar o projeto e copiar os arquivos para distribuição:

`gulp dist`

limpar o projeto:

`gulp clean`

## Licença

Esse código é distribuído sob a licença [GNU GPL 3.0](http://www.gnu.org/licenses/gpl-3.0.txt).

A documentação, as imagens e demais mídias são distribuídas sob a licença [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International](https://creativecommons.org/licenses/by-nc-sa/4.0/)
