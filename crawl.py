
from bs4 import BeautifulSoup
import httplib2

from BeautifulSoup import BeautifulSoup, SoupStrainer
import urllib
import csv
import sys



def drange(start, stop, step):
    while start < stop:
            yield start
            start += step



query = str(sys.argv[1])
opcsv = str(sys.argv[2])

query = query.replace(" ","+")
query += "&go="
print query
url = "http://shodhganga.inflibnet.ac.in/simple-search?query="
url += query
print url
ht = httplib2.Http()
status, response = ht.request(url)
print status
l = []
p = []
flink = " "
for link in BeautifulSoup(response, parseOnlyThese=SoupStrainer("a",href=True)):
    if link["href"].find("start")>1:
        t = link["href"].replace("/jspui","http://shodhganga.inflibnet.ac.in")
        l.append(t)
        pos = t[t.rfind("=",0,len(t))+1:]
        print pos
        p.append(pos)
        flink = t[:120]

p = [int(i) for i in p]
print max(p)
print url
print flink
no = []
list_url = []

list_url.append(url)
flink += "="
for i in drange(10, max(p)+10 , 10):
    fl = flink + str(i)
    list_url.append(fl)

from bs4 import BeautifulSoup


datasets = []
flag = 0
for link in list_url:
    web = urllib.urlopen(link)
    s = web.read()
    soup1 = BeautifulSoup(s,"lxml")
    table = soup1.find("table", attrs={"class":"table"})
    headings = [th.get_text() for th in table.find("tr").find_all("th")]
    if flag == 0:
        datasets.append(headings)
        flag = 1

    for row in table.find_all("tr")[1:]:
        r = row.find_all("td")
        title = r[0].get_text()
        turl = r[1].find("a").get("href")
        turl = turl.replace("/jspui","http://shodhganga.inflibnet.ac.in")
        researcher = r[2].get_text()
        guide = r[3].get_text()
        dataset = [title, turl, researcher, guide]
        datasets.append(dataset)

with open(opcsv, "wb") as f:
    writer = csv.writer(f)
    writer.writerows(datasets)

