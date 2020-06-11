# -*- coding: utf-8 -*-
"""
Created on Mon Feb 17 18:18:00 2020

@author: ELCOT
"""

import cv2
#import numpy as np
import requests
import io
import json
import mysql.connector

capture = cv2.VideoCapture(0)
capture.set(3,640)
capture.set(4,480)

if capture.isOpened():
    ret , frame = capture.read()
    cv2.imwrite('image.jpg',frame)
    
load_image = cv2.imread('image.jpg')

"""while True:
    cv2.imshow('window' ,load_image)
    cv2.waitKey(0)"""
        
    
capture.release()
 
img = cv2.imread("image.jpg")
height, width, _ = img.shape

# Cutting image
# roi = img[0: height, 400: width]
roi = img

# Ocr
url_api = "https://api.ocr.space/parse/image"
_, compressedimage = cv2.imencode(".jpg", roi, [1, 90])
file_bytes = io.BytesIO(compressedimage)

result = requests.post(url_api,
              files = {"image.jpg": file_bytes},
              data = {"apikey": "helloworld",
                      "language": "eng"})

result = result.content.decode()
result = json.loads(result)

parsed_results = result.get("ParsedResults")[0]
text_detected = parsed_results.get("ParsedText")
print(text_detected)

mydb=mysql.connector.connect(
        host='localhost',
        user='root',
        password='vnirmala30!',
        database='Miniproject'
        )

cur=mydb.cursor()

s="INSERT INTO number_plate (plate_number,id) VALUES(%s,%s) "
b1=(text_detected,1)
cur.execute(s,b1)

mydb.commit()

cv2.imshow("roi", roi)
cv2.imshow("Img", img)
cv2.waitKey(0)
cv2.destroyAllWindows()