<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__/index" method="post">
	<input type="hidden" name="pageNum" value="<?php echo (($currentPage)?($currentPage):'1'); ?>" />
	<input type="hidden" name="numPerPage" value="<?php echo ($numPerPage); ?>" /><!--每页显示多少条-->
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST['_order']); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST['_sort']); ?>"/>
</form>
<script>
	function updateSort(obj){
		$id=$(obj).attr('name');
		$value=$(obj).attr('value');
		$.post('__URL__/update/navTabId/listcate/callbackType/closeCurrent' , {'id':$id,'sort':$value} , function(){
			$(obj).html($value);
		});
		navTabPageBreak();
	}

</script>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="delete" href="__URL__/delete/id/{item_id}/navTabId/listcate" target="ajaxTodo" title="纭畾瑕佸垹闄ゅ悧?"><span>鍒犻櫎</span></a></li>
			<li class="line">line</li>
			<li><a class="icon"  href="javascript:navTabPageBreak()"><span>鍒锋柊</span></a></li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="112">
		<thead>
			<tr align="center">
				<th width="40">ID</th>
				<th>娉ㄥ唽鐢ㄦ埛鍚�</th>
				<th>鐣欒█鍐呭</th>
				<th>娣诲姞鏃堕棿</th>				
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr target="item_id" rel="<?php echo ($vo["id"]); ?>" level="<?php echo ($vo["level"]); ?>" align="center">
					<td ><?php echo ($vo["id"]); ?></td>
					<td align="left"><?php echo ($vo["username"]); ?></td>
					<td><?php echo ($vo["content"]); ?></td>
					<td width="70" align="center"><?php echo (date("Y-m-d H:m:s",$vo["addtime"])); ?></td>
				</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
</div>