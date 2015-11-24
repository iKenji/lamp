<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'mydatabase');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'vagrant');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'vagrant');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8mb4');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'GiD$fFD?!pj.iT4?ec]N!i2om+)_^!iJIVPwfMd|tm)f~J4 6W2(i%-e@F]+,c3F');
define('SECURE_AUTH_KEY',  'G}g,LK(p.BSl<<y&3+-vC$#{/+OcWuD^Q+jjGIUu_N&-vn8I+3ns+6<LZ- ^j9Be');
define('LOGGED_IN_KEY',    '1[mq5RFs0&UaQway,&c).3~4+1JGhsNHE#D?mY+DXq|Bv}br|a]n`TX%}|b]z!q[');
define('NONCE_KEY',        '~vvg$Z:E;et2/S-L+ZO&qwpqh9#+ShWG+(b)3x1vwdjRLaNzI0fYYZ^/,I$Fw(_D');
define('AUTH_SALT',        'pcc=2z5Ph,9z~c::NoSsX^yY5^e5Qj>V-ujz:nfRp,_XcIA]F_`v6Q<r+h*oI&i+');
define('SECURE_AUTH_SALT', 'xqg3<|$G8|Z9eLwrdOp~uEIFJ c#v{mp@k;6;uxoxN-Ap9bsL*dq|o>79,uA4sob');
define('LOGGED_IN_SALT',   's$@Qu>aKM$0/[CPUL~=IBL}UZ/W|+3/VVRn>y7#[F8kpM_<^|RQN2I$ajGvNL:3p');
define('NONCE_SALT',       '7K5`Sb+.Q}Za(,den&5~J+-[o0X:K,~7xwe=_aU`=1`1F,<mG<fVI&?)mJpOfoq2');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
