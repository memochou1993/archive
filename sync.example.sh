#!/bin/bash

rsync -av --delete-after files root@0.0.0.0:/var/www/archive/public
