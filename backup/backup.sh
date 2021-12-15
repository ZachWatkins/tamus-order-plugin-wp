today=$(date +"%Y-%m-%d-%H%M%S")
install=$tamusorder
filename=$tamusorder
domain="ssh.wpengine.net"
ssh $install@$install.$domain "wp db export - " > backup/$filename-$today.sql
