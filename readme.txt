=== MP Share Center ===
Contributors: MikesPickz
Donate link: http://MikesPickzWS.com/wordpress-plugins/mp-share-center/
Tags: social, share, facebook like, twitter, tweet, linkedin, google plus, stumbleupon, sharing plugin, shortcode
Requires at least: 3.0
Tested up to: 5.6
Stable tag: 5.1

The MP Share Center allows you to easily add share buttons to your posts and pages.

== Description ==

The MP Share Center allows you to easily add share buttons to your posts and pages. 

The plugin will add Facebook Like, Twitter Tweet, Google Plus, LinkedIn Share, and StumbleUpon Stumble buttons or boxes, above or below the front page/post/page/archive/search pages if you enable these options.

For the Facebook Like Button, the plugin will automatically take the first image from a post and use that as the thumbnail.

This plugin loads Javascript in the footer, which improves page load (by allowing content to appear first) and therefore benefits SEO and search engine ranking.

You can display the MP Share Center on any page type with the use of the shortcode `[mp_share_center]`. The shortcode defaults to use the buttons format. To choose the boxes format, simply add the `type='boxes'` parameter, ie: `[mp_share_center type='boxes']`. If you want to insert the call to action via the shortcode, use `[mp_share_center type='cta']`. Which social networks the shortcode displays is controlled on the MP Share Center Settings page.

== Installation ==

1. Upload `mp-share-center` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Head to the MP Share Center Options page by clicking Settings and configure the plugin

== Frequently Asked Questions ==

= Can I choose only one Social Network? =
Yes, you can. As of version 2.0, you can select to display only the social networks that you want to display.

= Can I change the font of the Call to Action? =
Yes, as of version 3.1 you can change the font of the Call to Action. If you would like to suggest other font choices, contact Mike@MikesPickzWS.com

= Google Plus is not showing up on IE 7, how do I fix this? =
Unfortunately, you can not fix this. Google only supports IE 8+ with the Google Plus button.

= What about other Social Networks? =
The more Social Networks included, the more Javascript needed to run the plugin. Right now, the five most important social buttons for driving traffic to your site are included in order to optimize speed and share. As the popularity of social networks rise and fall, the plugin will be adjusted.

== Screenshots ==

1. mp-share-center/screenshot1.JPG
2. mp-share-center/screenshot2.JPG

== Upgrade Notice ==

1. Version 3.3 allows you to insert the Call to Action with a shortcode.

== Changelog ==

= 3.3 = 
* Adds `[mp_share_center type='cta']` shortcode to use the Call to Action on any page type

= 3.2 = 
* Allows you to choose whether to use shortlinks or full links with the Tweet button

= 3.1 = 
* Allows you to change the font of the Call to Action
* Fixed Google Plus bug

= 3.0 =
* Adds `[mp_share_center]` shortcode for use on any page type
* Fixed LinkedIn share bug

= 2.3 = 
* Hides the buttons from the RSS feed since they don't layout/function properly without Javascript

= 2.2 =
* Fixed issue with icons/boxes appearing before Social Buttons

= 2.1 =
* Adds a unique CSS class to the clear fix divs to enable them to be turned off if necessary

= 2.0 =
* Added ability to select specific social networks, as opposed to being forced to use all five.
* Added ability to select which type of buttons to display above and below the post.
* Switched from XBML Facebook Like button to iFrame version to better support IE browsers.

= 1.2 =
* Fixed bug with Google Plus not using correct Permalink when displayed on the home page.
* Fixes stray word Tweet from appearing in RSS feed and image only front pages.

= 1.1 =
* Added CSS IDs to each social button and box for easier user customization.
* Moved inline CSS styles to the `<head>` section for quicker rendering
* Fixed bug with StumbleUpon not using correct Permalink when displayed on home page
* Clarifies difference between 'Front Page' and 'Main Blog Page'

= 1.0 =
* Initial Release