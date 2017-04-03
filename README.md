# []
Copyright 2017 SDCO Partners
###### Developed by []

1. Getting Started 
  * Initializing New Project
  * Starting/Editing Current Project
  * Folder Structure
3. Dev Environment
  * Gulp config
  * SASS
  * Javascript 
  * Components & Subcomponents
  * Functions.PHP
4. Deployment & Updates
5. Bugs 


### Getting Started - DEV

#### Initializing New Project
Follow these steps to configure your install to your specific project.

1. WP-CONFIG.PHP
  * set var $local_path 
2. LOCAL-CONFIG-EXAMPLE.PHP
  * remove '-example' from end of filepath
  * set DB_NAME 
  * set DB_USER 
  * set DB_PASSWORD
3. PACKAGE.JSON
  * set 'name' 
  * set 'description' 
  * set 'url' for both 'repository' and 'bugs'
  * set 'homepage' 
4. GULPFILE.JS
  * set var uri in line 75
5. .GITIGNORE-EXAMPLE
  * remove '-example' from end of filepath
  * set filepath to inner CONFIG.PHP on line 75
6. THEME FILES & FOLDERS
  * rename folder 'INIT' 
  * set 'Theme Name' and 'Theme URI' in STYLE.CSS
  * set var $GLOBALS['root'] and $GLOBALS['docpath'] in FUNCTIONS.PHP
  * set var $uri in _VARIABLES.SASS, 2 points
  * set @link and @package notes on all template files.


#### Starting/Editing Current Project
Follow these steps to start or edit a current project. See notes under DEV ENVIRONMENT for more info

In Terminal ...

1. Run 'nmp install'  
2. Run 'gulp'


#### Folder Structer


```
--\INIT
  |
  --\assets
  | 
  --\components
  |
  --\prod
  |
  --\src
    | 
    --\js
    | 
    --\sass
      -> _mixins.sass
      -> _rest.sass
      -> _variables.sass
      -> styles.sass
-> 404.php
-> footer.php
-> function.php
-> header.php
-> index.php
-> sidebar.php
-> README.txt
-> style.css 
```

### Dev Environment


### Deployment & Updates


### Bugs