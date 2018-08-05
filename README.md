# NGINX-RTMP
Example Configs / WebView to show your RTMP Stream

Create your own Realtime / low latency Stream with a Addon 4 NGINX. I use Plyr as HTML5 Player & make a playback with FLV.js. NGINX will create a FLV HTTP Stream to make a working container 4 the HTML5 Player.

### Features
- Supported Debian / Ubuntu (x64 / ARM e.g. Raspberry Pi)
- Responsive & mobile friendly view
- Show current viewer / offline & online state
- FLV / RTMP low latency
- Show if exist last Record
- Easy to setup

#### Requirements
- Debian x64 or ARMx86
- PHP7.0 or 7.1 (Edit ```conf/conf/php.conf```)
- Lib's like XSL / GEO

#### Ports
1935 TCP & 8080 TCP (Port 80 with valid Server_name in ```conf/vhosts/rtmp``` configurable)

# Setup
Install our NGINX-RTMP Version on your Debian / Ubuntu Maschine.
Add in your ```sources.lst```

```deb [ trusted=yes ] http://apt.3dns.eu/debian ./ ```

After this execute ``` apt-get update && apt-get install nginx-rtmp ```


1. Put the RTMP Content in your exist NGINX Conf file / or use our fully ```nginx.conf``` in the ```conf``` folder.

```
rtmp {
        server {
               listen 1935;
	    	meta off;
	        include /usr/local/nginx/conf/vhosts_rtmp/*;
		}

 }
```
2. Copy the ```vhosts``` folders in your conf area ```/usr/local/nginx/conf```
3. Copy the ```www``` folder in your ```/home``` mount.
4. Execute ```pkill nginx; sleep 1; /usr/local/nginx/sbin/nginx``` start your Webserver.
5. Now put in example in OBS your Custom Server in the Streaming Settings Example: ```rtmp://IP/Domain/user``` & use the Stream Key like ```stream?key=test1337```

#### Notice: change your Key in the ```/home/www/rtmp/auth/user.php``` 

6. Open the URL ```http://IP/Domain:8080/user```

#### Optional: Recording could enable in in the RTMP Config ```vhost_rtmp/default``` uncomment the last two lines.

## Have Fun to share your Stream with your friends.


### Libraries
[Materialize](http://materializecss.com/), a CSS Framework based on material design

[Plyr](https://plyr.io), Video Player

[FLV.js](https://github.com/Bilibili/flv.js), HTML5 Player lib to make FLV over HTTP viewable

[RTMP-FLV](https://github.com/winshining/nginx-http-flv-module), nginx-http-flv-module has all features that nginx-rtmp-module provides.

[JQuery](https://jquery.com/)

[Font Awesome](http://fontawesome.io), Symbole & Icon's
