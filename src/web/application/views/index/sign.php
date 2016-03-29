<div class="page">
    <div class="hd">
        <div class="bd spacing">
            <div class="button_sp_area">
                <a href="javascript:;" class="weui_btn weui_btn_warn">点击扫码签到</a>
            </div>
        </div>
    </div>
    <div class="bd">
        <!--<a href="javascript:;" class="weui_btn weui_btn_primary">点击展现searchBar</a>-->
        <div class="weui_search_bar" id="search_bar">
            <form action="<?=U('/index/search')?>" class="weui_search_outer ajax-form" success="search_success">
                <div class="weui_search_inner">
                    <i class="weui_icon_search"></i>
                    <input type="number" name="keyword" pattern="[0-9]{11}" class="weui_search_input" id="search_input" placeholder="搜索" required/>
                    <a href="javascript:" class="weui_icon_clear" id="search_clear"></a>
                </div>
                <label for="search_input" class="weui_search_text" id="search_text">
                    <i class="weui_icon_search"></i>
                    <span>输入手机号码</span>
                </label>
            </form>
            <a href="javascript:" class="weui_search_cancel" id="search_cancel">取消</a>
        </div>

        <form action="<?=U('/index/sign')?>" class="ajax-form" method="post" success="sign_success">
            <div class="weui_cells weui_cells_radio hide" style="margin-top: 0;" id="search_show">

            </div>

            <div class="bd hide" id="selected-wrap">
                <div class="weui_cells">
                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>手机号码</p>
                        </div>
                        <div class="weui_cell_ft" id="mobile"></div>
                    </div>
                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>董事长姓名</p>
                        </div>
                        <div class="weui_cell_ft" id="chairman_name"></div>
                    </div>
                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>性别</p>
                        </div>
                        <div class="weui_cell_ft" id="sex">男</div>
                    </div>
                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>公司</p>
                        </div>
                        <div class="weui_cell_ft" id="company_name"></div>
                    </div>
                    <div class="weui_cell">
                        <div class="weui_cell_bd weui_cell_primary">
                            <p>报名时间</p>
                        </div>
                        <div class="weui_cell_ft" id="enroll_time"></div>
                    </div>
                </div>
                <div class="weui_btn_area">
                    <button class="weui_btn weui_btn_primary" type="submit">确定</button>
                </div>
            </form>
        </div>
    </div>
</div>
<block name="script">
<script>
$(function(){

    var events = {
        '#search_input':{
            focus:function(){
                //searchBar
                var $weuiSearchBar = $('#search_bar');
                $weuiSearchBar.addClass('weui_search_focusing');
            },
            blur:function(){
                var $weuiSearchBar = $('#search_bar');
                $weuiSearchBar.removeClass('weui_search_focusing');
            },
            input:function(){

            }
        }
    };

    var contriner = $(document);
    for (var t in events) {
        for (var type in events[t]) {
            contriner.on(type, t, events[t][type]);
        }
    }

});

var result_wrap = $("#search_show");
function search_success(form,resp){
    result_wrap.html('');
    $('#selected-wrap').hide();
    if(resp.list.length  == 0){
        layer.alert('没有找到匹配的数据！');
    }
    $.each(resp.list,function(i,o){
        $('<label class="weui_cell weui_check_label" for="enroll_id'+o.id+'">' +
            '<div class="weui_cell_bd weui_cell_primary">' +
                '<p>'+o.mobile+ '-'+ o.chairman_name+'</p>' +
            '</div>' +
            '<div class="weui_cell_ft">' +
                '<input type="radio" class="weui_check" name="enroll_id" value="'+ o.id+'" id="enroll_id'+o.id+'">' +
                '<span class="weui_icon_checked"></span>' +
            '</div>' +
        '</label>').data('result',o).appendTo(result_wrap);
    });
    result_wrap.show();
    if(resp.list.length == 1){
        $('.weui_check_label').trigger('click');
    }
}

result_wrap.on('click','.weui_check_label',function(){
    var item = $(this).data('result');
    $('#mobile').text(item.mobile);
    $('#chairman_name').text(item.chairman_name);
    $('#sex').text(item.sex == 'MAN' ? '男' : '女');
    $('#company_name').text(item.company_name);
    $('#enroll_time').text(item.create_time);
    $('#selected-wrap').show();
});

function sign_success(){
    result_wrap.html('');
    $('#selected-wrap').hide();
}
</script>
</block>