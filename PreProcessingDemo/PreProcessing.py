import nltk
import string
import re
from nltk.stem.porter import PorterStemmer
from nltk.tokenize import word_tokenize
from nltk.stem import WordNetLemmatizer
import pProcess

str1 = "Hey, did you know that the summer break is coming? Amazing right !! It's only 5 more days !!"
print("Input1: "+ str1)
print("Lowercase: "+pProcess.lowercase(str1))
str2 = "I ate 3 apples and 4 bananas"
print("Input2: "+ str2)
print("Number Removal: "+ pProcess.remove_numbers(str2))
str3= "This is a sample sentence and we are going to remove the stopwords from this."
print("Input3: "+ str3)
print("Stopword Removal: ")
print( pProcess.remove_stopwords(str3))
str4 = 'data science uses scientific methods algorithms and many types of processes'
print("Input4: "+ str4)
print("Stemming: ")
print(pProcess.Stemming(str4))
print("Lemmatizing: ")
print(pProcess.lemmatize_word(str4))
str5 = 'This is a sample sentence and we are going to remove the stopwords from this.'
print("StopWord Removal: ")
print(pProcess.remove_stopwords(str5))
str6 = 'This  sentence  has   to  many  spaces  '
print("Input5: "+str6)
print("After Removing Spaces: "+ pProcess.remove_whitespace(str6))