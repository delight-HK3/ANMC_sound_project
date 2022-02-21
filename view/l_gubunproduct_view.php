<script>
	
</script>
<div style="background-color:#e6e6e6">
	<hr style="border:solid 10px #e6e6e6;">
		<div style="background-color:white" class="container"><br>
			<div class="row" style="margin-left:55px">	
				<div class="card" style="width: 30rem; margin:10px; "><br>
					<center>
						<div style="height:555px; width:430px;">	
							<div class="viewbox">
								<img src="/~sale25/product_img/<?=$row->changepic25?>">
								<img src="/~sale25/product_img/<?=$row->pic25?>">
							</div>
							<br>
							<div class="miniimg" style="float:left" >
								<img src="/~sale25/product_img/<?=$row->pic25?>">&nbsp&nbsp
								<img src="/~sale25/product_img/<?=$row->changepic25?>">	
							</div>
						</div>
					</center>
					<br>
				</div>
				<div class="card" style="width: 30rem; margin:10px; height:355px; border:1px; border-color: lightgray; border-style: solid; border-width: 1px; ">
					<h4 class="card-header bg-primary" ><font style="color:white"><?=$row->name25?></font></h4>
					<div class="card-body">
						<p style="text-align:left; margin-left:20px; font-size:20px;"><b>구분명 :</b> <?=$row->gubun_name25?></p>
						<p style="text-align:left; margin-left:20px; font-size:20px;"><b>브랜드명 :</b> <?=$row->brand_name25?></p>
						<p style="text-align:left; margin-left:20px; font-size:20px;"><b>가격 :</b> <?=number_format($row->price25)?></p>
					</div>
					<div class="card-footer">
						<a href="" type="button" class="btn btn-block btn-success" >제품구매</a>
						<a onclick="history.back()" type="button" class="btn btn-block btn-secondary" >
						<font style="color:white">뒤로가기</font></a>
					</div>
				</div>
			</div>
			<center>
				<br><br><br>
				<h4 style="text-align:center">상품상세정보</h4><hr><br>
				<img src="/~sale25/product_img/<?=$row->detailpic25?>">
				<br><br><br><br><br>
			</center>
		</div>
		
	<hr style="border:solid 10px #e6e6e6;">
</div>