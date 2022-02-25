<div style="background-color:#e6e6e6">
	<hr style="border:solid 10px #e6e6e6;">
	<?php
		if(!$list)
		{
	?>	
			<div style="background-color:white;" class="container">
				<center>
					<br><br><br><img src='/my/img/noproduct.png'>
				</center>
				<center>
					<br><h3>해당 구분에 등록된 상품이 없습니다.</h3><br>
				</center>
			</div>
	<?php
		}
		else
		{
	?>		
			<div style="background-color:white" class="container" ><br>
				<center>
					<h4><b>"<?php echo $gubunname->gubun_name25;?>"</b> 항목은 <b><?php echo $total?></b> 개 제품이 존재합니다.</h4>
				</center>
				<div class="row" style="margin-left:1px">
			<?php
				foreach($list as $row)
				{
					$iname1=$row->pic25 ? $row->pic25 : "";
					$iname2=$row->changepic25 ? $row->changepic25 : "";
			?>			
					<div class="card text-center shadow bg-body rounded" style="width: 16rem; margin:10px;">
						<center>
							<div class="box">
								<img src="/product_img/<?php echo $iname2 ?>">
								<img src="/product_img/<?php echo $iname1 ?>">
							</div>
						</center>
						<h5 class="text-center">
							<a href="/l_gubunproduct/view/no/<?php echo $row->no25?>/page/<?php echo $page?>"><?php echo $row->name25 ?></a>
						</h5>
						<div class="card-footer text-left" style="background-color: white">
							<font style="font-size:15px">분류 : <b><?php echo $row->gubun_name25; ?></b></font><br>
							<font style="font-size:15px">제조사 : <b><?php echo $row->brand_name25; ?></b></font><br>
							<td align='right'>￦<?php echo number_format($row->price25) ?></td><br>
						</div>
					</div>
			<?php
				}
			?>
				</div>
				<br><?php echo $pagination;?><br>
			</div>
	<?php
		}
	?>
	<hr style="border:solid 10px #e6e6e6;">
</div>
