import pymysql.cursors
import urllib.request
from bs4 import BeautifulSoup

# Connect to the database
connection = pymysql.connect(host='115.159.202.238',
                             user='revuser',
                             port=3306,
                             password='revuser121',
                             db='rev',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)

page = 1000
comCount = 0
while page < 2330:   
    url = 'http://appstore.huawei.com/comment/commentAction.action?appId=C178302&_page=' + str(page)  #apps/后面的是应用名称/page显示的是页数
    user_agent = 'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT)'
    headers = { 'User-Agent' : user_agent }
    try :
        request = urllib.request.Request(url,headers=headers)
        response =  urllib.request.urlopen(request)
        content = response.read()
        #查找或显示爬取网络的错误原因
    except(urllib.request.URLError,e):
        if hasattr(e,"code"):
            print (e.code)
        if hasattr(e,"reason"):
            print (e.reason)

    soup = BeautifulSoup(content,"html.parser") #html.parser是网站解析器
    for child in soup.find_all('div',"comment"):#遍历寻找<p class="">的tag元素
        comContent = child.find_all('p')[0].get_text("|", strip=True)
        span = child.find_all('span')
        comName = span[1].string
        comTime = span[4].string
        comRate = span[0]['class'][0][6:8]
        print(comName + "  "+comTime+" "+comContent +" "+comRate)

        with connection.cursor() as cursor:
        # Create a new record
            sql = "INSERT INTO `meiyan` (`name`,`content`,`rate`, `time`) VALUES (%s,%s,%s,%s)"
            cursor.execute(sql, (comName , comContent , comRate , comTime))

         # connection is not autocommit by default. So you must commit to save
        # your changes.
            connection.commit()
        comCount = comCount + 1
    page = page + 1
    print("当前页数 : " + str(page))
    pass
print("本次获取评论数 : " + str(comCount))


