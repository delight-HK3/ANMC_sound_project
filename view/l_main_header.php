<!DOCTYPE html>
<html lang="kr">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>개별프로젝트 사용자 페이지</title>
		<link href="/~sale25/my/css/bootstrap.css" rel="stylesheet">
		<link href="/~sale25/my/css/my.css" rel="stylesheet">
		<link href="/~sale25/my/css/bootstrap-datetimepicker.css" rel="stylesheet">
		<link href="/~sale25/my/css/fontawesome-all.css" rel="stylesheet">
		<link href="/~sale25/my/css/ihover.css" rel="stylesheet">
		<link href="/~sale25/my/css/ihover.min.css" rel="stylesheet">

		<script src="/~sale25/my/js/jquery-3.5.1.min.js"></script>
		<script src="/~sale25/my/js/popper.min.js"></script>
		<script src="/~sale25/my/js/bootstrap.min.js"></script>
		<script src="/~sale25/my/js/moment-with-locales.min.js"></script>
		<script src="/~sale25/my/js/bootstrap-datetimepicker.js"></script>
	</head>
	<script>
		function find_text()
		{
			if(!form1.text1.value){
				alert("검색할 제품명을 입력해 주시기 바랍니다.");	
				form1.text1.focus();	
				return;
			}
			else{
				form1.action="/~sale25/l_main/find/text1/"+form1.text1.value+"/page";
			}
			form1.submit();
		}
		</script>
	<body>
		<div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			  <a class="navbar-brand" href="/~sale25/l_main">HOME</a>

			 <form name="form1" method="post" action="">
				<div class="input-group input-group-sm">
					<div class="input-group-append">
						&nbsp&nbsp<input type="search" name="text1" value="<?=$text1?>" class="form-control" placeholder="검색" onkeydown="if (event.keyCode == 13) { find_text(); }" >
							
						<button type="submit" onclick="javascript:find_text();" class="btn btn-primary btn-default" ><i class="fa fa-search" aria-hidden="true"></i></button>&nbsp&nbsp&nbsp
					</div>
				</div>
			 </form>

			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  		
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">제품구분</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?
                                foreach($list1 as $row)
                                {	
									$no=$row->no25;// 구분번호
							?>
									<a class='dropdown-item' href="/~sale25/l_gubunproduct/lists/no/<?=$no?>"><?=$row->name25?></a>
							<?
                                }
                            ?>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">브랜드</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?
                                foreach($list2 as $row)
                                {
									$no=$row->no25;// 구분번호
							?>
                                    <a class='dropdown-item' href="/~sale25/l_brandproduct/lists/no/<?=$no?>"><?=$row->name25?></a>
							<?
                                }
                            ?>
						</div>
					</li>
                    <li class="nav-item"><a class="nav-link" href="#">제휴브랜드</a></li>
                    <li class="nav-item"><a class="nav-link" href="/~sale25/main">판매관리</a></li>
					<?	
						if($this->session->userdata("rank")==2){
							echo("<li class='nav-item'><a class='nav-link' href='#'>환영합니다");
					?>
								<?=$this->session->userdata("name");?>
					<?
							echo("사원님</a></li>");
						}
					?>
					<?
						if($this->session->userdata("rank")==3){
							echo("<li class='nav-item'><a class='nav-link' href='#'>환영합니다");
					?>
								<?=$this->session->userdata("name");?>
					<?
							echo("고객님</a></li>");
						}
						
					?>
					<!--고객인지 직원인지 알려주는 부분-->
				</ul>
				<?		
					if(!$this->session->userdata("uid")){
						echo("<a href='#exampleModal' data-toggle='modal' class='btn btn-sm btn-outline-primary'>로그인</a>");
					}
					else{
						echo("<a href='/~sale25/l_login/logout' class='btn btn-sm btn-outline-success'>로그아웃</a>");
					}
				?>
			  </div>
			</nav>	
			<!--로그인 부분-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="width:400px;">
						<div class="modal-header mycolor1" style="width:400px">							
							<h4>로그인</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
						</div>
						
							<div style="width: 400px;" class="modal-body bg-light" style="text-align:Center">
								<center><br><br>
									<img style="width: 250px; height: 250px; border-radius: 70%;" src="/~sale25/my/img/ANMC_logo.png">
								</center><br><br>
								<form name="form_login" method="post" action="/~sale25/l_login/check">
									<div class="form-inline">
										아이디 : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
										<input type="text" name="uid" size="30" value="" class="form-control form-control-sm">
									</div>
									<div style="height:10px; width: 400px;"></div>
									<div class="form-inline">
										비밀번호 : &nbsp&nbsp 
										<input type="password" name="pwd" size="30" value="" class="form-control form-control-sm">
									</div>
								</form>
							</div>
						<center>
							<div class="modal-footer alert-secondary" style="width: 400px">
								<button type="button" class="btn btn-sm btn-block btn-success" onClick="javascript:form_login.submit();">확인</button>
								<button type="button" class="btn btn-sm btn-block btn-secondary" data-dismiss="modal">닫기</button>
							</div>
						</center>
					</div>
				</div>
			</div>

			<!--슬라이드 이미지-->
			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel" data-interval="7000">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleFade" data-slide-to="1"></li>
					<li data-target="#carouselExampleFade" data-slide-to="2"></li>
                    <li data-target="#carouselExampleFade" data-slide-to="3"></li>
				</ol>
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="/~sale25/my/img/main_1.PNG" class="d-block w-100" height="550" alt="First slide">
				</div>
				<div class="carousel-item">
				  <img src="/~sale25/my/img/main_2.PNG" class="d-block w-100" height="550" alt="Second slide">
				</div>
				<div class="carousel-item">
				  <img src="/~sale25/my/img/main_3.PNG" class="d-block w-100" height="550" alt="Third slide">
				</div>
                <div class="carousel-item">
				  <img src="/~sale25/my/img/main_4.PNG" class="d-block w-100" height="550" alt="Third slide">
				</div>
			  </div><hr>
			  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
	