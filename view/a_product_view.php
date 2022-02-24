	<?php
		$no=$row->no25;
		$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";   
	?>
	<div class="alert productcolor1 mymargin5" role="alert">제품</div>
		<form name="form1" method="post" action="">
			<table class="table table-bordered table-sm mymargin5">
				<tr>
					<td width="20%" class="productcolor1" style="vertical-align:middle">번호</td>
					<td width="80%" align="left"><?php echo $row->no25?></td>
				</tr>
				<tr>
					<td width="20%" class="productcolor1" style="vertical-align:middle"><font color="red">*</font> 구분명</td>
					<td width="80%" align="left">
						<div class="form-inline"><?php echo $row->progubun_name25 ?></div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="productcolor1" style="vertical-align:middle"><font color="red">*</font> 브랜드명</td>
					<td width="80%" align="left">
						<div class="form-inline"><?php echo $row->probrand_name25 ?></div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="productcolor1" style="vertical-align:middle"><font color="red">*</font> 제품명</td>
					<td width="80%" align="left">
						<div class="form-inline"><?php echo $row->name25 ?></div>	
					</td>
				</tr>
				<tr>
					<td width="20%" class="productcolor1" style="vertical-align:middle"><font color="red">*</font> 단가</td>
					<td width="80%" align="left">
						<div class="form-inline"><?php echo number_format($row->price25) ?></div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="productcolor1" style="vertical-align:middle">사진</td>
					<td width="80%" align="left">
						<b>파일이름</b> : <?php echo $row->pic25; ?> <br>
						<b>파일이름</b> : <?php echo $row->changepic25; ?> <br>
						<b>파일이름</b> : <?php echo $row->detailpic25; ?> <br>
						<br>
						<?php
							if ($row->pic25){     // 이미지가 있는 경우
								echo("<img src='/product_img/$row->pic25' class='img-view' >&nbsp&nbsp");
							}
							else{                   // 이미지가 없는 경우
								echo("<img src='' width='200' height='200' >&nbsp&nbsp");
							}
							if ($row->changepic25){     // 이미지가 있는 경우
								echo("<img src='/product_img/$row->changepic25' class='img-view' >&nbsp&nbsp ");
							}
							else{                   // 이미지가 없는 경우
								echo("<img src='' width='200' height='200' border:1px>&nbsp&nbsp");
							}
							if ($row->detailpic25){     // 이미지가 있는 경우
								echo("<img src='/product_img/$row->detailpic25' class='img-view' >&nbsp&nbsp ");
							}
							else{                   // 이미지가 없는 경우
								echo("<img src='' width='200' height='200' >&nbsp&nbsp");
							}
						?>
					</td>
				</tr>
			</table>
			<div align="center">
				<a href="/a_product/edit<?php echo $tmp?>" class="btn btn-sm productcolor1">수정</a>
				<a href="/a_product/del<?php echo $tmp?>" class="btn btn-sm productcolor1" onClick="return confirm('삭제할까요 ?')">삭제</a>
				<input type="button" value="이전버튼" class="btn btn-sm productcolor1" onclick="history.back()">
			</div>
		</form>
  
