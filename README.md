# api
jsonp实现

通过script标签的src获取不同源服务器端上的json数据（只能使用GET请求）

前端发送请求：设置一个<label id='result'>用来接收数据,设置一个按钮<button id='btn'>给按钮绑定点击事件
var btn=document.getElementById('btn');
var result=document.getElementById('result');
btn.onclick=function(e){
  e.preventDefault();
  var OH=document.getElementsByTagName('head')[0];//获取到head标签
  var OS=document.createElement('script');//创建script标签
  var url="http://localhost:8080/jsonp.php?callback=jsonpData";//跨域请求的地址,参数值是一个解析函数（该函数用来解析json,处理返回值）
  OS.attr('src',url);
}
//定义解析函数
function jsonpData(data){
  result.innerHtml="jsonp请求成功：字段1="+data.param1+"字段2="+data.param2;
}

//后台jsonp.php的处理
<?php
	header('content-type:text/html;charset=utf8');
	$arr = array ('param1'=>'hahaha','param2'=>'jsonp so easy'); 
	$err=array('param1'=>'未校验jsonp','param2'=>'jsonp so good');
	if(!empty($_GET['id'])){
		echo $_GET['callback']."(".json_encode($arr).")";		
	}else{
		echo $_GET['callback']."(".json_encode($err).")";
	}
?>
//$_GET['id']作用是接口的校验,可以过滤一些错误或恶意请求,以上仅供参考!
