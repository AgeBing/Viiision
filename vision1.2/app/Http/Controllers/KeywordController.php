<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\JiebaAnalyse;
use DB;

class KeywordController extends Controller
{
	public function keyword_bytime()
	{

		@header("content-Type: text/html; charset=UTF-8");

		//连接数据库获取评论
		// $mysql = new mysqli('115.159.202.238','revuser','revuser121','rev',3306);
		// 可按照一定范围对数据进行筛选
		// $results = $mysql->query("SELECT * FROM `faceu_comment` WHERE `date` BETWEEN '2017-04-01'AND '2017-04-17' ORDER BY `date` DESC ");

		$results = DB::table('faceu_comment')
						->whereBetween('date',['2017-04-05','2017-04-17'])
						->orderBy('date','desc')
						->select('content')
						->get();
		//将评论添加到文本中
		//var_dump($results);
		$content="";
		foreach ($results  as  $res){
		    $content = $content.$res->content;
		}
		//var_dump($content);

		//载入分词器
		ini_set('memory_limit', '6000M');
		require_once "src/vendor/multi-array/MultiArray.php";
		require_once "src/vendor/multi-array/Factory/MultiArrayFactory.php";
		require_once "src/class/Jieba.php";
		require_once "src/class/Finalseg.php";
		require_once "src/class/JiebaAnalyse.php";
		
		Jieba::init(array('mode'=>'test','dict'=>'samll'));
		Finalseg::init();
		JiebaAnalyse::init();

		//用户自定义字典加载  user.txt
		Jieba::loadUserDict('C:/xampp/htdocs/vision/app/Http/Controllers/src/dict/user.txt');

		//期望获取词字典加载  test.txt
		$uesrContent = file_get_contents("C:/xampp/htdocs/vision/app/Http/Controllers/src/dict/test.txt", "r");
		$uesrContent = explode(',',$uesrContent);
		//通过 tf-idf算法 获取关键词
		$top_k = 200;
		$tags = JiebaAnalyse::extractTags($content, $top_k);
		$myNewKeywords = array();
		foreach (array_keys($tags)  as  $key)
		{
		//    echo $key.'  -  '.$tags[$key]."<br>";
		    if(in_array($key,$uesrContent))
		    {
		        $myNewKeywords[$key] = $tags[$key];
		    }
		}
		//输出 期望获取词 的各自权重
		var_dump($myNewKeywords);
	}	
}

?>
