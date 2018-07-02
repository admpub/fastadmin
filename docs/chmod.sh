chmod -R 0777 ./application/admin/command/Install
chmod -R 0777 ./runtime
if [  -f "./application/database.php" ]; then
	
else
	touch ./application/database.php
fi
chmod 0777 ./application/database.php