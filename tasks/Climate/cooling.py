import RPi.GPIO as GPIO
import time
import sys

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(35, GPIO.OUT) #venti
GPIO.setup(31, GPIO.OUT) # kek led

param = sys.argv[1]

if param == "on":
    GPIO.output(35,True)
    GPIO.output(31, True)
elif param == "off":
    GPIO.output(35, False)
    GPIO.output(31, False)
    GPIO.cleanup()
else:
    print("wrong param")
    GPIO.output(35, False)
    GPIO.output(31, False)
    GPIO.cleanup()