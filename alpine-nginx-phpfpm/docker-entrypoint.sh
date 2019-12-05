#!/bin/sh

#if [ "$1" = "--nginx-env" ]; then
#	echo -e "Exporting env vars to nginx...";
#	# export uppercase env vars
#	envvars=$(printenv | grep '[A-Z][_]') && for ev in $envvars;
#	do
#		ev_values=(${ev//=/ })
#		echo -e "adding env var ${ev_values[0]} => ${ev_values[1]}";
#		sed -i "/# APP/a fastcgi_param ${ev_values[0]} '${ev_values[1]}';" /etc/nginx/sites-enabled/default
#	done
#fi

#php -r 'echo "PHP works".PHP_EOL;'

# start supervisor
/usr/bin/supervisord -c /etc/supervisord.conf
