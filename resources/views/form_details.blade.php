<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../assets/font/iconfont.css" rel="stylesheet">
    <link href="../assets/css/components/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/js/lib/layui/css/layui.css" media="all">
    <link href="../assets/css/components/common.css" rel="stylesheet">
</head>
<body>
<div class="container">
       <div class="header-warp">
    <div class="header">
     <div class="inner">
        <div class="float-left">
        <span class="head-brand">
            数据平台
        </span>
        <div class="head-menu">
          <a class="menu-item active">
             表单
          </a>
          <a class="menu-item">
             表单
          </a>
        </div>
        <div class="head-search-box">
             <input type="text" class="search-hide" id="h-search-text" required/>
             <span class="iconfont icon-sousuo"></span>
        </div>
        </div>
        <div class="float-right">
        <div class="head-user-info">
            <span class="iconfont icon-xinxi message"></span>
            <div class="user-head-box">
                <img class="user-head-img"/>
                <span class="iconfont icon-jiantou arrows"></span>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="navigation">
       <h1 class="module-name">
       <span class="name">海外华人小孩学中文福利包</span>
       <div class="module-setting-box">
         <span class="iconfont icon-shezhi3 setting-icon"></span>
         <div class="module-setting-hide">
            <p class="item">
              <i class="iconfont icon-fuzhi"></i>
              <em>复制</em>
            </p>
            <p class="item disable">
             <i class="iconfont icon-yidongyema"></i>
             <em>移动到</em>
             <i class="iconfont icon-jiantou1 arrows"></i>
            </p>
         </div>
       </div>
       </h1>
       <div class="module-action">

          <div class="action-left">
            <a class="item active">概述</a>
            <a class="item">数据数据</a>
            <a class="item">发布</a>
          </div>
          <div class="action-right">
             <em class="name">发布表单</em>
             <input type="text" value="" class="form-link-text" readonly="readonly"/>
             <span class="iconfont icon-fuzhi" id="copy-form-link"></span>
             <span class="hover-code-show iconfont icon-erweima"></span>
             <button class="form-publish" id="form-publish">发布</button>
          </div>
       </div>
    </div>
 </div>
    <div class="content-wrapper">
        <div class="js-table-tools">
            <span class="iconfont icon-shuaxin-a tools-item tools-item-btn border-right table-data-refresh"
                  title="重新加载数据"></span>
            <div class="tools-item">
                <span class="iconfont tools-item-btn table-data-add">添加数据</span>
                <ul class="tools-item-hide table-data-add-hide">
                    <li class="item">手动添加数据</li>
                    <li class="item disable">Excel导入数据</li>
                </ul>
            </div>
            <span class="iconfont icon-delete tools-item tools-item-btn table-data-remove">删除</span>
            <span class="iconfont icon-bi tools-item tools-item-btn border-right table-data-edit">批量编辑</span>
            <div class=" tools-item">
                <span class="iconfont table-data-sendMes tools-item-btn border-right disable">发送短信&邮件</span>
                <ul class="tools-item-hide table-data-sendMes-hide">
                    <li class="item">发送短信</li>
                    <li class="item">发送邮件</li>
                </ul>
            </div>
            <div class=" tools-item">
                <span class="iconfont icon-liebiao table-data-hide tools-item-btn">隐藏列</span>
                <ul class="tools-item-hide tools-item-hide-scroll table-data-hide-hide">
                    <li class="item iconfont active">序号</li>
                    <li class="item iconfont active">孩子姓名</li>
                </ul>
            </div>
            <div class=" tools-item">
                <span class="iconfont icon-shaixuan-tianchong table-data-filtrate tools-item-btn border-right">筛选数据</span>
                <ul class="tools-item-hide table-data-filtrate-hide">
                    <li class="item">按数据内容筛选</li>
                    <li class="item">按提交日期筛选</li>
                </ul>
            </div>
            <div class=" tools-item">
                <span class="iconfont table-data-print tools-item-btn">导出&打印</span>
                <ul class="tools-item-hide table-data-print-hide">
                    <li class="item">导出所有列</li>
                    <li class="item">仅导出显示列</li>
                    <li class="item">仅导出选中数据</li>
                    <li class="item">批量打印</li>
                </ul>
            </div>
            <div class="tools-right">
                <div class="tools-search-box">
                    <i class="iconfont icon-sousuo tools-search-icon"></i>
                    <input type="text" class="tools-search-text" value=""/>
                    <ul class="tools-search-hide">
                        <li class="item">按字段内容搜索</li>
                        <li class="item">按数据序号搜索</li>
                    </ul>
                </div>
                <span class="iconfont icon-lishijilu tools-change-record" title="查看数据变更记录"></span>
            </div>
        </div>
        <table class="js-table-data layui-hide" id="table">
        </table>
    </div>
</div>
</body>
<script type="text/javascript" src="../assets/js/lib/jquery1.8.3.min.js"></script>
<script src="../assets/js/lib/utils.js" charset="utf-8"></script>
<script src="../assets/js/lib/layui/layui.js" charset="utf-8"></script>
<script>
    layui.use('table', function () {
        var table = layui.table;
        table.render({
            elem: '#table',
            height: 'full-' + ($(".header-warp").outerHeight(true) + utils.getScrollWidth()),
            cols: [[
                {type: 'checkbox', width: 30},
                {field: '', title: '序号', sort: true},
                {field: '', title: '孩子姓名', sort: true},
                {field: '', title: '国家/手机区号', sort: true},
                {field: '', title: '手机', sort: true},
                {field: '', title: '微信号', sort: true},
                {field: '', title: '孩子年龄', sort: true},
                {field: '', title: '孩子性别'},
                {field: '', title: '跟进状态', sort: true},
                {field: '', title: '跟进人', sort: true},
                {field: '', title: '学生信息记录', sort: true},
                {field: '', title: '试听课当地日期', sort: true}
            ]]
        });
    });
</script>
</html>