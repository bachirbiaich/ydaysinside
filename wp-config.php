<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'yinside');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8#7Wf=t;(~#+e+I@(u.1[QhfWU!UXfmBor#:1>mY(CXpQS7o3qBU>c]|#/4&=G><');
define('SECURE_AUTH_KEY',  '@:4vzs,4|fdv|dhEppyUTrbx )+PZjILrWW[K53;^o4w/3R^&6CrfNAhZLYiEPC8');
define('LOGGED_IN_KEY',    '^6PX]U.b*|ssNSmZ4>)TQ u0^cM`8d@BjUb[CmkI9sUd&n%=N{d5=3,|:O.b Tu?');
define('NONCE_KEY',        'Hh0SmEg1wl[fUziY]<@;<}ABR;t;_`q0tw&t:6c:E@5b?t./Ad2b1f#,[)%~^.Qg');
define('AUTH_SALT',        '6Pm!.![1S)ZnVArhoUFNim)Rc]{;UO{G,B~SONGE{v^{S1;o!jxjqk$=4 JEZETV');
define('SECURE_AUTH_SALT', 'Mn&GCFAD[k 3m&cY/1WN:<r}Gb7B)38z8N3yK(,)l|k y,[k(=</Mn;A9k?6q[Lh');
define('LOGGED_IN_SALT',   'jJL#a2nkDD &8@W)R(ZUoM&<EOSm)E=A0iU~VRiQu8sR|9mXJcn{HK`q4Z<,ckM_');
define('NONCE_SALT',       '=p-?60;x4}& 2/TiTa,h* r6G_(9bLl3w*Hfb}h+zaqFk~BkGp<k0+!#KU*B3Kyn');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');