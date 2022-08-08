import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BOARD)
GPIO.setup(40, GPIO.OUT)
GPIO.setup(36, GPIO.OUT)
GPIO.setup(38, GPIO.OUT)

for i in range(10):
    GPIO.output(40, True)
    time.sleep(.3)
    GPIO.output(40, False)
    
    GPIO.output(36, True)
    time.sleep(.3)
    GPIO.output(36, False)
    
    GPIO.output(38, True)
    time.sleep(.3)
    GPIO.output(38, False)
    
GPIO.output(40, False)
GPIO.output(36, False)
GPIO.output(38, False)
GPIO.cleanup()