print("This output is from python file... \n")

import sys
import os
import json
import pandas as pd
import numpy as np
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity
import csv

df = pd.read_csv("ApiResults.csv")
features = ['title','snip']
#print(df.head())

def combine_features(row):
    return row['title'] + " " + row['snip']


for feature in features:
    df[feature] = df[feature].fillna('')

df["combined_features"] = df.apply(combine_features, axis=1)
cv = CountVectorizer()
#print(df["combined_features"])
count_matrix = cv.fit_transform(df["combined_features"])
#print(count_matrix)
cosine_sim = cosine_similarity(count_matrix)
#print(cosine_sim)


def get_title_from_index(index):
    return df[df.index == index]["title"].values[0]
def get_index_from_title(title):
    return df[df.title == title]["index"].values[0]
def get_link_from_index(index):
    return df[df.index == index]["link"].values[0]



news_user_likes = get_title_from_index(0)
news_index = get_index_from_title(news_user_likes)
similar_news =  list(enumerate(cosine_sim[news_index]))
print(similar_news)
sorted_similar_news = sorted(similar_news,key=lambda x:x[1],reverse=True)[1:]
print(sorted_similar_news)
i=0

f = open('RecommendResult.csv', 'a')
col = ['Title', 'Link']
writer = csv.DictWriter(f, fieldnames=col)
#writer.writeheader()


print("Top similar news to  "+news_user_likes+"  are:\n")
for element in sorted_similar_news:
    Title =get_title_from_index(element[0])
    Link = get_link_from_index(element[0])
    print(Title)
    print(Link)
    writer.writerow({'Title': Title, 'Link': Link})
    i=i+1
    if i>=2:
        break


