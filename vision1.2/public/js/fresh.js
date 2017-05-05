$(document).ready(function(){
    $(".button-collapse").sideNav();
});

    var myChart0 = echarts.init(document.getElementById('main'));
    var y_1;
    var y_2;
myChart0.setOption({
    title: {
    },
    tooltip: {
        trigger: 'axis'
    },
    toolbox: {
        feature: {
            dataView: {
                show: true,
                readOnly: false
            },
            restore: {
                show: true
            },
            saveAsImage: {
                show: true
            }
        }
    },
    grid: {
        containLabel: true
    },
    legend: {
        data: ['下载量','评论数']
    },
    xAxis: [{
        type: 'category',
        axisTick: {
            alignWithLabel: true
        },
        data:[]
    }],
    yAxis: [{
        type: 'value',
        name: '评论数',
        min: 0,
        max: y_1,
        position: 'right'
    }, {
        type: 'value',
        name: '下载量',
        min: 0,
        max: y_2,
        position: 'left'
    }],
    series: [{
        name: '评论数',
        type: 'line',
        yAxisIndex: 0,
        stack: '总量',
        label: {
            normal: {
                show: true,
                position: 'top',
            }
        },
        lineStyle: {
            normal: {
                width: 1,
                color: '#7766ff'
            }
        },
        data: []
    }, {
        name: '下载量',
        type: 'bar',
        yAxisIndex: 1,
        stack: '总量',
        itemStyle: {
            normal: {
                color: '#3399FF'
            }
        },
        label: {
            normal: {
                show: true,
                position: 'top'
            }
        },
        data: []
    }]
});


// console.log(document.getElementById("main").style.width);
// console.log(document.getElementById("main").style.height);
$.get('graph',{
    time_range:7
}).done(function(mydata){
    // console.log();
    var data1=[];
    var data2=[];
    var data3=[];
    //var mydata=eval('('+data+')');
    // console.log(mydata);
    for(var i=0;i<mydata.length;i++)
    {
        data1[i]=mydata[i].app_comment_count;
    }
    y_1= eval("Math.max(" + data1.join() + ")")+10;
    for(var j=0;j<mydata.length;j++)
    {
        data2[j]=mydata[j].app_date;
    }
    for(var j=0;j<mydata.length;j++)
    {
        data3[j]=mydata[j].app_download_count;
    }
    y_2= eval("Math.max(" + data3.join() + ")")+10000;
     //console.log(mydata);
    // console.log(data2);
    // console.log(data3);
    console.log(y_1);
    console.log(y_2);
    myChart0.setOption({
        yAxis: [{
            type: 'value',
            name: '评论数',
            min: 0,
            max: y_1,
            position: 'right'
        }, {
            type: 'value',
            name: '下载量',
            min: 0,
            max: y_2,
            position: 'left'
        }],
        xAxis:{
            data:data2
        },series: [{
            name: '下载量',
            yAxisIndex: 1,
            data: data3
        }, {
            name: '评论数',
            yAxisIndex: 0,
            data: data1
        }]
    });
});

var myChart1 = echarts.init(document.getElementById('main1'));
var hours = ["4-2", "4-3", "4-4", "4-5", "4-6", '4-7', '4-8',
    '4-9', '4-10', '4-11','4-12','4-13',
    '4-14', '4-15', '4-16', '4-17', '4-18', '4-19',
    '4-20', "4-21", "4-22", "4-23", "4-24", "4-25"];
var days = ['垃圾', '手机', '广告',
    '像素', '版本', '内存', '画面'];

