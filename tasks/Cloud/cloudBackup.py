# Ez a a program biztonsagi mentest keszit a felohatarhelyben tarolt adatainkrol a cloud_backups mappaba
from datetime import datetime
import shutil
date = datetime.today().strftime('%Y-%m-%d %H-%M')
shutil.make_archive('/var/www/html/cloud_backups/backup '+date, 'zip', '/var/www/html/cloud')