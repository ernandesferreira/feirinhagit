<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'feirinha');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'b`;hS-DPW7w>.d70-9VU^Q{5amyR+,4+G,IXr?z&MWwd5XE=ax)rRZkn$Q5=lZ`!');
define('SECURE_AUTH_KEY',  'i~42dS^n)FyNF!);i9eMCO%FzW3S!L8E,5trWXv]a$<:UP-{7Gb{)=$|ktdw77x1');
define('LOGGED_IN_KEY',    'yA:(T<M,rVn=#<~8D8~NILvUEc`6J7w;Io5s-r;N},#(yQN16K#g@=k9CTm/k-uk');
define('NONCE_KEY',        '/9BLOo2cswa%zeJ8;)sl?^[gqzd|K?%GyJg&LNisrJ+Fc7i%SmO6oWY?nTG2r#sV');
define('AUTH_SALT',        '/H%6/Mi9LPPFQGlIVqTM8Qanz^jx/iI$jJY.|_nAiq(|z4q}tNXiNecP$*`z|t[0');
define('SECURE_AUTH_SALT', 'arRbL&Q3WMYt}CR86.2/8Vk_@o<r~RrorAJC5GM{s9HGy;XizMI&suo}mM7[?o>s');
define('LOGGED_IN_SALT',   '+E3OqQDh.&vo5ZGQ~hFQ)SXxYy`uIR,tb+QWo0H7s12!vb4Ou&uWj3%oWr?a-J<m');
define('NONCE_SALT',       'jU<td1&NClHxN}GQT)9Sm_wpub(F{NIU0MH7p+;^gT3aWLnN4GmZs(MO6Ry7lj[.');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'fa_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
