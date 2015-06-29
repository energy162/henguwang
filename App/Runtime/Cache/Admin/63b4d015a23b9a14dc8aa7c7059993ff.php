<?php if (!defined('THINK_PATH')) exit();?><script>
function updateConf(){
	$.post("__URL__/update",{
		'DEFAULT_THEME':$('#DEFAULT_THEME').val(),
		'HTML_CACHE_ON':$('input[name=HTML_CACHE_ON]:checked').val(),
		'HTML_CACHE_TIME':$('input[name=HTML_CACHE_TIME]').val(),
		'SHOW_PAGE_TRACE':$('input[name=SHOW_PAGE_TRACE]:checked').val(),
	}, function(data) {
		alert('修改成功');
	});
}
	
</script>
<div class="pageContent">
			<table class="table" width="100%" layoutH="55">
				<thead>
					<tr align="center">
						<th>系统相关配置</th>

					</tr>
				</thead>
				<tbody>
						<tr >	
							<td align="center">前台默认风格:</td>
							<td>
								<!-- <input type="text" name="DEFAULT_THEME" value="<?php echo C('DEFAULT_THEME');?>"> -->
								<select name="DEFAULT_THEME" id="DEFAULT_THEME">
									<option value="<?php echo C('DEFAULT_THEME');?>"><?php echo C('DEFAULT_THEME');?></option>
									<?php if(is_array($themes)): foreach($themes as $key=>$vo): ?><option value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
								</select>
								
							</td>
						</tr>
						<tr >
							<td align="center">缓存设置:</td>
							<td>
							开启<input type="radio" name="HTML_CACHE_ON" value="1" <?php if(C('HTML_CACHE_ON') == 1): ?>checked="checked"<?php endif; ?>>
							关闭<input type="radio" name="HTML_CACHE_ON" value="0" <?php if(C('HTML_CACHE_ON') == 0): ?>checked="checked"<?php endif; ?>>
							</td>
						</tr>
						<tr>
							<td align="center">缓存时间:</td>
							<td><input type="text" name="HTML_CACHE_TIME" value="<?php echo C('HTML_CACHE_TIME');?>"></td>
						</tr>
						<tr>
							<td align="center">调试模式:</td>
							<td>
							开启<input type="radio" name="SHOW_PAGE_TRACE" value="1" <?php if(C('SHOW_PAGE_TRACE') == 1): ?>checked="checked"<?php endif; ?>>
							关闭<input type="radio" name="SHOW_PAGE_TRACE" value="0" <?php if(C('SHOW_PAGE_TRACE') == 0): ?>checked="checked"<?php endif; ?>>
							</td>
						</tr>
				</tbody>
			</table>	


		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button onclick="updateConf();">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>

</div>