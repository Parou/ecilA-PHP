
# ecilA API PHP Wrapper
A simple API Wrapper for the ecilA Link Shortener API, written in PHP.  
By [Alice Peters](https://alicepeters.de/)

## Basic usage:
```php
include 'api.class.php';
$api		=	new  ecilaAPI('YourUsername',  'YourApiKey');
$request	=	$api->actionToPerform('Action');
```
You need an API key to be able to use the API.
You can generate a new API key on [your settings page](https://ecila.ga/settings#api).
## Available actions:

### Get data of an existing link:
```php
$api->getLinkData('a1ic3');
// Or a custom link:
$api->getLinkData('l/a1ic3');
```

**Example output:**
```php
array(2) { 
	["success"]=> 1 // 0 if an error ocurred
	["data"]=> { 
		["url"]=> "https://domain.tld/" // Original / target url
		["link"]=> "a1ic3" // Short link key
		["expire"]=> "0" // Expiration time in hours
		["time"]=> "1525987497" // Gets updated when the expiration time is set
		["timestamp"]=> "2018-05-10 23:24:57" // Creation date of the link
		["reported"]=> "0" // How many times the link was reported
		["moderated"]=> "0" // 1 if the link was previously approved by a moderator
		["private"]=> "0" // 1 if the link is not allowed to be displayed at the front page
	}
}
```
---
### Add a new link:
```php
$api->addLink('https://domain.tld/link-to-shorten/');
```
**Example output:**
```php
array(2) { 
	["success"]=> 1 // 0 if an error ocurred
	["data"]=> { 
		["link"]=> "a1ic3" // Short link key (https://ecila.ga/a1ic3) 
		["code"]=> "Some simple code appears here" // Deletion code used to delete this short link later on
	}
}
```
---
### Delete an existing link
```php
$api->deleteLink('A deletion code that was returned by ecilaAPI::addLink();');
```

**Example output:**
```php
array(1) {
	["success"]=> 1 // 0 if an error ocurred
}
```
---
### Example error:
```php
array(2) {
	["success"]=> 0
	["error"]=> "Some funny error message that tells you exactly what went wrong."
}
```
---
[View ecila.ga](https://ecila.ga/)
