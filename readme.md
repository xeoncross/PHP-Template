## PHP Template Inheritance (PHP 5)

This class provides View/Template rendering support in pure PHP. It allows templates to utilize inheritance so that the logic dictating the construction of the final view is left to the view itself, instead of the controller where it doesn't belong.

## Methods

* `extend($file)` the name of the parent template the current template extends
* `load($file)` the name of a template to load
* `e($string, $decode)` short-cut for UTF-8 HTML special character encoding/decoding
* `start()` start a new template block
* `end($name, $keep_parent, $filters)` end a template block and save
* `block($name)` returns the contents (if any) of the given block

## Example

See the `example/index.php` file for a look at how easy it is to use. If you wish to learn more about the basic concepts of template inheritance visit <http://phpti.com>.

## MIT License

Copyright (c) 2012 David Pennington <http://xeoncross.com>
                   Nazarkin Roman <roman@nazarkin.su>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