var data = [[0,0,5],[0,1,1],[0,2,2],[0,3,3],[0,4,3],[0,5,1],[0,6,2],[0,7,3],[0,8,2],[0,9,1.5],[0,10,3],[0,11,2],[0,12,4],[0,13,1],[0,14,1],[0,15,3],[0,16,4],[0,17,6],[0,18,4],[0,19,4],[0,20,3],[0,21,3],[0,22,2],[0,23,5],[1,0,7],[1,1,2],[1,2,1],[1,3,3],[1,4,5],[1,5,6],[1,6,8],[1,7,9],[1,8,2],[1,9,3],[1,10,5],[1,11,2],[1,12,2],[1,13,6],[1,14,9],[1,15,11],[1,16,6],[1,17,7],[1,18,8],[1,19,12],[1,20,5],[1,21,5],[1,22,7],[1,23,2],[2,0,1],[2,1,1],[2,2,3],[2,3,6],[2,4,8],[2,5,3],[2,6,9],[2,7,4],[2,8,1],[2,9,5],[2,10,3],[2,11,2],[2,12,1],[2,13,9],[2,14,8],[2,15,10],[2,16,6],[2,17,5],[2,18,5],[2,19,5],[2,20,7],[2,21,4],[2,22,2],[2,23,4],[3,0,7],[3,1,3],[3,2,4],[3,3,6],[3,4,8],[3,5,3],[3,6,2],[3,7,1],[3,8,1],[3,9,1.5],[3,10,5],[3,11,4],[3,12,7],[3,13,14],[3,14,13],[3,15,12],[3,16,9],[3,17,5],[3,18,5],[3,19,10],[3,20,6],[3,21,4],[3,22,4],[3,23,1],[4,0,1],[4,1,3],[4,2,3],[4,3,5],[4,4,5],[4,5,8],[4,6,10],[4,7,8],[4,8,12],[4,9,2],[4,10,4],[4,11,4],[4,12,2],[4,13,4],[4,14,4],[4,15,14],[4,16,12],[4,17,1],[4,18,8],[4,19,5],[4,20,3],[4,21,7],[4,22,3],[4,23,4],[5,0,2],[5,1,1],[5,2,0],[5,3,3],[5,4,4],[5,5,6],[5,6,3],[5,7,2],[5,8,2],[5,9,17],[5,10,4],[5,11,1],[5,12,5],[5,13,10],[5,14,5],[5,15,7],[5,16,11],[5,17,6],[5,18,8],[5,19,5],[5,20,3],[5,21,4],[5,22,2],[5,23,2],[6,0,1],[6,1,4],[6,2,5],[6,3,3],[6,4,2],[6,5,8],[6,6,1],[6,7,5],[6,8,3],[6,9,8],[6,10,1],[6,11,3],[6,12,2],[6,13,1],[6,14,3],[6,15,4],[6,16,5],[6,17,3],[6,18,4],[6,19,8],[6,20,1],[6,21,2],[6,22,2],[6,23,6]];
data = data.map(function (item) {
    return [item[1], item[0], item[2]];
});

option = {
    title: {
        text: '热词云图',
        left: 'center',
        top: 'top'
    },
    tooltip: {
        position: 'top',
        formatter: function (params) {
            return params.value[2] + ' comments at day  ' + hours[params.value[0]] + ' of ' + days[params.value[1]];
        }
    },
    grid: {
        left: 2,
        bottom: 10,
        right: 10,
        containLabel: true,
        height: '50%',
        y: '10%'
    },
    xAxis: {
        type: 'category',
        data: hours,
        boundaryGap: false,
        splitLine: {
            show: true,
            lineStyle: {
                color: '#999',
                type: 'dashed'
            }
        },
        axisLine: {
            show: false
        },
        bottom: '15%'
    },
    visualMap: {
        min: 0,
        max: 10,
        calculable: true,
        orient: 'horizontal',
        left: 'center',
        bottom: '15%'
    },
    yAxis: {
        type: 'category',
        data: days,
        axisLine: {
            show: false
        },
        orient: 'vertical'
    },

    series: [{
        name: '词云图',
        type: 'scatter',
        symbolSize: function (val) {
            return val[2] * 2;
        },
        data: data,
        animationDelay: function (idx) {
            return idx * 4;
        },
        itemStyle: {
            emphasis: {
                shadowBlur: 10,
                shadowColor: 'rgba(0, 0, 0, 0.5)'
            }
        }
    }]
};
myChart1.setOption(option);

