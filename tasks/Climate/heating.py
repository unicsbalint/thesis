import RPi.GPIO as GPIO
import time
import sys

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(35, GPIO.OUT) #venti
GPIO.setup(29, GPIO.OUT) # piros led

param = sys.argv[1]

if param == "on":
    GPIO.output(35,True)
    GPIO.output(29, True)
elif param == "off":
    GPIO.output(35, False)
    GPIO.output(29, False)
    GPIO.cleanup()
else:
    print("wrong param")
    GPIO.output(35, False)
    GPIO.output(29, False)
    GPIO.cleanup()