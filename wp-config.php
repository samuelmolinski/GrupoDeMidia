<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'midiarj_blog2013');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'midiarj');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '44398@branco');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'UxcH[h1p2KszSuukLoN|s=Jk(+3c)X>>M%6cA,B;F9Cf)2>W$(K%`mAunH|22*;w');
define('SECURE_AUTH_KEY',  'b9iS[+]qcM+kj7oQWaH=%5a(qn.[9BBe0x`FKyB;a]$h.R,6j.XOYIoKdF:p ]/+');
define('LOGGED_IN_KEY',    '0Nh /#CSx{i@|i@RvMzAX:nB5bLZhbOA;ZPROs|}6y()o2,]P--6S+2g073}s5-2');
define('NONCE_KEY',        'Ry8nF2+!%k;;%/41dLM|2[;Sdxaul^-z9_rQCibkk+;=V-jJ.KaMx+s$_g_f}J+N');
define('AUTH_SALT',        '!e%(%L~`+}N$=?.QhCBvR1q}iKJ$lfiS^i(>jp-hUL z+%dlGgH-*=h;Hd]A2WH:');
define('SECURE_AUTH_SALT', '9oC:)-{?vonQVw.yTh-O 0h+8qU(*f9&k]9Id9Gd,4#*]/~<i/ Bl,79sO|}3N[U');
define('LOGGED_IN_SALT',   '[8@f{PFb)1xi.2VS,S[X-8nuqa!@nFi(}]`f&o<v1z-Ml|A(HK/!n9Zfd.s-(b8D');
define('NONCE_SALT',       'dINXW9|W?zY]dd[*yTqrHT1H12g0QI=.j*?-`_&Y?XJ@sih+T6;_dB5+Jtcb8:c4');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
