# Next home project
Our team develops a smart home assistant, that has accelerometer, gas, temperature, CO2 and other sensors, that helps predict and improve efficiency of the house in the future.

Also, we are working on disaster relief and alarm solutions to keep people in the house safe.

## Demo
Live demo (will be periodically updated): https://fathomless-citadel-40087.herokuapp.com/



## Team
- Marusic Diana [Backend and AI]
- Popa Vlad [JavaScript and AI]
- Cotov Anastasia [Embedded apps engineer]
- Lazar Iulian [Hardware engineer]
- Arsene Stefan [Hardware engineer]




# Documentation, protocols and info

## Requests for sensors
| Method   |      URL      |  Comments |
|----------|:-------------:|------:|
| GET |  /get | Method for testing GET requests |
| POST |  /post | Method for testing POST requests |
| POST |  /device/<device_id> | Post data from a device |
| POST |  /device/<device_id>/<user_id> | Post data from a device with authentified user|
| GET |  /device/<device_id>/view | View data from a device |
| GET |  /device/<device_id>/<user_id>/view | View data from a device with auth user|


