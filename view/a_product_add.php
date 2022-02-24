<div class="alert productcolor1 mymargin5" role="alert">제품추가</div>
	<script>
		function find_gubun()
		{
			window.open("/a_gubun/noajax_lists","","resizable=yes,scrollbars=yes,width=600,height=400");
		}
		function find_brand()
		{
			window.open("/a_brand/noajax_lists","","resizable=yes,scrollbars=yes,width=600,height=400");
		}
	</script>
	<form name="form1" method="post" action="" enctype="multipart/form-data">
		<table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">
					<font color="red">*</font> 제품명
				</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<input  type="text" name="name" size="20" value="<?php echo set_value("name") ?>"  class="form-control form-control-sm">
					</div>
					<?php
						If (form_error("name")==true){ 
							echo form_error("name"); 
						}
					?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">
					<font color="red">*</font> 구분명
				</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<input type="hidden" name="progubun_no" value="<?php echo set_value("gubun_no"); ?>">
						<input type="text" name="progubun_name" value="" class="form-control form-control-sm" disabled>&nbsp&nbsp
						<input type="button" value="구분찾기" onClick="find_gubun();" class="form-control btn btn-sm productcolor1">
					</div>
					<?php
						If(form_error("progubun_no")==true){ 
							echo form_error("progubun_no"); 
						}
					?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">
					<font color="red">*</font> 브랜드명
				</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<input type="hidden" name="probrand_no" value="<?php echo set_value("brand_no"); ?>">
						<input type="text" name="probrand_name" value="" class="form-control form-control-sm" disabled>&nbsp&nbsp
						<input type="button" value="브랜드찾기" onClick="find_brand();" class="form-control btn btn-sm productcolor1">
					</div>
					<?php 
						If(form_error("probrand_no")==true){ 
							echo form_error("probrand_no"); 
						}
					?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">
					<font color="red">*</font> 단가
				</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<input  type="text" name="price" size="20" maxlength="20" value="<?php echo set_value("price") ?>"  class="form-control form-control-sm">
					</div>
					<?php 
						If (form_error("price")==true){ 
							echo form_error("price"); 
						}
					?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">사진</td>
				<td width="80%" align="left">
					<br>
					<input type="file" name="pic" value="" class="form-control-sm" ><br><hr>
					<input type="file" name="changepic" value="" class="form-control-sm" ><br><hr>
					<input type="file" name="detailpic" value="" class="form-control-sm" ><br><br>
				</td>
			</tr>
		</table>
		<div align="center">
			<input type="submit" value="저장" class="btn btn-sm productcolor1">&nbsp
			<input type="button" value="이전버튼" class="btn btn-sm productcolor1" onclick="history.back()">
		</div>
	</form>
