rm -r /root/sources/* 
cd /root
mkdir /root/sources
wget -q https://nginx.org/download/nginx-1.15.2.tar.gz -O /root/sources/nginx.tar.gz
wget -q https://github.com/winshining/nginx-http-flv-module/archive/master.zip -O /root/sources/rtmp.zip
wget -q https://www.openssl.org/source/openssl-1.0.2j.tar.gz -O /root/sources/openssl.tar.gz
tar xfz /root/sources/nginx.tar.gz -C /root/sources
tar xfz /root/sources/openssl.tar.gz -C /root/sources
unzip -o /root/sources/rtmp.zip -d /root/sources
cd /root/sources/nginx-1.*
./configure --add-module=/root/sources/nginx-http-flv-module-master --with-http_ssl_module --with-http_xslt_module --with-http_realip_module --without-http_gzip_module --with-openssl=/root/sources/openssl-1.0.2j
make -j16
make install
checkinstall