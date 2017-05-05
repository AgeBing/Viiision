#使用urllib2和beautifulsoup4两个哭
import urllib.request
from bs4 import BeautifulSoup
import xlsxwriter
#来源地址     storeUrl = [豌豆荚、App store 、华为市场、]
#评论者名称   comName  
#评论日期		comDate 
#评论内容		comContent
#评论等级		comRate
  
##下载趋势
##评论地区  海外市场
##不同版本
# 微信C5683 
# appid=input("请输入应用id号:");
appid = 'C5683'
workbook = xlsxwriter.Workbook(appid +'的华为市场的app评论.xlsx')
worksheet = workbook.add_worksheet()
format=workbook.add_format()
format.set_border(1)
format.set_border(1)
format_title = workbook.add_format()    
format_title.set_border(1)   
format_title.set_bg_color('#cccccc')
format_title.set_align('left')
format_title.set_bold()    
title=['昵称','评论内容','评论时间','等级']
worksheet.write_row('A1',title,format_title)
row=1
col=0


page = 1
comCount = 0
while page < 20:   
	url = 'http://appstore.huawei.com/comment/commentAction.action?appId=C5683&_page=' + str(page)  #apps/后面的是应用名称/page显示的是页数
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
		comCount = comCount + 1
		worksheet.write(row,col,comName,format)
		worksheet.write(row,col+1,comContent,format)
		worksheet.write(row,col+2,comTime,format)
		worksheet.write(row,col+3,comRate,format)
		row = row + 1

	page = page + 1
	print("当前页数 : " + str(page))
	pass
print("本次获取评论数 : " + str(comCount))
workbook.close()