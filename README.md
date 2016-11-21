# HA-Bridge_Control
Phone, Tablet &amp; Desktop <a href="https://github.com/bwssytems/ha-bridge">HA-Bridge</a> device control.

Code written in PHP that allows control of all @bwssytems <a href="https://github.com/bwssytems/ha-bridge#ha-bridge-usage-and-configuration">ha-bridge</a> devices, for use with a phone, tablet or desktop.  It uses twitter bootstrap for mobile compatibility and fluidity.

![alt tag](http://coreyswrite.com/wp-content/uploads/2016/11/HABridgeControl.png)

<h3>Prerequisite components</h3>
* Linux box, preferably a Raspberry Pi
* Apache
* PHP
* @bwssytems <a href="https://github.com/bwssytems/ha-bridge/releases">ha-bridge</a> >= v1.1.0


<h3>Installation</h3>
1. On an updated functioning Linux box install Apache and PHP5:
  * `$ sudo apt-get install apache2 -y`
  * `$ sudo apt-get install php5 libapache2-mod-php5 -y`
2. The ha-bridge now uses port 80 by default, change Apache default port:
  * `sudo nano /etc/apache2/ports.conf` changing `Listen 80` to `Listen 8080`, save and exit `CTRL + X` follow save promt
  * Restart Apache `sudo /etc/init.d/apache2 reload`
3. Download, configure and run the ha-bridge as per @bwssystems' <a href="https://github.com/bwssytems/ha-bridge">README</a> 
4. Install the HA-Brige Control in an empty directory:
  * `$ cd /var/www/html/`
  * `$ sudo mkdir control`
  * `$ cd control`
  * `$ sudo git clone https://github.com/audiofreak9/HA-Bridge_Control .`
5. Set up and configuration:
  * `$ sudo nano config.php`
  * The DEFAULT ha-bridge IP is `$_SERVER['SERVER_NAME'];`.  This will auto-detect, otherwise set according to your ha-bridge installation IP
  * The DEFAULT ha-bridge port is 80, set according to your installation
  * The DEFAULT username is 'username', set according to your preference
  * The DEFAULT password is 'password', set according to your preference


<h3>Usage</h3>
In any browser on your device of choice (Phone, Tablet &amp; Desktop):

* `http://<host IP>:<Apache port>/control`

> TIP: You can save the page to your homescreen on mobile devices and it will function like an app.
