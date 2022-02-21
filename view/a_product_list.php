 	<div class="alert productcolor1 mymargin5" role="alert">제품목록</div>
		<script>
			function find_text()
			{
				if(!form1.text1.value){
					form1.action="/~sale25/a_product/lists/page";
				}
				else{
					form1.action="/~sale25/a_product/lists/text1/"+form1.text1.value+"/page";
				}
				form1.submit();
			}
		</script>
		<form name="form1" method="post" action="">
			<div class="row">
				<div class="col-3" align="left">            
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">이름</span>
						</div>
						<input type="text" name="text1" value="<?=$text1; ?>" class="form-control" onkeydown="if (event.keyCode == 13) { find_text(); }" >
						<div class="input-group-append">
							<button class="btn productcolor1" type="button" onClick="javascript:find_text();">검색</button>
						</div>
					</div>		
				</div>
				<?
					$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   
				?>
				<div class="col-9" align="right">      
					 <a href="/~sale25/a_product/add<?=$tmp?>" class="btn productcolor1">추가</a>
				</div>
			</div>
		</form>
		<table class="table table-bordered table-sm mymargin5">
			<tr class="productcolor1">
				<td width="10%">번호</td>
				<td width="30%">제품명</td>
				<td width="20">가격</td>
				<td width="20%">브랜드명</td>
				<td width="20%">구분명</td>	
			</tr>
			<?
				foreach ($list as $row)                             // 연관배열 list를 row를 통해 출력한다.
				{
					$no=$row->no25;// 사용자번호
			?>
			<tr>
				<td><?=$no; ?></td>		
				<td><a href="/~sale25/a_product/view/no/<?=$no?><?=$tmp?>"><?=$row->name25?></a></td>
				<td align="right"><?=number_format($row->price25) ?></td>
				<td><?=$row->brand_name25; ?></td>
				<td><?=$row->gubun_name25; ?></td>
			</tr>
			<?
				}
			?>
		</table>
		<?=$pagination;?>
		