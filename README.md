## UOC Location Based Service Platform - Web Server

>UOC Location Based Platform - Web server integrated with Codeigniter enables users to customize maps on top of Google maps

## Configuration

1. Copy the .env.example file and create a file according to your environment as .env.development or .env.testing or .env.production etc.

2. Change the values of the config variables according to your environment,

    eg : If you are running this on your localhost and the port number of your map server is 2018,

```php     
     URL_MAP_SERVER=http://localhost:2018
     
     URL_BASE=http://localhost/Your_project_name
     
```

## External Dependancies

### Google Maps

Google maps is used to get and show information about location (info about country, city, latitude and longitude).

Required keys can be obtained from [https://maps.googleapis.com/maps/api](https://maps.googleapis.com/maps/api).

### UoC Location Based Services Platform - Java Socket API Server

Refer: https://github.com/PasinduPriyashan/UoCLBSP-MapServer
