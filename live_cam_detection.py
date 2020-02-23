import cv2

video = cv2.VideoCapture(0)
while True:
    check, frame = video.read() 
    key = cv2.waitKey(5)
    if(key == ord('q')):
        break
    face_cascade = cv2.CascadeClassifier(r'C:\Users\NITRO 5\Desktop\pyhton\img processing\classifier\haarcascade_frontalface_default.xml')
    faces = face_cascade.detectMultiScale(frame,scaleFactor = 1.25,minNeighbors = 10)
    for x, y, w, h in faces:
        img = cv2.rectangle(frame, (x,y), (x+w, y+w), (0,255,0), 3)
    cv2.imshow("videos's first frame ", frame)
cv2.destroyAllWindows()
video.release()