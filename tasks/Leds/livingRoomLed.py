import RPi.GPIO as GPIO
import time
import sys

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(32, GPIO.OUT) #12 
param = sys.argv[1]

if param == "on":
    GPIO.output(32,True)
elif param == "off":
    GPIO.output(32, False)
    GPIO.cleanup()
else:
    print("wrong param")
    GPIO.output(32, False)
    GPIO.cleanup()