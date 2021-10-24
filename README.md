# Air Quality monitor 


#### View live air quality data at our [website](https://air-monitoring.000webhostapp.com/).


### Arduino setup for ESP32

1. Go to `Preferences/Aditional Boards Manager URLs`:
2. Paste the json link there
```
https://raw.githubusercontent.com/espressif/arduino-esp32/gh-pages/package_esp32_index.json
```
3. Install latest version of `esp32` boards from `Tools/Board:*/Boards Manager.../`

### Run Projects

1. Open `cubesat_prototype/cubesat_prototype.ino`
2. Go to `Tools/Manage Libraries../`
3. Install or have installed libraries
	//TODO BME680

4. Compile


### Select board and upload settings

- Board: 'ESP32-Wrower Module'
- Upload Speed: '921600'
- Flash Frequency: '80mHz'
- Flash Mode: 'QIO'
- Partition scheme: 'NO OTA (2MB APP/2MB SPIFFS)'
- Debug level: None
- Port: Select ESP32 Board COM/ttyUSB

> Recommended: Arduino v1.8.13+
