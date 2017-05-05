import pymysql.cursors
import urllib.request
import json
# import xlsxwriter
import datetime

def get_downloadCount_to_mysql(appname,startDate,endDate):
    # Connect to the database
    connection = pymysql.connect(host='115.159.202.238',
                                 user='revuser',
                                 port=3306,
                                 password='revuser121',
                                 db='rev',
                                 charset='utf8mb4',
                                 cursorclass=pymysql.cursors.DictCursor)
    
    def set_download_count(download,date,appname,platform):
        with connection.cursor() as cursor:
            sql = "UPDATE app_info  SET app_download_count = %s WHERE app_name = %s AND app_platform = %s AND  app_date = %s"
            cursor.execute(sql, (download,appname,platform,date))
            connection.commit()
        pass

    app_auths = {
        'faceu' : '368dXI-e3-rNRWpCvx1jf8k9XLKEgwkmz9MsTjtoiicP9Q',
        'meiyan' : '30f24CfT1cTws_018tbvoMktVVqmgdGuj3TfEGTvnGEbMA'
    }     
    categoryList = ['appstore','360','baidu','huawei','wdj','vivo','oppo','meizu']
    
    categoryDowdloadList = {
        '360'  : 0,
        'baidu': 1,
        'wdj'  : 2,
        'huawei':5,
        'meizu': 6,
        'oppo' : 7,
        'vivo' : 8
    }
    # for i in date_range(start, end):        
    # startDate =  i.strftime('%Y-%m-%d')
    # endDate =    (i  + datetime.timedelta(days = 1)).strftime('%Y-%m-%d')
    days = 1
    # print(startDate)
    # print(endDate)
    myurl = "https://aso114.com/android/json-alldownrank.html?sdate="+str(startDate)+"&edate="+str(endDate)+"&ddate="+str(days)+"&app_auth="+str(app_auths[appname])
    response = urllib.request.urlopen(myurl)
    myjson = json.loads(response.read().decode())
    for onePlatform in categoryList[1:]:
        getDownload = myjson['data']['list'][categoryDowdloadList[onePlatform]]["data"][0][1]
        set_download_count(getDownload,startDate,appname,onePlatform)
        # print(str(getDownload)+" "+startDate+" "+appname+" "+onePlatform)

def get_info_to_mysql(appname,startDate,endDate):
    # Connect to the database
    connection = pymysql.connect(host='115.159.202.238',
                                 user='revuser',
                                 port=3306,
                                 password='revuser121',
                                 db='rev',
                                 charset='utf8mb4',
                                 cursorclass=pymysql.cursors.DictCursor)
    
    tablename = 'app_info'
    gameids = {
        'wechat' : '109',
        'faceu' : '7571',
        'ins' :'1762',
        'meiyan' : '4098'
    }     
    appid = gameids[appname]
    # print(appid)
    
    
    # categoryId : { 9 : 'App Store',
    #                8 : '豌豆荚',
    #                17: 'oppo应用商店'
    #                18: 'vivo应用商店'}
    catename = 'appstore'
    categoryids = {
        'appstore' : '9',
        'oppo' : '17',
        'wdj' :'8',
        'vivo' : '18',
        'baidu':'10',
        '360':'12',
        'meizu':'19'
    } 
    
    
    
    page = 0
    
    comCount = 0
    maxPage = 100
    
    # print(startDate)
    # print(endDate)
    for onekey in categoryids.keys():
        categoryId = categoryids[onekey]
        myurl = "http://wetest.qq.com/bee/DataSearchAjax?startDate="+str(startDate)+"+00%3A00%3A00&endDate="+str(endDate)+"+23%3A29%3A00&keywords=&entityId=0&gameId="+str(appid)+"&&nextPage="+str(page)+"&rank=0&isTitle=1&orderBy=2&categoryId="+str(categoryId)+"&filterRubbish=1&or_and=and"  
        response = urllib.request.urlopen(myurl)
        myjson = json.loads(response.read().decode())
        maxPage = myjson['ret']['pages']
        totalcomment = myjson['ret']['total']
        with connection.cursor() as cursor:
            sql = "INSERT INTO " + tablename + " (`app_name`,`app_platform`, `app_comment_count`,`app_date`) VALUES (%s,%s,%s,%s)"
            cursor.execute(sql, (appname,onekey,totalcomment,startDate))
            connection.commit()
        # print(totalcomment)
        

today = datetime.datetime.today() #今天
endDate  = today.strftime('%Y-%m-%d')
beforeDay = today - datetime.timedelta(days = 1)
startDate = beforeDay.strftime('%Y-%m-%d') #昨天

#更新昨天一天的数据
# print("*********** Info ************")
get_info_to_mysql('meiyan',startDate,endDate)
# print("*********** download ************")
get_downloadCount_to_mysql('meiyan',startDate,endDate)

get_info_to_mysql('faceu',startDate,endDate)
# print("*********** download ************")
get_downloadCount_to_mysql('faceu',startDate,endDate)

