<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'widget_trenta' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7ink2yE7hr^J,PJlSW/KE.h(GaVWDC(y<`Vg/RDr_N}PN()xNL*ywM&ulBYFtlgz' );
define( 'SECURE_AUTH_KEY',  'iOedW%p$NAQ#ELm@=D]e?7~@4*`y++;>oRSO!AT30>Zx5.}dT%@C`|tiNfLY0Bgc' );
define( 'LOGGED_IN_KEY',    'rP^^9*mJ7?cm#0:0,C2TGf=OcRxp*@{FtRs Z6)Mo@e?37mR,Plk:]w0GQnrhc4q' );
define( 'NONCE_KEY',        '~X:b#R5GKtLdLZkuct@Zr5.D[{x5r>S^c7|]2oI/Q)Sad @fsyVL1%DntIq{ep8H' );
define( 'AUTH_SALT',        'y}Ouv~p}s4iG#ILv*r,dT%p#`P+eC]BH*|;c`W(fbmqjnCb(FQ;1f>g$oIHddbx1' );
define( 'SECURE_AUTH_SALT', 'rpF57iS%g=fvLau}$u#k6.>kSJ{U5SJQu/a|bm,D-^C9O|dU<=%&|2J3jQ~3{T/2' );
define( 'LOGGED_IN_SALT',   'qFe_eCg1`d+z4zfk+WE;fu JV[9}Lm~hnLS$Y08Z}.sr@/%1ZHR(qX]}`Y3T$qY}' );
define( 'NONCE_SALT',       'VjF5=NZ$7x?KJ~oO=v[eh48|~K0ns Il;)bso^#0f%@`]Kuv@n`58-pG@M9Q ,$l' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

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
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
