# IFRS Portal Theme

Tema do [Wordpress](https://wordpress.org/) para o Portal Institucional do [Instituto Federal do Rio Grande do Sul](https://ifrs.edu.br/).

## Dependências

Esse tema depende obrigatoriamente dos plugins [Metabox](https://br.wordpress.org/plugins/meta-box/) e [CMB2](https://br.wordpress.org/plugins/cmb2/). Além desses, recomenda-se o uso dos plugins abaixo:

- [Editor Clássico](https://br.wordpress.org/plugins/classic-editor/): Plugin para desabilitar o Gutenberg, o novo editor de conteúdo do Worpress.
- [Widgets Clássicos](https://br.wordpress.org/plugins/classic-widgets/): Plugin para desabilitar a nova forma de adição de widgets baseada no Gutenberg.
- [Disable Comments](https://br.wordpress.org/plugins/disable-comments/): Plugin que desabilita a funcionalidade de comentários globalmente, já que este tema não suporta comentários.
- [IFRS Portal Plugin Roles](https://github.com/IFRS/portal-plugin-roles): Plugin para criação de funções administrativas extras.
- [IFRS Portal Plugin Cartola](https://github.com/IFRS/portal-plugin-cartola): Plugin para transformar as categorias dos posts (notícias) em Cartola.
- [IFRS Portal Plugin Sitesort](https://github.com/IFRS/portal-plugin-sitesort): Plugin para ordenar a lista de sites em uma instalação multisite do Wordpress.
- [IFRS Portal Plugin Concursos](https://github.com/IFRS/portal-plugin-concursos): Plugin para gerenciamento de Concursos.
- [IFRS Portal Plugin Documentos](https://github.com/IFRS/portal-plugin-documentos): Plugin para gerenciamento de Documentos.
- [IFRS Portal Plugin Editais](https://github.com/IFRS/portal-plugin-editais): Plugin para gerenciamento de Editais.

## Utilização

Para a construção desse projeto são necessárias as seguintes ferramentas:
- [NodeJs](https://nodejs.org/) com [NPM](https://www.npmjs.com/)
- [Gulp CLI](https://gulpjs.com/)

Primeiramente é preciso instalar as dependências:

```
$ npm install
```

Em seguida, para compilar/construir o tema no ambiente de desenvolvimento:

```
$ gulp build
```

*Dessa forma, os arquivos compilados ficam na pasta raiz.*

Para produção:

```
$ gulp build --production
```

*Nesse caso, será criada a pasta `dist/ifrs-portal-theme` com o tema completo e pronto para ser utilizado em produção.*

## Temas Derivados

- [Tema para os Campi](https://github.com/IFRS/portal-theme-campus)
- [Tema para o Centro Tecnológico de Acessibilidade](https://github.com/IFRS/portal-theme-cta)

## Licença

Esse código é distribuído sob a licença [GNU GPL 3.0](https://www.gnu.org/licenses/gpl-3.0.txt).

A documentação, as imagens e demais mídias são distribuídas sob a licença [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International](https://creativecommons.org/licenses/by-nc-sa/4.0/).
