<div class="alert productcolor1 mymargin5" role="alert">사용자</div>
	<form name="form1" method="post" action="">
		<table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">번호</td>
				<td width="80%" align="left"><?php echo $row->no25 ?></td>
			</tr>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">
					<font color="red">*</font> 이름
				</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<input  type="text" name="name" size="20" maxlength="20" value="<?php echo $row->name25 ?>"  class="form-control form-control-sm">
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
					<font color="red">*</font> 아이디
				</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<input  type="text" name="uid" size="20" maxlength="20" value="<?php echo $row->uid25 ?>" class="form-control form-control-sm">
					</div>
					<?php 
						If (form_error("uid")==true){ 
							echo form_error("uid"); 
						}
					?>
				</td>
			</tr>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">
					<font color="red">*</font> 암호
				</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<input  type="password" name="pwd" size="20" maxlength="20" value="<?php echo $row->pwd25 ?>" class="form-control form-control-sm">
					</div>
					<?php 
						If (form_error("pwd")==true){ 
							echo form_error("pwd"); 
						}
					?>
				</td>
			</tr>
			<?php
				$phone1 = trim(substr($row->phone25,0,3));      // 전화 : 지역번호 추출
				$phone2 = trim(substr($row->phone25,3,4));      // 전화 : 국번호 추출
				$phone3 = trim(substr($row->phone25,7,4));      // 전화 : 번호 추출
			?>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">
					<font color="red">*</font> 전화
				</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<input  type="text" name="phone1" size="3" maxlength="3" value="<?php echo $phone1?>" class="form-control form-control-sm">-
						<input  type="text" name="phone2" size="4" maxlength="4" value="<?php echo $phone2?>" class="form-control form-control-sm">-
						<input  type="text" name="phone3" size="4" maxlength="4" value="<?php echo $phone3?>" class="form-control form-control-sm">
					</div>
				</td>
			</tr>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">등급</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<?php
							if ($row->rank25==1){
								echo("<input type='radio' name='rank' value='1' checked>&nbsp관리자&nbsp&nbsp");
								echo("<input type='radio' name='rank' value='2' >&nbsp직원&nbsp&nbsp");
								echo("<input type='radio' name='rank' value='3' >&nbsp고객");
							}
							elseif ($row->rank25==2){
								echo("<input type='radio' name='rank' value='1' >&nbsp관리자&nbsp&nbsp");
								echo("<input type='radio' name='rank' value='2' checked>&nbsp직원&nbsp&nbsp");
								echo("<input type='radio' name='rank' value='3' >&nbsp고객");
							}
							else{
								echo("<input type='radio' name='rank' value='1' >&nbsp관리자&nbsp&nbsp");
								echo("<input type='radio' name='rank' value='2' >&nbsp직원&nbsp&nbsp");
								echo("<input type='radio' name='rank' value='3' checked>&nbsp고객");
							}
						?>
					</div>
				</td>
			</tr>
		</table>
		<div align="center">
			<input type="submit" value="저장" class="btn btn-sm productcolor1">&nbsp
			<input type="button" value="이전버튼" class="btn btn-sm productcolor1" onclick="history.back()">
		</div>
	</form>
   
