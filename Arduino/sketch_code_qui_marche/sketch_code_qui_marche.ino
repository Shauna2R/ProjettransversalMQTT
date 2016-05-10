
#include <SPI.h>
#include <OneWire.h>
#include <Ethernet.h>
#include <PubSubClient.h>


// Networking
// MQTT server
// MQTT client - this node's IP address
byte ip[] = {10,31,4,3};
// MAC address
byte mac[] = {0x90,0xA2,0xDA,0x0E,0xFE,0xDC};





// Temperature (DS18B20) connected to pin 7
OneWire ds(7);


// MQTT message buffer
char message_buff[30];

// MQTT callback
void callback(char* topic, byte* payload, unsigned int length);

// MQTT PubSub client
EthernetClient ethClient;
PubSubClient client("messagesight.demos.ibm.com", 1883, callback, ethClient);

// MQTT callback function
void callback(char* topic, byte* payload, unsigned int length) {
  // Convert payload to string
  int i = 0;
  for(i=0; i<length; i++) {
    message_buff[i] = payload[i];
  }
  message_buff[i] = '\0';
  String msg = String(message_buff);

}


// Setup
void setup() {
  // Start the node at the IP address  
  Serial.begin(9600);
   if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    // no point in carrying on, so do nothing forevermore:
    for(;;)
      ;
  }
  // print your local IP address:
  Serial.println(Ethernet.localIP());
  

  // Start MQTT client, 
  // let the home know the office is up

  if (client.connect("office")) {
    client.publish("ingesupb2/groupe1","Group 1 UP");

  }
}


// Loop
void loop() {
  // Start MQTT client
  client.loop();
  // Read current temperature and 
  // publish it to /home/office/temperature/
  float celsius;
  char temp[10];
  celsius = readTemperature();
  dtostrf(celsius,2,2,temp);
  if (celsius && celsius != -300.00) {
    client.publish("ingesupb2/groupe1", temp);
  }
}


// Temperature reading from DS18B20 module
// Code is from OneWire library example
float readTemperature() {
  byte i;
  byte present = 0;
  byte type_s;
  byte data[12];
  byte addr[8];
  float celsius;
  // Can I haz an address?
  if ( !ds.search(addr)) {
    ds.reset_search();
    delay(250);
    return -300.00;
  }
  // Is CRC valid? 
  if (OneWire::crc8(addr, 7) != addr[7]) {
      return -200.00;
  }
  ds.reset();
  ds.select(addr);
  // Start conversion, with parasite power on at the end
  ds.write(0x44, 1);        
  delay(1000);
  // We might do a ds.depower() here, but the reset will take care of it.
  present = ds.reset();
  ds.select(addr);    
  // Read Scratchpad
  ds.write(0xBE);
  // Read 9 bytes
  for ( i = 0; i < 9; i++) {
    data[i] = ds.read();
  }
  // Convert the data to actual temperature
  // because the result is a 16 bit signed integer, it should
  // be stored to an "int16_t" type, which is always 16 bits
  // even when compiled on a 32 bit processor.
  int16_t raw = (data[1] << 8) | data[0];
  if (type_s) {
    raw = raw << 3; // 9 bit resolution default
    if (data[7] == 0x10) {
      // "count remain" gives full 12 bit resolution
      raw = (raw & 0xFFF0) + 12 - data[6];
    }
  } else {
    byte cfg = (data[4] & 0x60);
    // at lower res, the low bits are undefined, so let's zero them
    if (cfg == 0x00) raw = raw & ~7;  // 9 bit resolution, 93.75 ms
    else if (cfg == 0x20) raw = raw & ~3; // 10 bit res, 187.5 ms
    else if (cfg == 0x40) raw = raw & ~1; // 11 bit res, 375 ms
    //// default is 12 bit resolution, 750 ms conversion time
  }
  celsius = (float)raw / 16.0;
  return celsius;
}

