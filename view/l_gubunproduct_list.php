<div style="background-color:#e6e6e6">
	<hr style="border:solid 10px #e6e6e6;">
<?
	if(!$list)
	{
?>	
		<div style="background-color:white;" class="container">
			<center>
				<br><br><br><img src='/~sale25/my/img/noproduct.png'>
			</center>
			<center>
			<br><h3>해당 구분에 등록된 상품이 없습니다.</h3><br>
			</center>
		</div>
<?
	}
	else
	{
?>		
		<div style="background-color:white" class="container" ><br>
		<center><h4><b>"<?=$gubunname->gubun_name25;?>"</b> 항목은 <b><?=$total?></b> 개 제품이 존재합니다.</h4></center>
		<div class="row" style="margin-left:1px">
<?
		foreach($list as $row)
		{
			$iname1=$row->pic25 ? $row->pic25 : "";
			$iname2=$row->changepic25 ? $row->changepic25 : "";
?>			
				<div class="card text-center shadow bg-body rounded" style="width: 16rem; margin:10px;">
					<center><div class="box">
						<img src="/~sale25/product_img/<?=$iname2 ?>">
						<img src="/~sale25/product_img/<?=$iname1 ?>">
					</div></center>
					<h5 class="text-center"><a href="/~sale25/l_gubunproduct/view/no/<?=$row->no25?>/page/<?=$page?>"><?=$row->name25 ?></a></h5>
				  <div class="card-footer text-left" style="background-color: white">
					<font style="font-size:15px">분류 : <b><?=$row->gubun_name25; ?></b></font><br>
					<font style="font-size:15px">제조사 : <b><?=$row->brand_name25; ?></b></font><br>
					<td align='right'>￦<?=number_format($row->price25) ?></td><br>
				  </div>
				</div>
<?
		}
?>
			</div>
			<br><?=$pagination;?><br>
		</div>
		
<?
	}
?>
	<hr style="border:solid 10px #e6e6e6;">
</div>