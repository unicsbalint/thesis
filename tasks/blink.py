import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BOARD)
GPIO.setup(40, GPIO.OUT) # green
GPIO.setup(36, GPIO.OUT) # red
GPIO.setup(38, GPIO.OUT) # blue

green = GPIO.PWM(40, 100)
red = GPIO.PWM(36, 100)
blue = GPIO.PWM(38, 100)


# for i in range(4):
#     green.start(5)
#     time.sleep(1)
#     green.stop()
#     time.sleep(1)


# green.start(1)
green.start(100)
# blue.start(60)
time.sleep(3)


red.stop()
green.stop()
blue.stop()

GPIO.output(40, False)
GPIO.output(36, False)
GPIO.output(38, False)
GPIO.cleanup()