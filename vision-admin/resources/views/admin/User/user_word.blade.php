{{--点击评论列表显示界面--}}
@extends('admin.master')
@section('content')
<!DOCTYPE HTML>
<html>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span> 用户管理
    <span class="c-gray en">&gt;</span> 分词管理
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
    <form class="text-c" method="GET" action="">
        部门选择:
        <select class="select-box inline" name="appName"size="1" name="appSelect" >
            <option value="meiyan">开发部</option>
            <option value="ins">产品部</option>
            <option value="faceu">运营部</option>
        </select>
    </form>

    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            {{--表头--}}
            <thead>
            <tr class="text-c">
                {{--<th width="40">问题类--}}
                    {{--<a href=""  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i>添加分词</a>--}}
                {{--</th>--}}
                {{--<th width="40">功能类--}}
                    {{--<a href=""  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i>添加分词</a>--}}
                {{--</th>--}}
                <th width="40">活动类
                    <a href=""  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i>添加分词</a>
                </th>
            </tr>
            </thead>
            {{--表内容--}}
            <tr class="text-c">
                {{--<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">张三</u></td>--}}
                {{--<td>--}}
                    {{--下载 更新 手机 广告 垃圾 骗子 问题 评价 内存 版本 黑屏 无聊 死机 运行 封号 注册 错误 登录 乱 反馈--}}
                    {{--商家 客服--}}
                    {{--像素 习惯 时间 画面 团队 内容 太假 权限 差评 信息 总会 速度 不卡  卡   真卡--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--美颜 软件 下载 推荐 功能 自拍 建议 发现 使用 评论 微信 分享 关注 滤镜 使用 设计 电话 推荐 评价 表情 美化 自拍 界面--}}
                    {{--保存 视频 使用 效果 神器 大头贴 化妆 朋友圈 游戏 整容 图片 皮肤 相片 一键 磨皮 动画 补光 妆容 装饰 素材 照相机 风景 手绘 漫画 网红 脸型 水印 静音--}}
                {{--</td>--}}
                <td>
                    购买&nbsp;&nbsp商品&nbsp;&nbsp打折&nbsp;&nbsp优惠&nbsp;&nbsp抢购&nbsp;&nbsp余额&nbsp;&nbsp购物车&nbsp;&nbsp交易&nbsp;&nbsp理财&nbsp;&nbsp钱包&nbsp;&nbsp免费&nbsp;&nbsp会员&nbsp;&nbsp会员卡&nbsp;&nbsp奖品&nbsp;&nbsp骗子&nbsp;&nbsp支付&nbsp;&nbsp红包&nbsp;&nbsp奖励&nbsp;&nbsp福利&nbsp;&nbsp消费&nbsp;&nbsp付费&nbsp;&nbsp价格&nbsp;&nbsp特价&nbsp;&nbsp业务&nbsp;&nbsp抽奖&nbsp;&nbsp活动&nbsp;&nbsp贵族&nbsp;&nbsp赠送&nbsp;&nbsp中秋&nbsp;&nbsp春节&nbsp;&nbsp五一&nbsp;&nbsp代言&nbsp;&nbsp玩家&nbsp;&nbsp模式&nbsp;&nbsp玩法&nbsp;&nbsp券券&nbsp;&nbsp代言&nbsp;&nbsp女神&nbsp;&nbsp榜首
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
