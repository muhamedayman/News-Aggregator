#!C:\Python37-32\python.exe
print("Content-type:text/html\r\n\r\n")
print("<?php include 'includee.html';?>")
import sys
import cgi
import requests
import httplib2
from bs4 import BeautifulSoup,SoupStrainer
import xlsxwriter
import os
import pandas as pd
import itertools
import csv
import array
import numpy as np
import re
import sklearn



form = cgi.FieldStorage()
searchterm = form.getvalue('searchbox')
word = "petrol price"
print(searchterm)



class Analysis:
    def __init__(self,term):
        self.term = term
        self.url='https://www.startpage.com/search?q='+self.term


    def run(self):
        res = requests.get(self.url)
        soup = BeautifulSoup(res.text, 'html.parser')

        http = httplib2.Http()
        status, response = http.request(self.url)


        #-----------------getting urls -----------------
        links = []
        for link in BeautifulSoup(response, parse_only=SoupStrainer('a', {"class": "w-gl__result-url"}),features="html.parser"):
            if link.has_attr('href'):

                #print(link['href'])
                links.append(link['href'])
        #print(links)

        print("run end")
        return links

    def getText(self,retrievedText=[]):
        print("beginning of getText Function ")
        counterRetrievedText=0
        #print(retrievedText)
        for x in retrievedText:

            self.url2=x
            #print(self.url2)
            res2 = requests.get(self.url2)
            soup2 = BeautifulSoup(res2.text, 'html.parser')
        #for loop????
            if "who" in self.url2:
                for div in soup2.find_all('div',{"class":"sf_colsOut tabContent"}):
                    print(div.text)
                    #with open ('articles.csv','w',newline='')as f:
                        #thewriter=csv.writer(f)
                        #thewriter.writerow([div.text])

                    counterRetrievedText+=1

            elif"bbc" in self.url2:
                for div in soup2.find_all('div', {"class": "story-body__inner"}):
                    for parg in soup2.find_all('p'):
                        print(parg.text)
                        #with open('articles.csv', 'w', newline='')as f:
                            #thewriter = csv.writer(f)
                            #thewriter.writerow([div.text])
                        counterRetrievedText += 1

            else:
                print("Those Sources are not supported.")
a=Analysis(searchterm.replace(" ", ""))
a.run()
a.getText(a.run())

print("<?php include 'footer.html';?>")


