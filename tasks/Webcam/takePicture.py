#!/usr/bin/env python

from picamera import PiCamera
from time import sleep
import time

camera = PiCamera()
sleep(0.1)
camera.capture("/var/www/html/cloud/img_" + str(time.time()).replace('.','_') + ".jpg")