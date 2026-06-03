# IFRS Portal Theme

Tema do [Wordpress](https://wordpress.org/) para o Portal Institucional do [Instituto Federal do Rio Grande do Sul](https://ifrs.edu.br/).

## Índice

- [Características Principais](#características-principais)
- [Requisitos](#requisitos)
- [Dependências](#dependências)
- [Instalação e Desenvolvimento](#instalação-e-desenvolvimento)
- [Configuração](#configuração)
- [Template Parts](#template-parts)
- [Padrões de Blocos](#padrões-de-blocos)
- [Customização](#customização)
- [Recursos de Acessibilidade](#recursos-de-acessibilidade)
- [Performance e Otimizações](#performance-e-otimizações)
- [Estrutura de Arquivos](#estrutura-de-arquivos)
- [Temas Derivados](#temas-derivados)
- [Licença](#licença)

## Características Principais

- **Editor de Blocos (Gutenberg)**: Suporte completo ao editor de blocos com Block Patterns customizados
- **Block Theme**: Tema moderno baseado em blocos com `theme.json` configurado
- **Sistema de Taxonomias**: Taxonomia "Escopo" para categorização avançada de posts
- **Template Parts Editáveis**: Cabeçalho, rodapé e outras áreas editáveis via editor de blocos
- **Bootstrap 5**: Framework CSS responsivo e moderno
- **Design GOV.BR**: Integração com componentes do Design System do Governo Federal
- **Multisite**: Desenvolvido especificamente para instalações multisite do WordPress
- **SEO Otimizado**: Sistema de SEO integrado com suporte para Yoast SEO
- **Acessibilidade**: Integração com VLibras e recursos de acessibilidade WCAG
- **Breadcrumb Automático**: Navegação estrutural automática
- **Imagens Responsivas**: Lazy loading e tratamento automático de imagens
- **Vídeos Responsivos**: Embeds do YouTube automaticamente responsivos
- **DataTables**: Tabelas interativas e responsivas
- **Font Awesome**: Biblioteca completa de ícones

## Requisitos

### Sistema

- **WordPress**: 6.9 ou superior
- **PHP**: 8.1 ou superior
- **MySQL**: 5.7 ou superior (ou MariaDB equivalente)

### Desenvolvimento

- [Node.js](https://nodejs.org/) (versão LTS recomendada)
- [NPM](https://www.npmjs.com/)
- [Gulp CLI](https://gulpjs.com/) (`npm install -g gulp-cli`)

## Dependências

### Plugins Obrigatórios

- [Meta Box](https://br.wordpress.org/plugins/meta-box/): Framework para criação de custom fields e metaboxes
- [CMB2](https://br.wordpress.org/plugins/cmb2/): Framework adicional para metaboxes (compatibilidade)

### Plugins Recomendados

- [Disable Comments](https://br.wordpress.org/plugins/disable-comments/): Desabilita a funcionalidade de comentários globalmente (este tema não suporta comentários)
- [Yoast SEO](https://br.wordpress.org/plugins/wordpress-seo/): Plugin de SEO compatível com o breadcrumb do tema

### Plugins do Ecossistema IFRS

- [IFRS Portal Plugin Roles](https://github.com/IFRS/portal-plugin-roles): Funções administrativas extras para gestão de permissões
- [IFRS Portal Plugin Sitesort](https://github.com/IFRS/portal-plugin-sitesort): Ordenação personalizada de sites em instalações multisite
- [IFRS Portal Plugin Concursos](https://github.com/IFRS/portal-plugin-concursos): Gerenciamento completo de concursos públicos
- [IFRS Portal Plugin Documentos](https://github.com/IFRS/portal-plugin-documentos): Sistema de gestão de documentos institucionais
- [IFRS Portal Plugin Editais](https://github.com/IFRS/portal-plugin-editais): Gerenciamento de editais e processos seletivos
- [IFRS Portal Plugin Cursos Estude](https://github.com/IFRS/portal-plugin-cursos-estude): Cursos obtidos do catálogo de cursos do site Estude no IFRS

## Instalação e Desenvolvimento

### Instalação das Dependências

Primeiramente, instale as dependências do projeto:

```bash
npm install
```

### Compilação para Desenvolvimento

Para compilar/construir o tema no ambiente de desenvolvimento:

```bash
gulp build
```

*Os arquivos compilados ficam na pasta `build/`.*

### Modo de Observação (Watch)

Para desenvolvimento contínuo com recompilação automática:

```bash
gulp
```

### Compilação para Produção

Para criar uma versão otimizada e minificada para produção:

```bash
gulp build --production
```

*Será criada a pasta `dist/ifrs-portal-theme` com o tema completo, otimizado e pronto para ser utilizado em produção.*

### Browser Sync (Desenvolvimento)

Para utilizar o Browser Sync durante o desenvolvimento:

```bash
gulp --url=seusite.local
```

## Configuração

### Menus de Navegação

O tema oferece 4 localizações de menu:

1. **Barra de Acessibilidade** (`acessibilidade`): Atalhos de acessibilidade
2. **Barra de Serviços** (`servicos`): Sistemas e serviços institucionais
3. **Lista de Campi** (`campi`): Lista de campi do IFRS
4. **Menu Principal** (`principal`): Navegação principal

### Logo Personalizado

**Especificações recomendadas:**
- Largura: 760px
- Altura: 110px
- Formato: PNG ou SVG

### Paleta de Cores

O tema possui uma paleta de cores predefinida:

- **Principal** (`primary`): #2f9e41 - Verde IFRS
- **Destaque** (`accent`): #1351B4 - Azul GOV.BR
- **Claro** (`light`): #f8f9fa
- **Escuro** (`dark`): #212529
- **Branco** (`white`): #ffffff
- **Preto** (`black`): #000000

### Taxonomia "Escopo"

O tema inclui uma taxonomia customizada chamada **Escopo** para categorizar posts por abrangência (institucional, servidores, alunos, etc.).

**Permissões:**
- Gerenciar termos: `manage_escopos`
- Editar termos: `edit_escopos`
- Deletar termos: `delete_escopos`
- Atribuir termos: `edit_posts`

## Template Parts

| Template Part | Slug | Área | Descrição |
|---------------|------|------|-----------|
| Conteúdo do Cabeçalho | `header-content` | Cabeçalho | Conteúdo personalizado no cabeçalho do site |
| Lista de Notícias | `noticias` | Geral | Lista de notícias para a página inicial |
| Pré-Rodapé | `prefooter` | Pré-rodapé | Área antes do rodapé, para informações adicionais |
| Redes Sociais | `social` | Geral | Links para redes sociais institucionais |
| Conteúdo do Rodapé | `footer-content` | Rodapé | Conteúdo personalizado no rodapé |

## Padrões de Blocos

O tema inclui Block Patterns prontos para uso:

### query-noticias-destaque
Lista de notícias em destaque com layout especial para a página inicial.

### query-noticias
Lista geral de notícias com paginação e filtros.

### share
Botões de compartilhamento em redes sociais (Facebook, Twitter, LinkedIn, WhatsApp).

### sitemap
Mapa do site estruturado hierarquicamente.

### subpages
Lista automatizada de páginas filhas da página atual.

## Customização

### Criação de Tema Filho (Child Theme)

Para customizações avançadas, recomenda-se criar um tema filho. Exemplo de `style.css`:

```css
/**
 * Theme Name: Meu Tema IFRS
 * Template: ifrs-portal-theme
 * Description: Tema filho do IFRS Portal Theme
 * Version: 1.0.0
 */
```

E `functions.php`:

```php
<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
});
```

### Hooks e Filtros Disponíveis

O tema oferece diversos hooks para customização. Principais arquivos em `inc/`:

- `custom-queries.php`: Queries personalizadas
- `feature-image-fallback.php`: Imagem de destaque padrão
- `custom-title.php`: Títulos personalizados
- `seo.php`: Otimizações de SEO
- `breadcrumb.php`: Customização do breadcrumb
- `plugins-hooks.php`: Hooks para integração com plugins

### Limitações de Profundidade

O tema limita automaticamente:
- **Menus**: Níveis de navegação (configurável em `inc/depth-limit.php`)
- **Páginas**: Aninhamento de páginas hierárquicas

## Recursos de Acessibilidade

### VLibras

Integração automática com o [VLibras](https://www.gov.br/governodigital/pt-br/vlibras/), carregado automaticamente no rodapé.

### Conformidade WCAG 2.1

- Menu de acessibilidade com atalhos (alto contraste, fonte, etc.)
- Navegação completa por teclado
- Breadcrumb semântico para leitores de tela
- Landmarks HTML5 e atributos ARIA apropriados
- Hierarquia de headings estruturada

## Performance e Otimizações

### Otimizações Automáticas

O tema implementa automaticamente:

- **Remoção de Emojis**: Desabilita os emojis nativos do WordPress
- **Remoção de Versões**: Remove informações de versão do WordPress do HTML
- **Resource Hints**: Preconnect, prefetch e preload para recursos críticos
- **Lazy Loading**: Carregamento sob demanda de imagens (via LazySizes)
- **Minificação**: CSS e JS minificados em produção
- **Concatenação**: Redução do número de requisições HTTP

### Recursos Automáticos

- **DataTables**: Tabelas HTML transformadas automaticamente em tabelas interativas (ordenação, busca, paginação)
- **Vídeos Responsivos**: Embeds do YouTube adaptados automaticamente ao tamanho da tela

## Licença

Esse código é distribuído sob a licença [GNU GPL 3.0](https://www.gnu.org/licenses/gpl-3.0.txt).

A documentação, as imagens e demais artefatos são distribuídos sob a licença [Creative Commons Atribuição-CompartilhaIgual 4.0 Internacional](https://creativecommons.org/licenses/by-sa/4.0/deed.pt-br).
