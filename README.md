# php-integrator/core
<p align="right">
:coffee:
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YKTNLZCRHMRTJ">Send me some coffee beans</a>
</p>

PHP Integrator indexes PHP code and performs static analysis. This information is stored in an index database and the
command line can then be used to fetch information in JSON format to provide various functionalities, such as
autocompletion, code navigation and tooltips.

## Why are the Composer dependencies in Git?
This is something I'd rather have avoided, but as this code acts as a sort of payload for editor extensions and plugins
that are usually written in another language, stripping the dependencies requires those plugins to install them again
via composer. This in turn requests that the users of those plugins have composer installed as well, which increases the
entry barrier for new users.

## Where is it used?
Currently the core package is used to power the php-integrator-* packages for the Atom editor. See also [the list of projects](https://github.com/php-integrator).

![GPLv3 Logo](http://gplv3.fsf.org/gplv3-127x51.png)
