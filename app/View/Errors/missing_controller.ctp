<?php 
$uri = trim($_SERVER['REQUEST_URI'], '/');
$link = '/';

            // header('HTTP/1.1 404 Not Found');
            header('HTTP/1.0 404 Not Found', true, 404);
            header('Status: 404 Not Found');
if(!preg_match('/\.html/', $uri))
{
	$uri = explode('/', $uri);
	$str_url = end($uri);

	if(preg_match('/\?/', $str_url))
	{
		$str_url_arr =explode('?', $str_url);
		$str_url = $str_url_arr[0];
	}

	$link = DOMAIN  . $str_url . '.html';
}

if (Configure::read('debug') < 2)
{
	// header("Location: " . $link, TRUE, 301); 
	die; 
}
?>

<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<h2><?php echo $name; ?></h2>
<p class="error">
	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php echo __d('cake', 'An Internal Error Has Occurred.'); ?>
</p>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
