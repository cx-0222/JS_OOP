
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
				<!--分页-->
				<input type="hidden" name="page" id="page" value="" />
			</div>
			<ul id="uls" data_id="ccc">	
				<?php 
					//防止中文乱码
				    header("Content-type:text/html;charset=utf-8");
				    //设置使用东八区时间格式
					date_default_timezone_set('PRC');
					
					mysql_connect("localhost","root","");
					mysql_select_db("MessageBoard");
					//防止插入中的中文出现乱码
					mysql_query("set names utf8");  
					//echo date("Y年m月j日 H:i:s",time());
					//echo $row["times"];
				     $query = "select * from message";
					 $result = mysql_query($query);
					 
					 while ($row = mysql_fetch_assoc($result)) {
					 	//var_dump($row);
						?>
						 <li class="parents">
							<p><?php echo $row["content"];?></p>
							<p>
							<p class='right'>
								<span><?php echo $row["time"];?></span>
								顶：<a href='#' data_id="" onclick="" status=""><?php echo $row["like"]; ?></a>
								踩：<a href='#' data_id="" onclick=""><?php echo $row["dislike"]; ?></a>
								<a href="#" data_id="" onclick="" >删除</a>
							</p>
							</p>
						</li>
						<?php
					 }
				?>
			</ul>
		</div>
	</body>
	<script src="../day_01/JQuery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var content = document.getElementById("content");
		var subbtn = document.getElementById("sub");
		var uls = document.getElementById("uls");
		function sub(){
			if(content.value != ""){
				//console.log(typeof content.value);
				var str = content.value;
				var newDate = new Date();
				var year = newDate.getFullYear();//number 2016
				var month = newDate.getMonth()+1;//12
				var day = newDate.getDate();//22
				var jsons = '{"content":"'+str+'","time":"'+year+'-'+month+'-'+day+'"}';
				var obj = JSON.parse(jsons);
				//console.log(obj);//Object {content: "egadgdf"}
				//console.log(obj.content);
				$.ajax({
					type:"get",
					url:"insert.php",
					data:{
						content:obj.content,
						time:obj.time
					},
					success:function(data){
						console.log(data);
					},
					error:function(errors){
						console.log(errors);
					}
				});
			}else{
				alert("留言内容不能为空");
			}
			
			//创建li
			var li = document.createElement("li");
			li.className = "parents";
			var p_content = document.createElement("p");
			p_content.innerHTML = obj.content;
			var p2 = document.createElement("p");
			var p3 = document.createElement("p");
			p3.className = "right";
			var span_time = document.createElement("span");
			span_time.innerHTML = obj.time;
			var a_like = document.createElement("a");
			a_like.innerHTML = "顶："+0;
			var a_dislike = document.createElement("a");
			a_dislike.innerHTML = "踩："+0;
			var a_del = document.createElement("a");
			a_del.innerHTML = "删除";
			
			p3.appendChild(span_time);
			p3.appendChild(a_like);
			p3.appendChild(a_dislike);
			p3.appendChild(a_del);
			
			p2.appendChild(p3);
			
			li.appendChild(p_content);
			li.appendChild(p2);
			
			if ($(uls).children().length>0) {
				console.log(111);
				uls.insertBefore(li,uls.childNodes[0]);
			} else{
				uls.appendChild(li);
			}
			
		}

//php 以秒为单位
//js 以毫秒为单位		
//		function aaa(){
//			var newDate = new Date();
//			console.log(newDate.getHours());
//			newDate.setHours(9);
//			console.log(newDate.getHours());
//		}
//		aaa();
	</script>
	
</html>
