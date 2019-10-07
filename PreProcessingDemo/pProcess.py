import nltk
import string
import re
from nltk.corpus import stopwords
from nltk.stem.porter import PorterStemmer
from nltk.tokenize import word_tokenize
from nltk.stem import WordNetLemmatizer



def lowercase(text):
    return text.lower()                           #Converting from Uppercase to Lowercase


def remove_numbers(text):
    result = re.sub(r'\d+', '', text)                     #removing numbers
    return result



def Stemming(text):
    stemmer = PorterStemmer()
    word_tokens = word_tokenize(text)
    stems = [stemmer.stem(word) for word in word_tokens]                      #Converting the word to its orginal
    return stems



def lemmatize_word(text):
    lemmatizer = WordNetLemmatizer()
    word_tokens = word_tokenize(text)
    lemmas = [lemmatizer.lemmatize(word, pos='v') for word in word_tokens]         #Getting Word tokens
    return lemmas


def remove_stopwords(text):
    stop_words = set(stopwords.words("english"))
    word_tokens = word_tokenize(text)
    filtered_text = [word for word in word_tokens if word not in stop_words]      #Removing Stopwords
    return filtered_text


def remove_whitespace(text):
    return " ".join(text.split())                    #Removing Spaces




