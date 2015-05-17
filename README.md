# PHP Smart Image
Resizing images on the fly

## Do what now?
So the basic idea of this is to serve up images of the correct size, if that size doesn't exit then from the original source generate the correct size, save it to the filesystem and server it to the user who requested it.

## Requirements
* PHP 5.3 (may work on less, not tested)
* PHP with ImageMagick support
* Server running Apache

## The basic way this works
In short, the server tries to serve up the image that's been requested, if it's not present then using a custom 404 script to see if it can generate an image.  If it can't generate an image then it throws up a 404 error.. Simple.
