# _Hair Salon_

#### _PHP Silex & Database Practice, 7.14.2017_

#### By _**Brittany Kerr**_

## Description

_This PHP database exercise allows the user to pretend they own a salon. The user enters a stylist's name to add to the list. By clicking the stylist the use can view the stylist's clients and add another._

## Setup Requirements

* Ensure that the following programs are downloaded to your computer:
  * [MAMP](https://www.mamp.info/en/) for Windows or MacOS
  * [PHP](https://secure.php.net/)
  * [Composer](https://getcomposer.org/)
* Sign into github and copy repository: https://github.com/kerrbrittany9/salon
* From your local console:
  * Enter Desktop by typing "cd Desktop"
  * Type "git clone [add above URL]".
  * Type "cd salon" to enter directory.
  * Download dependencies by typing "composer install" in console.
* In browser type "localhost:8888/phpmyadmin"
  * Click 'import' tab and choose file 'hair_salon.sql' to import database.
* Open preferences>ports on MAMP and verify that Apache Port is 8888.
* Go to preferences>web server and click the file folder next to document root.
  * Click web folder and hit select.
  * Click ok at the bottom of preferences.
  * Click start server.
* In your browser, type 'localhost:8888' to view the webpage.
* Type a stylist name in input field to get started.

## Known Bugs

The program does successfully link the user to the stylist's clients or landing page where they can edit or delete input.

## Specifications
```
1. Behavior: The user can input a name that will add to stylist list.
    * Input: Vidal Sassoon
    * Output : Stylists:
            1. Vidal Sassoon
```
```
2. Behavior: The user can add a client to the stylists' list:
    * Input: Parker Posey
    * Output: Vidal Sassoon Clients:
            1. Beyonce
            2. Parker Posey
```
```
3. Wishlist Behavior: User can find a stylist and their clients in the stylist list by inputting stylist's name.
    * Input: Vidal Sassoon
    * Output: Vidal Sassoon
            1. Beyonce
            2. Parker Posey
            3. All
            4. the
            5. Wu-Tang members
```
```
3. Wishlist Behavior: The client can add an appointment time to their listing.
    * Input: Parker Posey, Aug 1, 5:30pm
    * Output: Vidal Sassoon Calendar:
            1. Parker Posey: Aug 1, 5:30pm.
```
```
4. Wishlist Behavior: The program will list stylists' clients by chronological order of their calendar.
    * Input: Parker Posey, Aug 1, 5:30pm
    * Output: Vidal Sassoon Calendar:
            1. Beyonce: July 27, 7pm
            2. Parker Posey: Aug 1, 5:30pm
```
## Technologies Used

* _PHP_
* _HTML_
* _Bootstrap CSS_
* _Silex_
* _Twig_
* _Composer_
* _MAMP_

### License

Copyright &copy; 2017 Brittany Kerr

This software is licensed under the MIT license.
