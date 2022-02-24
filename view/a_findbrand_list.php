<div class="alert productcolor1 mymargin5" role="alert">브랜드선택</div>
	<script>
		function find_text()
		{
			if(!form1.text1.value){
				form1.action="/a_brand/noajax_lists/page";
			}
			else{
				form1.action="/a_brand/noajax_lists/text1/"+form1.text1.value+"/page";
			}
			form1.submit();
		}
		function SendBrand(no, name)
		{
			opener.form1.probrand_no.value = no;         
			opener.form1.probrand_name.value = name;                
			self.close();
		}
	</script>
	<form name="form1" method="post" action="">
		<div class="row">
			<div class="col-6" align="left">            
				<div class="input-group input-group-sm">
					<div class="input-group-prepend">
						<span class="input-group-text">이름</span>
					</div>
					<input type="text" name="text1" value="<?php echo $text1; ?>" class="form-control" onkeydown="if (event.keyCode == 13) { find_text(); }" >
					<div class="input-group-append">
						<button class="btn productcolor1" type="button" onClick="javascript:find_text();">검색</button>
					</div>
				</div>		
			</div>
			<div class="col-6" align="right"></div>
		</div>
	</form>
	<table class="table table-bordered table-sm mymargin5">
		<tr class="productcolor1">
			<td width="40%">번호</td>
			<td width="60%">브랜드명</td>
		</tr>
		<?php
			foreach ($list as $row) // 연관배열 list를 row를 통해 출력한다.
			{
				$no=$row->no25;// 사용자번호
		?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><a href="javascript:SendBrand(<?php echo $row->no25?>,'<?php echo $row->name25?>');"><?php echo $row->name25?></a></td>
				</tr>
		<?php
			}
		?>
	</table>
	<?php echo $pagination;?>
		
