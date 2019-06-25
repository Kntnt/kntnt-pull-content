# Kntnt's Pull Content plugin

WordPress-plugin that add a shortcode to make pull quotes, sidebars and similar content modules.

Adds the shortcode

`[pull pos=… type=… class=… id=… style=… inner_style=…]…[/pull]`

that pulls the content between `[pull]` and `[/pull]` out of the flow and place it according to the `pos` argument.

All arguments are optional. Some of them have default values (see below).

It is possible to leave out the argument name and the equal sign for arguments
that are in the position indicated by the order of arguments  above. Thus,
following examples are all valid and gives the same result:

    [pull right-breakout quote]…[/pull]
    [pull pos="right-breakout" quote]…[/pull]
    [pull right-breakout type="quote"]…[/pull]
    [pull pos="right-breakout" type="quote"]…[/pull]
    [pull type="quote" pos="right-breakout"]…[/pull]

Following values are supported by the `pos` argument:

* `center` — the bounding box is centred in the column and spans 67% of the column width.
* `wide` — (default) the bounding box spans 100% of the column width.
* `breakout` — the bounding box spans from middle of the left margin to the middle of the right margin
* `banner` — the bounding box spans from screen edge to screen edge
* `left` — the bounding box is align left in the column and spans 33% of the column width.
* `left-breakout` — the bounding box is centred around the left limit of the column. 
* `left-margin` — the bounding box is placed in the left margin
* `right` — the bounding box is align left in the column and spans 33% of the column width.
* `right-breakout` — the bounding box is centred around the right limit of the column.
* `right-margin` — the bounding box is placed in the right margin

How the content is presented depends on the `type` argument. Following values are supported:

* `quote` — pulls a text, possible with some markup (e.g. pull quote)
* `image` — pulls an image, possible with a wrapping link and possible with a preceding `[caption]…[/caption]`
* `table` — pulls a table, possible with caption
* `sidebar` — pulls almost any HTML and frame it as a sidebar
* `unstyled` (default) — pulls almost any HTML and do nothing more

You probably need to add some CSS yourself to make everything look really awesome. For that purpose you can also add following arguments:

* `id` – (optional) adds an `id` attribute with the provided value to an outer `<div>` element wrapping the content 
* `class` – (optional) adds a `class` attribute with the provided value to an outer `<div>` element wrapping the content
* `style` – (optional) adds a `style` attribute with the provided value to an outer `<div>` element wrapping the content
* `inner_style` – (optional) adds a `style` attribute with the provided value to an inner`<div>` element wrapping the content
