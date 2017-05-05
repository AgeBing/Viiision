<nav class="right-part">
    <div class="container">
        <!--User panel-->
        <div class="user-panel right hide-on-small-and-down">
            <i class="medium center material-icons" >perm_identity</i>
        </div>
        <!--Link item-->
        <ul class="link-item right hide-on-med-and-down">
            <li><a href="">首 页</a></li>
            <li class="#"><a href="test">APP概况</a></li>
            <li class="{{Request::is('test') ? "active":""}}"><a href="test">关注内容</a></li>
            <li class="{{Request::is('viewgraph') ? "active":""}}"><a href="viewgraph">数据分析</a></li>
            <li class="{{Request::is('viewcomments') ? "active":""}}"><a href="viewcomments">评论详情</a></li>
        </ul>
    </div>
</nav>