var myChart2 = echarts.init(document.getElementById('main2'));
option1 = {
    title: {
        text: '全球用户分布图',
        left: 'center',
        top: 'top'
    },
    tooltip: {
        trigger: 'item',
        formatter: function (params) {
            var value = (params.value + '').split('.');
            value = value[0].replace(/(\d{1,3})(?=(?:\d{3})+(?!\d))/g, '$1,')
                + '.' + value[1];
            return params.seriesName + '<br/>' + params.name + ' : ' + value;
        }
    },
    visualMap: {
        min: 0,
        max: 1000,
        text:['High','Low'],
        realtime: false,
        orient: 'horizontal',
        calculable: true,
        left: 'center',
        //bottom: '15%'
        inRange: {
            color: ['lightskyblue','yellow', 'orangered']
        }
    },
    series: [
        {
            name: 'Users',
            type: 'map',
            mapType: 'world',
            //roam: true,
            itemStyle:{
                emphasis:{label:{show:true}}
            },
            data:[
                {name: 'Australia', value: 448},
                {name: 'Brazil', value: 154},
                {name: 'Canada', value: 354.24},
                {name: 'Switzerland', value: 78.534},
                {name: 'China', value: 1298.465},
                {name: 'Germany', value: 83.404},
                {name: 'United Kingdom', value: 66.35},
                {name: 'Gambia', value: 18.64},
                {name: 'Japan', value: 152.833},
                {name: 'Kenya', value: 40.194},
                {name: 'Libya', value: 50.612},
                {name: 'New Zealand', value: 198.136},
                {name: 'Russia', value: 211.476},
                {name: 'Turkey', value: 177.546},
                {name: 'United States of America', value: 1047.116}
            ]
        }
    ]
};
myChart2.setOption(option1);

//week button
$('#week').click(function(){
    var a=$('.download-comment').append('<div></div>');//主容器中加载一个echarts容器
    a.attr("id","main");
    $('#main').width(800);
    $('#main').height(400);
    var myChart0 = echarts.init(document.getElementById('main'));
    myChart0.setOption({
        title: {
        },
        tooltip: {
            trigger: 'axis'
        },
        toolbox: {
            feature: {
                dataView: {
                    show: true,
                    readOnly: false
                },
                restore: {
                    show: true
                },
                saveAsImage: {
                    show: true
                }
            }
        },
        grid: {
            containLabel: true
        },
        legend: {
            data: ['下载量','评论数']
        },
        xAxis: [{
            type: 'category',
            axisTick: {
                alignWithLabel: true
            },
            data:[]
        }],
        yAxis: [{
            type: 'value',
            name: '评论数',
            min: 0,
            max: y_1,
            position: 'right'
        }, {
            type: 'value',
            name: '下载量',
            min: 0,
            max: y_2,
            position: 'left'
        }],
        series: [{
            name: '评论数',
            type: 'line',
            yAxisIndex: 0,
            stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'top',
                }
            },
            lineStyle: {
                normal: {
                    width: 1,
                    color: '#7766ff'
                }
            },
            data: []
        }, {
            name: '下载量',
            type: 'bar',
            yAxisIndex: 1,
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#3399FF'
                }
            },
            label: {
                normal: {
                    show: true,
                    position: 'top'
                }
            },
            data: []
        }]
    });

    $.get('graph',{
        time_range:7
    }).done(function(mydata){
        // console.log();
        var data1=[];
        var data2=[];
        var data3=[];
        //var mydata=eval('('+data+')');
        // console.log(mydata);
        for(var i=0;i<mydata.length;i++)
        {
            data1[i]=mydata[i].app_comment_count;
        }
        y_1= eval("Math.max(" + data1.join() + ")")+10;
        for(var j=0;j<mydata.length;j++)
        {
            data2[j]=mydata[j].app_date;
        }
        for(var j=0;j<mydata.length;j++)
        {
            data3[j]=mydata[j].app_download_count;
        }
        y_2= eval("Math.max(" + data3.join() + ")")+10000;
        console.log(mydata);
        console.log(data2);
        console.log(data3);
        myChart0.setOption({
            yAxis: [{
                type: 'value',
                name: '评论数',
                min: 0,
                max: y_1,
                position: 'right'
            }, {
                type: 'value',
                name: '下载量',
                min: 0,
                max: y_2,
                position: 'left'
            }],
            xAxis:{
                data:data2
            },series: [{
                name: '下载量',
                yAxisIndex: 1,
                data: data3
            }, {
                name: '评论数',
                yAxisIndex: 0,
                data: data1
            }]
        });
    });
})

