import requests
import httplib2
from bs4 import BeautifulSoup,SoupStrainer
import csv
import io
import sys
from sys import argv


argv.append(sys.argv[1])
#print(argv[1])

class Analysis:
    def __init__(self,term):
        self.term = term
        self.url='https://www.startpage.com/search?q='+self.term


    def run(self):
        res = requests.get(self.url)
        #soup = BeautifulSoup(res.text, 'html.parser')

        http = httplib2.Http()
        status, response = http.request(self.url)



        #-----------------getting urls 3-----------------
        links = []
        for link in BeautifulSoup(response, parse_only=SoupStrainer('a', {"class": "w-gl__result-url"}),features="html.parser"):
            if link.has_attr('href'):

                links.append(link['href'])

        #print(links)



        #print("run end")

        return links

    def getText(self,retrievedText=[]):
        #print("beginning of gettext")
        counterRetrievedText=0
        #print(retrievedText)
        supported_articles=[]
        for x in retrievedText:


            self.url2=x
            #print(self.url2)
            try:
                res2 = requests.get(self.url2, allow_redirects=False)
            except requests.ConnectionError:
                print("")
            soup2 = BeautifulSoup(res2.text, 'html.parser')
            textconcat = " "

            if "who" in self.url2:
                for div in soup2.find_all('div',{"class":"sf_colsOut tabContent"}):
                    #print(div.text)
                    list=[div.text ,self.url2]
                    supported_articles.append(list)
                    counterRetrievedText+=1

            elif"bbc" in self.url2:
                for div in soup2.find_all('div', {"class": "story-body__inner"}):
                    for idx ,parg in enumerate(soup2.find_all('p')):
                        if(idx>=12):
                            #print(parg.text)

                            textconcat+=" "+parg.text
                            counterRetrievedText += 1

                    list = [textconcat, self.url2]
                    supported_articles.append(list)

        #print(supported_articles)
        self.writeExcel(supported_articles)
    def writeExcel(self,Extracted_articles=[]):
        fieldnames = ['article_text', 'source']
        with io.open('textrankfile.csv', mode='w', newline='', encoding="utf-8") as csv_file:
            writer = csv.DictWriter(csv_file, fieldnames=fieldnames)
            writer.writeheader()
            for articleText, articleLink in (Extracted_articles):
                writer.writerow({'article_text': articleText, 'source': articleLink})

        import TextRank
        TextRank.Text()


a = Analysis(argv[1].replace(" ", ""))
a.run()
a.getText(a.run())