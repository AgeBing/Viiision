import urllib.request
import json
import xlsxwriter
print("这是一个在线获取appstore里任意app的评论列表工具")
print("运行完毕后 将生成一个名为“app评论.xlsx”的文件")
#appid=1182886088
page=1;
appid=input("请输入应用id号:");
# appid = "414478124"
workbook = xlsxwriter.Workbook(appid+'的app评论.xlsx')
worksheet = workbook.add_worksheet()
format=workbook.add_format()
format.set_border(1)
format.set_border(1)
format_title = workbook.add_format()    
format_title.set_border(1)   
format_title.set_bg_color('#cccccc')
format_title.set_align('left')
format_title.set_bold()    
title=['昵称','标题','评论内容','等级']
worksheet.write_row('A1',title,format_title)
row=1
col=0
while page<6:
      
    myurl="https://itunes.apple.com/rss/customerreviews/page="+str(page)+"/id="+str(appid)+"/sortby=mostrecent/json?l=en&&cc=cn"
    response = urllib.request.urlopen(myurl)
    myjson = json.loads(response.read().decode())
    getTime = myjson["feed"]["updated"]["label"]
    print("正在生成数据文件，请稍后......"+str(page*10)+"%")
    print("获取时间为"+str(getTime))
    del(myjson["feed"]["entry"][0])
    # print(myjson["feed"]["entry"][0]['im:rating'])

    for i in myjson["feed"]["entry"]:
        worksheet.write(row,col,i["author"]["name"]["label"],format)
        row=row+1
    row=1+(page-1)*50
    for i in myjson["feed"]["entry"]:
        worksheet.write(row,col+1,i["title"]["label"],format)
        row=row+1
    row=1+(page-1)*50
    for i in myjson["feed"]["entry"]:
        worksheet.write(row,col+2,i["content"]["label"],format)
        row=row+1
    row=1+(page-1)*50
    for i in myjson["feed"]["entry"]:
        worksheet.write(row,col+3,i["im:rating"]["label"]+" "+getTime,format)
        row=row+1
    page=page+1
    row=(page-1)*50+1
print("生成完毕，请查阅相关文件")
workbook.close()
