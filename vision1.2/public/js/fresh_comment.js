/**
 * Created by b1uuu on 2017/4/17.
 */
$(document).ready(function(){
	$(".button-collapse").sideNav();
});
$(document).ready(function() {
    var a,b,c;
    $("#select1 dd").click(function() {
        $(this).addClass("selected").siblings().removeClass("selected");

        var copyThisA = $(this).clone();
        if ($("#selectA").length > 0) {
            $("#selectA a").html($(this).text());

        } else {

            $(".select-result dl").append(copyThisA.attr("id", "selectA"));
        }
    });

    $("#select2 dd").click(function() {
        $(this).addClass("selected").siblings().removeClass("selected");

        var copyThisB = $(this).clone();
        if ($("#selectB").length > 0) {
            $("#selectB a").html($(this).text());
        } else {
            $(".select-result dl").append(copyThisB.attr("id", "selectB"));
        }

    });
    $("#select3 dd").click(function() {
        $(this).addClass("selected").siblings().removeClass("selected");

        var copyThisC = $(this).clone();
        //console.log(copyThisC.html());
        if ($("#selectC").length > 0) {
            $("#selectC a").html($(this).text());
        } else {
            $(".select-result dl").append(copyThisC.attr("id", "selectC"));
        }
        //}
    });

    $(".select dd").on("click", 
  function() { 
    if ($(".select-result dd").length > 1) { 
      $(".select-no").hide(); 
    } else { 
      $(".select-no").show(); 
    } 
    if(($(".select-result #selectA").text()).length==0){
      a=7;
    } if(($(".select-result #selectA").text())=="一周"){
      a=7;
    }
     if(($(".select-result #selectA").text())=="一个月"){
      a=30;
    }
     if(($(".select-result #selectA").text())=="三个月"){
      a=90;
    }
     if(($(".select-result #selectB").text()).length==0){
      b=0;
    }else b=$(".select-result #selectB").text();
     if(($(".select-result #selectC").text()).length==0){
      c=-1;
    }
    if (($(".select-result #selectC").text())=="五星"){c=5};
    if (($(".select-result #selectC").text())=="四星"){c=4};
    if (($(".select-result #selectC").text())=="三星"){c=3};
    if (($(".select-result #selectC").text())=="二星"){c=2};
    if (($(".select-result #selectC").text())=="一星"){c=1};
    //  console.log(a);
    // console.log(b);
    // console.log(c);
     $(".com_main:gt(0)").remove();
     $.get('comments',{
      time_range : a,
      platform : b,
      score : c,
     },function(data,status){
        //alert(2);
         //myObject=eval('('+data+')');//转化为数组
        // console.log(data);
        for(var i=0;i<data.length;i++)
        {
          // console.log(data[i]);
            create_one_comment_line(data[i]);
        }

    });
  });
});
function append_child(father,classname,text) {
    var childNode = document.createElement("td");
    childNode.setAttribute("class",classname);
    childNode.innerHTML = text;
    father.append(childNode);
}
//创建一个div包含5个子节点
function create_one_comment_line(oneData ) {
    var fatherNode = document.createElement("tr");
    fatherNode.setAttribute("class","com_main");
    append_child(fatherNode,"com_number",oneData.name);
    append_child(fatherNode,"com_content",oneData.content);
    append_child(fatherNode,"com_rate",oneData.score);
    append_child(fatherNode,"com_platorm",oneData.date);
    append_child(fatherNode,"com_time",oneData.platform);
    $('.com_main:last').after(fatherNode);
}
function fHl(o, flag, rndColor, url){

    var bgCor=fgCor='';
    if(rndColor){
        bgCor=fRndCor(10, 20);
        fgCor=fRndCor(230, 255);
    } else {
        bgCor='#f9ff09';
        fgCor='black';
    }
    var re=new RegExp(flag, 'i');
    for(var i=0; i<o.childNodes.length; i++){
        var o_=o.childNodes[i];
        var o_p=o_.parentNode;
        if(o_.nodeType==1) {
            fHl(o_, flag, rndColor, url);
        } else if (o_.nodeType==3) {
            if(!(o_p.nodeName=='A')){
                if(o_.data.search(re)==-1)continue;
                var temp=fEleA(o_.data, flag);
                o_p.replaceChild(temp, o_);
            }
        }
    }
    //------------------------------------------------
    function fEleA(text, flag){
        var style=' style="background-color:'+bgCor+';color:'+fgCor+';" '
        var o=document.createElement('span');
        var str='';
        var re=new RegExp('('+flag+')', 'gi');
        if(url){
            str=text.replace(re, '<a href="'+url+
                '$1"'+style+'>$1</a>'); //这里是给关键字加链接，红色的$1是指上面链接地址后的具体参数。
        } else {
            str=text.replace(re, '<span '+style+'>$1</span>'); //不加链接时显示
        }
        o.innerHTML=str;
        return o;
    }
    //------------------------------------------------
    function fRndCor(under, over){
        if(arguments.length==1){
            var over=under;
            under=0;
        }else if(arguments.length==0){
            var under=0;
            var over=255;
        }
        var r=fRandomBy(under, over).toString(16);
        r=padNum(r, r, 2);
        var g=fRandomBy(under, over).toString(16);
        g=padNum(g, g, 2);
        var b=fRandomBy(under, over).toString(16);
        b=padNum(b, b, 2);
        //defaultStatus=r+' '+g+' '+b
        return '#'+r+g+b;
        function fRandomBy(under, over){
            switch(arguments.length){
                case 1: return parseInt(Math.random()*under+1);
                case 2: return parseInt(Math.random()*(over-under+1) + under);
                default: return 0;
            }
        }
        function padNum(str, num, len){
            var temp=''
            for(var i=0; i<len;temp+=num, i++);
            return temp=(temp+=str).substr(temp.length-len);
        }
    }
}
//search button
function search_comment() {
    $.get('keyword_comments',{
        keyword:$("#search1").val()
    },function(data,status){
        $(".com_main:gt(0)").remove();
        console.log(data);
        console.log($("#search1").val());
        for(var i=0;i<data.length;i++)
        {
            var a=$("#search1").val();
            create_one_comment_line(data[i]);
            fHl(document.body, a);
        }
    });
};
