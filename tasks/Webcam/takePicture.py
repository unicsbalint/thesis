#!/usr/bin/env python

from picamera import PiCamera
from time import sleep
import time
from datetime import datetime

date = datetime.today().strftime('%Y-%m-%d %H-%M-%S')

camera = PiCamera()
sleep(0.1)
camera.capture("/var/www/html/cloud/img_" + date + ".jpg")