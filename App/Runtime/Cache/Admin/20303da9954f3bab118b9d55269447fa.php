<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	<form method="post" action="__URL__/update/navTabId/listcate/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><?php  ?>
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>栏目名称：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="name" value="<?php echo ($vo["name"]); ?>"/></dd>
			</dl>
			<dl>
				<dt>模型：</dt>
				<dd>
					<select class="" name="modelid"  >
						<option value="0" <?php if($vo['modelid'] == 0): ?>selected<?php endif; ?>>文章模型</option>
						<option value="1" <?php if($vo['modelid'] == 1): ?>selected<?php endif; ?>>图片模型</option>
						
					</select>
				</dd>
			</dl>
			<dl>
				<dt>排序：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="sort" value="<?php echo ($vo["sort"]); ?>"/></dd>
			</dl>
			<dl>
				<dt>导航显示：</dt>
				<dd>是<input type="radio" class="required"   name="isshow" value="1" <?php if($vo['isshow'] == 1): ?>checked<?php endif; ?> />&nbsp;&nbsp;&nbsp;否<input type="radio" class="required"   name="isshow" value="0" <?php if($vo['isshow'] == 0): ?>checked<?php endif; ?> /></dd>
			</dl>
			<dl>
				<dt>审核状态：</dt>
				<dd>是<input type="radio" class="required"   name="isverify" value="1" <?php if($vo['isverify'] == 1): ?>checked<?php endif; ?> />&nbsp;&nbsp;&nbsp;否<input type="radio" class="required"   name="isverify" value="0" <?php if($vo['isverify'] == 0): ?>checked<?php endif; ?> /></dd>
			</dl>
			<dl>
				<dt>首页推荐：</dt>
				<dd>是<input type="radio" class="required"   name="ispush" value="1" <?php if($vo['ispush'] == 1): ?>checked<?php endif; ?> />&nbsp;&nbsp;&nbsp;否<input type="radio" class="required"   name="ispush" value="0" <?php if($vo['ispush'] == 0): ?>checked<?php endif; ?>/></dd>
			</dl>
			<dl>
				<dt>访问控制：</dt>
				<dd>
					<?php if(is_array($ranklist)): foreach($ranklist as $key=>$rank): echo ($rank["name"]); ?><input type="checkbox" class="required"   name="visit[]" value="<?php echo ($rank["rank_id"]); ?>"  <?php if(in_array($rank['rank_id'], $vo['visit'])): ?>checked<?php endif; ?>/>&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
				</dd>
			</dl>
			
			
		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>