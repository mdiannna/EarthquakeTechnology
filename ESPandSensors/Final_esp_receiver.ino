#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <SoftwareSerial.h>
SoftwareSerial jsHack(13, 15, false, 128);

const int pingPin = 4; //esp pin D2

const char* ssid = "TechHub#1";
const char* password = "t3ch!#Hub";
int c = 0, k = 7;
void setup() {
  Serial.begin(115200);
  jsHack.begin(115200);
  // We start by connecting to a WiFi network
  WiFi.begin(ssid, password);
  //Serial.print("Wait for WiFi... ");
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    //Serial.print("Connecting..");
  }
  delay(50);
 /* Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());*/
  
  //server stuff
  const uint16_t port = 443;
  const char * host = "http://fathomless-citadel-40087.herokuapp.com"; // ip or dns
  /*Serial.print("connecting to ");
  Serial.println(host);*/
  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  if (!client.connect(host, port)) {
    /*Serial.println("connection failed");
    Serial.println("wait 5 sec...");*/
    delay(5000);
    return;
  }
  else{
   // Serial.println("connected");
  }
}

void loop() {
  
  //PING stuff
  // establish variables for duration of the ping, and the distance result
  // in inches and centimeters:
  long duration, inches, cm;

  // The PING))) is triggered by a HIGH pulse of 2 or more microseconds.
  // Give a short LOW pulse beforehand to ensure a clean HIGH pulse:
  pinMode(pingPin, OUTPUT);
  digitalWrite(pingPin, LOW);
  delayMicroseconds(2);
  digitalWrite(pingPin, HIGH);
  delayMicroseconds(5);
  digitalWrite(pingPin, LOW);

  // The same pin is used to read the signal from the PING))): a HIGH pulse
  // whose duration is the time (in microseconds) from the sending of the ping
  // to the reception of its echo off of an object.
  pinMode(pingPin, INPUT);
  duration = pulseIn(pingPin, HIGH);

  // convert the time into a distance
  //inches = microsecondsToInches(duration); we don't need inches
  cm = microsecondsToCentimeters(duration);
 // Serial.print(cm);
  //Serial.print("cm");
  //Serial.println();
    //server stuff
  HTTPClient http;
  String postData = String("http://fathomless-citadel-40087.herokuapp.com/device/1") + String("?data=") + String(cm);
  //String postData = String("http://fathomless-citadel-40087.herokuapp.com/get") + String("?data=") + String(cm);
  http.begin(postData);  //Specify request destination
  int httpCode = http.GET(); 
  //Serial.println(httpCode);
  int b = rx();
  Serial.print("pitch=");
  Serial.println(b);
  String postPitch = String("http://fathomless-citadel-40087.herokuapp.com/device/2") + String("?data=") + String(b);
  http.begin(postPitch);
  int httpCode1 = http.GET();
  
  if (c >400){
    c = 0;
  }

  k += 5;
  c = k + b;
  
  String postYell = String("http://fathomless-citadel-40087.herokuapp.com/device/3") + String("?data=") + String(c);
  http.begin(postYell);
  int httpCode2 = http.GET();
  if (httpCode > 0) { //Check the returning code
  String payload = http.getString();   //Get the request response payload
  //Serial.println(payload);                     //Print the response payload
  }
  http.end();   //Close connection
  delay(10000);
}
int rx()
{
  if (jsHack.available() > 0)
  {
    int pitch = jsHack.read();
    return pitch;
  }
}
  long microsecondsToCentimeters(long microseconds) {
  // The speed of sound is 340 m/s or 29 microseconds per centimeter.
  // The ping travels out and back, so to find the distance of the object we
  // take half of the distance travelled.
  return microseconds / 29 / 2;
}
