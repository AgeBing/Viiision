import pymysql.cursors
import jieba
import jieba.analyse

connection = pymysql.connect(host='115.159.202.238',
                             user='revuser',
                             port=3306,
                             password='revuser121',
                             db='rev',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)

content = ""
cursor = connection.cursor()
sql = "SELECT DISTINCT content FROM  meiyan_comment"
cursor.execute(sql)
results = cursor.fetchall()
print("read lens : "+ str(len(results)))
for one in results:
	content = content + one['content']
	# print(one['content'])

#自定义添加词
# jieba.add_word('石墨烯')
#载入自定义词典
jieba.load_userdict("userdict.txt")

# # 停用词
jieba.analyse.set_stop_words("stopwords.txt")

tags = jieba.analyse.extract_tags(content,topK=300,withWeight=True)
# allowPOS = ('n')

def write_all(tags):
    for tag in tags:
        print("%s\t\t  %f" % (tag[0],tag[1]))

    f = open("general_result/result_meiyan.txt","w+")

    for tag in tags:
        f.write("%s\t\t  %f" % (tag[0],tag[1]) + "\n")
    pass

def write_in_certain_class(name_of_class,tags):
    print("*********************************")
    print("    "+ name_of_class + "  class:")
    
    mw = open("classify/classify_" +  name_of_class +".txt",'r').read()
    mw = mw.split(' ')

    for tag in tags:
        if tag[0] in mw:
            print("%s\t\t  %f" % (tag[0],tag[1]))

    f = open("classify_result/" +  name_of_class + "_result_meiyan.txt","w+")

    for tag in tags:
        if tag[0] in mw:
            f.write("%s\t\t  %f" % (tag[0],tag[1]) + "\n")
    pass

write_in_certain_class("function",tags)
# write_in_certain_class("activity",tags)
# write_in_certain_class("problem",tags)
# write_in_certain_class("adj",tags)

# write_all(tags)






