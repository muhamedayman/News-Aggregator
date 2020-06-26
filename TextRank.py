import numpy as np
import pandas as pd
from nltk.tokenize import sent_tokenize
from nltk.corpus import stopwords
from sklearn.metrics.pairwise import cosine_similarity
import networkx as nx

stop_words = stopwords.words('english')


def Text():
    readfile = pd.read_csv("textrankfile.csv", encoding='cp1252')
    readfile.head()
    readfile['article_text'][0]


    sentences = []
    for each_sentence in readfile['article_text']:
      sentences.append(sent_tokenize(each_sentence))



    sentences = [item for sublist in sentences for item in sublist]

    clean_sentences = pd.Series(sentences).str.replace("[^a-zA-Z]", " ")


    clean_sentences = [s.lower() for s in clean_sentences]



    def remove_stopwords(sen):
      sen_new = " ".join([word for word in sen if word not in stop_words])
      return sen_new


    clean_sentences = [remove_stopwords(each_word.split()) for each_word in clean_sentences]




    word_embeddings = {}
    file = open('glove.6B.100d.txt', encoding='utf-8')
    for line in file:
        values = line.split()
        word = values[0]
        coefs = np.asarray(values[1:], dtype='float32')
        word_embeddings[word] = coefs
    file.close()

    sentence_vectors = []
    for i in clean_sentences:
      if len(i) != 0:
        vector = sum([word_embeddings.get(wordInSentence, np.zeros((100,))) for wordInSentence in i.split()])/(len(i.split()))

      else:
        vector = np.zeros((100,))
      sentence_vectors.append(vector)


    sim_mat = np.zeros([len(sentences), len(sentences)])

    for i in range(len(sentences)):
      for j in range(len(sentences)):
        if i != j:
          sim_mat[i][j] = cosine_similarity(sentence_vectors[i].reshape(1,100), sentence_vectors[j].reshape(1,100))


    nx_graph = nx.from_numpy_array(sim_mat)

    scores = nx.pagerank(nx_graph)


    ranked_sentences = sorted(((scores[i],final_sentence) for i,final_sentence in enumerate(sentences)), reverse=True)

    # Extract top 10 sentences as the summary

    summary= ""
    for i in range(10):
        summary+= (ranked_sentences[i][1])



    #print(summary)



Text()