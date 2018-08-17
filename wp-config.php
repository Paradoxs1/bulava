<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'bulava');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>,Sf^|*5$*TnqjFE4,j%@W+EiD<%t.~`k&(f<pXP#~X0>k-p/4Hx;s,okwRld+$A');
define('SECURE_AUTH_KEY',  '9:7VAaveO![xvt}3>oGmDDR)-Ld]<= 6VK]j1:cp+<G>v[~eCX.|))Gn{+Dh,j:g');
define('LOGGED_IN_KEY',    'UM~=Mm:U<%Fs F(?DajYQ_C2)Q=|v?V~:KCvWnYG!{S(/M|@X#>*1~h+SmCZBhPI');
define('NONCE_KEY',        'DZxjE5(X`MTOz=<~CMcS]*`!CZr8$x(ig69,|IkU#>|>9`RTCb#<*HE-$}pUoGbi');
define('AUTH_SALT',        ',){odpI#x-_1<Eo@<8yC|;TCyM$gcrO-|TcyfO>Bive@QM#6 &Gy5NN#C2-{gYc1');
define('SECURE_AUTH_SALT', '|1~g,oTIZjJPWA-NI[4Aw=G5XD{&dC;l%mj9wukY.WVfo!oyx^7L5J|!$2s;U@n&');
define('LOGGED_IN_SALT',   '/1 xV+Cx*K=#nNCNY8I8Y%+^~T5Du;_pfbkkRdN `rz*L3f;/w^HfLCvks5g5qO|');
define('NONCE_SALT',       'El>&4y@YNh}v@nY67yn$Ld*8pRO>7NXTpwmx%?/I[ZGMf!ME&~GRDTMd*S,@]/>4');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
