# Kntnt's Pull Content plugin

WordPress-plugin that add a shortcode to make pull quotes, sidebars and similar content modules.

Adds the shortcode

`[pull pos=… type=… class=… id=…]…[/pull]`

that pulls the content between `[pull]` and `[/pull]` out of the flow and place it according to the `pos` argument.

Following values are supported by the `pos` argument:

* `center` (default)
* `center-wide`
* `center-breakout`
* `left`
* `left-breakout`
* `left-margin`
* `right`
* `right-breakout`
* `right-margin`

How the content is presented depends on the `type` argument. Following values are supported:

* `quote` — pulls a text, possible with some markup (e.g. pull quote)
* `image` — pulls an image, possible with a wrapping link and possible with a preceeding `[caption]…[/caption]`
* `table` — pulls a table, possible with caption
* `sidebar` — pulls almost any HTML and frame it as a sidebar
* `unstyled` (default) — pulls almost any HTML and do nothing more

You probably need to add some CSS yourself to make everything look really awesome. For that purpose you cannalso add an HTML id with the `id` argument and CSS class(es) with `class`.