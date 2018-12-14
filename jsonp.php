<?php
	header('content-type:text/html;charset=utf8');
	if(!empty($_GET['name'])&&!empty($_GET['psd']))
	{
		echo 'jsonp请求成功，你真厉害'.$_GET['name'];
	}else{
		echo '什么也没发生?你是不是搞错了';
	}
?>