//one month week
$('#month').click(function(){
    var a=$('.download-comment').append('<div></div>');//主容器中加载一个echarts容器
    a.attr("id","main");
    $('#main').width(800);
    $('#main').height(400);
    var myChart0 = echarts.init(document.getElementById('main'));
    myChart0.setOption({
        title: {
        },
        tooltip: {
            trigger: 'axis'
        },
        toolbox: {
            feature: {
                dataView: {
                    show: true,
                    readOnly: false
                },
                restore: {
                    show: true
                },
                saveAsImage: {
                    show: true
                }
            }
        },
        grid: {
            containLabel: true
        },
        legend: {
            data: ['下载量','评论数']
        },
        xAxis: [{
            type: 'category',
            axisTick: {
                alignWithLabel: true
            },
            data:[]
        }],
        yAxis: [{
            type: 'value',
            name: '评论数',
            min: 0,
            max: y_1,
            position: 'right'
        }, {
            type: 'value',
            name: '下载量',
            min: 0,
            max: y_2,
            position: 'left'
        }],
        series: [{
            name: '评论数',
            type: 'line',
            yAxisIndex: 0,
            stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'top',
                }
            },
            lineStyle: {
                normal: {
                    width: 1,
                    color: '#7766ff'
                }
            },
            data: []
        }, {
            name: '下载量',
            type: 'bar',
            yAxisIndex: 1,
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#3399FF'
                }
            },
            label: {
                normal: {
                    show: false,
                    position: 'top'
                }
            },
            data: []
        }]
    });

    $.get('graph',{
        time_range:30
    }).done(function(mydata){
        // console.log();
        var data1=[];
        var data2=[];
        var data3=[];
        //var mydata=eval('('+data+')');
        // console.log(mydata);
        for(var i=0;i<mydata.length;i++)
        {
            data1[i]=mydata[i].app_comment_count;
        }
        y_1= eval("Math.max(" + data1.join() + ")")+10;
        for(var j=0;j<mydata.length;j++)
        {
            data2[j]=mydata[j].app_date;
        }
        for(var j=0;j<mydata.length;j++)
        {
            data3[j]=mydata[j].app_download_count;
        }
        y_2= eval("Math.max(" + data3.join() + ")")+10000;
        console.log(mydata);
        console.log(data2);
        console.log(data3);
        myChart0.setOption({
            yAxis: [{
                type: 'value',
                name: '评论数',
                min: 0,
                max: y_1,
                position: 'right'
            }, {
                type: 'value',
                name: '下载量',
                min: 0,
                max: y_2,
                position: 'left'
            }],
            xAxis:{
                data:data2
            },series: [{
                name: '下载量',
                yAxisIndex: 1,
                data: data3
            }, {
                name: '评论数',
                yAxisIndex: 0,
                data: data1
            }]
        });
    });
})
//3month
$('#3month').click(function(){
    var a=$('.download-comment').append('<div></div>');//主容器中加载一个echarts容器
    a.attr("id","main");
    $('#main').width(800);
    $('#main').height(400);
    var myChart0 = echarts.init(document.getElementById('main'));
    myChart0.setOption({
        title: {
        },
        tooltip: {
            trigger: 'axis'
        },
        toolbox: {
            feature: {
                dataView: {
                    show: true,
                    readOnly: false
                },
                restore: {
                    show: true
                },
                saveAsImage: {
                    show: true
                }
            }
        },
        grid: {
            containLabel: true
        },
        legend: {
            data: ['下载量','评论数']
        },
        xAxis: [{
            type: 'category',
            axisTick: {
                alignWithLabel: true
            },
            data:[]
        }],
        yAxis: [{
            type: 'value',
            name: '评论数',
            min: 0,
            max: y_1,
            position: 'right'
        }, {
            type: 'value',
            name: '下载量',
            min: 0,
            max: y_2,
            position: 'left'
        }],
        series: [{
            name: '评论数',
            type: 'line',
            yAxisIndex: 0,
            stack: '总量',
            label: {
                normal: {
                    show: true,
                    position: 'top',
                }
            },
            lineStyle: {
                normal: {
                    width: 1,
                    color: '#7766ff'
                }
            },
            data: []
        }, {
            name: '下载量',
            type: 'bar',
            yAxisIndex: 1,
            stack: '总量',
            itemStyle: {
                normal: {
                    color: '#3399FF'
                }
            },
            label: {
                normal: {
                    show: false,
                    position: 'top'
                }
            },
            data: []
        }]
    });

    $.get('graph',{
        time_range:90
    }).done(function(mydata){
        // console.log();
        var data1=[];
        var data2=[];
        var data3=[];
        //var mydata=eval('('+data+')');
        // console.log(mydata);
        for(var i=0;i<mydata.length;i++)
        {
            data1[i]=mydata[i].app_comment_count;
        }
        y_1= eval("Math.max(" + data1.join() + ")")+10;
        for(var j=0;j<mydata.length;j++)
        {
            data2[j]=mydata[j].app_date;
        }
        for(var j=0;j<mydata.length;j++)
        {
            data3[j]=mydata[j].app_download_count;
        }
        y_2= eval("Math.max(" + data3.join() + ")")+10000;
        console.log(mydata);
        console.log(data2);
        console.log(data3);
        myChart0.setOption({
            yAxis: [{
                type: 'value',
                name: '评论数',
                min: 0,
                max: y_1,
                position: 'right'
            }, {
                type: 'value',
                name: '下载量',
                min: 0,
                max: y_2,
                position: 'left'
            }],
            xAxis:{
                data:data2
            },series: [{
                name: '下载量',
                yAxisIndex: 1,
                data: data3
            }, {
                name: '评论数',
                yAxisIndex: 0,
                data: data1
            }]
        });
    });
})
function append_child(father,classname,text) {
    var childNode = document.createElement("td");
    childNode.setAttribute("class",classname);
    childNode.innerHTML = text;
    father.append(childNode);
}
function create_one_comment_line1(oneData ) {
    var fatherNode = document.createElement("tr");
    fatherNode.setAttribute("class","com_main2");
    append_child(fatherNode,"com_content1",oneData.content);
    $('.com_main2:last').after(fatherNode);
}
function create_one_comment_line2(oneData ) {
    var fatherNode = document.createElement("tr");
    fatherNode.setAttribute("class","com_main3");
    append_child(fatherNode,"com_content2",oneData.content);
    $('.com_main3:last').after(fatherNode);
}
$('#hotword1').click(function () {
    $.get('wordcloud_comments',{
        keyword:'画面'
    },function(data,status){
        $(".com_main2:gt(0)").remove();
        $(".com_main3:gt(0)").remove();
        console.log(data);
        var a='画面';
        var temp1=1;
        var temp2=1;
        for(var i=0;i<data.length;i++)
         {
             var num1;
             var num2;
             if(data[i].score>3)
             {
                 if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                 data[i].content=temp1+","+data[i].content;
                 create_one_comment_line1(data[i]);
                fHl(document.body, a);
                temp1++;
                if(temp1>=8) $(".com_main2:gt(7)").remove();

             }
             if(data[i].score<=3) {
                 if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                 data[i].content=temp2+" "+data[i].content;
                 create_one_comment_line2(data[i]);
                fHl(document.body, a);
                temp2++;
                 if(temp2>=8) $(".com_main3:gt(7)").remove();
             }

         }
     });
 });

