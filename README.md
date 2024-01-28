# cape-server
Cape server. No web UI. No setup, No bullshit.

## Story
Originally meant for [Serene Minecraft Client](https://github.com/org/Serene-Minecraft-Client), some legacy code such as cape prices was left in but commented out. 

## Usage
Deploy to a PHP-enabled web server, create a key and add some users.<br>
The [auth-flow file](https://github.com/tunnull/cape-server/blob/main/auth-flow.php) contains some original auth keys. I suggest making your own, they can be any string. When sending requests, you'll need to encrypt the string with the password left in the same file.

# This is only half the cape experience.
You still need a mod to display these. I'll be releasing one soon.
