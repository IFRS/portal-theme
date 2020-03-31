# IFRS Portal Theme

Tema do [Wordpress](https://wordpress.org/) para o Portal Institucional do [Instituto Federal do Rio Grande do Sul](https://ifrs.edu.br/).

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

*Nesse caso, será criada a pasta `dist` com o tema completo e pronto para ser utilizado em produção.*

## Projetos Relacionados

- [Tema para os Campi](https://github.com/IFRS/portal-theme-campus)
- [Tema para o Centro Tecnológico de Acessibilidade](https://github.com/IFRS/portal-theme-cta)
- [Plugin para Cartola em notícias](https://github.com/IFRS/portal-plugin-cartola)
- [Plugin para gerenciamento de Concursos](https://github.com/IFRS/portal-plugin-concursos)
- [Plugin para gerenciamento de Cursos](https://github.com/IFRS/portal-plugin-cursos)
- [Plugin para gerenciamento de Documentos](https://github.com/IFRS/portal-plugin-documentos)
- [Plugin para gerenciamento de Editais](https://github.com/IFRS/portal-plugin-editais)
- [Plugin para criação de funções extras](https://github.com/IFRS/portal-plugin-roles)

## Licença

Esse código é distribuído sob a licença [GNU GPL 3.0](https://www.gnu.org/licenses/gpl-3.0.txt).

A documentação, as imagens e demais mídias são distribuídas sob a licença [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International](https://creativecommons.org/licenses/by-nc-sa/4.0/).
