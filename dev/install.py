import os
import shutil

path_src = os.path.dirname(os.path.realpath(__file__))+"/../"
path_dest = "/srv/http/www/moodle-400-klaza/local/klaza/"

shutil.copytree(path_src, path_dest, dirs_exist_ok=True)