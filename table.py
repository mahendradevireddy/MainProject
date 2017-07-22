from bs4 import BeautifulSoup
import urllib
import csv

link = "http://shodhganga.inflibnet.ac.in/simple-search?query=speech+recognition&go="
web = urllib.urlopen(link)
s = web.read()

print s
soup = BeautifulSoup(s,"lxml")
table = soup.find("table", attrs={"class":"table"})

headings = [th.get_text() for th in table.find("tr").find_all("th")]

datasets = []
datasets.append(headings)
for row in table.find_all("tr")[1:]:
    r = row.find_all("td")
    title = r[0].get_text()
    turl = r[1].find("a").get("href")
    turl = turl.replace("/jspui","http://shodhganga.inflibnet.ac.in")
    researcher = r[2].get_text()
    guide = r[3].get_text()
    dataset = [title, turl, researcher, guide]
    datasets.append(dataset)

with open("output.csv", "wb") as f:
    writer = csv.writer(f)
    writer.writerows(datasets)