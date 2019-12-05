#!/bin/sh

# php-fpm7 & #--nodaemonize &
# echo "phpfpm started"

# nginx & #-g 'daemon off;' &
# echo "nginx started"

# pids=`jobs -p`
# exitcode=0

# function terminate() {
    # trap "" CHLD
    # for pid in $pids; do
        # if ! kill -0 $pid 2>/dev/null; then
            # wait $pid
            # exitcode=$?
        # fi
    # done
    # kill $pids 2>/dev/null
# }

# trap terminate CHLD
# echo "Waiting trap"
# wait

# echo "Exiting"
# exit $exitcode

# Start CRON
crond -s /etc/periodic -c /etc/crontabs -L /dev/stderr -f -d &
status=$?
if [ $status -ne 0 ]; then
  echo "Failed to start CRON: $status"
  exit $status
else
  echo "CRON started"
fi

# Start NGINX
nginx -g 'daemon on;'
status=$?
if [ $status -ne 0 ]; then
  echo "Failed to start NGINX: $status"
  exit $status
else
  echo "NGINX started"
fi

#Start PHP-FPM7
php-fpm7
#status=$?
status=0
if [ $status -ne 0 ]; then
  echo "Failed to start PHP-FPM: $status"
  exit $status
else
  echo "PHP7-FPM started"
fi

# Service check loop
echo "SERVICE-STATUS-CHECK started"
while sleep 5; do
  ps aux | grep php-fpm7 | grep -q -v grep
  #PROCESS_PHPFPM_STATUS=$?
  PROCESS_PHPFPM_STATUS=0
  ps aux | grep nginx | grep -q -v grep
  PROCESS_NGINX_STATUS=$?
  ps aux | grep crond | grep -q -v grep
  PROCESS_CRON_STATUS=$?
  # If the greps above find anything, they exit with 0 status
  # If they are not both 0, then something is wrong
  if [ $PROCESS_PHPFPM_STATUS -ne 0 -o $PROCESS_NGINX_STATUS -ne 0 -o $PROCESS_CRON_STATUS -ne 0 ]; then
    echo "One of the processes has already exited."
    exit 1
  fi
done

echo "Exiting"
