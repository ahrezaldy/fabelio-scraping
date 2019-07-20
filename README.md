# fabelio-scraping

### Installation
1. Set up your web & database server.
2. Import [database](https://github.com/ahrezaldy/fabelio-scraping/blob/master/sqldump/fabelio.sql) (MySQL) to your server / local machine.
3. Clone this repo to your server / local machine.
```
git clone https://github.com/ahrezaldy/fabelio-scraping.git
```
4. Open [config](https://github.com/ahrezaldy/fabelio-scraping/blob/master/application/config/config.php) file, and edit based on your server setting.
```php
$config['base_url'] = 'http://localhost/fabelio-scraping/';
```
5. Open [database config](https://github.com/ahrezaldy/fabelio-scraping/blob/master/application/config/database.php) file, and edit based on your server setting.
```php
$db['default'] = array(
	// . . . 
	'hostname' => 'localhost',
	'username' => 'fabelio',
	'password' => 'fabelio',
	'database' => 'fabelio',
	// . . .
);
```

### Pages
1. Page One (< base_url >index.php/one)
- There is one text input box which only accept Fabelio product page URL (https://fabelio.com/ip/< identifier >.html).
- If user input URL with new < identifier >, record it as new data on table `product` & `prices`.
- If user input URL with already exist < identifier >, record it as new data on table `prices` and update `price` field on table `product`.
2. Page Two (< base_url >index.php/two)
- There is table consist of all products submitted with Page One text box.
3. Page Three (< base_url >index.php/three/< identifier >)
- Show product information of particular < identifier >, also there is table containing prices history.
- Support no-login commenting.
- Support comment scoring (upvote/downvote).

### Drawbacks
1. No images
2. No chart visualisation for prices history.
3. No timed request to record prices history every hour. Only record price when URL with existing < identifier > submitted again on Page One text box.

### Time to Finish: ~12 hours
