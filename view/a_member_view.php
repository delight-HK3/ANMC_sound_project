<?
    $no=$row->no25;
    $phone1 = trim(substr($row->phone25,0,3));
    $phone2 = trim(substr($row->phone25,3,4));
    $phone3 = trim(substr($row->phone25,7,4));
    $phone = $phone1 . "-" . $phone2 . "-" . $phone3;
    if($row->rank25==1){
		$rank = "관리자";
	}
	elseif($row->rank25==2){
		$rank = "직원";
	}
	elseif($row->rank25==3){
		$rank = "고객";
	}
	$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";   
?>

		<div class="alert productcolor1 mymargin5" role="alert">사용자</div>
		<form name="form1" method="post" action="">
			<table class="table table-bordered table-sm mymargin5">
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">번호</td>
				<td width="80%" align="left"><?=$row->no25?></td>
			</tr>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">이름</td>
				<td width="80%" align="left"><?=$row->name25?></td>
			</tr>
			 <tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">아이디</td>
				<td width="80%" align="left"><?=$row->uid25?></td>
			</tr>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">암호</td>
				<td width="80%" align="left"><?=$row->pwd25?></td>
			</tr>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">전화</td>
				<td width="80%" align="left">
					<div class="form-inline">
						<?=$phone?>
					</div>
				</td>
			</tr>
			<tr>
				<td width="20%" class="productcolor1" style="vertical-align:middle">등급</td>
				<td width="80%" align="left"><?=$rank?></td>
			</tr>
			</table>
			<div align="center">
				<a href="/~sale25/a_member/edit<?=$tmp?>" class="btn btn-sm productcolor1">수정</a>
				<a href="/~sale25/a_member/del<?=$tmp?>" class="btn btn-sm productcolor1" onClick="return confirm('삭제할까요 ?')">삭제</a>
				<input type="button" value="이전버튼" class="btn btn-sm productcolor1" onclick="history.back()">
			</div>
		</form>
  
