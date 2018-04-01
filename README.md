# Kntnt's Pull Content plugin

WordPress-plugin that add a shortcode to make pull quotes, sidebars and similar content modules.

Adds the shortcode

`[pull pos=… type=… class=… id=…]…[/pull]`

that pulls the content between `[pull]` and `[/pull]` out of the flow and place it according to the `pos` argument.

Following values are supported by the `pos` argument:

* `center` — the bounding box is centered in the column and spans 67% of the column width.
* `wide` — the bounding box spans 100% of the column width.
* `breakout` — the bounding box spans from middle of the left margin to the middle of the right margin
* `banner` — the bounding box spans from screen edge to screen edge
* `left` — the bounding box is align left in the column and spans 33% of the column width.
* `left-breakout` — the bounding box is centered around the left limit of the column. 
* `left-margin` — the bounding box is placed in the left margin
* `right` — the bounding box is align left in the column and spans 33% of the column width.
* `right-breakout` — the bounding box is centered around the right limit of the column.
* `right-margin` — the bounding box is placed in the right margin

How the content is presented depends on the `type` argument. Following values are supported:

* `quote` — pulls a text, possible with some markup (e.g. pull quote)
* `image` — pulls an image, possible with a wrapping link and possible with a preceeding `[caption]…[/caption]`
* `table` — pulls a table, possible with caption
* `sidebar` — pulls almost any HTML and frame it as a sidebar
* `unstyled` (default) — pulls almost any HTML and do nothing more

You probably need to add some CSS yourself to make everything look really awesome. For that purpose you cannalso add an HTML id with the `id` argument and CSS class(es) with `class`.
