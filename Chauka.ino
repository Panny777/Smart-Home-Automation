#include <ArduinoJson.h>

#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>

StaticJsonDocument<200> jsonBuffer;

// WiFi parameters
//const char* ssid = "design studio1";
//const char* password = "12345678";

const char* ssid = "HAWA";
const char* password = "HAWA2020";

//Naming the HTTPClient as http
HTTPClient http;

//Naming the WifiClient as client
WiFiClient client;

int bulb1 = D5;
int bulb2 = D4;

//Host to get data
const char* host = "http://192.168.1.37/chauka/Getstatus.php?user_id=muniru.panya13@gmail.com";


void setup() {
  pinMode(bulb1, OUTPUT);
  pinMode(bulb2, OUTPUT);

  //  Initiate Serial Communication at Baud rate of 9600
  Serial.begin(9600);

  Serial.print("Connecting to ");
  Serial.println(ssid);

  //  Begin Connecting to Wifi with the given ssid and password
  WiFi.begin(ssid, password);

  Serial.println("Connecting");

  //  Checking wether the Device is connected to Network
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  delay(3000);
  Serial.println("WiFi connected");
  Serial.println("IP address: ");

  //  Printing the Local IP of the Device
  Serial.println(WiFi.localIP());
}


void loop() {
  http.begin(client, host);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  int httpCode = http.GET();
  String payload = http.getString(); // get data from webhost continously

  DeserializationError error = deserializeJson(jsonBuffer, payload);

  // Test if parsing succeeds.
  if (error) {
    Serial.print(F("deserializeJson() failed: "));
    Serial.println(error.f_str());
    return;
  }

  //  Fetching data
  int bulb1Status = jsonBuffer["bulb1_status"];
  int bulb2Status = jsonBuffer["bulb2_status"];


  if (bulb1Status == 1) // if data == 1 -> LED ON
  {
    digitalWrite(bulb1, HIGH);
  }
  else if (bulb1Status == 0) // if data == 0 -> LED OFF
  {
    digitalWrite(bulb1, LOW);
  }

  if (bulb2Status == 1) // if data == 1 -> LED ON
  {
    digitalWrite(bulb2, HIGH);
  }
  else if (bulb2Status == 0) // if data == 0 -> LED OFF
  {
    digitalWrite(bulb2, LOW);
  }

  //bulb1 Status
  Serial.print("Bulb1 Status: ");
  Serial.println(bulb1Status);

  //Bulb2 Status
  Serial.println("");
  Serial.print("Bulb2 Status: ");
  Serial.println(bulb2Status);

  delay(500);
  http.end();
}
