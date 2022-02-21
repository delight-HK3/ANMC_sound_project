	<div class="alert productcolor1 mymargin5" role="alert">사용자</div>
		<script>
			function find_text()
			{
				if(!form1.text1.value){
					form1.action="/~sale25/a_member/lists/page";
				}
				else{
					form1.action="/~sale25/a_member/lists/text1/"+form1.text1.value+"/page";
				}
				form1.submit();
			}
		</script>
		<form name="form1" method="post" action="">
			<div class="row">
				<div class="col-3" align="left">            
					<div class="input-group input-group-sm">
						<div class="input-group-prepend">
							<span class="input-group-text">이름</span>
						</div>
						<input type="text" name="text1" value="<?=$text1; ?>" class="form-control" onkeydown="if (event.keyCode == 13) { find_text(); }" >
						<div class="input-group-append">
							<button class="btn productcolor1" type="button" onClick="javascript:find_text();">검색</button>&nbsp&nbsp
						</div>
					</div>
				</div>
				<?
					$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   
				?>
				<div class="col-9" align="right">      
					<a href="/~sale25/a_member/add<?=$tmp?>" class="btn btn-sm productcolor1">추가</a>
				</div>
			</div>
		</form>
		<table class="table table-bordered table-sm mymargin5">
			<tr class="productcolor1">
				<td width="10%">번호</td>
				<td width="20%">이름</td>
				<td width="20%">전화</td>
				<td width="20%">아이디</td>
				<td width="20%">암호</td>
				<td width="10%">등급</td>
			</tr>
			<?
				foreach ($list as $row) // 연관배열 list를 row를 통해 출력한다.
				{
					$no=$row->no25; // 사용자번호
					$phone1 = trim(substr($row->phone25,0,3)); // 전화 : 지역번호 추출
					$phone2 = trim(substr($row->phone25,3,4)); // 전화 : 국번호 추출
					$phone3 = trim(substr($row->phone25,7,4)); // 전화 : 번호 추출
					$phone = $phone1 . "-" . $phone2 . "-" . $phone3; // 합치기
					if($row->rank25==1){
						$rank = "관리자";
					}
					elseif($row->rank25==2){
						$rank = "직원";
					}
					elseif($row->rank25==3){
						$rank = "고객";
					}
			?>
			<tr>
				<td><?=$no; ?></td>
				<td><a href="/~sale25/a_member/view/no/<?=$no?><?=$tmp?>"><?=$row->name25?></a></td>
				<td><?=$phone; ?></td>
				<td><?=$row->uid25; ?></td>
				<td><?=$row->pwd25; ?></td>
				<td><?=$rank; ?></td>
			</tr>
			<?
				}
			?>
		</table>
		<?=$pagination;?>
		