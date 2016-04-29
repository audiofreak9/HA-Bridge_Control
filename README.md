# HA-Bridge_Control
Phone, Tablet &amp; Desktop PHP IoT device control

Code written in PHP that allows control of all configured <a href="https://github.com/bwssytems/ha-bridge/releases">ha-bridge</a> devices by @bwssytems with a phone, tablet or desktop.  It uses twitter bootstrap for mobile compatibility and fluidity.

<h3>Prerequisite components</h3>
<ul>
  <li>Linux box, preferably a Raspberry Pi</li>
  <li>Apache installed</li>
  <li>PHP installed</li>
  <li>@bwssytems <a href="https://github.com/bwssytems/ha-bridge/releases">ha-bridge</a> >= v1.1.0</li>
</ul>

<h3>Installation</h3>
On an updated functioning Linux box install Apache and PHP5:

`$ sudo apt-get install apache2 -y`

`$ sudo apt-get install php5 libapache2-mod-php5 -y`

Download, configure and run the ha-bridge as per @bwssystems' <a href="https://github.com/bwssytems/ha-bridge">README</a> 

To install in an empty directory: 

`$ cd /var/www/html/`

`$ sudo mkdir control`

`$ cd control`

`$ sudo git clone https://github.com/audiofreak9/HA-Bridge_Control .`

<h3>Usage</h3>
Usage in any browser on your device of choice (Phone, Tablet &amp; Desktop):

`http://<host IP>/control`

> TIP: You can save the page to your homescreen on mobile devices and it will function like an app.
