<extend name="Public/base" />

<block name="body">
<div class="tabbable">
    <ul class="nav nav-tabs padding-18">
        <li class="active"><a data-toggle="tab" href="#tab1"><i class="green icon-edit"></i>基 础</a></li>
        <li><a data-toggle="tab" href="#tab2"><i class="blue icon-rocket"></i>高 级</a></li>
    </ul>
	<!-- 表单 -->			
	<form id="form" action="{:U('update')}" method="post" class="form-horizontal doc-modal-form">
	    <div class="tab-content no-border padding-24">
			<!-- 基础 -->
            <div id="tab1" class="tab-pane active">
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">字段名</label>
					<div class="col-xs-12 col-sm-5">
						<input type="text" class="width-100" name="name" value="{$info.name}">
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline">（请输入字段名 英文字母开头，长度不超过30）</span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">字段标题</label>
					<div class="col-xs-12 col-sm-5">
						<input type="text" class="width-100" name="title" value="{$info.title}">
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline">（请输入字段标题，用于表单显示）</span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">字段类型</label>
					<div class="col-xs-12 col-sm-5">
						<select name="type" id="data-type">
							<option value="">----请选择----</option>
							<volist name=":get_attribute_type()" id="type">
							<option value="{$key}" rule="{$type[1]}">{$type[0]}</option>
							</volist>
						</select>
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline">（用于表单中的展示方式）</span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">字段定义</label>
					<div class="col-xs-12 col-sm-5">
						<input type="text" class="width-100" name="field" value="{$info.field}" id="data-field">
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline">（字段属性的sql表示）</span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">参数</label>
					<div class="col-xs-12 col-sm-5">
						<textarea name="extra" class="form-control">{$info.extra}</textarea>
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline">（布尔、枚举、多选字段类型的定义数据）</span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">默认值</label>
					<div class="col-xs-12 col-sm-5">
						<input type="text" class="width-100" name="value" value="{$info.value}">
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline">（字段的默认值）</span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">字段备注</label>
					<div class="col-xs-12 col-sm-5">
						<input type="text" class="width-100" name="remark" value="{$info.remark}">
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline">(用于表单中的提示)</span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">是否显示</label>
					<div class="col-xs-12 col-sm-5">
						<select name="is_show">
							<option value="1">始终显示</option>
							<option value="2">新增显示</option>
							<option value="3">编辑显示</option>
							<option value="0">不显示</option>
						</select>
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline">（是否显示在表单中）</span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">是否必填</label>
					<div class="col-xs-12 col-sm-5">
						<select name="is_must">
							<option value="0">否</option>
							<option value="1">是</option>
						</select>
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline">（用于自动验证）</span>
				</div>
                </div>
            <div id="tab2" class="tab-pane tab2">
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">验证方式</label>
					<div class="col-xs-12 col-sm-5">
						<select name="validate_type">
							<option value="regex">正则验证</option>
							<option value="function">函数验证</option>
							<option value="unique">唯一验证</option>
							<option value="length">长度验证</option>
                            <option value="in">验证在范围内</option>
                            <option value="notin">验证不在范围内</option>
                            <option value="between">区间验证</option>
                            <option value="notbetween">不在区间验证</option>
						</select>
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline"></span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">验证规则</label>
					<div class="col-xs-12 col-sm-5">
						<input type="text" class="width-100" name="validate_rule" value="{$info.validate_rule}">
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline">（根据验证方式定义相关验证规则）</span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">出错提示</label>
					<div class="col-xs-12 col-sm-5">
						<input type="text" class="width-100" name="error_info" value="{$info.error_info}">
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline"></span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">验证时间</label>
					<div class="col-xs-12 col-sm-5">
						<select name="validate_time">
                            <option value="3">始 终</option>
							<option value="1">新 增</option>
							<option value="2">编 辑</option>
							</select>
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline"></span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">自动完成方式</label>
					<div class="col-xs-12 col-sm-5">
						<select name="auto_type">
							<option value="function">函数</option>
							<option value="field">字段</option>
							<option value="string">字符串</option>
						</select>
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline"></span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">自动完成规则</label>
					<div class="col-xs-12 col-sm-5">
						<input type="text" class="width-100" name="auto_rule" value="{$info.auto_rule}">
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline">（根据完成方式订阅相关规则）</span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 control-label no-padding-right">自动完成时间</label>
					<div class="col-xs-12 col-sm-5">
						<select name="auto_time">
							<option value="3">始 终</option>
							<option value="1">新 增</option>
							<option value="2">编 辑</option>
						</select>
					</div>
					<span class="help-block col-xs-12 col-sm-reset inline"></span>
				</div>
			</div>

            <input type="hidden" name="id" value="{$info['id']}"/>
            <input type="hidden" name="model_id" value="{$info['model_id']}"/>

            <?=ace_srbtn()?>
        </div>
	</form>
</div>
</block>
<block name="script">
<script type="text/javascript" charset="utf-8">
//导航高亮
highlight_subnav('{:U('Model/index')}');
Think.setValue('type', "{$info.type|default=''}");
Think.setValue('is_show', "{$info.is_show|default=1}");
Think.setValue('is_must', "{$info.is_must|default=0}");
Think.setValue('validate_time', "{$info.validate_time|default=3}");
Think.setValue('auto_time', "{$info.auto_time|default=3}");
Think.setValue('validate_type', "{$info.validate_type|default='regex'}");
Think.setValue('auto_type', "{$info.auto_type|default='function'}");
$(function(){
	showTab();
})
<eq name="ACTION_NAME" value="add">
$(function(){
	$('#data-type').change(function(){
		$('#data-field').val($(this).find('option:selected').attr('rule'));
	});
})
</eq>
</script>
</block>

