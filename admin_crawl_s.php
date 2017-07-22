<?php
  session_start();
  $search = $_POST['search'];

// crawl.py
/*
$crawl ='
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
';*/

// table.py
/*
$table='from bs4 import BeautifulSoup
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
    writer.writerows(datasets)';*/

    //create crawl.py and table.py in servername
    /*
    $a = fopen("crawl.py","w");
    write($a, $crawl);
    close($a);
    b = fopen("table.py","w");
    write($b, $table);
    fclose($b);*/
  $output = $_SESSION['admin'];
  echo "<h4 style='font-weight:bold;'>Shodhganga articles you've searched are related to : $search</h4>" ;
  shell_exec("sudo rm ".$output.".csv");
  shell_exec("sudo > ".$output.".csv");
  echo '<h4>Download the data as csv file <a href="http://35.154.87.54/'.$output.'.csv" download="Thesis_Result.csv">Download</a></h4>';
  $command ='sudo python crawl.py   "'.$search.'" "'.$output.'.csv"';
  shell_exec($command);
  $row = 1;
  $k="_blank" ;
  echo '<div class="table-responsive">';
  $check = 0 ;
  if (($handle = fopen("".$output.".csv", "r")) !== FALSE)
  {
    echo '<table class="table table-striped table-hover">';
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
      {
        $check = 1;
        $num = count($data);
        if ($row == 1)
          echo '<thead><tr>';
        else
          echo '<tr>';
        for ($c=0; $c < $num; $c++)
        {
          if(empty($data[$c]))
            $value = "&nbsp;";
          else if($c==1&&$row!=1)
            $value="<a target='.$k' href=".$data[$c].">$data[$c]</a>";
          else
            $value = $data[$c];
          if ($row == 1)
            echo '<th>'.$value.'</th>';
          else
            echo '<td>'.$value.'</td>';
        }
        if ($row == 1)
          echo '</tr></thead><tbody>';
        else
          echo '</tr>';

        $row++;
      }
      echo '</tbody>';
    echo '</table>';
    fclose($handle);
  }
   echo '</div>';
   if($check==0)
    echo "<h3>No results found for - $search</h3>";  
?>
