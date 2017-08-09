=== CF7 Advance Security ===
Contributors:india-web-developer
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZEMSYQUZRUK6A
Tags: contact form 7,contact form 7 captcha, captcha
Requires at least: 3.8
Tested up to: 4.3
Stable tag: 1.0

"CF7 Advance Security" is a advance captcha module. It is only created for Contact Form 7 plugin.

== Description ==

= "CF7 Advance Security" = does not work alone. It is originally created for [Contact Form 7](http://contactform7.com/), so before install "CF7 Advance Security" you must have need to install contact form 7 on your website.

= Features =

 * Math Captcha
 * option for add to email double confirmation (Pro version)
 * Hidden Capctha (for control on robot spam) (Pro version)


== Installation ==

In most cases you can install automatically from WordPress.

However, if you install this manually, follow these steps:

1. Upload the entire `cf7-advance-security` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.


== Frequently Asked Questions ==

= How Configure the the "Contact Form 7 Advance Security"? =

Go to "Settings/CF7 Advacne Security" and configure the plugin settings

= How add douable email confirmation field? =

You can add email double confirmation option on any form, just add a new email shortcode fields with same exist email field name,only need add confirm- as prefix of new email fields 

EXAMPLE:

[email* your-email] this is your origonal email address fields shortcode so now for implement double confirmaion email you will need to create a new email field  [email* confirm-your-email]

You can see here that origonal email field name is your-email and after add confirm- as prefix of this field will make double confirmation email and name will be confirm-your-email

For more see screenshots.

== Screenshots ==

1. screenshot-1.png

2. screenshot-2.png

3. screenshot-3.png


== Changelog ==

= 1.0 = 
 * First stable release 