$('#hotword2').click(function () {
    $.get('wordcloud_comments',{
        keyword:'内存'
    },function(data,status){
        $(".com_main2:gt(0)").remove();
        $(".com_main3:gt(0)").remove();
        console.log(data);
        var a='内存';
        var temp1=1;
        var temp2=1;
        for(var i=0;i<data.length;i++)
        {
            var num1;
            var num2;
            if(data[i].score>3)
            {
                if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp1+","+data[i].content;
                create_one_comment_line1(data[i]);
                fHl(document.body, a);
                temp1++;
                if(temp1>=8) $(".com_main2:gt(7)").remove();
            }
            if(data[i].score<=3) {
                if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp2+" "+data[i].content;
                create_one_comment_line2(data[i]);
                fHl(document.body, a);
                temp2++;
                if(temp2>=8) $(".com_main3:gt(7)").remove();
            }

        }
    });
});

$('#hotword3').click(function () {
    $.get('wordcloud_comments',{
        keyword:'版本'
    },function(data,status){
        $(".com_main2:gt(0)").remove();
        $(".com_main3:gt(0)").remove();
        // console.log(data);
        // console.log($("#search1").val());
        var a='版本';
        var temp1=1;
        var temp2=1;
        for(var i=0;i<data.length;i++)
        {
            var num1;
            var num2;
            if(data[i].score>3)
            {
                if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp1+","+data[i].content;
                create_one_comment_line1(data[i]);
                fHl(document.body, a);
                temp1++;
                if(temp1>=8) $(".com_main2:gt(7)").remove();
            }
            if(data[i].score<=3) {
                if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp2+" "+data[i].content;
                create_one_comment_line2(data[i]);
                fHl(document.body, a);
                temp2++;
                if(temp2>=8) $(".com_main3:gt(7)").remove();
            }

        }
    });
});

