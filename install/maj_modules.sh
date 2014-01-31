#/bin/bash

# VARS
source='managers/app/local/'
dest='volunteers/app/local/'
modules=(events jobs profil volunteers)

# STMT
cd ..
for module in "${modules[@]}"; do
	# option overwrite ?
	rm -r $dest$module
	if cp -pR $source$module $dest$module; then
		echo 'Module' $module 'is copied.'
	else
		echo 'Module' $module 'copy has failed.'
	fi
done
