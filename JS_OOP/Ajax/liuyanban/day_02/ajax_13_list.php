<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			body,html{
				margin: 0;
				padding: 0;
				background: #eee;
				text-align: center;
			}
			#bodys{
				margin: auto;
				text-align: left;
				padding: 20px 10px;
				width: 355px;
				/*height: 600px;*/
				border: 1px solid #aaa;
			}
			#content{
				width: 300px;
				height: 150px;
			}
			button{
				display: block;
				width: 90px;
				height: 30px;
				background: white;
			}
			#center{
				display: table;
			}
			#ccc{
				display: table-cell;
				vertical-align: middle;
			}
			ul{
				list-style-type: none;
				padding: 0;
				margin: 10px 0 0px;
				
			}
			li{
				text-indent: 30px;
				background: white;
				list-style: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				padding-right: 10px;
				border-bottom: 1px solid #ccc;
			}
			.right{
				text-align: right;
			}
		</style>
	</head> 
	<body>
		<input type="hidden" name="ids" id="ids" value="" />
		<div id="bodys">
			<div id="center">
				<span id="ccc">内容：</span>
				<textarea id="content" name="" rows="" cols=""></textarea>
				<button id="sub" onclick="sub()">提交</button>
			</div>
			<div>
				<input type="hidden" name="page" id="page" value="<?php echo $pages; ?>" />
			</div>
			<ul id="uls" data_id="ccc">	
				<li class="parents">
					<p>sdajkdaha</p>
					<p class="right">
						<span>2016-3-10</span>
						顶：<a href="#" data_id="" onclick="" status="">12</a>
						踩：<a href="#" data_id="" onclick="">0</a>
						<a href="#" data_id="" onclick="" >删除</a>
					</p>
				</li>
			</ul>
			
		</div>
	</body>
	<script src="../../day_01/JQuery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		function addZero(s){
			if (s<10){
				return "0"+s;
			}else{
				return s;
			}
		}
		function sub(){
			var content = $("#content").val(); 
			$.ajax({
				type:"get",
				url:"ajax_14_add.php",
				data:{
					content:content
				},
				dataType:"json",
				success:function(data){
					console.log("成功");
					console.log(data);
					var times = data.times*1000; 
					var newDate = new Date();
					newDate.setTime(times);
					var dates = newDate.getFullYear()+"年"+addZero((newDate.getMonth()+1))+"月"+addZero(newDate.getDate())+"日"+" "+addZero(newDate.getHours())+":"+addZero(newDate.getMinutes())+":"+addZero(newDate.getSeconds());
					console.log("我的时间是"+dates);
					var liObj = $('<li class="parents"><p>'
					+data.content+
					'</p><p class="right"><span>'
					+dates+
					'</span>顶：<a href="#" data_id="" onclick="" status="">'
					+data.ding+
					'</a>踩：<a href="#" data_id="" onclick="">'
					+data.cai+
					'</a><a href="#" data_id="" onclick="" >删除</a></p></li>');	
					$("#uls").prepend(liObj);
					var h = liObj.height();	
					liObj.height(0);	
					liObj.animate({
						height:h
					})	
					if($("#uls li").length == 6){
						$("#uls li:last-child").animate({
							height:0
						},function(){
							$("#uls li:last-child").remove();
						})
					}	
					
				},
				error:function(errors){
					console.log("失败");
					console.log(errors);
				}
			});
		}
	</script>
</html>
