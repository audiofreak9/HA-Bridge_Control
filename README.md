# HA-Bridge_Control
Phone, Tablet &amp; Desktop PHP IoT device control

Code written in PHP that allows control of all configured <a href="https://github.com/bwssytems/ha-bridge/releases">ha-bridge</a> devices with a phone, tablet or desktop.  

Save the code as index.php on the Apache server in the /var/www/html/ folder. It uses twitter bootstrap for mobile compatibility and fluidity. I’ve saved the Twitter bootstrap responsive and theme CSS files locally to the RPi.  The code gets your configured heyu devices and displays their state and gives control of each.  It also gets your configured scenes and displays them as well. 

<h3>Prerequisite components</h3>
<ul>
  <li>Linux box, preferably a Raspberry Pi</li>
  <li>Apache installed</li>
  <li>PHP installed</li>
  <li><a href="https://github.com/bwssytems/ha-bridge/releases">ha-bridge</a> >= v1.1.0</li>
</ul>

To install in an empty directory: 

`$ cd /var/www/html/`

`$ mkdir control`

`$ cd /control/`

`$ sudo git clone https://github.com/audiofreak9/HA-Bridge_Control .`