$('#hotword5').click(function () {
    $.get('wordcloud_comments',{
        keyword:'广告'
    },function(data,status){
        $(".com_main2:gt(0)").remove();
        $(".com_main3:gt(0)").remove();
        console.log(data);
        // console.log($("#search1").val());
        var a='广告';
        var temp1=1;
        var temp2=1;
        for(var i=0;i<data.length;i++)
        {
            var num1;
            var num2;
            if(data[i].score>3)
            {
                //if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp1+","+data[i].content;
                create_one_comment_line1(data[i]);
                fHl(document.body, a);
                temp1++;
                if(temp1>=4) $(".com_main2:gt(3)").remove();
            }
            if(data[i].score<=3) {
                //if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp2+" "+data[i].content;
                create_one_comment_line2(data[i]);
                fHl(document.body, a);
                temp2++;
                if(temp2>=8) $(".com_main3:gt(7)").remove();

            }

        }
    });
});

$('#hotword6').click(function () {
    $.get('wordcloud_comments',{
        keyword:'手机'
    },function(data,status){
        $(".com_main2:gt(0)").remove();
        $(".com_main3:gt(0)").remove();
        // console.log(data);
        // console.log($("#search1").val());
        var a='手机';
        var temp1=1;
        var temp2=1;
        for(var i=0;i<data.length;i++)
        {
            var num1;
            var num2;
            if(data[i].score>3)
            {
                if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp1+","+data[i].content;
                create_one_comment_line1(data[i]);
                fHl(document.body, a);
                temp1++;
                if(temp1>=8) $(".com_main2:gt(7)").remove();
            }
            if(data[i].score<=3) {
                if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp2+" "+data[i].content;
                create_one_comment_line2(data[i]);
                fHl(document.body, a);
                temp2++;
                if(temp2>=8) $(".com_main3:gt(7)").remove();
            }

        }
    });
});

$('#hotword7').click(function () {
    $.get('wordcloud_comments',{
        keyword:'垃圾'
    },function(data,status){
        $(".com_main2:gt(0)").remove();
        $(".com_main3:gt(0)").remove();
        // console.log(data);
        // console.log($("#search1").val());
        var a='垃圾';
        var temp1=1;
        var temp2=1;
        for(var i=0;i<data.length;i++)
        {
            var num1;
            var num2;
            if(data[i].score>3)
            {
                if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp1+","+data[i].content;
                create_one_comment_line1(data[i]);
                fHl(document.body, a);
                temp1++;
                if(temp1>=8) $(".com_main2:gt(7)").remove();
            }
            if(data[i].score<=3) {
                if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp2+" "+data[i].content;
                create_one_comment_line2(data[i]);
                fHl(document.body, a);
                temp2++;
                if(temp2>=8) $(".com_main3:gt(7)").remove();
            }

        }
    });
});

$('#hotword4').click(function () {
    $.get('wordcloud_comments',{
        keyword:'像素'
    },function(data,status){
        $(".com_main2:gt(0)").remove();
        $(".com_main3:gt(0)").remove();
        // console.log(data);
        // console.log($("#search1").val());
        var a='像素';
        var temp1=1;
        var temp2=1;
        for(var i=0;i<data.length;i++)
        {
            var num1;
            var num2;
            if(data[i].score>3)
            {
                if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp1+","+data[i].content;
                create_one_comment_line1(data[i]);
                fHl(document.body, a);
                temp1++;
                if(temp1>=8) $(".com_main2:gt(7)").remove();
            }
            if(data[i].score<=3) {
                if(data[i].content.length>30)data[i].content=data[i].content.substring(0,25);
                data[i].content=temp2+" "+data[i].content;
                create_one_comment_line2(data[i]);
                fHl(document.body, a);
                temp2++;
                if(temp2>=8) $(".com_main3:gt(7)").remove();
            }

        }
    });
});

window.onresize = function () {
    document.getElementById("main").style.width=(window.innerWidth/1.5)+'px';
    document.getElementById("main").style.height=(window.innerHeight/1.5)+'px';
    myChart0.resize();
    document.getElementById("time1").style.width=(window.innerWidth/1.5)+'px';
    document.getElementById("time1").style.height=(window.innerHeight/1.5)+'px';
};
