<?php
	include_once "day_02/wechatcommon.php";
	$code = $_GET["code"];
	//var_dump($_GET);
	$api = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";
	$result = httpGet($api);
	$arr = json_decode($result,TRUE);
	$access_token = $arr["access_token"];
	$openid = $arr["openid"];
	$userUrl = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
	$json = httpGet($userUrl);
	//var_dump($json);
	$infoArr = json_decode($json,true);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<div class="scoreDiv">
			分数：<span class="score">0</span>
		</div>
		<button class="start">开始</button>
		<button class="end">结束</button>
		<input id="inp" type="text" value="<?php echo $code ?>"/>
		
		<a href="rank.html">排名榜</a>
	</body>
	<script src="JQuery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var start = document.getElementsByClassName("start")[0];
		var end = document.getElementsByClassName("end")[0];
		var score = document.getElementsByClassName("score")[0];
		var inp = document.getElementById("inp");
		function randomNum(max,min){
			return parseInt(Math.random()*(max-min)+min);
		}
		//console.log(randomNum(5,1));
		var timer = null;
		start.onclick = function(){
			timer = setInterval(function(){
				score.innerHTML = randomNum(5,1);
			},1000);
		};
		end.onclick = function(){
			//console.log(111);
			clearInterval(timer);
			//console.log(score.innerHTML);
			
			$.ajax({
				type:"post",
				url:"score.php",
				data:{
					score:score.innerHTML,
					code:inp.val();
				},
				//dataType:"json",
				success:function(data){
					console.log("成功");
					console.log(data);
				},
				error:function(errors){
					console.log("失败");
					console.log(errors);
				}
			});
		}
		
	</script>
</html>
