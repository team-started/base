# FAQ


## PHP Binary nach Hoster

Für folgende Hoster gelten diese Pfade:
* Mittwald: `php_cli` (PHP Version der Domain)
* Domain Factory: `/usr/local/bin/php7-70STABLE-CLI`, `/usr/local/bin/php7-71STABLE-CLI`, `/usr/local/bin/php7-72STABLE-CLI`
* jWeiland: `/usr/local/bin/php7-70STABLE-CLI`, `/usr/local/bin/php7-71STABLE-CLI`, `/usr/local/bin/php7-72STABLE-CLI`
* All-Inkl: `php` (PHP Version der Domain)
* Metanet: `/opt/php70/bin/php`, `/opt/php71/bin/php`, `/opt/php72/bin/php`

## TYPO3-Backend Zugangsdaten

* Username: `admin`
* Password: `password`
* Install-Tool: `joh316`

## unsortiertes

#### 3.4 special topics in Windows

1. possible problem: the project can not be reached under local domain -> the line in `C:\Windows\System32\drivers\etc\hosts` is just too long (you need to start the editor with admin rights) -> just start a new line beginning with `127.0.0.1`


#### 3.6 unsortierte Topics

* **npm install Error**: `Unhandled rejection Error: EACCES: permission denied, mkdir '/home/.npm/_cacache'`\
-> `sudo chown -R $(whoami) ~/.npm` [link](https://npm.community/t/unhandled-rejection-errors/5296)
* **update TYPO3** auf shell: `ddev exec vendor/bin/typo3cms upgrade:all`
* **stylelint autofix** `stylelint "**/*.scss" --syntax scss --fix`\
-> stylelint muss dafür global installiert sein `sudo npm install stylelint -g`


### 5. Git

* Adding an existing project to GitHub using the command line: [git on console][7] (just like that in GitLab)

[7]: https://help.github.com/en/articles/adding-an-existing-project-to-github-using-the-command-line

### 6. node unter Windows

Wenn `ddev start` abbricht, weil node-sass unter Windows nicht installiert wird:
* lokal auf node 8.16.0
* .ddev/config.yaml: Zeile 20,21 auskommentieren
* webpack lokal: npm install --save-dev webpack (eventuell vorher node Verzeichnis löschen)
* webpack-cli lokal: npm install --save-dev webpack-cli (eventuell vorher node Verzeichnis löschen)
* erneut `ddev start`