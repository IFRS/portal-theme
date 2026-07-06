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
- **Template Parts Editáveis**: Cabeçalho, rodapé e outras áreas editáveis via editor de blocos
- **Bootstrap 5**: Framework CSS responsivo e moderno
- **Design GOV.BR**: Integração com componentes do Design System do Governo Federal
- **Multisite**: Desenvolvido especificamente para instalações multisite do WordPress
- **SEO Otimizado**: Sistema de SEO integrado com suporte para Yoast SEO
- **Acessibilidade**: Integração com VLibras e recursos de acessibilidade WCAG
- **Breadcrumb Automático**: Navegação estrutural automática nativa com integração ao Yoast SEO
- **Imagens Responsivas**: Lazy loading nativo e imagem de destaque padrão (fallback) em listagens
- **Vídeos e iFrames Responsivos**: Embeds e iframes com lazy loading automático
- **DataTables**: Tabelas interativas e responsivas
- **Font Awesome**: Biblioteca completa de ícones
- **Bloco Dinâmico**: Bloco `portal/post-type-badge` para exibir badge do tipo de post em Query Loops
- **Restrições de Heading**: Bloco H1 desabilitado no conteúdo do editor para preservar a hierarquia de headings

## Requisitos

### Sistema

- **WordPress**: 6.9 ou superior (testado até 7.0)
- **PHP**: 8.1 ou superior
- **MySQL**: 5.7 ou superior (ou MariaDB equivalente)

### Desenvolvimento

- [Node.js](https://nodejs.org/) (versão LTS recomendada)
- [NPM](https://www.npmjs.com/)

## Dependências

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
- [Meta Box](https://br.wordpress.org/plugins/meta-box/): Framework para custom fields e metaboxes utilizado pelos plugins do ecossistema
- [CMB2](https://br.wordpress.org/plugins/cmb2/): Framework adicional para metaboxes utilizado pelos plugins do ecossistema

## Instalação e Desenvolvimento

### Instalação das Dependências

Primeiramente, instale as dependências do projeto:

```bash
npm install
```

### Compilação para Desenvolvimento

Para compilar/construir o tema no ambiente de desenvolvimento:

```bash
npm run dev
```

*Os arquivos compilados ficam na pasta `build/`.*

### Modo de Observação (Watch)

Para desenvolvimento contínuo com recompilação automática:

```bash
npm run start
```

### Compilação para Produção

Para criar uma versão otimizada e minificada para produção:

```bash
npm run build
```

*Será atualizada a pasta `build/` com os assets otimizados para produção.*

### Análise do Bundle

Para visualizar o tamanho e composição do bundle gerado:

```bash
npm run analyze
```

### Linting

```bash
npm run lint        # Verifica JS e CSS
npm run lint:fix    # Corrige automaticamente quando possível
```

## Configuração

### Menus de Navegação

O tema oferece 3 localizações de menu:

1. **Barra de Acessibilidade** (`acessibilidade`): Atalhos de acessibilidade
2. **Lista de Campi** (`campi`): Lista de campi do IFRS — registrado apenas no site principal em instalações multisite
3. **Menu Principal** (`principal`): Navegação principal

### Logo Personalizado

**Especificações recomendadas:**
- Largura: 760px
- Altura: 110px
- Formato: PNG ou SVG

### Paleta de Cores

O tema possui uma paleta de cores predefinida, mapeada para variáveis CSS do Bootstrap:

- **Principal** (`primary`): Verde IFRS — `var(--bs-primary)`
- **Secundário** (`secondary`): `var(--bs-secondary)`
- **Destaque** (`accent`): Azul GOV.BR — `var(--bs-accent)`
- **Dourado** (`gold`): `var(--bs-gold)`
- **Claro** (`light`): `var(--bs-light)`
- **Escuro** (`dark`): `var(--bs-dark)`
- **Branco** (`white`): `var(--bs-white)`
- **Preto** (`black`): `var(--bs-black)`

### Gradientes

O tema oferece gradientes predefinidos no editor de blocos:

- **Gradiente Escuro Vertical** (`dark-vertical`)
- **Gradiente Escuro Horizontal** (`dark-horizontal`)
- **Gradiente Claro Vertical** (`light-vertical`)
- **Gradiente Claro Horizontal** (`light-horizontal`)
- **Gradiente para Banner Escuro Vertical** (`banner-dark-vertical`)

## Template Parts

| Template Part | Slug | Área | Descrição |
|---------------|------|------|-----------|
| Conteúdo do Cabeçalho | `header-content` | Cabeçalho | Conteúdo personalizado no cabeçalho do site |
| Lista de Notícias | `noticias` | Geral | Lista de notícias para a página inicial |
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
- `feature-image-fallback.php`: Imagem de destaque padrão em listagens
- `custom-title.php`: Títulos personalizados
- `seo.php`: Otimizações de SEO (integração com Yoast SEO)
- `breadcrumb-portal.php`: Breadcrumb nativo do tema
- `breadcrumb-integration.php`: Integração do breadcrumb do Yoast com o Portal
- `plugins-hooks.php`: Hooks para integração com plugins do ecossistema IFRS
- `heading-level-restrictions.php`: Restrição de H1 no editor de blocos
- `category-home-visibility.php`: Controle de visibilidade de categorias na página inicial
- `iframe-lazy-loading.php`: Lazy loading em iframes
- `post-pagination.php`: Paginação de posts
- `restrictions.php`: Restrições de interface para usuários não-administradores

### Limitações de Profundidade

O tema limita automaticamente:
- **Menus**: Máximo de 3 níveis de navegação (configurado em `inc/depth-limit.php`)
- **Páginas**: Aninhamento de páginas hierárquicas (máximo 5 níveis no seletor de página pai)

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
- **Resource Hints**: Preconnect e preload para recursos críticos (VLibras, logo)
- **Lazy Loading**: Carregamento sob demanda nativo para imagens e iframes
- **Minificação**: CSS e JS minificados em produção
- **Concatenação**: Redução do número de requisições HTTP

### Recursos Automáticos

- **DataTables**: Tabelas HTML transformadas automaticamente em tabelas interativas (ordenação, busca, paginação)
- **Vídeos Responsivos**: Embeds do YouTube adaptados automaticamente ao tamanho da tela

## Licença

Esse código é distribuído sob a licença [GNU GPL 3.0](https://www.gnu.org/licenses/gpl-3.0.txt).

A documentação, as imagens e demais artefatos são distribuídos sob a licença [Creative Commons Atribuição-CompartilhaIgual 4.0 Internacional](https://creativecommons.org/licenses/by-sa/4.0/deed.pt-br).
