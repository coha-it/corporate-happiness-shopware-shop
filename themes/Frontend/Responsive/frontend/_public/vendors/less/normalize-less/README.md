# normalize.less v3

Normalize.less is a customisable LESS file that makes browsers render all
elements more consistently and in line with modern standards.

The project relies on researching the differences between default browser
styles in order to precisely target only the styles that need or benefit from
normalizing.

## Install

* [npm](http://npmjs.org/): `npm install --save normalize.less`
* [Component(1)](https://github.com/component/component/): `component install madzhup/normalize.less`
* [Bower](http://bower.io/): `bower install --save normalize.less`
* [Download](http://madzhup.github.io/normalize.less/latest/normalize.less).

No other styles should come before Normalize.less.

It is recommended that you include the `normalize.less` file as untouched
library code.

## What does it do?

* Preserves useful defaults, unlike many CSS resets.
* Normalizes styles for a wide range of elements.
* Corrects bugs and common browser inconsistencies.
* Improves usability with subtle improvements.
* Explains what code does using detailed comments.

## Browser support

* Google Chrome (latest)
* Mozilla Firefox (latest)
* Mozilla Firefox ESR
* Opera (latest)
* Apple Safari 6+
* Internet Explorer 8+

## Extended details

Additional detail and explanation of the esoteric parts of normalize.less.

#### `pre, code, kbd, samp`

The `font-family: monospace, monospace` hack fixes the inheritance and scaling
of font-size for preformated text. The duplication of `monospace` is
intentional.  [Source](http://en.wikipedia.org/wiki/User:Davidgothberg/Test59).

#### `sub, sup`

Normally, using `sub` or `sup` affects the line-box height of text in all
browsers. [Source](http://gist.github.com/413930).

#### `svg:not(:root)`

Adding `overflow: hidden` fixes IE9's SVG rendering. Earlier versions of IE
don't support SVG, so we can safely use the `:not()` and `:root` selectors that
modern browsers use in the default UA stylesheets to apply this style. [SVG
Mailing List discussion](http://lists.w3.org/Archives/Public/public-svg-wg/2008JulSep/0339.html)

#### `input[type="search"]`

The search input is not fully stylable by default. In Chrome and Safari on
OSX/iOS you can't control `font`, `padding`, `border`, or `background`. In
Chrome and Safari on Windows you can't control `border` properly. It will apply
`border-width` but will only show a border color (which cannot be controlled)
for the outer 1px of that border. Applying `-webkit-appearance: textfield`
addresses these issues without removing the benefits of search inputs (e.g.
showing past searches).

#### `legend`

Adding `border: 0` corrects an IE 8???11 bug where `color` (yes, `color`) is not
inherited by `legend`.

## Contributing

Please read the CONTRIBUTING.md

## Acknowledgements

Normalize.css is a project by [Nicolas Gallagher](https://github.com/necolas),
co-created with [Jonathan Neal](https://github.com/jonathantneal).
