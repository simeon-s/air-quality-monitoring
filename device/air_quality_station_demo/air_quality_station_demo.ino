#include <WiFi.h>
#include <WebServer.h>
#include <HTTPClient.h>
#define LED_BUILTIN 2

// Setting up credentials to the local network and host
#define HOST "air-monitoring.000webhostapp.com"  // HOST URL here
#define WIFI_SSID "SS" // WIFI SSID here                                   
#define WIFI_PASSWORD "A0895623567b!cd" // WIFI password here

String postData;
// Delcaring dummy values
int humidity = 10;
int temperature = 20;
int pressure = 30;
static int gas = 40;

void setup()
{
  Serial.begin(115200); // Setting the baud rate of the serial monitor
  Serial.println("Communication Started \n\n");
  delay(1000);

  pinMode(LED_BUILTIN, OUTPUT); // initialize built in led on the board

  WiFi.mode(WIFI_STA);
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD); //try to connect with wifi
  Serial.print("Connecting to ");
  Serial.print(WIFI_SSID);
  while (WiFi.status() != WL_CONNECTED)
  {
    Serial.print(".");
    delay(500);
  }

  Serial.println();
  Serial.print("Connected to ");
  Serial.println(WIFI_SSID);
  Serial.print("IP Address is : ");
  Serial.println(WiFi.localIP()); //print local IP address

  delay(30);
}

void loop()
{
  HTTPClient http;  // http object of clas HTTPClient

  gas++;

  postData = "humidity=" + String(humidity) + "&temperature=" + String(temperature) +
    "&pressure=" + String(pressure) + "&gas=" + String(gas);

  // We can post values to PHP files as  example.com/dbwrite.php?name1=val1&name2=val2&name3=val3
  // Hence created variable postDAta and stored our variables in it in desired format
  // For more detials, refer:- https://www.tutorialspoint.com/php/php_get_post.htm

  // Update Host URL here:-  

  http.begin("https://air-monitoring.000webhostapp.com/dbwrite.php"); // Connect to host where MySQL databse is hosted
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");  //Specify content-type header

  int httpCode = http.POST(postData); // Send POST request to php file and store server response code in variable named httpCode
  //Serial.println("Values are, sendval = " + sendval + " and sendval2 = "+sendval2);

  // if connection eatablished then do this
  if (httpCode == 200)
  {
    Serial.println("Values uploaded successfully.");
    Serial.println(httpCode);
    String webpage = http.getString();  // Get html webpage output and store it in a string
    Serial.println(webpage + "\n");
  }

  // if failed to connect then return and restart

  else
  {
    Serial.println(httpCode);
    Serial.println("Failed to upload values. \n");
    http.end();
    return;
  }

  delay(3000);
  digitalWrite(LED_BUILTIN, LOW);
  delay(3000);
  digitalWrite(LED_BUILTIN, HIGH);

}
