<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	<form method="post" action="__URL__/update/navTabId/listusers/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><?php  ?>
		<input type="hidden" name="user_id" value="<?php echo ($vo["user_id"]); ?>"/>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>用户名：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="username" value="<?php echo ($vo["username"]); ?>"/></dd>
			</dl>
			<dl>
				<dt>邮件：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="email" value="<?php echo ($vo["email"]); ?>"/></dd>
			</dl>
			<dl>
				<dt>会员等级：</dt>
				<dd>
					<select class="required" name="user_rank">
						<?php if(is_array($ranklist)): foreach($ranklist as $key=>$rank): ?><option value="<?php echo ($rank["rank_id"]); ?>" <?php if($vo['user_rank'] == $rank['rank_id']): ?>selected<?php endif; ?>><?php echo ($rank["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</dd>
			</dl>
			<dl>
				<dt>过期时间(月)：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="expires_time" value="<?php echo ($vo["expires_time"]); ?>"/></dd>
			</dl>
			<dl>
				<dt>状态：</dt>
				<dd>
					<input type="radio" name="islock" value="0" <?php if($vo["islock"] == 0 ): ?>checked<?php endif; ?>/>正常
					<input type="radio" name="islock" value="1" <?php if($vo["islock"] == 1 ): ?>checked<?php endif; ?>/>锁定
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