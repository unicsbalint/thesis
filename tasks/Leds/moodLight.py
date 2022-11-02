import sys
import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
GPIO.setup(40, GPIO.OUT) # green
GPIO.setup(36, GPIO.OUT) # red
GPIO.setup(38, GPIO.OUT) # blue

blue = GPIO.PWM(40, 100)
red = GPIO.PWM(36, 100)
green = GPIO.PWM(38, 100)

# Megallitom oket ha epp mar lenne rajtuk jel
GPIO.output(40, False)
GPIO.output(36, False)
GPIO.output(38, False)

color = sys.argv[1]

if color == 'red':
    red.start(75)
elif color == 'green':
    green.start(75)
elif color == 'blue':
    blue.start(75)
elif color == 'purple':
    blue.start(85)
    red.start(75)
elif color == 'yellow':
    green.start(5)
    red.start(80)
elif color == "default":
    red.start(80)
    blue.start(80)
    green.start(80)


if color == 'turnoff':
    red.stop()
    green.stop()
    blue.stop()
    GPIO.output(40, False)
    GPIO.output(36, False)
    GPIO.output(38, False)
    GPIO.cleanup()

print("A lampa sikeresen kapcsolva "+color+" szinnel")