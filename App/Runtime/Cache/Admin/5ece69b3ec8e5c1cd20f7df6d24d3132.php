<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="__URL__/insert/navTabId/listusers/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><?php  ?>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>用户名：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="username"/></dd>
			</dl>
			<dl>
				<dt>密码：</dt>
				<dd><input type="password" class="required"  style="width:100%" name="password"/></dd>
			</dl>
			<dl>
				<dt>邮件：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="email"/></dd>
			</dl>
			<dl>
				<dt>会员等级：</dt>
				<dd>
					<select class="required" name="user_rank">
						<?php if(is_array($ranklist)): foreach($ranklist as $key=>$vo): ?><option value="<?php echo ($vo["rank_id"]); ?>" ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</dd>
			</dl>
			<dl>
				<dt>过期时间(月)：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="expires_time"/></dd>
			</dl>
			<dl>
				<dt>状态：</dt>
				<dd>
					<input type="radio" name="islock" value="0" checked/>正常
					<input type="radio" name="islock" value="1"/>锁定
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