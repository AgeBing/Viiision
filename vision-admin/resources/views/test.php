<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
    <!-- 引入 echarts.js -->
    <script src="echarts.min.js"></script>
    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.js"></script>
</head>
<body>
<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
<div id="main" style="width: 600px;height:400px;"></div>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));

    myChart.setOption({
        title: {
            text: '评论数',
            link:'http:/www.baidu.com/',

            textStyle: {
                fontStyle:'oblique',
                color:'#666',
                fontSize:40
            }
        },
        tooltip: {},
        legend: {
            data:['评论数'],
            textStyle: {
                fontStyle:'oblique',
                color:'#666',
                fontSize:40
            }
        },
        xAxis: {
            data: []
        },
        yAxis: {},
        series: [{
            name: '评论数',
            type: 'bar',
            data: []
        }]
    });
    //open /Applications/Google\ Chrome.app/ --args --allow-file-access-from-files
    myChart.showLoading();

    $.get('data.json').done(function(data){
        myChart.hideLoading();
        var mydata=eval('('+data+')');
        var data1=[];
        var data2=[];
        for(var i=0;i<mydata.length;i++)
        {
            data1[i]=mydata[i].comment_count;
        }
        for(var j=0;j<mydata.length;j++)
        {
            data2[j]=mydata[j].date;

        }
        myChart.setOption({
            xAxis: {
                data: data2
            },
            series: [{
                name: '评论数',
                data: data1
            }]
        });
    });

</script>
</body>
</html>
