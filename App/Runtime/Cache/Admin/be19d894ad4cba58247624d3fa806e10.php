<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="__URL__/insert/navTabId/listcate/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><?php  ?>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>添加<?php if($_REQUEST['name']== '' ): ?>顶级分类<?php else: echo ($_REQUEST['name']); ?>的子分类<?php endif; ?></dt>
				<input type="hidden" class="required"  style="width:100%" name="pid" value="<?php echo ($_REQUEST['id']); ?>" />
				<dd><input type="text" class="required"  style="width:100%" name="name"/></dd>
			</dl>
			<dl>
				<dt>模型：</dt>
				<dd>
					<select class="" name="modelid"  >
						<option value="0">文章模型</option>
						<option value="1">图片模型</option>
						
					</select>
				</dd>
			</dl>
			<dl>
				<dt>排序：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="sort" value="100"/></dd>
			</dl>
			<dl>
				<dt>导航显示：</dt>
				<dd>是<input type="radio" class="required"   name="isshow" value="1"  />&nbsp;&nbsp;&nbsp;否<input type="radio" class="required"   name="isshow" value="0"  checked/></dd>
			</dl>
			<dl>
				<dt>审核状态：</dt>
				<dd>是<input type="radio" class="required"   name="isverify" value="1" checked />&nbsp;&nbsp;&nbsp;否<input type="radio" class="required"   name="isverify" value="0"  /></dd>
			</dl>
			<dl>
				<dt>首页推荐：</dt>
				<dd>是<input type="radio" class="required"   name="ispush" value="1"  />&nbsp;&nbsp;&nbsp;否<input type="radio" class="required"   name="ispush" value="0"  checked/></dd>
			</dl>
			<dl>
				<dt>访问控制：</dt>
				<dd>
					<?php if(is_array($ranklist)): foreach($ranklist as $key=>$rank): echo ($rank["name"]); ?><input type="checkbox" class="required"   name="visit[]" value="<?php echo ($rank["rank_id"]); ?>"  />&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
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