import jieba
import pymysql.cursors
import operator
# jieba.add_word('太太太太太太')


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
print(len(results))
for one in results:
	content = content + one['content']

seg_list = jieba.cut(content,cut_all=True) 

# 出现频率最高的100个单词
from collections import Counter
word_counts = Counter(seg_list)
top_words = word_counts.most_common(200)


#停用次
stopwords = []
sw = open('stopwords.txt','r').read()
for one in sw:
    stopwords.append(one)

# 删除 ('', 9449) 项
top_words.remove(top_words[0])

for one in top_words:
	# print(one[0] + "   "+ str(one[1]))
	if(one[0] not in stopwords):
		print(one)



# f = open("fenci_result.txt","w+")
# for item in top_words:
#     if(item[0] not in stopwords):
#         f.write(item[0]+"  "+str(item[1])+"\n")

# f.close()
