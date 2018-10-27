#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
const int pingPin = 4; //esp pin d2

const char* ssid = "TechHub#1";
const char* password = "t3ch!#Hub";

void setup() {
  Serial.begin(115200);
  // We start by connecting to a WiFi network
  WiFi.begin(ssid, password);
  Serial.print("Wait for WiFi... ");
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print("Connecting..");
  }
  delay(50);
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  
  //server stuff
  const uint16_t port = 443;
  const char * host = "http://fathomless-citadel-40087.herokuapp.com"; // ip or dns
  Serial.print("connecting to ");
  Serial.println(host);
  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  if (!client.connect(host, port)) {
    Serial.println("connection failed");
    Serial.println("wait 5 sec...");
    delay(5000);
    return;
  }
  else{
    Serial.println("connected");
    HTTPClient http; 
    http.begin("http://fathomless-citadel-40087.herokuapp.com/test");  //Specify request destination
    int httpCode = http.GET(); 
    Serial.println(httpCode);
    if (httpCode > 0) { //Check the returning code
 
      String payload = http.getString();   //Get the request response payload
      Serial.println(payload);                     //Print the response payload
    }
    http.end();   //Close connection
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

  /*Serial.print(inches);
  Serial.print("in, ");*/
  Serial.print(cm);
  Serial.print("cm");
  Serial.println();
  delay(100);
}

  long microsecondsToInches(long microseconds) {
  // According to Parallax's datasheet for the PING))), there are 73.746
  // microseconds per inch (i.e. sound travels at 1130 feet per second).
  // This gives the distance travelled by the ping, outbound and return,
  // so we divide by 2 to get the distance of the obstacle.
  return microseconds / 74 / 2;
  }

  long microsecondsToCentimeters(long microseconds) {
  // The speed of sound is 340 m/s or 29 microseconds per centimeter.
  // The ping travels out and back, so to find the distance of the object we
  // take half of the distance travelled.
  return microseconds / 29 / 2;
  
}
