#!/usr/bin/python
#print "LED prendido!!"
import RPi.GPIO as GPIO
import time

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

GPIO.setup(26, GPIO.OUT)
GPIO.setup(26, GPIO.OUT, initial=GPIO.HIGH)
time.sleep(12)
GPIO.output(26, False)
time.sleep(6)
GPIO.output(26, True)



