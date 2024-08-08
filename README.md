WordPress installation
===

## System Requirements

* PHP version 7.4 or greater.
* MySQL version 5.7 or greater OR MariaDB version 10.3 or greater.
* Nginx or Apache with mod_rewrite module

## Prerequisites:

- Download the latest stable core files from WordPress official site.
- Extract the zip in the root directory of your project.
- Create a database for wordpress installation.

## Core Installation :

* Setup a virtual host for local installation (eg. wordpress.local)
* Connect Database: Either you can add wordpress database connection details directly to the wp-config.php file, or you can update this information by accessing the host URL (wordpress.local).
- Note: Duplicate ‘wp-config-sample.php’ and rename it to ‘wp-config.php’.

### Run the WordPress install: 

- Update the project details in installation steps
* Select the language
* Database Connection 
   (This step will skip, if you already added this directly on wp-config.php file )
* Enter Site Information in the next screen and run the installation.
- Note: The username & the password entering in this step will be the login credentials for wordpress dashboard, Keep this in a safe place.

### Access Dashboard:

- Goto : wordpress.local/wp-admin for accessing the wordpress dashboard using the username and password entered in the last step.

## Theme Setup :

Scratch Theme: Clone this repository to the themes directory (wp-content/themes) and rename in the name of the project.
Theme Informations: Update the theme information in style.css file & Replace default screenshot.png with the new theme preview image.
Activate the theme: Go to Appearance > Themes and select the new theme.

## How to use :

### Install Node.js: 
- install Node.js and npm on your machine.

* Below are the engine versions that are required to run this application.
- node version : >=16.0.0
- npm version : >=8.0.0

### Install Gulp.js 

### Start Development: 


* Enter following commands in the theme directory
- npm init - and enter the project informations
- npm install - install the package dependencies
- npm run dev - to start the development URL (wordpress.local:5001) with live reload
- npm run prod - This will bundle all assets into the ‘dist’ folder.

Good luck!
